<?php

class Conexion
{
    private $conect;

    public function __construct()
    {
        $connectionString = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        try {
            $this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Se ha conectado a la dB";

        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function conect(){
        return $this->conect;
    }
    
}
