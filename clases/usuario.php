<?php

class usuario{
    private $conbd;
    private $tabla = "usuarios";

    public function__construct($db){
        $this->conbd = $db;
    }

    public function registrar ($nom, $email, $contra){
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        sql = "insert into" . $this->tabla . " (nom, email, contra) VALUES (:nom, :email, :contra)";
           
    }
}



?>