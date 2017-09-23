<?php

namespace App;

use Slim\Http\Request;
use Slim\Http\Response;

class IndexController {

    public function home(Request $request, Response $response, $args){
        return $response->withJson(['message' =>'The api worsk!']);
    }
}