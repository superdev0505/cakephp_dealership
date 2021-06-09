<?php //debug($this->request->params['pass'][0]); ?>

<?php
function pr_stat($val, $type, $eblastid){

	if($val != null){

		if($val == 0){
			return $val;
		}else{
			return '<a class="eblast_details_link no-ajaxify" onclick="open_stat_details(this)"  report_url="/marketing_apps/StatisticsDetails/'.$type.'/'.$eblastid.'/" href="javascript:" >'.$val.'</a>';
		}
	}else{
		return "0";
	}
}
	
function open_percentage($total_opened = 0, $total_delivered = 0){

		if($total_opened == null){
			$total_opened = 0;
		}
		if($total_delivered == null){
			$total_delivered = 0;
		}

		if($total_opened == '0' && $total_delivered == '0'){
			return $open_percent = 0;
		}else if($total_opened == '0'){
			return $open_percent = 0;
		}else{
			return $open_percent = floor(($total_opened/$total_delivered) * 100 );
		}
}
?>		

	
	<div class="paging">
		<ul class="pagination margin-none">
			<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
			<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
			<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
		</ul>
	</div>
	<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
		<thead>
			<tr>
				<th style="width: 1%;" class="center">Ref#</th>
	            <th style="width: 20%;" >Campaign Name</th>
	            <th>Type</th>
				<th>Created On</th>
	            <th>Schedule</th>
				<th>Time</th>
	            <th>Status</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$eblast_types = array ( 'A' => 'Autoresponder', 'N' => 'Newsletter', 'M' => 'EblastApp' );
		foreach($eblasts as $eblast){

			if($eblast['EblastApp']['scheduled'] == '1'){
		 		$status = '<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i> Sent';	
		 	}else{
		 		$status = 'Not Sent';
		 	}
		?>
			<tr class="" >
				<td class="center" style="width: 41px;"><?php echo $eblast['EblastApp']['id']; ?></td>
	            <td class="important" style="width: 130px;"><?php echo $eblast['EblastApp']['campaign_name']; ?></td>
	            <td><?php echo $eblast_types[$eblast['EblastApp']['template_type']]; ?></td>
	            <td><?php echo $this->Time->format('M d, Y', $eblast['EblastApp']['created_date']); ?></td>
	            <td>
	            	<?php 
	            		if($eblast['EblastApp']['template_type'] == 'N'){
	            			echo $this->Time->format('M d, Y', $eblast['EblastApp']['last_scheduled_at']); 
	            		}else{
	            			echo $this->Time->format('M d, Y', $eblast['EblastApp']['date_start']); 	
	            		}
	            		
	            	?>
	            </td>
				<td><?php echo date("h:i A",strtotime($eblast['EblastApp']['schedule_time'])); ?></td>
	            <td><?php echo $status; ?></td>
			</tr>



			<tr class="" >
				<td>
				</td>	
				<td colspan="6">

					<table class="table table-condensed table-striped table-inverse table-vertical-center">
						<thead>
							<tr >
								<th class="bg-inverse" >Delivered</th>
								<th class="bg-inverse" >Opens</th>
								<th class="bg-inverse" >Deferred</th>
								<th class="bg-inverse" >Clicks</th>
								<th class="bg-inverse" >Unsubscribes</th>
								<th class="bg-inverse" >Bounces</th>
								<th class="bg-inverse" >Spams</th>
							</tr>
		<tr >
			<td><?php echo pr_stat($eblast_s[ $eblast['EblastApp']['id'] ]['processed'], 'send', $eblast['EblastApp']['id'] ); ?></td>
			<td><?php 
				// debug($eblast_s);
				echo pr_stat($eblast_s[ $eblast['EblastApp']['id'] ]['open'], 'open', $eblast['EblastApp']['id'] ); 
				echo "&nbsp; (".open_percentage($eblast_s[ $eblast['EblastApp']['id'] ]['open'], $eblast_s[ $eblast['EblastApp']['id'] ]['processed'])."%)";
			?></td>
			<td><?php echo pr_stat($eblast_s[ $eblast['EblastApp']['id'] ]['deferred'], 'deferral', $eblast['EblastApp']['id'] ); ?></td>
			<td><?php echo pr_stat($eblast_s[ $eblast['EblastApp']['id'] ]['click'], 'click', $eblast['EblastApp']['id'] ); ?></td>
			<td><?php echo pr_stat($eblast_s[ $eblast['EblastApp']['id'] ]['unsubscribe'], 'unsub', $eblast['EblastApp']['id'] ); ?></td>
			<td><?php echo pr_stat($eblast_s[ $eblast['EblastApp']['id'] ]['bounced'], 'bounced', $eblast['EblastApp']['id'] ); ?></td>
			<td><?php echo pr_stat($eblast_s[ $eblast['EblastApp']['id'] ]['spamreport'], 'spam', $eblast['EblastApp']['id'] ); ?></td>
		</tr>
						</thead>
					</table>


				</td>

			</tr>	







		<?php } ?>
		
		
			
		</tbody>
	</table>

	<script>


	function open_stat_details(ele){
  		//event.preventDefault();
		uurl = $(ele).attr('report_url');
		$.ajax({
			type: "GET",
			cache: false,
			url: uurl,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "<b>Statistics Details </b>",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
	}




$(function(){





	


	$(".paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){ 
				<?php if($this->request->params['pass'][0] == 'M'){ ?>
					$("#tab-1").html(results);
				<?php }else if($this->request->params['pass'][0] == 'N'){ ?>
					$("#tab-2").html(results);
				<?php } ?>	
				
			}
		});
	});



		



	
});

</script>












