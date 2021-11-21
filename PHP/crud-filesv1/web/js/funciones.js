/**
 * Funciones auxiliares de javascripts 
 */
function confirmarBorrar(nombre, id) {
    if (confirm("¿Quieres eliminar el usuario:  " + nombre + "?")) {
        document.location.href = "?orden=Borrar&id=" + id;
    }
}

//Funcion terminar
function confirmarTerminar(nombre, id) {
    if (confirm("¿Quieres terminar:  " + nombre + "?")) {
        document.location.href = "?orden=Terminar&id=" + id;
    }
}