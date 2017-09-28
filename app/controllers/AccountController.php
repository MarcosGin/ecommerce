<?php
/**
 * Created by PhpStorm.
 * User: bocaj
 * Date: 28/09/2017
 * Time: 8:09
 */

namespace App\Controllers;


use App\Bin\Token;
use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

class AccountController
{
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function get(Request $request, Response $response, $args) {
        $jwt_header = $request->getHeader('Authorization');

        if ($jwt_header){
            $jwt = Token::checkToken($jwt_header[0]);
            if($jwt['result']){
               $profile = $this->user->getUserForId($jwt['jwt']->id);
               if($profile) {
                   return $response->withJson(['status' => true,'response' => $profile[0], 'jwt' => $jwt_header]);
               }else{
                   return $response->withJson(['status' => false,'response' => 'fail', 'jwt' => $jwt_header]);
               }
            }else{
                return $response->withJson(['status' => false,'response' => $jwt['response'], 'jwt' => $jwt_header], 401);
            }
        }else{
            return $response->withJson(['status' => false,'response' =>'Authorization failed'],401);
        }
    }
    public function update(Request $request, Response $response, $args) {

        $jwt_header = $request->getHeader('Authorization');

        if ($jwt_header){
            $jwt = Token::checkToken($jwt_header[0]);
            if($jwt['result']){
                $user = $this->user->getUserForId($jwt['jwt']->id);
                if ($user){
                    $params = json_decode( $request->getBody(), true);
                    $update = $this->user->updateProfile($user[0]->id, $params);

                    if($update['result']){
                        $newData = $this->user->getUserForId($user[0]->id);
                        return $response->withJson(['status' => false, 'response' => ['message' => 'The profile was successfully updated','data' => $newData[0]], 'jwt' => $jwt_header]);
                    }else{
                        return $response->withJson(['status' => false, 'response' => $update['response'], 'jwt' => $jwt_header]);
                    }
                } else {
                    return $response->withJson(['status' => false, 'response' => 'The user was not found','jwt' => $jwt_header]);
                }
            }else{
                return $response->withJson(['status' => false,'response' => $jwt['response'], 'jwt' => $jwt_header], 401);
            }
        }else{
            return $response->withJson(['status' => false,'response' =>'Authorization failed'],401);
        }
    }

}