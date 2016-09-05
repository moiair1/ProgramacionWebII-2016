<?php
require '../Modelos/Conexion.php';
require '../Modelos/Crud.php';
require '../Controlador/Lista_paises.php';

$l_pais = new Paises(); //realizo conexion con paises

//voy a usar request variable super globar para capturar parametros post y get
if (isset($_REQUEST["id"])) {
    
    $id = htmlspecialchars($_REQUEST["id"]);
    $modelo = new Crud();
   // $modelo->seleccionar = "*";
    //$modelo->donde = "clientes";
    //$modelo->condicion = "id=$id";
    
    
    
    $modelo->seleccionar = 'clientes.id AS id_cliente, clientes.dni AS doc_cliente, clientes.apellido AS ape_cliente, clientes.nombre AS nom_cliente, clientes.fecha_nac AS fecha_nac, paises.nombre as p_nombre, paises.id AS id_pais, clientes.activo AS act_cliente';
    $modelo->donde = 'clientes LEFT JOIN paises ON paises.id = clientes.nacionalidad_id';
    $modelo->condicion = "clientes.id=$id";
    
    
    //uso el metodo leer para traer los datos
    $modelo->Leer();
    //obtengo las filas del los datos
    $filas = $modelo->rows;
    
    foreach ($filas as $fila) {
        //este es para almacer en las siguientes varialbes 
        
        $id_cliente = $fila["id_cliente"];
        $dni = $fila["doc_cliente"];
        $apellido = $fila["ape_cliente"];
        $nombre = $fila["nom_cliente"];
        $fecha_nac = $fila["fecha_nac"];
        
        $nacionalidad_id = $fila["id_pais"];
        $pais_nombre = $fila["p_nombre"];
        
        $activo = $fila["act_cliente"];

        
        
    }
    
    
}

$mensaje = null;

if (isset($_POST["actualizar"])) {
    
    $id_cliente = htmlspecialchars($_POST["id"]);
    $dni = htmlspecialchars($_POST["dni"]);
    $apellido = htmlspecialchars($_POST["apellido"]);
    $nombre = htmlspecialchars($_POST["nombre"]);
    $fecha_nac = htmlspecialchars($_POST["fecha_nac"]);
    
    $nacionalidad_id = htmlspecialchars($_POST["nacionalidad_id"]);
    $activo = htmlspecialchars($_POST["activo"]);

    $modelo = new Crud();
    $modelo->update = "clientes";
    $modelo->set = "dni='$dni', apellido='$apellido', nombre = '$nombre', fecha_nac='$fecha_nac', nacionalidad_id='$nacionalidad_id', activo='$activo'";
    $modelo->condicion= "id = $id_cliente";
    $modelo->actualizar();
    $mensaje = $modelo->mensaje;
    
}



?>