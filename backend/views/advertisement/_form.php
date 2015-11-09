<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use common\models\Advertiser;
use common\models\Status;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Advertisement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertisement-form">
    <div class="row">
        <div class="box box-primary">
            <div class="box-body">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?=
                $form->field($model, 'advertiser_id')->dropDownList(
                        ArrayHelper::map(Advertiser::find()->where(['status' => [Status::STATUS_ACTIVE, Status::STATUS_INACTIVE]])->all(), 'id', 'name'), ['prompt' => 'Select Advertiser']
                );
                ?>

                <?= $form->field($model, 'amount')->textInput() ?>

                <?=
                $form->field($model, 'start_date')->widget(
                        DatePicker::className(), [
                    'inline' => false,
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d'
                    ]
                ]);
                ?>
                <?=
                $form->field($model, 'end_date')->widget(
                        DatePicker::className(), [
                    'inline' => false,
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d'
                    ]
                ]);
                ?>

                <?= $form->field($model, 'advertisement_type')->dropDownList([ 'Right Menu' => 'Right Menu', 'Left Menu' => 'Left Menu', '' => '',], ['prompt' => '']) ?>

                <?= $form->field($model, 'files[]')->fileInput(['multiple' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
