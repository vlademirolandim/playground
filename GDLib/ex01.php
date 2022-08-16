<?php
header("Content-type: image/png");

$image = imagecreate(256,256);

// A primeira cor que eu crio vira a cor de fundo
$black = imagecolorallocate( $image, 0, 0 , 0 );

// Agora o vermelho (rgb), o r apenas
$red = imagecolorallocate( $image , 255 , 0 , 0 );

                /* Tamanho da fonte = 5
                         Coordenadas x,y -> 60,120 */
imagestring( $image, 5 , 60, 120, "Hello World" , $red );

imagepng( $image );

imagedestroy( $image );


