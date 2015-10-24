<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AuthRole */

$this->title = 'Create ' . 'Auth Role';
$this->params['breadcrumbs'][] = ['label' => 'Auth Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-role-create">

    <?= $this->render('_form', [
        'model' => $model,
        'operations' => $operations,
    ]) ?>

</div>
