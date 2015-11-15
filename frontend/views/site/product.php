<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
?>
<?= Html::beginForm(Yii::$app->request->url, 'get'); ?>
<div class="container-fluid work" id="work">
    <div class="container">
        <div class="row" id="starts">
            <div class="col-md-12 col-sm-12 col-xs-12 work-list">
                <h2 class="text-center portfolio-text"> <?= Html::textInput('Search'); ?></h2>
                <?=
                yii\widgets\ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'pager' => [
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                        'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
                        'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
                         'options'=>['class'=>'pagination', 'style' => 'clear:both; float:right;'], 
                    ],
                ]);
                ?>

            </div>
        </div>
    </div>
</div>
<?= Html::endForm(); ?>
<div style="clear: both"></div>

