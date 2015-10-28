<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SnPaymentMethod */

$this->title = 'Create Sn Payment Method';
$this->params['breadcrumbs'][] = ['label' => 'Sn Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-payment-method-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
