<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SnBank */

$this->title = 'Update Sn Bank: ' . ' ' . $model->bank;
$this->params['breadcrumbs'][] = ['label' => 'Sn Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sn-bank-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
