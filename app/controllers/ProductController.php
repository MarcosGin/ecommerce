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
        $jwt = $request->getAttribute('jwt');
        $products = $this->product->getAll();
        if($products) {
            return $response->withJson(['status' => true, 'response' => $products, 'jwt' => $jwt]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'The products was not found', 'jwt' => $jwt]);
        }
    }
    public function get(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $product = $this->product->getProduct($args['id']);
        if($product) {
            return $response->withJson(['status' => true, 'response' => $product[0], 'jwt' => $jwt]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found', 'jwt' => $jwt]);
        }
    }
    public function search(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $products = $this->product->searchProducts($args['value']);
        if($products){
            return $response->withJson(['status' => true, 'response' => $products, 'jwt' => $jwt]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'Not found products', 'jwt' => $jwt]);
        }
    }
    public function add(Request $request, Response $response, $args) {
        $user = $request->getAttribute('user');
        $jwt = $request->getAttribute('jwt');
        $params = json_decode( $request->getBody(), true);
        $add = $this->product->addProduct($params);
        if($add['result']){
            return $response->withJson(['status' => true, 'response' => ['message' => $add['response']], 'jwt' => $jwt]);
        }else{
            return $response->withJson(['status' => false, 'response' => $add['response'], 'jwt' => $jwt]);
        }
    }
    public function update(Request $request, Response $response, $args) {
        $user = $request->getAttribute('user');
        $jwt = $request->getAttribute('jwt');
        $product = $this->product->getProduct($args['id']);
        if($product) {
            $params = json_decode( $request->getBody(), true);
            $update = $this->product->updateProduct($product[0]['id'],$params);
            if($update['result']){
                $product = $this->product->getProduct($product[0]['id']);
                return $response->withJson(['status' => true, 'response' => ['message' => $update['response'],'data' => $product[0]], 'jwt' => $jwt]);
            }else{
                return $response->withJson(['status' => false, 'response' => $update['response'], 'jwt' => $jwt]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found', 'jwt' => $jwt]);
        }
    }
    public function delete(Request $request, Response $response, $args) {
        $user = $request->getAttribute('user');
        $jwt = $request->getAttribute('jwt');
        $product = $this->product->getProduct($args['id']);
        if($product) {
            $delete = $this->product->deleteProduct($product[0]['id']);
            if($delete['result']){
                return $response->withJson(['status' => true, 'response' => $delete['response'], 'jwt' => $jwt]);
            } else {
                return $response->withJson(['status' => false, 'response' => $delete['response'], 'jwt' => $jwt]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found']);
        }
    }
    public function getMark(Request $request, Response $response, $args){
        $jwt = $request->getAttribute('jwt');
        $mark = $this->mark->getMark($args['id']);
        if ($mark) {
            return $response->withJson(['status' => true, 'response' => $mark[0], 'jwt' => $jwt]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'The mark was not found', 'jwt' => $jwt]);
        }
    }
    public function getAllMark(Request $request, Response $response, $args){
        $jwt = $request->getAttribute('jwt');
        $marks = $this->mark->getAll();
        if ($marks) {
            return $response->withJson(['status' => true, 'response' => $marks, 'jwt'  => $jwt]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'The marks was not found', 'jwt' => $jwt]);
        }
    }
    public function getAllCategory(Request $request, Response $response, $args){
        $jwt = $request->getAttribute('jwt');
        $categories = $this->category->getAll();
        if ($categories) {
            return $response->withJson(['status' => true, 'response' => $categories, 'jwt' => $jwt]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'The categories was not found', 'jwt' => $jwt]);
        }
    }
}