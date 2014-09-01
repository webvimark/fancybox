<?php
namespace webvimark\extensions\fancybox;

use yii\base\Widget;
use yii\helpers\ArrayHelper;

/**
 * Fancybox 
 *
 * Elements with same "rel" will be considered as gallery
 */
class Fancybox extends Widget
{
        /**
         * target 
         * 
         * @var string
         */
        public $target = '.fancybox';

        /**
         * options 
         *
         * Fancybox options
         * 
         * @var array
         */
        public $options = array();

        /**
         * _merged_options 
         *
         * With no scroll to top
         * 
         * @var array
         */
        private $_merged_options;


        /**
         * init 
         * 
         * @return void
         */
        public function run()
        {
		FancyboxAsset::register($this->view);

                $this->_mergeOptions();

		$js = <<<JS
			$('$this->target').fancybox($this->_merged_options);
JS;

		$this->view->registerJs($js);
        }

        /**
         * _mergeOptions 
         *
         * No scroll to top + json encoding
         */
        private function _mergeOptions()
        {
                $overlayLocked = array(
                        'helpers'=>array(
                                'overlay'=>array('locked'=>false),
                        ),
                );

                $options = ArrayHelper::merge($this->options, $overlayLocked);

                $this->_merged_options = json_encode($options);
        }
}
