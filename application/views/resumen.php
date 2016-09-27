<script type="text/javascript">
	$("#resumen .titulo").html('<p><?php echo $titulo ?></p>');
	$("#resumen .subtitulo").html('<p><?php echo $subtitulo	 ?></p>');
	//workflows
	$("#resumen_workflow_mas_realizado").text('<?php echo $resumen_workflow_mas_realizado ?>');
	$("#resumen_workflow_menos_realizado").text('<?php echo $resumen_workflow_menos_realizado ?>');
	$("#resumen_workflow_mas_rapido").text('<?php echo $resumen_workflow_mas_rapido ?>');
	$("#resumen_workflow_mas_lento").text('<?php echo $resumen_workflow_mas_lento ?>');
	$("#resumen_workflow_cant").text('<?php echo $resumen_workflow_cant ?>');
	//procesos
	$("#resumen_proceso_mas_realizado").text('<?php echo $resumen_proceso_mas_realizado ?>');
	$("#resumen_proceso_menos_realizado").text('<?php echo $resumen_proceso_menos_realizado ?>');
	$("#resumen_proceso_mas_rapido").text('<?php echo $resumen_proceso_mas_rapido ?>');
	$("#resumen_proceso_mas_lento").text('<?php echo $resumen_proceso_mas_lento ?>');
	$("#resumen_proceso_cant").text('<?php echo $resumen_proceso_cant ?>');
							
</script>