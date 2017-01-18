
		<!-- main -->
		<main>			
			
			<div class="centrado">
			<div class="row">
				<form class="col s12 form-indicadores" action="<?php echo base_url().'alarmas/registrar_alarma' ?>" method="POST">
				      <div class="row">
				      	<h4>Alarmas</h4>
				      	<h5 class="center">Nueva Alarma</h5>
				      	<div class="input-field col s12 m12 offset-l3 l6">
				      		<i class="material-icons prefix">account_circle</i>
				      		<input type="text" id="name" class="validate" name="nombre" pattern="[A-Za-z ]+" title="Solo se permiten letras" maxlength="250">
				      		<label for="name">Nombre</label>
				      	</div>
				      	<div class="input-field col s12 m12 offset-l3 l6">
				      		<i class="material-icons prefix">mode_edit</i>
				      		<textarea id="description" class="materialize-textarea" name="descripcion" pattern="[A-Za-z ]+" title="Solo se permiten letras" maxlength="250"></textarea>
				      		<label for="description">Descripción</label>
				      	</div>
				      	<div class="input-field col s12 m12 offset-l3 l6">
				        	<p class="center"><b>Aplicar a</b></p>
				        	<p>
				      			<input type="checkbox" id="check1" name="tipo" value="1" checked="true">
				      			<label for="check1" class="alarmatipos">Flujos de trabajo</label>
				      		</p>
				      		<p>
				      			<input type="checkbox" id="check2" name="tipo" value="2">
				      			<label for="check2" class="alarmatipos">Transiciones</label>
				      		</p>

				        </div>
				      	<div class="filtroajax-tipousuario2-div input-field col s12 m12 offset-l3 l6">
				        	<p class="center"><b>Tipo de Usuario</b></p>
				        	<select id="ajax-tipousuario1" name="tipousuario">
				        		<option value="" disabled selected>Seleccione una opción</option>
							</select>
				        </div>

				        <div class="filtroajax-usuario1-div input-field col s12 m12 offset-l3 l6 hide">
				        	<p class="center"><b>Usuario</b></p>
				        	<select id="ajax-usuario1" name="usuario">
				        		<option value="" disabled selected>Seleccione una opción</option>
							</select>
				        </div>

				      	<div class="filtroajax-workflow1-div input-field col s12 m12 offset-l3 l6 hide">
				        	<p class="center"><b>Flujo de trabajo</b></p>
				        	<select id="ajax-workflow1" name="workflow">
				        		<option value="" disabled selected>Seleccione una opción</option>
							</select>
				        </div>

				        <div class="filtroajax-instancia1-div input-field col s12 m12 offset-l3 l6 hide">
				        	<p class="center"><b>Instancia</b></p>
				        	<select id="ajax-instancia1" name="instancia">
				        		<option value="" disabled selected>Seleccione una opción</option>
							</select>
				        </div>

				        
				        <div class="rango-div input-field col s12 m12 offset-l3 l6 hide">
				        	<p class="center"><b>Duración (Días)</b></p>
				        	<p class="range-field">
				        		<input id="rangodias" name="rangotran"  type="range" min="0" max="50" value="0">	
				        	</p>
				        	

				        </div>
				        
					    <div class="col s12 m12 l12">
							<input id="submit-indicador" type="submit" name="send" class="btn waves-effect disabled waves-light submit-centrado" value="Guardar y Mostrar">
						</div>
						</div>
				    </form>
				    <form method="POST" id="formeliminar" action="<?php echo base_url().'alarmas/eliminar_alarma' ?>">
				    	<input type="hidden" id="tipo" name="tipo">
				    	<input type="hidden" id="id" name="id">
				    </form>

				    <?php 
				    $i = 0;
				    if ($data)
				    foreach ($data as $value):
				    	$pk = $value['id'];
				    	$nombre = $value['nombre'];
				    	foreach ($value['alarmas'] as $val):
					?>
					<i class="material-icons prefix eliminaralarma hide" id="alarmaworkflow<?php echo $i ?>-<?php echo $pk ?>" name="<?php echo $nombre  ?>" type="1" >delete_forever</i>
				    <div class="col s12 m6 l4" class="alarma" id="alarmaworkflow<?php echo $i++ ?>">

                        
                    </div>
                    <?php 
                    endforeach;
                    endforeach;
                    ?>
                    <?php 
				    $i = 0;
				    if ($data_trans)
				    foreach ($data_trans as $value):
				    	$pk = $value['id'];
				    	$nombre = $value['nombre'];
				    	foreach ($value['alarmas'] as $val):
					?>
					<i class="material-icons prefix eliminaralarma hide" id="alarmatransicion<?php echo $i ?>-<?php echo $pk ?>" name="<?php echo $nombre  ?>" type="2" >delete_forever</i>
				    <div class="col s12 m6 l4" class="alarma" id="alarmatransicion<?php echo $i++ ?>">


                        
                    </div>
                    <?php 
                    endforeach;
                    endforeach;
                    ?>
					

				</div>					
			</div>	
			
		</main>
		<!-- /main -->
		
