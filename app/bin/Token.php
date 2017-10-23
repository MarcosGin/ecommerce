<?php
/**
 * Created by PhpStorm.
 * User: bocaj
 * Date: 04/07/2017
 * Time: 3:57
 */
namespace App\Bin;

use App\Bin\Database\DB;
use App\Models\User;
use Firebase\JWT\JWT;
class Token
{
    private $user;
    private $key = 'Hsadwqq113';
    private $algo = 'HS256';
    private $exp = 40;
    private $upExp =20;
    public function __construct() {
        $this->user = new User();
    }


    public function newToken(array $data){
        $token = array(
            'aud' => $this->Aud(),
            'iat' => time(),
            'exp' => time() + ($this->exp),
            'data' => $data,
        );
        return  JWT::encode($token, $this->key);
    }
    public function checkToken($token){
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
            $jwt = JWT::decode($token, $this->key, array($this->algo));
            $realTime = $jwt->exp - time();
            if($realTime < $this->upExp){
                $this->user->downSession($token);
                $newData = json_decode(json_encode($jwt->data), true);
                $newJwt = $this->newToken($newData);
                $token = $newJwt;
                $this->user->saveSession($jwt->data->id, $token);
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
            $this->user->downSession($token);
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

    private function Aud()
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