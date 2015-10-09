<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Admin;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create ' . 'Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => ['class' => 'table table-bordered table-hover'],
            'summary'=> '',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'username',
                'name',
                //'address',
                // 'auth_key',
                // 'password_hash',
                // 'password_reset_token',
                'email:email',
               /* [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'birthdate',
                    'value' => 'birthdate',
                    //'headerOptions' => ['class' => 'text-center'],
                    'label' => 'Date',
                    //'contentOptions' => ['style' => 'width: 130px;', 'class' => 'text-center'],
                    'format' => 'raw',
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'birthdate',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-m-d'
                        ]
                    ])
                ],*/
                /*[
                    'attribute' => 'role',
                    'value' => function ($model) {
                                return $model->roleLabel;
                            },
                    'filter' => Html::activeDropDownList(
                            $searchModel,
                            'role',
                            $arrayRole,
                            ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                        )
                ],*/
                [
                    'attribute' => 'auth_role',
                    'value' => function ($model) {
                                return $model->authRoleLabel;
                            },
                    'filter' => Html::activeDropDownList(
                            $searchModel,
                            'auth_role',
                            Admin::getArrayAuthRole(),
                            ['class' => 'form-control', 'prompt' => 'Please Filter']
                        )
                ],
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
                            $searchModel,
                            'status',
                            $arrayStatus,
                            ['class' => 'form-control', 'prompt' => 'Please Filter']
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
                                            'confirm' => 'Are you sure you want to inactive this user?',
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
        ]); ?>
    </div>
</div>
