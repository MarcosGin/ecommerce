<?php

namespace App\Controllers;

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
        $user = $request->getAttribute('user');
        $jwt = $request->getAttribute('jwt');
        $profile = $this->user->getUserForId($user->id);
        if($profile) {
            return $response->withJson(['status' => true,'response' => $profile[0], 'jwt' => $jwt]);
        } else {
            return $response->withJson(['status' => false,'response' => 'fail', 'jwt' => $jwt]);
        }
    }
    public function getHistory(Request $request, Response $response, $args) {
        $user = $request->getAttribute('user');
        $jwt = $request->getAttribute('jwt');
        $history = $this->user->getHistory($user->id);
        if($history) {
            return $response->withJson(['status' => true,'response' => $history, 'jwt' => $jwt]);
        } else {
            return $response->withJson(['status' => false,'response' => 'fail', 'jwt' => $jwt]);
        }
    }
    public function update(Request $request, Response $response, $args) {
        $user = $request->getAttribute('user');
        $jwt = $request->getAttribute('jwt');
        $user = $this->user->getUserForId($user->id);
        if($user){
            $params = json_decode( $request->getBody(), true);
            $update = $this->user->updateProfile($user[0]->id, $params);
            if($update['result']){
                $newData = $this->user->getUserForId($user[0]->id);
                return $response->withJson(['status' => false, 'response' => ['message' => 'The profile was successfully updated','data' => $newData[0]], 'jwt' => $jwt]);
            } else {
                return $response->withJson(['status' => false, 'response' => $update['response'], 'jwt' => $jwt]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The user was not found','jwt' => $jwt]);
        }
    }
}