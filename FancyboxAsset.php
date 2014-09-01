<?php
namespace webvimark\extensions\fancybox;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class FancyboxAsset
 * @package webvimark\extensions\fancybox
 */
class FancyboxAsset extends AssetBundle
{
	public function init()
	{
		$this->sourcePath = __DIR__ . '/assets';
		$this->js = ['jquery.fancybox.pack.js?v=2.1.5'];
		$this->css = ['jquery.fancybox.css?v=2.1.5'];

		$this->depends = [
			JqueryAsset::className(),
		];

		parent::init();
	}
}
