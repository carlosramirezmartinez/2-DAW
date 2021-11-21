<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las Vegas</title>
</head>
<body>
<h2> Bienvenido al casino </h2>
<form enctype="multipart/form-data" action="" method="post">
<label>Introduzca el dinero con el que va a jugar</label> <input name="dinero" type="number"/> <br />
<input type="submit" name="orden" value="Entrar"> 
</form>
<?php
/*
Desarrollo:
La primera vez que se conecta se crea la sesión y se solicita al usuario cuanto dinero va tener disponible para apostar.
Después el usuario puede realizar todas las apuestas que quiera hasta que se quede sin dinero o decida retirase.
En cada apuesta se mostrará el dinero que tiene disponible. 

La apuesta consistirá en introducir una cantidad que siempre tiene que set inferior al dinero que tiene disponible. 
Luego puede seleccionar dos opciones PAR o IMPAR. El ordenador generará un número aleatorio que servirá como resultado de la apuesta. 
Si el usuario ha acertado su dinero disponible se incrementará en el valor de la apuesta. 
En caso contrario se reducida en la misma cantidad.

Cada vez que se cree una nueva sesión se mostrará el valor de un cookie que guarda durante un mes
 las visitas que ha realizado a nuestro casino online.

*/
define ('1',  "IMPAR");
define ('2',  "PAR");

$apuesta = random_int(1, 2);


?>
</body>
</html>