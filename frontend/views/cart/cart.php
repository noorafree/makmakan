<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Cart;

$cart = new Cart();

if ($_POST) {
    $cart->update($_POST);
    Yii::$app->controller->refresh();
}
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
                                        <?= Html::img(Yii::$app->urlManagerBackEnd->baseUrl . '/'. Html::encode($items['filename']), ['style' => 'width: 80%; height: 20%;']); ?>
                                    </td>
                                    <td width="23%">
                                        <?= $items['name']; ?><br/>
                                        <?= Html::encode(Yii::$app->formatter->asCurrency($items['price'])); ?>
                                    </td>
                                    <td width="22%">
                                        <?= Html::textInput($i . '[qty]', $items['qty'], ['maxlength' => '3', 'size' => '5', 'class' => 'form-control input-small']); ?>
                                        <br/>
                                        <div class="input-group bootstrap-timepicker timepicker">
                                            <input id="timepicker1" type="text" class="form-control input-small">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </td>
                                    <td width="20%" style="text-align:right"><?= Html::encode(Yii::$app->formatter->asCurrency($items['subtotal'])); ?></td>
                                    <td width="5%" style="text-align:right">
                                        <?=
                                        Html::a('<span class="glyphicon glyphicon-remove"></span>', Yii::$app->urlManager->createUrl(['cart/remove', 'id' => $items['rowid']]), ['data' => [
                                                'confirm' => 'Are you sure you want to remove this item?',
                                                'method' => 'post',
                                        ]]);
                                        ?>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>

                        <div class="form-group">
                            <div style="margin-top: 10px">
                                <?= Html::submitButton('Perbaharui Keranjang', ['class' => 'btn btn-default pull-right', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']); ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <p style="font-weight: 900; font-size: 16px">Keranjang Belanja Anda (<?= Html::encode($i - 1); ?>)</p>
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
                                <div><?= Html::submitButton('Lanjutkan Ke Pengiriman', ['class' => 'btn btn-default btn-block', 'name' => 'Proceed', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6" style="border-top: solid 1px #FF9999; padding-top: 20px; margin-top: 30px;">
                <h4>Petunjuk Pengiriman</h4>

                <p style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum arcu diam, auctor quis efficitur ut, pharetra nec augue. Vestibulum nec sapien tellus. Vestibulum consectetur interdum ipsum sed venenatis. Nam auctor vehicula euismod. Etiam finibus nibh id maximus mattis. Vivamus non ultricies lectus. Aenean laoreet mauris sollicitudin scelerisque tempor. Morbi iaculis neque sed nisl eleifend, in congue eros consequat.</p>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6" style="border-top: solid 1px #FF9999; padding-top: 20px; margin-top: 30px;">
                <h4>Petunjuk Pembayaran</h4>

                <p style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum arcu diam, auctor quis efficitur ut, pharetra nec augue. Vestibulum nec sapien tellus. Vestibulum consectetur interdum ipsum sed venenatis. Nam auctor vehicula euismod. Etiam finibus nibh id maximus mattis. Vivamus non ultricies lectus. Aenean laoreet mauris sollicitudin scelerisque tempor. Morbi iaculis neque sed nisl eleifend, in congue eros consequat.</p> 
            </div>
        </div>
    </div>
</div>
</div>

<div style="clear: both"></div>
