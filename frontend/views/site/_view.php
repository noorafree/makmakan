<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\i18n\Formatter
?>

<div class="col-md-4 col-sm-6 col-xs-12 work-space">
    <a href="<?= Yii::$app->urlManager->createUrl(['site/detail', 'id' => $model->id]) ?>">
        <div class="featured-img">
            <?= Html::img(Yii::$app->request->baseUrl . '/images/product/'. Html::encode($model->productPhotos[0]->id), '', ['class' => 'img-responsive']); ?>
        </div>
        <div class="image-hover">
            <i class="glyphicon glyphicon-eye-open"></i>
        </div>
        <h3><?= Html::encode($model->snProductCategory->category); ?></h3>

        <h2><?= Html::encode($model->name) ?></h2>
        <h4><?= Html::encode(Yii::$app->formatter->asCurrency($model->selling_price)); ?></h4>
    </a>
</div>

