<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\User;
use App\Bin\Token;

class AuthController {
    private $user;
    public function __construct(){
        $this->user = new User();
    }

    public function login(Request $request, Response $response, $args){
        $params = json_decode( $request->getBody(), true);

        if (isset($params['email']) && isset($params['password'])) {
            $user = $this->user->getLogin($params['email']);
            if( $user && password_verify($params['password'], $user[0]->password)){
                if(!$this->user->getUserActivate($user[0]->id, 'id')){
                    $jwt = Token::newToken(['id' => $user[0]->id,
                        'device' => $_SERVER['HTTP_USER_AGENT'],
                        'ip' => $_SERVER['REMOTE_ADDR'],
                        'email' => $user[0]->email,
                        'admin' => $user[0]->rank], 7200);
                    $saveJwt = $this->user->saveSession($user[0]->id, $jwt);
                    if($saveJwt){
                        return $response->withJson(['status' => true,'response' =>'You are logged in', 'jwt' => $jwt]);
                    }else{
                        return $response->withJson(['status' => false,'response' =>'Could not log in, try again']);
                    }
                }else{
                    return $response->withJson(['status' => false,'response' =>'Your account is not activated, you must access your email and activate it']);
                }
            }else{
                return $response->withJson(['status' => false,'response' =>'Your email address and / or your password is incorrect']);
            }
        }else {
            return $response->withJson(['status' => false,'response' =>'You must complete all the fields', 'params' => $params]);
        }

    }
    public function logout(Request $request, Response $response, $args){
        $jwt_header = $request->getHeader('Authorization');

        if ($jwt_header){
            $jwt = Token::checkToken($jwt_header[0]);
            if($jwt['result']){
                $downSession = $this->user->downSession($jwt['jwt']->id, $jwt_header[0]);
                if($downSession['result']){
                    return $response->withJson(['status' => true,'response' =>'The session was closed']);
                }else{
                    return $response->withJson(['status' => false,'response' =>'The session was not closed', 'jwt' => $jwt['token']]);
                }
            }else{
                return $response->withJson(['status' => false,'response' => $jwt['response'], 'jwt' => $jwt_header], 401);
            }
        }else{
            return $response->withJson(['status' => false,'response' =>'Authorization failed'],401);
        }
    }

}