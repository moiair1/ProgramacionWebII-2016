<?php 
require '../Controlador/eliminar_clientes.php';

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Eliminar el Registro</title>


    <script>

    window.onload=function(){

                // Una vez cargada la página, el formulario se enviara automáticamente.

		document.forms["defaultForm"].submit();

             document.location.href ="listado_clientes.php";
    

    }

    </script>




</head>

<body>
    
    <h1> Eliminar Registro</h1>
    <br> 
        <strong><?php  echo $mensaje; ?> </strong>

    <br> 
    
    <strong> Realmente Deseas Eliminar <?php  echo htmlspecialchars($_GET["id"]) ?> </strong>
    <br>
    <br>
    <?php if (isset($_GET["id"])): ?>
    
       <form id="defaultForm" method="post" action="<?php $_SERVER['PHP_SELF']?>" class="form-horizontal">
                  
           
           <input type="hidden" name="eliminar" >
           <input type="hidden" name="id" value=" <?php echo htmlspecialchars($_GET["id"]) ?>">
           <input onload="enviar()" type="submit" value="Eliminar" >
           
           
       </form>
    
    <?php endif ?>
    
</body>
</html>
