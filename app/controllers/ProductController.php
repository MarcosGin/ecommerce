<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 18/06/17
 * Time: 16:56
 */
namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends BaseController{
    private $product;
    private $categories;
    public function __construct(){
        parent::__construct();
        $this->product = new Product();
        $this->categories = new Category();
    }

    public function getIndex() {

        $products = $this->product->getAll();
        $categories = $this->categories->getAll();
        $marks = $this->categories->getCategoryWithMarks();

        return $this->render('products.twig', ['products' => $products, 'categories' => $categories]);
    }
    public function getSearch($param){
        $products = $this->product->getProductForMark($param);
        $categories = $this->categories->getAll();
        return $this->render('products.twig', ['products' => $products, 'categories' => $categories]);
    }
}