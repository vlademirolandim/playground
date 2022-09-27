<?php

$path = "original.png";
$encode = base64_encode(file_get_contents($path));

echo $encode;



