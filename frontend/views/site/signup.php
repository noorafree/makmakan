<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>
<div class="site-signup">
    <div class="info" id='flass_message'> </div>
    <p>Please fill out the following fields to signup:</p>
    <div class="row">
        <div class="col-lg-9">
            <?php $form = ActiveForm::begin(['id' => 'signup-form','enableAjaxValidation'=>true,'enableClientValidation'=>true,
                    'options'=>['onsubmit'=>'return false;']]); ?>
            
                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username') ?>

                <?php if (Yii::$app->controller->action->id != 'update') { ?>
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 30]) ?>

                    <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 30]) ?>
                <?php } ?>
                
                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['id'=>'signup-btn','class' => 'btn btn-primary', 'name' => 'signup-button', 'style'=>'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0;']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

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
                                $('#flass_message').attr('class','alert-success alert fade in').html(data.message).fadeOut("slow");
                            }else{
                                $('#flass_message').attr('class','alert-success alert fade in').html(data.message).fadeOut("slow");
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