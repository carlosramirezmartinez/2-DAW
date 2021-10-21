
<?php
/**
 * 3-   Obtener un número al azar entre 1 y 9 y generar una pirámide con ese número de peldaños.
* Utilizar la marca <code></code> para que la visualización no se deforme por el tamaño de los espacio
 o una estilo con tipo de letra monospace.
*Número generado 5

    *
   ***
  *****
 *******
*********
 *  
*/

$num = random_int(1,9);

echo "Numero generado : ".$num;
echo "<br><br><br>";
$cadena=null;
for ($i = 1; $i <= $num; $i++) {
    for ($j = $i; $j <= $i; $j++) {
        $cadena .= " * ";
    }
    echo $cadena."<br />";
}


?>