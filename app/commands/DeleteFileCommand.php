<?php

class DeleteFileCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        $db = Yii::app()->db;
        vdump($this->params);
        $transaction = $db->beginTransaction();
        try {
            $db->createCommand("DELETE FROM c_mapping_file WHERE file_id = ".$this->params."; DELETE FROM c_phrase WHERE file_id =".$this->params)->execute();
            $db->createCommand("TRUNCATE c_word RESTART IDENTITY; ALTER SEQUENCE phrase_id_seq RESTART WITH 1")->execute();
            $db->createCommand("INSERT INTO c_word SELECT nextval('phrase_id_seq') id, COALESCE(word, phrase) word, SUM(count) count, tagset FROM c_mapping_file WHERE is_ignored = 'N' GROUP BY word, phrase, tagset ORDER BY word ASC")->execute();
            $db->createCommand("DELETE FROM file WHERE id = ".$this->params)->execute();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            vdump($e);
            throw $e;
        } catch(\Throwable $e) {
            $transaction->rollBack();
            vdump($e);
            throw $e;
        }
    }
}