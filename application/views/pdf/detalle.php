		<?php 
        	$anio = date("Y");
        	$anio_anterior = $anio-1;
        	$anio_anterior1 = $anio-2;
        ?>
		<!-- main -->
		<main>			
			
			<div class="centrado">


				    <div class="row">
						<form class="col s12 form-indicadores" action="<?php echo base_url().'reportes/pdf_detalle' ?>" method="POST" target="_blank">
					      	<div class="row">
					      		<h4>Reportes | <small>Detalle</small></h4>
						        <div class="input-field col s12 m12 offset-l3 l6">
						        	<h5 class="center">Detalle de Flujo de Trabajo</h5>

						        	<div class="filtroprincipal">
						        	<p class="center">Ingrese el nombre o el número del flujo de trabajo para obtener sus detalles.</p>
						        	<p class="center">Se generará un reporte con el status, las transiciones realizadas y los usuarios que han participado en el mismo.</p>
						        	<p class="center"></p>
						        		<input class="center" type="text" id="name_search" name="name_search" autocomplete="off" placeholder="Ingrese el Nombre del Flujo de Trabajo">
						        		<div id="livesearch"></div>
						        		<input class="center" type="number" pattern="[0-9]" min="0" id="id_instancia" name="id_instancia" required="">
						        		
									</div>

						        </div>
							
							    <div class="col s12 m12 l12">
									<input id="submi-indicador" type="submit" name="send" class="btn waves-effect waves-light submit-centrado" value="Generar Reporte">
								</div>
							</div>
					    </form>
					</div>	



									
			</div>	
			
		</main>
		<!-- /main -->



