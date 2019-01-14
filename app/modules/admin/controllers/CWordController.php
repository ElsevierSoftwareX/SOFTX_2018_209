<?php

Yii::import("app.modules.admin.forms.cWord.*");

class CWordController extends Controller { 
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $model = new AdminCWordMaster;
        if (!empty($_POST)) {
            $model = ActiveRecord::batchPost($model, $_POST, 'dataSource1');
            if ($model->hasErrors()) {
                $this->flash('Data Berhasil Di-update');
                $this->redirect(['index']);
            }
        }
        $this->renderForm('AdminCWordMaster', $model);
    }
}
