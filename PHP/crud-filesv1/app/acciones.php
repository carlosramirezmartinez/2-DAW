<?php


//OK
function accionDetalles($id){
    $usuario = $_SESSION['tuser'][$id];
    $nombre  = $usuario[0];
    $login   = $usuario[1];
    $clave   = $usuario[2];
    $comentario=$usuario[3];
    $orden = "Detalles";
    include_once "layout/formulario.php";
    exit();
}

//OK
function accionAlta(){
    $nombre  = "";
    $login   = "";
    $clave   = "";
    $comentario = "";
    $orden= "Nuevo";
    
    include_once "layout/formulario.php";
    exit();
}

//OK
function accionBorrar($id){
    //Quita al usuario
    unset($_SESSION['tuser'][$id]);
    //Los vuelve a organizar menos al borrado que se seleccionó
    $_SESSION['tuser'] = array_values(($_SESSION['tuser']));

}

//OK falta postmodificar
function accionModificar($id){
    $usuario = $_SESSION['tuser'][$id];
    $nombre  = $usuario[0];
    $login   = $usuario[1];
    $clave   = $usuario[2];
    $comentario=$usuario[3];
    $orden = "Modificar";
    include_once "layout/formulario.php";
}

//OK
function accionTerminar(){
    volcarDatos($_SESSION['tuser']);
    session_destroy();
}

//OK, ver no repes login
function accionPostAlta(){
 
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    //$_SESSION['tuser'] = array_values(array_unique( ($_SESSION['tuser']) ));
    $nuevo = implode(',',array_unique(explode(',', $_POST['login'])));
    $nuevo = [ $_POST['nombre'],$_POST['login'],$_POST['clave'],$_POST['comentario']];
    $_SESSION['tuser'][]= $nuevo;  
    

    
}

// ERROR, alta pero no modifica
function accionPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    /*foreach($usuario as $indice){
        if($login = $usuario[1]){

        }
    }
        
    */
    
}
