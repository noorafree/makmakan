<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <?= Html::a('Change Password', ['/site/change-password', 'id' => Yii::$app->user->identity->id], ['class' => 'btn btn-default btn-flat']) ?>
                </li>
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= Html::Img(Html::Encode(Yii::$app->user->identity->image), ['alt'=>'User Image', 'class'=>'user-image']);  ?>
                        <span class="hidden-xs"><?= Html::Encode(Yii::$app->user->identity->name);  ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?= Html::Img(Html::Encode(Yii::$app->user->identity->image), ['alt'=>'User Image', 'class'=>'img-circle']);  ?>
                            
                            <p>
                                <?= Html::Encode(Yii::$app->user->identity->name);  ?>
                                <small><?= Html::Encode(Yii::$app->user->identity->email);  ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a('Profile', ['/admin/view', 'id' => Yii::$app->user->identity->id], ['class' => 'btn btn-default btn-flat']) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
