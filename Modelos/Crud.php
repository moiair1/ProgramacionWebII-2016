<?php

class Crud{
        
    //--insertar registros
    
        public $insertInto;
        public $insertColumns;
        public $insertValues;
        public $mensaje; //para comprobar si exite error
        
        
        //--------agrego para seleccionar en el listado
        
        
        public $seleccionar;
        public $donde;
        public $condicion;
        public $rows;
        
        //---------para actualizar---- pongo en ingles update y set para identificar
        
        
        public $update;
        public $set;
        
        //parametros para eliminar
        
        public $deleteFrom;
        
        
        
        public function Create(){
        
            $modeloConexion = new Conexion();
            $conexion = $modeloConexion->conectar();
            
            $insertInto = $this->insertInto;
            $insertColumns = $this->insertColumns;
            $insertValues = $this->insertValues;
            
            $sql = "INSERT INTO $insertInto ($insertColumns) VALUES ($insertValues)";
            
            $consulta = $conexion->prepare($sql);  //lo preparo
            
            if (!$consulta) {
                
                $this->mensaje = "Error en Insertar Registro";
            }  else {
            
                $consulta->execute();
                $this->mensaje="Registro Creado Correctamente";
            }
            
            
            
        }
       
        
        public function  Leer(){
            
            //establezco la conexion
            
            $modeloConexion = new Conexion();
            //uso el metedo conectar 
            $conexion = $modeloConexion->conectar();
            
            //hasta aca estaria conectado
            
            //ahora lo realizo operaciones
            $select = $this->seleccionar;
            $from = $this->donde;
            $condicion = $this->condicion;
            
            if ($condicion!='') {
                
                $condicion = " WHERE " . $condicion;
            }
            
          //HAGO LA CONSULTA 
            $sql = "SELECT $select FROM $from $condicion";
            //PREPARO LA CONSULTA
            
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            //todas las filas afetadas voy a guardar en la variable rows
            
            while ($filas = $consulta->fetch()){
                $this->rows[] = $filas; //que sera arreglo asociativo
            }
            
            
        }
        
        
        
        
        public function actualizar(){
            
            //lo primero establezco la conexio
            
            $modelo = new Conexion();                //creo un instacia a la clase conexion 
            $conexion= $modelo->conectar();         //utiliando su metodo conectar
            
            //-----------------
            $update = $this->update;                //creo esta variable para ir guardando de cada uno de las propiedades
            $set    = $this->set;
            //-----incluyo la propiedad de condicion 
            $condicion= $this->condicion;
            
            //ahora lo verifico si condicion tiene algun valor
            
            if ($condicion!='') {
                
                $condicion = " WHERE " . $condicion;
            }
           
            
            //aca lo hago el sql
            
            $sql = "UPDATE $update SET $set $condicion";
            
             //ahora lo preparo el la consulta
            $consulta = $conexion->prepare($sql);
            //compruebo si existio algun error
            
            if (!$consulta) {
                
                $this->mensaje = " Ocurrio un ERROR al actualizar el Registro";
            }  else {
            //de lo contrario ejecuto la consulta
                $consulta->execute();
                $this->mensaje ="Se Actualizaron los Registros con Exito..";
            }
      
        }
        
        
        public function Eliminar(){
            
            //primero lo establesco la conexion 
            
            $modelo = new Conexion();
            $conexion = $modelo->conectar();
            
            $deleteFrom = $this->deleteFrom;
            $condicion = $this->condicion;
            
            if ($condicion!='') {
                
                $condicion=" WHERE ".$condicion;
            }
            
            //lo preparo la consulta
            
            $sql = "DELETE FROM $deleteFrom $condicion";
            
            $consulta = $conexion->prepare($sql);
            
            if (!$consulta) {
                $this->mensaje=" Error al eliminar el Registro.. ";
            }  else {
                $consulta->execute();
                $this->mensaje =" Se Efectuo la Eliminacion del Registro..";
            }
                
            
        }
            
        
            }

?>
