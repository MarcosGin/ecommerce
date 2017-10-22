<?php

namespace App\Controllers;

use App\Models\Mistake;
use Slim\Http\Request;
use Slim\Http\Response;

class MistakeController {
    private $mistake;

    public function __construct() {
        $this->mistake = new Mistake();
    }


    public function getAll(Request $request, Response $response, $args) {
        $mistakes = $this->mistake->getAll();
        return $response->withJson(['status' => true ,'response' =>$mistakes]);
    }
}