<?php
require_once("config.php");

/**
 * Inicializando a classe e fazendo os testes
 */
$cli = new Cliente();
$cli->loadById(1);
echo $cli->__toString();