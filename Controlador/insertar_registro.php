<?php

require '../Modelos/Conexion.php';
require '../Modelos/Crud.php';
require 'Lista_paises.php';


//voy a capturar cuando el formulario es enviado
    $l_pais = new Paises();  //realizo la conexion con la clase pais
	$mensaje = null;


if(isset($_POST['insertar'])){
  //  $model = new Insertar();  //realizo la conexion con el modelo la clase insertar
    
    $doc = $_POST['dni'];                     //llamo al modelo para insertar los atributos
    $apellido = htmlspecialchars($_POST['apellido']);
    $nombre = htmlspecialchars($_POST['nombre']);
    $fecha_nac = htmlspecialchars($_POST['fecha_nac']);
    $pais = htmlspecialchars($_POST['nacionalidad_id']);
    $activo = \htmlentities($_POST['activo']);
    
    
    //aca lo puedo controloar los campos 
    //if (!is_numeric($dni)) {
      //  $mensaje = "EL documento debe ser numero";
   // }  else {
        
    //}
    
    
        $model = new Crud();
        $model->insertInto = 'clientes';
        $model->insertColumns = 'dni, apellido, nombre, fecha_nac, nacionalidad_id, activo';
        $model->insertValues = "'$doc', '$apellido', '$nombre', '$fecha_nac', '$pais', '$activo'";
        
        $model->Create();
        $mensaje = $model->mensaje;
                
    

}


?>
