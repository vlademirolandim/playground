<?php
require_once("config.php");

$cli = new Cliente();

$cli->setNome("Vlademiro");
$cli->setDtNasc("1970-08-26");

$cli->insert();
