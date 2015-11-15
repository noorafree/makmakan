<?php 
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

?>


                <div class="col-md-4 col-sm-6 col-xs-12 work-space">
                    <h1><?= Html::encode($model->name) ?></h1>
                   <?php echo Html::a(Html::img(Yii::$app->request->baseUrl.'/images/product/'.Html::encode($model->productPhotos[0]->id), '', array('width'=>'200px', 'height'=>'250px')), array('site/detail', 'id'=>Html::encode($model->id))); ?>
       
                    <a href="images/story1.png" data-lightbox="image-1">
                        <div class="featured-img">
                            <img src="images/story1.png"/>
                        </div>
                        <div class="image-hover">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </div>
                    </a>
                </div>
            