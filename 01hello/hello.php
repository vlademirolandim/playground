<?php
function test( $hello = "Vlad" ) {
    return "Olá, $hello\n";
}

echo test("Mundo");
echo test();