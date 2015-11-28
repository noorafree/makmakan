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
        'css/bootstrap.min.css',
        'css/bootstrap.offcanvas.min.css',
        'custom-style.css',
        'css/lightbox.css',
        'style.css',
        'https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic'
//        'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
//        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
    ];
    
    public $js = [
//        'js/jquery-2.1.4.min.js',
        'js/bootstrap.min.js',
        'js/bootstrap.offcanvas.min.js',
        'https://maps.googleapis.com/maps/api/js',
        'js/lightbox.min.js',
        'js/modal.js',
        'js/bootstrap-treeview.js',
        'js/usermenu.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];

}
