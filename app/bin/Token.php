<?php
/**
 * Created by PhpStorm.
 * User: bocaj
 * Date: 04/07/2017
 * Time: 3:57
 */
namespace App\Bin;

use App\Bin\Database\DB;
use Firebase\JWT\JWT;
class Token
{
    public static $key = 'Hsadwqq113';
    public static $algo = 'HS256';
    public static function newToken(array $data , $expired){
        $token = array(
            'aud' => self::Aud(),
            'iat' => time(),
            'exp' => time() + ($expired),
            'data' => $data,
        );
        return  JWT::encode($token, self::$key);
    }
    public static function checkToken($token){
        $message = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('SELECT * FROM users_sessions WHERE jwt =:jwt AND activate = 1');
        $query->execute([
            'jwt' => $token,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        if(!$token){
            $message['response'] = 'Token empty!.';
            return $message;
        }
        try{
            $jwt = JWT::decode($token, self::$key, array(self::$algo));
            $realTime = $jwt->exp - time();
            if($realTime < 1800){
                $newData = json_decode(json_encode($jwt->data), true);
                $newJwt = self::newToken($newData, 7200);
                $token = $newJwt;
            }
            if($data){
                $message['result'] = true;
                $message['jwt'] = $jwt->data;
                $message['token'] = $token;
                return $message;
            }else{
                $message['response'] = 'You must log in again.';
                return $message;
            }
        }catch (\FireBase\JWT\ExpiredException $e) {
            $message['response'] = 'Your session has expired! Re login.';
            return $message;
        }catch (\FireBase\JWT\SignatureInvalidException $e){
            $message['response'] =  'Verification failed.';
            return $message;
        }catch (\UnexpectedValueException $e){
            $message['response'] =  'You must be logged in.';
            return $message;
        }
    }
    private static function Aud()
    {
        $aud = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }
        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();
        return sha1($aud);
    }
}