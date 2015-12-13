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

<!--<p>Keranjang belanja anda masih kosong. <br/> <?= Html::a('Belanja sekarang!', ['#']) ?></p>-->

<div class="row" style="margin-bottom: 15px;">
    <div class="col-lg-12" style="text-align: center; color: #FF9999; font-size: 16px;">
        <i class="glyphicon glyphicon-ok"/> Capcay Enak telah ditambahkan ke keranjang Anda
    </div>
</div>

<div class="row" style="margin-bottom: 20px;">
    <div class="col-xs-6" style="text-align: right;">
        <img style="width: 50%; height: auto;" src="images/10.jpg">
    </div>
    <div class="col-xs-6 col-md-6">
        <div class="row">
            <div class="col-lg-12">
                Capcay Enak
            </div>
            <div class="col-lg-12">
                Junk Food
            </div>
            <div class="col-lg-12" style="font-weight: 900; font-size: 16px">
                Rp 50.000,-
            </div>
        </div>
    </div>
</div>

<div class="panel-group" id="accordion">
    <div class="panel panel-default" style="border: 2px solid #CCC">
        <div class="panel-heading">
            <h4 class="panel-title" style="text-align: center;">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="display: block;">Keranjang Belanja Anda (2 Produk)</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row" style="margin-bottom: 5px">
                    <div class="col-xs-6">
                        Subtotal
                    </div>
                    <div class="col-xs-6" style="text-align: right">
                        Rp 150.000,-
                    </div>
                    <div class="col-xs-6" style="border-bottom: 1px">
                        Biaya Pengiriman
                    </div>
                    <div class="col-xs-6" style="text-align: right">
                        Rp 20.000,-
                    </div>
                    <br/>
                </div>

                <div class="row" style="margin-bottom: 10px">
                    <div class="col-xs-6" style="font-weight: 900; font-size: 16px">
                        Total
                    </div>
                    <div class="col-xs-6" style="text-align: right; font-weight: 900; font-size: 16px">
                        Rp 170.000,-
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?= Html::submitButton('Konfirmasi Pesanan', ['id' => 'login-btn', 'class' => 'btn btn-default btn-block', 'name' => 'login-button', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#cart-btn').on('click', function () {
            var data = $("#cart-form").serialize();
            $.ajax({
                type: 'POST',
                url: '<?= \Yii::$app->getUrlManager()->createUrl('cart/cart') ?>',
                data: data, =
                        error: function (data) { // if error occured
                            console.log("server error");
                        }
            });
        });
    });
</script>
<div style="clear: both"></div>

