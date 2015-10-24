<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SnProductCategory */

$this->title = 'Create Sn Product Category';
$this->params['breadcrumbs'][] = ['label' => 'Sn Product Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-product-category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
