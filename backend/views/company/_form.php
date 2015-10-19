<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slider_amount')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about_us')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'twitter_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instagram_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gplus_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'terms_and_condition')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'purchashing_guide')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'payment_guide')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'delivery_guide')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'return_policy')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'privacy_policy')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'logo_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'favicon_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'last_modified_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_modified_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
