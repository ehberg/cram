<?php
require_once __DIR__.'/../vendor/autoload.php';

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
	return false;
}



$app = new Silex\Application();
$app['debug'] = true;

// definitions
$app->get('/', function () {
	return 'poop';
});

$app->run();

