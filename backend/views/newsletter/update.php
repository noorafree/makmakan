<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Newsletter */

$this->title = 'Update Newsletter : ' . ' ' . $model->subject;
$this->params['breadcrumbs'][] = ['label' => 'Newsletters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subject, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="newsletter-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
