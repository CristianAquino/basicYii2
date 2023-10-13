<?php

use app\models\StateSudaCountry;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\ActiveFormAsset;
use app\models\SudaCountry;
use yii\helpers\ArrayHelper;

ActiveFormAsset::register($this);
?>
<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Name') ?>
<?= $form->field($model, 'password')->passwordInput()->label('Password') ?>
<?= $form->field($model, 'email')->input('email')->label('Email') ?>
<!-- esto permite el ingreso de files multiple -->
<?= $form->field($model, 'inputFiles[]')->fileInput(['multiple' => true])->label('Files') ?>
<h3>Listas</h3>
<ul class="list-group">
    <li class="list-group-item">
        <h4>Lista desplegable</h4>
        <?= $form->field($model, 'gender')->dropDownList(['m' => 'Male', 'f' => 'Female'], ['prompt' => 'Select Gender']) ?>
    </li>
    <li class="list-group-item">
        <h4>Lista desplegable desde DB</h4>
        <?= $form->field($model, 'country')->dropDownList(
            ArrayHelper::map(SudaCountry::find()->all(), 'country_id', 'country'),
            ['prompt' => 'Select Country', 'onchange' => '$.post("index?r=entry/lists&id=' . '"+$(this).val(), function(data){$("select#state").html(data);});']
        );
        ?>
    </li>
    <li class="list-group-item">
        <h4>Lista desplegable desde DB</h4>
        <?= $form->field($model, 'state')->dropDownList(ArrayHelper::map(StateSudaCountry::find()->all(), 'fk_country', 'state'), ['prompt' => 'Select State']) ?>
    </li>
    <li class="list-group-item">
        <h4>Lista de radio</h4>
        <?= $form->field($model, 'gender')->radioList([1 => 'radio 1', 2 => 'radio2']) ?>
    </li>
    <li class="list-group-item">
        <h4>Lista de casilla de verificacion</h4>
        <?= $form->field($model, 'items')->checkboxList(['a' => 'Item A', 'b' => 'Item B', 'c' => 'Item C']) ?>
    </li>
</ul>
<?= $form->field($model, 'country') ?>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

<?php
if ($data) {
    echo Html::tag('h3', 'Datos ingresado');
    foreach ($data as $value) {
        echo Html::tag('div', Html::encode($value), ['class' => 'alert alert-warning']);
    }
}
?>