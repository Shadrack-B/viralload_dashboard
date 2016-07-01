<div class="row">
	<div class="col-md-6">
		<div id="ageGroupsbreakdownChildren_pie"></div>
	</div>
	<div class="col-md-6">
		<div id="ageGroupsbreakdownAdults_pie"></div>
	</div>
</div>

<script type="text/javascript">
	$(function () {
			    $('#ageGroupsbreakdownChildren_pie').highcharts({
			        chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
		            },
		            title: {
		                text: 'Children'
		            },
		            tooltip: {
		                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
		            series: [<?php echo json_encode($outcomes['children']);?>]
		        });
		    });

	$(function () {
			    $('#ageGroupsbreakdownAdults_pie').highcharts({
			        chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
		            },
		            title: {
		                text: 'Adults'
		            },
		            tooltip: {
		                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
		            series: [<?php echo json_encode($outcomes['adults']); ?>]
		        });
		    });
</script>