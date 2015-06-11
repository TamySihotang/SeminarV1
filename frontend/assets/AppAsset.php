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
        'css/site.css',
        'admin/assets/style.css',
        'admin/assets/css/shortcode.css',
        'admin/assets/css/woocommerce.css' ,
        'admin/assets/css/responsive.css',
        'admin/assets/3rd/font-awesome/font-awesome.css',
        'admin/assets/3rd/pretty-photo/pretty-photo.css' ,
        'admin/assets/3rd/layerslider/css/layerslider.css' ,
    ];
    public $js = [
        'admin/assets/3rd/jquery/jquery-core.js',
		'admin/assets/3rd/jquery/jquery-ui.js',
		'admin/assets/3rd/jquery/jquery-tinynav.js',
		'admin/assets/3rd/jquery/jquery-isotope.js',
		'admin/assets/3rd/jquery/jquery-flexslider.js',
		'admin/assets/3rd/jquery/jquery-countdown.js',
		'admin/assets/3rd/jquery/jquery-masonry.js',
		'admin/assets/3rd/jquery/jquery.leanModal.min.js',
		'admin/assets/3rd/jquery/jquery-validate.js',
		'admin/assets/3rd/pretty-photo/pretty-photo.js',
		'admin/assets/3rd/layerslider/js/greensock.js',
		'admin/assets/3rd/layerslider/js/layerslider_kreaturamedia_jquery.js',
		'admin/assets/3rd/layerslider/js/layerslider_transitions.js',
		'admin/assets/js/theme.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
