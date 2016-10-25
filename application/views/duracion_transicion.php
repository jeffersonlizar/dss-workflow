<script type="text/javascript">
	$(function () {
	    $('#duracion_transicion').highcharts({
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: 'Efficiency Optimization by Branch'
	        },
	        subtitle: {
	            text: 'Efficiency Optimization by Branch'
	        },
	        xAxis: {
	            categories: [
	                'Seattle HQ',
	                'San Francisco',
	                'Tokyo'
	            ]
	        },
	        yAxis: [{
	            min: 0,
	            title: {
	                text: 'Employees'
	            }
	        }, {
	            title: {
	                text: 'Profit (millions)'
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
	            name: 'Employees',
	            color: 'rgba(165,170,217,1)',
	            data: [{
	            	name: 'Duración:12345678 \nPromedio:12345678',
                	//color: '#00FF00',
	            	y:150
	            }, 73, 20],
	            pointPadding: 0.3,
	            pointPlacement: -0.2
	        }, {
	            name: 'Employees Optimized',
	            color: 'rgba(126,86,134,.9)',
	            data: [140, 90, 40],
	            pointPadding: 0.4,
	            pointPlacement: -0.2
	        }]
	    });
	});
</script>