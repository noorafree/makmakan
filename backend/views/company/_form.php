<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(Yii::$app->controller->action->id == 'about-us') { ?>
        <?= $form->field($model, 'about_us')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ]) 
        ?>
    <?php } ?>
    
    <?php if(Yii::$app->controller->action->id == 'purchasing-guide') { ?>
        <?= $form->field($model, 'purchasing_guide')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ]) 
        ?>
    <?php } ?>

    <?php if(Yii::$app->controller->action->id == 'return-policy') { ?>
        <?= $form->field($model, 'return_policy')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ]) 
        ?>
    <?php } ?>
    
     <?php if(Yii::$app->controller->action->id == 'terms-and-agreement') { ?>
        <?= $form->field($model, 'terms_and_condition')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ]) 
        ?>
    <?php } ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
