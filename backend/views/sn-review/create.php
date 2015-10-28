<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SnReview */

$this->title = 'Create Sn Review';
$this->params['breadcrumbs'][] = ['label' => 'Sn Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sn-review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
