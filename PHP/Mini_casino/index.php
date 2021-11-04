<!DOCTYPE html>
<html lang="es"> 
<!--
    EL MINICASINO.
    Objetivo: Construir una aplicación que implemente el funcionamiento de un  casino online básico.
    Desarrollo:
    La primera vez que se conecta se crea la sesión y se solicita al usuario cuanto dinero va tener 
    disponible para apostar. Después el usuario puede realizar todas las apuestas que quiera hasta 
    que se quede sin dinero o decida retirase.  En cada apuesta se mostrará el dinero que tiene 
    disponible.
    La apuesta consistirá en introducir una cantidad que siempre tiene que set inferior al dinero que 
    tiene disponible. Luego puede seleccionar dos opciones PAR o IMPAR. El ordenador generará un número 
    aleatorio que servirá como resultado de la apuesta. Si el usuario ha acertado su dinero disponible 
    se incrementará en el valor de la apuesta. En caso contrario se reducida en la misma cantidad.
    Cada vez que se cree una nueva sesión se mostrará el valor de un cookie que guarda durante un mes 
    las visitas que ha realizado a nuestro casino online.
-->
<head>
    <meta charset="utf-8">
    <title>MiniCasino en PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head> 

<body>

    <h1>BIENVENIDO AL CASINO</h1>

    <?php
       

        //Inicio de sesión
        session_start();

        //Variables de sesión
        $_SESSION["ganancias"] = 0;

        //Establecer cookies y contador de visitas hechas por el usuario mediante cookies
        if ( isset( $_COOKIE["visitas"] ) ) {   //Cookies visitas
            setcookie("visitas", $_COOKIE["visitas"] + 1, time() + 86400 * 30);
        } else {
            setcookie("visitas", 1, time() + 86400 * 30);
        }

        //Activar los botones 1
        if(isset($_POST["introducir"])){
            setcookie("dinero", $_POST["dinero"], time() + 86400 * 30); //Cookies dinero
        }

        if(@$_COOKIE["visitas"] == 1) {
            echo    //Formulario 1
                    "<form action=\"index.php\" method=\"post\">
                        <p>Esta es su ".$_COOKIE["visitas"]."º visita</p>
                        <p>Introduzca el dinero con el que va a jugar: <input type=\"number\" name=\"dinero\"></p>
                        <p><input type=\"submit\" value=\"Introducir Cantidad\" name=\"introducir\"></p>
                    </form>";
        } else {
            echo    //Formulario 2
                    "<form action=\"index.php\" method=\"post\">
                        <p>Dispone de ".@$_COOKIE['dinero']." para jugar.</p>
                        <p>Cantidad a apostar: <input type=\"number\" name=\"cantidadaapostar\"></p>
                        <p>
                            Tipo de apuesta:
                            <input type=\"radio\" name=\"apuesta\" value=\"par\" <?php if (isset(\$apuesta) && \$apuesta==\"par\") echo \"checked\";?>Par
                            <input type=\"radio\" name=\"apuesta\" value=\"impar\"<?php if (isset(\$apuesta) && \$apuesta==\"impar\") echo \"checked\";?>Impar
                        </p>
                        <p>
                            <input type=\"submit\" value=\"Apostar Cantidad\" name=\"apostar\">
                            <input type=\"submit\" value=\"Abandonar Casino\" name=\"abandonar\">
                        </p>
                    </form>";
        }

        //Activar los botones 2
        if(@$_POST["abandonar"]) {
            abandonar();
        } elseif(@$_POST["apostar"]) {
            dinerosuficiente();
        }

        function abandonar(){
            echo "<p>Muchas gracias por jugar con nosotros.</p>";
            echo "Su resultado final es de ".$_SESSION["ganancias"];

            //Destruye las cookies y la sesión
            setcookie("dinero", 0, time() - 3600);
            setcookie("visitas", 0, time() - 3600);
            session_destroy();
        }

        function dinerosuficiente(){    //Comprobar si el dinero apostado es inferior o igual a l apostado y redirigir a la funcion del juego
            if($_POST["cantidadaapostar"] < $_COOKIE['dinero']){
                echo "<p style=\"color:red;\">No dispone de fichas suficientes</p>";
            } else {
                casino();
            }
        }

        function casino() { //Juego aleatorio
            //Variables aleatorias del sistema de juego
            $num = rand(0,1);
            $ganador = null;

            //Establecer par e impar del random a la variable $ganador
            if($num == 0){
                $ganador = "par";
            } else {
                $ganador = "impar";
            }

            //Mensaje final de ganador o perdedor junto con las ganancias o perdidas
            if($_POST["apuesta"] == $ganador) {
                $_SESSION["ganancias"] = $_SESSION["ganancias"] + $_POST["cantidadaapostar"];
                setcookie('dinero', $_COOKIE['dinero'] + $_POST["cantidadaapostar"], time() + 3600 * 24);
                echo "<p style=\"color:green;\">¡Has ganado ".$_POST["cantidadaapostar"]."!</p>";
            } else {
                $_SESSION["ganancias"] = $_SESSION["ganancias"] - $_POST["cantidadaapostar"];
                setcookie('dinero', $_COOKIE['dinero'] - $_POST["cantidadaapostar"], time() + 3600 * 24);
                echo "<p style=\"color:red;\">¡Has perdido ".$_POST["cantidadaapostar"]."!</p>";
            }
        }
    ?>

</body>

</html>