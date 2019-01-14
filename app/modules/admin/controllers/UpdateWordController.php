<?php

Yii::import("app.modules.admin.forms.updateWord.*");

class UpdateWordController extends Controller { 
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }   
    
    public function actionNew(){
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        if (!is_null($_POST)) {
            
            if(strpos($_POST['data']['tagnew'], '|')===false){
                $_POST['data']['tagnew'] = '|'.str_replace(',','|,|',$_POST['data']['tagnew']).'|';
            }
            if(strpos($_POST['data']['tagold'], '|')===false){
                $_POST['data']['tagold'] = '|'.str_replace(',','|,|',$_POST['data']['tagold']).'|';
            }
            
            $model = new AdminUpdateWordMaster;
            $model->old_word = $_POST['data']['wordold'];
            $model->new_word = $_POST['data']['wordnew'];
            $model->tagset_old = $_POST['data']['tagold'];
            $model->tagset_new = $_POST['data']['tagnew'];
            $model->created_date = date('Y-m-d H:i:s');
            if($model->save()){
                echo 'Data berhasil disimpan';
            }
            else{
                echo 'Gagal disimpan';
            }
        }
        
    }
    
    public function actionIndex() {
        $this->renderForm('AdminUpdateWordMaster');
    }
    
    public function actionDelete($id){
        $model = UpdateWord::model()->deleteByPk($id);
    }
}
