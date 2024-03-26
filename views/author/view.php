<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Author $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/js/subscribe.js', ['depends' => [JqueryAsset::class]]);
?>
<script>
    window.urlSubscribe = '<?= Url::to(['author/subscribe', 'id' => $model->id]) ?>'
</script>

<div class="author-view">

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

        <?= Yii::$app->user->isGuest ? Html::button('Subscribe', ['class' => 'btn btn-success btn-subscribe']) : null ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'books',
                'format' => 'raw',
                'value' => function ($model, $widget) {
                    $view = [];
                    foreach ($model->bookAuthors as $author) {
                        $url = Url::to(['book/view', 'id' => $author->id_book]);
                        $view[] = "<a href='$url'>{$author->book->name}</a>";
                    }
                    return implode(', ', $view);
                }
            ],
        ],
    ]) ?>

</div>
