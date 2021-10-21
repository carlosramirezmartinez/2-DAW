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
 * 1. Realizar y probar una función en PHP  llamada elMayor
 *   que reciba tres números: A,B y C. 
 * La función almacenará en C el valor que sea mayor A o B. 
 * En el caso sean iguales almacenará el valor 0 en C 
 * ¿Qué parámetros se deberían pasar por valor o copia y cuales 
 * por referencia?
 */
$c = "";  
$a = random_int(1,9);
$b = random_int(1,9);  	

    	   function elMayor($a, $b, &$c){
    	       if($a > $b){
    	           $c = $a;
    	       }elseif($a < $b){
    	           $c = $b;
    	       }else{
    	           $c = 0;  
    	       }
    	   }
		   
    	   elMayor($a, $b, $c);
           
           echo $a ."<br>";
           echo $b ."<br>";
    	   echo "El mayor es: ". $c .", a no ser que haya empate, que es 0<br>";

?>
</body>
</html>