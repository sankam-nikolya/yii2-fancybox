<?php
namespace sankam\fancybox;

use yii\web\AssetBundle;

/**
 * FancyBoxAsset
 *
 * @author Nikolya <k_m_i@i.ua>
 * @link http://sankam.com.ua
 * @package sankam\fancybox
 */
class FancyBoxAsset extends AssetBundle
{
    public $sourcePath = '@bower/fancybox/dist/';

    public $css = [
        YII_ENV_DEV ? 'jquery.fancybox.css' : 'jquery.fancybox.min.css'
    ];

    public $js = [
        YII_ENV_DEV ? 'jquery.fancybox.js' : 'jquery.fancybox.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
