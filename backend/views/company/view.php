<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = "View Companies : ";
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
?>
<div class="company-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'about_us',
                'format' => 'html',
                'value' => $model->about_us,
                'visible' => Yii::$app->controller->action->id == 'view-about-us' ? true : false,
            ],
        ],
//        'attributes' => [
//            [
//                'attribute' => 'purchasing_guide',
//                'format' => 'html',
//                'value' => $model->purchasing_guide,
//                'visible' => Yii::$app->controller->action->id == 'view-purchasing-guide' ? true : false,
//            ],
//        ],
//         'attributes' => [
//            [
//                'attribute' => 'return_policy',
//                'format' => 'html',
//                'value' => $model->return_policy,
//                'visible' => Yii::$app->controller->action->id == 'view-return-policy' ? true : false,
//            ],
//        ],
//         'attributes' => [
//            [
//                'attribute' => 'terms_and_condition',
//                'format' => 'html',
//                'value' => $model->terms_and_condition,
//                'visible' => Yii::$app->controller->action->id == 'view-terms-and-agreement' ? true : false,
//            ],
//        ],
    ]) ?>

</div>
