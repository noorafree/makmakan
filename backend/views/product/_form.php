<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Status;
use common\models\Product;
use common\models\SnProductCategory;
use dosamigos\datepicker\DatePicker;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <div class="row">
        <div class="box box-primary">
            <div class="box-body">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'plu')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'selling_price')->textInput() ?>

                <?=
                $form->field($model, 'sn_product_category_id')->dropDownList(
                        ArrayHelper::map(SnProductCategory::find()->where(['status' => [Status::STATUS_ACTIVE, Status::STATUS_INACTIVE]])->all(), 'id', 'category'), 
                            ['prompt' => 'Select Product Category']
                );
                ?>

                <?= $form->field($model, 'stock')->textInput() ?>

                <?= $form->field($model, 'is_po')->dropDownList([ Product::YES => Product::YES_LITERAL, Product::NO => Product::NO_LITERAL, ], ['prompt' => 'Select PO']) ?>

                <?=
                $form->field($model, 'po_start_date')->widget(
                        DatePicker::className(), [
                    'inline' => false,
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d'
                    ]
                ]);
                ?>

                <?=
                $form->field($model, 'po_end_date')->widget(
                        DatePicker::className(), [
                    'inline' => false,
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d'
                    ]
                ]);
                ?>

                <?=
                $form->field($model, 'expired_date')->widget(
                        DatePicker::className(), [
                    'inline' => false,
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d'
                    ]
                ]);
                ?>

                <?= $form->field($model, 'is_non_halal')->dropDownList([ Product::YES => Product::YES_LITERAL, Product::NO => Product::NO_LITERAL, ], ['prompt' => 'Select Non Halal']) ?>

                <?= $form->field($model, 'minimum_order')->textInput() ?>

                <?= $form->field($model, 'is_ready_for_order')->dropDownList([ Product::YES => Product::YES_LITERAL, Product::NO => Product::NO_LITERAL, ], ['prompt' => 'Select Ready For Order']) ?>

                <?= $form->field($model, 'featured')->dropDownList([ Product::YES => Product::YES_LITERAL, Product::NO => Product::NO_LITERAL, ], ['prompt' => 'Select Featured']) ?>

                <?=
                $form->field($model, 'description')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'full'
                ]);
                ?>

                <?= $form->field($model, 'meta_tag')->textInput() ?>

                <?= $form->field($model, 'meta_description')->textInput() ?>
                
                <?= $form->field($model, 'files[]')->fileInput(['multiple' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
