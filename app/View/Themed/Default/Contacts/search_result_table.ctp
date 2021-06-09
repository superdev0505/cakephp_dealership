<style>
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
.largeWidth {
    margin: 0 auto;
    width: 1084px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
}
.largeWidth3 {
    margin: 0 auto;
    width: 1180px;
}
.print-auto-width{display: inline-block; width: 157px;}

.sort_options {color:white;text-decoration:none;cursor:pointer;margin:0 10px;}
.sort_options:hover {color:#DEDEDE;}
#sort_order {font-weight:bold;font-size:18px;margin:0 10px;}

@media print {
    .no-print{display:none;}
	#display_table_view{width: 1100px; margin:0 auto;}
	.pagination>li.current{display:none;}
	.pagination>li.disabled{display:none;}
	.print-auto-width{width:auto;}
	table.table-striped{border :1px solid #e2e1e1;}
	#display_table_view>div{padding:0px!important;}
}
</style>

<?php
$group_id = AuthComponent::user('group_id');
$dealer_settings = $this->App->getDealerSettings(array('move_lead_allowed_group'),AuthComponent::user('dealer_id'));
?>

<div class='col-app  row innerAll'>
	<div class='col-md-12'>

		<div style="overflow: auto; width: 100%;" >

		<table class="table table-striped table-responsive table-condensed table-primary">

			<!-- Table heading -->
			<thead>
				<tr>
					<th><a class="sort_options" ref="" name="Name">Name</a></th>
					<th><a class="sort_options" ref="" name="Contact">Contact</a></th>
					<th><a class="sort_options" ref="" name="Vehicle">Vehicle</a></th>
					<th><a class="sort_options" ref="" name="Status">Status</a></th>
					<th><a class="sort_options" ref="" name="Modified">Dormant/Modified</a></th>
					<th><a class="sort_options" ref="" name="Created">Created</a></th>
					<th><a class="sort_options" ref="" name="SPerson">Originator/Sperson</a></th>
					<th><a class="sort_options" ref="" name="Comment">Comment</a></th>
					<th class="no-print" style="text-align: center;">Action </th>
                    <th class="no-print"><a href="javascript:void()" class="btn btn-inverse no-print print-lead-table"><i class="fa fa-print"></a></th>
				</tr>
			</thead>
			<!-- // Table heading END -->

			<!-- Table body -->
			<tbody>
			<!-- Table row -->

			<?php //debug($contacts);
			$count = 0;	foreach ($contacts as $contact): 	?>
			<tr class="text-primary">
				<td>

					<div class="print-auto-width" style=''>

						<div class="media-object pull-left thumb no-print" style=" margin-right: 10px;">
							<?php if($contact['Contact']['lead_status'] == 'Closed'){ ?>
							<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
							<?php } ?>

							<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
						</div>
						<div class="media-body">
							<span class="strong muted">
								<div>
									<font color="blue"><u><span id='<?php echo $contact['Contact']['id']; ?>_lead_full_name'>
										<?php echo ucwords(strtolower($contact['Contact']['first_name'])) . "&nbsp;" . ucwords(strtolower($contact['Contact']['last_name']));  ?></span></u></font>
								</div>
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
								?>
								<br>
								 #<?php echo $contact['Contact']['id']; ?>
								 <br>
								 <a href="javascript:" class='clicktofill no-print' contact_id = "<?php echo $contact['Contact']['id']; ?>" >Start New</a>

								 <br>

								 <?php if(isset($rds[$contact['Contact']['id']])){ ?>
								 <a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $contact['Contact']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
								<?php } ?>
								<?php if(isset($yds[$contact['Contact']['id']])){ ?>
								 <a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $contact['Contact']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
								<?php } ?>


							</span>
						</div>

						<div class='clearfix'></div>

					</div>



				</td>
				<td>
					<i class="fa fa-mobile"></i> Mobile:
					<?php
					echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", preg_replace('/[^0-9]+/', '', $contact['Contact']['mobile'])   ); //Re Format it
					?>
					<br>
					<i class="fa fa-mobile"></i> Phone:
					<?php
					echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", preg_replace('/[^0-9]+/', '', $contact['Contact']['phone'])   ) ;
					?>
					<br>
					<i class="fa fa-mobile"></i> Work:
					<?php
					echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", preg_replace('/[^0-9]+/', '', $contact['Contact']['work_number'])   );
					?>
					<br>
					<i class="fa fa-envelope"></i> Email:  <span style="word-break: break-all;"><?php echo $contact['Contact']['email']; ?></span>
				</td>
				<td>
					<?php echo $contact['Contact']['condition']; ?> &nbsp; <?php echo $contact['Contact']['year']; ?>  &nbsp;<?php echo $contact['Contact']['make']; ?> &nbsp;<?php echo $contact['Contact']['model']; ?>
					<?php echo $contact['Contact']['type']; ?>
				</td>
				<td>
					<strong>Status:</strong> <?php echo $contact['Contact']['status']; ?><br>
					<strong>Step:</strong> <?php
					 echo $sales_step_options[ $contact['Contact']['sales_step'] ]; ?><br>
					<strong>This Lead is:</strong> <?php echo $contact['Contact']['lead_status']; ?><br>
					<strong>Source:</strong> <?php echo $contact['Contact']['source']; ?>
				 </td>
				<td>

					<strong>Dormant: <br><?php
					$startTimeStamp = strtotime($contact['Contact']['modified']);
					$endTimeStamp = strtotime("now");
					$timeDiff = abs($endTimeStamp - $startTimeStamp);
					$numberDays = $timeDiff/86400;  // 86400 seconds in one day
					$numberDays = intval($numberDays);
					echo $numberDays
					?> Day(s)&nbsp;</strong>
					<br>

					<i class="fa fa-calendar"></i>  <?php echo date('D - M d, Y g:i A',strtotime($contact['Contact']['modified'])); ?>

				</td>
				<td>
					<strong>Created:</strong> <br>
					<i class="fa fa-calendar"></i>  <?php echo date('D - M d, Y g:i A',strtotime($contact['Contact']['created'])); ?>

				</td>
				<td>
					<strong>Originator:<br></strong><?php echo $contact['Contact']['owner'] ?><br>
					<strong>Sales Person:<br></strong><?php echo $contact['Contact']['sperson'] ?>

				</td>
				<td><?php echo $contact['Contact']['notes'] ?></td>
				<td class="no-print" colspan="2">

					<div class="btn-group pull-right" >

						<button type="button" class="btn  btn-primary dropdown-toggle" data-toggle="dropdown">
							Actions
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right">

							<li>
								<a id="work_lead_link" href="<?php echo $this->Html->url(array('action'=>'leads_input_edit', $contact['Contact']['id'], 'selected_lead_type'=> $selected_lead_type, '?'=>array('do'=>'edit_lead') )); ?>" class="no-ajaxify" ><i class="fa fa-pencil"></i> Edit Contact Info</a>
							</li>

							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'text status') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Text Status Update</a>
							</li>

							<?php if($contact['Contact']['sales_step'] != 'Sold'){ ?>
							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Email Update (All)') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Email Update (All)</a>
							</li>
							<?php } ?>
							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Outbound Call Update') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Outbound Call Update</a>
							</li>
							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Inbound Call Update') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Inbound Call Update</a>
							</li>
							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Showroom Visit Update') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Showroom Visit Update</a>
							</li>
							<?php if($contact['Contact']['sales_step'] != 'Sold'){ ?>
							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Dead Lead (Closed)') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Dead Lead (Closed)</a>
							</li>

							<li>
								<a id="work_lead_link2" href="<?php echo $this->Html->url(array('action'=>'leads_input_edit', $contact['Contact']['id'], 'selected_lead_type'=> $selected_lead_type,'?'=>array('do'=>'sold_update') )); ?>" class="no-ajaxify" ><i class="fa fa-pencil"></i> Sold Update - Floor</a>
							</li>
							<?php } ?>

							<!--
							<li>
								<a id="note_update_link" href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_update', $contact['Contact']['id'])); ?>" class="no-ajaxify" ><i class="fa fa-pencil-square-o"></i> Note Update</a>
							</li>
							 -->

							<?php if($group_id == 1 || $group_id == 2 || $group_id == 4){  ?>
							<li>
							<a id="send_manager_message" href="<?php echo $this->Html->url(array('controller'=>'manager_messages','action'=>'compose', $contact['Contact']['id'])); ?>" class="no-ajaxify" >
								MGR <i class="fa fa-comment"></i>
							</a>
							</li>
							<?php }  ?>
							<li>
								<?php if(empty($contact['Deal'])){ ?>
									<a href="javascript:" contact_id = "<?php echo $contact['Contact']['id']; ?>"  class='deal_add_new'><i class="fa fa-user"></i> Deal: Add New</a>
								<?php }else{  ?>
									<a href="javascript:" deal_id = "<?php echo $contact['Deal'][0]['id']; ?>"  class='deal_edit'><i class="fa fa-user"></i> Deal: Edit</a>
								<?php }  ?>
							</li>

							<li>
								<?php if(!empty($appointments[ $contact['Contact']['id'] ])){ ?>
									<a  href="/contacts/leads_input_edit/<?php echo $contact['Contact']['id']; ?>/selected_lead_type:/?ref=events" ><i class="fa fa-pencil"></i> Event: <u><?php echo date('m/d/Y g:i A', strtotime($appointments[$contact['Contact']['id']]['Event']['start'])); ?></u></a>
								<?php }else{  ?>
									<a    href="/contacts/leads_input_edit/<?php echo $contact['Contact']['id']; ?>" ><i class="fa fa-plus"></i> New Event</a>
								<?php }  ?>
							</li>

							<?php if(in_array($group_id, explode(',', $dealer_settings['move_lead_allowed_group']))) {  ?>
							<li>
							<a id="transfer_lead_link" href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'lead_transfer', $contact['Contact']['id'])); ?>" class="no-ajaxify" ><i class="fa fa-user"></i> Move Lead</a>
							</li>
							<?php } ?>

							 <?php if( ($group_id == 8 || $group_id == 2 || $group_id == 4|| $group_id == 1|| $group_id == 9)&& empty($score_lead)){  ?>
							<li>
							<a id="lead_scoreing" href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'lead_score', $contact['Contact']['id'])); ?>" class="no-ajaxify" ><i class="fa fa-user"></i> Score Lead</a>
							</li>
							<?php }  ?>


						</ul>
					</div>
					<div class='pull-right'>
						<button type="button" <?php echo ($history_count[$contact['Contact']['id']] == 0)? "disabled='disabled'" : "" ?>     class="btn  btn-inverse btn_show_hide_history" style="width: 86px; margin-top: 10px"   data-contact-id="<?php echo $contact['Contact']['id'];?>" > History</button>
					</div>



				</td>
			</tr>
			<tr id="history_<?php echo $contact['Contact']['id'];?>" style='display: none'>
				<td colspan="7">
					<div class="row">
						<div class="col-md-12" id = "history_container_<?php echo $contact['Contact']['id'];?>">&nbsp;</div>
					</div>
				</td>
			</tr>
			<?php $count++; endforeach; ?>

			</tbody>
			<!-- // Table body END -->

		</table>

		</div>


		<div class="results pull-left no-print" style="margin-top: 4px;">
			Total <?php echo $this->Paginator->counter('{:count}'); ?> Leads Found <i class="icon-circle-arrow-down"></i>
			&nbsp; &nbsp; &nbsp;
		</div>

		<?php
		$selected_lead_type = "";
		if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
			$selected_lead_type = $this->request->params['named']['selected_lead_type'];
		}
		?>

		<div class="paging pull-left" class="no-print">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
			</ul>
		</div>


	</div>

