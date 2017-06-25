<?php

namespace App\Controllers;

use App\Models\User;
use Sirius\Validation\Validator;

class AuthController extends BaseController {
    private $user;
    public function __construct(){
        parent::__construct();
        $this->user = new User();
    }


    public function anyLogin(){
        $error = false;
        if($_POST){
            if(!empty($_POST['email']) && !empty($_POST['password'])){
            $user = $this->user->getUser($_POST['email']);
                if($user && password_verify($_POST['password'], $user[0]->password)){
                    $_SESSION['email'] = $user[0]->email;
                    header("Location: " . BASE_URL . "index");
                }else{
                    $error = "Your email address and / or your password is incorrect";
                }
            }else{
                $error = "You must complete all the fields";
            }
        }
             return $this->render("account/login.twig", ["errors" => $error]);

    }


    public function anyRegister(){
        $errors = [];
        $result = false;
        if($_POST){
            $validator = new Validator();

            $validator->add(array(
                'newName:nombre' => 'required()(El campo del {label} es requerido) | fullname()(El campo del {label} es invalido) | maxlength(50)(El campo del {label} permite como maximo {max} caracteres)',
                'newLastName:apellido' => 'required()(El campo del {label} es requerido) | maxlength(30)(El campo del {label} permite como maximo {max} caracteres)',
                'newPass:contraseña' => 'required()(El campo de la {label} es requerido) | minlength(10)(El campo de la {label} permite como minimo {min} caracteres)',
                'newEmail:correo electrónico' => 'required()(El campo del {label} es requerido) | email()(El campo del {label} es invalido)',
                'newGender:género' => 'required()(El campo del {label} es requerido)',
                'newDNI:documento' => 'required()(El campo {label} es requerido) | integer()(El campo del {label} permite solo numeros) | minlength(8)(El campo del {label} es invalido) | maxlength(8)(El campo del {label} es invalido) ',
                'newPhone:celular' => 'required()(El campo {label} es requerido) |  integer()(El campo del {label} permite solo numeros) | minlength(10)(El campo del {label} es invalido) | maxlength(10)(El campo del {label} es invalido) ',
            ));

            if($validator->validate($_POST)){
                   $user = $this->user->insertUser(
                       $_POST['newName'],
                       $_POST['newLastName'],
                       password_hash($_POST['newPass'], PASSWORD_DEFAULT),
                       $_POST['newEmail'],
                       $_POST['newGender'],
                       $_POST['newDNI'],
                       $_POST['newPhone'],
                       0,
                       10000,
                       $_POST['newDay'].'/'.$_POST['newMonth'].'/'.$_POST['newYear'],
                       "none.jpg",
                       0);
                        $result = true;
            }else{
                    $errors = $validator->getMessages();
            }
        }
        return $this->render("account/register.twig", ['errors' => $errors, 'result' => $result]);
    }
    public function getLogout(){
        session_destroy();
        unset($_SESSION['email']);
        header("Location: " . BASE_URL . "index");
    }


}