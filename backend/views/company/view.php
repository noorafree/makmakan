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
        'attributes' => [
            [
                'attribute' => 'purchasing_guide',
                'format' => 'html',
                'value' => $model->purchasing_guide,
                'visible' => Yii::$app->controller->action->id == 'view-purchasing-guide' ? true : false,
            ],
        ],
    ]) ?>

</div>
