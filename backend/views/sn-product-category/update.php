<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SnProductCategory */

$this->title = 'Update Sn Product Category: ' . ' ' . $model->category;
$this->params['breadcrumbs'][] = ['label' => 'Sn Product Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sn-product-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
