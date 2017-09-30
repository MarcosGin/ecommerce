<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\Country;

class CountryController {
    private $country;
    public function __construct()
    {
        $this->country = new Country();
    }

    public function getAll(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $countrys = $this->country->getAll();
        return $response->withJson(['status' => true, 'response' => $countrys, 'jwt' => $jwt]);
    }

}