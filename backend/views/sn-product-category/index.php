<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\SnProductCategory;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SnProductCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sn Product Category';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-product-category-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'table table-bordered table-hover'],
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'category',
            //'status',
            //'created_by',
            //'created_date',
            // 'modified_by',
            // 'modified_date',
            //['class' => 'yii\grid\ActionColumn'],
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->status === $model::STATUS_ACTIVE) {
                        $class = 'label-success';
                    } elseif ($model->status === $model::STATUS_INACTIVE) {
                        $class = 'label-warning';
                    } else {
                        $class = 'label-danger';
                    }

                    return '<span class="label ' . $class . '">' . $model->statusLabel . '</span>';
                },
                'filter' => Html::activeDropDownList(
                        $searchModel, 'status', $arrayStatus, ['class' => 'form-control', 'prompt' => 'Please Filter']
                )
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {inactive}',
                'buttons' => [
                    'inactive' => function ($url, $model) {
                        if ($model->status != $model::STATUS_INACTIVE) {
                            return Html::a('<span class="glyphicon glyphicon-eye-close"></span>', ['inactive', 'id' => $model->id], [
                                        'title' => 'Inactive',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to inactive this item?',
                                            'method' => 'post',
                                        ],
                            ]);
                        } else {
                            return '<span class="glyphicon glyphicon-eye-close "></span>';
                        }
                    }
                        ],
                    ],
                ],
            ]);
            ?>

</div>
