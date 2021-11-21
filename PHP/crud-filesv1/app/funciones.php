<?php
include_once 'app/config.php';

// Cargo los datos segun el formato de configuración
function cargarDatos(){
    $funcion =__FUNCTION__.TIPO; // cargarDatostxt
    return $funcion();
}

function volcarDatos($valores){
    $funcion =__FUNCTION__.TIPO;
    $funcion($valores);
}

// ----------------------------------------------------
// FICHERO DE TEXT FUNCIONA OK
//Carga los datos de un fichero de texto
function cargarDatostxt(){ //OK

    $tabla=[]; 

    if (!is_readable(FILEUSER) ){
        $fich = @fopen(FILEUSER,"w") or die ("Error al crear el fichero.");
        fclose($fich);
    }
    $fich = @fopen(FILEUSER, 'r') or die("ERROR al abrir el fichero"); // lectura
    //recorrer valores
    while ($linea = fgets($fich)) {
        $partes = explode('|', trim($linea));
        $tabla[]= [ $partes[0],$partes[1],$partes[2],$partes[3]]; //Voy escribiendo
        }
    fclose($fich);
    return $tabla;
}

//Vuelca los datos a un fichero de texto
function volcarDatostxt($tvalores){ //OK

    $fich= @fopen(FILEUSER,"w") or die ("Error al escribir");
    //Recorro valores
    foreach($tvalores as $indice){
        $linea = implode('|', $indice)."\n";
        fwrite($fich,$linea);
    }
    fclose($fich);
}

// ----------------------------------------------------
// FICHERO DE CSV 

function cargarDatoscsv (){ //OK
    $tabla=[];

    if (!is_readable(FILEUSER) ){
        $fich = @fopen(FILEUSER,"w") or die ("Error al crear el fichero.");
        fclose($fich);
    }
    $fich = @fopen(FILEUSER, 'r') or die("ERROR al abrir el fichero"); // leer
    //recorrer valores

    while ($linea = fgetcsv($fich)) {
        $tabla[]= [ $linea[0],$linea[1],$linea[2],$linea[3]]; //Voy escribiendo
    }
    fclose($fich);
    return $tabla;
}


//Vuelca los datos a un fichero de csv
function volcarDatoscsv($tvalores){
    $fich= @fopen(FILEUSER,"w") or die ("Error al escribir");
    //Recorro valores
    foreach($tvalores as $indice){
        fputcsv($fich, $indice);
    }
    fclose($fich);
   
}

// ----------------------------------------------------
// FICHERO DE JSON OK
//@file_put_contents leer contenido de archivo como file ej. file_get_contents(path, include_path, context, start, max_length)
function cargarDatosjson (){
    $tabla=[];
    $datos = @file_get_contents(FILEUSER); 
    $tabla = json_decode($datos, true);   //Pasar de json a string
    return $tabla;
    }
   


function volcarDatosjson($tvalores){ 
    $datos = json_encode($tvalores); //Me lo vuelve a pasar a json
    @file_put_contents(FILEUSER, $datos);
}




// MOSTRA LOS DATOS DE LA TABLA DE ALMACENADA EN AL SESSION 
function mostrarDatos (){
    
    $titulos = [ "Nombre","login","Password","Comentario"];
    $msg = "<table>\n";
     // Identificador de la tabla
    $msg .= "<tr>";
    for ($j=0; $j < CAMPOSVISIBLES; $j++){
        $msg .= "<th>$titulos[$j]</th>";
    }  
    $msg .= "</tr>";
    $auto = $_SERVER['PHP_SELF'];
    $id=0;
    $nusuarios = count($_SESSION['tuser']);
    for($id=0; $id< $nusuarios ; $id++){
        $msg .= "<tr>";
        $datosusuario = $_SESSION['tuser'][$id];
        for ($j=0; $j < CAMPOSVISIBLES; $j++){
            $msg .= "<td>$datosusuario[$j]</td>";
        }
        $msg .="<td><a href=\"#\" onclick=\"confirmarBorrar('$datosusuario[0]',$id);\" >Borrar</a></td>\n";
        $msg .="<td><a href=\"".$auto."?orden=Modificar&id=$id\">Modificar</a></td>\n";
        $msg .="<td><a href=\"".$auto."?orden=Detalles&id=$id\" >Detalles</a></td>\n";
        $msg .="</tr>\n";
        
    }
    $msg .= "</table>";
   
    return $msg;    
}

/*
 *  Funciones para limpiar la entreda de posibles inyecciones
 */


// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada){
  // Sin implementar


}