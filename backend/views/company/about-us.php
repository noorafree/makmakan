<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'Update About Us';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="company-update">

    <div class="company-form">
        <div class="row">
            <div class="box box-primary">
                <div class="box-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?php if (Yii::$app->controller->action->id == 'about-us') { ?>
                        <?=
                        $form->field($model, 'about_us')->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'full'
                        ])
                        ?>
                    <?php } ?>

                    <div class="form-group pull-right">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>


</div>