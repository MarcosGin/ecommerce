<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

class StatisticsController {
    private $product;
    private $user;
    public function __construct(){
        $this->user = new User();
        $this->product = new Product();
    }

    public function get(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $users = count($this->user->getUsers());
        $products = count($this->product->getAll());
        return $response->withJson(['status' => true, 'response' => ['users' => $users, 'products' => $products, 'buys' => 59, 'mistakes' => 14], 'jwt' => $jwt]);
    }
}