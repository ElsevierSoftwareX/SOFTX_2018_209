<?php

class IgnoreAllMappingFileWordCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        $word = $this->params['word'];
        $tagset = $this->params['tagset'];
        if(strpos($tagset, '|')===false){
            $tagset = '|'.str_replace(',','|,|',$tagset).'|';
        }
        
        Yii::app()->db->createCommand("INSERT INTO exceptions VALUES(DEFAULT,'".$word."', null)")->execute();
        
        if(Yii::app()->db->createCommand("UPDATE c_mapping_file SET is_ignored = 'Y' WHERE word = '".$word."'")->execute()){
            $count = Yii::app()->db->createCommand("SELECT SUM(wordcount) FROM c_mapping_file WHERE word = '".$word."' AND is_ignored = 'N'")->queryScalar();
            $count = $count? $count:0;
            if($count==0){
                Yii::app()->db->createCommand("DELETE FROM c_word WHERE word = '".$word."'")->execute();
            }
            else{
                Yii::app()->db->createCommand("UPDATE c_word SET count = ".$count." WHERE word = '".$word."'")->execute();
            }
        }
        
        #update c_mapping_file frase
        Yii::app()->db->createCommand("UPDATE c_mapping_file cmf
                                      SET is_ignored = 'Y'
                                      WHERE id IN(
                                        SELECT cmf.id
                                        FROM (
                                          SELECT DISTINCT phrase
                                          FROM mapping_file mf
                                          WHERE word = '".$word."') a
                                        INNER JOIN c_mapping_file cmf ON cmf.phrase = a.phrase)")->execute();
        
        #update c_phrase
        $lists = Yii::app()->db->createCommand("SELECT *
                                                FROM c_phrase cf
                                                WHERE cf.word1 = '".$word."' OR cf.word2 = '".$word."' OR cf.word3 = '".$word."' ")->queryAll();
        foreach($lists as $l){
            $phrase = $l['phrase'];
            $tmpTagset = '';
            if($l['word1']==$word){
                $tmpTagset = $l['tagset_word1'];
            }
            else if($l['word2']==$word){
                $tmpTagset = $l['tagset_word2'];
            }
            else if($l['word3']==$word){
                $tmpTagset = $l['tagset_word3'];
            }
            $count = Yii::app()->db->createCommand("SELECT SUM(cmf.phrasecount)
                                                    FROM (
                                                        SELECT mf.file_id, mf.phrase
                                                        FROM  mapping_file mf
                                                        WHERE mf.phrase = '".$phrase."' AND mf.word = '".$word."' AND mf.tagset = '".$tmpTagset."'
                                                        GROUP BY mf.file_id, mf.phrase) a
                                                    INNER JOIN c_mapping_file cmf ON a.file_id = cmf.file_id AND a.phrase = cmf.phrase AND cmf.is_ignored = 'N' 
                                                    GROUP BY cmf.phrase")->queryScalar();
            $count = $count? $count:0;
            Yii::app()->db->createCommand("UPDATE c_phrase SET count = ".$count." WHERE id = '".$l['id']."'")->execute();
        }
        
        Yii::app()->db->createCommand("DELETE FROM c_phrase WHERE count = 0")->execute();
    }
}