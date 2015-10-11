<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('app', 'Modify Password');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-form">
	<div class="box box-primary">
	    <?php $form = ActiveForm::begin(); ?>
	    <div class="box-body">

		    <?= $form->field($model, 'oldpassword')->passwordInput(['maxlength' => 255]) ?>

		    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255])->label(Yii::t('app', 'Newpassword')) ?>

		    <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 255]) ?>

		    <div class="form-group">
		        <?= Html::submitButton('Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>
	    </div>
	    <?php ActiveForm::end(); ?>
	</div>
</div>
