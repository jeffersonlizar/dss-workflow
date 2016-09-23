<script type="text/javascript">
    resolution = $( window ).width();
    if (resolution<420){
        tam = '100%';
        posy = '80%';
    }
    else if ((resolution>420)&&(resolution<700)){
        tam = '120%';
        posy = '80%';
    }
    else if ((resolution>700)&&(resolution<1000)){
        tam = '100%';
        posy = '80%';
    }
    else if ((resolution>1020)&&(resolution<1277)){
        tam = '100%';
        posy = '50%';
    }
    else if ((resolution>1278)&&(resolution<1400)){
        tam = '100%';
        posy = '60%';
    }
    else if ((resolution>1400)&&(resolution<1500)){
        tam = '120%';
        posy = '80%';
    }
    else if ((resolution>1500)&&(resolution<1700)){
        tam = '130%';
        posy = '80%';
    }
    else{
        tam = '150%';
        posy = '80%';
    }
    $(function () {
        var gaugeOptions = {

            chart: {
                type: 'solidgauge'
            },

            title: {
            text: 'Crecimiento',
            style: {
                fontSize: '18px'
            }
            },
            subtitle: {
                text: 'asdfa',
                style: {
                    fontSize: '12px'
                }
            },

            pane: {
                center: ['52%', posy],
                size: tam,
                startAngle: -90,
                endAngle: 90,
                background: {
                    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                    innerRadius: '60%',
                    outerRadius: '100%',
                    shape: 'arc'
                }
            },

            tooltip: {
                enabled: false
            },

            // the value axis
            yAxis: {
                stops: [

                    [0.2, '#FF0000'], // lo peor
                    [0.3, '#F05A31'], // muy malo
                    [0.4, '#F07D31'], // malo
                    
                    [0.5, '#FAE958'], // normal
                    
                    [0.6, '#D5FB58'], // bien
                    [0.7, '#9AD035'], // muy bien
                    
                    [0.8, '#70D035'], // excelente
                    
                ],
                lineWidth: 0,
                minorTickInterval: null,
                tickAmount: 2,
                title: {
                    y: -100
                },
                labels: {
                    y: 16
                }
            },

            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        y: 5,
                        borderWidth: 0,
                        useHTML: true
                    }
                }
            }
        };

        // The speed gauge
        $('#crecimiento').highcharts(Highcharts.merge(gaugeOptions, {
            yAxis: {
                min: -100,
                max: 100,
            },

            credits: {
                enabled: false
            },

            series: [{
                name: 'crecimiento',
                data: [50],
                dataLabels: {
                    format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                        ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                           '<span style="font-size:16px;color:black">% de Crecimiento</span></div>'
                },
                tooltip: {
                    valueSuffix: ' %'
                }
            }]

        }));

    });
</script>
