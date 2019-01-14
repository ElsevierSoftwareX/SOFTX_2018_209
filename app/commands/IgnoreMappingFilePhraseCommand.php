<?php

class IgnoreMappingFilePhraseCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        $fileid = $this->params['fileid'];
        $phrase = $this->params['phrase'];
        
        Yii::app()->db->createCommand("UPDATE c_mapping_file SET is_ignored= 'Y' WHERE phrase = '".$phrase."' AND file_id = '".$fileid."'")->execute();
        
        $temp = explode(' ',$phrase);
        $words = [];
        $subsql = '';
        $subsql2 = '';
        foreach($temp as $k=>$w){
            $w1 = MappingFile::model()->findByAttributes(['word'=>$w, 'file_id'=>$fileid]);
            $words['word'.($k+1)] = $w;
            $words['tag'.($k+1)] = $w1?$w1->tagset:'null';
        }
        
        if(count($temp)==3){
            $subsql = " INNER JOIN (
                        SELECT DISTINCT file_id
                        FROM mapping_file
                        WHERE word = '".$words['word3']."' AND tagset = '".$words['tag3']."'
                        GROUP BY file_id) c ON a.file_id = c.file_id";
            $subsql2 = " AND word3 = '".$words['word3']."'  AND tagset_word3 = '".$words['tag3']."'";
        }
        
        $sql = "SELECT SUM(phrasecount)
                FROM c_mapping_file
                WHERE file_id IN(
                  SELECT a.file_id
                  FROM (
                    SELECT DISTINCT file_id
                    FROM mapping_file
                    WHERE word = '".$words['word1']."' AND tagset = '".$words['tag1']."'
                    GROUP BY file_id) a
                  INNER JOIN (
                    SELECT DISTINCT file_id
                    FROM mapping_file
                    WHERE word = '".$words['word2']."' AND tagset = '".$words['tag2']."'
                    GROUP BY file_id) b ON a.file_id = b.file_id
                  ".$subsql."
                    )
                AND phrase = '".$phrase."' AND is_ignored = 'N'";
        $count = Yii::app()->db->createCommand($sql)->queryScalar();
        
        if($count){
            if($count>0){
                Yii::app()->db->createCommand(" UPDATE c_phrase SET count = ".$count." 
                                                WHERE phrase = '".$phrase."' AND word1 = '".$words['word1']."'  AND tagset_word1 = '".$words['tag1']."'
                                                      AND word2 = '".$words['word2']."'  AND tagset_word2 = '".$words['tag2']."' ".$subsql2)->execute();
            }
            else{
                Yii::app()->db->createCommand(" DELETE FROM c_phrase  WHERE phrase = '".$phrase."' AND word1 = '".$words['word1']."'  AND tagset_word1 = '".$words['tag1']."'
                                                AND word2 = '".$words['word2']."'  AND tagset_word2 = '".$words['tag2']."' ".$subsql2)->execute();
            }
        }
        else{
            Yii::app()->db->createCommand(" DELETE FROM c_phrase  WHERE phrase = '".$phrase."' AND word1 = '".$words['word1']."'  AND tagset_word1 = '".$words['tag1']."'
                                                AND word2 = '".$words['word2']."'  AND tagset_word2 = '".$words['tag2']."' ".$subsql2)->execute();
        }
    }
}