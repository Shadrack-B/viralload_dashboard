<??>
<script type="text/javascript">
	$().ready(function(){
		$("#notification").load("<?php echo base_url('charts/nonsuppression/notification');?>");
		$("#genderGrp").load("<?php echo base_url('charts/nonsuppression/gender_group');?>");
		$("#ageGrp").load("<?php echo base_url('charts/nonsuppression/age_group');?>");
		$("#justification").load("<?php echo base_url('charts/nonsuppression/justification');?>");
		$("#regimen").load("<?php echo base_url('charts/nonsuppression/regimen');?>");
		$("#sampleType").load("<?php echo base_url('charts/nonsuppression/sample_type');?>");
		$("#countys").load("<?php echo base_url('charts/nonsuppression/county_listings');?>");
		$("#partners").load("<?php echo base_url('charts/nonsuppression/partner_listing');?>");

		$(".display_date").load("<?php echo base_url('charts/nonsuppression/display_date'); ?>");

		$('#filter_form').submit(function( event ) {
         
	        // Stop form from submitting normally
	        event.preventDefault();
	        
	        // Get some values from elements on the page:
	        var $form = $( this ),
	        em = $form.find( "select[name='county']" ).val(),
	        url = $form.attr( "action" );
	        
	        // Send the data using post
	        var posting = $.post( url, { county: em } );
	     
	        // Put the results in a div
	        posting.done(function( data ) {
	          	$.get("<?php echo base_url();?>template/breadcrum", function(data){
	        		$("#breadcrum").html(data);
	        	});
	        	$.get("<?php echo base_url();?>template/dates", function(data){
	        		obj = $.parseJSON(data);
			
					if(obj['month'] == "null" || obj['month'] == null){
						obj['month'] = "";
					}
					$(".display_date").html("( "+obj['year']+" "+obj['month']+" )");
					
	        	});

	        	$("#genderGrp").html("<div>Loading...</div>"); 
	        	$("#ageGrp").html("<div>Loading...</div>"); 
				$("#justification").html("<div>Loading...</div>");
				$("#regimen").html("<div>Loading...</div>");
				$("#sampleType").html("<div>Loading...</div>");
				$("#countys").html("<div>Loading...</div>");
				$("#regimens").html("<div>Loading...</div>");
				$("#partners").html("<div>Loading...</div>");
				
				$("#notification").load("<?php echo base_url('charts/nonsuppression/notification');?>/"+null+"/"+null+"/"+data);
		 		$("#genderGrp").load("<?php echo base_url('charts/nonsuppression/gender_group');?>/"+null+"/"+null+"/"+data);
		 		$("#ageGrp").load("<?php echo base_url('charts/nonsuppression/age_group');?>/"+null+"/"+null+"/"+data);
				$("#justification").load("<?php echo base_url('charts/nonsuppression/justification');?>/"+null+"/"+null+"/"+data);
				$("#regimen").load("<?php echo base_url('charts/nonsuppression/regimen');?>/"+null+"/"+null+"/"+data);
				$("#sampleType").load("<?php echo base_url('charts/nonsuppression/sample_type');?>/"+null+"/"+null+"/"+data);
				$("#countys").load("<?php echo base_url('charts/nonsuppression/county_listings');?>/"+null+"/"+null+"/"+data);
				$("#partners").load("<?php echo base_url('charts/nonsuppression/partner_listing');?>/"+null+"/"+null+"/"+data);
	        });
    	});

	});

	function date_filter(criteria, id)
 	{
 		if (criteria === "monthly") {
 			year = null;
 			month = id;
 		}else {
 			year = id;
 			month = null;
 		}

 		var posting = $.post( '<?php echo base_url();?>suppression/Nosuppression/set_filter_date', { 'year': year, 'month': month } );

 		// Put the results in a div
		posting.done(function( data ) {
			obj = $.parseJSON(data);
			
			if(obj['month'] == "null" || obj['month'] == null){
				obj['month'] = "";
			}
			$(".display_date").html("( "+obj['year']+" "+obj['month']+" )");
			
		});
 		
 		
 		$("#genderGrp").html("<div>Loading...</div>");
 		$("#ageGrp").html("<div>Loading...</div>"); 
		$("#justification").html("<div>Loading...</div>");
		$("#regimen").html("<div>Loading...</div>");
		$("#sampleType").html("<div>Loading...</div>");
		$("#countys").html("<div>Loading...</div>");
		$("#partners").html("<div>Loading...</div>");
		
		$("#notification").load("<?php echo base_url('charts/nonsuppression/notification');?>/"+year+"/"+month);
 		$("#genderGrp").load("<?php echo base_url('charts/nonsuppression/gender_group');?>/"+year+"/"+month);
 		$("#ageGrp").load("<?php echo base_url('charts/nonsuppression/age_group');?>/"+year+"/"+month);
		$("#justification").load("<?php echo base_url('charts/nonsuppression/justification');?>/"+year+"/"+month);
		$("#regimen").load("<?php echo base_url('charts/nonsuppression/regimen');?>/"+year+"/"+month);
		$("#sampleType").load("<?php echo base_url('charts/nonsuppression/sample_type');?>/"+year+"/"+month);
		$("#countys").load("<?php echo base_url('charts/nonsuppression/county_listings');?>/"+year+"/"+month);
		$("#partners").load("<?php echo base_url('charts/nonsuppression/partner_listing');?>/"+year+"/"+month);
	}

	function county_filter(data)
	{
		$.get("<?php echo base_url();?>template/breadcrum", function(data){
			console.log(data);
    		$("#breadcrum").html(data);
    	});

		$("#genderGrp").html("<div>Loading...</div>"); 
    	$("#ageGrp").html("<div>Loading...</div>"); 
		$("#justification").html("<div>Loading...</div>");
		$("#regimen").html("<div>Loading...</div>");
		$("#sampleType").html("<div>Loading...</div>");
		$("#countys").html("<div>Loading...</div>");
		$("#partners").html("<div>Loading...</div>");
		
		$("#notification").load("<?php echo base_url('charts/nonsuppression/notification');?>/"+null+"/"+null+"/"+data);
 		$("#genderGrp").load("<?php echo base_url('charts/nonsuppression/gender_group');?>/"+null+"/"+null+"/"+data);
 		$("#ageGrp").load("<?php echo base_url('charts/nonsuppression/age_group');?>/"+null+"/"+null+"/"+data);
		$("#justification").load("<?php echo base_url('charts/nonsuppression/justification');?>/"+null+"/"+null+"/"+data);
		$("#regimen").load("<?php echo base_url('charts/nonsuppression/regimen');?>/"+null+"/"+null+"/"+data);
		$("#sampleType").load("<?php echo base_url('charts/nonsuppression/sample_type');?>/"+null+"/"+null+"/"+data);
		$("#countys").load("<?php echo base_url('charts/nonsuppression/county_listings');?>/"+null+"/"+null+"/"+data);
		$("#partners").load("<?php echo base_url('charts/nonsuppression/partner_listing');?>/"+null+"/"+null+"/"+data);
	}
</script>