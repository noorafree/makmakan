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
            <div class="col-md-10 col-sm-9 col-xs-12 work-list">


                <div class="col-md-4 col-sm-6 col-xs-12 work-space">

                    <div class="form">
                        <?php
                        $form = ActiveForm::begin([
                                    'id' => 'cart-form',
                                    'options' => ['class' => 'form-horizontal', 'onsubmit'=>'return false;'],
                                ])
                        ?>
                        <table cellpadding="6" cellspacing="5" style="width:300%" border="1">

                            <tr>
                                <th>QTY</th>
                                <th>Item Description</th>
                                <th style="text-align:right">Item Price</th>
                                <th style="text-align:right">Sub-Total</th>
                                <th style="text-align:right">Action</th>
                            </tr>

                            <?php $i = 1; ?>

                            <?php foreach ($cart->contents() as $items): ?>

                                <?php echo Html::hiddenInput($i . '[rowid]', $items['rowid']) ?>

                                <tr>
                                    <td><?php echo Html::textInput($i . '[qty]', $items['qty'], ['maxlength' => '3', 'size' => '5']); ?></td>
                                    <td>
                                        <?php echo $items['name']; ?>

                                        <?php if ($cart->has_options($items['rowid']) == TRUE): ?>

                                            <p>
                                                <?php foreach ($cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                    <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                <?php endforeach; ?>
                                            </p>

                                        <?php endif; ?>

                                    </td>
                                    <td style="text-align:right"><?php echo $cart->format_number($items['price']); ?></td>
                                    <td style="text-align:right">$<?php echo $cart->format_number($items['subtotal']); ?></td>
                                    <td style="text-align:right"><?=
                                        Html::a('Delete', Yii::$app->urlManager->createUrl(['cart/remove', 'id' => $items['rowid']]), ['data' => [
                                                'confirm' => 'Are you sure you want to remove this item?',
                                                'method' => 'post',
                                        ]]);
                                        ?></td>
                                </tr>

                                <?php $i++; ?>

                            <?php endforeach; ?>

                            <tr>
                                <td colspan="2"> </td>
                                <td class="right"><strong>Total</strong></td>
                                <td class="right" style="text-align: right">$<?php echo $cart->format_number($cart->total()); ?></td>
                                <td> </td>
                            </tr>

                        </table>

                        <div class="form-group">
                            <div style="float: left; margin-top: 20px; margin-left: 15px;">
                                <?= Html::submitButton('Update your Cart', ['class' => 'btn btn-primary', 'id'=>'cart-btn']) ?>
                            </div>
                        </div>
                        
       
                        <?php ActiveForm::end() ?>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

<script type="text/javascript">        
        $(document).ready(function (){
            $('#cart-btn').on('click',function(){
                var data=$("#cart-form").serialize();
                $.ajax({
                 type: 'POST',
                 url: '<?= \Yii::$app->getUrlManager()->createUrl('cart/cart') ?>',
                 data:data,=
                 error: function(data) { // if error occured
                        console.log("server error");
                  }
                });
            });
        });
</script>
<div style="clear: both"></div>

