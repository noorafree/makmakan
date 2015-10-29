<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Subscriber */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriber-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'email:email',
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
