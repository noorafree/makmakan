<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\SnBank;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'first_name',
            'last_name',
            'birthdate',
            'phone',
            'mobile',
            'username',
            'sex',
            [
                'attribute' => 'last_login_date',
                'value' => date("d-M-Y", strtotime($model->last_login_date)),
            ],
//            'image_path',
            'address:ntext',
            [
                'attribute' => 'featured',
                'value'=> $model->featured==1?'YES':'NO'
            ],
            'makmakan_credit',
            'bank_account_number',
            'bank_account_name',
            'snBank.bank',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
//            'status',
//            'created_date',
//            'modified_date',
//            'created_by',
//            'modified_by',
            [
                'attribute' => 'image',
                'value' => $model->image_path,
                'format' => ['image', ['width' => '50', 'height' => '50']],
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
