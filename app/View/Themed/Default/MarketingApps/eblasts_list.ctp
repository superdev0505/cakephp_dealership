<style>
.largeWidth3 {
    margin: 0 auto;
    width: 1180px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
	
}
</style>
<style type="text/css">

.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}


</style>
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
							<div class="pull-right"><a href="<?php echo $this->Html->url(array('action'=>'setup_eblast', $selected_type)); ?>" class="btn btn label-success no-ajaxify"><font color="white">+ ADD NEW</font></a></div>
							<div class="clearfix"></div>
						</form>
					</div>
					<!-- // Filters END -->

					<div id="search-result-content">
                        




						<?php 
						$eblast_types = array ( 'A' => 'Autoresponder', 'N' => 'Newsletter', 'M' => 'Eblast' );
						$options_status = array ('not_sent' => 'Not sent', 'sent' => 'Sent');
						?>
						<!-- Products table -->
						<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
						    <thead>
						        <tr>
						            <th style="width: 1%;" class="center">Ref#</th>
						            <th style="width: 20%;" >Campaign Name</th>
						            <th>Recipient List</th>
						            <th>Type</th>
									<th>Created On</th>
						            <th>Schedule</th>
									<th>Time</th>
						            <th>Status</th>
									<th style="text-align:center;">Action</th>
						        </tr>
						    </thead>
						    <tbody>
						        <?php
						        foreach($eblasts as $eblast) {
									 	
									 	if($eblast['EblastApp']['scheduled'] == '1'){
									 		$status = '<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i> Sent';	
									 	}else{
									 		$status = 'Not Sent';
									 	}
										 
									
									
									
									if( $eblast['EblastApp']['template_type']=='M' ){
										$schedule = $this->Time->format('M d, Y', $eblast['EblastApp']['date_start']);
									}else if( $eblast['EblastApp']['template_type']=='N' ){

										$schedule = $this->Time->format('M d, Y', $eblast['EblastApp']['last_scheduled_at']);

									}else{
										
										$schedule_options = array(
											'daily' => 'Daily',
											'weekly' => 'Weekly',
											'monthly' => 'Monthly',
											'yearly' => 'Yearly'
										);
										$schedule = $schedule_options[$eblast['EblastApp']['schedule_at']];
										$schedule_other = '';
										if($eblast['EblastApp']['schedule_at']=='yearly'){
											$schedule_other = $eblast['EblastApp']['month'].", Day-".$eblast['EblastApp']['day_no'];
										}elseif($eblast['EblastApp']['schedule_at']=='monthly'){
											$schedule_other = "Day-".$eblast['EblastApp']['day_no'];
										}elseif($eblast['EblastApp']['schedule_at']=='weekly'){
											$schedule_other = "Every ".$eblast['EblastApp']['week_day'];
										}
										if($schedule_other!=''){
											$schedule .=' ( '.$schedule_other.' )';
										}
									}
									unset($form_filters);
						            if($eblast['EblastApp']['form_filters']!='') {
						                $form_filters = json_decode( $eblast['EblastApp']['form_filters'] );
						            }
						        ?>
						        <tr class="selectable" style="">
						            <td class="center" style="width: 41px;"><?php echo $eblast['EblastApp']['id']; ?></td>
						            <td class="important" style="width: 130px;">
										<?php echo $eblast['EblastApp']['campaign_name']; ?>
									</td>
									<td>
										<?php if($eblast['List']['list_name'] != ''){ ?>

											<?php //echo $this->Html->link($eblast['List']['list_name']." ({$eblast['List']['total_recipient']})", array('controller'=>'recipients', 'action'=>'add', '?'=>array('key'=>base64_encode($eblast['List']['id']))) ); ?>
											<u><?php echo $this->Html->link("Recipient (List) - (Test Send)", array('controller'=>'marketing_apps', 'action'=>'eblast_recipient', '?'=>array( 'eblast_appid'=>base64_encode($eblast['EblastApp']['id']),  'list_key'=>base64_encode($eblast['List']['id']))), array("class"=>"eblast_recipient_list no-ajaxify") ); ?></u>
										<?php }else{ ?>

											<u><?php echo $this->Html->link("Recipient - (Test Send)", array('controller'=>'marketing_apps', 'action'=>'eblast_recipient', '?'=>array( 'key'=>base64_encode($eblast['EblastApp']['id'])) ), array("class"=>"eblast_recipient_list no-ajaxify") ); ?></u>


										<?php } ?>
									</td>
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
									<td style="width:260px;">
										<div class="make-switch" style="" data-on="success" data-off="default">
										<input class="active_eblast" name="active_eblast_<?php echo $eblast['EblastApp']['id'];?>" id="active_eblast_<?php echo $eblast['EblastApp']['id'];?>" type="checkbox"  <?php if(isset($eblast['EblastApp']['active']) && $eblast['EblastApp']['active'] == 1)  echo 'checked="checked"'; else echo ''; ?>  value="<?php echo $eblast['EblastApp']['id'];?>"    />
										</div>
										&nbsp;
										<?php echo $this->Html->link("Full Stats", 
											array('controller'=>'marketing_apps','action'=>'statistics', $eblast['EblastApp']['id']), 
											array('class'=>'no-ajaxify btn btn-primary','escape'=>false)); 
										?>
										 <a class="btn btn-primary no-ajaxify btn_eblast_delete"
										 style="float:right;" eblast_delete_id='<?php echo $eblast['EblastApp']['id']; ?>'  data-toggle="modal" href="#modal_delete_account"><i class="glyphicon glyphicon-trash"></i></a>

									</td>

									
									
						        </tr>
						        <?php } ?>
						    </tbody>
						</table>
						<!-- // Products table END -->
						<!-- Options -->
						<div class=""><a href="<?php echo $this->Html->url(array('controller' => 'marketing', 'action'=>'index')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
						    <div class="pull-right">
						        <ul class="pagination margin-none">
						            <?php echo $this->Paginator->prev('<<'); ?>
						            <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
						            <?php echo $this->Paginator->next('>>'); ?>
						        </ul>
						    </div>
						    <div class="clearfix"></div>
						<!-- // Pagination END -->
						</div>
						<!-- // Options END -->
						



					</div>

				</div>
				
				<?php echo $this->element('sql_dump'); ?>
				
			</div>
			<div class="modal fade" id="modal_delete_account" tabindex="-1" role="dialog" 
				aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog" role="document">
			        <div class="modal-content">
			          	<div class="modal-header">
			                <h5 class="modal-title" id="exampleModalLabel">Delete eblast</h5>
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
				            </button>
			          	</div>
			          	<div class="modal-body">
			               <p style="font-size:18px;font-weight:600;">Do you want to delete the eblast?</p>
			          	</div>
				      	<div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">no</button>
					        <button type="button" class="btn btn-info btn-del">yes</button>
				      	</div>
			        </div>
			  	</div>
			</div>
			<!-- // Widget END -->

