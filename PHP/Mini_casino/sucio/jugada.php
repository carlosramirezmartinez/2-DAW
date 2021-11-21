<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las Vegas</title>
</head>

<body>
 <form action="jugada.php" method="POST">
 Cantidad a apostar:<input name="cantidad" type="number"> <br>
Tipo de apuesta : 
<input type="radio" name="apuesta" value="PAR" checked='checked'> Par
<input type="radio" name="apuesta" value="IMPAR"> Impar <br>
<button name='apostar' value='apostar'> Apostar cantidad </button>
<button name='dejar' value='dejar'> Abandonar el Casino </button>

</body>

</html>