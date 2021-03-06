<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BlogAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/libs/font-awesome.css',
        'css/libs/nanoscroller.css',
        'css/compiled/theme_styles.css',
        '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400',
    ];
    public $js = [
        'js/demo-rtl.js',
        'js/demo-skin-changer.js',
        'js/jquery.nanoscroller.min.js',
        'js/demo.js',
        'js/scripts.js',
        'js/pace.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
