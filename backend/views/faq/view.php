<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Faq;

/* @var $this yii\web\View */
/* @var $model common\models\Faq */

$this->title = 'View Faq : '. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Faqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'question:html',
            'answer:html',
            'faq_order',
            [
                'attribute' => 'is_disabled',
                'value' => $model->is_disabled == 0 ? "Yes": "No",
            ],
        ],
    ]) ?>
    <p style="text-align: right">
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
