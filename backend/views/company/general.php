<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = 'Update Company: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-update">

    <div class="general-form">

        <div class="row">
            <div class="box box-primary">
                <div class="box-body">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'twitter_url')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'facebook_url')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'instagram_url')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'gplus_url')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'logo_path')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'favicon_path')->textInput(['maxlength' => true]) ?>
                  
                    <?= $form->field($model, 'slider_amount')->textInput() ?>

                    <div class="form-group pull-right">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>

</div>

