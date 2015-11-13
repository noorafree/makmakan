<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle menu-button" data-toggle="collapse" data-target="#myNavbar">
                                <span class="glyphicon glyphicon-align-justify"></span>
                            </button>
                            <a class="navbar-brand logo"><img src="images/makmakanlogo.gif" /></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <nav class="collapse navbar-collapse" id="myNavbar" role="navigation">
                            <ul class="nav navbar-nav navbar-right menu">
                                <li><?= Html::a("Home", 'site/index.php', ['class' => 'active']); ?></li>
                                <li><a href="#">Menu</a></li>
                                <li><a href="#">Sign In</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart (0)</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <?php $this->beginBody() ?>
        <?= $content ?>
        <?php $this->endBody() ?>

        <script>
            function initialize() {
                var mapCanvas = document.getElementById('map-canvas');
                var mapOptions = {
                    center: new google.maps.LatLng(26.802100, 75.822739),
                    zoom: 8,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(mapCanvas, mapOptions)
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <script>
            $(document).ready(function () {
                $(document).on("scroll", onScroll);

                $('a[href^="#"]').on('click', function (e) {
                    e.preventDefault();
                    $(document).off("scroll");

                    $('a').each(function () {
                        $(this).removeClass('active');
                    })
                    $(this).addClass('active');

                    var target = this.hash;
                    $target = $(target);
                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top
                    }, 500, 'swing', function () {
                        window.location.hash = target;
                        $(document).on("scroll", onScroll);
                    });
                });
            });

            function onScroll(event) {
                var scrollPosition = $(document).scrollTop();
                $('nav a').each(function () {
                    var currentLink = $(this);
                    var refElement = $(currentLink.attr("href"));
                    if (refElement.position().top <= scrollPosition && refElement.position().top + refElement.height() > scrollPosition) {
                        $('nav ul li a').removeClass("active");
                        currentLink.addClass("active");
                    }
                    else {
                        currentLink.removeClass("active");
                    }
                });
            }
        </script>
        <script type="text/javascript">
            jQuery(function ($) {
                // custom formatting example
                $('.timer').data('countToOptions', {
                    formatter: function (value, options) {
                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                    }
                });

                // start all the timers
                $('#starts').waypoint(function () {
                    $('.timer').each(count);
                });

                function count(options) {
                    var $this = $(this);
                    options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                    $this.countTo(options);
                }
            });
        </script>
    </body>
</html>
<?php $this->endPage() ?>
