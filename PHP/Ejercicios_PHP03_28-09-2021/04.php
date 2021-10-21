<!DOCTYPE html>
<!---
4. Crear una carpeta que se llame img y copiar en ella 5 ficheros de imágenes que muestre el logo de un deporte. 
Crear una array asociativo que almacene como clave el nombre del deporte y como valor la dirección de la imagen.
Mostrar una tabla HTML donde con el siguiente formato:

Deporte
Logo
 Karate



 Tenis


-->
<html lang="en">
<head>
    <title>Ejercicio 4</title>
    <style> 


</style>
</head>
<body>
    <?php
    
    $deportes =  [ "Furbo" => "img/furbo.png", "Furbo Sala" => "img/furbo.png", "Basket" => "img/baloncesto.png" ,
                   "Baloncesto" => "img/baloncesto.png", "Furbo 7" => "img/furbo.png"];

             foreach($deportes as $clave => $url) {
                echo "<li>  <a href='".$url."'>     ".$clave."  </a></li>";
                //El hipervinculo de la pagina url tiene que ir dentro de la clave, que es la salida al documento
                echo "<br>";
              }


    ?>
</body>
</html>