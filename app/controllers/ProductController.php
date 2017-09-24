<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Mark;
use App\Models\Product;
use Slim\Http\Request;
use Slim\Http\Response;

class ProductController {

    private $product;
    private $mark;
    private $category;
    public function __construct(){
        $this->product = new Product();
        $this->mark = new Mark();
        $this->category = new Category();
    }

    public function getAll(Request $request, Response $response, $args) {
        $products = $this->product->getAll();

        if($products) {
            return $response->withJson(['status' => true, 'response' => $products]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'The products was not found']);
        }
    }
    public function get(Request $request, Response $response, $args) {
        $product = $this->product->getProduct($args['id']);

        if($product) {
            return $response->withJson(['status' => true, 'response' => $product[0]]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found']);
        }
    }
    public function update(Request $request, Response $response, $args) {
        $product = $this->product->getProduct($args['id']);

        if($product) {
            $params = json_decode( $request->getBody(), true);
            $update = $this->product->updateProduct($product[0]['id'],$params);
            if($update['result']){
                $product = $this->product->getProduct($product[0]['id']);
                return $response->withJson(['status' => true, 'response' => ['message' => 'Product update','data' => $product[0]]]);
            }else{
                return $response->withJson(['status' => false, 'response' => $update['response']]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found']);
        }
    }

    public function getMark(Request $request, Response $response, $args){
        $mark = $this->mark->getMark($args['id']);
        if ($mark) {
            return $response->withJson(['status' => true, 'response' => $mark[0]]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'The mark was not found']);
        }
    }

    public function getAllMark(Request $request, Response $response, $args){
        $marks = $this->mark->getAll();
        if ($marks) {
            return $response->withJson(['status' => true, 'response' => $marks]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'The marks was not found']);
        }
    }
    public function getAllCategory(Request $request, Response $response, $args){
        $categories = $this->category->getAll();
        if ($categories) {
            return $response->withJson(['status' => true, 'response' => $categories]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'The categories was not found']);
        }
    }




}