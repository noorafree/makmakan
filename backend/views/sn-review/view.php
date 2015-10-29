<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SnReview */

$this->title = 'Review';
$this->params['breadcrumbs'][] = ['label' => 'Sn Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-review-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'review:html',
            [
                'attribute' => 'icon_path',
                'value' => $model->icon_path,
                'format' => ['image', ['width' => '50', 'height' => '50']],
            ],
        ],
    ])
    ?>
    <p style="text-align: right">
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?> 
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
