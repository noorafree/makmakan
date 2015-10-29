<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserComplaint */

$this->title = 'Update User Complaint: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Complaints', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-complaint-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
