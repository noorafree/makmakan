<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\SnProductCategory;

/* @var $this yii\web\View */
/* @var $model common\models\SnProductCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sn-product-category-form">
    <div class="row">
        <div class="box box-primary">
            <div class="box-body">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'category')->textInput(['maxlength' => 100]) ?>

                <div class="form-group pull-right">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
