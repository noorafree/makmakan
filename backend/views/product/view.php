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
            array(
                'label' => 'PO',
                'value' => $model->getPo(),
            ),
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
            array(
                'label' => 'Non Halal',
                'value' => $model->getNonHalal(),
            ),
            'minimum_order',
            array(
                'label' => 'Ready For Order',
                'value' => $model->getReadyForOrder(),
            ),
            array(
                'label' => 'Featured',
                'value' => $model->getFeatured(),
            ),
            'description:html',
            'meta_tag',
            'meta_description',
        ],
    ])
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [
            [
                'attribute' => 'product_id',
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
