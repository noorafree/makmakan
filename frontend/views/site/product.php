<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
?>

<!--<div class="container-fluid work" id="work">
    <div class="container">
        <div class="row" id="starts">
            <div class="col-md-12 col-sm-12 col-xs-12 work-list">
                <h2 class="text-center portfolio-text"> <?= Html::textInput('Search'); ?></h2>
              

            </div>
        </div>
    </div>
</div>-->

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
                <?= Html::textInput('Search', '',['class' => 'form-control', 'placeholder' => 'Enter keyword...']); ?>
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
                    <li><a href="#">Category</a></li>
                    <li><a href="#">Product Listing</a></li>
                </ol>

                <h2 class="text-center portfolio-text">OUR PRODUCTS</h2>

                <?=
                yii\widgets\ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'pager' => [
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                        'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
                        'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
                        'options' => ['class' => 'pagination', 'style' => 'clear:both; float:right;'],
                    ],
                ]);
                ?>

               
            </div>
        </div>
    </div>
</div>

<div style="clear: both"></div>

