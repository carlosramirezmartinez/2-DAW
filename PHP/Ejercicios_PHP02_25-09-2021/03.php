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
/**3. Hacer una nueva versión  del ejercicio anterior pero creando un nuevo fichero de funciones (funcionesref.php)
 *  donde cada función tenga tres parámetros los dos primeros por valor y el último por referencia.
 *  Añadir al principio dentro del programa principal (03.php) la instrucción include_once(“funcionesref.php”)
 *  para hacer referencia al las funciones definidas 

 */
require_once("funcionesref.php");
$num1 = random_int(1,10);
$num2 = random_int(1,10);

echo "Primer Número: $num1 <br> Segundo Número: $num2 <br><br>";

echo "Suma: ". sumar($num1,$num2,$resu) ."<br>";
echo "Resta: ". restar($num1,$num2,$resu) ."<br>";
echo "Multiplicación: ". multi($num1,$num2,$resu) ."<br>";
echo "División: ". divi($num1,$num2,$resu) ."<br>";
echo "Modulo: ". modulo($num1,$num2,$resu) ."<br>";
echo "Potencia: ". potencia($num1,$num2,$resu) ."<br>";

?>
</body>
</html>