<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 18/06/17
 * Time: 13:53
 */
namespace App\Models;


use App\Database\DB;

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
        $query = $dbObj->getQuery("SELECT * FROM productos");
        $query->execute();
        $data = $query->fetchall(\PDO::FETCH_ASSOC);
        if(!$data){
            throw new \Exception('Not Found Products!.');
        }
        return $data;
    }
    public function getProduct($produc){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM productos WHERE nombre =:name OR id=:id LIMIT 1");
        $query->execute([
           'name' =>  $produc,
           'id'   =>  $produc,
        ]);
        $data =$query->fetchAll(\PDO::FETCH_OBJ);
        if(!$data){
            throw new \Exception('Not Found Product!');
        }
        return $data;
    }
    public function getProductLike($name, $json){
        $data = array();
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM productos WHERE nombre  LIKE ? ");
        $query->execute([
            "%$name%",
        ]);
        $products = $query->fetchAll(\PDO::FETCH_OBJ);
        foreach($products as $product){
            $data[] = $product->nombre;
        }
        if($json){
            return json_encode($data);
        }else{
            if(!$products){
                throw new \Exception('Not found products!');
            }
            return $products;
        }
    }

    public function getProductForCategory($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM productos WHERE category_id = :id");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        if(!$data){
            throw new \Exception ("Not Found Products!");
        }
        return $data;
    }
    public function getProductForSearch($cat, $marc){
        $dbObj = DB::getInstance();
        if($marc){
            $query = $dbObj->getQuery("SELECT * FROM productos WHERE category_id =:cat AND marca =:marc");
            $query->execute([
               'cat' => $cat,
               'marc' => $marc,
            ]);
        }else{
             $query = $dbObj->getQuery("SELECT * FROM productos WHERE category_id = :cat");
             $query->execute([
                'cat' => $cat,
             ]);
        }
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        if(!$data){
            throw new \Exception ("Not found products!");
        }
        return $data;
    }
    public function getImgs($carpet, $type = "max"){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM producimgs WHERE carpet = :carpet AND type =:type");
        $query->execute([
            'carpet' => $carpet,
            'type' => $type,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        if(!$data){
            throw new \Exception('Not founds thes imgs for this product');
        }
        return $data;
    }
    public function getComments($id) {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM product_comment WHERE product_id = :id");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
    public function createComment($product_id, $username, $coment, $fecha) {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("INSERT INTO product_comment (product_id, username, coment, fecha) VALUES(:product_id, :username, :coment, :fecha)");
        $result = $query->execute([
            'product_id' => $product_id,
            'username' => $username,
            'coment' => $coment,
            'fecha' => $fecha,
        ]);
        return $result;
    }



}