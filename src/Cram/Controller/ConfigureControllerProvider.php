<?php

namespace Cram\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request as Request;

class ConfigureControllerProvider implements ControllerProviderInterface
{
	public function connect(Application $app)
	{
		// creates a new controller based on the default route
		$controllers = $app['controllers_factory'];

		$controllers->match('/github', __CLASS__ . '::github');
		$controllers->match('/jira', __CLASS__ . '::jira');

		return $controllers;
	}

	public function github(Request $request, Application $app)
	{
		// Handle list of configs
		if ($request->getMethod() === 'GET') {
			//$configs;
		} else {
			// Handle the form and post data
		}

		$app->get('/', function(){
			var_dump('poop');die;
		});




		return $app['twig']->render('github.html.twig', array(
			'name' => 'testerino',
		));
	}

	public function jira(Application $app)
	{
		return new Response('cram it jira');
	}
}