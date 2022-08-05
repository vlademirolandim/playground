<?php
require_once("config.php");

$cli = new Cliente();
echo json_encode( $cli->getList() );
$cli->delete(3);
echo $cli->__toString();
