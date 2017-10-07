<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class indexController {

    public function home(Request $request, Response $response, $args){
        return $response->withJson(['message' =>'The api worsk!']);
    }
}