<?php

namespace projecten2\Provider\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;

class indexController implements ControllerProviderInterface {


    public function connect(Application $app) {
    	
		$controllers = $app['controllers_factory'];
		$controllers->get('/', array($this, 'Home'));

		return $controllers;

    }

    public function Home(Application $app) {
            return $app['twig']->render('index.twig');
    }
	
}