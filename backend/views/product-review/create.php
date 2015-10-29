<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductReview */

$this->title = 'Create Product Review';
$this->params['breadcrumbs'][] = ['label' => 'Product Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
