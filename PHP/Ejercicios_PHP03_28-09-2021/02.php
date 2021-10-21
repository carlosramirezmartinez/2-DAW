<!DOCTYPE html>
<!---
2.- Crear un array que almacene 5 cadenas con el nombre de periódicos y sus enlaces para acceder.
 El array será asociativo con el nombre del periódico como clave y su URL como valor.
-->
<html lang="en">
<head>
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
    $medios =  [ "El Pais" => "https://www.elpais.com", "El Mundo" => "https://www.elmundo.es", "El Abc" => "https://www.abc.es",
             "Marca" => "https://www.marca.com", "El Mundo Today" => "https://www.elmundotoday.com"];

             foreach($medios as $clave => $web) {
                echo "<li>  <a href='".$web."'>     ".$clave."  </a></li>";
                //El hipervinculo de la pagina web tiene que ir dentro de la clave, que es la salida al documento
                echo "<br>";
              }


    ?>
</body>
</html>