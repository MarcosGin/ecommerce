<?php

namespace App\Models;

use App\Bin\Database\DB;

class Mistake
{
    public function getAll(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM mistakes");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }
}