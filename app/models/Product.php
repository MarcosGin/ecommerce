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
        $data = $query->fetchall();
        return $data;
    }



}