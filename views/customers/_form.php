<?php

use app\models\Locations;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Customers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
    <!-- agregamos el zid code de la base de datos  -->
    <?= $form->field($model, 'zip_code')->dropDownList(ArrayHelper::map(Locations::find()->all(), 'location_id', 'zip_code'), ['prompt' => 'Select Zid Code']) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!-- agregamos el js para llenar campos relacionados
en el formulario -->
<?php
$script = <<< JS
$('#customers-zip_code').change(function(){
    let zidId = $(this).val()
    $.get('index.php?r=locations/get-city-province',{zidId:zidId},function(data){
        const nuevo = $.parseJSON(data)
        $('#customers-city').attr('value',nuevo.city)
        $('#customers-province').attr('value',nuevo.province)
    })
})
JS;
$this->registerJs($script);
?>