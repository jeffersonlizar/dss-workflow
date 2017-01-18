<script type="text/javascript">
			$("#tiempo_promedio .titulo").html('<p><?php if (isset($titulo)) echo $titulo; else echo ''; ?></p>');
			$("#tiempo_promedio .subtitulo").html('<p><?php if (isset($subtitulo)) echo $subtitulo; else echo '';	 ?></p>');
            setTimeout(function(){
                promedio_dias.innerHTML = <?php if(isset($dias)) echo $dias; else echo 0; ?>;
                promedio_horas.innerHTML = <?php if(isset($horas)) echo $horas; else echo 0; ?>;
                promedio_minutos.innerHTML = <?php if(isset($minutos)) echo $minutos; else echo 0; ?>;
                promedio_segundos.innerHTML = <?php if(isset($segundos)) echo $segundos; else echo 0; ?>;
            }, 500);

</script>