<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
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

            <div class="col-md-10 col-sm-9 col-xs-12 work-list">

                <ol class="breadcrumb">
                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="#"><?= Html::encode($product->name) ?></a></li>
                </ol>
                
               
                <h2 class="text-center portfolio-text"><?= Html::encode($product->name) ?></h2>

                <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                     <div class="featured-img">
                    <?= Html::img(Yii::$app->urlManagerBackEnd->baseUrl . '/'. Html::encode($product->productPhotos[0]->image_path), '', ['class' => 'img-responsive']); ?>
                </div>
                    <a href="#">
                        <h3><?= Html::encode($product->snProductCategory->category); ?></h3>
                        <h3><?= Html::encode($product->name) ?></h3>
                        <h3><?= Html::encode(Yii::$app->formatter->asCurrency($product->selling_price)); ?></h3>
                    </a>

                    <div class="form">
                        <?= Html::beginForm(); ?>
                        <?php
                        $form = ActiveForm::begin(['id' => 'cart-form',
                                    'options' => ['onsubmit' => 'return false;']])
                        ?>
                        <div class="row">
                            <div style="float: left; margin-right: 5px"><?php //echo Html::image(Yii::app()->request->baseUrl . '/images/shopping_cart.png', '', array('style' => 'vertical-align: bottom'));      ?></div>
                            <div style="float: left"><?php //echo Html::activeTextInput($productForm, 'quantity', array('size' => 3, 'maxlength' => 3, 'style' => 'text-align: center'));   ?>
                                <?= $form->field($productForm, 'quantity')->label(false); ?>
                            </div>
                            <div style="float: left; margin-left: 5px">
                                <?php //Html::submitButton('Add to cart', ['value' => Url::to(['cart/cart']), 'class' => 'cartLink', 'data-method' => 'POST']); ?>
                                <?= Html::submitButton('Add to cart', ['id' => 'cart-btn', 'class' => 'btn btn-default btn-block', 'name' => 'cart-button', 'style' => 'background: #ff6666; color: #FFF; border: 1px solid #ff9999; border-radius: 0; font-size: 12px']) ?>
                            </div>
                            <div class="clear"><?php echo Html::error($productForm, 'quantity'); ?></div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
Modal::begin([
    'id' => 'cartModal',
    'size' => 'modal-sm',
    'header' => '<img src="images/logo.png" class="modal-logo" />',
]);

echo "<div id=cartModalContent> </div> ";

Modal::end();
?>
<!--<script type="text/javascript">        
        $(document).ready(function (){
            $('#cart-btn').on('click',function(){
                var data=$("#cart-form").serialize();
                $.ajax({
                 type: 'POST',
                 url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/test') ?>',
                 data:data,
                 success:function(data){
                        if(data=="success"){
                            var passwordField = ".field-loginform-password";
                            $(passwordField).removeClass('has-error');
                            $(passwordField).find('.help-block').text("");
                            window.location="<?php echo Yii::$app->getHomeUrl(); ?>";
                        }else{
                            var passwordField = ".field-loginform-password";
                            $(passwordField).addClass('has-error').find('.help-block').text(data).fadeIn("fast");
                        }                           
                 },
                 error: function(data) { // if error occured
                        console.log("server error");
                  }
                });
            });
        });
</script>-->
<div style="clear: both"></div>

