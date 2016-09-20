<script type="text/javascript">
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
                center: ['50%', '85%'],
                size: '100%',
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

                    [0.1, '#DF5353'], // green
                    [0.5, '#DDDF0D'], // yellow
                    [0.9, '#55BF3B'] // red
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
                min: 0,
                max: 100,
                title: {
                    text: 'Crecimiento'
                }
            },

            credits: {
                enabled: false
            },

            series: [{
                name: 'crecimiento',
                data: [80],
                dataLabels: {
                    format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                        ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                           '<span style="font-size:12px;color:silver">% de Crecimiento</span></div>'
                },
                tooltip: {
                    valueSuffix: ' km/h'
                }
            }]

        }));

    });
</script>