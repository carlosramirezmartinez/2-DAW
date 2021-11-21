<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <title>Forma de pago</title> 
    </head> 
    <body> 
        <!--1. La idea es que el usuario selecciona una tarjeta de crédito como medio de pago y que la aplicación
         la recuerde las siguientes veces que se invoque.  Haremos versiones diferentes pagocookie.php y pagosesion.php
          El primero gestionará la información mediante un cookie y el segundo mediante una sesión. 
          
          Usando pagocookie.php la selección de tarjeta se mantendrá mientras el cookie no se elimine o caduque
          aunque rearranquemos el navegador.

        Usando pagosesion.php la selección de tarjeta se mantendrá mientras no cerremos el navegador o
         mientras no pase un tiempo fijado al crear la sesión.
 
        La primera vez que el usuario invoque cualquiera de los dos programas se mostrará una página web con  siguiente información: 
        -->
        <center> 
        <?php
            // Si hay cambio de tarjeta
            if (isset($_GET['nuevatarjeta'])) {
                $tarjetaactual = $_GET['nuevatarjeta'];
                setcookie("tipotarjeta", $tarjetaactual, time()+ 24 * 3600); // Ponemos una cookie con un dia de duracion
                header("Refresh:1; url=\"".$_SERVER['PHP_SELF']."\"");
                echo "<body></html>";
                exit();
            }
            else {
                if (isset($_COOKIE['tipotarjeta'])){
                    $tarjetaactual= $_COOKIE['tipotarjeta'];
                }
            }
            
            if (isset($tarjetaactual)){
                echo " <H2> SU FORMA DE PAGO ACTUAL ES</H2> </br> ";
                echo " <img src='imagenes/$tarjetaactual.gif' /></a>";
            }
            else {
                echo " <H2> ERROR</H2> </br> ";
                echo "<br><br>";
            }
        ?>
	 <!--<H2> SU FORMA DE PAGO ACTUAL ES</H2> </br> EJEMPLO
         <img src='imagenes/visa1.gif' /></a>   -->
         <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br> 
         <a href='?nuevatarjeta=cashu'><img  src='imagenes/cashu.gif' /></a>&ensp; 
         <a href='?nuevatarjeta=cirrus1'><img  src='imagenes/cirrus1.gif' /></a>&ensp; 
         <a href='?nuevatarjeta=dinersclub'><img  src='imagenes/dinersclub.gif' /></a>&ensp; 
         <a href='?nuevatarjeta=mastercard1'><img  src='imagenes/mastercard1.gif'/></a>&ensp; 
         <a href='?nuevatarjeta=paypal'><img  src='imagenes/paypal.gif' /></a>&ensp; 
         <a href='?nuevatarjeta=visa1'><img  src='imagenes/visa1.gif' /></a>&ensp; 
         <a href='?nuevatarjeta=visa_electron'><img  src='imagenes/visa_electron.gif'/></a>  

        </center> 

    </body> 
</html>