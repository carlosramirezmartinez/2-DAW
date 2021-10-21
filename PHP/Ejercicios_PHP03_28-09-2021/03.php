<!DOCTYPE html>
<!---
3. Elegir a azar uno de los cinco medios y  mostrar el enlace seleccionado.
El Medio recomendado es: El MundoToday 
-->
<html lang="en">
<head>
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
    $medios =  [ "El Pais" => "https://www.elpais.com", "El Mundo" => "https://www.elmundo.es", "El Abc" => "https://www.abc.es",
    "Marca" => "https://www.marca.com", "El Mundo Today" => "https://www.elmundotoday.com"];

    $medios_num = array();
    $cont=0;

    foreach($medios as $clave => $web) {
        $medios_num[$cont]=$web;
        $cont++;
     }
    ?>
</body>
</html>