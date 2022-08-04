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
            NOME VARCHAR(255) NOT NULL ,
            DTNASC TEXT
            ); ";
    
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        

        // Note que para um script único vc usa somente o objeto conn
        $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $sql = "insert into clientes ( nome , dtnasc ) values ( 'Diniz' , '1960-09-10' );";
        $sql .= "insert into clientes ( nome , dtnasc ) values ( 'Amarildo' , '1961-09-10' );";
        $sql .= "insert into clientes ( nome , dtnasc ) values ( 'Abilio' , '1962-09-10' );";
        $sql .= "insert into clientes ( nome , dtnasc ) values ( 'Kelly' , '1963-09-10' );";
        $this->conn->exec( $sql );


    
    }
    
}

