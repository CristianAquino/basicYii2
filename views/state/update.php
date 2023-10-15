<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\State $model */

$this->title = 'Update State: ' . $model->state_id;
$this->params['breadcrumbs'][] = ['label' => 'States', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->state_id, 'url' => ['view', 'state_id' => $model->state_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="state-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
