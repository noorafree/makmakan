<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdvertiserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advertisers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertiser-index">


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 'options' => ['class' => 'table table-bordered table-hover'],
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'address',
            'phone',
            'mobile',
            // 'email:email',
            // 'company',
            // 'status',
            // 'created_by',
            // 'created_date',
            // 'modified_by',
            // 'modified_date',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->status === Status::STATUS_ACTIVE) {
                        $class = 'label-success';
                    } elseif ($model->status === Status::STATUS_INACTIVE) {
                        $class = 'label-warning';
                    } else {
                        $class = 'label-danger';
                    }

                    return '<span class="label ' . $class . '">' . $model->getStatus()->label . '</span>';
                },
                'filter' => Html::activeDropDownList(
                        $searchModel, 'status', Status::labels(), ['class' => 'form-control', 'prompt' => 'Please Select']
                ),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {inactive}',
                'buttons' => [
                    'inactive' => function ($url, $model) {
                        if ($model->status != Status::STATUS_INACTIVE) {
                            return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['inactive', 'id' => $model->id], [
                                        'title' => 'Inactive',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to deactive this bank?',
                                            'method' => 'post',
                                        ],
                            ]);
                        } else if ($model->status == Status::STATUS_INACTIVE) {
                            return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['active', 'id' => $model->id], [
                                        'title' => 'Active',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to activate this bank?',
                                            'method' => 'post',
                                        ],
                            ]);
                        } else {
                            return '<span class="glyphicon glyphicon-ok"></span>';
                        }
                    }
                        ],
                    ],
                ],
            ]);
            ?>

</div>
