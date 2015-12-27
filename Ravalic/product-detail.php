<?php
/**
 * Created by PhpStorm.
 * User: Chandra
 * Date: 11/28/2015
 * Time: 2:40 PM
 */

include 'header.php';
?>


<div class="container-fluid work" id="work">
    <div class="container">
        <div class="row" id="starts">

            <!--YOUR CODE HERE-->
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
                <div class="col-md-5">
                    <div class="flexslider">
                        <script>
                            // Can also be used with $(document).ready()
                            $(window).load(function () {
                                $('.flexslider').flexslider({
                                    animation: "slide",
                                    controlNav: "thumbnails"
                                });
                            });
                        </script>

                        <ul class="slides">
                            <li data-thumb="images/small/image1.png">
                                <div class="thumb-image">
                                    <img src="images/small/image1.png" data-imagezoom="true"
                                         class="img-responsive">
                                </div>
                            </li>
                            <li data-thumb="images/small/image2.png">
                                <div class="thumb-image">
                                    <img src="images/small/image2.png" data-imagezoom="true"
                                         class="img-responsive">
                                </div>
                            </li>
                            <li data-thumb="images/small/image3.png">
                                <div class="thumb-image">
                                    <img src="images/small/image3.png" data-imagezoom="true"
                                         class="img-responsive">
                                </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="single-para ">
                        <h4>Lorem Ipsum</h4>

                        <div class="star-on">
                            <label>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                            </label>

                            <div class="review">
                                1 customer review
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h5 class="item_price">$ 95.00</h5>

                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                            diam nonummy nibh euismod tincidunt ut laoreet dolore
                            magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                            aliquip ex ea commodo consequat.</p>

                        <div class="available">
                            <div class="criteria">
                                <p>Color</p>
                                <select>
                                    <option>Silver</option>
                                    <option>Black</option>
                                    <option>Dark Black</option>
                                    <option>Red</option>
                                </select>
                            </div>

                            <div class="clearfix"></div>
                            <div class="criteria">
                                <p>Size</p>

                                <div class="size-in">
                                    <select>
                                        <option>Large</option>
                                        <option>Medium</option>
                                        <option>small</option>
                                        <option>Large</option>
                                        <option>small</option>
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <ul class="tag-men">
                            <li><span>TAG</span>
                                <span class="women1">: Women,Foods</span></li>
                            <li><span>SKU</span>
                                <span class="women1">: CK09</span></li>
                        </ul>
                        <a href="#" class="add-cart item_add">ADD TO CART</a>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="cd-tabs">
                    <ul class="cd-tabs-navigation">
                        <li><a data-toggle="tab" href="#desc" class="selected">Description </a></li>
                        <li><a data-toggle="tab" href="#rev">Reviews (1)</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="desc" class="tab-pane fade in active facts">
                            <p class="all-text">
                                There are many variations of passages of Lorem Ipsum available, but the
                                majority
                                have
                                suffered alteration in some form, by injected humour, or randomised words which
                                don't
                                look even slightly believable. If you are going to use a passage of Lorem Ipsum, you
                                need to be sure there isn't anything embarrassing hidden in the middle of text. All
                                the
                                Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                                necessary,
                                making this the first true generator on the Internet. It uses a dictionary of over
                                200
                                Latin words, combined
                            </p>
                        </div>

                        <div id="rev" class="tab-pane fade">
                            <div class="comments-top-top">
                                <div class="top-comment-left">
                                    <img class="img-responsive" src="images/co.png" alt="">
                                </div>
                                <div class="top-comment-right">
                                    <h6><a href="#">Hendri</a> - September 3, 2014</h6>
                                    <label>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                    </label>

                                    <p>Wow nice!</p>
                                </div>
                                <div class="clearfix"></div>
                                <a class="add-re" href="#">ADD REVIEW</a>
                                <script>
                                    $("a.add-re").click(function () {
                                        $(".form-comment").show("slow");
                                        $("a.add-re").hide("slow");
                                    });
                                </script>

                                <div class="form-comment">
                                    <form>
                                        <textarea rows="5" class="form-control"
                                                  placeholder="Enter your review here..."></textarea>
                                        <a class="button float-right" href="#">SUBMIT</a>
                                    </form>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
