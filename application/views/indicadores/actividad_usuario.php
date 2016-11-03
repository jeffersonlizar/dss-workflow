		<?php 
        	$anio = date("Y");
        	$anio_anterior = $anio-1;
        	$anio_anterior1 = $anio-2;
        ?>
		<!-- main -->
		<main>			
			
			<div class="centrado">
				<div class="row">
					<form class="col s12 form-indicadores" action="<?php echo base_url().'indicadores/registrar_actividad_usuario' ?>" method="POST">
				      <div class="row">
				      <h4>Indicadores | <small>Actividad Usuario</small></h4>
				        <div class="input-field col s12 m12 offset-l3 l6">
				        	<h5 class="center">Filtrar por:</h5>

				        	<div class="filtroprincipal">
				        		<div class="filtrotipo">
					        		<p class="center"><b>Tipo</b></p>
					        		<select name="filtrotipo">
										<option value="1">Flujos de trabajo</option>
										<option value="2">Transiciones</option>
									</select>	
					        	</div>
					        				  
								<p class="center"><b>Periodo</b></p>
								<select id="filtro-indicador-act-user" name="filtro">
									<option value="" disabled selected>Seleccione una opción</option>
									<option value="hoy">Hoy</option>
									<option value="ayer">Ayer</option>
									<option value="dia">Día</option>
									<option value="diacomparativo">Día Comparativo</option>
									<option value="diatipousuario">Día Tipo Usuario</option>
									<option value="mesactual">Mes Actual</option>
									<option value="mesespecifico">Mes Específico</option>
									<option value="mesespecificocomparativo">Mes Específico Comparativo</option>
									<option value="mesespecificotipousuario">Mes Específico Tipo Usuario</option>
									<option value="anoactual">Año Actual</option>
									<option value="anoespecifico">Año Específico</option>
									<option value="anoespecificocomparativo">Año Específico Comparativo</option>
									<option value="anoespecificotipousuario">Año Específico Tipo Usuario</option>
								</select>
							</div>

				        </div>
				        <div class="filtroajax-tipousuario-div input-field col s12 m12 offset-l3 l6 hide">
			        		<p class="center"><b>Tipo de Usuario</b></p>
							<select id="ajax-tipousuario" name="tipousuario1">
							</select>		
					    </div>
				        		
						<div class="filtroajax-usuario-div input-field col s12 m12 offset-l3 l6 hide">
							<p class="center"><b>Usuario</b></p>
							<select id="ajax-usuario" name="usuario1">
							</select>
						</div>	
						
						<div class="filtroajax-tipousuario-div2 input-field col s12 m12 offset-l3 l6 hide">
							<p class="center"><b>Comparar con el usuario:</b></p>
			        		<p class="center"><b>Tipo de Usuario</b></p>
							<select id="ajax-tipousuario2" name="tipousuario2">
							</select>		
				    	</div>
			        		
						<div class="filtroajax-usuario-div2 input-field col s12 m12 offset-l3 l6 hide">
							<p class="center"><b>Usuario</b></p>
							<select id="ajax-usuario2" name="usuario2">
							</select>
						</div>	

				        <div id="filtro-indicador-dia-div" class="input-field col s12 m12 offset-l3 l6 hide">
				        		<p class="center"><b>Ingrese el día</b></p>
				        	 	<input id="filtro-indicador-dia-campo" type="date" name="dia" class="datepicker">
				        </div>

				        <div id="filtro-indicador-mesespecifico-div" class="input-field col s12 m12 offset-l3 l6 hide">
				        		<p class="center"><b>Ingrese el mes</b></p>
				        		<div class="row">
							        <div class="input-field col s6">
							          	<select id="filtro-indicador-mesespecifico-campo1" name="mesespecifico1">
											<option value="" disabled selected>Seleccione el mes</option>
											<option value="01">Enero</option>
											<option value="02">Febrero</option>
											<option value="03">Marzo</option>
											<option value="04">Abril</option>
											<option value="05">Mayo</option>
											<option value="06">Junio</option>
											<option value="07">Julio</option>
											<option value="08">Agosto</option>
											<option value="09">Septiembre</option>
											<option value="10">Octubre</option>
											<option value="11">Noviembre</option>
											<option value="12">Diciembre</option>
											
										</select>
							        </div>
							        
							        <div class="input-field col s6">
							          	<select id="filtro-indicador-mesespecifico-campo2" name="mesespecifico2">
											<option value="" disabled selected>Seleccione el año</option>
											<option value="<?php echo $anio ?>"><?php echo $anio ?></option>
											<option value="<?php echo $anio_anterior ?>"><?php echo $anio_anterior ?></option>
											<option value="<?php echo $anio_anterior1 ?>"><?php echo $anio_anterior1 ?></option>
										</select>
							        	</div>
							    </div>
				        </div>
				        
				        <div id="filtro-indicador-anoespecifico-div" class="input-field col s12 m12 offset-l3 l6 hide">
				        		<p class="center"><b>Ingrese el año</b></p>
				        		<div class="row">
							        
							        <div class="input-field col s12">
							          	<select id="filtro-indicador-anoespecifico-campo1" name="anoespecifico">
											<option value="" disabled selected>Seleccione el año</option>
											<option value="<?php echo $anio ?>"><?php echo $anio ?></option>
											<option value="<?php echo $anio_anterior ?>"><?php echo $anio_anterior ?></option>
											<option value="<?php echo $anio_anterior1 ?>"><?php echo $anio_anterior1 ?></option>
										</select>
							        	</div>
							    </div>
				        </div>
				        
					    <div class="col s12 m12 l12">
							<input id="submit-indicador" type="submit" name="send" class="btn waves-effect disabled waves-light submit-centrado" value="Guardar y Mostrar">
						</div>
						</div>
				    </form>

				    <div class="col s12 m12 l12" id="actividad_usuario"></div>
					
				</div>	
			</div>
			
		</main>	
		<!-- /main -->
