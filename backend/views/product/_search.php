<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'plu') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'selling_price') ?>

    <?= $form->field($model, 'sn_product_category_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'seen') ?>

    <?php // echo $form->field($model, 'sold') ?>

    <?php // echo $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'is_po') ?>

    <?php // echo $form->field($model, 'po_start_date') ?>

    <?php // echo $form->field($model, 'po_end_date') ?>

    <?php // echo $form->field($model, 'expired_date') ?>

    <?php // echo $form->field($model, 'is_non_halal') ?>

    <?php // echo $form->field($model, 'minimum_order') ?>

    <?php // echo $form->field($model, 'is_ready_for_order') ?>

    <?php // echo $form->field($model, 'featured') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'meta_tag') ?>

    <?php // echo $form->field($model, 'meta_description') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
