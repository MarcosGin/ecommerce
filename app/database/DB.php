<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 19/06/17
 * Time: 10:50
 */
namespace App\Database;

require_once 'config.php';

class DB {
    private static $Db;
    private $ObjPDO;

    private function __construct(){
        try {
            $this->ObjPDO = new \PDO(getenv('DB_TYPE').':host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME').';charset='.getenv('DB_CHARSET'), getenv('DB_USER'), getenv('DB_PASS'), array(\PDO::ATTR_EMULATE_PREPARES => false,\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            $this->ObjPDO->exec("SET CHARACTER SET ".getenv('DB_CHARSET'));
        }
        catch (\PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    public static function getInstance(){
        if (!isset(self::$Db)) {
            self::$Db = new Db();
        }
        return self::$Db;
    }

    public function __clone(){
        throw new \Exception("Cannot clone object");
    }

    public function __wakeup(){
        throw new \Exception("Cannot unserialize singleton");
    }

    public function getQuery($sql){
        return $this->ObjPDO->prepare($sql);
    }

    public function getLastInsertedId(){
        return $this->ObjPDO->lastInsertId();
    }
}