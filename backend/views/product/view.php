<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use common\models\Status;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'plu',
            'name',
            'selling_price',
            'snProductCategory.category',
            'seen',
            'sold',
            'stock',
            [
                'attribute' => 'po_start_date',
                'value' => date("d-M-Y", strtotime($model->po_start_date)),
            ],
            [
                'attribute' => 'po_end_date',
                'value' => date("d-M-Y", strtotime($model->po_end_date)),
            ],
            [
                'attribute' => 'expired_date',
                'value' => date("d-M-Y", strtotime($model->expired_date)),
            ],
            [
                'label' => 'Non Halal',
                'value' => $model->getNonHalal(),
            ],
            'minimum_order',
            [
                'label' => 'Featured',
                'value' => $model->getFeatured(),
            ],
            'description:html',
            'meta_tag',
            'meta_description',
        ],
    ])
    ?>
    
   <h3>Ingredients</h3>
    <?=
    GridView::widget([
        'dataProvider' => $ingredients,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ingredient',
        ],
    ]);
    ?>
    
    <h3>Product Photos</h3>
    <?=
    GridView::widget([
        'dataProvider' => $productPhotos,
        'summary' => '',
        'columns' => [
            [
                'attribute' => 'product_id',
                'label' => 'Product Name',
                'value' => 'product.name'
            ],
            'caption',
            [
                'attribute' => 'image_path',
                'label' => 'Product Photo',
                'value' => 'image_path',
                'format' => ['image', ['width' => '100', 'height' => '100']]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{remove}',
                'buttons' => [
                    'remove' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['remove', 'id' => $model->id], [
                                    'title' => 'Remove Image',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this image?',
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                        ],
                    ],
                ],
            ]);
            ?>
    
    
    
     <h3>Review</h3>
    <?=
    GridView::widget([
        'dataProvider' => $productReviews,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'description:html',
            'stars',
            [
                'attribute' => 'sn_review_id',
                'label' => 'Review Type',
                'value' => 'review.review'
            ],
        ],
    ]);
    ?>

            <p style="text-align: right">
                <?=
                Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
