<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Advertisement */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Advertisements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisement-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'amount',
            [
                'attribute' => 'start_date',
                'value' => date("d-M-Y", strtotime($model->start_date)),
            ],
            [
                'attribute' => 'end_date',
                'value' => date("d-M-Y", strtotime($model->start_date)),
            ],
            'advertisement_type',
//            'advertiser_id',
//            'status',
//            'created_by',
//            'created_date',
//            'modified_by',
//            'modified_date',
        ],
    ])
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [
            [
                'attribute' => 'advertisement_id',
                'value' => 'advertisement_id'
            ],
            'image_link',
            [
                'attribute' => 'image_path',
                'label' => 'Advertisement Picture',
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
                'confirm' => 'Are you sure you want to delete this advertisement?',
                'method' => 'post',
            ],
        ])
        ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
