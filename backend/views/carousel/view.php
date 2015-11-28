<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Carousel */

$this->title = $model->caption;
$this->params['breadcrumbs'][] = ['label' => 'Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carousel-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'image_path',
            'image_link',
            'caption',
            'carousel_order',
            [
                'attribute' => 'is_target_self',
                'value' => $model->is_target_self == 1 ? 'YES' : 'NO'
            ],
            'status',
            [
                'attribute' => 'file',
                'value' => $model->image_path,
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
        ],
    ]) ?>

    <p tyle="text-align: right">
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
