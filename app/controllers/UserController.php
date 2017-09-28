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

        if($user) {
            return $response->withJson(['status' => true, 'response' => $user[0]]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'The user was not found']);
        }

    }
    public function getAll(Request $request, Response $response, $args){

        $users = $this->user->getUsers();

        if($users) {
            return $response->withJson(['status' => true, 'response' => $users]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'The users was not found']);
        }

    }
    public function search(Request $request, Response $response, $args){

        $users = $this->user->searchUsers($args['value']);
        if($users){
            return $response->withJson(['status' => true, 'response' => $users]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'Not found users']);
        }
    }
    public function update(Request $request, Response $response, $args){
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
    }
    public function delete(Request $request, Response $response, $args){
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
    }
}