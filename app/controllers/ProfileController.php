<?php

namespace App\Controllers;

class ProfileController extends BaseController{

    public function getIndex(){
        return $this->render('profile/index.twig', []);
    }
    public function putSettings(){
        parse_str(file_get_contents("php://input"),$post_vars);//data amazing

        echo $this->json_response($post_vars, 200);
    }
}