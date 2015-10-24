<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AuthRole */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Access Level', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-role-view">
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'description',
            [
                'attribute' => 'operation_list',
                'value' => $strOperation, //implode(';', call_user_func_array('Yii::t', explode(';', $model->operation_list))),
            ],
        ],
    ])
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
