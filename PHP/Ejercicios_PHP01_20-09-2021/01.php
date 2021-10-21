
<?php
/**1.- Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10 y mostrar su suma, 
 su resta, su división, su multiplicación, módulo y potencia (ciclo for)

1º Número : 5  
2º Número : 2
 
5+3  = 7
5-2  = 3
5*2  = 10
5/ 2 = 2.5
5%2  = 1
5**2 = 25

Nota_para obtener un número entero aleatoria existe la función  random_int(min,max)

 *  
*/

$num1 = random_int(1,10);
$num2 = random_int(1,10);

echo "1ºNumero: ";
echo $num1;
echo "<br><br>";
echo "2ºNumero: ";
echo $num2;
echo "<br><br>";

echo "$num1"." + $num2 = ";
echo $num1 + $num2; 
echo "<br><br>";

echo "$num1"." - $num2 = ";
echo $num1 - $num2; 
echo "<br><br>";

echo "$num1"." * $num2 = ";
echo $num1 * $num2; 
echo "<br><br>";

echo "$num1"." % $num2 = ";
echo $num1 % $num2; 
echo "<br><br>";

echo "$num1"." ** $num2 = ";
echo $num1 ** $num2; 
echo "<br><br>";

?>