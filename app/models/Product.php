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
        $query = $dbObj->getQuery("SELECT products.id,products.title,
                                                  categories.id AS category_id,categories.name AS category_name,categories.icon AS category_icon,
                                                    marks.id AS mark_id,marks.name AS mark_name,
                                                    products.price,products.stock,products.created_at,products.updated_at FROM products 
                                                       INNER JOIN marks ON products.mark = marks.id 
                                                           INNER JOIN categories ON products.category = categories.id ORDER BY products.id ASC LIMIT 10 ");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        if($data){
            $products = [];
            foreach ($data as $product){
                $products[] = [
                    'id' => $product->id,
                    'title' => $product->title,
                    'mark' => ['id' => $product->mark_id, 'name' => $product->mark_name],
                    'category' =>['id' => $product->category_id, 'name' => $product->category_name, 'icon' => $product->category_icon],
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at
                ];
            }
            return $products;
        }else{
            return $data;
        }
    }
    public function getProduct($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT products.id,products.title,products.description,
                                                  categories.id AS category_id,categories.name AS category_name,categories.icon AS category_icon,
                                                    marks.id AS mark_id,marks.name AS mark_name,
                                                    products.price,products.stock,products.created_at,products.updated_at FROM products 
                                                       INNER JOIN marks ON products.mark = marks.id 
                                                           INNER JOIN categories ON products.category = categories.id WHERE products.id = :id ORDER BY products.id");
        $query->execute(['id'=>$id]);
        $data =$query->fetchAll(\PDO::FETCH_OBJ);
        if ($data) {
            $products = [];
            foreach ($data as $product){
                $products[] = [
                    'id' => $product->id,
                    'title' => $product->title,
                    'description' => $product->description,
                    'mark' => ['id' => $product->mark_id, 'name' => $product->mark_name],
                    'category' =>['id' => $product->category_id, 'name' => $product->category_name, 'icon' => $product->category_icon],
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at
                ];
            }
            return $products;
        }else{
            return $data;
        }
    }
    public function getProductForCategory($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id FROM products WHERE category = :id");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
    public function getProductForMark($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT id FROM products WHERE mark = :id");
        $query->execute([
            'id' => $id,
        ]);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateProduct($id, $data){
        $result = array('result' => false);
        if(isset($data['title']) && isset($data['description']) && isset($data['category'])
            && isset($data['mark']) && isset($data['price']) && isset($data['stock'])){
            $dbObj = DB::getInstance();
            $query = $dbObj->getQuery("UPDATE products SET title = :title, description = :description, category = :category, mark = :mark, price = :price, stock = :stock WHERE id = :id");
            $data = $query->execute([
                'title' => $data['title'],
                'description' => $data['description'],
                'category' => $data['category'],
                'mark' => $data['mark'],
                'price' => $data['price'],
                'stock' => $data['stock'],
                'id' => $id
            ]);
            if ($data) {
                $result['result'] = true;
                $result['response'] = "The product was successfully modified";
            } else {
                $result['response'] = "The product was not successfully modified";
            }
        }else{
            $result['response'] = "You must complete all the fields";
        }
        return $result;

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

    public function getProductForSearch($cat, $marc){
        $result = ['result' => false];
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
        if($data){
            $result['result'] = true;
            $result['response'] = $data;
        }else{
            $result['response'] = "Not found products for this filters.";
        }
        return $result;
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