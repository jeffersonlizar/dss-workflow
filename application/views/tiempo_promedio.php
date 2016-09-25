<script type="text/javascript">
			$("#tiempo_promedio .titulo").html('<p><?php echo $titulo ?></p>');
			$("#tiempo_promedio .subtitulo").html('<p><?php echo $subtitulo	 ?></p>');
            setTimeout(function(){
                promedio_dias.innerHTML = <?php echo $dias ?>;
                promedio_horas.innerHTML = <?php echo $horas ?>;
                promedio_minutos.innerHTML = <?php echo $minutos ?>;
                promedio_segundos.innerHTML = <?php echo $segundos ?>;
            }, 500);

</script>