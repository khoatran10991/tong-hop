<?php

namespace Multiple\Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\DiInterface;
use Phalcon\Db\Adapter\Pdo\Mysql as Database;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Flash\Direct as FlashDirect;

class Module
{

	public function registerAutoloaders()
	{

		$loader = new Loader();

		$loader->registerNamespaces(array(
			'Multiple\Frontend\Controllers' => '../apps/frontend/controllers/',
			'Multiple\Frontend\Models'      => '../apps/frontend/models/',
			'Multiple\Frontend\Plugins'     => '../apps/frontend/plugins/',
			'Multiple\Frontend\Forms'       => '../apps/frontend/forms/',
		));

		$loader->register();
	}

	/**
	 * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
	 */
	public function registerServices(DiInterface $di)
	{

		//Registering a dispatcher
		$di->set('dispatcher', function() {
			$dispatcher = new Dispatcher();
			$dispatcher->setDefaultNamespace("Multiple\Frontend\Controllers\\");
			return $dispatcher;
		});


		//Registering the view component
		$di->set('view', function () {
			$view = new \Phalcon\Mvc\View();
			$view->setViewsDir('../apps/frontend/views/');
			$view->registerEngines(array(
				'.volt' => function ($view, $di){

					$volt = new VoltEngine($view, $di);

					$volt->setOptions(array(
						'compiledPath' => '../apps/frontend/cache/',
						'compiledSeparator' => '_',
					));

					return $volt;
				},
				'.phtml' => 'Phalcon\Mvc\View\Engine\Php'
			));
			return $view;
		});
		// Start the session the first time when some component request the session service
		$di->set('session', function () {
			$session = new \Phalcon\Session\Adapter\Files();
			$session->start();
			return $session;
		});

		//Set a different connection in each module
		$di->set('db', function() {
			return new Database(array(
				"host" => "localhost",
				"username" => "root",
				"password" => "",
				"dbname" => "phalcon_shop",
				'charset'  => 'utf8' // ITS THE BEST SOLUTION
			));
		});
		// Register the flash service with custom CSS classes
		$di->set('flash', function () {
			$flash = new FlashDirect(
				array(
					'error'   => 'alert alert-danger',
					'success' => 'alert alert-success',
					'notice'  => 'alert alert-info',
					'warning' => 'alert alert-warning'
				)
			);

			return $flash;
		});
	}
}
