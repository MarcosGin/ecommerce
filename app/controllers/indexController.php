<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 18/06/17
 * Time: 13:52
 */

namespace App\Controllers;

class IndexController extends BaseController{

    public function getIndex(){
        return $this->render('index.twig', []);
    }
}