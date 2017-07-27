<?php

namespace App\Controllers;

use App\Bin\Token;
use App\Models\User;

class ProfileController extends BaseController{
    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function getIndex(){
        return $this->render('profile/index.twig', []);
    }
    public function putSettings(){
        parse_str(file_get_contents("php://input"),$post_vars);//data amazing

        $jwt = [];
        foreach (getallheaders() as $key => $value){
            if($key == 'Authorization'){
                $jwt = Token::checkToken($value);
            }
        }
        echo $this->json_response($post_vars, 200);
    }
    public function getUser(){
        $jwt = [];
        foreach (getallheaders() as $key => $value){
            if($key == 'Authorization'){
                $jwt = Token::checkToken($value);
            }
        }
        if($jwt['result']){
            $dataUser = $this->user->getProfile($jwt['jwt']->id);
            if ($dataUser['result']) {
                echo $this->json_response($dataUser['response'][0], 200, $jwt['token'], true);
            } else {
                echo $this->json_response($dataUser['response'], 200, $jwt['token'], false);
            }
        }else{
            echo $this->json_response($jwt['response'], 200);
        }

    }
}