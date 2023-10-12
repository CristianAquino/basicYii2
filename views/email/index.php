<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\ActiveFormAsset;

?>

<?php $form = ActiveForm::begin(['id' => 'send-email-form', 'class' => 'form-horizontal']) ?>
<?= $form->field($model, 'sendTo')->input('email') ?>
<?= $form->field($model, 'sendFrom')->input('email') ?>
<?= $form->field($model, 'subjectEmail')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
<?= $form->field($model, 'archivo')->fileInput()->label('Attachement')  ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>