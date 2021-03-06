<?php

namespace App\Models;


use App\Bin\Database\DB;

class Product {


    public function getAll($order='ASC', $limit = 0){
        $limit  = $limit ? 'LIMIT ' . $limit : '';

        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT products.id,products.title,
                                                  categories.id AS category_id,categories.name AS category_name,categories.icon AS category_icon,
                                                    marks.id AS mark_id,marks.name AS mark_name,
                                                    products.price,products.stock,products.created_at,products.updated_at FROM products 
                                                       INNER JOIN marks ON products.mark = marks.id 
                                                           INNER JOIN categories ON products.category = categories.id ORDER BY products.id " .$order. " ". $limit ." ");
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
                    'created_at' => ['date' => $product->created_at, 'timestamp' => round(strtotime($product->created_at) * 1000)],
                    'updated_at' => ['date' => $product->updated_at, 'timestamp' =>  round(strtotime($product->updated_at) * 1000)]
                ];
            }
            return $products;
        }else{
            return $data;
        }
    }
    public function getProduct($id){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT products.id,products.title,products.description,products.image,products.folder,
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
                $image = $product->image ? 'http://' . $_SERVER['HTTP_HOST'] . '/ecommerce/' . ROOT_IMAGES . $product->folder . '/' . $product->image : null;
                $products[] = [
                    'id' => $product->id,
                    'title' => $product->title,
                    'description' => $product->description,
                    'mark' => ['id' => $product->mark_id, 'name' => $product->mark_name],
                    'category' =>['id' => $product->category_id, 'name' => $product->category_name, 'icon' => $product->category_icon],
                    'price' => $product->price,
                    'folder' => $product->folder,
                    'image' => ['name' => $product->image, 'url' => $image],
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
    public function getImages($folder) {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery(" SELECT * FROM products_imgs WHERE folder = :folder");
        $query->execute(['folder'=>$folder]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        if($data){
            $images = [];
            foreach ($data as $image){
                $images[] = [
                    'name' => $image->title,
                    'url' => 'http://' . $_SERVER['HTTP_HOST'] . '/ecommerce/' . ROOT_IMAGES . $image->folder . '/' . $image->title
                ];
            }
            return $images;
        }else{
            return $data;
        }

    }
    public function getImage($name){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery(" SELECT * FROM products_imgs WHERE title = :title");
        $query->execute(['title'=>$name]);
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        if($data){
            $images = [];
            foreach ($data as $image){
                $images[] = [
                    'name' => $image->title,
                    'url' => 'http://' . $_SERVER['HTTP_HOST'] . '/ecommerce/' . ROOT_IMAGES . $image->folder . '/' . $image->title
                ];
            }
            return $images;
        }else{
            return $data;
        }

    }
    public function searchProducts($value)
    {
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("SELECT products.id,products.title,
                                                  categories.id AS category_id,categories.name AS category_name,categories.icon AS category_icon,
                                                    marks.id AS mark_id,marks.name AS mark_name,
                                                    products.price,products.stock,products.created_at,products.updated_at FROM products 
                                                       INNER JOIN marks ON products.mark = marks.id 
                                                           INNER JOIN categories ON products.category = categories.id WHERE UPPER(products.title) LIKE UPPER(:title) ORDER BY products.id ASC");
        $query->execute([
            'title' => '%'.$value.'%'
        ]);
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
    public function addProduct($data){
        $result = array('result' => false);
        if(isset($data['title']) && isset($data['description']) && isset($data['category'])
            && isset($data['mark']) && isset($data['price']) && isset($data['stock'])){
            $dbObj = DB::getInstance();
            $query = $dbObj->getQuery("INSERT INTO products (title,description,category,mark,price,stock,created_at) VALUES(:title,:description,:category,:mark,:price,:stock,:created_at)");
            $data = $query->execute([
                'title' => $data['title'],
                'description' => $data['description'],
                'category' => $data['category'],
                'mark' => $data['mark'],
                'price' => $data['price'],
                'stock' => $data['stock'],
                'created_at' => date("Y-m-d H:i:s")
            ]);
            if ($data) {
                $result['result'] = true;
                $result['response'] = "The product was successfully add";
            } else {
                $result['response'] = "The product was not successfully add";
            }
        } else{
            $result['response'] = "You must complete all the fields";
        }
        return $result;
    }
    public function addImages($folder, $images){
        $dbObj = DB::getInstance();
        foreach ($images as $image){
            $query = $dbObj->getQuery("INSERT INTO products_imgs (folder,title,sizes) VALUES(:folder,:title,:sizes)");
            $query->execute([
                'folder' => $folder,
                'title' => $image['name'],
                'sizes' => 'normal'
            ]);
        }
        return true;
    }
    public function addImage($folder, $images){
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("UPDATE products SET image = :image WHERE folder = :folder");
        $query->execute([
            'folder' => $folder,
            'image' => $images[0]['name']
        ]);

        return true;
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
    public function updateFolder($id, $folder) {
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("UPDATE products SET folder = :folder WHERE id = :id");
        $data = $query->execute([
            'folder' => $folder,
            'id' => $id
        ]);
        if ($data) {
            $result['result'] = true;
            $result['response'] = 'The product folder updated successfully';
        }else{
            $result['response'] = 'The product folder was not updated correctly';
        }
        return $result;
    }
    public function deleteProduct($id){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("DELETE FROM products WHERE id = :id");
        $data = $query->execute([
            'id' => $id
        ]);
        if ($data) {
            $result['result'] = true;
            $result['response'] = "The product was successfully delete";
        } else {
            $result['response'] = "The product was not successfully delete";
        }
        return $result;
    }
    public function deleteImage($name){
        $result = array('result' => false);
        $dbObj = DB::getInstance();
        $query = $dbObj->getQuery("DELETE FROM products_imgs WHERE title = :title");
        $data = $query->execute([
            'title' => $name
        ]);
        if ($data) {
            $result['result'] = true;
            $result['response'] = "The image was successfully delete";
        } else {
            $result['response'] = "The image was not successfully delete";
        }
        return $result;
    }
}