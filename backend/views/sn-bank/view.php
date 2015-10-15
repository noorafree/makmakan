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
            'id',
            'bank',
           
        ],
    ]) ?>

</div>
