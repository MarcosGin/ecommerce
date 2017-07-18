<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Bin\Token;
use App\Models\User;

class CartController extends BaseController{
    private $product;
    private $category;
    private $user;
    public function __construct(){
        parent::__construct();
        $this->product = new Product();
        $this->category = new Category();
        $this->user = new User();
    }

    public function anyIndex(){
        return $this->render('cart.twig', []);
    }

    public function postMycart(){
        $product = $this->product->getProduct($_POST['product_id']);

        if($product['result']){
            try {
                $cart = $_POST['cart'] ?? [];
                $exits = false;
                foreach ($cart as $key => $value) {
                    if ($key === md5($_POST['product_id'])) {
                        $cart[$key]['quantity'] += 1;
                        $exits = true;
                    }
                }
                if (!$exits) {
                    $category_id = $this->category->getCategoryForId($product['response'][0]->category_id);
                    $cart[md5($product['response'][0]->id)] = array('id' => $product['response'][0]->id,
                        'name' => $product['response'][0]->nombre,
                        'price' => $product['response'][0]->precio,
                        'category' => $category_id[0]->name,
                        'img' => $product['response'][0]->carpet .'/'. $product['response'][0]->portada,
                        'quantity' => 1);
                }
                echo $this->json_response(array('response'=> 'The product was successfully added to the cart', 'cart' => $cart), 200, '', true);
            }catch (\Exception $e){
                echo $this->json_response('An unexpected error occurred, please try again', 200);
            }
        }else{
            echo $this->json_response($product['response'], 200);
        }

    }

    public function deleteMycart(){
        parse_str(file_get_contents("php://input"),$post_vars);//data amazing

        $result = false;
        foreach ($post_vars['cart'] as $key => $value){
            if($key === $post_vars['dataid']){
                $result = true;
                unset($post_vars['cart'][$key]);
            }
        }
            if($result){
                echo $this->json_response(array('response' => 'The product was successfully deleted', 'cart' => $post_vars['cart']), 200 ,'', true);
            }else{
                echo $this->json_response('The product could not be deleted, please try again.', 200);
            }

    }

    public function putMycart(){
            parse_str(file_get_contents("php://input"),$post_vars);//data amazing

            $result = false;
            foreach ($post_vars['cart'] as $key => $value){
                if($key === $post_vars['dataid']){
                    $result = true;
                    $post_vars['cart'][$key]['quantity'] = $post_vars['quantity'];
                }
            }
                if($result){
                    echo $this->json_response(array('response' => 'The product was successfully modified', 'cart' => $post_vars['cart']), 200 ,'', true);
                }else{
                    echo $this->json_response('The product could not be modified, please try again.', 200);
                }


    }

    public function postBuy(){
        $jwt = [];
        foreach (getallheaders() as $key => $value){
            if($key == 'Authorization'){
                $jwt = Token::checkToken($value);
            }
        }

            if($jwt['result']){
                $cart = $_POST['cart'];

                $purchase = $this->user->insertPurchase($jwt['jwt']->id, $cart);
                if($purchase['result']){
                    echo $this->json_response($purchase['response'], 200, $jwt['token'], true);
                }else{
                    echo $this->json_response($purchase['response'], 200);
                }
            }else{
                echo $this->json_response($jwt['response'], 200);
            }


    }

}

