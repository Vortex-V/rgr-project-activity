<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace App\Asset;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\bootstrap5\BootstrapAsset;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@assets/site';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class
    ];
}
