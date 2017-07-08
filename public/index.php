<?php
##Front Controller

//Show errors
ini_set('display_errors', true);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once '../vendor/autoload.php';
require_once '../app/bin/config.php';
require_once '../app/bin/database/DB.php';

use Phroute\Phroute\RouteCollector;

//Url directory
$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
$baseImage = $baseUrl . 'assets/img/products/';
define('BASE_URL', $baseUrl);
define('BASE_IMAGE', $baseImage);
define('SECRET_KEY', 'mysecretkey');
define('ALGORITHM', 'HS256');

//Routes
$route = $_GET['route'] ?? '/';
$router = new RouteCollector();

$router->filter('auth', function () {
    if(isset($_COOKIE['token'])) {
        header('Location: ' . BASE_URL . 'index');
        return false;
    }
});
$router->controller('/', App\Controllers\IndexController::class);
$router->controller('/products', App\Controllers\ProductController::class);
$router->group(['after' => 'auth'], function($router){
    $router->controller('/account', App\Controllers\AuthController::class);
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;