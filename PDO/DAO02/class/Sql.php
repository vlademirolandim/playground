<?php
class Sql{
    private $conn;

    public function __construct(){
        $this->conn=new PDO('sqlite::memory:'); // __DIR__ . DIRECTORY_SEPARATOR .  'clientes.sqlite');
        $this->criaDados();
    }


    public function query($sql, $params=[]) {
        $stmt = $this->conn->prepare($sql);
        foreach ($params as $key => $value){
            $stmt->bindParam( $key, $value );
        }
        $stmt->execute();
        return $stmt;
    }

    public function select( $sql, $params=[] ){
        $stmt=$this->query($sql,$params );
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    public function criaDados(){
    
        $sql="CREATE TABLE IF NOT EXISTS clientes (
            ID_CLIENTE INTEGER PRIMARY KEY AUTOINCREMENT,
            NOME VARCHAR(255) NOT NULL ),
            DTNASC DATE
            ); ";
    
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $stmt=$this->conn->prepare("insert into clientes ( nome , dtnasc ) values ( 'Diniz' , '1960-09-10' );");
        $stmt->execute();

    
    }
    
}

