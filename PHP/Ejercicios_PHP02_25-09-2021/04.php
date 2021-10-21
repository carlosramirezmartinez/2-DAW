<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
/**
 * 4. Realizar un programa en php que genere 50 números aleatorios en 1 y 100
 *  y que muestre en una tabla  html el valor máximo, el mínimo y la media 
 * con el siguiente formato: Nota definir los valores 50 y 100 como constantes en PHP (define)
 * 
 * 
 */
define('MINIMO',1);
define('MAXIMO',100);
define('VALORES',50);
$contarnumeros = 0;
$num_min = random_int(1, MAXIMO);
$num_max = 0;
$suma = 0;

	do {
		$num = random_int(MINIMO,MAXIMO);
		$contarnumeros++;

        if($num < $num_min){
            $num_min = $num;
        }elseif($num > $num_max){
            $num_max = $num;
        }
        $suma += $num; 
	} while ($contarnumeros <= VALORES);
    
    
    $media = $suma / VALORES;
    
    echo "Minimo | ". $num_min . "<br>";
    echo "Maximo | ". $num_max . "<br>";
    echo "Media | ". $media . "<br>";
	//echo "Han salido tres 6 seguidos tras generar ".$contarnumeros." numeros en ".$milisegundos." milisegundos.";
?>
</body>
</html>