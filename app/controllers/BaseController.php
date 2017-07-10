<?php

namespace App\Controllers;

use App\Bin\Token;
use App\Models\User;
use Twig_Loader_Filesystem;

class BaseController {
    protected $templateEngine;
    public function __construct() {
        $loader = new Twig_Loader_Filesystem('../views');
        $this->templateEngine = new \Twig_Environment($loader, [
            'debug' => false,
            'cache' => false
        ]);

        $this->templateEngine->addFilter(new \Twig_SimpleFilter('url', function ($path) {
            return  BASE_URL . $path;
        }));
        $this->templateEngine->addFilter(new \Twig_SimpleFilter('url_image', function ($path) {
            return  BASE_IMAGE . $path;
        }));
    }
    public function render($fileName, $data = []) {
        if(isset($_COOKIE['__token'])){
            $jwt = Token::checkToken($_COOKIE['__token']);
            if($jwt){
                $user = new User();
                $data['token_form'] = $_COOKIE['__token'];
                $data['session_user'] =  $user->getUser($jwt['jwt']->email);
            }

        }
        return $this->templateEngine->render($fileName, $data);
    }
    protected function json_response($message, $code, $jwt = null, $result = false){
        header_remove();
        http_response_code($code);
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        header('Content-Type: application/json');
        $status = array(
            200 => '200 OK',
            400 => '400 Bad Request',
            403 => 'forbidden',
            404 => 'Not Found',
            405 => 'Method not Allowed',
            503 => 'Service Unavailable',
            500 => '500 Internal Server Error'
        );
        header('Status: '.$status[$code]);

        return json_encode(array(
            'status' => $code < 300,
            'result' => $result,
            'message' => $message,
            'jwt' => $jwt,
        ));


    }
}