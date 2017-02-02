Fancybox3 Widget for Yii2
=======================

[Yii2](http://www.yiiframework.com) extension for [fancyapps.com/fancybox](http://www.fancyapps.com/fancybox/)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer require "sankam/yii2-fancybox" "*"
```
or add

```json
"sankam/yii2-fancybox" : "*"
```

to the require section of your application's `composer.json` file.


Usage
-----

```
use sankam\fancybox\FancyBox;

FancyBox::widget([
    'target' => '[data-fancybox]',
    'options' => [
        'loop' => false,
        'padding' => 0,
        'margin' => [44, 0],
        'onInit' => new JsExpression("
            function( instance ) {
                instance.$refs.downloadButton = $('<a class=\"fancybox-button fancybox-download\"></a>')
                .appendTo( instance.$refs.buttons );
            }
        "),
        'beforeMove' => new JsExpression("
            function( instance, current ) {
                instance.$refs.downloadButton.attr('href', current.src);
            }
        "),
    ],
]);
```
