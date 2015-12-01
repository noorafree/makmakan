<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="info" id='flass_message'> </div>
<p>Home made food right into your doorstep!</p>

<div class="site-signup">

    <p>Dengan mendaftar anda berarti telah menyetujui <?= Html::a('persetujuan pengguna.', ['#']) ?> </p>

    <div class="row">
        <div class="col-lg-12">
            <?php
            $form = ActiveForm::begin(['id' => 'signup-form', 'enableAjaxValidation' => true, 'enableClientValidation' => true,
                        'options' => ['onsubmit' => 'return false;']]);
            ?>

            <?=
            $form->field($model, 'first_name', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('Nama Depan'),
                ],
            ])->textInput(['maxlength' => true])->label(false)
            ?>

            <?= $form->field($model, 'last_name', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('Nama Belakang'),
                ],
            ])->textInput(['maxlength' => true])->label(false) ?>
            
            <?= $form->field($model, 'mobile', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('Nomor Handphone'),
                ],
            ])->textInput(['maxlength' => true])->label(false) ?>

            <?= $form->field($model, 'email', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('Email'),
                ],
            ])->label(false) ?>

            <?php if (Yii::$app->controller->action->id != 'update') { ?>
                <?= $form->field($model, 'password', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('Password'),
                ],
            ])->passwordInput(['maxlength' => 30])->label(false) ?>

                <?= $form->field($model, 'repassword', [
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('Konfirmasi Password'),
                ],
            ])->passwordInput(['maxlength' => 30])->label(false) ?>
            <?php } ?>

            <div class="form-group">
                <?= Html::submitButton('Daftar', ['id' => 'signup-btn', 'class' => 'btn btn-default btn-block', 'name' => 'signup-button', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<p>Sudah punya akun? <br/> <?= Html::a('Masuk sekarang!', ['#']) ?></p>

    <script type="text/javascript">        
        $(document).ready(function (){
            $('#signup-btn').on('click',function(){
                if($("#signup-form").find("div.has-error").size()==0){
                    var data=$("#signup-form").serialize();
                    $.ajax({
                     type: 'POST',
                     url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/submit-signup') ?>',
                     data:data,
                     success:function(data){
                            if(data.isSuccess){
                                $('#signup-form').closest('form').find('input[type=text],input[type=password], textarea').val("");
                                $('#flass_message').attr('class','alert-success alert fade in').show().html(data.message).fadeOut(5000);
                            }else{
                                $('#flass_message').attr('class','alert-success alert fade in').show().html(data.message).fadeOut(5000);
                            }
                     },
                     error: function(data) { // if error occured
                            console.log("server error");
                      }
                    });
                }
            });
        });
</script>
