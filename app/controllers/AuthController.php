<?php

namespace App\Controllers;

use App\Bin\Token;
use App\Models\User;

class AuthController extends BaseController {
    private $user;
    public function __construct(){
        parent::__construct();
        $this->user = new User();
    }


    public function postLogin(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $user = $this->user->getUser($_POST['email']);
                if($user && password_verify($_POST['password'], $user[0]->password)){
                    if(!$this->user->getUserActivate($user[0]->id, "id")){
                        $jwt = Token::newToken(['id' => $user[0]->id,
                                                'device' => $_SERVER['HTTP_USER_AGENT'],
                                                'username' => $user[0]->name.' '.$user[0]->lastname,
                                                'email' => $user[0]->email,
                                                'admin' => $user[0]->rank], 7200);
                        $saveJwt = $this->user->saveSession($user[0]->id, $jwt);
                        if($saveJwt){
                            echo $this->json_response('You are logged in, wait a few seconds ...', 200, $jwt, true);
                        }else{
                            echo $this->json_response('Could not log in, try again', 200);
                        }
                    }else{
                        echo $this->json_response('Your account is not activated, you must access your email and activate it', 200);
                    }
                }else{
                    echo $this->json_response('Your email address and / or your password is incorrect', 200);
                }
            }else{
                echo $this->json_response('You must complete all the fields', 200);
            }
    }
    public function getLogin(){
        return $this->render("account/login.twig");
    }


    public function postRegister(){
            $errors = $this->user->insertUser($_POST);
            if(!$errors){
                $result = "You have registered successfully, you must access the email and confirm it";
                echo $this->json_response($result, 200, "", true);
            }else{
                echo $this->json_response($errors,200);
            }
    }

    public function getRegister(){
        return $this->render("account/register.twig");
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
        unset($_COOKIE['__token']);
        setcookie("__token", "", time()-3600, "/");
        header("Location: " . BASE_URL . "index");
    }


}