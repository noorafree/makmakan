<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Advertiser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Advertisers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertiser-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'address',
            'phone',
            'mobile',
            'email:email',
            'company',
//            'status',
//            'created_by',
//            'created_date',
//            'modified_by',
//            'modified_date',
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
