
<?php


class Paises{
    
 
   
   public function list_pais(){
       
       $model = new Conexion();
       $conexion = $model->conectar();
 
       $pais = $conexion->query('SELECT *FROM paises')->fetchAll(PDO::FETCH_OBJ);

       
       return $pais;
       
   }
    
}



?>