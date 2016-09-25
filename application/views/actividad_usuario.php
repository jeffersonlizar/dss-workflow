<script type="text/javascript">
$(function () {
    $('#actividad_usuario').highcharts({
        chart: {
            type: 'area',
            inverted: true
        },
        title: {
            text: '<?php echo $titulo ?>'
        },
        subtitle: {
            text: '<?php echo $subtitulo ?>',
            style: {
                position: 'absolute',
                right: '0px',
                bottom: '10px'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: 0,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
            <?php 
                if ($type=="horas"): ?>
                categories: ['01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00','13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00', '24:00']
                <?php endif;?>
        },
        yAxis: {
            title: {
                text: '<?php echo $leyenda ?>'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            },
            min: 0
        },
        plotOptions: {
            area: {
                fillOpacity: 0.5
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
        ]
    });
});
		</script>