<?php
/**
 * Created by PhpStorm.
 * User: Chandra
 * Date: 11/14/2015
 * Time: 6:06 PM
 */

include 'header.php';

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

                    <form>
                        <h4 class="text-center portfolio-text">Advanced Search</h4>
                        <input type="text" class="form-control" placeholder="Enter keyword..."/>
                        <section>
                            <h5 class="portfolio-text">By Price : (IDR)</h5>

                            <div id="slider-snap"></div>
                            <div class="col-md-6">
                                <label id="slider-snap-value-lower" class="float-left"/>
                            </div>
                            <div class="col-md-6">
                                <label id="slider-snap-value-upper" class="float-right"/>
                            </div>

                            <div class="clearfix"></div>
                        </section>

                        <section>
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
                        </section>
                        <section>
                            <div class="rating">
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
                            </div>
                        </section>

                        <section>
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
                        </section>
                        <a href="#" class="add-cart item_add">Search</a>
                    </form>

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

                    <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                        <a href="images/bakmi.jpg" data-lightbox="image-1">
                            <div class="featured-img">
                                <img src="images/bakmi.jpg" class="img-responsive"/>
                            </div>
                            <div class="image-hover">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </div>
                            <h3>Indonesian Food</h3>

                            <h2>Bakmi Ayam</h2>
                            <h4>IDR 20.000</h4>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                        <a href="images/steak.jpg" data-lightbox="image-1">
                            <div class="featured-img">
                                <img src="images/steak.jpg" class="img-responsive"/>
                            </div>
                            <div class="image-hover">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </div>
                            <h3>American Food</h3>

                            <h2>Grilled Beef Steak</h2>
                            <h4>IDR 60.000</h4>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                        <a href="images/ayamgoreng.jpg" data-lightbox="image-1">
                            <div class="featured-img">
                                <img src="images/ayamgoreng.jpg" class="img-responsive"/>
                            </div>
                            <div class="image-hover">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </div>
                            <h3>Indonesian Food</h3>

                            <h2>Ayam Goreng</h2>
                            <h4>IDR 25.000</h4>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                        <a href="images/nasduk.jpg" data-lightbox="image-1">
                            <div class="featured-img">
                                <img src="images/nasduk.jpg" class="img-responsive"/>
                            </div>
                            <div class="image-hover">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </div>
                            <h3>Indonesian Food</h3>

                            <h2>Nasi Uduk</h2>
                            <h4>IDR 20.000</h4>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                        <a href="images/martabak.jpg" data-lightbox="image-1">
                            <div class="featured-img">
                                <img src="images/martabak.jpg" class="img-responsive"/>
                            </div>
                            <div class="image-hover">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </div>
                            <h3>Indonesian Food</h3>

                            <h2>Martabak Manis</h2>
                            <h4>IDR 80.000</h4>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                        <a href="images/nasigoreng.jpg" data-lightbox="image-1">
                            <div class="featured-img">
                                <img src="images/nasigoreng.jpg" class="img-responsive"/>
                            </div>
                            <div class="image-hover">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </div>
                            <h3>Indonesian Food</h3>

                            <h2>Nasi Goreng Petai</h2>
                            <h4>IDR 17.000</h4>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                        <a href="images/ramen.jpg" data-lightbox="image-1">
                            <div class="featured-img">
                                <img src="images/ramen.jpg" class="img-responsive"/>
                            </div>
                            <div class="image-hover">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </div>
                            <h3>Japanese Food</h3>

                            <h2>Buta Miso Ramen</h2>
                            <h4>IDR 20.000</h4>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                        <a href="images/capcay.jpg" data-lightbox="image-1">
                            <div class="featured-img">
                                <img src="images/capcay.jpg" class="img-responsive"/>
                            </div>
                            <div class="image-hover">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </div>
                            <h3>Chinese Food</h3>

                            <h2>Capcay Kuah</h2>
                            <h4>IDR 20.000</h4>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                        <a href="images/soto.jpg" data-lightbox="image-1">
                            <div class="featured-img">
                                <img src="images/soto.jpg" class="img-responsive"/>
                            </div>
                            <div class="image-hover">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </div>
                            <h3>Indonesian Food</h3>

                            <h2>Soto Ayam Kudus</h2>
                            <h4>IDR 23.000</h4>
                        </a>
                    </div>

                    <ul class="pagination">
                        <li><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


<?php include 'footer.php'; ?>