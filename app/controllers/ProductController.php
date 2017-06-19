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

    public function getIndex() {
        $products = Product::query()->orderby('id', 'asc')->get();
        $categories = Category::query()->get();
        $marks = Category::find(2)->marks;
        return $marks;
    }
}