<script type="text/javascript">	
	$("#resumen .titulo").html('<p><?php if(isset($titulo)) echo $titulo; else echo 'asdf'; ?></p>');
	$("#resumen .subtitulo").html('<p><?php if(isset($subtitulo)) echo $subtitulo; else echo '';	 ?></p>');
	//workflows
	$("#resumen_workflow_mas_realizado").text('<?php if(isset($resumen_workflow_mas_realizado)) echo $resumen_workflow_mas_realizado; else echo ''; ?>');
	$("#resumen_workflow_menos_realizado").text('<?php if(isset($resumen_workflow_menos_realizado)) echo $resumen_workflow_menos_realizado; else echo ''; ?>');
	$("#resumen_workflow_mas_rapido").text('<?php if(isset($resumen_workflow_mas_rapido)) echo $resumen_workflow_mas_rapido; else echo ''; ?>');
	$("#resumen_workflow_mas_lento").text('<?php if(isset($resumen_workflow_mas_lento)) echo $resumen_workflow_mas_lento; else echo ''; ?>');
	$("#resumen_workflow_cant").text('<?php if(isset($resumen_workflow_cant)) echo $resumen_workflow_cant; else echo ''; ?>');
	//procesos
	$("#resumen_proceso_mas_realizado").text('<?php if(isset($resumen_proceso_mas_realizado)) echo $resumen_proceso_mas_realizado; else echo ''; ?>');
	$("#resumen_proceso_menos_realizado").text('<?php if(isset($resumen_proceso_menos_realizado)) echo $resumen_proceso_menos_realizado; else echo ''; ?>');
	a = '<?php echo $resumen_proceso_mas_lento; ?>';
	$("#resumen_proceso_mas_rapido").text('<?php if(isset($resumen_proceso_mas_rapido)) echo $resumen_proceso_mas_rapido; else echo ''; ?>');
	$("#resumen_proceso_mas_lento").html('<?php if(isset($resumen_proceso_mas_lento)) echo $resumen_proceso_mas_lento; else echo ''; ?>');
	$("#resumen_proceso_cant").text('<?php if(isset($resumen_proceso_cant)) echo $resumen_proceso_cant; else echo ''; ?>');
							
</script>