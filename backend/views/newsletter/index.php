<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsletterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newsletters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Newsletter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!-- http://www.bsourcecode.com/yiiframework2/gridview-in-yiiframework-2-0/  referensi tentang gridview -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=> '', // menghilangkan tampilan total item 'summary' => '{begin} - {end} {count} {totalCount} {page} {pageCount}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'subject:ntext',
            'message:html',
            [
                'attribute' => 'is_deleted',
                'format' => 'html',
                'value' => function ($model) {
                        if ($model->is_deleted === Status::STATUS_ACTIVE) {
                            $class = 'label-success';
                        } elseif ($model->is_deleted === Status::STATUS_INACTIVE) {
                            $class = 'label-warning';
                        } else {
                            $class = 'label-danger';
                        }

                        return '<span class="label ' . $class . '">' . $model->getStatus()->label . '</span>';
                    },
                /*'filter' => Html::activeDropDownList(
                        $searchModel,
                        'is_deleted',
                        Status::labels(),
                        ['class' => 'form-control', 'prompt' => 'Please Select']
                    )*/
                'filter' => '',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
