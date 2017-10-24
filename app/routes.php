<?php
$app->group(API_ROUTE, function () use ($app) {
    $app->get('/', App\Controllers\indexController::class . ':home');
    $app->group('/auth', function () use ($app) {
        $app->post('/login', App\Controllers\AuthController::class . ':login');
        $app->get('/logout', App\Controllers\AuthController::class . ':logout')->add(new App\Middleware\AuthMiddleware());
    });
    $app->group('/account', function () use ($app) {
        $app->get('/profile', App\Controllers\AccountController::class . ':get');
        $app->put('/profile',App\Controllers\AccountController::class . ':update');
        $app->get('/history', App\Controllers\AccountController::class . ':getHistory');
    })->add(new App\Middleware\AuthMiddleware());
    $app->get('/statistics', App\Controllers\StatisticsController::class . ':get')->add(new App\Middleware\AuthMiddleware());
    $app->group('/mistakes', function () use ($app){
        $app->get('/list[/{filter:.*}]', App\Controllers\MistakeController::class . ':getAll');
    })->add(new App\Middleware\AuthMiddleware());
    $app->group('/users', function () use ($app){
        $app->get('/list', App\Controllers\UserController::class . ':getAll');
        $app->get('/get/{id}', App\Controllers\UserController::class . ':get');
        $app->get('/search/{value}', App\Controllers\UserController::class . ':search');
        $app->put('/update/{id}', App\Controllers\UserController::class . ':update');
        $app->delete('/delete/{id}', App\Controllers\UserController::class .':delete');
    })->add(new App\Middleware\AuthMiddleware());
    $app->group('/products', function () use ($app) {
        $app->get('/list[/{filter:.*}]', App\Controllers\ProductController::class . ':getAll');
        $app->get('/get/{id}', App\Controllers\ProductController::class . ':get');
        $app->get('/search/{value}', App\Controllers\ProductController::class . ':search');
        $app->post('/add', App\Controllers\ProductController::class . ':add');
        $app->put('/update/{id}', App\Controllers\ProductController::class . ':update');
        $app->delete('/delete/{id}', App\Controllers\ProductController::class . ':delete');
        $app->get('/images/get/{id}', App\Controllers\ProductController::class . ':getImages');
        $app->post('/images/cover/{id}',App\Controllers\ProductController::class . ':addImage');
        $app->post('/images/add/{id}',App\Controllers\ProductController::class . ':addImages');
        $app->delete('/images/delete/{id}/{name}', App\Controllers\ProductController::class . ':deleteImage');
        $app->get('/marks/list', App\Controllers\ProductController::class . ':getAllMark');
        $app->get('/marks/get/{id}', App\Controllers\ProductController::class . ':getMark');
        $app->get('/categories/list', App\Controllers\ProductController::class . ':getAllCategory');
    })->add(new App\Middleware\AuthMiddleware());
    $app->group('/country', function () use ($app) {
        $app->get('/list', App\Controllers\CountryController::class . ':getAll');
    })->add(new App\Middleware\AuthMiddleware());
});