<?php

$image=imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate( $image, 0,0,0 );
 
// Toda vez que repete os números é uma variação de cinza
$gray=imagecolorallocate( $image, 100,100,100);

imagestring( $image, 5 , 450, 150, "Certificado", $titleColor );
imagestring( $image, 5 , 440, 350, "Vlademiro Landim Junior", $titleColor );
imagestring( $image, 5 , 450, 370, utf8_decode("Concluído em ") . date("d/m/Y"), $titleColor );


header("Content-type: image/jpeg");
imagejpeg($image);
imagedestroy($image);
