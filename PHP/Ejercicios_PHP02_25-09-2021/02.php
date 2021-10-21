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
/** 2. Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10,
 *  mostrar su suma, su resta, su división, su multiplicación, su módulo y su potencia (ciclo for),
 *  Crea un archivo llamado funcionesvar.php donde estén definidas las cinco operaciones:
 *  suma, resta, división, producto, módulo y potencia. 
 * 
 * Incluir ese fichero dentro de fichero principal (require_once) y llamar  a las funciones para obtener el resultado.

 */
require_once("funcionesvar.php");
$num1 = random_int(1,10);
$num2 = random_int(1,10);

echo "Primer Número: $num1 <br> Segundo Número: $num2 <br><br>";

echo "Suma: ". sumar($num1,$num2) ."<br>";
echo "Resta: ". restar($num1,$num2) ."<br>";
echo "Multiplicación: ". multi($num1,$num2) ."<br>";
echo "División: ". divi($num1,$num2) ."<br>";
echo "Modulo: ". modulo($num1,$num2) ."<br>";
echo "Potencia: ". potencia($num1,$num2) ."<br>";

?>
</body>
</html>