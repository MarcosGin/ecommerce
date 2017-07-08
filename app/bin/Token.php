<?php
/**
 * Created by PhpStorm.
 * User: bocaj
 * Date: 04/07/2017
 * Time: 3:57
 */
namespace App\Bin;


class Token
{

    public static function newToken(array $data , int $expired){
        $token = array(
            'iat' => time(),
            'exp' => time() + ($expired),
            'data' => $data,
        );
       return  \Firebase\JWT\JWT::encode($token, SECRET_KEY, ALGORITHM);
    }
    public static function checkToken($token){

        if(!$token){
            throw new \Exception('Invalid token!');
        }

        try{
            $jwt = \Firebase\JWT\JWT::decode($token, SECRET_KEY, array(ALGORITHM));
            $realTime = $jwt->exp - time();

            if($realTime < 1800){
                $newData = json_decode(json_encode($jwt->data), true);
                $newJwt = self::newToken($newData, 7200);
                setcookie('__token', $newJwt, time() + 7200, '/');
            }
           return $jwt->data;
        }catch (\FireBase\JWT\ExpiredException $e) {
            self::deleteToken();
            throw  new \Exception('Token expired! Re loggin');
        }catch (\FireBase\JWT\SignatureInvalidException $e){
            throw new \Exception('Verification failed');
        }


    }

    private static function deleteToken(){
        if(isset($_COOKIE['__token'])){
            unset($_COOKIE['__token']);
            setcookie("__token", "", time()-3600, '/');
        }
    }


}