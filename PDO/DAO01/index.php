<?php
require_once("config.php");

/**
 * Inicializando a classe e fazendo os testes
 */
$usu = new Sql();
$usu->query( "INSERT INTO clientes ( NOME ) VALUES ( :NOME )", [ "NOME" => "Dantasy" ] );
var_dump( $usu->select( "select * from clientes") );