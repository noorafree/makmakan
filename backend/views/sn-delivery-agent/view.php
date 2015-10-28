<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SnDeliveryAgent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sn Delivery Agents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-delivery-agent-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'delivery_agent',
            'created_by',
            'created_date',
            'modified_by',
            'modified_date',
            'status',
        ],
    ]) ?>

</div>
