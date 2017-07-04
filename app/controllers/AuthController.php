<?php

namespace App\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;

class AuthController extends BaseController {
    private $user;
    public function __construct(){
        parent::__construct();
        $this->user = new User();
    }


    public function anyLogin(){
        $error = false;
        if($_POST){
            if(!empty($_POST['email']) && !empty($_POST['password'])){
            $user = $this->user->getUser($_POST['email']);
                if($user && password_verify($_POST['password'], $user[0]->password)){
                    if(!$this->user->getUserActivate($user[0]->id, "id")){

                        $time = time();
                        $key = SECRET_KEY;

                        $token = array(
                            'iat' => $time, // Tiempo que inició el token
                            'exp' => $time + (7200), // Tiempo que expirará el token (+2 hora)
                            'data' => [ // información del usuario
                                'id' => $user[0]->id,
                                'email' => $user[0]->email,
                                'admin' => $user[0]->rank,
                            ]
                        );

                        $jwt = JWT::encode($token, $key, ALGORITHM);

                        $_SESSION['token'] = $jwt;
                        header("Location: " . BASE_URL . "index");
                    }else{
                        $error = "Your account is not activated, you must access your email and activate it";
                    }
                }else{
                    $error = "Your email address and / or your password is incorrect";
                }
            }else{
                $error = "You must complete all the fields";
            }
        }
             return $this->render("account/login.twig", ["errors" => $error]);

    }


    public function anyRegister(){
        $errors = [];
        $result = false;
        if($_POST){
            $user = $this->user->insertUser($_POST);

            if($user){
                $errors = $user;
            }else{
                $result = true;
            }

        }
        return $this->render("account/register.twig", ['errors' => $errors, 'result' => $result]);
    }

    public function getToken($token = null){
        $user = $this->user->activateUser($token);


        if($user){
            return $this->render("account/login.twig", ['activate_account' => true]);
        }else{
           throw new \Exception('Not found page!');
        }


    }

    public function getLogout(){
        session_destroy();
        unset($_SESSION['token']);
        header("Location: " . BASE_URL . "index");
    }


}