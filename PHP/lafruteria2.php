<?php

session_start();
if (empty($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}

//SI NO HEMOS HECHO NADA
if (empty($_REQUEST["nombre"])) {
    ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LA FRUTERIA DEL SIGLO XXI</h1>
    <h2>BIENVENIDO A LA NUESTRA FRUTERIA DEL SIGLO XXI</h2>
    <form action="" method="get">
        <p>Introduzca su nombre del cliente: </p> <input type="text" name="nombre">
    </form>
</body>
</html>


  <?php 
//AL ENTRAR
}else{
        $_SESSION["nombre"] = $_REQUEST["nombre"];
      if (empty($_REQUEST["cantidad"])) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <h1>LA FRUTERIA DEL SIGLO XXI</h1>
            <h2>REALICE SU COMPRA <?= strtoupper($_REQUEST["nombre"])?></h2>
            <form action="" method="post">
                <h3>
                    Selecciona la fruta: 
                    <select name="frutas">
                        <option value="platanos">Platanos</option>
                        <option value="naranjas">Naranjas</option>
                        <option value="limones">Limones</option>
                    </select>
                    Cantidad: <input type="number" name="cantidad">
                    <button name="anotar">Anotar</button>
                    <button name="terminar">Terminar</button>
                </h3> 
            </form>
        </body>
        </html>
        <?php
    }else {
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LA FRUTERIA DEL SIGLO XXI</h1>
    <h2>REALICE SU COMPRA <?= strtoupper($_REQUEST["nombre"])?></h2>
    <p>Este es su pedido: 
        <?php
            if (isset($_REQUEST["anotar"])) {
            $carro = $_SESSION["carrito"];
            array_push($carro,$_POST["frutas"] == $_POST["cantidad"]);
            $_SESSION["carrito"] = $carro;
            foreach ($_SESSION["carrito"] as $key => $value) {
                echo '<br>'.$key.$value;
            }
            }
        ?>
    </p>
    <form action="" method="post">
        <h3>
            <select name="frutas">
                <option value="platanos">Platanos</option>
                <option value="naranjas">Naranjas</option>
                <option value="limones">Limones</option>
                <option value="manzana">Manzana</option>
            </select>
            Cantidad: <input type="number" name="cantidad">
            <button type="sumbit" name="anotar">Anotar</button>
            <button type="sumbit" name="terminar">Terminar</button>
        </h3> 
    </form>
</body>
</html>    
<?php
if (isset($_REQUEST["terminar"])) {
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LA FRUTERIA DEL SIGLO XXI</h1>
    <p>Este es su pedido: 
        <?php
            if (isset($_REQUEST["anotar"])) {
            $carro = $_SESSION["carrito"];
            array_push($carro,$_REQUEST["cantidad"]);
            $_SESSION["carrito"] = $carro;
            foreach ($_SESSION["carrito"] as $key => $value) {
                $key = $_REQUEST["frutas"];
                echo '<br>'.$key.$value;
            }
            }
        ?>
    </p>
    <form action="" method="post">
            <input type="button" value="NUEVO CLIENTE">
    </form>
</body>
</html>    
<?php
}
    }
}



