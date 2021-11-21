<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La fruteria</title>
</head>
<body>
    <h1>La fruteria del siglo XXI</h1>
    <h3>BIENVENIDO A NUESTRA FRUTERIA DEL SIGLO XXI</h3>
    <form action="#" method="POST">
        <?php
        if(!isset($usuario)){
            session_start();
            /*echo '<label> Introduzca un usuario </label> <input type="text" name="nombre" pattern="[a-zA-Z0-9]+" required>';
            echo '<input type="submit" value="Enviar">';*/
            $usuario="";
            $_SESSION["usuario"]= $usuario;
        } else {

        }



        ?>
    </form>
</body>
</html>