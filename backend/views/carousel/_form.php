<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Carousel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carousel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'file')->widget(FileInput::className(), [
            'pluginOptions' => [
                'showCaption' => false,
                'showUpload' => false,
                'showRemove'=>false,
                'browseClass' => 'btn btn-primary btn-block',
                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                'browseLabel' => 'Select Photo',
                'allowedFileExtensions' => ['jpg', 'gif', 'png']
            ],
            'options' => ['accept' => 'image/*']
        ]
    )
    ?>

    <?= $form->field($model, 'image_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carousel_order')->textInput() ?>

    <?= $form->field($model, 'is_target_self')->checkBox(['label' => 'Self']); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
