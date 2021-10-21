<?php
/**
 * 6.- Generar la  tabla de multiplicar de un número elegido al azar entre 1 y 10 con la siguiente apariencia 
 */
$num = random_int(1,10);
for ($i = 1; $i < 11; $i++) {
    echo "$num x $i = ".$num*$i . "<br>";
}

?>