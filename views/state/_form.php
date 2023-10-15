<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Country;

/** @var yii\web\View $this */
/** @var app\models\State $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="state-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <!-- iteramos los elementos de la tabla country en un droplist para poder seleccionarlos  -->
    <?= $form->field($model, 'fk_country')->dropDownList(ArrayHelper::map(Country::find()->all(), 'country_id', 'country'), ['prompt' => 'Select Country']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>