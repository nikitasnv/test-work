<?php

/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';

/** @var integer | null $created */
/** @var \yii\data\ActiveDataProvider $topList */
?>
<div class="site-index">
    <?= Html::beginForm(['/site/index'], 'GET'); ?>
    <?= Html::textInput('created', $created); ?>
    <?= Html::submitButton('GET', ['class' => 'btn btn-primary']); ?>
    <?= Html::endForm(); ?>

    <div style="margin-bottom: 10px"></div>
    <?php
    echo GridView::widget([
        'dataProvider' => $topList,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'Author',
                "format" => 'raw',
                "value" => function ($data) {
                    $url = Url::to(['author/view', 'id' => $data['id']]);
                    return "<a href='$url'>{$data['name']}</a>";
                }
            ],
            'count'

        ]
    ]);
    ?>
</div>
