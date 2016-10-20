<?php 
$i = 0;
foreach ($data_trans as $value):
    foreach ($value['alarmas'] as $val):
?>
<script type="text/javascript">
        $(function () {

    $('#alarmatransicion<?php echo $i++?>').highcharts({

        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },

        title: {
            text: '<?php echo $value['nombre'] ?>'
        },
        <?php
            $subtitulo_alarm = 'Descripción: '.$value['descripcion'].'<br>Instancia: #'.$val['id_instancia'].' '.$val['titulo'].'<br>Proceso: #'.$val['id_proceso'].'<br>Transición: '.$val['transicion'];
            if($value['tiempo_max']!=''){
                $max = intval(($value['tiempo_max']/60)/24);
                $section1 = $max*0.60;
                $section2 = $section1+$max*0.20;
                $section3 = $section2+$max*0.20;
                $value_alarm = intval(($val['time']/60)/24);
                $value_alarm2 = $value_alarm;
                $color_min_alarm = '#55BF3B';
                $color_max_alarm = '#DF5353';
                $title_alarm = 'Tiempo';
                if ($value_alarm > $max){
                    $value_alarm = $max;
                    $title_alarm = $title_alarm. ' mayor a';
                    $subtitulo_alarm = $subtitulo_alarm .'<br><span style="color:red">Alarma Excedida</span><br><span style="color:red">Tiempo:'.$value_alarm2.' días</span>';
                }    
            }
            else if($value['tiempo_min']!=''){
                $max = intval(($value['tiempo_min']/60)/24);
                $section1 = $max*0.20;
                $section2 = $section1+$max*0.20;
                $section3 = $section2+$max*0.60;
                $value_alarm = intval(($val['time']/60)/24);
                $value_alarm2 = $value_alarm;
                $color_min_alarm = '#DF5353';
                $color_max_alarm = '#55BF3B';
                $title_alarm = 'Tiempo';
                if ($value_alarm > $max){
                    $value_alarm = $max;
                    $title_alarm = $title_alarm. ' mayor a';
                    $subtitulo_alarm = $subtitulo_alarm .'<br><span style="color:red">Alarma Excedida</span><br><span style="color:red">Tiempo:'.$value_alarm2.' días</span>';
                }
            }
            
        ?>
        subtitle: {
            text: '<?php echo $subtitulo_alarm ?>'
        },

        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
            min: 0,
            max: <?php echo $max ?>,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: 'días'
            },
            plotBands: [
            {
                from: 0,
                to: <?php echo $section1 ?>,
                color: '<?php echo $color_min_alarm  ?>' 
            }, {
                from: <?php echo $section1 ?>,
                to: <?php echo $section2 ?>,
                color: '#DDDF0D' 
            }, {
                from: <?php echo $section2 ?>,
                to: <?php echo $section3 ?>,
                color: '<?php echo $color_max_alarm  ?>' 
            }]
        },
        series: [{
            name: '<?php echo $title_alarm ?>',
            data: [<?php echo $value_alarm ?>],
            tooltip: {
                valueSuffix: ' días'
            }
        }]

    },
    // Add some life
    function (chart) {
        if (!chart.renderer.forExport) {
            
        }
    });
});
            
        </script>
<?php endforeach; endforeach; 
?>