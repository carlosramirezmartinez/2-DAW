<?php
    //Iniciar la sesión
    session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Palabra Oculta PHP</title>
    </head>

    <body>

        <?php
            //Establecer variables
            $letra = "a";
            $palabra = elegirPalabra();
            $fallos = 0;
            $resu = generaPalabraconHuecos ( $cadenaletras, $cadenapalabra);

            $_SESSION['palabrasecreta'] = $palabra;
            $_SESSION['letrasusuario'] = "";
            $_SESSION['fallos'] = 0;
            
            if (! isset($_SESSION['palabrasecreta'])) {
                $_SESSION['palabrasecreta'] = elegirPalabra();
                $_SESSION['palabrausuario'] = ""; // Inicialmente no tiene ninguna letra  
                $_SESSION['fallos'] = 0; // Inicialmente no hay ningún fallo
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);

                return $data;
            }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <div>
                <p>PALABRA: <?php echo $resu;?></p>
                <p>Has cometido <?php echo $fallos;?> fallos</p>
                <p>Introduzca una letra: <input type="text" name="letra" maxlength="1" pattern="[a-z]{1}"> <input type="submit" class="input" value="Enviar"></p>
            </div>
            <a href="palabraoculta.php"><b>Otra partida</b></a>
        </form>

        <?php

            echo $letra;

            //Contador de fallos
            if (strpos($palabra, $letra) !== false) {
                $fallos = $fallos + 1;
            }

            //FUNCIONES

            function elegirPalabra(){
                static $tpalabras = ["Madrid","Sevilla","Murcia","Málaga","Mallorca","Menorca"];
                // COMPLETAR
                $aleatorio = rand(0, 5);
               return $tpalabras[$aleatorio]; // Devuelve una palabra al azar    
            }
            
            function comprobarLetra($letra,$cadena){
                for ($i = 0; $i<strlen($resu); $i++){

                    if($letra == $palabra){

                        $posicionletra = strpos($palabra, $letra);

                        for ($i = 0; $i<strlen($resu); $i++){

                            if($i == $posicionletra){

                                $resu[$i] = $letra;

                            } else{

                                $resu[$i] = '-';

                            }
                        }
                    }
                }

                return $resu;
            }
            
            
            /*
             * Devuelve una cadena donde aparecen las letras de la cadenapalabra en su posición    si cada letra se encuentra en la cadenaletras
             *
             * Ej  generaPalabraconHuecos("aeiou"     ,"hola pepe") -->"-o-a--e-e"
             *     generaPalabraconHuecos("abcdefghi ","hola pepe") -->"h--a -e-e"
             *
             */
            
            function generaPalabraconHuecos ( $cadenaletras, $cadenapalabra) {
                
                // Genero una cadena resultado inicialmente con todas las posiciones con -
                $resu = $cadenapalabra;
                $guion = "-";
                for ($i = 0; $i<strlen($resu); $i++){
                    $resu[$i] = '-';
                }
                // COMPLETAR rellenado la cadena resu
                
                return $resu;
            }            

        ?>

    </body>

</html>