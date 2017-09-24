<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 19/06/17
 * Time: 10:30
 */
namespace App\Models;

use App\Bin\Database\DB;

class Mark {
    private $name;
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }


    public function getAll(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM marks");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        if ($data){
            $marks = [];
            foreach ($data as $mark){
                $products = $this->product->getProductForMark($mark->id);
                $marks[] = [
                    'id' => $mark->id,
                    'name' => $mark->name,
                    'products' => count($products),
                ];
            }
            return $marks;
        }else{
            return $data;
        }
    }
    public function getMark($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM marks WHERE id = :id");
        $query->execute([
            'id' => $id
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }
}