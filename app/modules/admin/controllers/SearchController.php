<?php

Yii::import("app.modules.admin.forms.*");

class SearchController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }
    
    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']], ['deny']];
    }
    
    public function actionIndex() {
        // Tampilan awa
        $this->renderForm("AdminSearch");
    }
}