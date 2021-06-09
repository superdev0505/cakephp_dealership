</br></br>
<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php
$step_procces = AuthComponent::user('step_procces');
//echo $step_procces;
?>

<?php
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');

//echo $uname;
?>

<?php
if ($step_procces === "lemco_steps") {
    $options = array('Pending'=>'Pending','Meet' => 'Meet-Step 1', 'Greet' => 'Greet-Step 2', 'Probe' => 'Probe-Step 3', 'Sit On' => 'Sit On-Step 4', 'Sit Down' => 'Sit Down-Step 5', 'Write Up' => 'Write Up-Step 6', 'Close' => 'Close-Step 7', 'F/I' => 'F/I-Step 8', 'Sold' => 'Sold-Step 9');
} else {
    $options = array('Connect' => 'Connect', 'Understand' => 'Understand', 'Satisfy' => 'Satisfy', 'Trial Close' => 'Trial Close', 'Obtain Commitment' => 'Obtain Commitment', 'Maintain Realationship' => 'Maintain Realationship');
}
?>

<?php
$date = new DateTime();
date_default_timezone_set($zone);


$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-1 month', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;
?>
<br>
<br>
<?php 
$selected_lead_type = (isset($this->request->params['pass'][0]))? $this->request->params['pass'][0] : "" ;
?>
<div class="innerLR">
			
			<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
			
			<div class="widget widget-body-white">
				<div class="widget-body">
					
					<div class="row">
						<?php echo $this->Form->create('Deal', array('url' => array_merge(array('action' => 'search_result'), $this->params['pass']),'autocomplete'=>"off", 'class' => 'form-inline no-ajaxify')); ?>
						<div class="col-md-3">
							<?php
							echo $this->Form->select('search_deal_status_id', array(
								'4' => 'In Process',
								'5' => 'Accepted',
								'6' => 'Rejected',
							), array('div' => false,  'class'=>"form-control", 'style' => 'width: 100%', 'empty' => 'Deal Status'));
							?>
						</div>
						<div class="col-md-3">
							<button type="submit" id="btn-submit-search" class="btn btn-inverse pull-right no-ajaxify"><i class="icon-search"></i></button>
							<div class="overflow-hidden">
								<?php echo $this->Form->input('search_all',array('class'=>'form-control','placeholder'=>'Other Deal Search','div' => false, 'label'=>false)); ?>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
						
						<div class="col-md-4">
							<button class="btn btn-inverse" data-toggle="collapse" data-target="#advance-search"><i class="fa fa-search"></i> Advance Deal Search</button>
						</div>
						
					</div>
					
					<div id="advance-search" class="collapse">
					<div class="innerAll">
						
						
						<!-- Advance search -->
						<?php echo $this->Form->create('Deal', array('type'=>'GET','url' => array('action' => 'search_result'),'id'=>'ContactLeadsForm2','class' => 'form-inline no-ajaxify')); ?>
						<div class="row">
							<div class="col-md-3">
								<?php echo $this->Form->label('search_name','Name:'); ?>
								<?php echo $this->Form->input('search_name',array('div'=>false,'class'=>'form-control','label'=>false,'placeholder'=>'Name')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->label('search_amount','Amount:'); ?>
								<?php echo $this->Form->input('search_amount',array('div'=>false,'class'=>'form-control','label'=>false,'placeholder'=>'Amount')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->label('search_date_from','From:'); ?>
								<?php echo $this->Form->input('search_date_from',array('div'=>false,'class'=>'form-control','label'=>false)); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->label('search_date_to','To:'); ?>
								<?php echo $this->Form->input('search_date_to',array('div'=>false,'class'=>'form-control','label'=>false)); ?>
								<div class="separator"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="pull-right">
									<button type="submit" id="submit_advance_search_filter" class="btn btn-success no-ajaxify"><i class="fa fa-search"></i> Filter</button>
								</div>
							</div>
						</div>
						
						<?php echo $this->Form->end(); ?>
						<!-- // Advance search end -->
						
						
						
					</div>
				</div>
				</div>
			</div>	
	
			
	


<!-- Widget -->
	<div class="wizard">
	
		<div class="widget widget-heading-simple widget-body-white widget-employees">
			<div class="widget-body padding-none">
				
				<div class="row row-merge">
					<div class="col-md-3 listWrapper">
						<div id="search-result-content"></div>
					</div>
					<div class="col-md-9 detailsWrapper">
						<div class="ajax-loading hide">
							<i class="icon-spinner icon-spin icon-4x"></i>
						</div>
						<div id="lead_details_content"></div>
					</div>
				</div>
				
			</div>
		</div>
	
	</div>
<!-- // Widget END -->		

</div>

<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	

		$(".alert").delay(3000).fadeOut("slow");
	
		
		
		$("#DealSearchDateFrom").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#DealSearchDateTo').bdatepicker('setStartDate', startDate);
			
		});
		
		$("#DealSearchDateTo").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#DealSearchDateFrom').bdatepicker('setEndDate', FromEndDate);
		});
		
		//advance search
		$("#submit_advance_search_filter").click(function(event){
			$("#search-result-content").html("");
			$('.ajax-loading').removeClass('hide');
			$.ajax({
				type: "GET",
				cache: false,
				data: $(this).closest('form').serialize(),
				url:  $(this).closest('form').attr('action'),
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
					
					$("#advance-search").collapse('toggle');
					
				}
			});
			return false;
		});
		
		//quick search
		$("#btn-submit-search").click(function(event){
			$("#search-result-content").html("");
			$('.ajax-loading').removeClass('hide');
			event.preventDefault();
			var search_url = $(this).closest('form').attr('action') + "/search_deal_status_id:"+$("#DealSearchDealStatusId").val()+"/search_all2:"+$("#DealSearchAll").val()+"/search_all:"+$("#DealSearchAll").val()+"/search_all_value:";
			$.ajax({
				type: "POST",
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
			
		//load todays leads if search and viwe area is empty
		if( $("#lead_details_content").html() == "" && $("#search-result-content").html() == ""){
			$('.ajax-loading').removeClass('hide');
			$.ajax({
				type: "GET",
				cache: false,
				url:  "/deals/search_result/load_first/search_current_month:123",
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
		}	
			
		
		
		
		
	
	
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>

