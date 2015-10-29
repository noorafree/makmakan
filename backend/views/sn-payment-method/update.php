<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SnPaymentMethod */

$this->title = 'Update Sn Payment Method: ' . ' ' . $model->payment_method;
$this->params['breadcrumbs'][] = ['label' => 'Sn Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_method, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sn-payment-method-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
