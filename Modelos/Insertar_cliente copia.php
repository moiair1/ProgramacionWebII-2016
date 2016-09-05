<?php


class Insertar{
    
   public $mensaje;
   public $dni;
   public $apellido;
   public $nombre;
   public $fecha_nac;
   public $pais;
   public $activo;
   
   //creo mentodo para insetar los datos
   
   public function insert(){
       
       $model = new Conexion();
       $conexion = $model->conectar();
       $sql = "INSERT INTO clientes (dni, apellido, nombre, fecha_nac, nacionalidad_id, activo)";

      // $sql = "INSERT INTO clientes (dni, apellido)";
     
       $sql .="VALUES (:doc,:ape,:nom, :fecha,:pa, :act)";

       
       //$sql .="VALUES (:doc,:ape)";
       
       $consulta = $conexion->prepare($sql); //preparo la consulta
       $consulta->bindParam(':doc', $this->dni); //parametros para bincular con la base de datos 
       $consulta->bindParam(':ape', $this->apellido);
       $consulta->bindParam(':nom', $this->nombre);
       $consulta->bindParam(':fecha', $this->fecha_nac);
       $consulta->bindParam(':pa', $this->pais);
       $consulta->bindParam(':act', $this->activo);

//$db->query("INSERT INTO clientes (dni, apellido, nombre, fecha_nac, nacionalidad_id, activo)
// VALUES ('$doc','$ape','$nom', '$fech','$pais', '$act')");

        if (!$consulta) {
            $this->mensaje = $conexion->errorInfo(); //en caso de no ser conectado
            
        }  else {
            
            $consulta->execute(); // ejecutamos la consulta
            $this->mensaje='Datos guardados con exito';
        }
       
   }
    
}



?>