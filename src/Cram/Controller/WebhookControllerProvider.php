<?php

namespace Cram\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Response;

class WebhookControllerProvider implements ControllerProviderInterface
{
	public function connect(Application $app)
	{
		// creates a new controller based on the default route
		$controllers = $app['controllers_factory'];

		$controllers->get('/github', __CLASS__ . '::github');
		$controllers->get('/jira', __CLASS__ . '::jira');

		return $controllers;
	}

	public function github(Application $app)
	{
		return new Response('cram it github');
	}

	public function jira(Application $app)
	{
		return new Response('cram it jira');
	}

	/**
	 * Notify the endpoint
	 */
	protected function notify()
	{

	}
}