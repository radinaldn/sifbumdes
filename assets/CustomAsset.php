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
class CustomAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    'css/site.css',
    'custom/assets/css/bootstrap.min.css',
        'custom/assets/css/animate.min.css',
        'custom/assets/css/paper-dashboard.css',
        'custom/assets/css/demo.css',
        'http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
        'https://fonts.googleapis.com/css?family=Muli:400,300',
        'custom/assets/css/themify-icons.css',

    ];
    public $js = [
    'custom/assets/js/jquery-1.10.2.js',
        'custom/assets/js/bootstrap.min.js',
        'custom/assets/js/bootstrap-checkbox-radio.js',
        'custom/assets/js/chartist.min.js',
        'custom/assets/js/bootstrap-notify.js',
        'https://maps.googleapis.com/maps/api/js',
        'custom/assets/js/paper-dashboard.js',
        'custom/assets/js/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
?>

    

