<?php
        Yii::app()->clientScript->registerScript('watermark', '
                function hideImages()
                {
                        $("#main-image-0").hide();
                        $("#main-image-1").hide();
                        $("#main-image-2").hide();
                        $("#main-image-3").hide();
                        $("#main-image-4").hide();
                }
                
                $("#sub-image-0").mouseover(function() {
                        hideImages();
                        $("#main-image-0").show();
                });
                $("#sub-image-1").mouseover(function() {
                        hideImages();
                        $("#main-image-1").show();
                });
                $("#sub-image-2").mouseover(function() {
                        hideImages();
                        $("#main-image-2").show();
                });
                $("#sub-image-3").mouseover(function() {
                        hideImages();
                        $("#main-image-3").show();
                });
                $("#sub-image-4").mouseover(function() {
                        hideImages();
                        $("#main-image-4").show();
                });
        ');
        
        Yii::app()->clientScript->registerCss('detail', '
                #product-detail #panel-left
                {
                        float: left;
                        width: 305px;
                }
                
                #product-detail #panel-left #panel-top
                {
                        margin-bottom: 10px;
                }
                
                #product-detail #panel-left #panel-bottom
                {
                        margin-top: 10px;
                }
                
                #product-detail #panel-left .main-image
                {
                        width: 300px;
                        height: 300px;
                }
                
                #product-detail #panel-left .sub-image
                {
                        width: 55px;
                        height: 55px;
                }
                
                #product-detail #panel-right
                {
                        float: left;
                        width: 320px;
                        margin-left: 20px;
                }
        ');
?>

<div id="product-detail">
<!--        <div id="panel-left">
                <div id="panel-top">
                        <?php foreach ($product->getRelated('images', false, array('limit'=>5)) as $i=>$image): ?>
                                <div class="main-image" id="main-image-<?php echo $i; ?>" style="margin-left: 2px; margin-right: 2px; display: <?php echo ($i === 0) ? 'block' : 'none'; ?>"><?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/original/'.CHtml::encode(CHtml::value($image, 'filename')), '', array('class'=>'main-image')); ?></div>
                        <?php endforeach; ?>
                </div>
                <hr />
                <div id="panel-bottom">
                        <?php foreach ($product->getRelated('images', false, array('limit'=>5)) as $i=>$image): ?>
                                <div class="sub-image" id="sub-image-<?php echo $i; ?>" style="float: left; margin: 3px"><?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/thumbnail/'.CHtml::value($image, 'filename'), '', array('class'=>'sub-image')); ?></div>
                        <?php endforeach; ?>
                </div>
        </div>-->



         
        <div id="panel-right">
                <div class="title"><?php echo Html::encode($product->name); ?></div>
                <div class="title">$<?php //echo Html::encode( number_format($product->price, 2) ); ?></div>
                
                <hr class="topruler" />
                <hr class="middleruler" />
                <hr class="bottomruler" />
                
                <div class="description"><?php echo Html::encode($product->description); ?></div>
                
                <hr class="topruler" />
                <hr class="middleruler" />
                <hr class="bottomruler" />
                
<!--                <div class="form">
                        <?php echo CHtml::beginForm(); ?>
                                <div class="row">
                                        <div style="float: left; margin-right: 5px"><?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/shopping_cart.png', '', array('style'=>'vertical-align: bottom')); ?></div>
                                        <div style="float: left"><?php echo CHtml::activeTextField($productForm, 'quantity', array('size'=>3, 'maxlength'=>3, 'style'=>'text-align: center')); ?></div>
                                        <div style="float: left; margin-left: 5px"><?php echo CHtml::submitButton('Add to cart'); ?></div>
                                        <div class="clear"><?php echo CHtml::error($productForm, 'quantity'); ?></div>
                                </div>
                        <?php echo CHtml::endForm(); ?>
                </div>-->
        </div>
        <div class="clear"></div>
</div>