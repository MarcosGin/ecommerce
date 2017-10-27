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
    private $exp = 7889250;
    private $upExp = 2629750;
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
        try{
            $jwt = JWT::decode($token, $this->key, array($this->algo));
            if($data){
                if($jwt->aud === $this->Aud()){
                    $realTime = $jwt->exp - time();
                    if($realTime < $this->upExp){
                        $this->user->downSession($token);
                        $token = $this->newToken(json_decode(json_encode($jwt->data), true));
                        $this->user->saveSession($jwt->data->id, $token);
                    }
                    $message['result'] = true;
                    $message['jwt'] = $jwt->data;
                    $message['token'] = $token;
                    return $message;
                }else{
                    $this->user->downSession($token);
                    $message['response'] = 'Verification failed.';
                    return $message;
                }
            }else{
                $message['response'] = 'Your session has expired! Re login.';
                return $message;
            }
        }catch (\FireBase\JWT\ExpiredException $e) {
            $this->user->downSession($token);
            $message['response'] =  'Your session has expired! Re login.';
            return $message;
        }catch (\FireBase\JWT\SignatureInvalidException $e){
            $message['response'] =  'Verification failed.';
            return $message;
        }catch (\UnexpectedValueException $e){
            $message['response'] =  'Verification failed.';
            return $message;
        }catch (\DomainException $e){
            $message['response'] =  'Verification failed.';
            return $message;
        }
    }

    public function Aud()
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
    public function checkAud($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery('SELECT * FROM users_sessions WHERE user_id = :user AND activate = 1 AND aud = :aud ');
        $query->execute([
            'user' => $id,
            'aud' => $this->Aud()
        ]);
        $sessions = $query->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($sessions as $session){
                $jwt = JWT::decode($session['jwt'], $this->key, array($this->algo));
                $this->user->downSession($session['jwt']);
        }
    }
}