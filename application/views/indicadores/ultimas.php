		<?php 
        	$anio = date("Y");
        	$anio_anterior = $anio-1;
        	$anio_anterior1 = $anio-2;
        ?>
		<!-- main -->
		<main>			
			
			<div class="centrado">
				<div class="row">
					<form class="col s12 form-indicadores" action="<?php echo base_url().'indicadores/registrar_ultimas' ?>" method="POST">
				      <div class="row">
				      <h4>Indicadores | <small>Últimas</small></h4>
				        <div class="input-field col s12 m12 offset-l3 l6">
				        	<h5 class="center">Flujos de trabajo</h5>
				        	<p class="center"><b>Ingrese el cantidad a mostrar</b></p>
				        	<p class="range-field">
				        		<input id="rangoft" name="rangoft" type="range" min="0" max="50" value="0" >	
				        	</p>
				        	

				        </div>

				        <div class="input-field col s12 m12 offset-l3 l6">
				        	<h5 class="center">Transiciones</h5>
				        	<p class="center"><b>Ingrese el cantidad a mostrar</b></p>
				        	<p class="range-field">
				        		<input id="rangotran" name="rangotran" type="range" min="0" max="50" value="0">	
				        	</p>
				        	

				        </div>
				        


					    <div class="col s12 m12 l12">
							<input id="submit-indicador" type="submit" name="send" class="btn waves-effect disabled waves-light submit-centrado" value="Guardar y Mostrar">
						</div>
						</div>
				    </form>
				    <div class="col s12 m12 l12" id="ultimas_ins_trans" >
                        <div class="titulo tema"></div>
                        <div class="subtitulo tema"></div>
                        <ul class="collapsible popout collapsible-accordion scroll" data-collapsible="accordion">
                            <?php for ($i=0; $i < $ultimas_instancias; $i++): ?>
                            <li class="ultimas-instancias hide" id="ultima-instancia<?php echo $i;?>">
                                <div class="collapsible-header"><i class="material-icons">work</i><span class="titulo"></span></div>
                                <div class="collapsible-body contenido">
                                    <i class="material-icons">search</i><span class="descripcion"></span></br>
                                    <i class="material-icons">sync</i><span class="workflow"></span></br>
                                    <i class="material-icons">account_box</i><span class="usuario"></span></br>
                                    <i class="material-icons">alarm</i><span class="hora"></span></br>
                                </div>
                            </li>                     
                            <?php endfor; ?> 
                            <?php for ($i=0; $i < $ultimas_transiciones; $i++): ?>
                            <li class="ultimas-transiciones hide" id="ultima-transicion<?php echo $i;?>">
                                <div class="collapsible-header"><i class="material-icons">insert_drive_file</i><span class="titulo"></span></div>
                                <div class="collapsible-body contenido">
                                    <i class="material-icons">search</i><span class="descripcion"></span></br>
                                    <i class="material-icons">sync</i><span class="workflow"></span></br>
                                    <i class="material-icons">account_box</i><span class="usuario"></span></br>
                                    <i class="material-icons">alarm</i><span class="hora"></span></br>
                                </div>
                            </li>
                            <?php endfor; ?> 
                        </ul>            
                    </div>
					
				</div>	
			</div>
			
		</main>	
		<!-- /main -->
