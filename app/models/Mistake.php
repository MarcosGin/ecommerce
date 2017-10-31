<?php

namespace App\Models;

use App\Bin\Database\DB;

class Mistake
{
    public function getAll($order='ASC', $limit = 0){
        $limit  = $limit ? 'LIMIT ' . $limit : '';
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM mistakes  ORDER BY id " .$order. " ". $limit ." ");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }
}