<?php

Yii::import("app.modules.admin.forms.exceptions.*");

class ExceptionsController extends Controller { 
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminExceptionsMaster');
    }
    
     public function actionNew(){
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        if (!is_null($_POST)) {
            $model = new AdminExceptionsMaster;
            $model->word = $_POST['data']['word'];
            if($model->save()){
                echo 'Data berhasil disimpan';
            }
            else{
                echo 'Gagal disimpan';
            }
        }
        
    }
}
