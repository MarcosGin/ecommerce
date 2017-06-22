<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 18/06/17
 * Time: 16:56
 */
namespace App\Controllers;

use App\Models\Category;
use App\Models\Mark;
use App\Models\Product;

class ProductController extends BaseController{
    private $product;
    private $categories;
    private $marks;
    public function __construct(){
        parent::__construct();
        $this->product = new Product();
        $this->categories = new Category();
        $this->marks = new Mark();
    }

    public function getIndex() {
        $products = $this->product->getAll();
        $categories = $this->categories->getCategories();
        return $this->render('products.twig', ['products' => $products, 'categories' => $categories]);
    }
    public function getSearch($param = null, $param2= null) {
        $products = $this->product->getProductForSearch($param, $param2);
        $categories = $this->categories->getCategories();
        return $this->render('products.twig', ['products' => $products, 'categories' => $categories, 'param' => $param, 'param2' => $param]);
    }
    public function getProfile($param = null) {
        $product = $this->product->getProduct($param);
        return $this->render('product-profile.twig', ['product' => $product]);
    }
}