<?php

// Bootstrap
require __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';


$app->error(function (\Exception $e, $code) {
	if ($code == 404) {
		return '404 - Not Found! // ' . $e->getMessage();
	} else {
		return 'Shenanigans! Something went horribly wrong // ' . $e->getMessage();
	}
});

$app->get('/', function(Silex\Application $app) {
    return $app->redirect($app['request']->getBaseUrl() . '/index');
});

$app->mount('/index', new projecten2\Provider\Controller\IndexController);
$app->mount('/student', new projecten2\Provider\Controller\StudentController);
$app->mount('/admin', new projecten2\Provider\Controller\adminController);