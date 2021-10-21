<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    
    .texto {
        font-size: 30px;
        
    }   
    .emoji {
        font-size: 100px;
        margin-top: 10px;
    }   
    </style>
</head>
<body>
<h1>¡Piedra, papel y tijera!</h1>

<br>

<p>Actualice la página para mostrar otra partida.</p>

<br>

<?php
/**
 * Hay dos jugares que eligen al azar un valor (Piedra, Papel o Tijera) y según el resultado mostrará el siguiente código HTML: 
 * Utilizar los caracteres gráficos de  UTF-8
 * define ('PIEDRA1',  "&#x1F91C;");
 * define ('PIEDRA2',  "&#x1F91B;");
 * define ('TIJERAS',  "&#x1F596;");
 * define ('PAPEL',    "&#x1F91A;" );
 * Crear una cuenta en codingground y enviar la URL con el proyecto desarrollado.
 * 
 * 
 */

define ('PIEDRA1',  "&#x1F91C;");
define ('PIEDRA2',  "&#x1F91B;");
define ('TIJERAS',  "&#x1F596;");
define ('PAPEL',    "&#x1F91A;" );

$j1 = random_int(1, 3);
$j2 = random_int(1, 3);
$ganador = "";


//CONTENIDO PARA LAS IMAGENES

switch($j1){
    case 1:
        $j1 = (string) PIEDRA1;
        break;
    case 2:
        $j1 = (string) PAPEL; 
        break;
    case 3:
        $j1 = (string) TIJERAS;
        break;
}
switch($j2){
    case 1:
        $j2 = (string) PIEDRA2;
        break;
    case 2:
        $j2 = (string) PAPEL;
        break;
    case 3:
        $j2 = (string) TIJERAS;
        break;
}
?>
<!--    PRUEBAS     -->
<p class="texto">Jugador 1&nbsp;&nbsp;Jugador 2</p>
<p class="emoji"><?php echo $j1; echo $j2;?></p>

<?php
//GANADORES
    if($j1 == $j2){
        $ganador = "Empate";
        ?>
        <p class="texto"><?php echo "<br>". $ganador;?></p> <!--RESULTADO-->
        <?php
    }elseif($j1 == PIEDRA1 && $j2 == PIEDRA2){
        $ganador = "Empate";
        ?>
        <p class="texto"><?php echo "<br>". $ganador;?></p><!--RESULTADO-->
    <?php
    }else{
        if( ($j1 == PIEDRA1 && $j2 == TIJERAS) || ($j1 == PAPEL && $j2 == PIEDRA2) || ($j1 == TIJERAS && $j2 == PAPEL) ){
            $ganador = "Ha ganado el Jugador 1";
            ?>
            <p class="texto"><?php echo "<br>". $ganador;?></p><!--RESULTADO-->
            <?php
        }
        else{
            $ganador = "Ha ganado el Jugador 2";
            ?>
            <p class="texto"><?php echo "<br>". $ganador;?></p><!--RESULTADO-->
            <?php
        }
    }
  

?>
</body>
</html>