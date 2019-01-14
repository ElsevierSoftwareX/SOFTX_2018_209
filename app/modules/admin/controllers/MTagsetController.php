<?php

Yii::import("app.modules.admin.forms.mTagset.*");

class MTagsetController extends Controller { 
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $model = new AdminMTagsetMaster;
        if (!empty($_POST['dataSource1Update'])) {
            $obj = json_decode($_POST['dataSource1Update']);
            foreach($obj as $o){
                if(!Yii::app()->db->createCommand("UPDATE m_tagset SET description = $$".$o->description."$$ WHERE id = '".$o->id."'")->execute()){
                    $this->flash('Gagal mengupdate data');
                    $this->redirect(['index']);
                }
            }
            $this->flash('Data Berhasil Di-update');
            $this->redirect(['index']);
        }
        $this->renderForm('AdminMTagsetMaster', $model);
    }
}
