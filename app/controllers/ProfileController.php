<?php

namespace App\Controllers;

use App\Bin\Token;
use App\Models\User;
use App\Bin\GeoLocation;
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
    public function putSettings($params = null){
        parse_str(file_get_contents("php://input"),$post_vars);//data amazing

        $xhr = '';
        foreach (getallheaders() as $key => $value){
            if($key == 'Authorization'){
                $xhr = $value;
            }
        }
        $jwt = Token::checkToken($xhr);
        if($jwt['result']){
                $option = true;
                $upUser = [];
              switch ($params){
                  case 'information':
                      $upUser = $this->user->updateProfile(12, $post_vars);
                      break;
                  case 'password':
                      $upUser = $this->user->updatePassword(23, $post_vars);
                      break;
                  default:
                      $option = false;
              }
              if($option){
                  if($upUser['result']){
                      $user = $this->user->getUserForId($jwt['jwt']->id);
                      $this->user->downSessions($user[0]->id);
                      $newJwt = Token::newToken(['id' => $user[0]->id,
                          'device' => $_SERVER['HTTP_USER_AGENT'],
                          'ip' => $_SERVER['REMOTE_ADDR'],
                          'username' => $user[0]->name.' '.$user[0]->lastname,
                          'email' => $user[0]->email,
                          'admin' => $user[0]->rank], 7200);
                      $saveSession = $this->user->saveSession($user[0]->id, $newJwt);
                      if($saveSession){
                          echo $this->json_response($upUser['response'], 200, $newJwt, true);
                      }
                  }else{
                      echo $this->json_response($upUser['response'], 200);
                  }
              }else{
                  echo $this->json_response('The path is incorrect', 400);
              }

        }else{
            echo $this->json_response($jwt['response'], 200);
        }
    }
    public function getUser(){
        $xhr = '';
        foreach (getallheaders() as $key => $value){
            if($key == 'Authorization'){
                $xhr = $value;
            }
        }
        $jwt = Token::checkToken($xhr);
        if($jwt['result']){
            $dataUser = $this->user->getProfile($jwt['jwt']->id);
            if ($dataUser['result']) {
                echo $this->json_response($dataUser['response'][0], 200, $jwt['token'], true);
            }else{
                echo $this->json_response($dataUser['response'], 200);
            }
        }else{
                echo $this->json_response($jwt['response'], 200);
        }

    }
}