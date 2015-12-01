<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="container-fluid site-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <h2 class="text-center portfolio-text portfolio-text-before">Ubah Password Anda</h2>
            </div>
            <div class="col-xs-6 col-xs-offset-3">
                <p>Harap masukan password anda yang baru.</p>
            </div>
            <div class="col-xs-6 col-xs-offset-3">
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?=
                $form->field($model, 'password', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('Password'),
                    ],
                ])->passwordInput(['maxlength' => 30])->label(false)
                ?>

                <?=
                $form->field($model, 'repassword', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('Konfirmasi Password'),
                    ],
                ])->passwordInput(['maxlength' => 30])->label(false)
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Ubah Password', ['class' => 'btn btn-default pull-right', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
