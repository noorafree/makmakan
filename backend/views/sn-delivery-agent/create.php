<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SnDeliveryAgent */

$this->title = 'Create Sn Delivery Agent';
$this->params['breadcrumbs'][] = ['label' => 'Sn Delivery Agents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-delivery-agent-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
