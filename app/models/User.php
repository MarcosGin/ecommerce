<?php

namespace App\Models;

use App\Bin\Database\DB;
use App\Bin\Mail\Mail;
use Sirius\Validation\Validator;

class User
{

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

    public function getUser($email)
    {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM users WHERE email = :email LIMIT 1");
        $query->execute([
            'email' => $email,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);

        return $data;
    }

    public function getUserActivate($token, $type = null)
    {
        $dbObj = DB::getInstance();
        if ($type == "id") {
            $query = $dbObj->getQuery("SELECT * FROM users_activate WHERE user_id = :token LIMIT 1");
        } else {
            $query = $dbObj->getQuery("SELECT * FROM users_activate WHERE token = :token LIMIT 1");
        }
        $result = $query->execute([
            'token' => $token,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);

        return $data;
    }

    public function activateUser($token)
    {
        if ($this->getUserActivate($token)) {
            $dbObj = DB::getInstance();
            $query = $dbObj->getQuery("DELETE FROM users_activate WHERE token = :token");
            $query->execute([
                'token' => $token
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function insertUser($post)
    {
        $result = [];
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("INSERT INTO users (name, lastname, password, email, gender, dni, phone, rank, cash, dateuser, img, newlatter)
            VALUES (:name, :lastname, :password, :email, :gender, :dni, :phone, :rank, :cash, :dateuser, :img, :newlatter)
        ");

        $validator = new Validator();

        $validator->add(array(
            'newName:Nombre' => 'required()(El campo del {label} es requerido) | fullname()(El campo del {label} es invalido) | maxlength(50)(El campo del {label} permite como maximo {max} caracteres)',
            'newLastName:Apellido' => 'required()(El campo del {label} es requerido) | maxlength(30)(El campo del {label} permite como maximo {max} caracteres)',
            'newPass:Contraseña' => 'required()(El campo de la {label} es requerido) | minlength(10)(El campo de la {label} permite como minimo {min} caracteres)',
            'newEmail:Correo electrónico' => 'required()(El campo del {label} es requerido) | email()(El campo del {label} es invalido)',
            'newGender:Género' => 'required()(El campo del {label} es requerido)',
            'newDNI:Documento' => 'required()(El campo del {label} es requerido) | integer()(El campo del {label} permite solo numeros) | minlength(8)(El campo del {label} es invalido) | maxlength(8)(El campo del {label} es invalido) ',
            'newPhone:Celular' => 'required()(El campo del {label} es requerido) |  integer()(El campo del {label} permite solo numeros) | minlength(10)(El campo del {label} es invalido) | maxlength(10)(El campo del {label} es invalido) ',
            'termine:Termino' => 'required()(Debes aceptar las Condiciones de uso y la Política de privacidad)',
        ));

        if ($validator->validate($post)) {
            $verif_user_exist = $this->getUser($post['newEmail']);
            if (!$verif_user_exist) {
                $query->execute([
                    'name' => $post['newName'],
                    'lastname' => $post['newLastName'],
                    'password' => password_hash($post['newPass'], PASSWORD_DEFAULT),
                    'email' => $post['newEmail'],
                    'gender' => $post['newGender'],
                    'dni' => $post['newDNI'],
                    'phone' => $post['newPhone'],
                    'rank' => 0,
                    'cash' => 0,
                    'dateuser' => $post['newDay'] . '/' . $post['newMonth'] . '/' . $post['newYear'],
                    'img' => "none.jpg",
                    'newlatter' => 0,
                ]);
                $mail = new Mail();
                $mail->sedMailForRegister($post['newEmail'], $this->generateTokenRegister($dbObj->getLastInsertedId()));
                return false;
            } else {
                return array('Correo electrónico' => "Ya existe este correo electrónico en la pagina.");
            }
        } else {
            foreach ($validator->getMessages() as $error) {
                foreach ($error as $message) {
                    $name = $message->getVariables()['label'];
                    $result[$name] = $message->__toString();
                }
            }
            return $result;
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

    public function insertPurchase($user_id, $cart = []){
        $result = array('result' => true);
        $buyId = uniqid();
        $time = time();
        $dbObj = DB::getInstance();
        $errors =0;
        foreach ($cart as $key => $value){
            $query = $dbObj->getQuery("INSERT INTO  myhistory (buy_id, user_id, produc_id, quantity, price, fecha) VALUES(:buy_id, :user_id, :produc_id, :quantity, :price, :fecha)");
            $data = $query->execute([
                'buy_id' => $buyId,
                'user_id' => $user_id,
                'produc_id' => $cart[$key]['id'],
                'quantity' => $cart[$key]['quantity'],
                'price' => $cart[$key]['price'],
                'fecha' => $time
            ]);
            if(!$data){
                $errors++;
            }
        }
        if ($errors < 1) {
            $result['result'] = true;
            $result['response'] = 'The purchase has been successfully completed';
            return $result;
        } else {
            $message['response'] = 'There was a mistake in the purchase!';
            return $result;
        }
    }

    public function getProfile($user_id){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('SELECT name,lastname,dayBirth,monthBirth,yearBirth,dni,phone,gender,country FROM users WHERE id=:id');
        $query->execute([
            'id' => $user_id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
                if($data){
                    $result['result'] = true;
                    $result['response'] = $data;
                    return $result;
                }else{
                    $result['response'] = "Not found user";
                    return $result;
                }

    }
    public function updateProfile($user_id, $data){
        //update
    }


}