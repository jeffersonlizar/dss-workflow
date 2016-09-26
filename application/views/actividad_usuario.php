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
            <?php if(isset($actividades)):?>
            floating: false,
            <?php else:?>
            floating: true,
            <?php endif; ?>
            borderWidth: 1,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
            <?php 
                if ($type=="horas"): ?>
                categories: ['01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00','13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00', '24:00']
                <?php endif;?>
                <?php if ($type=="dias"): ?>
                categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12','13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31']
                <?php endif; ?>
                <?php if ($type=="meses"): ?>
                categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
                <?php endif; ?>
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
        series: [
        <?php if(isset($datos_principal)): ?>
        {
            name: '<?php echo $datos_principal_nombre ?>',
            data: [<?php echo $datos_principal ?>]
        }, 
        <?php endif; ?>    
         <?php if(isset($datos_secundario)): ?>
            {
                name: '<?php echo $datos_secundario_nombre ?>',
                data: [<?php echo $datos_secundario ?>]
            },
        <?php endif; ?>    
        <?php if(isset($actividades)): 
            for ($i=0; $i < count($actividades) ; $i++) { 
                echo   "{
                name: '".$actividades_nombre[$i]."',
                data: [".$actividades[$i]."]
                },";
            }
        ?>
        <?php endif; ?>    
        ]
    });
});
		</script>