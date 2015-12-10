<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
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
            <div class="navbar-header">
                <button type="button" class="navbar-toggle offcanvas-toggle pull-right menu-button" data-toggle="offcanvas" data-target="#myNavbar" style="float:left;">
                    <span class="glyphicon glyphicon-align-justify"></span>
                </button>
                <a class="navbar-brand logo"><img src="images/logo.png" /></a>
            </div>
            <div class="navbar-offcanvas navbar-offcanvas-touch" style="margin-right: 20px; background-color: #FFF" id="myNavbar" role="navigation">
                <ul class="nav navbar-nav navbar-right menu">
                    <li><?= Html::a('Home', ['site/index'], ['class' => Yii::$app->controller->action->id == 'index' ? 'active' : '']); ?></li>
                    <li><?= Html::a('Menu', ['site/product'], ['class' => Yii::$app->controller->action->id == 'menu' ? 'active' : '']); ?></li>
                    <li><?= Html::a('About Us', ['site/about'], ['class' => Yii::$app->controller->action->id == 'about' ? 'active' : '']); ?></li>
                    <?php
                    if (Yii::$app->user->isGuest) {
                        echo '<li>';
                        echo Html::a('Masuk', '#', ['value' => Url::to('index.php?r=site/login'), 'id' => 'loginLink']);
                        echo '</li>';
                        echo '<li>';
                        echo Html::a('Daftar', '#', ['value' => Url::to('index.php?r=site/signup'), 'id' => 'signupLink']);
                        echo '</li>';
                    } else {
                        echo '<li>';
                        echo Html::a('Keluar', ['site/logout'], ['data-method' => 'post']);
                        echo '</li>';
                    }
                    ?>
                    <li><?= Html::a('Cart', '#', ['value' => Url::to('index.php?r=cart/cart'), 'class' => 'cartLink']); ?></li>
                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart (0)</a></li>
                </ul>
            </div>
        </header>
        <?php $this->beginBody() ?>
        <?= $content ?>
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
                            <br/><br/><br/>
                            <p>Email: sales@makmakan.com
                            <p>Senin - Jumat: 10.00 - 19.00</p>
                            <p>Sabtu: 10.00 - 17.00</p>
                            <p>Minggu: 12.00 - 17.00</p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 division">
                            <h3>KEEP IN TOUCH</h3>
                            <input style="border-radius: 0;" id="subscriber" type="text" class="form-control" placeholder="Enter your email here"/>
                            <h3>BE SOCIAL</h3>
                            <div>
                                <a href="#"><img src="images/facebook.gif" style="width: 20%; height: auto;"/></a>
                                <a href="#"><img src="images/twitter.gif" style="width: 20%; height: auto;"/></a>
                                <a href="#"><img src="images/gplus.gif" style="width: 20%; height: auto;"/></a>
                            </div>
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
        <?php $this->endBody() ?>
        <?php
        Modal::begin([
            'id' => 'loginModal',
            'size' => 'modal-sm',
            'header' => '<img src="images/logo.png" class="modal-logo" />',
        ]);
        echo "<div id=loginModalContent> </div> ";
        Modal::end();
        ?>
        <?php
        Modal::begin([
            'id' => 'signupModal',
            'size' => 'modal-sm',
            'header' => '<img src="images/logo.png" class="modal-logo" />',
        ]);
        echo "<div id=signupModalContent> </div> ";
        Modal::end();
        ?>
        <?php
        Modal::begin([
            'id' => 'cartModal',
            'size' => 'modal-sm',
            'header' => '<img src="images/logo.png" class="modal-logo" />',
        ]);
        echo "<div id=cartModalContent> </div> ";
        Modal::end();
        ?>
    </body>
</html>
<?php $this->endPage() ?>
