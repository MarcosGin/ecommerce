<?php

namespace App\Models;

use App\Bin\Database\DB;
use App\Bin\Mail\Mail;
use Sirius\Validation\Validator;

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

    public function insertUser($post) {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("INSERT INTO users (name, lastname, password, email, gender, dni, phone, rank, cash, dateuser, img, newlatter)
            VALUES (:name, :lastname, :password, :email, :gender, :dni, :phone, :rank, :cash, :dateuser, :img, :newlatter)
        ");

        $validator = new Validator();

        $validator->add(array(
            'newName:nombre' => 'required()(El campo del {label} es requerido) | fullname()(El campo del {label} es invalido) | maxlength(50)(El campo del {label} permite como maximo {max} caracteres)',
            'newLastName:apellido' => 'required()(El campo del {label} es requerido) | maxlength(30)(El campo del {label} permite como maximo {max} caracteres)',
            'newPass:contraseña' => 'required()(El campo de la {label} es requerido) | minlength(10)(El campo de la {label} permite como minimo {min} caracteres)',
            'newEmail:correo electrónico' => 'required()(El campo del {label} es requerido) | email()(El campo del {label} es invalido)',
            'newGender:género' => 'required()(El campo del {label} es requerido)',
            'newDNI:documento' => 'required()(El campo del {label} es requerido) | integer()(El campo del {label} permite solo numeros) | minlength(8)(El campo del {label} es invalido) | maxlength(8)(El campo del {label} es invalido) ',
            'newPhone:celular' => 'required()(El campo del {label} es requerido) |  integer()(El campo del {label} permite solo numeros) | minlength(10)(El campo del {label} es invalido) | maxlength(10)(El campo del {label} es invalido) ',
            'termine' => 'required()(Debes aceptar las Condiciones de uso y la Política de privacidad)',
        ));

        if($validator->validate($post)){
            $verif_user_exist = $this->getUser($post['newEmail']);
            if(!$verif_user_exist){
                $query->execute([
                    'name' => $post['newName'],
                    'lastname' => $post['newLastName'],
                    'password' => password_hash($post['newPass'], PASSWORD_DEFAULT),
                    'email' => $post['newEmail'],
                    'gender' => $post['newGender'],
                    'dni' =>    $post['newDNI'],
                    'phone' =>  $post['newPhone'],
                    'rank' =>   0,
                    'cash' =>   0,
                    'dateuser' =>  $post['newDay'].'/'.$post['newMonth'].'/'.$post['newYear'],
                    'img' =>    "none.jpg",
                    'newlatter' =>  0,
                ]);
                   $mail = new Mail();
                   $mail->sedMailForRegister($post['newEmail'], $this->generateTokenRegister($dbObj->getLastInsertedId()));
                     return false;
            }else{
                $validator->addMessage('newEmail', 'Ya existe una cuenta con este correo electronico.');
                return  $validator->getMessages();
            }
        }else{
            return  $validator->getMessages();

        }
    }

    public function generateTokenRegister($id){
         $token = bin2hex(random_bytes(40));
         $dbObj = DB::getInstance();
         $query = $dbObj->getQuery("INSERT INTO users_activate (user_id, token) VALUES(:user_id, :token)");
         $query->execute([
             'user_id' => $id,
             'token' => $token,
         ]);

        return BASE_URL.'account/token/'.$token;
    }



}