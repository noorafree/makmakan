<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SnDeliveryAgent */

$this->title = 'Create Sn Delivery Agent';
$this->params['breadcrumbs'][] = ['label' => 'Sn Delivery Agents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-delivery-agent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
