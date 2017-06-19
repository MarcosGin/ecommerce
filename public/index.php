<?php
##Front Controller

//Show errors
ini_set('display_errors', true);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '../app/database/DB.php';

use Phroute\Phroute\RouteCollector;

//Url directory
$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);


//Routes
$route = $_GET['route'] ?? '/';
$router = new RouteCollector();

$router->controller('/', App\Controllers\IndexController::class);
$router->controller('/products', App\Controllers\ProductController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;