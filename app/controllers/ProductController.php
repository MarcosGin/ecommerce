<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Mark;
use App\Models\Product;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\UploadedFile;

class ProductController {

    private $product;
    private $mark;
    private $category;
    public function __construct(){
        $this->product = new Product();
        $this->mark = new Mark();
        $this->category = new Category();
    }

    public function getAll(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $products = $this->product->getAll();
        if($products) {
            return $response->withJson(['status' => true, 'response' => $products, 'jwt' => $jwt]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'The products was not found', 'jwt' => $jwt]);
        }
    }
    public function get(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $product = $this->product->getProduct($args['id']);
        if($product) {
            return $response->withJson(['status' => true, 'response' => $product[0], 'jwt' => $jwt]);
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found', 'jwt' => $jwt]);
        }
    }
    public function search(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $products = $this->product->searchProducts($args['value']);
        if($products){
            return $response->withJson(['status' => true, 'response' => $products, 'jwt' => $jwt]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'Not found products', 'jwt' => $jwt]);
        }
    }
    public function add(Request $request, Response $response, $args) {
        $user = $request->getAttribute('user');
        $jwt = $request->getAttribute('jwt');
        $params = json_decode( $request->getBody(), true);
        $add = $this->product->addProduct($params);
        if($add['result']){
            return $response->withJson(['status' => true, 'response' => ['message' => $add['response']], 'jwt' => $jwt]);
        }else{
            return $response->withJson(['status' => false, 'response' => $add['response'], 'jwt' => $jwt]);
        }
    }
    public function update(Request $request, Response $response, $args) {
        $user = $request->getAttribute('user');
        $jwt = $request->getAttribute('jwt');
        $product = $this->product->getProduct($args['id']);
        if($product) {
            $params = json_decode( $request->getBody(), true);
            $update = $this->product->updateProduct($product[0]['id'],$params);
            if($update['result']){
                $product = $this->product->getProduct($product[0]['id']);
                return $response->withJson(['status' => true, 'response' => ['message' => $update['response'],'data' => $product[0]], 'jwt' => $jwt]);
            }else{
                return $response->withJson(['status' => false, 'response' => $update['response'], 'jwt' => $jwt]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found', 'jwt' => $jwt]);
        }
    }
    public function delete(Request $request, Response $response, $args) {
        $user = $request->getAttribute('user');
        $jwt = $request->getAttribute('jwt');
        $product = $this->product->getProduct($args['id']);
        if($product) {
            $delete = $this->product->deleteProduct($product[0]['id']);
            if($delete['result']){
                return $response->withJson(['status' => true, 'response' => $delete['response'], 'jwt' => $jwt]);
            } else {
                return $response->withJson(['status' => false, 'response' => $delete['response'], 'jwt' => $jwt]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found']);
        }
    }
    public function getImages(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $product = $this->product->getProduct($args['id']);
        if($product) {
            $images = $this->product->getImages($product[0]['folder']);
            if($images) {
                return $response->withJson(['status' => true, 'response' => $images, 'jwt' => $jwt]);
            } else {
                return $response->withJson(['status' => false, 'response' => 'The images was not found', 'jwt' => $jwt]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found', 'jwt' => $jwt]);
        }

    }
    public function addImage(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $product = $this->product->getProduct($args['id']);
        if($product) {
            $files = $request->getUploadedFiles();
            $folder = $product[0]['folder'] ? $product[0]['folder'] : uniqid();
            $this->product->updateFolder($product[0]['id'], $folder);
            $upload = $this->uploadImages($files, $folder);
            if ($upload['result']) {
                $this->deleteFile( ROOT_IMAGES . $folder . '/' . $product[0]['image']['name']);
                $this->product->addImage($folder, $upload['data']['images']);
                return $response->withJson(['status' => true, 'response' => ['message' => 'The image saved successfully', 'data' => $upload['data']], 'jwt' => $jwt]);
            } else {
                return $response->withJson(['status' => false, 'response' => $upload['message'], 'jwt' => $jwt]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found', 'jwt' => $jwt]);
        }
    }
    public function addImages(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $product = $this->product->getProduct($args['id']);
        if($product) {
            $files = $request->getUploadedFiles();
            $folder = $product[0]['folder'] ? $product[0]['folder'] : uniqid();
            $this->product->updateFolder($product[0]['id'], $folder);
            $upload = $this->uploadImages($files, $folder);
            if ($upload['result']) {
                $this->product->addImages($folder, $upload['data']['images']);
                return $response->withJson(['status' => true, 'response' => ['message' => 'The images saved successfully', 'data' => $upload['data']], 'jwt' => $jwt]);
            } else {
                return $response->withJson(['status' => false, 'response' => $upload['message'], 'jwt' => $jwt]);
            }
        } else {
            return $response->withJson(['status' => false, 'response' => 'The product was not found', 'jwt' => $jwt]);
        }
    }
    public function deleteImage(Request $request, Response $response, $args) {
        $jwt = $request->getAttribute('jwt');
        $image = $this->product->getImage($args['name']);
        $product = $this->product->getProduct($args['id']);
        $images = $this->product->getImages($product[0]['folder']);
        if ($image) {
            $delete = $this->product->deleteImage($args['name']);
            $images = $this->product->getImages($product[0]['folder']);
            if ($delete['result']) {
                $this->deleteFile( ROOT_IMAGES . $product[0]['folder'] . '/' . $args['name']);
                return $response->withJson(['status' => true, 'response' => ['message' => $delete['response'], 'data' => $images], 'jwt' => $jwt]);
            }else{
                return $response->withJson(['status' => false, 'response' => ['message' => $delete['response'], 'data' => $images], 'jwt' => $jwt]);
            }
        }else{
            return $response->withJson(['status' => false, 'response' => ['message' => 'The image was not found', 'data' => $images], 'jwt' => $jwt]);
        }
    }
    public function getMark(Request $request, Response $response, $args){
        $jwt = $request->getAttribute('jwt');
        $mark = $this->mark->getMark($args['id']);
        if ($mark) {
            return $response->withJson(['status' => true, 'response' => $mark[0], 'jwt' => $jwt]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'The mark was not found', 'jwt' => $jwt]);
        }
    }
    public function getAllMark(Request $request, Response $response, $args){
        $jwt = $request->getAttribute('jwt');
        $marks = $this->mark->getAll();
        if ($marks) {
            return $response->withJson(['status' => true, 'response' => $marks, 'jwt'  => $jwt]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'The marks was not found', 'jwt' => $jwt]);
        }
    }
    public function getAllCategory(Request $request, Response $response, $args){
        $jwt = $request->getAttribute('jwt');
        $categories = $this->category->getAll();
        if ($categories) {
            return $response->withJson(['status' => true, 'response' => $categories, 'jwt' => $jwt]);
        }else{
            return $response->withJson(['status' => false, 'response' => 'The categories was not found', 'jwt' => $jwt]);
        }
    }


    function uploadImages($files, $folder){
        $result = array('result' => false);
        if(isset($files['uploads']) && is_array($files['uploads'])) {
            $uploads = ['folder' => $folder, 'images' => []];
            foreach ($files['uploads'] as $uploadedFile) {
                if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
                    $filename = $this->moveUploadedFile($folder . '/', $uploadedFile);
                    if ($filename) {
                        $uploads['images'][] = ['name' => $filename, 'url' => 'http://' . $_SERVER['HTTP_HOST'] . '/ecommerce/' . ROOT_IMAGES . $folder . '/' . $filename];
                    }
                }
            }
            $result['result'] = true;
            $result['data'] = $uploads;
        }else{
            $result['message'] = 'No images found for upload';
        }
        return $result;
    }
    function moveUploadedFile($directory, UploadedFile $uploadedFile)
    {
        if($uploadedFile->getClientMediaType() === 'image/jpeg' || $uploadedFile->getClientMediaType() === 'image/png') {
            $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
            $basename = bin2hex(random_bytes(8));
            $filename = sprintf('%s.%0.8s', $basename, $extension);
            if (!file_exists(ROOT_IMAGES . $directory)){mkdir(ROOT_IMAGES . $directory);};
            $uploadedFile->moveTo(ROOT_IMAGES . $directory . DIRECTORY_SEPARATOR . $filename);

            return $filename;
        }else{
            return false;
        }
    }
    function deleteFile($file){
        if (!file_exists($file)){
           return false;
        }else{
            @unlink($file);
            return true;
        }
    }
}