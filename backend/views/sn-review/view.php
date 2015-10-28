<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SnReview */

$this->title = $model->review;
$this->params['breadcrumbs'][] = ['label' => 'Sn Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-review-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'review',
            'icon_path',
            //'created_by',
            //'created_date',
            //'modified_by',
            //'modified_date',
            //'status',
        ],
    ]) ?>
    
    <p style="text-align: right">
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
