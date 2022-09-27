<?php
/**
 * sudo php -S 127.0.0.1:8081 e em seguida acesse : http://localhost:8081/03.php 
 * */

$path = "original.png";
$encode = base64_encode(file_get_contents($path));

?>
<html>
<head>
</head>
<body>

<h1>Imagem</h1>

<img src="data:image/jpg;charset=utf-8;base64,<?php echo $encode;?>" alt="Legenda">



</body>
</html>




