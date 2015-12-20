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

<div class="container-fluid work" id="work">
    <div class="container">
        <div class="row" id="starts">
            <div class="col-md-2 col-sm-3 col-xs-12 work-list">
                <h4 class="text-center portfolio-text">Product Categories</h4>

                <ul class="nav nav-pills nav-stacked menu">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Asian Foods<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Indonesian Foods</a></li>
                            <li><a href="#">Japanese Foods</a></li>
                            <li><a href="#">Chinese Foods</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Mexican Foods</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">American Foods<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Steaks</a></li>
                            <li><a href="#">Seafoods</a></li>
                        </ul>
                    </li>
                </ul>

                <h4 class="text-center portfolio-text">Advanced Search</h4>
                <?= Html::beginForm(Yii::$app->request->url, 'get'); ?>
                <?= Html::textInput('Search', '', ['class' => 'form-control', 'placeholder' => 'Enter keyword...']); ?>
                <h5 class="portfolio-text">By Chef : </h5>

                <div class="option">
                    <div class="checkbox">
                        <label><input type="checkbox">Susi Susanti</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Nyonya Meneer</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Restaurant Dynasty</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Momosuki</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Ani Jubaidah</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Chef Lulung</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Pak Gentong</label>
                    </div>
                </div>

                <h5 class="portfolio-text">By Category : </h5>

                <div class="option">
                    <div class="checkbox">
                        <label><input type="checkbox">American Food</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Indonesian Food</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Chinese Food</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Japanese Food</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Mexican Food</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Korean Food</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Australian Food</label>
                    </div>
                </div>

                <h5 class="portfolio-text">Rating : </h5>

                <div class="checkbox">
                    <label><input type="checkbox">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox">
                        <span class="glyphicon glyphicon-star"></span>
                    </label>
                </div>

                <h5 class="portfolio-text">Others : </h5>

                <div class="option">
                    <div class="checkbox">
                        <label><input type="checkbox">Latest</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Best Selling</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Promo</label>
                    </div>
                </div>

                <?= Html::endForm(); ?>

                <h4 class="text-center portfolio-text">Best Selling Products</h4>

                <div class="col-md-12 col-sm-12 col-xs-12 work-space">
                    <a href="#" class="best-selling">
                        <div class="featured-img">
                            <img id="best-selling" src="images/toppoki.jpg" class="img-responsive"/>
                        </div>
                        <h3>Korean Food</h3>
                        <h5>Teoppoki</h5>
                        <h5>Rp. 45.000</h5>
                    </a>
                </div>
            </div>

            <div class="col-md-10 col-sm-9 col-xs-12 site-content">
                <div class="form">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12" style="padding: 0px 50px 0px;">
                            <?php $form = ActiveForm::begin(['id' => 'cart-form', 'options' => ['class' => 'form-horizontal']]); ?>
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
                                    <?php echo Html::hiddenInput($i . '[rowid]', $items['rowid']) ?>
                                    <tr>
                                        <td>
                                            <img style="width: 80%; height: auto;" src="images/10.jpg">
                                        </td>
                                        <td width="23%">
                                            <?php echo $items['name']; ?><br/>
                                            Ibu Ujang
                                            <br/>
                                            Rp <?php echo $cart->format_number($items['price']); ?>
                                        </td>
                                        <td width="22%">
                                            <?php echo Html::textInput($i . '[qty]', $items['qty'], ['maxlength' => '3', 'size' => '5', 'class' => 'form-control input-small']); ?>
                                            <br/>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="timepicker1" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                        <td width="20%" style="text-align:right">Rp <?php echo $cart->format_number($items['subtotal']); ?></td>
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

                            <?php ActiveForm::end() ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <p style="font-weight: 900; font-size: 16px">Keranjang Belanja Anda (2 Produk)</p>
                            <div class="row" style="margin-bottom: 5px">
                                <div class="col-xs-6">
                                    Subtotal
                                </div>
                                <div class="col-xs-6" style="text-align: right">
                                    Rp <?php echo $cart->format_number($cart->total()); ?>
                                </div>
                                <div class="col-xs-6" style="border-bottom: 1px">
                                    Biaya Pengiriman
                                </div>
                                <div class="col-xs-6" style="text-align: right">
                                    Rp 20,000,00
                                </div>
                                <br/>
                            </div>

                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-xs-6" style="font-weight: 900;">
                                    Total
                                </div>
                                <div class="col-xs-6" style="text-align: right; font-weight: 900;">
                                    Rp 40,000,00
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div><?= Html::submitButton('Lanjutkan Ke Pembayaran', ['class' => 'btn btn-default btn-block', 'name' => 'Proceed', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div style="clear: both"></div>
