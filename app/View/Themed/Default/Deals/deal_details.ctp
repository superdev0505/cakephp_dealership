<?php $custom_form_dealer_ids=array(5000,1224, 829, 830);
$dealer_id=AuthComponent::user('dealer_id');
$dealer=AuthComponent::user('dealer');
?>
<style>
.largeWidth {
    margin: 0 auto;
    width: 1084px;
}
.history-icon.glyphicons i:before {
	font-size: 14px;
}

.history-icon {
	margin-top: -18px;
	padding-left: 22px;
}
.dynamic_height
{
	height:97% !important;
}
div.dynamic_height div.modal-dialog div.modal-content
{
	height:97% !important;
}
</style>
<?php
$selected_lead_type = "";
if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
	$selected_lead_type = $this->request->params['named']['selected_lead_type'];
}
?>
<div class="innerAll">
	<div class="title">
		<div class="row">
			<div class="col-md-8">
				<div class="clearfix">
					<div class="pull-left"><img style="width: 30px;" src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" alt="Profile" class="" /></div>
					<h3 class="text-primary margin-none pull-left innerR" style="word-break: break-all;"><?php echo $deal['Deal']['first_name'] . "&nbsp;" . $deal['Deal']['last_name'];  ?></h3>
				<strong>Company:</strong> <?php echo $deal['Contact']['company_work']; ?>
                </div>

			</div>
			<div class="col-md-4 text-right">
            <a href="#" class="btn btn-primary deal_add_new" contact_id="<?php echo $deal['Contact']['id']; ?>" ><i class="fa fa-pencil"></i> Forms</a>

				<?php /*?><a href="<?php echo $this->Html->url(array('action'=>'deals_input_edit', $deal['Deal']['id'], 'selected_lead_type'=> $selected_lead_type )); ?>" class="btn btn-primary" >
					<i class="fa fa-pencil"></i> Credit App
				</a>

				<!-- <a href="<?php echo $this->Html->url(array('action'=>'work_sheet', $deal['Deal']['id'])); ?>" id="load_worksheet" class="btn btn-primary no-ajaxify" >
					<i class="fa fa-pencil"></i> Work Sheet
				</a> -->
				<a id="load_worksheet" href="<?php echo $this->Html->url(array('action'=>'work_sheet2', $deal['Deal']['id'])); ?>" class="btn btn-primary no-ajaxify" >
					<i class="fa fa-pencil"></i> WorkSheet
				</a>
				<?php */?>
			 </div>
		</div>

        <div class="row">
			<div class="col-md-12">

				<?php //debug($deal); ?>

				<ul class="list-unstyled list-group-1">

					<li> <strong>Customer at</strong> (<?php echo $deal['Contact']['company']; ?>) </li>

					<li><i class="fa fa-home"></i> <strong>Address:</strong> <?php echo $deal['Contact']['address']; ?>,
						<strong>City:</strong> <?php echo $deal['Contact']['city']; ?>,
						<?php
						$state_label = 'State';
						if(empty($deal['Contact']['country'])|| $deal['Contact']['country'] == 'United States'){
						?>
                        <strong>County:</strong> <?php echo $deal['Contact']['county']; ?>,
						<?php } else{
						$state_label = $this->App->getStateLabels($deal['Contact']['country']);
						} ?>
                        <strong><?php echo $state_label; ?>:</strong> <?php echo $deal['Contact']['state']; ?>,
						<strong>Zip:</strong> <?php echo $deal['Contact']['zip']; ?>

					</li>

					<li>

						<i class="fa fa-envelope"></i> <strong>Email:</strong> <span style="/* word-break: break-all; */ ">
							<a style="display: inline; font-size: 12px; font-weight: normal; padding: 1px 5px; color:#3695D5"  href="/user_emails/compose/contact/<?php echo $deal['Contact']['id']; ?>"><u><?php echo $deal['Contact']['email']; ?></u></a>


						<i class="fa fa-mobile"></i> <strong>Mobile:</strong>
						<?php $phone = $deal['Contact']['mobile'];
						$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
						$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it

						//echo $cleaned;
						echo $this->Dncprocess->show_phone(
						$dnc_manual_uplaod_process,
						$deal['Contact']['dnc_status'],
						$cleaned,
						$deal['Contact']['modified'],
					 	$deal['Contact']['sales_step']);


						?>

