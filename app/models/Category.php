<?php

namespace App\Models;

use App\Bin\Database\DB;

class Category{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function getAll(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM categories");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        if ($data){
            $categories = [];
            foreach ($data as $category){
                $products = $this->product->getProductForCategory($category->id);
                $categories[] = [
                    'id' => $category->id,
                    'name' => $category->name,
                    'products' => count($products),
                ];
            }
            return $categories;
        }else{
            return $data;
        }
    }
    public function getCategory($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM categories WHERE id = :id");
        $query->execute([
            'id' => $id
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }
}