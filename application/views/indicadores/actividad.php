
		<!-- main -->
		<main>			
			
			<div class="centrado">
				<div class="row">
					<form class="col s12">
				      <div class="row">
				      <h4>Indicadores | <small>Actividad</small></h4>
				        <div class="input-field col s12 m12 offset-l3 l6">
				        	<h5 class="center">Filtrar por:</h5>
							<select id="filtro-indicador-actividad">
								<option value="" disabled selected>Seleccione una opción</option>
								<option value="hoy">Hoy</option>
								<option value="ayer">Ayer</option>
								<option value="dia">Día</option>
								<option value="comparardias">Comparar Dias</option>
								<option value="mesactual">Mes Actual</option>
								<option value="mesespecifico">Mes Específico</option>
								<option value="compararmeses">Comparar Meses</option>
								<option value="anoactual">Año Actual</option>
								<option value="anoespecifico">Año Específico</option>
								<option value="audi">Comparar Años</option>
							</select>

				        </div>
				        <div id="filtro-indicador-actividad-dia-div" class="input-field col s12 m12 offset-l3 l6 hide">
				        		<p class="center">Ingrese el día</p>
				        	 	<input id="filtro-indicador-actividad-dia-campo" type="date" name="dia" class="datepicker">
				        </div>

				        <div id="filtro-indicador-actividad-comparardias-div" class="input-field col s12 m12 offset-l3 l6 hide">
				        		<p class="center">Ingrese los días a comparar</p>
				        		<div class="row">
							        <div class="input-field col s6">
							          <input id="filtro-indicador-actividad-comparardias-campo1" type="date" name="comparardias1" class="datepicker">
							        </div>
							        <div class="input-field col s6">
							          <input id="filtro-indicador-actividad-comparardias-campo2" type="date" name="comparardias2" class="datepicker">
							        </div>
							    </div>
				        </div>

				        
					    <div class="col s12 m12 l12">
							<input id="submit-indicador-actividad" type="submit" name="send" class="btn waves-effect disabled waves-light submit-centrado" value="Guardar y Mostrar">
						</div>

				    </form>
					
				</div>	
			</div>
			
		</main>	
		<!-- /main -->
