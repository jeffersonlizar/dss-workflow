<script type="text/javascript">
	var instancias = '<?php echo $instancias ?>';
	instancias = JSON.parse(instancias);
	var transiciones = '<?php echo $transiciones ?>';
	transiciones = JSON.parse(transiciones);
	console.log(transiciones);
	$('#ultimas_ins_trans .titulo:first-child').text('<?php echo $titulo?>');
	$('#ultimas_ins_trans .subtitulo').text('<?php echo $subtitulo?>');
	id_instancia = '#ultima-instancia';
	id_transicion = '#ultima-transicion';
	for (var i = 0; i < instancias.length; i++) {
		hora = instancias[i].fecha_inicio.split(' ');
		$(id_instancia+i+' .titulo').text(instancias[i].titulo).parents('li').removeClass('hide');
		$(id_instancia+i+' .descripcion').text('Descripción: '+instancias[i].descripcion);
		$(id_instancia+i+' .workflow').text('Workflow: '+instancias[i].nombre);
		$(id_instancia+i+' .usuario').text('Usuario: '+instancias[i].id_usuario);
		$(id_instancia+i+' .hora').text('Hora: '+hora[1]);
	}
	for (var i = 0; i < transiciones.length; i++) {
		hora = transiciones[i].fecha.split(' ');
		$(id_transicion+i+' .titulo').text(transiciones[i].nombre).parents('li').removeClass('hide');
		$(id_transicion+i+' .descripcion').text('Descripción: '+transiciones[i].descripcion);
		$(id_transicion+i+' .workflow').text('Workflow: '+transiciones[i].instancia_nombre);
		$(id_transicion+i+' .usuario').text('Usuario: '+transiciones[i].id_usuario);
		$(id_transicion+i+' .hora').text('Hora: '+hora[1]);
	}

</script>