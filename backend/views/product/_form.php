<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Status;
use common\models\Product;
use common\models\SnProductCategory;
use dosamigos\datepicker\DatePicker;
use dosamigos\ckeditor\CKEditor;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <div class="row">
        <div class="box box-primary">
            <div class="box-body">
                <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($product, 'plu')->textInput(['maxlength' => true]) ?>

                <?= $form->field($product, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($product, 'selling_price')->textInput() ?>
                
                <?= $form->field($product, 'selling_type')->dropDownList([ Product::READY_STOCK => Product::READY_STOCK, Product::READY_ORDER => Product::READY_ORDER, Product::PURCHASE_ORDER => Product::PURCHASE_ORDER], ['prompt' => 'Select Selling Type']) ?>

                <?=
                $form->field($product, 'sn_product_category_id')->dropDownList(
                        ArrayHelper::map(SnProductCategory::find()->where(['status' => [Status::STATUS_ACTIVE, Status::STATUS_INACTIVE]])->all(), 'id', 'category'), ['prompt' => 'Select Product Category']
                );
                ?>

                <?= $form->field($product, 'stock')->textInput() ?>
                
                <?=
                $form->field($product, 'po_start_date')->widget(
                        DatePicker::className(), [
                    'inline' => false,
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d'
                    ]
                ]);
                ?>

                <?=
                $form->field($product, 'po_end_date')->widget(
                        DatePicker::className(), [
                    'inline' => false,
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d'
                    ]
                ]);
                ?>

                <?=
                $form->field($product, 'expired_date')->widget(
                        DatePicker::className(), [
                    'inline' => false,
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d'
                    ]
                ]);
                ?>

                <?= $form->field($product, 'is_non_halal')->dropDownList([ Product::YES => Product::YES_LITERAL, Product::NO => Product::NO_LITERAL,], ['prompt' => 'Select Non Halal']) ?>

                <?= $form->field($product, 'minimum_order')->textInput() ?>

                <?= $form->field($product, 'featured')->dropDownList([ Product::YES => Product::YES_LITERAL, Product::NO => Product::NO_LITERAL,], ['prompt' => 'Select Featured']) ?>

                <?=
                $form->field($product, 'description')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'full'
                ]);
                ?>

                <?= $form->field($product, 'meta_tag')->textInput() ?>

                <?= $form->field($product, 'meta_description')->textInput() ?>

                <?= $form->field($product, 'files[]')->fileInput(['multiple' => true]) ?>

                <?php
                DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 999, // the maximum times, an element can be added (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $ingredients[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'ingredient',
                    ],
                ]);
                ?>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <i class="fa fa-edit"></i> Ingredient
                            <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="container-items"><!-- widgetBody -->
                            <?php foreach ($ingredients as $i => $ingredient): ?>
                                <div class="item panel panel-default"><!-- widgetItem -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title pull-left">Ingredient</h4>
                                        <div class="pull-right">
                                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                        // necessary for update action.
                                        if (!$ingredient->isNewRecord) {
                                            echo Html::activeHiddenInput($ingredient, "[{$i}]id");
                                        }
                                        ?>
                                        <?= $form->field($ingredient, "[{$i}]ingredient")->textInput(['maxlength' => true])->label('') ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div><!-- .panel -->
                <?php DynamicFormWidget::end(); ?>

                <div class="form-group">
                    <?= Html::submitButton($product->isNewRecord ? 'Create' : 'Update', ['class' => $product->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
