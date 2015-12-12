<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dmstr\widgets\Alert;
?>
<div class="container-fluid site-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <h2 class="text-center portfolio-text portfolio-text-before">Lupa Password?</h2>
            </div>
            <div class="col-xs-6 col-xs-offset-3">
                <p>Harap masukan email anda agar kami dapat memberikan instruksi untuk mengembalikan password anda.</p>
            </div>
            <div class="col-xs-6 col-xs-offset-3">
                
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?=
                $form->field($model, 'email', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('Email'),
                    ],
                ])->label(false);
                ?>
                <?= Alert::widget() ?>
                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-default pull-right', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
