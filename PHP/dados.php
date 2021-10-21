<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5 Dados</title>
</head>
<body>
    

<?php
/**
 * 
 *
 * El juego simula la partida entre dos jugadores el rojo y el azul, cada jugador realiza una tirada de 6 datos, 
 * ganando el jugador que más puntos tiene, eliminado la puntuación de dos datos: 
 * un dado con el valor más alto y otro dado con el valor más bajo.
 * Ver el siguiente ejemplo de ejecución.
 * Cinco dados
 * Actualice la página para mostrar una nueva tirada.
 * Jugador 1	⚁⚅⚀⚅⚁  10 puntos 
 * Jugador 2	⚄⚀⚀⚁⚃  7 puntos
 * Resultado	Ha Ganado el Jugador 1
 *
 */

define ('DADOS',5);
$tcharDados = [ 1=> "&#9856;", 2=>"&#9857;",
                3=> "&#9858;", 4=>"&#9859;",
                5=>"&#9860;",  6=>"&#9861;"];

/* Funciones */
//Tirar dados, calcular puntos quitar maximo y minimo, Generar ganador

//Tirar un dado
function tirarDados($dados) {
    $resu = []; //Array vacio para rrellenar
    for ($i = 0; $i < $dados; $i++){
        $resu[]= random_int(1, 6);
    }
    return $resu;
}


//Puntos de los dados, los dados se imprimen aqui con los dados tirados
function generarImagenes ($dados){
    $mensaje ="";
    global $tcharDados;
    foreach ($dados as $valor ){
        $mensaje .= $tcharDados[$valor];
    }
    return $mensaje;
}

//Sumar puntos
function calculaPuntos($dados){
    $suma = 0;
    foreach ($dados as $valor ){
        $suma += $valor; //recorro todos los valores y los acumulo
    }
    $suma = $suma - max($dados)- min($dados); //quitamos maximo y minimo
    return $suma;
}

//Ganador
function generarMensaje ($puntos1,$puntos2) {
    $mensaje = "";
    if ($puntos1 == $puntos2){
        $mensaje = "<b>Resultado</b> Empate";
    } else if ($puntos1 > $puntos2){
        $mensaje = "<b>Resultado</b> Ha Ganado el Jugador 1";
    } else if ($puntos1 < $puntos2){
        $mensaje = "<b>Resultado</b> Ha Ganado el Jugador 2";
    }
    return $mensaje;
}

/* Main */
$dadosJugador1 = tirarDados(DADOS);
$dadosJugador2 = tirarDados(DADOS);
$puntosJugador1 = calculaPuntos($dadosJugador1);
$puntosJugador2 = calculaPuntos($dadosJugador2);
$Ganador = generarMensaje($puntosJugador1,$puntosJugador2);

//J1
echo "<b>Jugador 1</b> ".generarImagenes($dadosJugador1)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$puntosJugador1." Puntos <br>";

//J2
echo "<b>Jugador 2</b> ".generarImagenes($dadosJugador2)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$puntosJugador2." Puntos <br>";

//RESULTADO
echo $Ganador;
?>

</body>
</html>