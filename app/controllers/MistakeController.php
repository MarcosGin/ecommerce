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
        if (isset($args['filter']) && $args['filter'] != ''){
            $filter = $args['filter'];
            $filter = explode('/', $filter);
            if (strcasecmp ($filter[0] , 'DESC' ) === 0 || strcasecmp ($filter[0] , 'ASC' ) === 0) {
                //--
            }else{
                $filter[0] = null;
            }
            if (!isset($filter[1]) || !is_numeric($filter[1]) || $filter[1] <= 0){
                $filter[1] = null;
            }
        } else {
            $filter = null;
        }
        $jwt = $request->getAttribute('jwt');
        $mistakes = $this->mistake->getAll($filter[0], $filter[1]);
        return $response->withJson(['status' => true ,'response' => $mistakes, 'jwt' => $jwt]);
    }
}