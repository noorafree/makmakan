<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<p>Home made food right into your doorstep!</p>
<div class="row">
    <div class="col-lg-12">
        <?php $form = ActiveForm::begin(['id' => 'login-form',
                    'options'=>['onsubmit'=>'return false;']]) ?>

        <?=
        $form->field($model, 'email', [
            'inputOptions' => [
                'placeholder' => $model->getAttributeLabel('Email'),
            ],
        ])->label(false);
        ?>

        <?=
        $form->field($model, 'password', [
            'inputOptions' => [
                'placeholder' => $model->getAttributeLabel('Password'),
            ],
        ])->label(false)->passwordInput();
        ?>

        <div class="row">
            <div class="col-xs-6">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="col-xs-6">
                <?= Html::a('Lupa password?', ['site/request-password-reset'], ['class' => 'pull-right', 'style' => 'padding-top:10px']) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Masuk', ['id'=>'login-btn','class' => 'btn btn-default btn-block', 'name' => 'login-button', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']) ?>
            <?= Html::submitButton('Masuk dengan Facebook', ['class' => 'btn btn-default btn-block', 'name' => 'login-button', 'style' => 'background: #3b5998; color: #FFF; border: 1px solid #3b5998; border-radius: 0; font-size: 12px']) ?>
            <?= Html::submitButton('Masuk dengan G+', ['class' => 'btn btn-default btn-block', 'name' => 'login-button', 'style' => 'background: #ff0000; color: #FFF; border: 1px solid #ff0000; border-radius: 0; font-size: 12px']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<p>Belum memiliki akun? <br/> <?= Html::a('Daftar sekarang!', ['#']) ?></p>
    
    <script type="text/javascript">        
        $(document).ready(function (){
            $('#login-btn').on('click',function(){
                var data=$("#login-form").serialize();
                $.ajax({
                 type: 'POST',
                 url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/submit-login') ?>',
                 data:data,
                 success:function(data){
                        if(data=="success"){
                            var passwordField = ".field-loginform-password";
                            $(passwordField).removeClass('has-error');
                            $(passwordField).find('.help-block').text("");
                            window.location="<?php echo Yii::$app->getHomeUrl(); ?>";
                        }else{
                            var passwordField = ".field-loginform-password";
                            $(passwordField).addClass('has-error').find('.help-block').text(data).fadeIn("fast");
                        }                           
                 },
                 error: function(data) { // if error occured
                        console.log("server error");
                  }
                });
            });
        });
</script>
