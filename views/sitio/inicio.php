<?php

use app\models\Country;
use app\models\State;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<?php $formulario = ActiveForm::begin(); ?>
<?= $formulario->field($model, 'valorA')->textInput(['autofocus' => true])  ?>
<?= $formulario->field($model, 'valorB')  ?>
<!-- importante conocer el id del input para que los datos
puedan ser visualizados donde corresponde -->
<!-- para que funcione se quito las clean urls en config/web  -->
<?= $formulario->field($model, 'country')->dropDownList(ArrayHelper::map(Country::find()->all(), 'country_id', 'country'), ['prompt' => 'Selecciona un país', 'onchange' => '$.post("index.php?r=state/lists&id=' . '"+$(this).val(),function(data){$("select#formularioform-state").html(data);})'])  ?>

<?= $formulario->field($model, 'state')->dropDownList(ArrayHelper::map(State::find()->all(), 'state_id', 'state'), ['prompt' => 'Selecciona un estado'])  ?>

<?php
if ($mensaje) {
    echo Html::tag('div', Html::encode($mensaje), ['class' => 'alert alert-success']);
}
?>


<div class="form-group">
    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
</div>

<?php $formulario->end(); ?>