<?php

namespace App\Bin\Mail;

class Mail extends \PHPMailer{
    public function __construct(){
        $this->isSMTP();
        $this->Host = getenv("MAIL_HOST");
        $this->SMTPAuth = true;
        $this->Username = getenv("MAIL_USER");
        $this->Password = getenv("MAIL_PASS");
        $this->SMTPSecure = getenv("MAIL_SECURE");
        $this->Port = getenv("MAIL_PORT");
    }

    public function sedMailForRegister($address, $url){
        $this->setFrom('mundotecnologia@gmail.com', 'Mundotecnologia');
        $this->addAddress($address);


        $this->isHTML(true);

        $this->Subject = 'Verifica tu cuenta de MundoTecnologia.';
        $this->Body    = 'Bienvenido a mundotecnología para finalizar tu registro debes acceder a este enlace para activar tu cuenta: <br>
                          <a href="'.$url.'">Enlace</a>
            ';
        $this->AltBody = '?';

        $send = $this->send();

        return $send;

    }

}