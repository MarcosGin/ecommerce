<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 18/06/17
 * Time: 16:56
 */
namespace App\Controllers;

use App\Bin\Token;
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
        if($products['result']){
            $imgs_max = $this->product->getImgs($products['response'][0]->carpet);
            $imgs_min = $this->product->getImgs($products['response'][0]->carpet, "min");
            return $this->render('product-profile.twig', ['products' => $products['response'], 'imgs_max' => $imgs_max, 'imgs_min' => $imgs_min]);
        }else{
            throw new  \Exception($products['response']);
        }

    }
    public function postComment(){
        $jwt = [];
        foreach (getallheaders() as $key => $value){
            if($key == 'Authorization'){
                $jwt = Token::checkToken($value);
            }
        }
        if($jwt['result'] == true){
            $this->product->getProduct($_POST['product_id']);
            $createComment = $this->product->createComment($_POST['product_id'],$jwt['jwt']->id, $jwt['jwt']->username, $_POST['coment'], time());

            if($createComment['result']){
                echo $this->json_response($createComment['response'], 200, $jwt['token'], true);
            }else{
                echo $this->json_response($createComment['response'], 200);
            }

        }else{
            echo $this->json_response($jwt['response'], 200);
        }
    }

    public function getComment($id){
        $comments = $this->product->getComments($id);
        if($comments['result']){
            echo $this->json_response($comments['response'], 200, '', true);
        }else{
            echo $this->json_response($comments['response'], 200);
        }
    }


}