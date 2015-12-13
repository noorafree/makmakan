<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\SnBank;
use common\models\Status;
?>

<div class="container-fluid site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">                
                <div class="glossymenu" style="margin:auto; width: 135%">
                    <?= Html::a('Profil Pengguna', ['site/profile'], ['class' => 'menuitem']); ?>
                    <a class="menuitem submenuheader" href="http://www.cssdrive.com">Pembelian</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="http://www.cssdrive.com">Pemesanan Saya</a></li>
                            <li><a href="http://www.cssdrive.com">Status Pemesanan</a></li>
                        </ul>
                    </div>
                    <a class="menuitem submenuheader" href="http://www.cssdrive.com">Penjualan</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="http://www.cssdrive.com">Daftar Produk</a></li>
                            <li><a href="http://www.cssdrive.com">Pendaftaran Produk</a></li>
                            <li><a href="http://www.cssdrive.com">Saldo & Mutasi</a></li>
                            <li><a href="http://www.cssdrive.com">Laporan Pembayaran</a></li>
                            <li><a href="http://www.cssdrive.com">Laporan Penjualan</a></li>
                            <li><a href="http://www.cssdrive.com">Top 5 Food</a></li>
                            <li><a href="http://www.cssdrive.com">Rating Penilaian User</a></li>
                            <li><a href="http://www.cssdrive.com">Rating Menurut Waktu</a></li>
                        </ul>
                    </div>
                    <a class="menuitem" href="http://www.cssdrive.com">Keluar</a>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                        
                <h1 class="text-title">Profil Pengguna</h1>
                        
                <div class="user-update">
                    <div class="user-form">
                        <div class="row">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

                                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-xs-6 pull-right">
                                            <?= $form->field($model, 'file')->fileInput() ?>
                                            
                                            Status Peringatan Seller
                                        </div>
                                    </div>

                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                                    <?php if (Yii::$app->controller->action->id != 'update') { ?>
                                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => 30]) ?>

                                        <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 30]) ?>
                                    <?php } ?>

                                    <?=
                                    $form->field($model, 'birthdate')->widget(
                                            DatePicker::className(), [
                                        'inline' => false,
                                        'clientOptions' => [
                                            'autoclose' => true,
                                            'format' => 'yyyy-m-d'
                                        ]
                                    ]);
                                    ?>

                                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'sex')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female',], ['prompt' => 'Select Sex']) ?>

                                    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

                                    <?=
                                    $form->field($model, 'sn_bank_id')->dropDownList(
                                            ArrayHelper::map(SnBank::find()->where(['status' => [Status::STATUS_ACTIVE]])->all(), 'id', 'bank'), ['prompt' => 'Select Bank']
                                    );
                                    ?>

                                    <?= $form->field($model, 'bank_account_number')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'bank_account_name')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'makmakan_credit')->textInput(['readonly' => !$model->isNewRecord]) ?> 

                                    <div class="form-group pull-right">
                                        <?= Html::submitButton('Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']) ?>
                                    </div>

                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
