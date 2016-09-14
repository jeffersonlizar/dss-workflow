<script type="text/javascript">
    $(function () {
        // Build the chart
        $('#categoria').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '<?php echo $titulo ?>'
            },
            subtitle: {
                text: '<?php echo $subtitulo ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b></br> cant: {point.cant}'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'categorias',
                colorByPoint: true,
                data: [
                <?php 
                for ($i=0;$i<count($categorias);$i++){
                    echo $categorias[$i];
                }
                ?>
               ]
            }]
        });
    });
</script>