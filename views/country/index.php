<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>Paises</h1>
<ul class="list-group">
    <?php foreach ($countries as $country) : ?>
    <li class="list-group-item ">
        <?= Html::encode("{$country->name} {$country->code}") ?>
        <?= $country->population ?>
    </li>
    <?php endforeach ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination, 'class' => 'pagination']) ?>