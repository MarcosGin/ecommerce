<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 19/06/17
 * Time: 10:20
 */
namespace App\Models;

use App\Bin\Database\DB;

class Category{
    private $name;
    private $icon;


    public function getAll(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM categories");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }

    public function getCategoryWithMarks(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM catmarc");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }

    public function getCategories(){
        $vec = array();
        $cont = 0;
        $objMark = new Mark();
        $marks = $objMark->getAll();

        foreach($this->getAll() as $category){
            $vec[$cont]['id'] = $category->id;
            $vec[$cont]['name'] = $category->name;
            $vec[$cont]['icon'] = $category->icon;
            foreach($this->getCategoryWithMarks() as $val){
                if($category->id === $val->catId){
                    $cont2 = 0;
                    foreach($marks as $mark){
                        if($mark->id === $val->marcId){
                            $vec[$cont]['marks'][$cont2]['id'] = $mark->id;
                            $vec[$cont]['marks'][$cont2]['name'] = $mark->name;
                        }
                        $cont2++;
                    }
                }
            }
            $cont++;
        }
        return $vec;
    }

    public function getCategoryForId($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT name FROM categories WHERE id = :id");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);

        return $data;
    }

}