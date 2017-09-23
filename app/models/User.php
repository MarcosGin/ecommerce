<?php

namespace App\Models;

use App\Bin\Database\DB;
use App\Models\Product;
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

    public function getUsers()
    {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id,firstname,lastname,username,document,email,phone,country,city,address,postalcode FROM users  LIMIT 50");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }


    public function getLogin($email)
    {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id, email, rank, password FROM users WHERE email = :email LIMIT 1");
        $query->execute([
            'email' => $email
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

    public function getUserActivate($token, $type = null)
    {
        $dbObj = DB::getInstance();
        if ($type == "id") {
            $query = $dbObj->getQuery("SELECT * FROM users_activate WHERE user_id = :token AND change_email = :chn_mail LIMIT 1");
        } else {
            $query = $dbObj->getQuery("SELECT * FROM users_activate WHERE token = :token AND change_email = :chn_mail LIMIT 1");
        }
        $result = $query->execute([
            'token' => $token,
            'chn_mail' => 0
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
        $query = $dbObj->getQuery("INSERT INTO users (name, lastname, password, email, gender, dni, phone, rank, cash, dayBirth, monthBirth, yearBirth, img, newlatter)
            VALUES (:name, :lastname, :password, :email, :gender, :dni, :phone, :rank, :cash, :dayBirth, :monthBirth, :yearBirth, :img, :newlatter)
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
                    'dayBirth' => $post['newDay'],
                    'monthBirth' => $post['newMonth'],
                    'yearBirth' => $post['newYear'],
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

    public function saveSession($user_id, $jwt){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('INSERT INTO users_sessions (user_id, jwt, activate) VALUES(:user_id, :jwt, :activate)');

        $data = $query->execute([
            'user_id' => $user_id,
            'jwt' => $jwt,
            'activate' => 1
        ]);
            if($data){
                $result['result'] = true;
            }
        return $data;
    }

    public function downSession($user_id, $jwt){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('UPDATE users_sessions SET activate = :activate WHERE user_id = :user_id AND jwt =:jwt');

        $data = $query->execute([
            'user_id' => $user_id,
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



    public function generateTokenRegister($id, $change_email = false)
    {
        $token = bin2hex(random_bytes(40));
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("INSERT INTO users_activate (user_id, token, change_email) VALUES(:user_id, :token, :change_email)");
        $query->execute([
            'user_id' => $id,
            'token' => $token,
            'change_email' => $change_email
        ]);

        return BASE_URL . 'account/token/' . $token;
    }

    public function insertPurchase($user_id, $cart = [])
    {
        $result = array('result' => true);
        $buyId = uniqid();
        $time = time();
        $dbObj = DB::getInstance();
        $errors = 0;
        $query = $dbObj->getQuery("INSERT INTO  users_carts (cart_id, user_id, created_at) VALUES(:cart_id, :user_id, :created_at)");
        $query->execute([
            'cart_id' => $buyId,
            'user_id' => $user_id,
            'created_at' => $time
        ]);
        foreach ($cart as $key => $value) {
            $query = $dbObj->getQuery("INSERT INTO  myhistory (cart_id, produc_id, quantity, price) VALUES(:cart_id, :produc_id, :quantity, :price)");
            $data = $query->execute([
                'cart_id' => $buyId,
                'produc_id' => $cart[$key]['id'],
                'quantity' => $cart[$key]['quantity'],
                'price' => $cart[$key]['price'],
            ]);
            if (!$data) {
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

    public function getProfile($user_id)
    {
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('SELECT name,lastname,email,dayBirth,monthBirth,yearBirth,dni,phone,gender,country FROM users WHERE id=:id');
        $query->execute([
            'id' => $user_id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($data) {
            $result['result'] = true;
            $result['response'] = $data;
            return $result;
        } else {
            $result['response'] = "Not found user";
            return $result;
        }

    }

    public function getHistory($user_id)
    {
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('SELECT * FROM users_carts WHERE user_id=:id');
        $query->execute([
            'id' => $user_id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($data) {
            $myHistory = array();
            $product = new Product();
            foreach ($data as $key => $value){
                $cart_id = $data[$key]['cart_id'];
                $cart_time = $data[$key]['created_at'];
                $query = $dbObj->getQuery('SELECT price,produc_id,quantity FROM myhistory WHERE cart_id=:cart_id');
                $query->execute([
                    'cart_id' => $cart_id,
                ]);
                $cart_products = $query->fetchAll(\PDO::FETCH_ASSOC);
                if($cart_products){
                    $products = [];
                    $total = 0;
                    $quantity=0;

                    foreach ($cart_products as $key2 => $value2){
                         $total += $cart_products[$key2]['price'] * $cart_products[$key2]['quantity'];
                         $quantity += $cart_products[$key2]['quantity'];
                         $dataProduct = $product->getProduct($cart_products[$key2]['produc_id']);
                         if($dataProduct['result']){
                             $products[$key2]= array('id' => $cart_products[$key2]['produc_id'],
                                 'name' => $dataProduct['response'][0]->nombre,
                                 'url_img' => $dataProduct['response'][0]->carpet . '/' . $dataProduct['response'][0]->portada,
                                 'price' => $cart_products[$key2]['price'],
                                 'quantity' => $cart_products[$key2]['quantity']);
                         }

                    }
                    $myHistory[$cart_id]['products'] = $products;
                    $myHistory[$cart_id]['date'] = $cart_time;
                    $myHistory[$cart_id]['total'] = $total;
                    $myHistory[$cart_id]['quantity'] = $quantity;
                }
            }
            $result['result'] = true;
            $result['response'] = $myHistory;
            return $result;
        } else {
            $result['response'] = "Your history is empty!";
            return $result;
        }

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
    public function updatePassword($user_id, $passwords){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('SELECT password FROM users WHERE id =:user_id');
        $query->execute([
            'user_id' => $user_id
        ]);
        $password = $query->fetchAll(\PDO::FETCH_ASSOC);

        if($password){
            if(password_verify($passwords['myPassword'], $password[0]['password'])) {
                if(strlen($passwords['newPassword']) >= 10) {
                    if($passwords['newPassword'] === $passwords['cofPassword']) {
                        if(!password_verify($passwords['newPassword'], $password[0]['password'])) {
                            $query = $dbObj->getQuery('UPDATE users SET password =:password WHERE id =:user_id');
                            $data = $query->execute([
                                'user_id' => $user_id,
                                'password' => password_hash($passwords['newPassword'], PASSWORD_DEFAULT),
                            ]);
                            if ($data) {
                                $result['result'] = true;
                                $result['response'] = 'The password was changed';
                            }
                        }else{
                            $result['response'] = 'The new password is identical to the current one';
                        }
                    }else{
                        $result['response'] = 'The confirmation of new password does not match';
                    }
                }else{
                    $result['response'] = 'The minimum the new password length is 10';
                }
            }else{
                $result['response'] = 'Your password is incorrect';
            }
        }else{
            $result['response'] = 'The user no exist.';
        }


        return $result;
    }
    public function updateEmail($user_id, $email){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $validator = new Validator();
        $validator->add(array(
            'newEmail' => 'email()',
        ));
        if($validator->validate($email)){
            $user = self::getUserForId($user_id);
            if($user[0]->email !== $email['newEmail']){
                $chkChangeEmail = self::checkIfChangeEmail($user_id);
                if(!$chkChangeEmail['result']){
                    $urlToken = self::generateTokenRegister($user_id, true);
                    $mail = new Mail();
                    $mail->sedMailForChangeEmail($email['newEmail'], $urlToken);
                    $query = $dbObj->getQuery('INSERT INTO users_change_email (user_id, mail) VALUES(:user_id, :mail)');
                    $data = $query->execute([
                        'user_id' => $user_id,
                        'mail' => $email['newEmail']
                    ]);
                    if($data){
                        $result['result'] = true;
                        $result['response'] = 'The mail is change';
                    }else{
                        $result['response'] = 'The mail is not change';
                    }
                }else{
                    $result['response'] = 'A change of mail already exists, you must confirm that to be able to make another one.';
                }
            }else{
                $result['response'] = 'The email is the same.';
            }


        }else{
            $result['response'] = 'The email is invalid.';
        }


        return $result;
    }

    public function checkIfChangeEmail($user_id){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('SELECT * FROM users_change_email WHERE user_id =:user_id');
        $query->execute([
            'user_id' => $user_id
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        if($data){
            $result['result'] = true;
            $result['response'] = $data;
        }else{
            $result['response'] = 'Not found mail change.';
        }
        return $result;
    }

}