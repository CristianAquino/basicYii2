<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;
use app\models\StateSudaCountry;

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

    public function actionLists($id)
    {
        $countState = StateSudaCountry::find()->where(['fk_country' => $id])->count();
        $states = StateSudaCountry::find()->where(['fk_country' => $id])->all();
        if ($countState > 0) {
            foreach ($states as $s) {
                echo "<option value='$s->id'>$s->state</option>";
            }
        } else {
            echo "<option value=''>No State</option>";
        }
    }
}