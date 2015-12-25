<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Cart;

?>
<div class="container">
    <div class="row" id="starts">
        <div class="col-md-12 col-sm-12 col-xs-12 site-content">
            <div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: solid 1px #FF9999; padding-bottom: 20px; margin-bottom: 30px;">
                <?= Html::a('< Lanjutkan Belanja', ['site/product']); ?>
            </div>
            <div class="form">
                <div class="row">
                    <?php $form = ActiveForm::begin(['id' => 'cart-form', 'options' => ['class' => 'form-horizontal']]); ?>
                    <div class="col-md-8 col-sm-8 col-xs-12" style="padding: 0px 50px 0px;">
                        <table cellpadding="6" cellspacing="5" style="width:100%">
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Jumlah & Waktu Pengiriman</th>
                                <th style="text-align:right">Sub-Total</th>
                                <th></th>
                            </tr>

                            <?php $i = 1; ?>
                            <?php foreach ($cart->contents() as $items): ?>
                                <?= Html::hiddenInput($i . '[rowid]', $items['rowid']) ?>
                                <tr>
                                    <td>
                                        <?= Html::img(Yii::$app->urlManagerBackEnd->baseUrl . '/'. Html::encode($items['filename']), ['style' => 'width: 80%; height: 10%;']); ?>
                                    </td>
                                    <td width="23%">
                                        <?= $items['name']; ?><br/>
                                        <?= Html::encode(Yii::$app->formatter->asCurrency($items['price'])); ?>
                                    </td>
                                    <td width="22%">
                                        <?= Html::encode($items['qty']); ?>
                                        <br/>
                                        <div class="input-group bootstrap-timepicker timepicker">
                                            <input id="timepicker1" type="text" class="form-control input-small" disabled="true">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </td>
                                    <td width="20%" style="text-align:right"><?= Html::encode(Yii::$app->formatter->asCurrency($items['subtotal'])); ?></td>
                                 </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <p style="font-weight: 900; font-size: 16px">Keranjang Belanja Anda (<?= Html::encode($i - 1); ?>)</p>
                        <div class="row" style="margin-bottom: 5px">
                            <div class="col-xs-6">
                                Nama
                            </div>
                            <div class="col-xs-6" style="text-align: right">
                                <?php if ($destination === null) { ?>
                                <?= Html::encode($personalData->first_name); ?>
                                <?php } else { ?>
                                <?= Html::encode($destination->first_name); ?>
                                <?php } ?>
                            </div>
                            <div class="col-xs-6" style="border-bottom: 1px">
                                Alamat
                            </div>
                            <div class="col-xs-6" style="text-align: right">
                                <?php if ($destination === null) { ?>
                                <?= Html::encode($personalData->delivery_address); ?>
                                <?php } else { ?>
                                <?= Html::encode($destination->delivery_address); ?>
                                <?php } ?>
                            </div>
                            <div class="col-xs-6" style="border-bottom: 1px">
                                Kontak Person
                            </div>
                            <div class="col-xs-6" style="text-align: right">
                                 <?php if ($destination === null) { ?>
                                <?= Html::encode($personalData->delivery_contact); ?>
                                <?php } else { ?>
                                <?= Html::encode($destination->delivery_contact); ?>
                                <?php } ?>
                            </div>
                            <br/>
                        </div>
                        <div class="row" style="margin-bottom: 5px">
                            <div class="col-xs-6">
                                Subtotal
                            </div>
                            <div class="col-xs-6" style="text-align: right">
                                <?= Html::encode(Yii::$app->formatter->asCurrency($cart->total())); ?>
                            </div>
                            <div class="col-xs-6" style="border-bottom: 1px">
                                Biaya Pengiriman
                            </div>
                            <div class="col-xs-6" style="text-align: right">
                                <?= Html::encode(Yii::$app->formatter->asCurrency(20000)); ?>
                            </div>
                            <br/>
                        </div>

                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-xs-6" style="font-weight: 900;">
                                Total
                            </div>
                            <div class="col-xs-6" style="text-align: right; font-weight: 900;">
                                <?= Html::encode(Yii::$app->formatter->asCurrency($cart->total() + 20000)); ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div><?= Html::submitButton('Selesai', ['class' => 'btn btn-default btn-block', 'name' => 'Proceed', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div style="clear: both"></div>
