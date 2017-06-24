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
use Sirius\Validation\Validator;

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
    public function getBusq($name = null){
        $products = $this->product->getProductLike($name, true);
        header('Content-Type: application/json');

        return $products;
    }
    public function getName($name = null){
        $products = $this->product->getProductLike($name, false);
        $categories = $this->categories->getCategories();
        return $this->render('products.twig', ['products' => $products, 'categories' => $categories]);
    }
    public function getProfile($param = null) {
        $products = $this->product->getProduct($param);
        $product_comment = $this->product->getComments($products[0]->id);
        $imgs_max = $this->product->getImgs($products[0]->carpet);
        $imgs_min = $this->product->getImgs($products[0]->carpet, "min");
        return $this->render('product-profile.twig', ['products' => $products, 'comments' => $product_comment, 'imgs_max' => $imgs_max, 'imgs_min' => $imgs_min]);
    }
    public function postComment($idProduc){
        if($_POST){
        $produc = $this->product->getProduct($idProduc);
        $comment = $this->product->createComment($idProduc, "Admin", $_POST['coment'], time());
        header("location: " . BASE_URL . "products/profile/" . $produc[0]->nombre);
        }else{
            throw new \Exception('Not exits dates in the form.');
        }

    }


}