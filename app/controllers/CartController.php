<?php

namespace App\Controllers;

class CartController extends BaseController{

    public function anyIndex(){
        return $this->render('cart.twig', []);
    }

    public function postMycart(){

        echo $this->json_response($_POST, 200);
    }

}

