<?php

class CWordErrorCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        $idFileError = 309;
        
        $data = Yii::app()->db->createCommand('SELECT * FROM c_mapping_file WHERE file_id = '.$idFileError)->queryAll();
        foreach($data as $k=>$d){
            if($d['word']=="'"){
                $data[$k]['word'] = "''";
            }
            $countWord = Yii::app()->db->createCommand("SELECT COALESCE(SUM(wordcount),0) FROM c_mapping_file WHERE word = '".$data[$k]['word']."' AND tagset_word = '".$d['tagset_word']."' AND file_id<".$idFileError)->queryScalar();
            Yii::app()->db->createCommand("UPDATE c_word SET count = ".$countWord." WHERE word = '".$data[$k]['word']."' AND tagset = '".$d['tagset_word']."'")->execute();
            if($countWord == 0){
                Yii::app()->db->createCommand("DELETE FROM c_word WHERE word = '".$data[$k]['word']."' AND tagset = '".$d['tagset_word']."'")->execute();
            }
        }
    }
}