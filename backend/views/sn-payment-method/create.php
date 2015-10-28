<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SnPaymentMethod */

$this->title = 'Create Sn Payment Method';
$this->params['breadcrumbs'][] = ['label' => 'Sn Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-payment-method-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
