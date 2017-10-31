<?php

namespace App\Controllers;

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
        $user = $this->user->getUserForId($args['id']);
        $jwt = $request->getAttribute('jwt');
        if($user) {
            return $response->withJson(['status' => true, 'response' => $user[0], 'jwt' => $jwt]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'The user was not found','jwt' => $jwt]);
        }
    }
    public function getAll(Request $request, Response $response, $args){
        $users = $this->user->getUsers();
        $jwt = $request->getAttribute('jwt');
        if($users) {
            return $response->withJson(['status' => true, 'response' => $users, 'jwt' => $jwt]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'The users was not found', 'jwt' => $jwt]);
        }
    }
    public function search(Request $request, Response $response, $args){
        $users = $this->user->searchUsers($args['value']);
        $jwt = $request->getAttribute('jwt');
        if($users){
            return $response->withJson(['status' => true, 'response' => $users, 'jwt' => $jwt]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'Not found users', 'jwt' => $jwt]);
        }
    }
    public function update(Request $request, Response $response, $args){
        $user = $this->user->getUserForId($args['id']);
        $jwt = $request->getAttribute('jwt');
        if($user) {
            $params = json_decode( $request->getBody(), true);
            $update = $this->user->updateProfile($user[0]->id, $params);
            if($update['result']){
                $newData = $this->user->getUserForId($user[0]->id);
                return $response->withJson(['status' => false, 'response' => ['message' => 'The user was successfully updated','data' => $newData[0]], 'jwt' => $jwt]);
            } else {
                return $response->withJson(['status' => false, 'response' => $update['response'], 'jwt' => $jwt]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The user was not found','jwt' => $jwt]);
        }
    }
    public function delete(Request $request, Response $response, $args){
        $user = $this->user->getUserForId($args['id']);
        $jwt = $request->getAttribute('jwt');
        if($user) {
            $delete = $this->user->deleteUser($user[0]->id);
            if($delete['result']){
                return $response->withJson(['status' => true, 'response' => 'The user was deleted successfully',  'jwt' => $jwt]);
            } else {
                return $response->withJson(['status' => false, 'response' => $delete['response'], 'jwt' => $jwt]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The user was not deleted because it does not exist', 'jwt' => $jwt]);
        }
    }
}