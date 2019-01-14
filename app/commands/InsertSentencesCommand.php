<?php

class InsertSentencesCommand extends Service {
    public function actionIndex() {
        $go = true;    
        while($go){
            $file = File::model()->findByAttributes(['is_sentences_ok' => 0]);    
            if(!$file){
                $go = false;
                break;
            }
            echo $file->id . '<br>';
            $sentences = preg_split('/(?<=[.?!;:])\s+/', $file->content, -1, PREG_SPLIT_NO_EMPTY);
            foreach($sentences as $k => $v){
                $sentences = new CSentences();    
                $sentences->file_id = $file->id;
                $sentences->sentence = $v;
                $sentences->position = $k + 1;                
                $sentences->save();
            }
            
            $file->is_sentences_ok = 1;
            $file->save();
        }
    }
}