		<?php 
        	$anio = date("Y");
        	$anio_anterior = $anio-1;
        	$anio_anterior1 = $anio-2;
        ?>
		<!-- main -->
		<main>			
			
			<div class="centrado">
				<div class="row">
					<form class="col s12 form-indicadores" action="<?php echo base_url().'indicadores/registrar_resumen' ?>" method="POST">
				      <div class="row">
				      <h4>Indicadores | <small>Resumen</small></h4>
				        <div class="input-field col s12 m12 offset-l3 l6">
				        	<h5 class="center">Filtrar por:</h5>
				        	<div class="filtroprincipal">
								<select id="filtro-indicador" name="filtro">
									<option value="" disabled selected>Seleccione una opción</option>
									<option value="hoy">Hoy</option>
									<option value="ayer">Ayer</option>
									<option value="dia">Día</option>
									<option value="mesactual">Mes Actual</option>
									<option value="mesespecifico">Mes Específico</option>
									<option value="anoactual">Año Actual</option>
									<option value="anoespecifico">Año Específico</option>
									<option value="periodo">Periodo</option>
								</select>
							</div>

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
				        
				        
				        <div id="filtro-indicador-periodo-div" class="input-field col s12 m12 offset-l3 l6 hide">
				        		<p class="center"><b>Ingrese el periodo</b></p>
				        		<div class="row">
							        <div class="input-field col s6">
							          <label for="filtro-indicador-periodo-campo1">Desde</label>
							          <input id="filtro-indicador-periodo-campo1" type="date" name="periodo_inicio" class="datepickerperiodo1">
							        </div>
							        <div class="input-field col s6 hide">
							          <label for="filtro-indicador-periodo-campo2">Hasta</label>
							          <input id="filtro-indicador-periodo-campo2" type="date" name="periodo_fin" class="datepickerperiodo2">
							        </div>
							    </div>
				        </div>
				        
					    <div class="col s12 m12 l12">
							<input id="submit-indicador" type="submit" name="send" class="btn waves-effect disabled waves-light submit-centrado" value="Guardar y Mostrar">
						</div>
						</div>
				    </form>
				    <div class="col s12 m12 offset-l4 l4" id="resumen">
                        <div class="titulo tema"></div>
                        <div class="subtitulo tema"></div>
                        
                        <div>
                            <p><b>Flujos de trabajo</b><p>
                            <p>Más realizado: <span id="resumen_workflow_mas_realizado"></span></p>
                            <p>Menos realizado: <span id="resumen_workflow_menos_realizado"></span></p>
                            <p>Más rápido: <span id="resumen_workflow_mas_rapido"></span></p>
                            <p>Más lento: <span id="resumen_workflow_mas_lento"></span></p>
                            <p>Total realizados: <span id="resumen_workflow_cant"></span></p>
                        </div>

                        <div>
                            <p><b>Transiciones</b></p>
                            <p>Más realizada: <span id="resumen_proceso_mas_realizado"></span></p>
                            <p>Menos realizada: <span id="resumen_proceso_menos_realizado"></span></p>
                            <p>Más rápida: <span id="resumen_proceso_mas_rapido"></span></p>
                            <p>Más lenta: <span id="resumen_proceso_mas_lento"></span></p>
                            <p>Total realizadas: <span id="resumen_proceso_cant"></span></p>
                        </div>
                    </div>                    
					
				</div>	
			</div>
			
		</main>	
		<!-- /main -->
