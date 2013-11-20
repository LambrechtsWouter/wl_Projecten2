<?php

// Require Composer Autoloader
require_once __DIR__.'/../vendor/autoload.php';

// Create new Silex App
$app = new Silex\Application();

// App Configuration
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__ .  DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'views'
));

$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
	'db.options' => array(
             'dbname'    => 'projecten2',
             'user'      => 'root',
             'password'  => 'Azerty123',
	           'host'      => 'localhost',
	)
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.messages' => array(),
)); 

$app->register(new Silex\Provider\FormServiceProvider());   

$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->register(new Silex\Provider\SwiftmailerServiceProvider(), array(
    'swiftmailer.options' => array(
        'host' => 'smtp.gmail.com',
        'port' => '465',
        'username' => 'username',
        'password' => 'password',
        'encryption' => null,
        'auth_mode' => null
    )
));

$app->register(new Knp\Provider\RepositoryServiceProvider(), array(
	'repository.repositories' => array(
				'ispAanvraag'    => 'projecten2\\Repository\\ispAanvraag',
				'vakken'          => 'projecten2\\Repository\\vakken',
  			'ispVakken'	  => 'projecten2\\Repository\\ispVakken',
  			'student'	  => 'projecten2\\Repository\\student',
  			'lesrooster'	  => 'projecten2\\Repository\\lesrooster',
       		 'admin'     => 'projecten2\\Repository\\admin',
        'klasgroep' => 'projecten2\\Repository\\klasgroep',

)));