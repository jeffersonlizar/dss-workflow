<script type="text/javascript">
	$(function () {
	    $('#actividad').highcharts({
	        chart: {
	            type: 'spline'
	        },
	        title: {
	            text: '<?php echo $titulo ?>'
	        },
	        subtitle: {
	            text: '<?php echo $subtitulo ?>'
	        },
	        xAxis: {
	        	<?php if ($type==null): ?>
	            type: 'datetime',
	            labels: {
	                overflow: 'justify'
	            }
	            <?php else:
	            if ($type=="horas"): ?>
	            categories: ['01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00','13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00', '24:00']
	            <?php endif; 
	            if ($type=="dias"): ?>
	            categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12','13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31']
	            <?php endif; 
	            endif;?>
	        },
	        yAxis: {
	            title: {
	                text: 'Procesos'
	            },
	            minorGridLineWidth: 0,
	            gridLineWidth: 0,
	            alternateGridColor: null,
	            plotBands: [
	            <?php 
	            for ($i = 0; $i < 50 ;$i++):
	            	if ($i%2==0):
	            ?>
	            { // Light air
	                from: <?php echo $i ?>,
	                to: <?php echo ++$i ?>,
	                color: 'rgba(68, 170, 213, 0.1)',
	                label: {
	                    //text: 'Light air',
	                    style: {
	                        color: '#606060'
	                    }
	                }
	            }
	            ,
	            <?php endif;
	            if ($i%2==0):
	            ?>

	             { // Light breeze
	                from: <?php echo $i ?>,
	                to: <?php echo ++$i ?>,
	                color: 'rgba(0, 0, 0, 0)',
	                label: {
	                    //text: 'Light breeze',
	                    style: {
	                        color: '#606060'
	                    }
	                }
	            }
	            ,
	            <?php endif;
	            endfor;
	            ?>	            
	            { // High wind
	                from: <?php echo $i ?>,
	                to: <?php echo ++$i ?>,
	                color: 'rgba(68, 170, 213, 0.1)',
	                label: {
	                    //text: 'High wind',
	                    style: {
	                        color: '#606060'
	                    }
	                }
	            }
	            ]
	        },
	        tooltip: {
	            valueSuffix: ' procesos'
	        },
	        plotOptions: {
	            spline: {
	                lineWidth: 4,
	                states: {
	                    hover: {
	                        lineWidth: 5
	                    }
	                },
	                marker: {
	                    enabled: false
	                },
	                <?php if (isset($fecha_inicio)): ?>
	                pointStart: Date.UTC(<?php echo $fecha_inicio ?>),
	                pointInterval: <?php echo $intervalo ?> // 1 hora de intervalo		                		                
	                <?php endif; ?>
	            }
	        },
	        series: [{
	            name: '<?php echo $datos_principal_nombre ?>',
	            data: [<?php echo $datos_principal ?>]
	        },
	        <?php if(isset($datos_secundario)): ?>
	        {
	            name: '<?php echo $datos_secundario_nombre ?>',
	            data: [<?php echo $datos_secundario ?>]
	        },
	        <?php endif; ?>
	        ],
	        navigation: {
	            menuItemStyle: {
	                fontSize: '10px'
	            }
	        }
	    });
	});
</script>