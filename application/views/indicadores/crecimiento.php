		<?php 
        	$anio = date("Y");
        	$anio_anterior = $anio-1;
        	$anio_anterior1 = $anio-2;
        ?>
		<!-- main -->
		<main>			
			
			<div class="centrado">
				<div class="row">
					<form class="col s12 form-indicadores" action="<?php echo base_url().'indicadores/registrar_crecimiento' ?>" method="POST">
				      <div class="row">
				      <h4>Indicadores | <small>Crecimiento</small></h4>
				        <div class="input-field col s12 m12 offset-l3 l6">
				        	<h5 class="center">Filtrar por:</h5>
				        	<div class="filtroprincipal">
					        	<div id="filtrotipo">
					        		<select name="filtrotipo">
										<option value="1">Flujos de trabajo</option>
										<option value="2">Transiciones</option>
									</select>	
					        	</div>
				        		
								<select id="filtro-indicador" name="filtro">
									<option value="" disabled selected>Seleccione una opción</option>
									<option value="crecimiento-hoy-ayer">Hoy con respecto al día de Ayer</option>
									<option value="crecimiento-mactual-manterior">Mes actual con respecto al mes anterior</option>
									<option value="crecimiento-aactual-aanterior">Año actual con respecto al año anterior</option>
									<option value="crecimiento-periodos">Periodos</option>
								</select>
							</div>

				        </div>
				        
				        <div id="filtro-indicador-crecimiento-periodos-div" class="input-field col s12 m12 offset-l3 l6 hide">
				        		<p class="center"><b>Periodo</b></p>
				        		<div class="row">
							        <div class="input-field col s6">
							          <label for="filtro-indicador-crecimiento-periodo-campo1">Desde</label>
							          <input id="filtro-indicador-crecimiento-periodo-campo1" type="date" name="periodo1_inicio" class="datepickerperiodo1">
							        </div>
							        <div class="input-field col s6 hide">
							          <label for="filtro-indicador-crecimiento-periodo-campo2">Hasta</label>
							          <input id="filtro-indicador-crecimiento-periodo-campo2" type="date" name="periodo1_fin" class="datepickerperiodo2">
							        </div>
							    </div>
							    <div class="crecimientoperiodo2 hide">
							    	<p class="center"><b>comparar con el periodo</b></p>
					        		<div class="row">
								        <div class="input-field col s6">
								          <label for="filtro-indicador-crecimiento-periodo-campo3">Desde</label>
								          <input id="filtro-indicador-crecimiento-periodo-campo3" type="date" name="periodo2_inicio" class="datepickerperiodo3">
								        </div>
								        <div class="input-field col s6 hide">
								          <label for="filtro-indicador-crecimiento-periodo-campo4">Hasta</label>
								          <input id="filtro-indicador-crecimiento-periodo-campo4" type="date" name="periodo2_fin" class="datepickerperiodo4">
								        </div>
								    </div>	
							    </div>
							    
				        </div>
				        
					    <div class="col s12 m12 l12">
							<input id="submit-indicador" type="submit" name="send" class="btn waves-effect disabled waves-light submit-centrado" value="Guardar y Mostrar">
						</div>
						</div>
				    </form>
				    <div class="col s12 m12 l12" id="crecimiento"></div>
					
				</div>	
			</div>
			
		</main>	
		<!-- /main -->
