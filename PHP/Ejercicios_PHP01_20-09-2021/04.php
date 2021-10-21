<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 04 - Genera 666</title>
</head>

<body>
	<h1>Ejercicio 4</h1>
	<code>
<?php
/**4.- Generar números al azar entre 1 y 10 hasta que se generen 3 veces el valor 6 de forma consecutiva
 *  en ese caso se mostrará cuantos número se han generado. 

Han salido tres 6 seguidos tras genera 1343 números en 1.002 milisegundos

Para obtener los segundos utilizamos la función microtime(true)  para obtener la fecha actual en segundos. 
 */


$cont6 = 0;
$contarnumeros = 0;
$tiempo = microtime();
$milisegundos = $tiempo*1000;
// do while 6 tres veces

	do {
		$num = random_int(1,10);
		$contarnumeros++;
		echo " $num <br>";
		if($num == 6){
			$cont6++;
		}
		else{
			$cont6 = 0;
		}
	} while ($cont6 < 3);

	echo "Han salido tres 6 seguidos tras generar ".$contarnumeros." numeros en ".$milisegundos." milisegundos.";
?>
</code>
</body>
</html>