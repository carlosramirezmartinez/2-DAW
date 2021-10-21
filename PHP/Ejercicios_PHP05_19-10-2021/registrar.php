<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
			<h1>Procesando formulario</h1>	
<?php 
$cadena = "abc";
if (empty($_POST['nombre']) ||  empty($_POST['correo']) || empty($_POST['contraseña'] || empty($_POST['contraseña2']) )){
    echo " Error: falta valores introducir los valores de usuario.<br> ";
    echo " <button onclick='window.history.back();'>Volver</button> ";
    
   
}
else {
    echo "Datos introducidos";
    echo "<br><br><br>";
}
// PELIGRO: No controlo la seguridad de las entradas
echo $nombre = $_POST['nombre'];
echo "<br>";
echo $correo = $_POST['correo'];
echo "<br>";
$contraseña   = $_POST['contraseña'];
$contraseña2   = $_POST['contraseña2'];

if ($contraseña !== $contraseña2 ){
    echo " Error: Las Contraseñas no coinciden.<br> ";
    echo " <button onclick='window.history.back();'>Volver</button> ";
} else {
    echo "Contraseña confirmada correctamente <br>";
    if( strlen($contraseña)>= 8 && stripos($contraseña,$cadena) ){
        echo "Y la contraseña es segura. Acceso Correcto";
    }
    else{
        echo " Error: La Contraseña no es segura.<br> ";
        echo " <button onclick='window.history.back();'>Volver</button> ";
    }
}
/*
function compruebaLetra($contraseña){
    $contraseña = substr($contraseña,"abc",1);
    return $contraseña;
}
*/
    
//&& ctype_alpha($contraseña) && ctype_digit($contraseña)
?>