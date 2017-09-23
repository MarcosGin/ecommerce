<?php

namespace App\Models;


use App\Bin\Database\DB;

class Country
{
    private $id;
    private $name;

    public function getAll(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM countrys");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }

}