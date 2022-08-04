<?php
require_once("config.php");

/**
 * Como o método é static então não precisa instanciar a classe
 */
var_dump( Cliente::getList() ); 
