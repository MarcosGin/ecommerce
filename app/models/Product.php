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
    public function getProduct($name){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM productos WHERE nombre =:id");
        $query->execute([
           'nombre' =>  $name,
        ]);
        $data =$query->fetchAll(\PDO::FETCH_ASSOC);
        if(!$data){
            throw new \Exception('Not Found Product!');
        }
        return $data;
    }

    public function getProductForCategory($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM productos WHERE category_id = :id");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchall(\PDO::FETCH_ASSOC);
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



}