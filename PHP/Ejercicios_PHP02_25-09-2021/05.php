<!DOCTYPE html>
<!--
5- Realizar y probar una  función que genere el código HTML de tablas con un borde determinado, incluyendo en cada casilla el mismo texto. 
	function generarHTMLTable($filas, $columnas, $borde,$contenido){
	}
	
¡IMPORTANTE!
Los números para este ejercicio van a ser generados automaticamente con una
función random_intya que en el momento de la realización de este ejercicio
no se habia explicado en clase como introducir números por pantalla.
-->
<html>

	<head>
        <title>Ejercicio 5</title>
        <meta charset="UTF-8">
        <style>
			table{
				border-collapse: collapse;
			}
            td{
                padding: 10px;
            }
        </style>
    </head>

    <body>

		<?php
			$filas = random_int(1, 20);
			$columnas = random_int(1, 20);
			$borde = random_int(0, 10);
			$contenido = "Mazo Texto";

			function generarHTMLTable($f, $c, $b, $ct){
				echo "
					<center>
						<table>
				";
				for($i = 1; $i <= $f; $i++){
					echo "<tr style='border: ".$b."px solid black;'>";
					for($d = 1; $d <= $c; $d++){
						echo "<td style='border: ".$b."px solid black;'>$ct</td>";
					}
					echo "</tr>";
				}
				echo "
						</table>
					</center>
				";
			}

			generarHTMLTable($filas, $columnas, $borde, $contenido);
		?>

    </body>

</html>