<?php

class InsertFileCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        $files = $this->params['data'];
        $arrfileid = [];
        foreach ($files as $file) {
            echo 'processing file id : ' . $file['id'] . '<br>';
            $arrfileid[] = $file['id'];
            $text = str_replace('???','',$file['content']);
            $id = $file['id'];
            $ischange = false;
            
            $words = preg_split('/\s+/', $text);
            $toBeChecked = [];
            foreach ($words as $word) {
                if (preg_match('/[\p{P}]$/u', $word) || preg_match('/^[\p{P}]/u', $word)) { //ngandung punctuation di belakang
                    $temp = [];
                    $key = 0;
                    while (preg_match('/^[\p{P}]/u', $word)) {
                        $firstPunct = substr($word , 0, 1);
                        $word = ltrim($word, $firstPunct);
                        $temp[] = $firstPunct;
                        $key++;
                    }
                    $wordKey = $key;
                    $temp[] = $word;
                    while (preg_match('/[\p{P}]$/u', $word)) {
                        $lastPunct = substr($word , -1);
                        $word = rtrim($word, $lastPunct);    
                        $temp[] = $lastPunct;
                    }
                    $temp[$wordKey] = $word;
                    foreach ($temp as $k) {
                        $toBeChecked[] = $k;
                    }
                } else {
                    $toBeChecked[] = $word;
                }
                
            }
            
            $wordArr = [];
            $phraseArr = [];
            
            foreach ($toBeChecked as $k => $word) {
                $isPhrase = false;
                $loweredWord = str_replace("'", "''",strtolower($word));
                $wordFound = $loweredWord;
                
                if (preg_match('/^[\p{P}]/u', $word)) {
                    $class = '|t|';
                } elseif (preg_match('~[0-9]~', $word)) {
                    $class = '|num|';
                } else {
                    //echo $loweredWord. "<br>";
                    //die();
                    // if($searchClass != ''){
                    //     $class = "|".implode("|,|",array_unique(explode(",",$searchClass['class'])))."|";    
                    // } else {
                    //     $class = '|x|';
                    // }
                    try {
                        #cari frase
                        $searchClass = Yii::app()->db->createCommand("SELECT * FROM word_class WHERE word LIKE '$loweredWord%' ORDER BY word DESC")->queryAll();
                        if ($searchClass != '' && count($searchClass)>0) {
                            $temptag = 'x';
                            foreach ($searchClass as $s) {
                                if ($s['word'] == $loweredWord) {
                                        $temptag = $s['class'];
                                        $wordFound = $loweredWord;
                                        break;
                                } else {
                                    if(strpos($s['word'], ' ')!==false){
                                        $countSub = substr_count($s['word'], ' ');
                                        if (@implode(' ',array_slice($toBeChecked, $k, $countSub+1))==$s['word']) {
                                            $temptag = $s['class'];
                                            $wordFound = $s['word'];
                                            for ($i = $k+1; $i<=$k+$countSub; $i++) {
                                                $toBeChecked[$i] = '';
                                            }
                                            $isPhrase = true;
                                            break;
                                        }    
                                    }
                                }
                            }
                            $class = '|' . implode('|,|',array_unique(explode(',',$temptag))) . '|';    
                        } 
                        else {
                            $class = '|x|';
                        }
                    } catch (Exception $ex) {
                        $class = '|t|';
                        $word = "'";
                        $wordFound = "'";
                    }
                }// End if().
            
                if ($word == '') {}
                else{
                    if ($isPhrase) {
                        $temp['word'] = null;
                        $temp['phrase'] = $wordFound;
                    } else {
                        $temp['phrase'] = null;
                        $temp['word'] = $wordFound;
                    }
                    $temp['count'] = '1';
                    $temp['tagset'] = $class;
                    $temp['file_id'] = $file['id'];
                    $temp['position'] = $k;
                    $insert[] = $temp;
                    try {
                        $wordArr[] = $temp;
                        ActiveRecord::batch('CMappingFile', $insert, []);    
                    } catch (Exception $ex) {
                        $insert = [];
                        $temp['word'] = "''";
                        $temp['count'] = '1';
                        $temp['tagset'] = '|s|';
                        $temp['file_id'] = $file['id'];
                        $temp['position'] = $k;
                        $insert[] = $temp;
                        $wordArr[] = $temp;
                        ActiveRecord::batch('CMappingFile', $insert, []);
                    }
                    $insert = [];
                }// End if().
            }// End foreach().
            Yii::app()->db->createCommand('UPDATE file SET c_word_ok = 1 WHERE id = ' . $file['id'])->queryRow();
        }// End foreach().
        
        #insert into c_word
        Yii::app()->db->createCommand("TRUNCATE c_word RESTART IDENTITY; ALTER SEQUENCE phrase_id_seq RESTART WITH 1")->execute();
        Yii::app()->db->createCommand("INSERT INTO c_word SELECT nextval('phrase_id_seq') id, COALESCE(word, phrase) word, SUM(count) count, tagset FROM c_mapping_file WHERE is_ignored = 'N' GROUP BY word, phrase, tagset ORDER BY word ASC")->execute();
                
        #insert into c_phrase
        foreach ($files as $file) {
            if(Yii::app()->db->createCommand('SELECT c_word_ok FROM file WHERE id = '.$file['id'])->queryScalar()==1){
                $wordArr = Yii::app()->db->createCommand('SELECT file_id, COALESCE(word, phrase) word, count, tagset, position FROM c_mapping_file WHERE file_id = '.$file['id'].' ORDER BY position')->queryAll();
                
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