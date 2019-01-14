<?php

class UpdateAllMappingFileWordCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        $wordNew = $this->params['wordNew'];
        $tagNew = $this->params['tagNew'];
        $wordOld = $this->params['wordOld'];
        $tagOld = $this->params['tagOld'];
        if(strpos($tagNew, '|')===false){
            $tagNew = '|'.str_replace(',','|,|',$tagNew).'|';
        }
        if(strpos($tagOld, '|')===false){
            $tagOld = '|'.str_replace(',','|,|',$tagOld).'|';
        }
        
        
        Yii::app()->db->createCommand("INSERT INTO update_word VALUES (DEFAULT, '".$wordOld."', '".$tagOld."', '".$wordNew."', '".$tagNew."', NOW())")->execute();
        
        if($wordNew!=$wordOld){
            $fileIds = Yii::app()->db->createCommand("SELECT DISTINCT file_id FROM c_mapping_file WHERE word = '".$wordOld."'")->queryColumn();
            foreach($fileIds as $fileid){
                $tmp = File::model()->findByPk($fileid);
                $tmp->is_checked = 'Y';
                $tmp->content = preg_replace('/[ \t]+/', ' ', preg_replace('/\s*$^\s*/m', "\n", $tmp->content));
                if($wordOld=='-'){
                    $wordOld = ' - ';
                }
                if(preg_match('/[^a-zA-Z0-9]/', $tmp->content)){
                    $tmp->content = str_replace($wordOld, $wordNew, $tmp->content);
                }
                else{
                    $tmp->content = preg_replace('/'.$wordOld.'\b/i', $wordNew, $tmp->content);    
                }
                $tmp->save();
                
                #update count mapping file
                $count = Yii::app()->db->createCommand("SELECT wordcount FROM c_mapping_file WHERE word = '".$wordOld."' AND file_id = '".$fileid."'")->queryScalar();
                $count = $count?$count:0;
                if($wordNew!=$wordOld){
                    Yii::app()->db->createCommand("DELETE FROM c_mapping_file WHERE word='".$wordOld."' AND file_id='".$fileid."'")->execute();
                    $tmp = CMappingFile::model()->findByAttributes(['word'=>$wordNew, 'file_id'=>$fileid]);
                    if($tmp){
                        Yii::app()->db->createCommand("UPDATE c_mapping_file SET wordcount = ".($tmp->wordcount?$tmp->wordcount:0+$count)." WHERE id = ".$tmp['id'])->execute();
                    }
                    else{
                        Yii::app()->db->createCommand("INSERT INTO c_mapping_file VALUES (DEFAULT, '".$fileid."', '".strtolower($wordNew)."', null, ".$count.", null, 'N')")->execute();
                    }
                }
            }
        }
        
        #update mapping file
        $phraseArr = Yii::app()->db->createCommand("SELECT phrase FROM mapping_file WHERE word = '".$wordOld."' ")->queryColumn();
        Yii::app()->db->createCommand("UPDATE mapping_file SET word = '".$wordNew."', tagset = '".$tagNew."' WHERE word = '".$wordOld."'")->execute();
        
        
        #update c_word
        $tmpOld = CWord::model()->findByAttributes(['word'=>$wordOld, 'tagset'=>$tagOld]);
        $count = Yii::app()->db->createCommand("SELECT SUM(wordcount) sums
                                                FROM (SELECT mf.file_id, mf.word FROM mapping_file mf WHERE mf.word = '".$wordOld."' AND mf.tagset = '".$tagOld."' GROUP BY file_id, word) mf
                                                INNER JOIN c_mapping_file cmf ON cmf.file_id = mf.file_id AND cmf.word = mf.word
                                                GROUP BY mf.word")->queryScalar();
        $count = $count?$count:0;
        if($tmpOld){
            if($wordNew!=$wordOld){
                Yii::app()->db->createCommand("DELETE FROM c_word WHERE id = ".$tmpOld['id'])->execute();
                
            }
            else{
                Yii::app()->db->createCommand("UPDATE c_word SET count = ".($tmpOld['count']-$count)." WHERE id = ".$tmpOld['id'])->execute();
            }
        }
        $tmpNew = CWord::model()->findByAttributes(['word'=>$wordNew, 'tagset'=>$tagNew]);
        if($tmpNew){
            Yii::app()->db->createCommand("UPDATE c_word SET count = ".($tmpNew['count']+$count)." WHERE id = ".$tmpNew['id'])->execute();
        }
        else{
            Yii::app()->db->createCommand("INSERT INTO c_word VALUES (DEFAULT,'".strtolower($wordNew)."', ".$count.", '".$tagNew."')")->execute();
        }
        
        
        #update phrase mapping file
        $phraseArr = array_unique($phraseArr);
        foreach($phraseArr as $phraseOld){
            $count = Yii::app()->db->createCommand("SELECT SUM(phrasecount) sums
                                                FROM (SELECT mf.file_id, mf.phrase FROM mapping_file mf WHERE mf.phrase = '".$phraseOld."' GROUP BY file_id, phrase) mf
                                                INNER JOIN c_mapping_file cmf ON cmf.file_id = mf.file_id AND cmf.phrase = mf.phrase
                                                GROUP BY mf.phrase")->queryScalar();
            $count = $count?$count:0;
            if($wordNew!=$wordOld){
                $temp = explode(" ",$phraseOld);
                foreach($temp as $k=>$t){
                    if($t==$wordOld){
                        $temp[$k] = $wordNew;
                    }    
                }
                $phraseNew = implode(' ',$temp);
                $old = Yii::app()->db->createCommand("SELECT * FROM mapping_file WHERE phrase = '".$phraseOld."' ")->queryAll();
                foreach($old as $k=>$l){
                    $infoNew = '';
                    $html = $l['info_html'];
                    $ini = strpos($html, '<i>') + strlen('<i>');
                    $len = strpos($html, '</i>', $ini) - $ini;
                    $infoNew = substr($html,0,$ini);
                    
                    $phrase = substr($html, $ini, $len);
                    $temp2 = explode(" ",$phrase);
                    foreach($temp2 as $k=>$t){
                        if($t==$wordOld){
                            $temp2[$k] = $wordNew;
                        }    
                    }
                    $phraseNewtemp = implode(' ',$temp2);
                    $infoNew .= $phraseNewtemp.substr($html,$ini+$len);
                    
                    Yii::app()->db->createCommand("UPDATE mapping_file SET phrase = '".$phraseNew."', info_html = '".$infoNew."' WHERE phrase = '".$phraseOld."' AND id = ".$l['id'])->execute();
                }
                
                #update count mapping file
                $old = CMappingFile::model()->findAllByAttributes(['phrase'=>$phraseOld]);
                foreach($old as $k=>$l){
                    $tmpCount = $l->phrasecount;
                    $tmpCount==''?0:$tmpCount;
                    $tmp = CMappingFile::model()->findByAttributes(['phrase'=>$phraseNew, 'file_id'=>$l->file_id]);
                    if($tmp){
                        Yii::app()->db->createCommand("UPDATE c_mapping_file SET phrasecount = ".($tmp->phrasecount+$tmpCount)." WHERE id=".$tmp->id)->execute();
                    }
                    else{
                        Yii::app()->db->createCommand("INSERT INTO c_mapping_file VALUES (DEFAULT, '".$l->file_id."', null,'".$phraseNew."', null, ".$tmpCount.", 'N')")->execute();
                    }
                    Yii::app()->db->createCommand("DELETE FROM c_mapping_file WHERE phrase='".$phraseOld."' AND file_id='".$l->file_id."'")->execute();
                }
            }
            else{
                $phraseNew = $phraseOld;
            }
            
            #update c_phrase
            $tmpOld = Yii::app()->db->createCommand("SELECT * FROM c_phrase 
                                                     WHERE phrase='".$phraseOld."' AND 
                                                     ((word1='".$wordOld."' AND tagset_word1 = '".$tagOld."') OR (word2='".$wordOld."' AND tagset_word2 = '".$tagOld."') 
                                                        OR (word3='".$wordOld."' AND tagset_word3 = '".$tagOld."')) ")->queryRow();
            if($tmpOld){
                if($tmpOld['count']<=$count){
                    Yii::app()->db->createCommand("DELETE FROM c_phrase WHERE id=".$tmpOld['id'])->execute();
                }
                else{
                    Yii::app()->db->createCommand("UPDATE c_phrase SET count = ".($tmpOld['count']-$count)." WHERE id=".$tmpOld['id'])->execute();
                }
            }
            else{
                echo $phraseOld;
            }
            
            $tmpNew = CPhrase::model()->findByAttributes(['phrase'=>$phraseNew, 'word1'=>$wordNew, 'tagset_word1'=>$tagNew]);
            if($tmpNew){
                Yii::app()->db->createCommand("UPDATE c_phrase SET count = ".($tmpNew['count']+$count)." WHERE id=".$tmpNew['id'])->execute();
            }
            else{
                $tmpNew = CPhrase::model()->findByAttributes(['phrase'=>$phraseNew, 'word2'=>$wordNew, 'tagset_word2'=>$tagNew]);
                if($tmpNew){
                    Yii::app()->db->createCommand("UPDATE c_phrase SET count = ".($tmpNew['count']+$count)." WHERE id=".$tmpNew['id'])->execute();
                }   
                else{
                    $tmpNew = CPhrase::model()->findByAttributes(['phrase'=>$phraseNew, 'word3'=>$wordNew, 'tagset_word3'=>$tagNew]);
                    if($tmpNew){
                        Yii::app()->db->createCommand("UPDATE c_phrase SET count = ".($tmpNew['count']+$count)." WHERE id=".$tmpNew['id'])->execute();
                    }   
                    else{
                        $word = explode(' ',$phraseNew);
                        $tagword1 = $tagword2 = $tagword3 = 'null';
                        $tagword1 = @CWord::model()->findByAttributes(['word'=>$word[0]])->tagset;
                        $tagword2 = @CWord::model()->findByAttributes(['word'=>$word[1]])->tagset;
                        if(count($word)>2){
                            $tagword3 = "'".@CWord::model()->findByAttributes(['word'=>$word[2]])->tagset."'";
                        }
                        $word3 = count($word)>2?"'".$word[2]."'":'null';
                        Yii::app()->db->createCommand("INSERT INTO c_phrase VALUES (DEFAULT,'".$phraseNew."','".$word[0]."','".$tagword1."','".$word[1]."','".$tagword2."', ".$count.",".$word3.",".$tagword3.")")->execute(); 
                    }
                }
            }
        }
    }
}