<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserComplaint */

$this->title = $model->user_id;
$this->title = 'User Complaints';
$this->params['breadcrumbs'][] = ['label' => 'User Complaints', 'url' => ['index']];
?>
<div class="user-complaint-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            
            'complaint_type',
            'description:ntext',
        //'created_by',
        //'created_date',
        //'modified_by',
        //'modified_date',
        //'status',
        ],
    ])
    ?>
    
</div>
