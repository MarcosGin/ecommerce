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

        $message = array('result' => false);
        if(!$token){
            $message['response'] = 'Token empty!';
            return $message;
        }

        try{
            $jwt = \Firebase\JWT\JWT::decode($token, SECRET_KEY, array(ALGORITHM));
            $realTime = $jwt->exp - time();

            if($realTime < 1800){
                $newData = json_decode(json_encode($jwt->data), true);
                $newJwt = self::newToken($newData, 7200);
                $token = $newJwt;
            }
            $message['result'] = true;
            $message['jwt'] = $jwt->data;
            $message['token'] = $token;
           return $message;
        }catch (\FireBase\JWT\ExpiredException $e) {
            self::deleteToken();
            $message['response'] = 'Your session has expired! Re login';
            return $message;
        }catch (\FireBase\JWT\SignatureInvalidException $e){
            $message['response'] =  'Verification failed';
            return $message;
        }catch (\UnexpectedValueException $e){
            $message['response'] =  'You must be logged in.';
            return $message;
        }
    }

    private static function deleteToken(){
        if(isset($_COOKIE['__token'])){
            unset($_COOKIE['__token']);
            setcookie("__token", "", time()-3600, '/');
        }
    }

}