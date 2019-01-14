<?php

Yii::import("app.modules.admin.forms.file.*");

class FileController extends Controller {
    public function filters() {
        // Use access control filter
        return ['accessControl'];
    }

    public function accessRules() {
        // Only allow authenticated users
        return [['allow', 'users' => ['@']],['deny']];
    }
    
    public function actionIndex() {
        $this->renderForm('AdminFileIndex');
    }

    public function actionNew() {
        $model = new AdminFileForm;
        if (isset($_POST["AdminFileForm"])) {
            $model->attributes = $_POST["AdminFileForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['index']);
            }
        }

        $this->renderForm("AdminFileForm", $model);
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, "AdminFileForm");
        if (isset($_POST["AdminFileForm"])) {
            $model->attributes = $_POST["AdminFileForm"];
            if ($model->save()) {
                $this->flash('Data Berhasil Disimpan');
                $this->redirect(['update', 'id' => $id]);
            }
        }
        $this->renderForm("AdminFileForm", $model);
    }

    public function actionDelete($id) {
        if (strpos($id, ',') > 0) {
            ActiveRecord::batchDelete("AdminFileForm", explode(",", $id));
            $this->flash('Data Berhasil Dihapus');
        } else {
            $model = $this->loadModel($id, "AdminFileForm");
            if (!is_null($model)) {
                $this->flash('Data Berhasil Dihapus');
                $model->delete();
            }
        }


        $this->redirect(['index']);
    }
    
}
