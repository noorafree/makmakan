<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap\Modal;

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
            <div class="row">
                <div class="col-md-3 ">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle menu-button" data-toggle="collapse" data-target="#myNavbar">
                            <span class="glyphicon glyphicon-align-justify"></span>
                        </button>
                        <a class="navbar-brand logo"><img src="images/logo.png" /></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <nav class="collapse navbar-collapse" id="myNavbar" role="navigation">
                        <ul class="nav navbar-nav navbar-right menu">
                            <li><?= Html::a('Home', ['site/index'], ['class' => Yii::$app->controller->action->id == 'index' ? 'active' : '']); ?></li>
                            <li><?= Html::a('Menu', ['site/menu'], ['class' => Yii::$app->controller->action->id == 'menu' ? 'active' : '']); ?></li>
                            <li><?= Html::a('About Us', ['site/about'], ['class' => Yii::$app->controller->action->id == 'about' ? 'active' : '']); ?></li>
                            <?php
                            if (Yii::$app->user->isGuest) {
                                echo '<li>';
                                echo Html::a('Masuk', '#', ['value' => Url::to('index.php?r=site/login'), 'id' => 'loginLink',
                                    'data-toggle' => 'modal', 'data-dismiss' => 'modal', 'data-modal' => 'loginModal', 'data-backdrop' => 'static', 'data-keyboard' => 'false']);
                                echo '</li>';
                                echo '<li>';
                                echo Html::a('Daftar', '#', ['value' => Url::to('index.php?r=site/signup'), 'id' => 'signupLink',
                                    'data-toggle' => 'modal', 'data-dismiss' => 'modal', 'data-modal' => 'signupModal']);
                                echo '</li>';
                            } else {
                                echo '<li>';
                                echo Html::a('Keluar', ['site/logout'], ['data-method' => 'post']);
                                echo '</li>';
                            }
                            ?>
                            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart (0)</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <?php $this->beginBody() ?>
        <?= $content ?>
        <?php $this->endBody() ?>
        <div class="container-fluid footer" id="section4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3 hidden-sm hidden-xs division">
                            <h3>CATEGORIES</h3>
                            <p>American Foods</p>
                            <p>Indonesian Foods</p>
                            <p>Asian Foods</p>
                            <p>Indian Foods</p>
                        </div>
                        <div class="col-md-3 col-sm-6 hidden-xs division">
                            <h3>CONTACT US</h3>
                            <p>Ruko Garden Shopping Arcade Jl. Letjen S.Parman Kav. 28</p
                            <p>Grogol - Petamburan Jakarta Barat 11470</p>
                            <p class="visible-sm">Email: sales@makmakan.com
                            <p class="visible-sm">Senin - Jumat: 10.00 - 19.00</p>
                            <p class="visible-sm">Sabtu: 10.00 - 17.00</p>
                            <p class="visible-sm">Minggu: 12.00 - 17.00</p>
                        </div>
                        <div class="col-md-3 hidden-sm hidden-xs division">
                            <br/><br/>
                            <p>Email: sales@makmakan.com
                            <p>Senin - Jumat: 10.00 - 19.00</p>
                            <p>Sabtu: 10.00 - 17.00</p>
                            <p>Minggu: 12.00 - 17.00</p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 division">
                            <h3>KEEP IN TOUCH</h3>
                            <input style="border-radius: 0;" id="subscriber" type="text" class="form-control" placeholder="enter your email here"/>
                            <h3>BE SOCIAL</h3>
                            <a href="#"><img src="images/facebook.gif" style="width: 20%; height: auto;"/></a>
                            <a href="#"><img src="images/twitter.gif" style="width: 20%; height: auto;"/></a>
                            <a href="#"><img src="images/gplus.gif" style="width: 20%; height: auto;"/></a>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <img class="center-block footer-image" src="images/footer.png" />
                    </div>
                    <div class="col-md-12 copyright">
                        <p>Copyright &copy; 2015 Makmakan is a registered trademark</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        Modal::begin([
            'id' => 'loginModal',
            'size' => 'modal-sm',
            'header' => '<h4>Sign In</h4>',
        ]);
        echo "<div id=loginModalContent> </div> ";
        Modal::end();
        ?>
        <?php
        Modal::begin([
            'id' => 'signupModal',
            'size' => 'modal-sm',
            'header' => '<h4>Sign Up</h4>',
        ]);
        echo "<div id=signupModalContent> </div> ";
        Modal::end();
        ?>
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
