<?php

class MappingFile_step2Command extends Service {
    public function actionIndex() {
        ## Put your code here
        $files = Yii::app()->db->createCommand('SELECT * FROM file WHERE c_word_ok = 1 AND id = 2038 ORDER BY id')->queryAll();
        foreach ($files as $file) {
            if(Yii::app()->db->createCommand('SELECT c_word_ok FROM file WHERE id = '.$file['id'])->queryScalar()==1){
                echo 'processing file id : ' . $file['id'] . '<br>';
                $wordArr = Yii::app()->db->createCommand('SELECT file_id, COALESCE(word, phrase) word, count, tagset, position FROM c_mapping_file WHERE file_id = '.$file['id'].' ORDER BY position')->queryAll();
                
                #insert into c_phrase
                foreach($wordArr as $k=>$w){
                    if(!is_null($w['word'])&&$w['word']!=''){
                        $tmp = [];
                        $tmp['word_l1'] = null;
                        $tmp['word_l2'] = null;
                        $tmp['word'] = null;
                        $tmp['word_r1'] = null;
                        $tmp['word_r2'] = null;
                        $tmpnode = [];
                        
                        #get left word
                        $z=$k-1;
                        for($i=1;$i<=2;$i++){
                            while(is_null($tmp['word_l'.$i])&&$z>=0){
                                
                                $tmp['word_l'.$i]=@str_replace("'", "''", $wordArr[$z]['word']);
                                $tmp['tagset_word_l'.$i] = @$wordArr[$z]['tagset'];
                                $z--;
                            }    
                        }
                        
                        #get node
                        $tmp['word'] = @str_replace("'", "''", $w['word']);;
                        $tmp['tagset_word'] = @$w['tagset'];
                            
                        #get right word
                        $z=$k+1;
                        for($i=1;$i<=2;$i++){
                            while(is_null($tmp['word_r'.$i])&&$z<count($wordArr)){
                                $tmp['word_r'.$i]=@str_replace("'", "''", $wordArr[$z]['word']);
                                $tmp['tagset_word_r'.$i] = @$wordArr[$z]['tagset'];
                                $z++;
                            }    
                        }
                        $tmpnode[] = @$tmp['word_l2'];
                        $tmpnode[] = @$tmp['word_l1'];
                        $tmpnode[] = @$tmp['word'];
                        $tmpnode[] = @$tmp['word_r1'];
                        $tmpnode[] = @$tmp['word_r2'];
                        
                        $tmp['phrase'] = implode(' ',$tmpnode);
                        $phraseArr[] = $tmp;
                    }
                }
                
                foreach($phraseArr as $p){
                    $inserts = [];
                    $where = [];
                    $keyArr = ['word_l2', 'word_l1', 'word', 'word_r1', 'word_r2'];
                    
                    foreach($keyArr as $k){
                        if(@isset($p[$k])){
                            $inserts[] = "'".$p[$k]."', '".$p['tagset_'.$k]."'";
                            $where[] = $k." = '".$p[$k]."' AND tagset_".$k." = '".$p['tagset_'.$k]."'";
                        }
                        else{
                            $inserts[] = 'null, null';
                            $where[] = $k." IS NULL";
                        }    
                    }
                    
                    $where[] = "phrase = '".$p['phrase']."'";
                    
                    $whereSql = implode(' AND ',$where);
                    $insertSql = implode(', ',$inserts);
                    Yii::app()->db->createCommand("INSERT INTO c_phrase VALUES (DEFAULT,'".$p['phrase']."',".$insertSql.", '".$file['id']."')")->execute();
                }
                Yii::app()->db->createCommand('UPDATE file SET c_word_ok = 2 WHERE id = ' . $file['id'])->execute();
                $phraseArr = [];
                $wordArr = [];
            }
        }
    }
}