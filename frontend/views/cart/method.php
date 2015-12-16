<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
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
                <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                    <h1 class="heading">CHECKOUT METHOD</h1>

                    <hr class="topruler" />
                    <hr class="middleruler" />
                    <hr class="bottomruler" />

                    <div id="checkout-method">
                        <div style="border-right: 1px solid">
                            <div class="right-margin">
                                <div class="subtitle">EXISTING CUSTOMERS</div>
                            </div>
                        </div>
                        <div>
                            <div class="left-margin right-margin">
                                <div class="subtitle">SIGN UP TO SAVE TIME!</div>
                                <ul style="margin-left: -20px">
                                    <li><div class="description">Fast and easy check out</div></li>
                                    <li><div class="description">Easy access to your order history and status</div></li>
                                </ul>
                                <div><?= Html::a('Daftar', '#', ['value' => Url::to('index.php?r=site/signup'), 'id' => 'signupMethodLink']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
<?php
Modal::begin([
    'id' => 'signupMethodModal',
    'size' => 'modal-sm',
    'header' => '<img src="images/logo.png" class="modal-logo" />',
]);
echo "<div id=signupMethodModalContent> </div> ";
Modal::end();
?>
<div style="clear: both"></div>
