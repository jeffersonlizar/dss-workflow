<?php 
$i = 0;
foreach ($data as $value):
    var_dump($value);
    foreach ($value['alarmas'] as $val):
        var_dump($val);
?>
<script type="text/javascript">
        $(function () {

    $('#alarma<?php echo $i++?>').highcharts({

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
        subtitle: {
            text: '<?php echo 'Instancia: '.$val['titulo'] ?>'
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
            max: <?php echo (intval(($value['tiempo_max']/60)/24))?>,

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
                text: 'Satisfacción'
            },
            plotBands: [{
                from: 0,
                to: 1,
                color: '#DF5353' // red
            }, {
                from: 1,
                to: 3,
                color: '#DDDF0D' // yellow
            }, {
                from: 3,
                to: 5,
                color: '#55BF3B' // green
            }]
        },

        series: [{
            name: 'Promedio',
            data: [<?php echo intval(($val['time']/60)/24) ?>],
            tooltip: {
                valueSuffix: ' Pts'
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