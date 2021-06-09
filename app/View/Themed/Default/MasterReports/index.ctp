<?php 
	function calculate_percent($val1, $val2){
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
		<select  class="form-control input-sm pull-right" id="master_report_type_s" style="width: 175px; display: inline-block">
			<option value="master_report_allsteps" >All Steps</option>
			<option value="index" selected='selected'>Higest Step Change</option>
		</select>
		
		<h3 class="text-primary pull-left">Entire Dealership - <?php echo $month_name; ?></h3>
	</div>
	<div class="separator"></div>
	
	
	
	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('deals_total'=>$deal_registers,'contact_status'=>0)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('bk'=>$salesperson_breakdown,'contact_status'=>0)); ?>
		</div>
	</div>
	
	
	<h3 class="text-primary">Showroom</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('deals_total'=>$deal_registers_showroom,'contact_status'=>7)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('bk'=>$showroom_salesperson_breakdown,'contact_status'=>7)); ?>
		</div>
	</div>
	
	
	<h3 class="text-primary">Web site</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('deals_total'=>$deal_registers_web,'contact_status'=>5,'weblead'=>true)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('bk'=>$web_salesperson_breakdown,'contact_status'=>5,'weblead'=>true)); ?>
		</div>
	</div>
	
	
	<h3 class="text-primary">Mobile</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('deals_total'=>$deal_registers_mobile,'contact_status'=>12)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('bk'=>$mobile_salesperson_breakdown,'contact_status'=>12)); ?>
		</div>
	</div>
	
	
	<h3 class="text-primary">Phone</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('deals_total'=>$deal_registers_phone,'contact_status'=>6)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('bk'=>$phone_salesperson_breakdown,'contact_status'=>6)); ?>
		</div>
	</div>
	
	
	<h3 class="text-primary">Entire Dealership - <?php echo $month_name; ?> (Inactive users)</h3>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Month Totals (Inactive)</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table', array('deals_total'=>$deal_registers_inactive,'contact_status'=>0)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Salesperson Stage Breakdown (Inactive)</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('break_down_table', array('bk'=>$salesperson_breakdown_inactive,'contact_status'=>0)); ?>
		</div>
	</div>
	
	
	
	
	
	<?php //debug($deal_registers); ?>
	
<script>
$(function(){

	$("#master_report_type_s").change(function(event){
		if( $(this).val() == 'master_report_allsteps'){
			
			//data_id=$("#LeadGroupStat").attr('data-id');
			group=$("#LeadGroupStat").val();
			/*if(data_id!='dealership')
			{
				group='all_builds';
			}*/
			$.ajax({
				type: "POST",
				cache: false,
				url:  "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'master_report_allsteps')) ?>/"+group,
				success: function(data){
					$("#report_data_container").html(data);
				}
			});
			
		}
			
	});

	
	$(".popup").click(function(event){
		
		event.preventDefault();
		
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
	
	
