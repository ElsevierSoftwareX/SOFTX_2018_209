<?php

class UpdateImportFileCommand extends Service {
    public function actionIndex() {
        ## Put your code here
        $host        = '139.162.58.63';
        $dbname      = 'partofspeech';
        $username    = 'postgres';
        $password    = 'okedeh';
        
        $dbc = pg_connect("host=".$host." port = 5432 dbname=".$dbname." user=".$username." password=".$password);
        
        $fileArr = Yii::app()->db->createCommand('SELECT * FROM file ORDER BY id')->queryAll();
        foreach($fileArr as $file){
            $query = "SELECT * FROM file WHERE id = ".$file['id'];
            $results = pg_query($dbc, $query) or die("Error in query: $query" . pg_last_error($dbc));
            $arr = pg_fetch_all($results);
            if($arr[0]['id']==$file['id']){
                $content = str_replace("'","''", $arr[0]['content']);
            }
            else{
                $content = '??????';
            }   
            Yii::app()->db->createCommand("UPDATE file SET content = '".$content."' WHERE id = ".$file['id'])->execute();    
        }
        pg_close();
    }
}