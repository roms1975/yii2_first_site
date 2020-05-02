<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
	'js/fancybox/jquery.fancybox-1.3.4.css',
        'css/style.css',
        'css/fontawesome.min.css',
        'css/bootstrap.min.css',
        'css/all.min.css'
    ];
    public $js = [
        'js/jquery-1.4.3.min.js',
        'js/fancybox/jquery.fancybox-1.3.4.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
