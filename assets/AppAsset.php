<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/carousel.css',
        'js/fullcalendar/bootstrap-fullcalendar.css',
        'js/fullcalendar/fullcalendar.css',
        'js/fancybox/jquery.fancybox.css',
        'css/calendar.css',
//        'css/style.css',
        'css/style-responsive.css',
    ];
    public $js = [
        'js/jquery-1.10.2.min.js',
        'js/jquery-ui-1.9.2.custom.min.js',
        'js/jquery-migrate-1.2.1.min.js',
        'js/bootstrap.min.js',
        'js/fancybox/jquery.fancybox.js',
        'js/fancybox.js',
        'js/fullcalendar/fullcalendar.min.js',
        'js/calendar.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}