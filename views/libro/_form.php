<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Libro $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?> -->
    <!-- agregamos una prevosualizacion de la imagen previa  -->
    <?= Html::img('@web/' . $model->image, ['width' => '200px']) ?>
    <!-- cambiamos de un textoinput a fileinput  -->
    <?= $form->field($model, 'archivo')->fileInput()  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>