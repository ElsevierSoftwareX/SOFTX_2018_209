<?php

class UpdateWordCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        $fileid = $this->params['fileid'];
        $wordNew = $this->params['wordNew'];
        $tagNew = $this->params['tagNew'];
        $wordOld = $this->params['wordOld'];
        $tagOld = $this->params['tagOld'];
        $idMappingFile = $this->params['idMappingFile'];
        $isWord = $this->params['isWord'];
        
        $cmappingFile = Yii::app()->db->createCommand('SELECT * FROM c_mapping_file WHERE id = '.$idMappingFile)->queryRow();
        
        #update file
        if($wordNew!=$wordOld){
            $file = Yii::app()->db->createCommand('SELECT * FROM file WHERE id = '.$fileid)->queryRow();
            $content = str_replace('???','',$file['content']);
            
            $temp = preg_split('/'.strtolower($wordOld).'/', strtolower($content));
            $occured = 0;   
            if($isWord=='Y')
                $occured = Yii::app()->db->createCommand('SELECT COUNT (*) FROM c_mapping_file WHERE position <= '.$cmappingFile['position']." AND (word = '".strtolower($wordOld)."')")->queryScalar();
            else
                $occured = Yii::app()->db->createCommand('SELECT COUNT (*) FROM c_mapping_file WHERE position <= '.$cmappingFile['position']." AND (phrase = '".strtolower($wordOld)."')")->queryScalar();
            
            $idx = 0;
            $pos = 0;
            foreach($temp as $t){
                $idx = $idx+strlen($t);
                if($idx>0){
                    if(!ctype_alnum(substr($content, $idx-1, 1))&&!ctype_alnum(substr($content, ($idx+strlen($wordOld)), 1))){
                        $pos++;
                    }    
                } else if(!ctype_alnum(substr($content, ($idx+strlen($wordOld)), 1))){
                    $pos++;
                }
                
                if($pos == $occured){
                    break;
                } 
                $idx = $idx + strlen($wordOld);
            }
            
            if(strlen($content)!=$idx+strlen($wordOld)){
                $contentNew = substr($content, 0, $idx) . $wordNew . substr($content, $idx+strlen($wordOld));
            }
            else{
                $contentNew = substr($content, 0, $idx) . $wordNew;
                
            }
            Yii::app()->db->createCommand("UPDATE file SET content = '".str_replace("'", "''", $contentNew)."' WHERE id = ".$fileid)->execute();
        }
    }
}