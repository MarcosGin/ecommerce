<?php

namespace App\Models;

use App\Database\DB;

class User {

    private $name;
    private $lastName;
    private $email;
    private $password;
    private $gender;
    private $dni;
    private $phone;
    private $rank;
    private $cash;
    private $dateUser;
    private $img;
    private $newLatter;

    public function getUser($email){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM users WHERE email = :email LIMIT 1");
        $query->execute([
           'email' => $email,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);

        return $data;
    }

    public function insertUser($name, $lastName, $email, $password, $gender, $dni, $phone, $rank, $cash, $dateUser, $img, $newLatter) {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("INSERT INTO users (name, lastname, password, email, gender, dni, phone, rank, cash, dateuser, img, newlatter)
            VALUES (:name, :lastname, :password, :email, :gender, :dni, :phone, :rank, :cash, :dateuser, :img, :newlatter)
        ");
        $result = $query->execute([
            'name' => $name,
            'lastname' => $lastName,
            'password' => $email,
            'email' => $password,
            'gender' => $gender,
            'dni' =>    $dni,
            'phone' =>  $phone,
            'rank' =>   $rank,
            'cash' =>   $cash,
            'dateuser' =>   $dateUser,
            'img' =>    $img,
            'newlatter' =>  $newLatter,
        ]);
        return $result;
    }



}