<!DOCTYPE html>
<!--
    1. Rellenar un array con 20 números aleatorios entre 1 y 10 y mostrar el contenido del array  
    mediante una tabla de una fila en HMTL. Mostrar a continuación el valor máximo, el mínimo y el  
    valor que mas veces se repite. (Nota definir funciones para cada caso) 
-->
<html lang="en">
	<head>
		<title>Ejercicio 1</title>
	</head>
	<body>
	<?php
    //FUNCIONES
		  function max_num(&$array){
		      rsort($array);
		      $resultado = $array[0];
		      return "-Valor máximo: $resultado <br>";
		  }
		  function min_num(&$array){
		      sort($array);
		      $resultado = $array[0];
		      return "-Valor mínimo: $resultado <br>";
		  }
		  
          //FUNCION mas repes???


		  $array_num = array();
		  
		 
		  for($i = 0; $i < 20; $i++){
		      $array_num[$i] = random_int(1, 10);
		      echo " | ".$array_num[$i]." | ";
		  }
          
          echo "<br><br>";
          echo max_num($array_num);
          echo min_num($array_num);
          
		?>
    </body>
</html>