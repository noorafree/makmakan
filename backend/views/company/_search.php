<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'slider_amount') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'about_us') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'twitter_url') ?>

    <?php // echo $form->field($model, 'facebook_url') ?>

    <?php // echo $form->field($model, 'instagram_url') ?>

    <?php // echo $form->field($model, 'gplus_url') ?>

    <?php // echo $form->field($model, 'terms_and_condition') ?>

    <?php // echo $form->field($model, 'purchashing_guide') ?>

    <?php // echo $form->field($model, 'payment_guide') ?>

    <?php // echo $form->field($model, 'delivery_guide') ?>

    <?php // echo $form->field($model, 'return_policy') ?>

    <?php // echo $form->field($model, 'privacy_policy') ?>

    <?php // echo $form->field($model, 'logo_path') ?>

    <?php // echo $form->field($model, 'favicon_path') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'last_modified_by') ?>

    <?php // echo $form->field($model, 'last_modified_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
