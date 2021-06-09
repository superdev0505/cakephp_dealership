<?php
$zone = AuthComponent::user('zone');
//echo $zone;

$step_procces = AuthComponent::user('step_procces');
//echo $step_procces;

$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');
//echo $uname;

if ($step_procces === "lemco_steps") {
    $options = array('Meet' => 'Meet-Step 1', 'Greet' => 'Greet-Step 2', 'Probe' => 'Probe-Step 3', 'Sit On' => 'Sit On-Step 4', 'Sit Down' => 'Sit Down-Step 5', 'Write Up' => 'Write Up-Step 6', 'Close' => 'Close-Step 7', 'F/I' => 'F/I-Step 8', 'Sold' => 'Sold-Step 9');
} else {
    $options = array('Connect' => 'Connect', 'Understand' => 'Understand', 'Satisfy' => 'Satisfy', 'Trial Close' => 'Trial Close', 'Obtain Commitment' => 'Obtain Commitment', 'Maintain Realationship' => 'Maintain Realationship');
}

$date = new DateTime();
date_default_timezone_set($zone);

$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-30 day', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;
?>

<br>
<br>
<br>
<br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'alert')); ?>
	<div class="row">
		<div class="col-md-12">
			<!-- Widget -->
			<div class="widget widget-body-white">
				<!-- Widget heading -->
			
				<!-- // Widget heading END -->
				<div class="widget-body">
					<div class="separator bottom"></div>
					<!-- Filters -->
					<div class="filter-bar">
						<form class="margin-none form-inline" id="EblastsListingForm" action="<?php echo $this->webroot; ?>eblasts/search_result/selected_lead_type">
							<!-- Other Search -->
							<div class="form-group col-md-2 padding-none">
								<div class="input-group">
									<?php 
									echo $this->Form->input('search_all2', array(
										'div' => false,
										'class' => 'form-control',
										'label' => false,
										'placeholder' => 'Other Search',
										'value' => $search_all2
									));
									?>
									<span class="input-group-addon" style="cursor:pointer;" id="EblastsSearch"><i class="fa fa-search"></i></span>
									
								</div>
							</div>
							<!-- // Other Search END -->
							<!-- Quick Search -->
							<div class="form-group col-md-6 padding-none">
								<div class="col-md-12 padding-none">
									<?php
									$options = array ('M' => 'Eblast', 'N' => 'Newsletter');
									echo $this->Form->select('search_all', $options, array('div' => false, 'value' => $selected_type,  'class' => 'form-control','id' => 'EblastsSearchAll'));
									//Keep the state of Quick Search
									echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
									?>
								</div>
							</div>
							<!-- // Quick Search END -->
							<div class="pull-right"><a href="<?php echo $this->Html->url(array('action'=>'setup_eblast', $selected_type)); ?>" class="btn btn label-success"><font color="white">+ ADD NEW</font></a></div>
							<div class="clearfix"></div>
						</form>
					</div>
					<!-- // Filters END -->

					<div id="search-result-content">
                        <?php echo $this->element( 'eblasts_listing' ); ?>
					</div>

				</div>
				
				<?php echo $this->element('sql_dump'); ?>
				
			</div>
			<!-- // Widget END -->

<script type="text/javascript">

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>
	
	$(".alert").delay(3000).fadeOut("slow");

	$(".lnk_campaign_details").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			url:  $(this).attr('href'),
			success: function(data){
				
				
				bootbox.dialog({
					message: data,
					title: "Campaign Details",
					buttons: {
						success: {
							label: "Ok",
							className: "btn-success",
						},
					}
				});
				
				
				
				
			}
		});
		return false;
	});
	
	
	$('#EblastsOptSent').on('change', function(){
		location.href = "/eblasts/eblasts_list/"+$('#EblastsSearchAll').val();
	});

	$('#EblastsSearchAll').on('change', function(){
		location.href = "/eblasts/eblasts_list/"+$('#EblastsSearchAll').val();
	});
	$('#EblastsSearch').click(function(){
		location.href = "/eblasts/eblasts_list/"+$('#EblastsSearchAll').val()+"/?src="+$('#search_all2').val();
		/*
		$('.ajax-loading').addClass('show');
		$.ajax({
			type: "GET",
			cache: false,
			data: $("#EblastsListingForm").serialize(),
			url: '<?php echo $this->webroot; ?>eblasts/eblasts_listing/selected_lead_type:',
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		*/
		return false;
	});
	
	$('#EblastsListingForm').submit(function(){
		location.href = "/eblasts/eblasts_list/"+$('#EblastsSearchAll').val()+"/?src="+$('#search_all2').val();
		return false;
	});
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>
});
</script>