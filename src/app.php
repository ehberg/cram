<?php
$loader = require_once __DIR__ . '/../vendor/autoload.php';
$loader->add('Cram', __DIR__);

use Symfony\Component\HttpFoundation\Response;
$app = new Silex\Application();

// Setup the twig view paths
$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/views',
));

// Define the Cram and paths
require_once __DIR__ . '/controllers.php';

// definitions
$app->get('/', function () use ($app) {
	return $app['twig']->render('index.html.twig', array(
		'name' => 'testerino',
	));
});


// Error handling
$app->error(function (\Exception $e, $code) use ($app) {
	if ($app['debug']) {
		return;
	}

	return new Response($app['twig']->render('error.html.twig', array(
		'code' => $code,
		'message' => $e->getMessage()
	)), $code);
});

return $app;
