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
class AppAsset extends AssetBundle
{
    
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'style.css',
        'css/lightbox.css',
        'http://fonts.googleapis.com/css?family=Poppins:400,600,700,500,300',
        'http://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,400italic,500,500italic,300,100italic,100,300italic',
//        'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
//        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
    ];
    public $js = [
//        'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
        'js/jquery-2.1.4.min',
        'js/bootstrap.min.js',
        'js/jquery.countTo.js',
        'js/jquery.waypoints.min.js',
        'https://maps.googleapis.com/maps/api/js',
        'js/lightbox.min.js',
        'js/modal.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
