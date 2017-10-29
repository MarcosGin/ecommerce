<?php

namespace App\Models;

use App\Bin\Database\DB;
use App\Bin\Token;

class User
{
    public function getUser($email)
    {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM users WHERE email = :email");
        $query->execute([
            'email' => $email,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);

        return $data;
    }
    public function getUserForId($id)
    {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id,firstname,lastname,username,document,email,phone,country,city,address,postalcode FROM users WHERE id = :id");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);

        return $data;
    }
    public function getUsers()
    {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id,firstname,lastname,username,document,email,phone,country,city,address,postalcode FROM users");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }
    public function getLogin($email)
    {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id, email, rank, password FROM users WHERE email = :email");
        $query->execute([
            'email' => $email
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);

        return $data;
    }
    public function getHistory($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT device,ip,created_at,activate FROM users_sessions WHERE user_id = :id");
        $query->execute([
            'id' => $id
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }
    public function searchUsers($value)
    {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id,firstname,lastname,username,document,email,phone,country,city,address,postalcode FROM users WHERE UPPER(firstname) LIKE UPPER(:firstname) OR UPPER(email) LIKE UPPER(:email)");
        $query->execute([
            'firstname' => '%'.$value.'%',
            'email' => '%'.$value.'%'
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }
    public function deleteUser($value)
    {
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("DELETE FROM users WHERE id = :id");
        $data = $query->execute([
            'id' => $value
        ]);
        if($data){
            $result['result'] = true;
        }else{
            $result['response'] = 'The user wat no deleted';
        }
        return $result;
    }
    public function updateProfile($user_id, $data)
    {
        $result = array('result' => false);
        if(isset($data['firstname']) && isset($data['lastname']) && isset($data['username']) && isset($data['document'])
            && isset($data['email']) && isset($data['phone']) && isset($data['country']) && isset($data['city'])
            && isset($data['address']) && isset($data['postalcode'])) {
            $dbObj = DB::getInstance();
            $query = $dbObj->getQuery('UPDATE users SET firstname =:firstname, lastname=:lastname, username =:username, document=:document, email=:email, phone =:phone, country=:country, city=:city, address=:address, postalcode=:postalcode WHERE id = :id');
            $data = $query->execute([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'username' => $data['username'],
                'document' => $data['document'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'country' => $data['country'],
                'city' => $data['city'],
                'address' => $data['address'],
                'postalcode' => $data['postalcode'],
                'id' => $user_id,
            ]);


            if ($data) {
                $result['result'] = true;
                $result['response'] = "The profile was successfully modified";
            } else {
                $result['response'] = "Profile was not successfully modified";
            }
        }else{
            $result['response'] = "You must complete all the fields";
        }

        return $result;
    }
    public function saveSession($user_id, $jwt, $device='', $ip='', $aud){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('INSERT INTO users_sessions (user_id, jwt, device, ip, created_at, activate, aud) VALUES(:user_id, :jwt, :device, :ip, :created_at, :activate, :aud)');

        $data = $query->execute([
            'user_id' => $user_id,
            'jwt' => $jwt,
            'device' => $device,
            'ip' => $ip,
            'created_at' => date("Y-m-d H:i:s"),
            'aud' => $aud,
            'activate' => 1
        ]);
        if($data){
            $result['result'] = true;
        }
        return $data;
    }
    public function downSession($jwt){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('UPDATE users_sessions SET activate = :activate WHERE jwt =:jwt');
        $data = $query->execute([
            'jwt' => $jwt,
            'activate' => 0
        ]);
        if($data){
            $result['result'] = true;
        }
        return $result;
    }
    public function downSessions($user_id){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('UPDATE users_sessions SET activate = :activate WHERE user_id = :user_id');

        $data = $query->execute([
            'user_id' => $user_id,
            'activate' => 0
        ]);
        if($data){
            $result['result'] = true;
        }
        return $data;
    }
}