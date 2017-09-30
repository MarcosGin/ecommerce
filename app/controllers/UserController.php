<?php

namespace App\Controllers;

use App\Bin\Token;
use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\User;

class UserController
{
    private $user;
    public function __construct(){
        $this->user = new User();
    }

    public function get(Request $request, Response $response, $args){
        $jwt_header = $request->getHeader('Authorization');

        if ($jwt_header){
            $jwt = Token::checkToken($jwt_header[0]);
            if($jwt['result']){
                $user = $this->user->getUserForId($args['id']);
                if($user) {
                    return $response->withJson(['status' => true, 'response' => $user[0]]);
                } else {
                    return $response->withJson(['status' => false, 'response' => 'The user was not found']);
                }
            }else{
                return $response->withJson(['status' => false,'response' => $jwt['response'], 'jwt' => $jwt_header], 401);
            }
        }else{
            return $response->withJson(['status' => false,'response' =>'Authorization failed'],401);
        }
    }
    public function getAll(Request $request, Response $response, $args){
        $jwt_header = $request->getHeader('Authorization');

        if ($jwt_header){
            $jwt = Token::checkToken($jwt_header[0]);
            if($jwt['result']){
                $users = $this->user->getUsers();
                if($users) {
                    return $response->withJson(['status' => true, 'response' => $users]);
                } else {
                    return $response->withJson(['status' => false, 'response' => 'The users was not found']);
                }
            }else{
                return $response->withJson(['status' => false,'response' => $jwt['response'], 'jwt' => $jwt_header], 401);
            }
        }else{
            return $response->withJson(['status' => false,'response' =>'Authorization failed'],401);
        }
    }
    public function search(Request $request, Response $response, $args){
        $jwt_header = $request->getHeader('Authorization');

        if ($jwt_header){
            $jwt = Token::checkToken($jwt_header[0]);
            if($jwt['result']){
                $users = $this->user->searchUsers($args['value']);
                if($users){
                    return $response->withJson(['status' => true, 'response' => $users]);
                }else{
                    return $response->withJson(['status' => false, 'response' => 'Not found users']);
                }
            }else{
                return $response->withJson(['status' => false,'response' => $jwt['response'], 'jwt' => $jwt_header], 401);
            }
        }else{
            return $response->withJson(['status' => false,'response' =>'Authorization failed'],401);
        }
    }
    public function update(Request $request, Response $response, $args){
        $jwt_header = $request->getHeader('Authorization');

        if ($jwt_header){
            $jwt = Token::checkToken($jwt_header[0]);
            if($jwt['result']){
                $user = $this->user->getUserForId($args['id']);
                if($user) {
                    $params = json_decode( $request->getBody(), true);
                    $update = $this->user->updateProfile($user[0]->id, $params);
                    if($update['result']){
                        $newData = $this->user->getUserForId($user[0]->id);
                        return $response->withJson(['status' => false, 'response' => ['message' => 'The user was successfully updated','data' => $newData[0]]]);
                    }else{
                        return $response->withJson(['status' => false, 'response' => $update['response']]);
                    }
                } else {
                    return $response->withJson(['status' => false, 'response' => 'The user was not found']);
                }
            }else{
                return $response->withJson(['status' => false,'response' => $jwt['response'], 'jwt' => $jwt_header], 401);
            }
        }else{
            return $response->withJson(['status' => false,'response' =>'Authorization failed'],401);
        }
    }
    public function delete(Request $request, Response $response, $args){
        $jwt_header = $request->getHeader('Authorization');

        if ($jwt_header){
            $jwt = Token::checkToken($jwt_header[0]);
            if($jwt['result']){
                $user = $this->user->getUserForId($args['id']);
                if($user) {
                    $delete = $this->user->deleteUser($user[0]->id);
                    if($delete['result']){
                        return $response->withJson(['status' => true, 'response' => 'The user was deleted successfully']);
                    }else{
                        return $response->withJson(['status' => false, 'response' => $delete['response']]);
                    }
                }else{
                    return $response->withJson(['status' => false, 'response' => 'The user was not deleted because it does not exist']);
                }
            }else{
                return $response->withJson(['status' => false,'response' => $jwt['response'], 'jwt' => $jwt_header], 401);
            }
        }else{
            return $response->withJson(['status' => false,'response' =>'Authorization failed'],401);
        }
    }
}