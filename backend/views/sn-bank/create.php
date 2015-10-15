<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SnBank */

$this->title = 'Create Sn Bank';
$this->params['breadcrumbs'][] = ['label' => 'Sn Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-bank-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
