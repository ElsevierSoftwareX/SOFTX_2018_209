<?php

class IndexController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }
    
    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']], ['deny']];
    }
    
    public function actionIndex() {
        // Tampilan awal
        $this->renderForm("AdminIndex");
    }
    
    public function actionSync(){
        ServiceManager::run('SyncFile');
        $this->redirect(['index']);
    }
    
    public function actionCheck($id=0) {
        $params['id'] = $id;
        $params['arrTagset'] = Yii::app()->db->createCommand("SELECT '|'||code||'|' code, description FROM m_tagset")->queryAll();
        $this->renderForm("AdminCheckingWord", null, $params);
    }
    
    public function actionGetProcessStatus(){
        $_POST = json_decode(file_get_contents('php://input'), true);
        $cfiles = Yii::app()->db->createCommand('SELECT COALESCE(COUNT(1),0) FROM file')->queryScalar();
        $cfilesprocess = Yii::app()->db->createCommand('SELECT COALESCE(COUNT(DISTINCT file_id),0) FROM c_phrase')->queryScalar();
        echo $cfilesprocess.' of '.$cfiles;
    }
    
    public function actionCheckPhrase($id=0) {
        $params['id'] = $id;
        $this->renderForm("AdminCheckingPhrase", null, $params);
    }
    
    public function actionTambahFile() {
        // Upload file
        if(isset($_POST['AdminTambah'])) {
            $params['data'] = [];
            
            //array weird character
            $arrReplace = ['ﬁ'=>'fi', 'ﬂ'=>'fl','–'=>'-', '“'=>'"','”'=>'"','≥'=>'>=','≤'=>'<=', 'i»¿'=>''];
            foreach($_POST['AdminTambah']['uploads'] as $stuff ) {
                $model = new File;
                $explode = (explode("/", $stuff['file_url']));    
                $namafile = end($explode);
         
                if (strpos($namafile, "_") !== false) {
                    $explode2 = explode("_",$namafile);
                    $nfileasli = $explode2[0].".txt";
                }
                else{
                    $nfileasli = $namafile;
                }
                
                $content = file_get_contents($stuff['file_url'], FILE_USE_INCLUDE_PATH);
                
                $uploads_dir = 'repo';
                if (!copy($stuff['file_url'],"$uploads_dir/$nfileasli" )) {
                    echo "failed to copy $file...\n";
                } else {
                    unlink($stuff['file_url']);
                }
                $datatxt = $content;
                $datatxt = preg_replace('/&(.)(acute|cedil|circ|lig|grave|ring|tilde|uml);/', "$1", $datatxt);
                
                //jaga-jaga kalau masih ada weird character
                $datatxt = strtr($datatxt, $arrReplace);
                
                $model->name = $nfileasli;
                $model->file_url = "$uploads_dir/$nfileasli";
                $model->content = $datatxt;
                $model->category = $stuff['category'];
                $model->created_date = date('Y-m-d H:i:s');
                if($model->save()){
                    $tmp['id'] = $model->id;
                    $tmp['content'] = $model->content;
                    $params['data'][] = $tmp;
                }
            }
            ServiceManager::run('InsertFile', $params);
            $this->flash('Successfully Inserted');
        }    
        $this->renderForm("AdminTambah");
    }
    
    
    public function actionUpdate(){
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        if (!is_null($_POST)) {
            $fileid = $_POST['data']['fileid'];
            $tmp = File::model()->findByPk($fileid);
            $tmp->is_checked = 'Y';
            $tmp->save();
            
            if($_POST['data']['isWord']=='Y'){
                Yii::app()->db->createCommand("UPDATE c_mapping_file SET word = '".strtolower($_POST['data']['wordNew'])."', tagset = '".$_POST['data']['tagNew']."' WHERE id = ".$_POST['data']['idMappingFile'])->execute();
            }
            else{
                Yii::app()->db->createCommand("UPDATE c_mapping_file SET phrase = '".strtolower($_POST['data']['wordNew'])."', tagset = '".$_POST['data']['tagNew']."' WHERE id = ".$_POST['data']['idMappingFile'])->execute();
            }
            
            if($_POST['data']['wordNew']==$_POST['data']['wordOld']){
                echo 'Success';
            }
            else{
                ServiceManager::run('UpdateWord',$_POST['data']);
                echo 'Please wait...';
            }
        }
        echo '';
    }
    
    public function actionDelete($id){
        $params['file_id'] = $id;
        ServiceManager::run('DeleteFile',$id);
        $this->flash('Please wait');
        $this->redirect(['index']);
    }
    
    public function actionUpdateAll(){
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        if (!is_null($_POST)) {
            ServiceManager::run('UpdateAllMappingFileWord',$_POST['data']);
            echo 'Please wait...';
        }
        echo '';
    }
    
    public function actionIgnore(){
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        if (!is_null($_POST)) {
            $tmp = File::model()->findByPk($_POST['data']['fileid']);
            $tmp->is_checked = 'Y';
            $tmp->save();
            ServiceManager::run('IgnoreMappingFileWord',$_POST['data']);
            echo 'Please wait...';
        }
        echo '';
    }
    
    public function actionIgnoreAll(){
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        if (!is_null($_POST)) {
            ServiceManager::run('IgnoreAllMappingFileWord',$_POST['data']);
            echo 'Please wait...';
        }
        echo '';
    }
    
    public function actionIgnorePhrase(){
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        if (!is_null($_POST)) {
            $tmp = File::model()->findByPk($_POST['data']['fileid']);
            $tmp->is_checked = 'Y';
            $tmp->save();
            ServiceManager::run('IgnoreMappingFilePhrase',$_POST['data']);
            echo 'Please wait...';
        }
        echo '';
    }
    
    public function actionIgnorePhraseAll(){
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        if (!is_null($_POST)) {
            ServiceManager::run('IgnoreAllMappingFilePhrase',$_POST['data']);
            echo 'Please wait...';
        }
        echo '';
    }
}