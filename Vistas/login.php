<?php

require '../Modelos/Conexion_user.php';
require '../Modelos/Crud.php';

$mensaje=null;    

if (isset($_POST["login"])) {
    
     $modelo = new Crud();
    
    $user = htmlspecialchars($_POST["username"]);
   // $email= htmlspecialchars($_POST["username"]);
    $passwd = htmlspecialchars($_POST["password"]); 
     
    $modelo->seleccionar = '*';
    $modelo->donde = 'usuario'; 
    $modelo->condicion  = "usuario='$user' AND password='$passwd'";

    $mensaje =' valor vacio';
        $modelo->ConectarUser();
        $filas = $modelo->rows;
       $mensaje=$modelo->mensaje;

       
  }
  

  if (isset($_POST["login"])) {

      if ($filas>0) {   
            
          session_start();
          $_SESSION['username'] =$user;
          header('location: listado_clientes.php');
      }elseif ($user=='' || $passwd=='') {
          
       //$mensaje="usuario o contraseña incorrecta";
         header('location: login.php');          
        }else{
         //   $mensaje='error en base de datos';
                    header('location: login.php');
        }  
}

  
?>






<!DOCTYPE html>
<html lang="en">
<head>
	
 <?php
    require '../Requerimientos/header.php';
    
 ?>

    
    
    
</head>
<body>
    <!--Barra de Navegacion-->
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <center> <p>usuario=admin , password =123</p></center>
                    <div class="panel-heading">Iniciar Sesion</div>
                    <div class="panel-body">                                                     
                       
                       <div class="alert alert-danger text-center" style="display:none;" id="error">
                            <p>Usuario o Password no identificados</p>
                        </div>                   

                        <form id="formulario" method="POST" action="<?php  $_SERVER['PHP_SELF']?>" role="form">

                            <div class="form-group">
                                <label for="email">Username:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control"  name="username" id="email" placeholder="usuario">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                            </div>       
                            <input type="hidden" name="login">
                            <button  type="submit" class="btn btn-primary"   onclick='confirmar();'  > <span class="glyphicon glyphicon-lock"></span> Entrar</button>   
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Datos de Usuario</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                </div>
                <form class="form-horizontal" id="formCliente">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres :</label>
                    <div class="col-xs-5">
                      <input id="nombres" name="nombres" type="text" class="form-control" placeholder="Ingrese sus Nombres">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos :</label>
                    <div class="col-xs-5">
                      <input id="apellidos" name="apellidos"  type="text" class="form-control" placeholder="Ingrese sus Apellidos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Email:</label>
                    <div class="col-xs-5">
                        <input id="email2" name="email2" type="email" class="form-control" placeholder="Ingrese su Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass" name="pass" type="password" class="form-control" placeholder="Ingrese su Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass2" name="pass2" type="password" class="form-control" placeholder="Ingrese su Email">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
       
	<script src="../Resources/js/jquery-1.11.2.js"></script>
	<script src="../Resources/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
function confirmar(){
document.getElementById('error').style.display = 'block';
}
                    
</script>
    
    
    
  
    
    
    
    
</body>
</html>