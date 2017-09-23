<?php
##Front Controller

//Show errors
ini_set('display_errors', true);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '../app/bin/config.php';
require_once '../app/bin/database/DB.php';


CONST API_ROUTE = '/api';
$api_config = [
    'settings' => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false
    ],
];
$container = new \Slim\Container($api_config);
$app = new \Slim\App($container);


$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->group(API_ROUTE, function () use ($app) {
    $app->get('/', App\indexController::class . ':home');
    $app->group('/auth', function () use ($app) {
        $app->post('/login', App\Controllers\AuthController::class . ':login');
        $app->get('/logout', App\Controllers\AuthController::class . ':logout');
        $app->options('/logout', function ($request, $response, $args) {
            return $response;
        });

    });
    $app->group('/users', function () use ($app){
        $app->get('/list', App\Controllers\UserController::class . ':getAll');
        $app->get('/get/{id}', App\Controllers\UserController::class . ':get');
        $app->put('/update/{id}', App\Controllers\UserController::class . ':update');
    });
});


$app->run();