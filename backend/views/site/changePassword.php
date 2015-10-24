<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('app', 'Modify Password');
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-form">
    <div class="box box-primary">

        <div class="box-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'oldpassword')->passwordInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255])->label(Yii::t('app', 'New Password')) ?>

            <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 255]) ?>

            <div class="form-group pull-right">
                <?= Html::submitButton('Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
