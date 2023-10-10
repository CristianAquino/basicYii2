<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;

class EntryController  extends Controller
{
    public function actionIndex()
    {
        $model = new EntryForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('index', ['model' => $model, 'data' => $model]);
        }
        return $this->render('index', ['model' => $model, 'data' => '']);
    }

    public function urlForFiles($model)
    {
        echo $model;
    }
}
