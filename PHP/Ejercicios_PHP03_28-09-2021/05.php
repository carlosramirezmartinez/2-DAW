<!DOCTYPE html>
<!--
5.  Realizar un programa en PHP que muestre un posible resultado de la bonoloto: 
Se presentarán 6 números obtenidos aleatoriamente en el rango de 1 a 49 (ambos inclusives)
 Los 5 primeros forman la jugada ganadora y deberán presentar ordenados de menor a mayor en una tabla html;
  el sexto es el número complementario.  Por supuesto los números no pueden repetirse.
3
8
23
34
45
Complementario  15

-->
<html lang="en">
	<head>
		<title>Ejercicio 5</title>
	</head>
	<body>
	<?php
   
         
		  $array_num = array();
		  sort($array_num);
		 
		  for($i = 0; $i < 6; $i++){
		      echo " | ".$array_num[$i]." | ";
			  
			  }
		  
          
          echo "<br><br>";

          
		?>
    </body>
</html>