<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\FormularioForm;

class SitioController extends Controller
{
    public function actionInicio()
    {
        $model = new FormularioForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $resultado = $model->valorA + $model->valorB;
            $mensaje = "La suma es: $resultado";
            return $this->render('inicio', ['model' => $model, 'mensaje' => $mensaje]);
        }
        return $this->render('inicio', ['model' => $model, 'mensaje' => '']);
    }
    // para ejecutar un nuevo action debe usar redirect
    // return Yii::$app->getResponse()->redirect('crear');
    // public function actionCrear()
    // {
    //     return $this->render('crear');
    // }
}
