<table cellspacing="1" cellpadding="3" class="tablehead table table-striped table-bordered counties-tables" style="background:#CCC;" id="<?php echo $table_div;?>">
	<thead>
		<tr class="colhead">
			<th rowspan="2">No</th>
			<th rowspan="2">Name</th>
			<?php if(isset($sub_county)){?><th rowspan="2">County</th><?php } ?>
			<?php if($sites){?><th rowspan="2">Facilities Sending Samples</th><?php } ?>
			<?php if(isset($subcountyListing)){?><th rowspan="2">Sub-County</th><?php } ?>
			<th rowspan="2">Received Samples at Lab</th>
			<th rowspan="2">Rejected Samples (on receipt at lab)</th>
			<th rowspan="2">All Test Done at Lab</th>
			<th rowspan="2">Redraw (after testing)</th>
			<th colspan="2">Routine VL Tests</th>
			<th colspan="2">Baseline VL Tests</th>
			<th colspan="2">Confirmatory Repeat Tests</th>
			<th colspan="2">Total Tests with Valid Outcomes</th>
		</tr>
		<tr>
			<th>Tests</th>
			<th>&gt; 1000</th>
			<th>Tests</th>
			<th>&gt; 1000</th>
			<th>Tests</th>
			<th>&gt; 1000</th>
			<th>Tests</th>
			<th>&gt; 1000</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $outcomes;?>
	</tbody>
</table>
<div class="row" id="excels" style="display: none;">
	<div class="col-md-6">
		<!-- <center><button class="btn btn-primary" style="background-color: #009688;color: white;">List of all supported sites</button></center> -->
	</div>
	<div class="col-md-6">
		<center><a href="<?php  echo $link; ?>"><button id="download_link" class="btn btn-primary" style="background-color: #009688;color: white;">Export To Excel</button></a></center>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
  	// $('table').DataTable();

  	$('#<?php echo $table_div;?>').DataTable({
  		dom: '<"btn btn-primary"B>lTfgtip',
		responsive: true,
	    buttons : [
	        {
	          text:  'Export to CSV',
	          extend: 'csvHtml5',
	          title: 'Download'
	        },
	        {
	          text:  'Export to Excel',
	          extend: 'excelHtml5',
	          title: 'Download'
	        }
	      ]
  	});

    // $("table").tablecloth({
    //   theme: "paper",
    //   striped: true,
    //   sortable: true,
    //   condensed: true
    // });
  });
</script>