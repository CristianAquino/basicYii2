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

    <!-- agregamos el id al formulario para poder hacer submit usando ajax  -->
    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <!-- iteramos los elementos de la tabla country en un droplist para poder seleccionarlos  -->
    <?= $form->field($model, 'fk_country')->dropDownList(ArrayHelper::map(Country::find()->all(), 'country_id', 'country'), ['prompt' => 'Select Country']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!-- haciendo submitting usando ajax -->
<?php $script = <<<JS
$('form#{$model->formName()}').on('beforeSubmit', function(e) {
    var \$form = $(this);
    $.post(
        \$form.attr("action"), // serialize Yii2 form
        \$form.serialize()
    )
    .done(function(result) {
        if(result == 1) {
            $(\$form).trigger("reset");
            $.pjax.reload({container:'#stateGrid'});
        }else{
            $('#message').html(result);
        }
    })
    .fail(function() {
        console.log("server error");
    });
    return false;
})
JS;
$this->registerJs($script);
?>