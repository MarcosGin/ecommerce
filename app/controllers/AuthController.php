<?php

namespace App\Controllers;

use App\Models\User;

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
                        $_SESSION['email'] = $user[0]->email;
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
        unset($_SESSION['email']);
        header("Location: " . BASE_URL . "index");
    }


}