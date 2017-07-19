<?php

namespace App\Controllers;

class ProfileController extends BaseController{

    public function getIndex(){
        return $this->render('profile/index.twig', []);
    }

}