<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'slider_amount',
            'title',
            'name',
            'about_us:ntext',
            // 'phone',
            // 'address',
            // 'longitude',
            // 'latitude',
            // 'twitter_url:url',
            // 'facebook_url:url',
            // 'instagram_url:url',
            // 'gplus_url:url',
            // 'terms_and_condition:ntext',
            // 'purchashing_guide:ntext',
            // 'payment_guide:ntext',
            // 'delivery_guide:ntext',
            // 'return_policy:ntext',
            // 'privacy_policy:ntext',
            // 'logo_path',
            // 'favicon_path',
            // 'created_by',
            // 'created_date',
            // 'last_modified_by',
            // 'last_modified_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
