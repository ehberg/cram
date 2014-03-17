<?php
// Handle static files
if (isset($_SERVER['REQUEST_URI'])) {
	$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
	if (php_sapi_name() === 'cli-server' && is_file($filename)) {
		return false;
	}
}

// Cache
$app['cache.path'] = __DIR__ . '/../cache';

// Twig cache
$app['twig.options.cache'] = $app['cache.path'] . '/twig';
