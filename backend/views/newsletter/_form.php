<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Status;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Newsletter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newsletter-form">
    <div class="row">
        <div class="box box-primary">
            <div class="box-body">
            <?php $form = ActiveForm::begin(); ?>
                
                    <?= $form->field($model, 'subject')->textInput() ?>
                    
                    <?= $form->field($model, 'message')->widget(CKEditor::className(), [
                            'options' => ['rows' => 6],
                            'preset' => 'basic'
                        ]) 
                    ?>
                    
                    <div class="form-group pull-right">    
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                
            <?php ActiveForm::end(); ?>
               </div>
        </div>
    </div>
</div>
