<?php

namespace App\Controllers;

use App\Models\Product;

class CartController extends BaseController{
    private $product;
    public function __construct(){
        parent::__construct();
        $this->product = new Product();
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
                    $cart[md5($product['response'][0]->id)] = array('id' => $product['response'][0]->id,
                        'name' => $product['response'][0]->nombre,
                        'price' => $product['response'][0]->precio,
                        'quantity' => 1);
                }
                echo $this->json_response($cart, 200, '', true);
            }catch (\Exception $e){
                echo $this->json_response('An unexpected error occurred, please try again', 200);
            }
        }else{
            echo $this->json_response($product['response'], 200);
        }

    }

}

