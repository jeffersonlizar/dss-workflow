
		<!-- main -->
		<main>			
			
			<div class="row">
				<section id="principal" class="tab">
				    

					<div class="col s12 m6 l9" id="actividad"></div>

					<div class="col s12 m6 l3" id="indicadores"></div>                    

					<div class="col s12 m6 l4" id="categoria"></div>

                    <div class="col s12 m6 l4" id="actividad_usuario"></div>
                    
                    <div class="col s12 m6 l4" id="crecimiento"></div>

                    <div class="col s12 m6 l6" id="duracion_transicion"></div>

                    <div class="col s12 m6 l4" id="tiempo_promedio">
                        <div class="titulo tema"></div>
                        <div class="subtitulo tema"></div>
                            <div id="tiempo_horas" class="col offset-s2">   
                                <i class="material-icons md-40">timelapse</i>                                
                                <div id="promedio_dias" class="odometer"></div><span> Días</span> </br>
                                <div id="promedio_horas" class="odometer"></div><span> horas</span> </br>
                                <div id="promedio_minutos" class="odometer"></div><span> minutos</span> </br>
                                <div id="promedio_segundos" class="odometer"></div><span> segundos</span> </br>
                            </div>
                    </div>

                    <div class="col s12 m6 l4" id="resumen" style="border:1px solid black">
                        <div class="titulo tema"></div>
                        <div class="subtitulo tema"></div>
                        <div>
                            <p><b>Flujo de trabajo</b><p>
                            <p>Más realizado: <span id="resumen_workflow_mas_realizado"></span></p>
                            <p>Menos realizado: <span id="resumen_workflow_menos_realizado"></span></p>
                            <p>Más rápido: <span id="resumen_workflow_mas_rapido"></span></p>
                            <p>Más lento: <span id="resumen_workflow_mas_lento"></span></p>
                            <p>Total realizados: <span id="resumen_workflow_cant"></span></p>
                        </div>    
                        <div>
                            <p><b>Proceso</b></p>
                            <p>Más realizado: <span id="resumen_proceso_mas_realizado"></span></p>
                            <p>Menos realizado: <span id="resumen_proceso_menos_realizado"></span></p>
                            <p>Más rápido: <span id="resumen_proceso_mas_rapido"></span></p>
                            <p>Más lento: <span id="resumen_proceso_mas_lento"></span></p>
                            <p>Total realizados: <span id="resumen_proceso_cant"></span></p>
                        </div>
                    </div>

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

				</section>
									
			</div>	
			
		</main>
		<!-- /main -->

