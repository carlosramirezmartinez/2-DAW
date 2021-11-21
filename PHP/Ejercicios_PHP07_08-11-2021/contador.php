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
     * 1. Realizar programa php (contador.php) que muestre cuantas veces se ha accedido a la página en total 
     * y cuantas  veces desde un mismo navegador  trabajando sobre un fichero llamado accesos.txt y 
     * con un valor de cookie válido por tres meses.
     * 
     * 
     */

     define('FICHERO','accesos.txt');

     //COOKIE
        $cookie = 0;
        if (isset($_COOKIE['contador'])){
            $cookie = $_COOKIE['contador'];
        } 
        $cookie++;
        setcookie("contador",$cookie,time()+3600 *24 *30 *3); //3 MESES

        $valor=0;
        if(file_exists(FICHERO)){
            $valor = @file_get_contents(FICHERO); 
            if ( $valor == false ){
            die("Error al abrir el fichero");
            }
        }

        $valor++;

        file_put_contents(FICHERO, $valor);
        echo "Número de accesos Totales = $valor </br>";
        echo "Número de accesos desde un mismo navegador = $cookie </br>";
        

    ?>
</body>
</html>