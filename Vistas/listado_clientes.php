<?php 
require("../Controlador/listar_clientes.php"); 





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Listado de clientes</title>


    
    
    
    
 <?php
    require './header.php';
    
 ?>





    

    
    
    
    
  </head>
<body>
   <!--<h1>Hello, world!</h1>--> 

    
    <div class="container">
    
      <div class="jumbotron"><h1>Listado de Clientes </h1></div>
      
      <div>
          <div align="center">	<a href="insertar_cliente.php" class="btn btn-primary" > Nuevo Cliente</a>
          	<p>
            </div>
	        	
               <?php if ($filas != ''): ?> 

          <div> <strong> El total de Filas es .. <?php echo $total ?></strong> 
          </div>
    	<table class="table table-striped">
        	
            
            	<tr class="danger">
                  
        			<td> <b>DOCUMENTO</b></td><td><b> APELLIDO</b></td><td> <b>NOMBRE</b></td><td> <b>EDAD</b></td><td><b> PAIS</b></td><td><b><center>     ACTIVO</center></b></td> 	<td> </td> 	<td> </td> 	
       			
                </tr>
    
                         
        
                         
       	 <?php 
     
         
         foreach($filas as $cliente):?>
			<tr>
                                <?php  $cliente['id'] ?> 
                            	<td><?php echo $cliente['doc_cliente'] ?></td>       
                                <td><?php echo $cliente['ape_cliente'] ?></td>       
				<td><?php echo $cliente['nom_cliente'] ?></td>		        
				<td><?php echo $cliente['edad'] ?></td>
                <td><?php echo $cliente['p_nombre'] ?></td>
                
                <td>
            			<?php
				
					if($cliente['act_cliente'] ==1){
						echo "<center><img src='../Recursos/img/activo.png' width='25' height='25'><center>";
			
					}else{
						
						echo "<center><img src='../Recursos/img/desactivo.png' width='25' height='25'><center>";
			
						}
				 
				 ?></td>
                
                <td>  
                    
                    

                    
            <div align="right"  >
                
              
                <a href="actualizar_cliente.php?id=<?php echo $cliente['id'] ?>" class="btn btn-info" > <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span>  Editar  </a>
                <a href="eliminar_cliente.php?id=<?php  echo $cliente['id'] ?>" onclick="return confirm('Deseas Eliminar este Registro?');" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>  Eliminar  </a> 
                
                   

            </div>

            

                  
                    
             
       
                   
                    
               
                </td>
                
                  <!--<td> 
                     
                     <div align="center">	<a href="eliminar_cliente.php?id=<?php  echo $cliente['id'] ?>" class="btn btn-danger" > <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>  Eliminar  </a> </div>
                     
                </td>-->

	
            </tr>
        
         <?php endforeach;?>
            <?php else: ?>
            
            <h3>No hay Datos para Mostrar</h3>
            
            
           <?php endif; ?> 
            
        </table>  
        
        </div>
  </div>
   
     
  
<?php

                          require './footer.php';

?>
   
  
   

 <script type="text/javascript">
<!--
function confirmation() {
    var answer = confirm("Deseas eliminar este registro?")
    if (answer){
        // code for deleting record
        
    
        }
    else{
        // do nothing
    }
}
//-->
</script>  



   
   
</body>
</html>