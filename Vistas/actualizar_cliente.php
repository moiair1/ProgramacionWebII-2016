<?php

require '../Controlador/actualizar_registro.php';

?>


<html lang="en">
  <head>
    <title>Listado de clientes</title>

 <?php
    require './header.php';
 ?>

  </head>
<body>
    
    <div class="container">
    
      <div class="jumbotron"><h1>Actualizacion de Clientes </h1></div>
            
             <div class="container">
        <div class="row">
            <!-- form: -->
            <section>
                <div class="page-header">
                    <strong> </strong>
                    <h3>  <?php  echo $mensaje; ?> </h2>
                </div>

                <div class="col-lg-8 col-lg-offset-2">
                    <form id="defaultForm" method="post" action="<?php $_SERVER['PHP_SELF']?>" class="form-horizontal">
                      

                        <fieldset>
                                          
                          <!--  <legend></legend>-->

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Documento:</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="dni" value="<?php echo $dni;?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Apellido:</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="apellido" value="<?php echo $apellido;?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nombres: </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre;?>"/>
                                </div>
                            </div>

  




						<div class="form-group">
					<!--	<label class="col-lg-3 control-label">Fecha Nacimiento:    </label>-->
                        <div class="col-lg-8">
       				      
                        </div>
<!--						<input  type="hidden" id="dtp_input2" name="fecha_nac"  value="" /><br/>             
-->          			  </div>



						<div class="form-group">
						<label class="col-lg-3 control-label">Fecha Nacimiento:    </label>
                        	<div class="col-lg-5">
                                    <input type="date" class="form-control" name="fecha_nac"  id="datepicker" value="<?php echo $fecha_nac;?>"/>
                                </div>
                            </div>












						








							   <div class="form-group">
                                <label class="col-lg-3 control-label">Pais de Nacimiento:</label>
                                <div class="col-lg-5">
                                    <select class="form-control" name="nacionalidad_id">
                                        <!--<option value="">-- Seleccione  Pais --</option>-->
                                        <option value="<?php  echo $nacionalidad_id; ?>"><?php echo $pais_nombre; ?></option>
                                    
                                        
                                         <?php foreach($l_pais->list_pais() as $mostrarPais):?>
                                        	
                                        	<option value="<?php echo $mostrarPais->id?>">
											<?php echo $mostrarPais->id?> - 
                                                                                            <?php echo $mostrarPais->nombre ?>
                                            </option>
                                        
                                        <?php endforeach ?>
                                        
                                        
                                        
                                        
                                        
                                        
                                       
                                    </select>
                                </div>
                            </div>



                      

							<div class="form-group">
                                <div class="col-lg-5 col-lg-offset-3">
                                    <div class="checkbox">
                                      
                                        
                                           
                                        <?php
                                        $activado = '';
                                        
                                        if ($activo == '1' ) {
                                            $activado = 'checked';
                                         }
                                         else{
                                                $bandera =0;
                                              }
                                          ?>
                                        <input type="hidden" name="activo" value="0" />
                                        <input name="activo" type="checkbox" id="checkbox" value="1" <?php echo $activado; ?>/>

                                        
                                        
                                      
                                     
                                        
                                        
                                        
                                        
                                        
                                        Activo?
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                          

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                               
                                <input type="hidden" name="actualizar">
                                <input type="hidden" name="id" value="<?php echo $id_cliente ?>">

                                <button type="submit" class="btn btn-success"> Guardar Datos</button>
                            </div>
                        </div>
                        
                         </fieldset>
                        
                    </form>
                </div>
            </section>
            <!-- :form -->
        </div>
    </div>

        
        </div>
  </div>
  
  
  

<script>

$(document).ready(function() {
    $('#defaultForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        
		fields: {
            dni: {
                message: 'El Documento es Invalido',
                validators: {
                    notEmpty: {
                        message: 'Es Obligatorio el Ingreso del Documento'
                    },
                    stringLength: {
                        min: 6,
                        max: 8,
                        message: 'El Documento debe contener 8 digitos no se acepta caracteres'
                    },
                    regexp: {
                        regexp: /^[0-9_\.]+$/,
						//regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'El DNI sólo puede consistir  solo números'
                    }
                }
            },
			
			
			apellido: {
                message: 'El Apellido es invalido',
                validators: {
                    notEmpty: {
                        message: 'Es Obligatorio el Ingreso del Apellido'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El Apellido debe contener como min 3 y como max 30 letras no se acepta numeros ni caracteres'
                    },
                    regexp: {
                        //regexp: /^[0-9_\.]+$/,
						regexp: /^[a-zA-Z\s]+$/,
						//regexp: /[a-zA-Z+(\s*[a-zA-Z]*)*[a-zA-Z]+$/,
                        message: 'El Apellido sólo puede consistir  solo letras'
                    }
                }
            },
			
			nombre: {
                message: 'El Nombre es invalido',
                validators: {
                    notEmpty: {
                        message: 'Es Obligatorio el Ingreso del Nombre'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El Nombre debe contener como minimo 3 letras no se acepta numeros ni caracteres'
                    },
                    regexp: {
                        //regexp: /^[0-9_\.]+$/,
						regexp: /^[a-zA-Z\s]+$/,
                        message: 'El Nombre sólo puede consistir  solo letras'
                    }
                }
            },
			
          
		  		fecha_nac: {
                message: 'El Calendario es invalido',
                validators: {
                    notEmpty: {
                        message: 'Es Obligatorio la Seleccion de Fecha de Nac.'
                    },
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'La Fecha de Nac.  debe ser valido	'
                    },
         
                }
            },
		  
		  
	nacionalidad_id: {
                message: 'Pais  es invalido',
                validators: {
                    notEmpty: {
                        message: 'Es Obligatorio que lo seleccione su Nacionalidad'
                    },
       
                }
            },
        }
    });
});




</script>


<?php

require './footer.php';
?>


</body>
</html>
