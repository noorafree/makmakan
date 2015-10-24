<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AuthRole */

$this->title = 'Update ' . 'Access Level : ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Access Level', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auth-role-update">

    <?= $this->render('_form', [
        'model' => $model,
        'operations' => $operations,
    ]) ?>

</div>
