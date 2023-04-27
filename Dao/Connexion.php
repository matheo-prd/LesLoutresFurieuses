<?php

class Connexion
{
 private  PDO $connexion;

 public function __construct() {
     $user = "covoit2024";
     $pass = 'covoit24';
     $pdo_options["PDO::MYSQL_ATTR_INIT_COMMAND"]="SET NAMES 'UTF-8'";
     $this->connexion = new PDO('mysql:host=localhost;dbname=covoit2024;'
                                     , $user, $pass, $pdo_options);
     $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 }

    /**
     * @return PDO
     */
    public function getConnexion(): PDO
    {
        return $this->connexion;
    }
}