<div class='row'>
	<div class="col-md-10">
		<div class="paging">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
			</ul>
		</div>
	</div>
	<div class="col-md-2 text-right strong ">
		<?php echo $this->Paginator->counter('{:start} - {:end} of {:count}'); ?>
	</div>	
</div>

<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
	<!-- Table heading -->
	<thead>
		<tr class='bg-inverse'>
			<th width="60px" <?php echo $style;?>>Contact ID#</th>
			<th width="65px" <?php echo $style;?>>Name</th>
			<th width="140px" <?php echo $style;?>>Contact #</th>
			<th width="72px" <?php echo $style;?>>Vehicle</th>
			<th width="60px" <?php echo $style;?>>Status</th>
			<th width="200px"  <?php echo $style;?>>Email</th>
			<th width="200px"  <?php echo $style;?>>Type</th>
			<th width="45px" <?php echo $style;?>>Occurred On</th>
		</tr>
		
		<?php foreach($statistics as $details){ 	?>
			<tr>
				<td><?php echo $details['EblastStatistic']['contact_id'];?> </td>
				<td><?php echo $details['Contact']['first_name']." ".$details['Contact']['m_name']." ".$details['Contact']['last_name'];?> </td>
				<td>
				 <?php $phone = $details['Contact']['mobile'];
            $phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
            $cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
            echo $cleaned;?>
				 </td>
				<td> <?php echo $details['Contact']['condition']." ".$details['Contact']['year']." ".$details['Contact']['make']." ".$details['Contact']['model'];?> </td>
				<td><?php echo $details['Contact']['status'];?> </td>
				<td><?php echo $details['EblastStatistic']['email'];?> </td>
				<td>
					<?php echo $details['EblastStatistic']['event_type'];?> 
					<?php if($details['EblastStatistic']['event_type'] == 'processed'
					 || $details['EblastStatistic']['event_type'] == 'delivered' 
					 || $details['EblastStatistic']['event_type'] == 'open'   ){ ?> 
					 <span class='fa fa-check text-success'><i></i></span>
					<?php } ?> 

					<?php if($details['EblastStatistic']['event_type'] == 'bounce'
					 || $details['EblastStatistic']['event_type'] == 'unsubscribe' 
					 || $details['EblastStatistic']['event_type'] == 'dropped' 
					 || $details['EblastStatistic']['event_type'] == 'spamreport' 

					   ){ ?> 
					 <span class='fa fa-check text-danger'><i></i></span>
					<?php } ?> 


				</td>
				<td> <?php echo date("n/j/Y H:i:s",$details['EblastStatistic']['tstmp']);?></td>
			</tr>
		<?php
		}
		?>
		
	</thead>
	<tbody>
</table>
<script>
$(function(){

	//Pagination Starts
	$(".paging a,a.sortLeads" ).addClass("no-ajaxify");
	$(".paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		var parent_classs = $(this).parent('li').attr("class");
		if(parent_classs != 'disabled'){
			$.ajax({
				url: $(this).attr('href'),
				type: "get",
				cache: false,
				success: function(results){ 
					$('.bootbox-body').html(results);
				}
			});
		}
	});
	//Pagination Ends



});
</script>