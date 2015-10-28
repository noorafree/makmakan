<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SnDeliveryAgent */

$this->title = 'Update Sn Delivery Agent: ' . ' ' . $model->delivery_agent;
$this->params['breadcrumbs'][] = ['label' => 'Sn Delivery Agents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->delivery_agent, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sn-delivery-agent-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
