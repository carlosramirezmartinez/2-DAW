<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
    <!-- Carlos Ramirez 2ºDAW -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <?php
    /*
El script debe ser capaz de mantener el estado del juego mediante el manejo sesiones para ello habrá que utilizar
 las siguientes variables de sesión:

$_SESSION['palabrasecreta'] → Palabra secreta a adivinar Ej- MADRID
$_SESSION['letrasusuario']  → Letras que ha adivinado el usuario
$_SESSION['fallos']         → Número de fallos cometidos
*/

define('MAXFALLOS', 5); //Maximo de fallos en el ahorcado


$ganadas = 0;

//creo la COOKIE, y la actualizo al final
// Introduzco la cookie para las partidas ganadas

if ( isset($_COOKIE['ganadas'])){
    $ganadas = $_COOKIE['ganadas'];
}

//PARTIDA
if (! isset($_SESSION['palabrasecreta'])) {
    $_SESSION['palabrasecreta'] = elegirPalabra();
    $_SESSION['letrasusuario'] = ""; // Inicialmente no tiene ninguna letra  
    $_SESSION['fallos'] = 0; // Inicialmente no hay ningún fallo
    
    if ( $ganadas > 0 ){
        echo " Has ganado $ganadas partidas.<br>";
    }
}

//Introduzco caracteres y cuento los fallos
if (isset($_REQUEST['letra'])) {
    $letra = $_REQUEST['letra'];
    if (comprobarLetra($letra, $_SESSION['palabrasecreta']) == false) {
        $_SESSION['fallos'] ++;
        if ($_SESSION['fallos'] >= MAXFALLOS) {
            echo " Perdiste <br> ";
            session_destroy();
            echo "<a href=\"".$_SERVER['PHP_SELF']."\"> Otra partida </a>";
            exit();
        }
    } else {
        // Anoto la letra 
        $_SESSION['letrasusuario'] .= $letra;
    }
}


//FUNCIONES
function elegirPalabra(){
    static $tpalabras = ["Madrid","Sevilla","Murcia","Málaga","Mallorca","Menorca"];
   // COMPLETAR
   $aleatorio = mt_rand(0,5);
   return $tpalabras[$aleatorio]; // Devuelve una palabra aleatoria
}

function comprobarLetra($letra,$cadena){ //booleano
    // COMPLETAR
    for($i = 0; $i<strlen($cadena); $i++){
    if($letra == $_SESSION['palabrasecreta']){
        $posicion = strpos($cadena, $letra);
        for ($i = 0; $i<strlen($cadena); $i++){
            if($i == $posicion){
                $posicion[$i] = $letra;
            } else{
                $posicion[$i] = '-';
            }
    }
    return true; // Devuelve true o false si la letra esta en la cadena  
        }
    }
}

function generaPalabraconHuecos ( $cadenaletras, $cadenapalabra) {
    
    // Genero una cadena resultado inicialmente con todas las posiciones con -
    $resu = $cadenapalabra;
    for ($i = 0; $i<strlen($resu); $i++){
        $resu[$i] = '-';
    }
    return $resu;
}

    //COOKIES set
    $solucion = generaPalabraconHuecos($_SESSION['letrasusuario'], $_SESSION['palabrasecreta']);
    if ($solucion == $_SESSION['palabrasecreta']) {
        // Actualizo el cookie
    setcookie("ganadas",$ganadas, time() + 2 * 7 * 24 * 3600); //2 semanas
    session_destroy();
    exit();
    } 
    ?>

    <!--Forulario partida-->
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <h2>Ahorcado - Carlos Ramirez 2ºDAW</h2>
    <p>PALABRA: <?php echo $_SESSION['palabrasecreta']?></p>
    <p>Has cometido <?php echo $_SESSION['fallos'];?> fallos</p>
    <p>Introduzca una letra: <input type="text" name="letra" maxlength="1" size ="1" pattern="[a-z]"> </p>
    </form>
</body>
</html>