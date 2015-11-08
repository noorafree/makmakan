<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SnBank */

$this->title = $model->bank;
$this->params['breadcrumbs'][] = ['label' => 'Sn Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-bank-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bank',
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
