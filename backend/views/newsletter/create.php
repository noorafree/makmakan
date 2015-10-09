<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Newsletter */

$this->title = 'Create Newsletter';
$this->params['breadcrumbs'][] = ['label' => 'Newsletters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
