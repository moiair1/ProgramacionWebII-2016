<?php


session_start();

if (empty($_SESSION['username'])) {
    
    session_start();
    session_destroy();
    header('location: ../Vistas/login.php');
}

?>








<nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">App Clientes UDC</a>
            
               <ul class="nav navbar-nav navbar-left">
                  <li><a href="listado_clientes.php" class="dropdown-toggle" > Listado</a>


                </li>
                
            </ul>
        </div>

     
    
    
    
 
    
    
    
      <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Bienvenido: <?php echo $_SESSION['username']; ?></a>
                     <ul class="dropdown-menu">
                         
                         
                         <li><a href="javascript:enviar_formulario()"> Cerrar Session</a></li>
                     
                    </ul>
                </li>
                
            </ul>
        </div>
    
    
    
    
    
    </nav>



<?php

if (isset($_POST['cerrar_session'])) {
    
    session_start();
    session_destroy();
    header('location: ../Vistas/login.php');
    
}

?>


<script>
function enviar_formulario(){
   document.formulario.submit();
}
</script>

<form method="POST" action="<?php echo  $_SERVER['PHP_SELF'] ?>" name="formulario" >
    
    <input type="hidden" name="cerrar_session">
    
    <input type="hidden" name="cerrar">
    
    
    
</form>
