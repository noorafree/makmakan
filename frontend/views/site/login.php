<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
    <p>Please fill out the following fields to login:</p>
    <div class="row">
        <div class="col-lg-10">
            <?php $form = ActiveForm::begin(['id' => 'login-form',
                    'options'=>['onsubmit'=>'return false;']]) ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['id'=>'login-btn','class' => 'btn btn-default', 'name' => 'login-button',
                        'style'=>'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0;']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    
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
