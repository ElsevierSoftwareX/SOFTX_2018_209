<?php

class MappingFileCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        //ambil semua data file
        $files = Yii::app()->db->createCommand('SELECT * FROM file WHERE c_word_ok ISNULL ORDER BY id')->queryAll();
        //$files = Yii::app()->db->createCommand('SELECT * FROM file WHERE id = 2038 ORDER BY id')->queryAll();
        foreach ($files as $file) {
            echo 'processing file id : ' . $file['id'] . '<br>';
            $text = str_replace('???','',$file['content']);
            $id = $file['id'];
            $ischange = false;
            
            #cek supaya tidak double running service pada file yang id'nya sama 
            // $test = CMappingFile::model()->findByAttributes(['file_id'=>$id]);
            // $do = true;
            
            // if($test){
            //     if($test['wordcount']>0){
            //         $do = false;
            //         echo '<br/>Process id : '.$id.' skipped<br/>';
            //     }
            // }
            
            // if($do){
                    
                
            // }
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
        /*
        #insert into c_word
        Yii::app()->db->createCommand("TRUNCATE c_word RESTART IDENTITY; ALTER SEQUENCE phrase_id_seq RESTART WITH 1")->execute();
        Yii::app()->db->createCommand("INSERT INTO c_word SELECT nextval('phrase_id_seq') id, COALESCE(word, phrase) word, SUM(count) count, tagset FROM c_mapping_file WHERE is_ignored = 'N' GROUP BY word, phrase, tagset ORDER BY word ASC")->execute();*/
    }
}
