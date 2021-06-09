
<?php 
	function calculate_percent($val1, $val2){
		//debug($val1);
		if($val2 == 0 && $val1 == 0)
			return 0;
		else if($val1 == 0 &&  $val2 == 0){
			return 0;
		}
		else if($val1 == 0 &&  $val2 != 0){
			return $val2 * 100;
		}
		else{
			return round( ($val2/$val1) * 100 ) ;
		}
	}
	function secondsToTime($seconds) {
		$dtF = new DateTime("@0");
		$dtT = new DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a d, %h h, %m m');
	}
?>
	<div class='clearfix'>
		<select  class="form-control input-sm pull-right" id="master_report_type_s" style="width: 175px; display: none;">
			<option value="master_report_allsteps" selected='selected'>All Steps</option>
			<option value="index">Higest Step Change</option>
		</select>

		<div class="row">
			
			<div class="col-md-6">
				<h3 class="text-primary">Entire Dealership - <?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?></h3>
			</div>
			<div class="col-md-6 text-right">



				<a class="btn btn-inverse print_btn" target="_blank" href="<?php 
			echo $this->Html->url(array('controller' => $this->request->params['controller'], 'action' => $this->request->params['action'], 'view_type'=>'print',  '?' =>  $this->request->query));
			?>"><i class="fa fa-print"></i> Print</a>
			</div>
		</div>
		



	</div>
	<div class="separator"></div>
	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('stat_type'=>'deal_registers','custom_step_map'=>$custom_step_map, 'deals_total'=>$deal_registers,'contact_status'=>0)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('stat_type'=>'salesperson_breakdown', 'custom_step_map'=>$custom_step_map, 'bk'=>$salesperson_breakdown,'contact_status'=>0)); ?>
		</div>
	</div>



	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Events (Showroom Sales Team)</h4>
		</div>
		<div class="widget-body innerAll">


			<table class="dynamicTable tableTools table table-bordered checkboxs " id="table-main">
				<tr class=''>
					<th>&nbsp;</th>
					<th>Todays Events</th>
					<th>Past Due Events</th>
				</tr>
				<?php 

				$total_today = 0;
				$total_overdue = 0;

				foreach ($today_user_id_user_name as $key => $value) { ?>

				<tr>
					<td class='text-primary'>
						<i class="fa fa-user"></i> <?php  echo $value; ?>
					</td>
					<td><?php  
					if(isset($today_events_by_user[$key])){
						echo ( $today_events_by_user[$key] != 0)?
							$this->Html->link( $today_events_by_user[$key],
								array('controller'=>'realtime_reports','action'=>'all_event_details','todays_event', $key, $dealer_id), array( 'class'=>'realtime_stat_details_master no-ajaxify')
							)
						  	: '0';
						  	$total_today = $total_today + $today_events_by_user[$key];
					}else{
						echo "0";
					}	  	


					?></td>
					<td><?php 
					if(isset($overdue_events_by_user[$key])){
						echo ($overdue_events_by_user[$key] != 0)?
							$this->Html->link( $overdue_events_by_user[$key],
								array('controller'=>'realtime_reports','action'=>'all_event_details','overdue', $key, $dealer_id), array('crmreport'=>true, 'class'=>'realtime_stat_details_master no-ajaxify')
							)
						  	: '0';
						  	$total_overdue = $total_overdue + $overdue_events_by_user[$key];
					}else{
						echo "0";
					}	  	

					?></td>
				</tr>	

				<?php } ?>


				<tr class="text-primary">
					<td>
						<strong>Total</strong>
					</td>
					<td><strong><?php  
					echo ( $total_today != 0)?
							$this->Html->link( $total_today,
								array('controller'=>'realtime_reports','action'=>'all_event_details','todays_event', 'all', $dealer_id), array('class'=>'realtime_stat_details_master no-ajaxify')
							)
						  	: '0';

					?></strong></td>	
					<td><strong><?php  
					echo ($total_overdue != 0)?
							$this->Html->link( $total_overdue,
								array('controller'=>'realtime_reports','action'=>'all_event_details','overdue', 'all', $dealer_id), array('class'=>'realtime_stat_details_master no-ajaxify')
							)
						  	: '0';



					?></strong></td>	
				</tr>	
			</table>	

			
		</div>
	</div>


	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Events (Internet Sales Team)</h4>
		</div>
		<div class="widget-body innerAll">


			<table class="dynamicTable tableTools table table-bordered checkboxs " id="table-main">
				<tr class=''>
					<th>&nbsp;</th>
					<th>Todays Events</th>
					<th>Past Due Events</th>
				</tr>
				<?php 

				$total_today = 0;
				$total_overdue = 0;

				foreach ($today_user_id_user_name_internet_sales as $key => $value) { ?>

				<tr>
					<td class='text-primary'>
						<i class="fa fa-user"></i> <?php  echo $value; ?>
					</td>
					<td><?php  
					if(isset($today_events_by_user[$key])){
						echo ( $today_events_by_user[$key] != 0)?
							$this->Html->link( $today_events_by_user[$key],
								array('controller'=>'realtime_reports','action'=>'all_event_details','todays_event', $key), array('class'=>'realtime_stat_details_master no-ajaxify')
							)
						  	: '0';
						  	$total_today = $total_today + $today_events_by_user[$key];
					}else{
						echo "0";
					}	  	


					?></td>
					<td><?php 
					if(isset($overdue_events_by_user[$key])){
						echo ($overdue_events_by_user[$key] != 0)?
							$this->Html->link( $overdue_events_by_user[$key],
								array('controller'=>'realtime_reports','action'=>'all_event_details','overdue', $key), array('class'=>'realtime_stat_details_master no-ajaxify')
							)
						  	: '0';
						  	$total_overdue = $total_overdue + $overdue_events_by_user[$key];
					}else{
						echo "0";
					}	  	

					?></td>
				</tr>	

				<?php } ?>


				<tr class="text-primary">
					<td>
						<strong>Total</strong>
					</td>
					<td><strong><?php  
					echo ( $total_today != 0)?
							$this->Html->link( $total_today,
								array('controller'=>'realtime_reports','action'=>'all_event_details','todays_event', 'all'), array('class'=>'realtime_stat_details_master no-ajaxify')
							)
						  	: '0';

					?></strong></td>	
					<td><strong><?php  
					echo ($total_overdue != 0)?
							$this->Html->link( $total_overdue,
								array('controller'=>'realtime_reports','action'=>'all_event_details','overdue', 'all'), array('class'=>'realtime_stat_details_master no-ajaxify')
							)
						  	: '0';



					?></strong></td>	
				</tr>	
			</table>	

			
		</div>
	</div>



















	
	<h3 class="text-primary">Showroom</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('stat_type'=>'deal_registers_showroom', 'custom_step_map'=>$custom_step_map, 'deals_total'=>$deal_registers_showroom,'contact_status'=>7)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('stat_type'=>'showroom_salesperson_breakdown', 'custom_step_map'=>$custom_step_map, 'bk'=>$showroom_salesperson_breakdown,'contact_status'=>7)); ?>
		</div>
	</div>
	
	
	<h3 class="text-primary">Web site</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('stat_type'=>'deal_registers_web', 'custom_step_map'=>$custom_step_map, 'deals_total'=>$deal_registers_web,'contact_status'=>5,'weblead'=>true)); ?>
		</div>
	</div>
	<div class="widget page-break">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('stat_type'=>'web_salesperson_breakdown', 'custom_step_map'=>$custom_step_map, 'bk'=>$web_salesperson_breakdown,'contact_status'=>5,'weblead'=>true)); ?>
		</div>
	</div>
	
	
	<h3 class="text-primary">Mobile</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('stat_type'=>'deal_registers_mobile', 'custom_step_map'=>$custom_step_map, 'deals_total'=>$deal_registers_mobile,'contact_status'=>12)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('stat_type'=>'mobile_salesperson_breakdown', 'custom_step_map'=>$custom_step_map, 'bk'=>$mobile_salesperson_breakdown,'contact_status'=>12)); ?>
		</div>
	</div>
	
	
	<h3 class="text-primary">Phone</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('stat_type'=>'deal_registers_phone', 'custom_step_map'=>$custom_step_map, 'deals_total'=>$deal_registers_phone,'contact_status'=>6)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('stat_type'=>'phone_salesperson_breakdown', 'custom_step_map'=>$custom_step_map, 'bk'=>$phone_salesperson_breakdown,'contact_status'=>6)); ?>
		</div>
	</div>
	
	
	
	
	
	
	
	
	<?php //debug($deal_registers); ?>
	
<script>
$(function(){


	$(".realtime_stat_details_master").click(function(e){
		e.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(data!='Not Found')
				{
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Master Report Details",
				}).find("div.modal-dialog").addClass("modal1180");
				}
			}
		});
		
	});



	$(".popup_details").click(function(e){
		e.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(data!='Not Found')
				{
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Master Report Details",
				}).find("div.modal-dialog").addClass("modal1180");
				}
			}
		});
		
	});
	

	$("#master_report_type_s").change(function(event){
		return false;
		if( $(this).val() == 'index'){
			//data_id=$("#LeadGroupStat").attr('data-id');
			//group=$("#LeadGroupStat").val();
			/*if(data_id!='dealership')
			{
				group='all_builds';
			}*/
			$.ajax({
				type: "POST",
				cache: false,
				url:  "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'index')) ?>/index/",
				success: function(data){
					$("#report_data_container").html(data);
				}
			});
			
		}
			
	});
	
	$(".popup").click(function(event){
		
		event.preventDefault();
		return false;
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Report",
				});
			}
		});
		
	});


});

</script>