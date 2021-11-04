<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
        Programa principal, solo chequea si entramos o no
    -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria</title>
</head>
<body>
    

<?php
//Si no hemos hecho nada vamos al inicio
if(!isset($_REQUEST['orden'])){
    include_once './inicio.php';
}else{
    if($_REQUEST['nombre'] !== ""){
        session_start();
            $_SESSION['nombre'] = $_REQUEST['nombre'];
                echo "<h2>Bienvenido/a ". strtoupper($_SESSION['nombre'])."</h2></br>";
            include_once './compra.php';
    }else {
            echo "<h2>No hay ninguna sesión iniciada.</h2>";
            header("Refresh:2; url=inicio.php");
        }
            
    }

?>

</body>
</html>