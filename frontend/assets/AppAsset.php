<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'css/bootstrap.min.css',
        'css/bootstrap.offcanvas.min.css',
        'css/bootstrap-timepicker.min.css',
        'custom-style.css',
        'css/lightbox.css',
        'style.css',
        'css/style2.css',
        'css/style3.css',
        'css/nouislider.css',
        'css/nouislider.pips.css',
        'css/nouislider.tooltips.css',
        'https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic',
        'css/flexslider.css'
    ];
    public $js = [
//        'js/jquery-2.1.4.min.js',
        'js/bootstrap.min.js',
        'js/bootstrap.offcanvas.min.js',
        'js/bootstrap-timepicker.min.js',
        'https://maps.googleapis.com/maps/api/js',
        'js/lightbox.min.js',
        'js/modal.js',
        'js/ddaccordion.js',
        'js/usermenu.js',
        'js/nouislider.js',
        'js/jquery.flexslider.js',
        'js/imagezoom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];

}
