<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=> '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'question:html',
            'answer:html',
            'faq_order',
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
                            return Html::a('<span class="glyphicon glyphicon-eye-close"></span>', ['inactive', 'id' => $model->id], [
                                        'title' => 'Inactive',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to inactive this user?',
                                            'method' => 'post',
                                        ],
                            ]);
                        } else if ($model->status == Status::STATUS_INACTIVE) {
                            return Html::a('<span class="glyphicon glyphicon-exclamation-sign"></span>', ['active', 'id' => $model->id], [
                                        'title' => 'Active',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to actived this user?',
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
