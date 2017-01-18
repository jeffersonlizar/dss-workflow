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
                text: '<?php if (isset($titulo)) echo $titulo; else echo 'Categoria'; ?>'
            },
            subtitle: {
                text: '<?php if (isset($subtitulo)) echo $subtitulo; else echo ''; ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>{point.cant}'
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
                if (isset($categorias))           
                    for ($i=0;$i<count($categorias);$i++){
                        echo $categorias[$i];
                    }
                ?>
               ]
            }]
        });
    });
</script>