<script type="text/javascript">

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>

	

		$(".eblast_recipient_list").click(function(e){
			e.preventDefault();
			
			$.ajax({
				type: "GET",
				cache: false,
				url: $(this).attr('href'),
				success: function(data){
					
					bootbox.dialog({
						message: data,
						backdrop: true,
						title: "Eblast Recipient",
					}).find("div.modal-dialog").addClass("largeWidth3");

				}
			});
			
		});

		$(".btn_eblast_delete").click(function(event){
			event.preventDefault();
			var del_id = $(this).attr("eblast_delete_id");
			$(".btn-del").click(function(){
				$.ajax({
					type: "GET",
					cache: false,
					url: "/marketing_apps/eblasts_delete",
					data: {'contact_eblast_id':del_id },
					success: function(data){
					 	window.location = '/marketing_apps/eblasts_list/M';
					}
				});
				$('#modal_delete_account').modal('hide');
			});
		});

		$('.active_eblast').change(function(){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				data: {'active': $(this).is(":checked"),'id':$(this).val()},
				url:  "/marketing_apps/activate_eblasts/",
				success: function(data){
					
				}
			});
			
		});


	
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
		location.href = "/marketing_apps/eblasts_list/"+$('#EblastsSearchAll').val();
	});

	$('#EblastsSearchAll').on('change', function(){
		location.href = "/marketing_apps/eblasts_list/"+$('#EblastsSearchAll').val();
	});
	$('#EblastsSearch').click(function(){
		location.href = "/marketing_apps/eblasts_list/"+$('#EblastsSearchAll').val()+"/?src="+$('#search_all2').val();
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
		location.href = "/marketing_apps/eblasts_list/"+$('#EblastsSearchAll').val()+"/?src="+$('#search_all2').val();
		return false;
	});
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>
});
</script>