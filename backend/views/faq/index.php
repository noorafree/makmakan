<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Faq;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Faq', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'question:html',
            'answer:html',
            'faq_order',
            [
                'attribute' => 'is_disabled',
                'value' =>  function ($data){
                                return $data->is_disabled==0 ? "Yes": "No";
                            },
                'filter' => Html::activeDropDownList(
                        $searchModel,
                        'is_disabled',
                        Faq::getIsDisabled(),
                        ['class' => 'form-control', 'prompt' => 'Please Select']
                ),
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
