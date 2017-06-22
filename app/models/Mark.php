<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 19/06/17
 * Time: 10:30
 */
namespace App\Models;

use App\Database\DB;

class Mark {
    private $name;

    public function getAll(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM marcas");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }
}