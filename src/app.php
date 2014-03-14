<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

// Handle static files
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
	return false;
}

$app = new Silex\Application();


$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/views',
));

// definitions
$app->get('/', function () use ($app) {
	return $app['twig']->render('index.html.twig', array(
		'name' => 'testerino',
	));
});


$app->error(function (\Exception $e, $code) use ($app) {
	if ($app['debug']) {
		return;
	}

	switch ($code) {
		case 404:
			$message = 'The requested page could not be found.';
			break;
		default:
			$message = 'Whoopsie';
	}

	return new Response($message, $code);
});

return $app;
