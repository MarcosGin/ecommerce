<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 18/06/17
 * Time: 13:53
 */
namespace App\Models;


use App\Bin\Database\DB;

class Product {
    private $name;
    private $desc;
    private $price;
    private $category_id;
    private $mark_id;
    private $portada;
    private $carpet;
    private $created_at;
    private $updated_at;

    public function getAll(){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT nombre,carpet,portada,precio,offer,offer_number FROM productos");
        $query->execute();
        $data = $query->fetchall(\PDO::FETCH_ASSOC);
        if(!$data){
            throw new \Exception('Not Found Products!.');
        }
        return $data;
    }
    public function getProduct($produc){
        $message = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM productos WHERE nombre =:name OR id=:id LIMIT 1");
        $query->execute([
           'name' =>  $produc,
           'id'   =>  $produc,
        ]);
        $data =$query->fetchAll(\PDO::FETCH_OBJ);
            if($data){
                $message['result'] = true;
                $message['response'] = $data;
               return $message;
            }else{
                $message['response'] = 'Not found product';
                return $message;
            }
    }
    public function getProductLike($name, $json){
        $data = array();
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM productos WHERE nombre  LIKE ? ");
        $query->execute([
            "%$name%",
        ]);
        $products = $query->fetchAll(\PDO::FETCH_OBJ);
        foreach($products as $product){
            $data[] = $product->nombre;
        }
        if($json){
            return json_encode($data);
        }else{
            if(!$products){
                throw new \Exception('Not found products!');
            }
            return $products;
        }
    }

    public function getProductForCategory($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM productos WHERE category_id = :id");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        if(!$data){
            throw new \Exception ("Not Found Products!");
        }
        return $data;
    }
    public function getProductForSearch($cat, $marc){
        $dbObj = DB::getInstance();
        if($marc){
            $query = $dbObj->getQuery("SELECT nombre,carpet,portada,precio,offer,offer_number FROM productos WHERE category_id =:cat AND marca =:marc");
            $query->execute([
               'cat' => $cat,
               'marc' => $marc,
            ]);
        }else{
             $query = $dbObj->getQuery("SELECT nombre,carpet,portada,precio,offer,offer_number FROM productos WHERE category_id = :cat");
             $query->execute([
                'cat' => $cat,
             ]);
        }
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        if(!$data){
            throw new \Exception ("Not found products!");
        }
        return $data;
    }
    public function getImgs($carpet, $type = "max"){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM producimgs WHERE carpet = :carpet AND type =:type");
        $query->execute([
            'carpet' => $carpet,
            'type' => $type,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        if(!$data){
            throw new \Exception('Not founds thes imgs for this product');
        }
        return $data;
    }
    public function getComments($id) {
        $message = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT * FROM product_comment WHERE product_id = :id ORDER BY fecha DESC");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        if($data){
            $message['result'] = true;
            $message['response'] = $data;
        }else{
            $message['response'] = 'This product has not comments';
        }
        return $message;
    }
    public function createComment($product_id, $user_id, $comment, $time) {
        $message = array('result' => false);
        $objUser = new User();
        $user = $objUser->getUserForId($user_id);
        if($comment){
            if(strlen($comment) < 150) {
                if($this->getCommentByUserId($user_id, $product_id) === false) {
                    $dbObj = DB::getInstance();
                    $query = $dbObj->getQuery("INSERT INTO product_comment (product_id,user_id, username, coment, fecha) VALUES(:product_id, :user_id, :username, :coment, :fecha)");
                    $result = $query->execute([
                        'product_id' => $product_id,
                        'user_id' => $user_id,
                        'username' => $user[0]->name . ' ' . $user[0]->lastname,
                        'coment' => $comment,
                        'fecha' => $time,
                    ]);
                    if ($result) {
                        $message['result'] = true;
                        $message['response'] = 'The comment has created successfully';
                        return $message;
                    } else {
                        $message['response'] = 'The comment could not be created, try again';
                        return $message;
                    }
                }else{
                    $message['response'] = 'You can not comment more than once on this comment';
                    return $message;
                }
            }else{
                $message['response'] = 'Your comment is too long, only 150 characters are allowed.';
                return $message;
            }
        }else{
            $message['response'] = 'You need to enter a comment';
            return $message;
        }
    }
    public function getCommentByUserId($user_id, $product_id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id FROM product_comment WHERE user_id = :user_id AND product_id = :product_id");
        $result = $query->execute([
            'user_id' => $user_id,
            'product_id' => $product_id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

            if($data){
                return $data;
            }

        return false;
    }



}