<i class="fa fa-phone"></i> <strong>Phone:</strong>
						<?php $phone1 = $deal['Contact']['phone'];
						$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
						$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
						//echo $cleaned1;
						echo $this->Dncprocess->show_phone(
						$dnc_manual_uplaod_process,
						$deal['Contact']['dnc_status'],
						$cleaned1,
						$deal['Contact']['modified'],
					 	$deal['Contact']['sales_step']);
						?>

						<i class="fa fa-phone"></i> <strong>Work:</strong>
						<?php $phone1 = $deal['Contact']['work_number'];
						$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
						$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
						//echo $cleaned1;

						echo $this->Dncprocess->show_phone(
						$dnc_manual_uplaod_process,
						$deal['Contact']['dnc_status'],
						$cleaned1,
						$deal['Contact']['modified'],
					 	$deal['Contact']['sales_step']);

						?>

					</li>

					<li>
						<strong>Step:</strong> <?php echo $sales_step_options[ $deal['Contact']['sales_step'] ]; ?>,
	 					<strong>Status:</strong> <?php echo $deal['Contact']['status']; ?>

						<strong>Owner:</strong>  <?php echo $deal['Contact']['owner']; ?>,
						<strong>Sales Person:</strong> <?php echo ($deal['Contact']['sperson'] != '')?  $deal['Contact']['sperson'] : "Please Transfer" ; ?>


					</li>



				<li style="font-size: 15px;">
						<?php if( $deal['Contact']['spouse_first_name'] != '' ||  $deal['Contact']['spouse_last_name'] != ''){ ?>
					<span style='color:  #101010'>Spouse:</span> <?php echo $deal['Contact']['spouse_first_name']; ?> <?php echo $deal['Contact']['spouse_last_name']; ?>
						<?php } ?>
					</li>
				</ul>
			</div>

		</div>

	</div>

	<div class="body">

		<div id="worksheet_content">
		<hr/>

		<div class="row">
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">

					<li><span class="strong">Amount:</span> <?php echo $this->Number->currency($deal['Deal']['amount'],'USD'); ?></li>

					<li><span class="strong">Deal Status:</span>

						<?php if($deal['DealStatus']['name']=='In Process'){
						echo '<span class="label label-warning label-stroke">'.$deal['DealStatus']['name'].'</span>';
						}
						else if($deal['DealStatus']['name']=='Accepted'){
						echo '<span class="label label-success label-stroke">'.$deal['DealStatus']['name'].'</span>';
						}
						else if($deal['DealStatus']['name']=='Rejected'){
						echo '<span class="label label-danger label-stroke">'.$deal['DealStatus']['name'].'</span>';
						}?>
					</li>

					<li><span class="strong">Condition:</span> <?php echo $deal['Contact']['condition']; ?></li>
					<li><span class="strong">Year:</span> <?php echo ($deal['Contact']['year'] != '0')? $deal['Contact']['year'] : "Any Year" ; ?></li>
					<li><span class="strong">Make:</span> <?php echo $deal['Contact']['make']; ?></li>
					<li><span class="strong">Model:</span> <?php echo $deal['Contact']['model']; ?></li>
					<li><span class="strong">Unit Type:</span> <?php echo $deal['Contact']['type']; ?></li>
					<li><span class="strong">Class:</span> <?php echo $class; ?></li>
					<li><span class="strong">Stock Number:</span> <?php echo $deal['Contact']['stock_num']; ?></li>
					<li><span class="strong">VIN:</span> <?php echo $deal['Contact']['vin']; ?></li>
                    </ul>
				<div class="separator bottom"></div>
			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Buying Time:</span> <?php echo $deal['Contact']['buying_time']; ?></li>
					<li><span class="strong">Best Time:</span> <?php echo $deal['Contact']['best_time']; ?></li>

                    <li><span class="strong">T/Value:</span> <?php echo $deal['Contact']['trade_value']; ?></li>
					<li><span class="strong">T/Used:</span> <?php echo $deal['Contact']['condition_trade']; ?></li>
					<li><span class="strong">T/Year:</span> <?php echo ($deal['Contact']['year_trade'] != '0')? $deal['Contact']['year_trade'] : "Any Year" ; ?></li>
					<li><span class="strong">T/Make:</span> <?php echo $deal['Contact']['make_trade']; ?></li>
					<li><span class="strong">T/Model:</span> <?php echo $deal['Contact']['model_trade']; ?></li>
					<li><span class="strong">T/Type:</span> <?php echo $deal['Contact']['category_trade']; ?></li>
                    <li><span class="strong">T/Stock#</span> <?php echo $deal['Contact']['stock_num_trade']; ?></li>
                    <li><span><strong>Lead Age: </strong>
					<?php
					$startTimeStamp1 = strtotime($deal['Contact']['created']);
					$endTimeStamp1 = strtotime("now");
					$timeDiff1 = abs($endTimeStamp1 - $startTimeStamp1);
					$numberDays1 = $timeDiff1/86400;  // 86400 seconds in one day
					$numberDays1 = intval($numberDays1);
					echo $numberDays1
					?> Day(s)&nbsp;</span></li>


				</ul>
				<div class="separator bottom"></div>
			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Lead ID:</span>&nbsp; <span class="label label-primary label-stroke">#<?php echo $deal['Contact']['id']; ?></span></li>
					<li><span class="strong">This Lead is:</span> <?php echo $deal['Contact']['lead_status']; ?></li>
				    <li><span class="strong">Source</span> <?php echo $deal['Contact']['source']; ?></li>
					<li><span class="strong">Gender:</span> <?php echo $deal['Contact']['gender']; ?></li>
					<li><span class="strong">Second Face: </span> <?php echo $second_face; ?></li>
					<li><span class="strong">Created:</span> <?php echo $this->Time->format('n/j/Y g:i A', $deal['Contact']['created']); ?></li>
					<li><span class="strong">Modified:</span> <?php echo $this->Time->format('n/j/Y g:i A', $deal['Contact']['modified']); ?></li>
					<li><span class="strong">DNC Status:</span> <?php echo ($deal['Contact']['dnc_status'] != '')? $DncStatusOptions[$deal['Contact']['dnc_status']] : ""  ; ?></li>
                    <li><span class="strong">Event:</span>
						<?php  if(!empty($appointment)){ ?>
							<a style="display: inline; color: blue; padding: 0; font-weight: normal;"
							 href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $deal['Contact']['id'], '?'=> array('update_type'=>'Set Appointment') )); ?>"  class='no-ajaxify status_note_update'  ><u><?php echo date('m/d/Y g:i A', strtotime($appointment['Event']['start'])); ?></u></a>
						<?php } ?>

					</li>
						<li><span><strong>Dormant: </strong><?php

				$event_start = 0;
				if(!empty($appointment)){
					$event_start = strtotime($appointment['Event']['start']);
				}
				 $startTimeStamp = strtotime($deal['Contact']['modified']);
				if($event_start > $startTimeStamp){
					$startTimeStamp = $event_start;
				}
				$endTimeStamp = strtotime("now");

				if($startTimeStamp > $endTimeStamp){
					$numberDays = 0;
				}else{
					$timeDiff = abs($endTimeStamp - $startTimeStamp);
					$numberDays = $timeDiff/86400;  // 86400 seconds in one day
					$numberDays = intval($numberDays);
				}
				echo $numberDays
				?> Day(s)&nbsp;</span></li>


				</ul>
				<div class="separator bottom"></div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12">

				<hr>
				<span class="strong"><i class="fa fa-book"></i> <span style='font-size: 15px;'>Current Notes:</span></span>

						<?php
						echo $this->Text->truncate( strip_tags($deal['Contact']['notes']),200,array('html'=>true,
						'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_details no-ajaxify" contact_id = "'.
						$deal['Contact']['id'].'" >Read more</a>'));
						?>

					<hr>
				<div class="separator bottom"></div>

			</div>
		</div>


		<?php if(!empty($addonVehicles)){ ?>
		<div class="row">
			<div class="col-md-12">
				<h4 class="text-primary">Add-On Vehicle</h4>
				<table class="table table-striped table-responsive swipe-horizontal table-condensed">
					<thead>
						<tr>
							<th>Type</th>
							<th>Category</th>
							<th>Year</th>
							<th>Make</th>
							<th>Model</th>
							<th>Class</th>
							<th>Condition</th>
							<th>Vin</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($addonVehicles as $addonVehicle){ ?>
						<tr>
							<td><?php echo $addonVehicle['AddonVehicle']['category']; ?></td>
							<td><?php echo $addonVehicle['AddonVehicle']['type']; ?></td>
							<td><?php echo $addonVehicle['AddonVehicle']['year']; ?></td>
							<td><?php echo $addonVehicle['AddonVehicle']['make']; ?></td>
							<td><?php echo $addonVehicle['AddonVehicle']['model']; ?></td>
							<td><?php echo
								($addonVehicle['Category']['body_sub_type'] != '')?
									$addonVehicle['Category']['body_sub_type'] :
									$addonVehicle['AddonVehicle']['class'];
							?></td>
							<td><?php echo $addonVehicle['AddonVehicle']['condition']; ?></td>
							<td><?php echo $addonVehicle['AddonVehicle']['vin']; ?></td>
						</tr>
					<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
		<?php } ?>



		<div class="row">

			<!-- New History start -->
			<div class="col-md-12">

<?php if(!empty($history_ar)){ ?>

<!-- Widget -->
<div class="widget widget-tabs widget-tabs-responsive history_tabs">

	<!-- Widget heading -->
	<div class="widget-head ">
		<ul>
			<?php
			$cnt = 1;
			 foreach ($history_types as $key => $value) {
				if(!empty($history_ar[$key])){
			?>
			<li  <?php echo ($cnt == 1)? 'class="active"' : '' ;  ?>         >
				<a class="glyphicons <?php echo $value;  ?>" href="#content_<?php echo str_replace(" ", "_", $key);  ?>" data-toggle="tab">
					<i></i><span><?php echo $key;  ?> (<?php echo count($history_ar[$key]);  ?>) </span>
				</a>
			</li>
			<?php $cnt++; } }  ?>

			<?php
			$history_others = array();
			foreach ($history_ar as $key => $value) {
				if(!isset($history_types[$key])){
					foreach($value as $v){
						$history_others[] = $v;
					}
			 	}
			 }

			 if(!empty($history_others)){
			?>
			<li >
				<a class="glyphicons log_book" href="#content_others" data-toggle="tab">
					<i></i><span>Others (<?php echo count($history_others);  ?>) </span>
				</a>
			</li>

			<?php  } ?>


		</ul>
	</div>
	<!-- // Widget heading END -->

	<div class="widget-body">
		<div class="tab-content">



			<?php
			$cnt = 1;
			 foreach ($history_types as $key => $value) {
				if(!empty($history_ar[$key])){
			?>
			<div id="content_<?php echo str_replace(" ", "_", $key);  ?>" class="tab-pane <?php echo ($cnt == 1)? 'active' : '' ;  ?>">
				<?php echo $this->element('history_content', array('htype' => $key,'history'=>$history_ar[$key])); ?>
			</div>
			<?php $cnt++; } }  ?>

			<?php
			 if(!empty($history_others)){
			?>
			<div id="content_others" class="tab-pane">
				<?php echo $this->element('history_content', array('htype' => '','history'=>$history_others)); ?>
			</div>
			<?php  } ?>

		</div>
	</div>
</div>
<!-- // Widget END -->
<?php  }else{ ?>

<h3>History not available</h3>
<?php  } ?>


			</div>
			<!-- New History end -->










		</div>


		</div>


	</div>
</div>
<?php 	//pr($dealer_forms);   ?>

<script>
$(function() {


    $("#load_worksheet").click(function(event) {
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url:  $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "<?php echo $dealer; ?>"
				}).find("div.modal-dialog").addClass("largeWidth");

			}
		});
    });

		/*
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('action' => 'work_sheet', $deal['Deal']['id'])); ?>",
			success: function(data){
				$("#worksheet_content").html(data);
			}
		});
		*/

	$(".deal_add_new").click(function(e){
		e.preventDefault();
		var contact_id = $(this).attr('contact_id');
		<?php
		$html='<div style="text-align:center;">';
		$i=1;

		foreach($dealer_forms as $form){

			if($form['CustomForm']['form_type']=='credit'){
				$html.='<a href="/deals/deals_input/###" class="btn btn-primary no-ajaxify" style="margin-left:5px;" >'.$form['CustomForm']['button_name'].'</a>';
			}
			if($form['CustomForm']['action_name']=='worksheet')
			{
				$html.='<input type="checkbox" name="custom_print_form[]" data-id="'.$form['CustomForm']['id'].'" class="custom_print_form" style="margin-left:7px;"/><button data-url="/deals/work_sheet2/'.$deal['Deal']['id'].'" type="button" class="btn btn-inverse deal_forms" style="margin-left:5px;">'.$form['CustomForm']['button_name'].'</button>';
			}else{
			$html.='<input type="checkbox" name="custom_print_form[]" data-id="'.$form['CustomForm']['id'].'" class="custom_print_form" style="margin-left:7px;" /><button data-url="/deals/'.$form['CustomForm']['action_name'].'/###/'.$form['CustomForm']['id'].'" type="button" class="btn btn-inverse deal_forms" style="margin-left:5px;">'.$form['CustomForm']['button_name'].'</button>';}

			if($i%3==0){
				$html.='<br /><br />';
			}
			$i++;
		}
		if($html=='<div style="text-align:center;">')
		{
			$html.='There is no Form and selected Please select form and worksheet from the dealer settings area';
		}
		$html.='</div>';
		 ?>
		$html='<?php echo $html; ?>';

		$html=$html.replace(/###/g,contact_id);
		//$html+='<a href="/deals/deals_input/'+contact_id+'" class="btn btn-primary" >Credit</a>';

		bootbox.dialog({
			  title: "Dealership Forms",
			  message: $html,
			  animate:false,
			  buttons: {
			    success: {
			      label: "Print All",
			      className: "btn-primary",
			      callback: function() {


					$.ajax({
						type: "GET",
						cache: false,
						url: "/deals/multi_forms/"+contact_id,
						success: function(data){

							bootbox.dialog({
								message: data,
								backdrop: true,
								title: "<?php echo $dealer; ?>"
							}).find("div.modal-dialog").addClass("largeWidth");
						}
					});

			      }
			    },
			   	select_print: {
			      label: "Print Selected",
			      className: "btn-success",
			      callback: function() {
					$print_ids='';
					$(".custom_print_form").each(function(index){
						if($(this).is(":checked"))
						{
							$print_ids+=$(this).attr("data-id")+',';
						}
						});
					if($print_ids=='')
					{
						alert('please select a form first');
						return false;
					}

					$.ajax({
						type: "GET",
						cache: false,
						url: "/deals/multi_forms/"+contact_id+"/"+$print_ids,
						success: function(data){

							bootbox.dialog({
								message: data,
								backdrop: true,
								title: "<?php echo $dealer; ?>"
							}).find("div.modal-dialog").addClass("largeWidth");
						}
					});

			      }
			    },



			  }
			});

		$("button.deal_forms").bind('click',function(e){
		e.preventDefault();
		url=$(this).attr('data-url');
		bootbox.hideAll();
		$.ajax({
						type: "GET",
						cache: false,
						url: url,
						success: function(data){

							bootbox.dialog({
								message: data,
								className : 'dynamic_height',
								backdrop: true,
								animate :false,
								title: "<?php echo $dealer; ?>"
							}).find("div.modal-dialog,div.modal-dialog div.model-content").addClass("largeWidth");
							$("div.dynamic_height").scrollTop(1);
						}
					});

		});
	});


});
</script>
