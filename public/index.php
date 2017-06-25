<?php
##Front Controller

//Show errors
ini_set('display_errors', true);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once '../vendor/autoload.php';
require_once '../app/database/DB.php';

use Phroute\Phroute\RouteCollector;

//Url directory
$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
$baseImage = $baseUrl . 'assets/img/products/';
define('BASE_URL', $baseUrl);
define('BASE_IMAGE', $baseImage);


$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'marcosgin291@gmail.com';
$mail->Password = 'mamateamo10';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('mundotecnologia@gmail.com', 'Mundotecnologia');
$mail->addAddress('bocajuniors291@hotmail.com');


$mail->isHTML(true);

$mail->Subject = 'Verifiq your account, please.';
$mail->Body    = '<a href="link">Here</a>';
$mail->AltBody = '?';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

//Routes
$route = $_GET['route'] ?? '/';
$router = new RouteCollector();

$router->filter('auth', function () {
    if(isset($_SESSION['email'])) {
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