</div>

<?php //echo $this->element('sql_dump'); ?>
<script>


$(function() {
	/*
	if( $("#ContactSearchAll2").val() == ''){
		$(".clicktofill").hide();
	}
	*/


	$(".clicktofill").click(function(){
   		//$("#start_new_lead, #lnk_add_new_lead").attr('lead-id',$(this).attr('contact_id'));
   		//$("#new_lead_selected").html( " For " + $("#"+$(this).attr('contact_id')+"_lead_full_name").html() );
		location.href= "/contacts/leads_input?new_lead_contact="+$(this).attr('contact_id');
	});


	$(".deal_edit").click(function(){
		var deal_id = $(this).attr('deal_id');
		bootbox.dialog({
			  message: "Edit Deal",
			  buttons: {
			    success: {
			      label: "Worksheet",
			      className: "btn-primary",
			      callback: function() {

					$.ajax({
						type: "GET",
						cache: false,
						url: "/deals/work_sheet2/"+deal_id,
						success: function(data){

							bootbox.dialog({
								message: data,
								backdrop: true,
								title: "<?php echo AuthComponent::user('dealer'); ?>",
							}).find("div.modal-dialog").addClass("largeWidth");
						}
					});

			      }
			    },
			    danger: {
			      label: "Credit",
			      className: "btn-primary",
			      callback: function() {
					location.href = "/deals/deals_input_edit/"+deal_id;
			      }
			    }
			  }
			});
	});

	$(".deal_add_new").click(function(){
		var contact_id = $(this).attr('contact_id');
		bootbox.dialog({
			  message: "Add New Deal",
			  buttons: {
			    success: {
			      label: "Worksheet",
			      className: "btn-primary",
			      callback: function() {

					$.ajax({
						type: "GET",
						cache: false,
						url: "/deals/worksheet/"+contact_id,
						success: function(data){

							bootbox.dialog({
								message: data,
								backdrop: true,
								title: "<?php echo AuthComponent::user('dealer'); ?>",
							}).find("div.modal-dialog").addClass("largeWidth");
						}
					});

			      }
			    },
			    danger: {
			      label: "Credit",
			      className: "btn-primary",
			      callback: function() {
					location.href = "/deals/deals_input/"+contact_id;
			      }
			    }
			  }
			});
	});

	$(".btn_show_hide_history").click(function(){
		contact_id = $(this).attr('data-contact-id');
		//console.log(contact_id);
		if($("#history_container_"+contact_id).html() == '&nbsp;'){
			$("#history_"+contact_id).show();
			$.ajax({
				url: "/contacts_manage/load_history/"+contact_id,
				type: "get",
				cache: false,
				success: function(results){
					$("#history_container_"+contact_id).html(results);
				}
			});
		}else{
			$("#history_"+contact_id).show();
		}

	});


	$(".paging a" ).click(function(event){
		event.preventDefault();
		//$("#ajaxOverlayLoader").show();
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){
				$('#display_table_view').html(results);
			}
		});
	});



	$(".lnk_merge_all_matched").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/contacts_manage/merge_all_matched/"+$(this).attr('contact_id'),
			success: function(data){

				bootbox.dialog({
					message: data,
					title: "List of possible duplicate contacts",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
	});


	$(".lnk_merge_partial_matched").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/contacts_manage/merge_all_matched/"+$(this).attr('contact_id'),
			success: function(data){

				bootbox.dialog({
					message: data,
					title: "List of possible duplicate contacts",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
	});



	/*  details script */

	$(".status_note_update").click(function(event){

		event.preventDefault();

	<?php if( $contact['Contact']['model'] == '' && ($contact['Contact']['model_id'] == '' || $contact['Contact']['model_id'] == 0) && $contact['Contact']['make'] == '' ) { ?>

		if(confirm('The lead you are editing is missing unit info data. You are being redirected to the edit lead page to add in unit data. If this lead does not have any unit data to be entered, then check mark the "Vehicle Not Known" checkbox in the vehicle tab of the edit form.')){

			<?php if( AuthComponent::user('id') != $contact['Contact']['user_id']) { ?>
					if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
						location.href = '/contacts/leads_input_edit/<?php echo $contact['Contact']['id']; ?>/selected_lead_type:?do=edit_lead#tab2-1';
					}
			<?php } else { ?>
					location.href = '/contacts/leads_input_edit/<?php echo $contact['Contact']['id']; ?>/selected_lead_type:?do=edit_lead#tab2-1';
			<?php } ?>

		} else {
			return false;
		}

	<?php } else { ?>

			<?php if( AuthComponent::user('id') != $contact['Contact']['user_id']){ ?>
			if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
				$.ajax({
					type: "GET",
					cache: false,
					url: $(this).attr('href'),
					success: function(data){
						bootbox.dialog({
							message: data,
							title: "Update lead",
						}).find("div.modal-dialog").addClass("largeWidth3");
					}
				});
			}
			<?php }else{ ?>

			$.ajax({
				type: "GET",
				cache: false,
				url: $(this).attr('href'),
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Update lead",
					}).find("div.modal-dialog").addClass("largeWidth3");
				}
			});
			<?php } ?>



		<?php } ?>



	});



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
											//return true;
											location.href = "/contacts/leads_main/view/"+data;
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




	$("#lead_scoreing").click(function(e){
		e.preventDefault();
		recipients=<?php echo $recipients ?>;
		if(recipients)
		{
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Score Lead - <?php echo $contact['Contact']['first_name'] . "&nbsp;" . $contact['Contact']['last_name'].' '.$cleaned.'  Sperson:'.$contact['Contact']['sperson'];  ?>",
				}).find("div.modal-dialog").addClass("midWidth");
			}
		});
		}else
		{
			alert('Please add the recipients email address in the Score Lead Email Group in Dealer Settings');
			return false;
		}

	});


	$("#transfer_lead_link").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Move Lead",
				});
			}
		});

	});


	/*  details script ends */




























});



