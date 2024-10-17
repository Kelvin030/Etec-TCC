<?php

class conectaDB {
    
    //  excute o script SQL (../SQL/createDatabase.sql) que é esta no repositorio, caso já tenha excutado o mesmo, sugiro dar um drop na tabela e executar novamente o script SQL

    private $hostDB = "localhost"; // Alterar com seu host
    private $usuarioDB = "root"; // Alterar com seu Usuario do banco
    private $senhaDB = "SQLadmin1234"; // Alterar com sua Senha do banco
    private $bancoDB = "etecvestibulinho"; // Manter nome do banco
    
    public function conecta(){
        $conn = new mysqli($this->hostDB, $this->usuarioDB, $this->senhaDB, $this->bancoDB);
        return $conn;
    }
}