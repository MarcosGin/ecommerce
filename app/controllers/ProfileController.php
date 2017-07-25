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
}