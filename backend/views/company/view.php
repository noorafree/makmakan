<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slider_amount',
            'title',
            'name',
            'about_us:ntext',
            'phone',
            'address',
            'longitude',
            'latitude',
            'twitter_url:url',
            'facebook_url:url',
            'instagram_url:url',
            'gplus_url:url',
            'terms_and_condition:ntext',
            'purchashing_guide:ntext',
            'payment_guide:ntext',
            'delivery_guide:ntext',
            'return_policy:ntext',
            'privacy_policy:ntext',
            'logo_path',
            'favicon_path',
            'created_by',
            'created_date',
            'last_modified_by',
            'last_modified_date',
        ],
    ]) ?>

</div>
