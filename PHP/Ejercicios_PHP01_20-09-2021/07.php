<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
/**
 * 7. Elegir tres valores entre 100 y 500 y pintar tres barras de color rojo, verde y azul del tamaño indicado.
 * Pista: Utilizar  3 tablas con una fila del tamaño generado.
 * 
 * 
 */

$red = random_int(100,500);
$green = random_int(100,500);
$blue = random_int(100,500);
?>
<table style="background-color:red">
<tr>
    <td  width="<?php echo $red ?>px" height="40px"> &nbsp; Rojo(<?=$red?>)</td>
</tr>
</table>
<table style="background-color:green">
<tr>
    <td  width="<?php echo $green ?>px" height="40px"> &nbsp;Verde(<?=$green?>) </td>
</tr>
</table>	
<table style="background-color:blue">
<tr>
    <td  width="<?php echo $blue ?>px" height="40px"> &nbsp;Azul(<?=$blue?>) </td>
</tr>
</table>

</body>
</html>