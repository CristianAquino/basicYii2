<?php

use app\models\State;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StateSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'States';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create State', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // editamos estilos de paginacion
        'pager' => [
            'options' => [
                'tag' => 'ul',
                'class' => 'pagination',
            ],
            'linkOptions' => ['class' => 'page-link'],
            'disabledPageCssClass' => 'disabled',
            'pageCssClass' => ['class' => 'page-item'],

        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'state_id',
            'state',
            [
                'attribute' => 'fk_country',
                'value' => 'fkCountry.country'

            ],
            // reemplazamos el id por el nombre del pais
            // lo malo es que remueve el filtro de busqueda
            // 'fkCountry.country',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, State $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'state_id' => $model->state_id]);
                }
            ],


        ],
    ]); ?>


</div>