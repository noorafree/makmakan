<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'View Admin : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'username',
            'address',
            'email:email',
            [
                'attribute' => 'auth_role',
                'value' => $model->authRoleLabel,
            ],
            [
                'attribute'=>'image',
                'value'=>$model->image,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],

            [
                'attribute' => 'status',
                'value' => $model->statusLabel,
            ],
        ],
    ]) ?>

</div>
