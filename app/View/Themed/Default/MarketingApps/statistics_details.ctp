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
			<th <?php echo $style;?>>Email</th>
			<th <?php echo $style;?>>Type</th>
			<th <?php echo $style;?>>Occurred On</th>
		</tr>
		
		<?php 

		$type_def = array(
			'hard_bounce' => 'Bounces',
			'soft_bounce' => 'Bounces',
			'unsub' => 'Unsubscribes',
			'spam' => 'Spams',
			'send' => 'Delivered',
			'open' => 'Open',
			'deferral' => 'Deferred'
		);


		foreach($statistics as $details){ 	?>
			<tr>
				<td><?php echo $details['EblastStatistic']['email'];?> </td>
				<td>
					<?php echo $type_def[$details['EblastStatistic']['event_type']];?> 
					<?php if($details['EblastStatistic']['event_type'] == 'send'
					 || $details['EblastStatistic']['event_type'] == 'open'   ){ ?> 
					 <span class='fa fa-check text-success'><i></i></span>
					<?php } ?> 

					<?php if(
						$details['EblastStatistic']['event_type'] == 'hard_bounce'
					||	$details['EblastStatistic']['event_type'] == 'soft_bounce'
					 || $details['EblastStatistic']['event_type'] == 'unsub' 
					 || $details['EblastStatistic']['event_type'] == 'spam' 

					   ){ ?> 
					 <span class='fa fa-check text-danger'><i></i></span>
					<?php } ?> 


				</td>
				<td> <?php echo date("n/j/Y H:i:s", strtotime($details['EblastStatistic']['created']));?></td>
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












