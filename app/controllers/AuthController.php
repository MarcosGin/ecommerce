<?php

namespace App\Controllers;

use App\Bin\Token;
use App\Models\User;
use Firebase\JWT\JWT;

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
                                                'username' => $user[0]->name.' '.$user[0]->lastname,
                                                'email' => $user[0]->email,
                                                'admin' => $user[0]->rank], 120);

                        header('Content-Type: application/json');
                        echo json_encode(array(
                            'status' => 'nice',
                            'jwt' => $jwt,
                        ));


                    }else{
                        header('Content-Type: application/json');
                        echo
                        json_encode(array(
                            'status' => 'fail',
                            'message' => 'Your account is not activated, you must access your email and activate it'));
                    }
                }else{
                    header('Content-Type: application/json');
                    echo json_encode(array(
                        'status' => 'fail',
                        'message' => 'Your email address and / or your password is incorrect'));

                }
            }else{
                header('Content-Type: application/json');
                echo json_encode(array(
                        'status' => 'fail',
                        'message' => 'You must complete all the fields'));
            }


    }
    public function getLogin(){
        return $this->render("account/login.twig");
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