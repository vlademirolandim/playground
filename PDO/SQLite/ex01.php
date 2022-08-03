<?php

$conn = new PDO('sqlite:clientes.sqlite');
$sql="CREATE TABLE IF NOT EXISTS clientes (
        ID_CLIENTE INTEGER PRIMARY KEY AUTOINCREMENT,
        NOME VARCHAR(255) NOT NULL );
    ";

$stmt=$conn->prepare($sql);
$stmt->execute();

$sql="INSERT INTO clientes ( NOME ) VALUES ( ? )";
$stmt=$conn->prepare($sql);
$stmt->execute( array('ROBERVAL TAYLOR') );

$sql="select * from clientes";
$stmt=$conn->prepare($sql);
$stmt->execute();
$dados=$stmt->fetchAll( PDO::FETCH_ASSOC);
var_dump($dados);

