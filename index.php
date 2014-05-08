<?php

if (! file_exists('./local.php')) {
	die('File local.php is required. You can rename local.sample.php.');
}

require_once('./local.php');

// change the following paths if necessary
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once(LOCAL_YII_PATH);

Yii::createWebApplication($config)->run();
