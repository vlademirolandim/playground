<?php

$path = "original.png";
$encode = base64_encode(file_get_contents($path));

$decode = base64_decode( $encode );


$handle = fopen("copia.png", 'w');
fwrite($handle, $decode);
fclose($handle);




