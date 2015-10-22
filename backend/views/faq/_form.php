<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\ActiveField;
use dosamigos\ckeditor\CKEditor;
use common\models\Faq;
/* @var $this yii\web\View */
/* @var $model common\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'full'
        ]) 
    ?>
    
    <?= $form->field($model, 'answer')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'full'
        ]) 
    ?>

    <?php if(Yii::$app->controller->action->id == 'update') { ?>

        <?= $form->field($model, 'faq_order')->dropDownList(['1' => '1', '2' => '2', '3' => '3'], ['prompt'=>'Select Faq Order']); ?>

    <?php } ?>
    
    <?= $form->field($model, 'is_disabled')->inline()->radioList([ 0 => 'Yes', 1 => 'No' ]) ?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
