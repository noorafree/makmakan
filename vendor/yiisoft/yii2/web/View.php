<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Profile Picture',
                'attribute' => 'image',
                'value' => $model->image,
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
            'name',
            'birthdate',
            'address',
            'username',
            'email:email',
            [
                'attribute' => 'auth_role',
                'value' => $model->authRoleLabel,
            ],
        ],
    ])
    ?>

    <p style="text-align: right">
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Change Password', ['/site/change-password', 'id' => Yii::$app->user->identity->id], ['class' => 'btn btn-info']) ?>
    </p>

</div>
