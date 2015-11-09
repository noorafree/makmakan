<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SnBankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sn Banks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-bank-index">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'table table-bordered table-hover'],
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'bank',
//            'is_disabled',
//            'is_deleted',
            //'created_date',
            // 'created_by',
            // 'modified_date',
            // 'modified_by',
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
                            return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['inactive', 'id' => $model->id], [
                                        'title' => 'Inactive',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to deactive this bank?',
                                            'method' => 'post',
                                        ],
                            ]);
                        } else if ($model->status == Status::STATUS_INACTIVE) {
                            return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['active', 'id' => $model->id], [
                                        'title' => 'Active',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to activate this bank?',
                                            'method' => 'post',
                                        ],
                            ]);
                        } else {
                            return '<span class="glyphicon glyphicon-remove"></span>';
                        }
                    }
                        ],
                    ],
                ],
            ]);
            ?>
</div>
