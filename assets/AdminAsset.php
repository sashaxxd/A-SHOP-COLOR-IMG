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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/admin/bootstrap.min.css',
        'css/admin/datepicker3.css',
        'css/admin/styles.css',
        'css/admin/main.css',
        'css/flash_message.css',
    ];
    public $js = [
//        'js/jquery-3.2.1.js',

        'js/admin/ru-RU.js',
        'js/admin/lumino.glyphs.js',
        'js/admin/bootstrap.min.js',
        'js/admin/respond.min.js',
        'js/admin/chart.min.js',
        'js/admin/chart.min.js',
//        'js/admin/chart-data.js',
//        'js/admin/easypiechart.js',
//        'js/admin/easypiechart-data.js',
        'js/flash_message.js',
        'js/admin/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
       //  'yii\web\JqueryAsset',//Cтавим зависимость от jquery - отключит встроенный Jquery
    ];

    public $jsOptions = [ 'position' => \yii\web\View::POS_END ];
}
