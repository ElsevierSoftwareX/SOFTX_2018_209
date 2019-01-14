<?php

Yii::import("app.modules.admin.forms.wordClass.*");

class WordClassController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminWordClassIndex');
    }

    public function actionNew() {
        $model = new AdminWordClassForm;
        if (isset($_POST["AdminWordClassForm"])) {
            $model->attributes = $_POST["AdminWordClassForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }

        $this->renderForm("AdminWordClassForm", $model);
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, "AdminWordClassForm");
        if (isset($_POST["AdminWordClassForm"])) {
            $model->attributes = $_POST["AdminWordClassForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['update', 'id' => $id]);
            }
        }
        $this->renderForm("AdminWordClassForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminWordClassForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminWordClassForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
