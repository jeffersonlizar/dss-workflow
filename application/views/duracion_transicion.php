<script type="text/javascript">
	$(function () {
	    $('#duracion_transicion').highcharts({
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: '<?php echo $titulo ?>'
	        },
	        subtitle: {
	            text: '<?php echo $subtitulo ?>'
	        },
	         xAxis: {
            categories: [
            <?php 
            $cant = count($nombre_usuario);
            for ($i=0; $i < $cant ; $i++):	            	
            	echo "'".$nombre_usuario[$i]."'";
            if ($i!=$cant-1){
            	echo ',';
            }
            endfor;
            ?>	
            ]
        	},
	        yAxis: [{
	            min: 0,
	            title: {
	                text: 'Tiempo (segundos)'
	            }
	        }, {
	            title: {
	                text: ''
	            },
	            opposite: true
	        }],
	        legend: {
	            shadow: false
	        },
	        tooltip: {
	            shared: true
	        },
	        plotOptions: {
	            column: {
	                grouping: false,
	                shadow: false,
	                borderWidth: 0
	            }
	        },
	        series: [{
	            name: 'Empleado',
	            color: 'rgba(126,86,134,.9)',
	            data: [
	            <?php 
	            $cant = count($datos_busqueda);
	            for ($i=0; $i < $cant ; $i++):	            	
	            	echo "
	            {
	            	name:'".$nombre_usuario[$i]." Duración: ".$tiempo_busqueda[$i]."',
	            	y:".$datos_busqueda[$i]."
	            }	           
	            ";
	            if ($i!=$cant-1){
	            	echo ',';
	            }
	            endfor;
	            ?>	        		        	
	            ],
	            pointPadding: 0.3,
	            pointPlacement: -0.2
	        }, {
	            name: 'Promedio',
	            
	            color: 'rgba(165,170,217,1)',
	            data: [
	            <?php 	           
	            for ($i=0; $i < $cant ; $i++):	            	
	            	echo "
	            {	            	
	            	name:'Duración: ".$tiempo_promedio."',
	            	y:".$datos_promedio."
	            }	           
	            ";
	            if ($i!=$cant-1){
	            	echo ',';
	            }
	            endfor;
	            ?>
	            ],
	            pointPadding: 0.4,
	            pointPlacement: -0.2
	        }]
	    });
	});
</script>