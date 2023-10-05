<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<?php $formulario = ActiveForm::begin(); ?>
<?= $formulario->field($model, 'valorA')->textInput(['autofocus' => true])  ?>
<?= $formulario->field($model, 'valorB')  ?>

<?php
if ($mensaje) {
    echo Html::tag('div', Html::encode($mensaje), ['class' => 'alert alert-success']);
}
?>


<div class="form-group">
    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
</div>

<?php $formulario->end(); ?>