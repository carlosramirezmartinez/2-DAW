<?php
function usuarioOk($usuario, $contraseña) :bool {
  if(strlen($usuario) >= 8 && $usuario == strrev($contraseña)){ //Si el usuario es 8 o + caracteres y la contraseña es al reves que el usuario
   return true;
  }
  else{
     return false;
  }
}

// Funciones Letra + Repetida y Palabra + repetida
function letrasRepetidas(){
   $texto = $_REQUEST['comentario'];
   $letras = str_split($texto); //Convertir un string en un array
   $muestra = array_count_values($letras); // cuentro valores
   $max = 0;

   foreach ($muestra as $key => $valor){
      if ($max < $valor){
         $max = $valor;
         $maxRepes = $key;
         }
   }

   echo $maxRepes;

}

function palabrasRepetidas(){
   $texto = $_REQUEST['comentario'];
   $palabra = explode(" ", $texto); //Delimito valores si hay un espacio para sacar las palabras
   $muestra = array_count_values($palabra); // cuentro valores
   $max = 0;

   foreach ($muestra as $key => $valor){
      if ($max < $valor){
         $max = $valor;
         $maxRepes = $key;
         }
   }

   echo $maxRepes;



}