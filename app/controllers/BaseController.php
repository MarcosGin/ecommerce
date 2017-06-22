<?php

namespace App\Controllers;

use Twig_Loader_Filesystem;

class BaseController {
    protected $templateEngine;
    public function __construct() {
        $loader = new Twig_Loader_Filesystem('../views');
        $this->templateEngine = new \Twig_Environment($loader, [
            'debug' => false,
            'cache' => false
        ]);

        $this->templateEngine->addFilter(new \Twig_SimpleFilter('url', function ($path) {
            return  BASE_URL . $path;
        }));
        $this->templateEngine->addFilter(new \Twig_SimpleFilter('url_image', function ($path) {
            return  BASE_IMAGE . $path;
        }));
    }
    public function render($fileName, $data= []) {
        return $this->templateEngine->render($fileName, $data);
    }
}