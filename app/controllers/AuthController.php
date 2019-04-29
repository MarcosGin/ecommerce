<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\User;
use App\Bin\Token;

class AuthController {
    private $user;
    private $token;
    public function __construct(){
        $this->user = new User();
        $this->token = new Token();

    }

    public function login(Request $request, Response $response, $args){
        $params = json_decode( $request->getBody(), true);

        if (isset($params['email']) && isset($params['password'])) {
            $user = $this->user->getLogin($params['email']);
            if( $user && password_verify($params['password'], $user[0]->password)){
                    $jwt = $this->token->newToken([
                    'id' => $user[0]->id,
                    'firstName' => $user[0]->firstname,
                    'lastName' => $user[0]->lastname,
                    'email' => $user[0]->email,
                    'avatar' => "https://gw.alipayobjects.com/zos/antfincdn/XAosXuNZyF/BiazfanxmamNRoxxVxka.png",
                        'device' => \Detect::os() . ' - ' . \Detect::browser(),
                        'ip' => @\Detect::ip(),
                        'admin' => $user[0]->rank,]);
                    $this->token->checkAud($user[0]->id);
                    $saveJwt = $this->user->saveSession($user[0]->id, $jwt, \Detect::os() . ' - ' . \Detect::browser(), @\Detect::ip(), $this->token->Aud());
                    if($saveJwt){
                        return $response->withJson(['status' => true,'response' =>'You are logged in', 'jwt' => $jwt]);
                    }else{
                        return $response->withJson(['status' => false,'response' =>'Could not log in, try again'], 400);
                    }
            }else{
                return $response->withJson(['status' => false,'response' =>'Your email address and / or your password is incorrect'], 400);
            }
        }else {
            return $response->withJson(['status' => false,'response' =>'You must complete all the fields', 'params' => $params], 400);
        }

    }
    public function logout(Request $request, Response $response, $args){
        $user = $request->getAttribute('user');
        $jwt = $request->getAttribute('jwt');

        $downSession = $this->user->downSession($jwt);
        if($downSession['result']){
            return $response->withJson(['status' => true,'response' =>'The session was closed']);
        }else{
            return $response->withJson(['status' => false,'response' =>'The session was not closed', 'jwt' => $jwt]);
        }
    }
}