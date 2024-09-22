<?php

error_reporting(-1);

const YII_DEBUG = true;

// require composer autoloader if available
$vendor = __DIR__ . '/../vendor';

require_once($vendor . '/autoload.php');
require_once($vendor . '/yiisoft/yii2/Yii.php');