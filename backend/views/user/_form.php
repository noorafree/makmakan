<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\SnBank;
use common\models\Status;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <div class="row">
        <div class="box box-primary">
            <div class="box-body">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                
                <?php if (Yii::$app->controller->action->id != 'update') { ?>
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 30]) ?>

                    <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 30]) ?>
                <?php } ?>
                
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

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sex')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female',], ['prompt' => 'Select Sex']) ?>

                <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'featured')->checkbox() ?>

                <?= $form->field($model, 'makmakan_credit')->textInput() ?>

                <?= $form->field($model, 'bank_account_number')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'bank_account_name')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'sn_bank_id')->dropDownList(
                        ArrayHelper::map(SnBank::find()->where(['status' => [Status::STATUS_ACTIVE]])->all(), 'id', 'bank'), 
                            ['prompt' => 'Select Bank']
                );
                ?>

                <?= $form->field($model, 'file')->fileInput() ?>

                <div class="form-group pull-right">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
