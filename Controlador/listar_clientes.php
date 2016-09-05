<?php

require '../Modelos/Conexion.php';
require '../Modelos/Crud.php';

//realizo la conexion con db
$modelo = new Crud();

$modelo->seleccionar = 'clientes.id AS id, clientes.dni AS doc_cliente, clientes.apellido AS ape_cliente, clientes.nombre AS nom_cliente, TIMESTAMPDIFF(YEAR,clientes.fecha_nac,CURDATE()) AS edad, paises.nombre as p_nombre, clientes.activo AS act_cliente';
$modelo->donde = 'clientes LEFT JOIN paises ON paises.id = clientes.nacionalidad_id';

//ahora acceso al metodo para leer
$modelo->Leer();

$filas = $modelo->rows;
$total = count($filas);



//ELECT clientes.dni AS documento_cliente, clientes.apellido AS apellido_cliente, clientes.nombre AS nombre_cliente, 

//TIMESTAMPDIFF(YEAR,clientes.fecha_nac,CURDATE()) AS Fech_nac_cliente

 //paises.nombre AS nombre_pais , clientes.activo  AS activo_pais FROM clientes LEFT JOIN paises ON paises.id = clientes.nacionalidad_id')->fetchAll(PDO::FETCH_OBJ);



?>