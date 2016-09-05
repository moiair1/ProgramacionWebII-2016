<?php

require '../Modelos/Conexion.php';
require '../Modelos/Crud.php';
$mensaje=null;

if (isset($_POST["eliminar"])) {
    
    $id = htmlspecialchars($_POST["id"]);
    
    if (!is_numeric($id)) {
        
        header("location: listado_clientes.php");
    }  else {
        
        //ahora lo creo la isntancia
        $modelo = new Crud();
        $modelo->deleteFrom = "clientes";
        $modelo->condicion = "id = $id";
        $modelo->Eliminar();
        //capturo el mensaje
        
        $mensaje=$modelo->mensaje;
        
        
    }
    
}



?>