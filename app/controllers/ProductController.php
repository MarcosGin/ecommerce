<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 18/06/17
 * Time: 16:56
 */
namespace App\Controllers;

use App\Models\Product;

class ProductController extends BaseController{

    public function getIndex() {
       $products = new Product();
       $data = $products->getAll();
        return $this->render('products.twig', ['products' => $data]);
    }
}