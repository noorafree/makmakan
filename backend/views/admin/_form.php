<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Admin;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <div class="row">
        <div class="box box-primary">
            <div class="box-body">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => 30]) ?>

                <?=
                $form->field($model, 'birthdate')->widget(
                        DatePicker::className(), [
                    'inline' => false,
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d'
                    ]
                ]);
                ?>

                <?= $form->field($model, 'address')->textArea(['rows' => '6', 'maxlength' => 255]) ?>



                <?= $form->field($model, 'file')->fileInput(); ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

                <?php if (Yii::$app->controller->action->id != 'update') { ?>
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>

                    <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 255]) ?>
                <?php } ?>

                <?= $form->field($model, 'auth_role')->dropDownList(Admin::getArrayAuthRole()) ?>

                <div class="form-group pull-right">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
