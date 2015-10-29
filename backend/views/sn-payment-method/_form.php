<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SnPaymentMethod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sn-payment-method-form">
    <div class="row">
        <div class="box box-primary">
            <div class="box-body">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'payment_method')->textInput(['maxlength' => 50]) ?>

                <div class="form-group pull-right">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
                
            </div>
        </div>
    </div>
</div>
