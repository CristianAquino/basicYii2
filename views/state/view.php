<?php

use app\models\Country;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\State $model */

$this->title = $model->state_id;
$this->params['breadcrumbs'][] = ['label' => 'States', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="state-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'state_id' => $model->state_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'state_id' => $model->state_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'state_id',
            'state',
            // 'fk_country',
            // editando data
            [
                'label' => 'Country',
                'value' => Country::find()->where(['country_id' => $model->fk_country])->one()->country,
            ],
        ],
    ]) ?>

</div>