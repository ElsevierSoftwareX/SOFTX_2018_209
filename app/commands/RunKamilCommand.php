<?php

class RunKamilCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        
        //ambil semua data file
        $files = Yii::app()->db->createCommand('SELECT * FROM file WHERE c_word_ok ISNULL ORDER BY id')->queryAll();
        foreach($files as $file){
            echo 'processing file id : '.$file['id'].'<br>';
            Yii::app()->db->createCommand('DELETE FROM c_word WHERE file_id = '.$file['id'])->execute();
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
            foreach($words as $word){
                if(preg_match('/[\p{P}]$/u', $word) || preg_match('/^[\p{P}]/u', $word)){ //ngandung punctuation di belakang
                    $temp = [];
                    $key = 0;
                    while(preg_match('/^[\p{P}]/u', $word)){
                        $firstPunct = substr($word , 0, 1);
                        $word = ltrim($word, $firstPunct);
                        $temp[] = $firstPunct;
                        $key++;
                    }
                    $wordKey = $key;
                    $temp[] = $word;
                    while(preg_match('/[\p{P}]$/u', $word)){
                        $lastPunct = substr($word , -1);
                        $word = rtrim($word, $lastPunct);    
                        $temp[] = $lastPunct;
                    }
                    $temp[$wordKey] = $word;
                    foreach($temp as $k){
                        $toBeChecked[] = $k;
                    }
                } else {
                    $toBeChecked[] = $word;
                }
                
            }
            
            foreach($toBeChecked as $k => $word){
                if(preg_match('/^[\p{P}]/u', $word)){
                    $class = '|t|';
                } else if(preg_match('~[0-9]~', $word)){
                    $class = '|num|';
                } else {
                    $loweredWord = str_replace("'", "''",strtolower($word));
                    //echo $loweredWord . "<br>";
                    
                    // if($searchClass != ''){
                    //     $class = "|".implode("|,|",array_unique(explode(",",$searchClass['class'])))."|";    
                    // } else {
                    //     $class = '|x|';
                    // }
                    try {
                        $searchClass = Yii::app()->db->createCommand("SELECT class FROM word_class WHERE word = '$loweredWord'")->queryRow();
                        if($searchClass != ''){
                            $class = "|".implode("|,|",array_unique(explode(",",$searchClass['class'])))."|";    
                        } else {
                            $class = '|x|';
                        }
                    } catch (Exception $ex) {
                        $class = '|t|';
                        $word = "'";
                    }
                }
                if($word == ''){
                    
                } else {
                    $temp['word'] = $word;
                    $temp['count'] = 1;
                    $temp['tagset'] = $class;
                    $temp['file_id'] = $file['id'];
                    $temp['position'] = $k;
                    $insert[] = $temp;    
                    try {
                        ActiveRecord::batch('CWord', $insert, []);    
                    }  catch (Exception $ex) {
                        $insert = [];
                        $temp['word'] = "''";
                        $temp['count'] = 1;
                        $temp['tagset'] = 's';
                        $temp['file_id'] = $file['id'];
                        $temp['position'] = $k;
                        $insert[] = $temp;    
                        ActiveRecord::batch('CWord', $insert, []);
                    }
                    $insert = [];
                }
            }
            Yii::app()->db->createCommand("UPDATE file SET c_word_ok = 1 WHERE id = ".$file['id'])->queryRow();
            die();
        }
        
    }
}