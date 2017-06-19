<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 19/06/17
 * Time: 10:20
 */
namespace App\Models;

use App\Database\DB;

class Category{
    private $name;
    private $icon;

    public function getAll(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM categories");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function getCategoryWithMarks(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM catmarc");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
}