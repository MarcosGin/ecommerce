<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 18/06/17
 * Time: 13:53
 */
namespace App\Models;


use App\Bin\Database\DB;

class Product {
    private $name;
    private $desc;
    private $price;
    private $category_id;
    private $mark_id;
    private $portada;
    private $carpet;
    private $created_at;
    private $updated_at;

    public function getAll(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT products.id,products.title,
                                                  categories.id AS category_id,categories.name AS category_name,categories.icon AS category_icon,
                                                    marks.id AS mark_id,marks.name AS mark_name,
                                                    products.price,products.stock,products.created_at,products.updated_at FROM products 
                                                       INNER JOIN marks ON products.mark = marks.id 
                                                           INNER JOIN categories ON products.category = categories.id ORDER BY products.id ASC LIMIT 10 ");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        if($data){
            $products = [];
            foreach ($data as $product){
                $products[] = [
                    'id' => $product->id,
                    'title' => $product->title,
                    'mark' => ['id' => $product->mark_id, 'name' => $product->mark_name],
                    'category' =>['id' => $product->category_id, 'name' => $product->category_name, 'icon' => $product->category_icon],
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at
                ];
            }
            return $products;
        }else{
            return $data;
        }
    }
    public function getProduct($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT products.id,products.title,products.description,
                                                  categories.id AS category_id,categories.name AS category_name,categories.icon AS category_icon,
                                                    marks.id AS mark_id,marks.name AS mark_name,
                                                    products.price,products.stock,products.created_at,products.updated_at FROM products 
                                                       INNER JOIN marks ON products.mark = marks.id 
                                                           INNER JOIN categories ON products.category = categories.id WHERE products.id = :id ORDER BY products.id");
        $query->execute(['id'=>$id]);
        $data =$query->fetchAll(\PDO::FETCH_OBJ);
        if ($data) {
            $products = [];
            foreach ($data as $product){
                $products[] = [
                    'id' => $product->id,
                    'title' => $product->title,
                    'description' => $product->description,
                    'mark' => ['id' => $product->mark_id, 'name' => $product->mark_name],
                    'category' =>['id' => $product->category_id, 'name' => $product->category_name, 'icon' => $product->category_icon],
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at
                ];
            }
            return $products;
        }else{
            return $data;
        }
    }
    public function getProductForCategory($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id FROM products WHERE category = :id");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
    public function getProductForMark($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id FROM products WHERE mark = :id");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
    public function updateProduct($id, $data){
        $result = array('result' => false);
        if(isset($data['title']) && isset($data['description']) && isset($data['category'])
            && isset($data['mark']) && isset($data['price']) && isset($data['stock'])){
            $dbObj = DB::getInstance();
            $query = $dbObj->getQuery("UPDATE products SET title = :title, description = :description, category = :category, mark = :mark, price = :price, stock = :stock WHERE id = :id");
            $data = $query->execute([
                'title' => $data['title'],
                'description' => $data['description'],
                'category' => $data['category'],
                'mark' => $data['mark'],
                'price' => $data['price'],
                'stock' => $data['stock'],
                'id' => $id
            ]);
            if ($data) {
                $result['result'] = true;
                $result['response'] = "The product was successfully modified";
            } else {
                $result['response'] = "The product was not successfully modified";
            }
        }else{
            $result['response'] = "You must complete all the fields";
        }
        return $result;

    }
    public function searchProducts($value)
    {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT products.id,products.title,
                                                  categories.id AS category_id,categories.name AS category_name,categories.icon AS category_icon,
                                                    marks.id AS mark_id,marks.name AS mark_name,
                                                    products.price,products.stock,products.created_at,products.updated_at FROM products 
                                                       INNER JOIN marks ON products.mark = marks.id 
                                                           INNER JOIN categories ON products.category = categories.id WHERE UPPER(products.title) LIKE UPPER(:title) ORDER BY products.id ASC LIMIT 10 ");
         $query->execute([
            'title' => '%'.$value.'%'
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }
}