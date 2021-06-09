<?php
$group_id = AuthComponent::user('group_id');
//echo $timezone;

$selected_lead_type = "";
if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
	$selected_lead_type = $this->request->params['named']['selected_lead_type'];
}
?>
<div class="innerAll">
	<div class="title">
		<div class="row">
			<div class="col-md-6">
				<div class="clearfix">
					<div class="pull-left"><img style="width: 30px;" src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" alt="Profile" class="" /></div>
					<h3 class="text-primary margin-none pull-left innerR" style="word-break: break-all;"><?php echo $contact['Contact']['first_name'] . "&nbsp;" . $contact['Contact']['last_name'];  ?>
						<?php
					if ($contact['ContactStatus']['name'] == 'Mobile Lead') {
						echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
	                                } else if ($contact['ContactStatus']['name'] == 'Web Lead') {
						echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
                                        } else if ($contact['ContactStatus']['name'] == 'Phone Lead') {
						echo '<span class="label label-info label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Showroom') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Parts') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Service') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Call Center') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Rental') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					}
					?></h3>
				</div>
				<ul class="list-unstyled list-group-1">
					<li><i class="fa fa-home"></i> <?php echo $contact['Contact']['address']; ?>&nbsp;<?php echo $contact['Contact']['city']; ?>&nbsp;<?php echo $contact['Contact']['state']; ?>&nbsp;<?php echo $contact['Contact']['zip']; ?>
						<div class="row"></div>
						<i class="fa fa-mobile"></i>
						<?php $phone = $contact['Contact']['mobile'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $cleaned;?>
						&nbsp; <i class="fa fa-phone"></i>
						<?php $phone1 = $contact['Contact']['phone'];
$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
echo $cleaned1;?>
						&nbsp; <i class="fa fa-envelope"></i> <span style="word-break: break-all;">
							<a style="display: inline; font-size: 12px; font-weight: normal; padding: 1px 5px; color:#3695D5"  href="/user_emails/compose/contact/<?php echo $contact['Contact']['id']; ?>"><u><?php echo $contact['Contact']['email']; ?></u></a>
						</span></li>
				</ul>
			</div>
			<div class="col-md-6 text-right">
				<a id="work_lead_link" href="<?php echo $this->Html->url(array('action'=>'leads_input_edit', $contact['Contact']['id'], 'selected_lead_type'=> $selected_lead_type )); ?>" class="btn btn-primary no-ajaxify" ><i class="fa fa-pencil"></i> Work Lead</a>

				<?php if($group_id == 1 || $group_id == 2 || $group_id == 4){  ?>
				<a id="send_manager_message" href="<?php echo $this->Html->url(array('controller'=>'manager_messages','action'=>'compose', $contact['Contact']['id'])); ?>" class="btn btn-primary no-ajaxify" >
					<i class="fa fa-comment"></i> Instance Message
				</a>
				<?php }  ?>


			 </div>
		</div>
	</div>
	<hr/>
	<div class="body">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Dealer:</span> <?php echo $contact['Contact']['company']; ?></li>
					<li><span class="strong">Originator:</span> <?php echo $contact['Contact']['owner']; ?></li>
					<li><span class="strong">SPerson:</span> <?php echo $contact['Contact']['sperson']; ?></li>
					<li><span class="strong">Lead Step:</span> <?php echo $contact['Contact']['sales_step']; ?></li>
					<li><span class="strong">Lead Status:</span> <?php echo $contact['Contact']['status']; ?></li>
					<li><span class="strong">Best Time:</span> <?php echo $contact['Contact']['best_time']; ?></li>

<li><span><strong>Lead Age: </strong>
<?php
				$startTimeStamp1 = strtotime($contact['Contact']['created']);
				$endTimeStamp1 = strtotime("now");
				$timeDiff1 = abs($endTimeStamp1 - $startTimeStamp1);
				$numberDays1 = $timeDiff1/86400;  // 86400 seconds in one day
				$numberDays1 = intval($numberDays1);
				echo $numberDays1
				?> Day(s)&nbsp;</span></li>
<li><span><strong>Dorment: </strong><?php
				$startTimeStamp = strtotime($contact['Contact']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays
				?> Day(s)&nbsp;</span></li>



				</ul>
				<div class="separator bottom"></div>
			</div>
			<div class="col-md-3">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Unit Value:</span> <?php echo $contact['Contact']['unit_value']; ?></li>
					<li><span class="strong">Condition:</span> <?php echo $contact['Contact']['condition']; ?></li>
					<li><span class="strong">Year:</span> <?php echo $contact['Contact']['year']; ?></li>
					<li><span class="strong">Make:</span> <?php echo $contact['Contact']['make']; ?></li>
					<li><span class="strong">Model:</span> <?php echo $contact['Contact']['model']; ?></li>
					<li><span class="strong">Unit Type:</span> <?php echo $contact['Contact']['type']; ?></li>
					<li><span class="strong">Stock Number:</span> <?php echo $contact['Contact']['stock_num']; ?></li>
<li><span class="strong">Buying Time:</span> <?php echo $contact['Contact']['buying_time']; ?></li>
				</ul>
				<div class="separator bottom"></div>
			</div>
			<div class="col-md-2">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">T/Value:</span> <?php echo $contact['Contact']['trade_value']; ?></li>
					<li><span class="strong">T/Used:</span> <?php echo $contact['Contact']['condition_trade']; ?></li>
					<li><span class="strong">T/Year:</span> <?php echo $contact['Contact']['year_trade']; ?></li>
					<li><span class="strong">T/Make:</span> <?php echo $contact['Contact']['make_trade']; ?></li>
					<li><span class="strong">T/Model:</span> <?php echo $contact['Contact']['model_trade']; ?></li>
					<li><span class="strong">T/Type:</span> <?php echo $contact['Contact']['type_trade']; ?></li>
					<li><span class="strong">T/Stock#</span> <?php echo $contact['Contact']['stock_num_trade']; ?></li>
                    <li><span class="strong">Deal:</span>

<?php if ($_SESSION['Auth']['User']['Group']['id'] == 1 || $_SESSION['Auth']['User']['Group']['id'] == 2 ) { ?>
<a style="display: inline; font-size: 12px; font-weight: normal; padding: 1px 5px; color: #fff;" class="btn btn-xs btn-success" href="/deals/deals_input/<?php echo $contact['Contact']['id']; ?>" >+ New</a>
<?php } ?>
</li>
				</ul>
				<div class="separator bottom"></div>
			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">This Lead is:</span> <?php echo $contact['Contact']['lead_status']; ?></li>
					<li><span class="strong">Lead ID:</span>&nbsp;#<?php echo $contact['Contact']['id']; ?></li>
				        <li><span class="strong">Source</span> <?php echo $contact['Contact']['source']; ?></li>
					<li><span class="strong">Gender:</span> <?php echo $contact['Contact']['gender']; ?></li>
					<li><span class="strong">Created:</span> <?php echo $this->Time->format('n/j/Y g:i A', $contact['Contact']['created']); ?></li>
					<li><span class="strong">Modifed:</span> <?php echo $this->Time->format('n/j/Y g:i A', $contact['Contact']['modified']); ?></li>
					<li><span class="strong">Event:</span>
						<?php if(!empty($appointment)){ ?>
							<a style="display: inline; color: blue; padding: 0; font-weight: normal;" href="/events/index/edit/<?php echo $appointment['Event']['id']; ?>" ><u><?php echo date('m/d/Y g:i A', strtotime($appointment['Event']['start'])); ?></u></a>
						<?php }else{ ?>
							<a style="display: inline; font-size: 12px; font-weight: normal; padding: 1px 5px; color: #fff;" class="btn btn-xs btn-success"  href="/events/index/add/<?php echo $contact['Contact']['id']; ?>" >+ New</a>
						<?php } ?>
					</li>
					<li><span class="strong">Notes:</span> <?php echo $contact['Contact']['notes']; ?></li>
				</ul>
				<div class="separator bottom"></div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<!-- Table -->
				<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
					<!-- Table heading -->
					<thead>
						<tr>
							<th>History</th>
							<th>Sperson</th>
							<th>Step</th>
							<th>Status</th>
							<th>Details  or Vehicle</th>
							<th>Notes</th>
							<th>Date</th>
						</tr>
					</thead>
					<!-- // Table heading END -->
					<!-- Table body -->
					<tbody>
						<!-- Table row -->
						<?php foreach ($history as $entry) { ?>
						<tr class="text-primary">
							<td><?php echo $entry['History']['h_type']; ?>&nbsp;</td>
							<td><?php echo $entry['History']['sperson']; ?>&nbsp;</td>
							<td><?php echo $entry['History']['sales_step']; ?>&nbsp;</td>
							<td><?php echo $entry['History']['status']; ?>&nbsp;</td>
							<td><?php echo $entry['History']['cond']; ?>&nbsp;<?php echo $entry['History']['year']; ?>&nbsp;<?php echo $entry['History']['make']; ?>&nbsp;<?php echo $entry['History']['model']; ?>&nbsp;<?php echo $entry['History']['type']; ?></td>
							<td><?php echo $entry['History']['comment']; ?>&nbsp;</td>
							<td><?php echo ($entry['History']['created']!='')?  $this->Time->format('n/j/Y g:i A', $entry['History']['created'])   : "" ?>&nbsp;</td>
						</tr>
						<?php } ?>
						<!-- // Table row END -->
					</tbody>
					<!-- // Table body END -->
				</table>
				<!-- // Table END -->
			</div>
		</div>
	</div>
</div>
<?php //debug($contact);   ?>
<script>
$(function(){

	//instant message

	$("#send_manager_message").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					title: "Instance Message",
					buttons: {
						success: {
							label: "Ok",
							className: "btn-success",
							callback: function() {

								if( $("#ManagerMessageMessage").val() != '' ){

									$("#message_eror").html('');
									$.ajax({
										type: "POST",
										data: $("#ManagerMessageComposeForm").serialize(),
										url: "/manager_messages/send/",
										success: function(data){
											return true;
										}
									});

								}else{
									 $("#message_eror").html('Please enter message');
									 return false;
								}
							}
						},
					}
				});


			}
		});


	});



	$("#work_lead_link").click(function(event){
		<?php if( AuthComponent::user('id') != $contact['Contact']['user_id']){ ?>
			event.preventDefault();
			if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
				location.href = $(this).attr('href');
			}
		<?php } ?>
	});
});
</script>
