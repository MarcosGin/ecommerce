<?php

namespace App\Middleware;

use App\Bin\Token;
use Slim\Http\Request;
use Slim\Http\Response;

class AuthMiddleware
{
    public function __invoke(Request $request, Response $response, $next)
    {
        if($request->hasHeader('Authorization')){

            $jwt = $request->getHeader('Authorization');

            if ($jwt){
                $jwt = Token::checkToken($jwt[0]);
                if($jwt['result']){
                    $request = $request->withAttribute('user', $jwt['jwt']);
                    $request = $request->withAttribute('jwt', $jwt['token']);

                    $response = $next($request, $response);
                }else{
                    return $response->withJson(['status' => false,'response' => $jwt['response']], 401);
                }
            }else{
                return $response->withJson(['status' => false, 'response' =>'Authorization failed'],401);
            }
        }else{
            return $response->withJson(['message'=>'UNAUTHORIZED'], 401);
        }
        return $response;
    }
}