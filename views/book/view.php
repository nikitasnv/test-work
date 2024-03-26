<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Book $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= !Yii::$app->user->isGuest ? Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : null ?>
        <?= !Yii::$app->user->isGuest ? Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) : null ?>
    </p>

    <?= Html::img("uploads/$model->id", ['height' => 300]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'created',
            'about',
            'isbn',
            [
                'attribute' => 'authors',
                'format' => 'raw',
                'value' => function ($model, $widget) {
                    $view = [];
                    foreach ($model->bookAuthors as $author) {
                        $url = Url::to(['author/view', 'id' => $author->id_author]);
                        $view[] = "<a href='$url'>{$author->author->name}</a>";
                    }
                    return implode(', ', $view);
                }
            ],
        ],
    ]) ?>

</div>
