<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria</title>
</head>

<body>
 <form action="compra.php" method="POST">

<select name="frutas">
    <option value="Limón">Limon</option>
    <option value="Naranjas">Naranjas</option>
    <option value="Manzanas">Manzanas</option>
    </select>
    <input type="number" name="cantidad">
    <input type="submit" name="enviar" value="Enviar">
    <input type="button" value=" NUEVO CLIENTE "
       onclick="location.href='<?=$_SERVER['PHP_SELF'];?>'">
    <button><a href="inicio.php">Salir</a></button>


</form>

<?php

if (empty($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}
 
if(isset($_POST['enviar'])){
    //session_start();
    $carrito = $_SESSION['carrito'] = array();
    $fruta = $_POST['frutas'];
    $cantidad = $_POST['cantidad'];

    if($cantidad <= 0){
        echo "Datos erroneos";
    } else {
        array_push($carrito,$fruta, $cantidad);
    }
    
    foreach($carrito as $key => $value){
        echo '<p>'.$value.'</p>';
    
    } 
}      

 ?>
 
</br>

</body>

</html>