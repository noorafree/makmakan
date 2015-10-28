<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SnReview */

$this->title = 'Update Sn Review: ' . ' ' . $model->review;
$this->params['breadcrumbs'][] = ['label' => 'Sn Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->review, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sn-review-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
