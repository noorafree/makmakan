<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<p>Home made food right into your doorstep!</p>

<div class="site-signup">
    <p>Dengan mendaftar anda berarti telah menyetujui <?= Html::a('persetujuan pengguna Makmakan', ['#']) ?> </p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username') ?>

                <?php if (Yii::$app->controller->action->id != 'update') { ?>
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 30]) ?>

                    <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 30]) ?>
                <?php } ?>
            
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button', 'style'=>'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0;']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