</script>

<!-- Sort Functionality for Table View -->
<script>
var $header = $('a.sort_options[name=<?php echo $orders['header']; ?>]');
var sort_order = '<?php echo $orders['ord']; ?>';
var arrow = (sort_order == 'ASC') ? '<span id="sort_order">  &uarr;</span>' : '<span id="sort_order">  &darr;</span>';
$header.attr('ref',sort_order).append($(arrow));
function toggleOrd($domObj){
	if($domObj.attr('ref') == 'ASC') $domObj.attr('ref','DESC'); //.append($('<span id="sort_order">&darr;<span>'));
	else $domObj.attr('ref','ASC'); //.append($('<span id="sort_order">&uarr;<span>'));
}

$('.sort_options').click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	toggleOrd($(this));
	var url = '<?php echo $search_string ?>'+'&view=Table'+'&order='+$(this).attr('name')+"&search="+'<?php echo $search_string ?>'+'&ord='+$(this).attr('ref');
	//return;
	$.ajax({
		type: "GET",
		cache: false,
		url: url,
		//data: tmpobj,
		success: function(data){
			$("#display_table_view").show();

			$("#display_default_view").hide();
			$("#search-result-content").empty();
			$("#lead_details_content").empty();


			$("#display_table_view").html(data);
			//window.table_view_on = true;
		}
	});
});
</script>
