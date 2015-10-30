<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'birthdate',
            'phone',
            'mobile',
            'username',
            'sex',
            'last_login_date',
            'image_path',
            'address:ntext',
            'featured',
            'makmakan_credit',
            'bank_account_number',
            'bank_account_name',
            'sn_bank_id',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
//            'status',
//            'created_date',
//            'modified_date',
//            'created_by',
//            'modified_by',
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
