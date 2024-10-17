<?php

class conectaDB {
    
    private $hostDB = "localhost";
    private $usuarioDB = "root";
    private $senhaDB = "SQLadmin1234";
    private $bancoDB = "etecvestibulinho";
    
    public function conecta(){
        $conn = new mysqli($this->hostDB, $this->usuarioDB, $this->senhaDB, $this->bancoDB);
        return $conn;
    }
}