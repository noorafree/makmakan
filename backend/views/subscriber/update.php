<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subscriber */

$this->title = 'Update Subscriber: ' . ' ' . $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->email, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subscriber-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
