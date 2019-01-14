<?php

class UpdateMappingFileWordCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        $wordNew = strtolower($this->params['wordNew']);
        $tagNew = $this->params['tagNew'];
        $fileid = $this->params['fileid'];
        $wordOld = strtolower($this->params['wordOld']);
        $tagOld = $this->params['tagOld'];
        if(strpos($tagNew, '|')===false){
            $tagNew = '|'.str_replace(',','|,|',$tagNew).'|';
        }
        if(strpos($tagOld, '|')===false){
            $tagOld = '|'.str_replace(',','|,|',$tagOld).'|';
        }
        
        $content = File::model()->findByPk($fileid)['content'];
        $text = $content;
        echo 'Process update word '.$wordOld;
        
        $startIdx = 0;
        $endIdx = 0;
        #update content file
        if($wordNew!=$wordOld){
            $tmp = File::model()->findByPk($fileid);
            $tmpC = MappingFile::model()->findAllByAttributes(['word'=>$wordOld, 'tagset'=>$tagOld, 'file_id'=>$fileid]);
            foreach($tmpC as $t){
                $startIdx = strpos(strtolower($text), strtolower(MappingFile::getTextBetweenTags($t['info_html'],'i').MappingFile::getTextAfterTags($t['info_html'],'</b>')));
                $endIdx = $startIdx+strlen($wordOld);
                $text = substr($text, 0, $startIdx).$wordNew.substr($text, $endIdx);
            }
            $tmp->content = $text;
            $tmp->save();
        }
        
        #kurangi c_word
        $co = Yii::app()->db->createCommand("SELECT COALESCE(wordcount,0) count FROM c_mapping_file WHERE file_id = '".$fileid."' AND word = '".$wordOld."' AND tagset_word = '".$tagOld."'")->queryScalar();
        if(Yii::app()->db->createCommand("SELECT (count,0) count FROM c_word WHERE word = '".$wordOld."' AND tagset= '".$tagOld."'")->queryScalar()<=$co){
            Yii::app()->db->createCommand("DELETE FROM c_word WHERE word = '".$wordOld."' AND tagset = '".$tagOld."'")->execute();
        }
        else{
            Yii::app()->db->createCommand("UPDATE c_word SET count = count - ".$co." WHERE word = '".$wordOld."' AND tagset = '".$tagOld."'")->execute();
        }
        #tambah c_word
        if(Yii::app()->db->createCommand("SELECT COUNT(1) FROM c_word WHERE word='".$wordNew."' AND tagset = '".$tagNew."'")->queryScalar()==0){
            Yii::app()->db->createCommand("INSERT INTO c_word VALUES (DEFAULT,'".$wordNew."', ".$co.", '".$tagNew."')")->execute();
        }
        else{
            Yii::app()->db->createCommand("UPDATE c_word SET count = count+".$co." WHERE word = '".$wordNew."' AND tagset = '".$tagNew."'")->execute();
        }
        
        #kurangi c_mapping_file
        Yii::app()->db->createCommand("DELETE FROM c_mapping_file WHERE word = '".$wordOld."' AND tagset_word = '".$tagOld."' AND file_id = '".$fileid."'")->execute();
        if(Yii::app()->db->createCommand("SELECT COUNT(1) FROM c_mapping_file WHERE word='".$wordNew."' AND tagset_word = '".$tagNew."' AND file_id = '".$fileid."'")->queryScalar()==0){
            Yii::app()->db->createCommand("INSERT INTO c_mapping_file VALUES (DEFAULT, '".$fileid."', '".$wordNew."', null, ".$co.", null, 'N', '".$tagNew."')")->execute();
        }
        else{
            Yii::app()->db->createCommand("UPDATE c_mapping_file SET is_ignored = 'N', wordcount = wordcount+".$co." WHERE word = '".$wordNew."' AND tagset_word = '".$tagNew."' AND file_id = '".$fileid."'")->execute();
        }
        
        $arrResult = Yii::app()->db->createCommand("SELECT word, tagset FROM mapping_file WHERE file_id = '".$fileid."' ORDER BY id")->queryAll();
        $contents = [];
        foreach($arrResult as $k=>$r){
            if($r['word']==$wordOld&&$r['tagset']==$tagOld){
                $contents[$k]['word'] = $wordNew;
                $contents[$k]['tagset']= $tagNew;
            }
            else{
                $contents[$k]=$r;
            }
        }
        
        $subsql = [];
        $startIdx = 0;
        $endIdx = 0;
        $tempText = strtolower($text);
        $tmpOld = Yii::app()->db->createCommand("SELECT * FROM c_phrase 
                                                WHERE ( (word_l1='".$wordOld."' AND tagset_word_l1 = '".$tagOld."') OR (word_l2='".$wordOld."' AND tagset_word_l2 = '".$tagOld."') 
                                                     OR (word_r1='".$wordOld."' AND tagset_word_r1 = '".$tagOld."') OR (word_r2='".$wordOld."' AND tagset_word_r2 = '".$tagOld."')
                                                     OR (word='".$wordOld."' AND tagset_word = '".$tagOld."')
                                                ) ")->queryAll();
        foreach($tmpOld as $i=>$t){
            Yii::app()->db->createCommand("DELETE FROM c_mapping_file WHERE phrase = '".$t['phrase']."' AND file_id = '".$fileid."'")->execute();
            
        }
        
        foreach($contents as $k=>$c){
            $tmpnode = [];
            #get left word
            for($i=2;$i>0;$i--){
                if(($k-$i)>=0){
                    $tmpnode[] = $contents[$k-$i]['word'];
                }
            }
            
            #get node
            $tmpnode[] = $c['word'];
            
            #get right word
            for($i=1;$i<=2;$i++){
                if(($k+$i)<count($contents)){
                    $tmpnode[] = $contents[$k+$i]['word'];
                }
                else{
                    break;
                }
            }
            
            #mapping file
            $phrase = implode(' ',$tmpnode);
            $startIdx = strpos($tempText, $contents[$k]['word'],$startIdx);
            $endIdx = strpos($tempText, $contents[$k]['word'],$startIdx)+strlen($contents[$k]['word']);
            $html = ($startIdx>20? '... ':'').substr($text,$startIdx>20?($startIdx-20):0,$startIdx>20?20:$startIdx).'<b><i>'.substr($text,$startIdx,$endIdx-$startIdx).'</i></b>'.(substr($text,$endIdx,50).(strlen($text)-$endIdx>50?'...':''));
            $html = str_replace("'","''",$html);
            
            $subsql[] = "(DEFAULT,'".$fileid."', '".$c['word']."', '".$c['tagset']."', '".$phrase."', '".$html."')";
            
            #c_mapping_file untuk phrase
            if(Yii::app()->db->createCommand("SELECT COUNT(1) FROM c_mapping_file WHERE phrase='".$phrase."' AND file_id = '".$fileid."'")->queryScalar()==0){
                Yii::app()->db->createCommand("INSERT INTO c_mapping_file VALUES (DEFAULT, '".$fileid."', null, '".$phrase."', null, 1, 'N', null)")->execute();
            }
            else{
                Yii::app()->db->createCommand("UPDATE c_mapping_file SET phrasecount = phrasecount+1, is_ignored = 'N' WHERE phrase = '".$phrase."' AND file_id = '".$fileid."'")->execute();
            }
        }
            
        if(count($subsql)>0){
            Yii::app()->db->createCommand("DELETE FROM mapping_file WHERE file_id = '".$fileid."' ")->execute();
            if(!Yii::app()->db->createCommand("INSERT INTO mapping_file VALUES ".implode(",",$subsql))->execute()){
                echo implode(",",$subsql);
                echo "INSERT INTO mapping_file VALUES ".implode(",",$subsql);
                die();
            }
        }
        
        #update c_phrase
        foreach($tmpOld as $i=>$t){
            #kurangi c_phrase
            $tmpOld[$i]['phrase'] = str_replace("'","''",$tmpOld[$i]['phrase']);
            $keyArr = ['word_l2', 'word_l1', 'word', 'word_r1', 'word_r2'];
            $tmp = '';
            $tmp2 = [];
            $tmp3 = []; #where
            $insert = [];
            foreach($keyArr as $k){
                $tmpOld[$i][$k] = str_replace("'","''",$tmpOld[$i][$k]);
                if(@$tmpOld[$i][$k]==$wordOld&&@$tmpOld[$i]['tagset_'.$k]==$tagOld){
                    $tmpOld[$i][$k]=$wordNew;
                    $tmpOld[$i]['tagset_'.$k]=$tagNew;
                    $tmp = $k;
                }
                if(@$t[$k]!=null){
                    $tmp2[] = $tmpOld[$i][$k];
                    $tmp3[] = $k." = '".$tmpOld[$i][$k]."' AND tagset_".$k." = '".$tmpOld[$i]['tagset_'.$k]."'";
                    $insert[] = "'".$tmpOld[$i][$k]."', '".$tmpOld[$i]['tagset_'.$k]."'";
                }
                else{
                    $tmp3[] = $k." IS NULL";
                    $insert[] = 'null, null';
                }
            }
            
            $co = @Yii::app()->db->createCommand("SELECT phrasecount FROM c_mapping_file WHERE file_id = '".$fileid."' AND phrase = '".$tmpOld[$i]['phrase']."'")->queryScalar();
            if($co==''||$co===false){
                $co = 0;
            }
            if($t['count']<=$co){
                Yii::app()->db->createCommand("DELETE FROM c_phrase WHERE id = '".$t['id']."'")->execute();
            }
            else{
                Yii::app()->db->createCommand("UPDATE c_phrase SET count = count - ".$co." WHERE id = '".$t['id']."'")->execute();
            }
            
            
            #tambah c_phrase
            $tmpNew = Yii::app()->db->createCommand("SELECT * FROM c_phrase 
                                                    WHERE ".implode(' AND ', $tmp3))->queryRow();
            if($tmpNew){
                Yii::app()->db->createCommand("UPDATE c_phrase SET count = count+".+$co." WHERE id=".$tmpNew['id'])->execute();
            }
            else{
                @Yii::app()->db->createCommand("INSERT INTO c_phrase VALUES (DEFAULT,'".implode(' ',$tmp2)."',".implode(', ',$insert).", ".$co.")")->execute();
            }
        }
        Yii::app()->db->createCommand("DELETE FROM c_phrase WHERE count = 0")->execute();
        
        echo 'finished';
    }
    
}