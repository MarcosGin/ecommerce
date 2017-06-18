<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 18/06/17
 * Time: 16:56
 */
namespace App\Controllers;

class ProductController extends BaseController{

    public function getIndex() {
        return $this->render('products.twig', []);
    }
}