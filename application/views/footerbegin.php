		<!-- Modal Structure -->
		<div id="mensajemodal" class="modal kiri">
		    <div class="modal-content kiri">
		        <div class="row">
		            <div class="col s12 white">
		                <h4 id="titulomensaje" style="text-align: center; color: black"><?php if(isset($titulo)) echo $titulo; ?></h4>
		                <div class="row">
		                	<p id="contenidomensaje" style="text-align: center;"><?php if(isset($contenido)) echo $contenido; ?></p>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="modal-footer kiri">
		        <button class="btn modal-close waves-light waves-effect itami">Cerrar</button>
		    </div>
		</div>

		<!-- footer -->
		<footer>
		<a id="mostrarmodal" class="modal-trigger hide" href="#mensajemodal">Iniciar Sesión</a>
		</footer>
		<!-- /footer -->

		<!-- jquery -->
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery-2.1.1.min.js"></script>
		<!-- materialize -->
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/materialize.min.js" ></script>

		<script type="text/javascript">
			var servidor =  '<?php echo base_url() ?>';
			var ubicacion =  '<?php echo ubicacion() ?>';
			
		</script>
		
		<!-- site-scripts -->
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/scripts.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/site-scripts.js" ></script>
		<script type="text/javascript">
			<?php 
			if (isset($contenido)){
				echo '
				$(document).ready(function(){
					$("#mostrarmodal").click();
				})
				';
			}
			?>
		</script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/odometro.js" ></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/highcharts.js" ></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/highcharts-more.js" ></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/exporting.js" ></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/solid-gauge.js" ></script>
		
