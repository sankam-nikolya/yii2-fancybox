<?php
namespace sankam\fancybox;

use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * FancyBox Widget
 *
 * @version 0.0.1
 * @author Nikolya <k_m_i@i.ua>
 * @link http://sankam.com.ua
 * @package sankam\fancybox
 */
class FancyBox extends Widget
{
    public $target; 
    public $options = [];
    public $callbacks = [
        'beforeLoad',   // Before the content of a slide is being loaded
        'afterLoad',    // When the content of a slide is done loading
        'beforeMove',   // Before slide change transition starts
        'afterMove',    // After slide change transition is complete
        'onComplete',   // When slide change is complete and content has been loaded
        'onInit',       // When instance has been initialized
        'beforeClose',  // Before instance is closed
        'afterClose',   // After instance has been closed
        'onActivate',   // When instance is brought to front
        'onDeactivate', // When other instance has been activated
    ];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!is_array($this->options)) {
            throw new InvalidConfigException('The "options" property must be an array');
        }
        foreach ($this->callbacks as $callbackName) {
            if (isset($this->options[$callbackName]) && !($this->options[$callbackName] instanceof JsExpression)) {
                $this->options[$callbackName] = new JsExpression($this->options[$callbackName]);
            }
        }
    }
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();
    }
    
    /**
     * Registers the client script required for the plugin
     */
    public function registerClientScript()
    {
        $view = $this->getView();
        FancyBoxAsset::register($view);
        
        if(empty($this->target) && empty($this->options)) {
            return;
        }

        if(empty($this->target)) {
            $this->target = '[data-fancybox]';
        }
        $config = !empty($this->options) ? Json::encode($this->options) : null;
        $view->registerJs("jQuery('{$this->target}').fancybox({$config});");
    }
    
}
