<style>
.largeWidth3 {
    margin: 125px auto;
    width: 1180px;
}
.midWidth {

    margin: 0 auto;
    width: 700px;

}
.dynamic_height
{
	height:97% !important;
}
div.dynamic_height div.modal-dialog div.modal-content
{
	height:97% !important;
}
.button_flash {
	background-color: rgba(255, 253, 56, 0.7) !important;
	padding: 5px;
}
.blink {
	padding: 5px;
}
</style>
<?php
$custom_form_dealer_ids=array(1224, 829, 830);
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
			<div class="col-md-10">
				<div class="clearfix">
					<div class="pull-left"><img style="width: 30px;" src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" alt="Profile" class="" /></div>
					<h3 class="text-primary margin-none pull-left innerR" style="/* word-break: break-all; */ "><?php echo
					ucwords(strtolower($contact['Contact']['first_name'])) . "&nbsp;" . ucwords(strtolower($contact['Contact']['last_name']));  ?>
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

					<?php if($contact['Contact']['company_work'] != ''){ ?>
					<div><strong>Company:</strong> <?php echo $contact['Contact']['company_work']; ?></div>
					<?php } ?>

					<?php if($contact['ContactAccount']['name'] != ''){ ?>
					<div><strong>Account:</strong> <?php echo $contact['ContactAccount']['name']; ?></div>
					<?php } ?>

					<!-- <i class="fa fa-suitcase"></i> Contact Account: <span class="strong text-primary"> <span style='font-size: 15px;'> <?php echo $contact['ContactAccount']['name']; ?> </span></span> -->


				</div>
			</div>
			<div class="col-md-2">


							<div class="btn-group pull-right" >

					<button type="button" class="btn  btn-primary dropdown-toggle glow_button" data-toggle="dropdown">
						Lead Actions
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu pull-right">

						<?php //if($activate_lite_version == 'Off'){  ?>
              <?php if($dealer_visit == 'On'){  ?>
                <li>
                  <a  href="<?php
                    echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Dealer Visit') ));
                  ?>" class="no-ajaxify status_note_update" ><i class="fa fa-plus"></i> Dealer Visit</a>
								  <!--<a id="dealership_visit" href="<?php
                      /*echo $this->Html->url(array(
                          'action'=>'leads_input_edit',
                          $contact['Contact']['id'],
                          'selected_lead_type'=> $selected_lead_type,
                          '?'=>array('do'=>'edit_lead','edit_type'=>'gsm')
                      ));*/
                    ?>" class="no-ajaxify" ><i class="fa fa-plus"></i> Dealership Visit</a>-->
							  </li>
              <?php } ?>

							<?php if($group_id == 2 || $group_id == 12 || $group_id == 6){  ?>
								<li>
								<a id="work_lead_link_gsm" href="<?php echo $this->Html->url(array('action'=>'leads_input_edit', $contact['Contact']['id'], 'selected_lead_type'=> $selected_lead_type, '?'=>array('do'=>'edit_lead','edit_type'=>'gsm') )); ?>" class="no-ajaxify" ><i class="fa fa-pencil"></i> GSM Edit</a>
							</li>
							<?php }  ?>

							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'text status') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Text Status Update</a>
							</li>

						<?php //} ?>

						<?php if($contact['Contact']['sales_step'] != 'Sold'){ ?>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Email Update (All)') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Email Send</a>
						</li>
						<?php } ?>

						<?php //if($activate_lite_version == 'Off'){  ?>

							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Outbound Call Update') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Outbound Call Update</a>
							</li>
							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Inbound Call Update') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Inbound Call Update</a>
							</li>
							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Showroom Visit Update') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Step Update</a>
							</li>
							<?php if($contact['Contact']['sales_step'] != 'Sold'){ ?>
							<li>
								<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Dead Lead (Closed)') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Dead Lead (Closed)</a>
							</li>

							<li>
								<a id="work_lead_link2" href="<?php echo $this->Html->url(array('action'=>'leads_input_edit', $contact['Contact']['id'], 'selected_lead_type'=> $selected_lead_type,'?'=>array('do'=>'sold_update') )); ?>" class="no-ajaxify" ><i class="fa fa-pencil"></i> Sold Update - Floor</a>
							</li>
							<?php //} ?>

							<?php if($group_id == 1 || $group_id == 2 || $group_id == 6 || $group_id == 4 || $group_id == 12 || $group_id == 5){  ?>
							<li>
							<a id="send_manager_message" href="<?php echo $this->Html->url(array('controller'=>'manager_messages','action'=>'compose', $contact['Contact']['id'])); ?>" class="no-ajaxify" >
								MGR <i class="fa fa-comment"></i>
							</a>
							</li>
							<?php }  ?>



							<?php if( in_array($group_id, $forms_view) || $group_id == '9'  ){  ?>
							<li>

	                        	<a href="javascript:" contact_id = "<?php echo $contact['Contact']['id']; ?>"  class='deal_add_new'><i class="fa fa-user"></i>  Dealer Forms</a>
	                      	</li>
	                      	<?php }  ?>


                      	<?php } ?>


							<?php if(!empty($appointment)){

								 ?>
								<li><a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Set Appointment') )); ?>" class='no-ajaxify status_note_update' ><i class="fa fa-pencil"></i> Event: <u><?php echo date('m/d/Y g:i A', strtotime($appointment['Event']['start'])); ?></u></a></li>
                                <?php if($appointment['Event']['event_type_id'] == 21 && $appointment['Event']['customer_showed'] == 0){ ?>
                                	<li><a  href="javascript:void(0)" class='no-ajaxify mark_cust_showed' data-id ="<?php echo $appointment['Event']['id']; ?>" ><i class="fa fa-pencil"></i> Mark Appt Showed</a></li>
							<?php
								}
							}else{  ?>
								<li><a    href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Set Appointment') )); ?>" class='no-ajaxify status_note_update' ><i class="fa fa-plus"></i> New Event</a></li>
							<?php }  ?>


						<?php
						$movelead_allowed_group = $this->App->getDealerSettings(array('move_lead_allowed_group'),AuthComponent::user('dealer_id'));

							$movelead_group = $this->App->default_settings('move_lead_allowed_group');
							if(!empty($movelead_allowed_group['move_lead_allowed_group']))
							{
								$movelead_group = explode(',',$movelead_allowed_group['move_lead_allowed_group']);
							}

						 if(in_array($group_id,$movelead_group)){ ?>
							<li>
							<a id="transfer_lead_link" href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'lead_transfer', $contact['Contact']['id'])); ?>" class="no-ajaxify" ><i class="fa fa-user"></i> Move Lead</a>
							</li>

							<?php if($location_transfer	 == 'On' ){  ?>

								<?php if($activate_lite_version == 'Off'){  ?>
									<li>
									<a id="transfer_lead_location_link"
									 href="<?php echo $this->Html->url(array('controller'=>'contacts_transfer','action'=>'lead_transfer_location', $contact['Contact']['id'])); ?>"
									  class="no-ajaxify" ><i class="fa fa-user"></i> Location Transfer</a>
									</li>
								<?php }  ?>

							<?php }  ?>

						<?php }  ?>

						<?php if( ($group_id == 8 || $group_id == 2 || $group_id == 6 || $group_id == 4|| $group_id == 1 || $group_id == 9 || $group_id == 13 || $group_id == 12 )&& empty($score_lead)){  ?>

							<?php if($activate_lite_version == 'Off'){  ?>
								<li>
								<a id="lead_scoreing" href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'lead_score', $contact['Contact']['id'])); ?>" class="no-ajaxify" ><i class="fa fa-user"></i> Score Lead</a>
								</li>
							<?php }  ?>
						<?php }  ?>

			<?php if($group_id == 13){  ?>

			<li>
				<a href="/manage_web_lead/remove_bad/<?php echo $contact['Contact']['id']; ?>" class='remove_bad_web_lead no-ajaxify' ><i class="fa fa-times"></i> Remove bad web lead</a>
			</li>

			<?php }else if($contact['Contact']['xml_weblead'] && $is_allow_bad_weblead == true){  ?>
			<li>
				<a href="/manage_web_lead/remove_bad/<?php echo $contact['Contact']['id']; ?>" class='remove_bad_web_lead no-ajaxify' ><i class="fa fa-times"></i> Remove bad web lead</a>
			</li>
			<?php }  ?>



			<li>
				<a href="#" id="uplaod_files" data-contact-id="<?php echo $contact['Contact']['id']; ?>" class='no-ajaxify' ><i class="fa fa-file"></i> File Manager</a>
			</li>


						<?php if( ($group_id == 9 || $group_id == 12 ) && $owner_change_internet == 'On' ){  ?>
						<li>
						<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_transfer','action'=>'ower_change', $contact['Contact']['id'])); ?>" class="no-ajaxify btn_owner_change" ><i class="fa fa-user"></i> Originator Change</a>
						</li>
						<?php }  ?>


						<?php if($group_id == 10 || $group_id == 11 || $group_id == 12){  ?>
						<li>
						<a  href="<?php echo $this->Html->url(array('controller'=>'bdc_app_shows','action'=>'add_log', $contact['Contact']['id'])); ?>" class="no-ajaxify bdc_apt_show_log" ><i class="fa fa-user"></i> Appt. Show</a>
						</li>
						<?php }  ?>

						<?php if($additional_contact == 'On'){ ?>
						<li>
							<a id="uplaod_additional_contact"  href="<?php echo $this->Html->url(array('controller'=>'additional_contacts','action'=>'upload_contacts', $contact['Contact']['id'])); ?>" class="no-ajaxify" ><i class="fa fa-pencil"></i> Upload Add. Contact</a>
						</li>
						<?php }
                                                  if(in_array(AuthComponent::user('dealer_id'),array('3201','3202'))){
                                                ?>
                                              <li>
				<a href="#" class='push_deal no-ajaxify' id="<?php echo $contact['Contact']['id'];?>"><i class="fa fa-plus"></i> Push to DMS</a>
                                                </li>
                                              <li>
				<a href="#" class='push_deal_rv no-ajaxify' id="<?php echo $contact['Contact']['id'];?>"><i class="fa fa-plus"></i> Push to DMS (RV)</a>
                                                </li>
                                                <?php
                                                  }
                                                ?>

						<li>
							<a id="work_lead_link" href="<?php echo $this->Html->url(array('action'=>'leads_input_edit', $contact['Contact']['id'], 'selected_lead_type'=> $selected_lead_type, '?'=>array('do'=>'edit_lead') )); ?>" class="no-ajaxify" ><i class="fa fa-pencil"></i> Edit Contact Info</a>
						</li>

					</ul>

				</div>







			</div>
		</div>

		<div class="row">
			<div class="col-md-12">

				<ul class="list-unstyled list-group-1">

					<li>


						<?php if($hide_deaelrname != '' &&  AuthComponent::user('id') == '232' && AuthComponent::user('dealer_id') == $hide_deaelrname){ ?>
								&nbsp;
						<?php }else{ ?>
							<strong>Customer at</strong> (<?php echo $contact['Contact']['company']; ?>),
						<?php } ?>



						<strong>Floor Plan:</strong> <?php echo $contact['Contact']['floor_plans']; ?></li>

					<li><i class="fa fa-home"></i> <strong>Address:</strong> <?php echo $contact['Contact']['address']; ?>,
						<strong>City:</strong> <?php echo $contact['Contact']['city']; ?>,
                            <?php
						$state_label = 'State';
						if(empty($contact['Contact']['country'])|| $contact['Contact']['country'] == 'United States'){
						?>
                        <strong>County:</strong> <?php echo $contact['Contact']['county']; ?>,
						<?php } else{
						$state_label = $this->App->getStateLabels($contact['Contact']['country']);
						} ?>
                         <strong><?php echo $state_label; ?>:</strong> <?php echo $contact['Contact']['state']; ?>,
						<strong>Zip:</strong> <?php echo $contact['Contact']['zip']; ?>
						<?php if($contact['Contact']['your_location'] != ''){ ?>
, <strong>Your Location:</strong> <?php echo $contact['Contact']['your_location']; ?>
						<?php } ?>



					</li>

					<li>

						<i class="fa fa-envelope"></i> <strong>Email:</strong> <span style="/* word-break: break-all; */ ">

              <!-- Removed per request by Dan and Andi ASR10062015 -->
              <!--
              <a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Email Update (All)') )); ?>" class="no-ajaxify status_note_update" >
                <u><?php echo $contact['Contact']['email']; ?></a></u><?php echo $contact['dnc_icon_email']; ?>
              </a>
              -->

              <a style="display: inline; font-size: 12px; font-weight: normal; padding: 1px 5px; color:#3695D5"  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Email Update (All)') )); ?>" class="no-ajaxify status_note_update"><u><?php echo $contact['Contact']['email']; ?></u></a><?php echo $contact['dnc_icon_email']; ?>



						<i class="fa fa-mobile"></i> <strong>Mobile:</strong> <?php $phone = $contact['Contact']['mobile'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
//echo $cleaned;
echo $this->Dncprocess->show_phone($dnc_manual_uplaod_process,$contact['Contact']['dnc_status'], $cleaned, 	$contact['Contact']['modified'],$contact['Contact']['sales_step']);

?> <?php echo $contact['dnc_icon_phone']; ?>

<i class="fa fa-phone"></i> <strong>Phone:</strong>
						<?php $phone1 = $contact['Contact']['phone'];
						$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
						$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
						//echo $cleaned1;

						echo $this->Dncprocess->show_phone(
						$dnc_manual_uplaod_process,
						$contact['Contact']['dnc_status'],
						$cleaned1,
						$contact['Contact']['modified'],
					 	$contact['Contact']['sales_step']);

						?> <?php echo $contact['dnc_icon_phone']; ?>

						<i class="fa fa-phone"></i> <strong>Work:</strong>
						<?php $phone1 = $contact['Contact']['work_number'];
						$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
						$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
						//echo $cleaned1;

						echo $this->Dncprocess->show_phone(
						$dnc_manual_uplaod_process,
						$contact['Contact']['dnc_status'],
						$cleaned1,
						$contact['Contact']['modified'],
					 	$contact['Contact']['sales_step']);

						?> <?php echo $contact['dnc_icon_phone']; ?>,


						<strong>Preferred Language:</strong> <?php echo $contact['Contact']['preferred_language']; ?>

					</li>

					<li>
						<strong>Step:</strong> <?php echo $sales_step_options[ $contact['Contact']['sales_step'] ]; ?>,

	 					<strong>Status:

	 						<?php if($contact['Contact']['sales_step'] == '10'){ ?>
							<i class="fa fa-dollar"></i>
							<?php } ?>

	 					</strong> <?php echo $contact['Contact']['status']; ?>

						<strong>Originator:</strong>  <?php echo $contact['Contact']['owner']; ?>,
						<strong>Sales Person:</strong> <?php echo ($contact['Contact']['sperson'] != '')?  $contact['Contact']['sperson'] : "Please Transfer" ; ?>
            <?php if(!empty($contact['Contact']['location'])){ ?>
              ,<strong>Location:</strong> <?php echo ($contact['Contact']['location']); ?>
            <?php } ?>
            <?php if(in_array(AuthComponent::user('dealer_id'),$questionnaire_dealers)){ ?>
              ,<strong>Questionnaire :</strong><?php echo $questionnaire_submit; ?>
						<?php }?>


					</li>



				<li style="font-size: 15px;">
						<?php if( $contact['Contact']['spouse_first_name'] != '' ||  $contact['Contact']['spouse_last_name'] != ''){ ?>
					<span style='color:  #101010'>Spouse:</span> <?php echo $contact['Contact']['spouse_first_name']; ?> <?php echo $contact['Contact']['spouse_last_name']; ?>
						<?php } ?>
					</li>
				</ul>

				<?php if($additional_contact == 'On'){ ?>
				<?php if(!empty($additionalContacts)){ ?>
				<hr>
				<h4>Additional Contacts</h4>
					<table class="dynamicTable tableTools table table-bordered checkboxs">
						<tr class="bg-inverse">
							<th>Name</th>
							<th>Address</th>
							<th>Phone/Email</th>
							<th width="200">Info</th>
						</tr>
					<?php foreach($additionalContacts as $addCon){ ?>
						<tr>
							<td>
								<span style="white-space: nowrap;"><strong>First Name:</strong> <?php echo $addCon['AdditionalContact']['first_name']; ?></span><br>
								<span style="white-space: nowrap;"><strong>Last Name:</strong> <?php echo $addCon['AdditionalContact']['last_name']; ?></span>
							</td>
							<td>
								<strong>Address:</strong> <?php echo $addCon['AdditionalContact']['address']; ?>
								<br><strong>City:</strong> <?php echo $addCon['AdditionalContact']['city']; ?>
								<br><strong>State:</strong> <?php echo $addCon['AdditionalContact']['state']; ?>,
								<strong>Zip:</strong> <?php echo $addCon['AdditionalContact']['zip']; ?>
							</td>
							<td>
								<strong>Mobile:</strong> <?php echo $addCon['AdditionalContact']['mobile']; ?>, <strong>Phone:</strong> <?php echo $addCon['AdditionalContact']['phone']; ?><br><strong>Work Number:</strong> <?php echo $addCon['AdditionalContact']['work_number']; ?><br><strong>Email:</strong> <?php echo $addCon['AdditionalContact']['email']; ?>
							</td>
							<td>
								<strong>Vehcile:</strong> <?php echo $addCon['AdditionalContact']['vehicle']; ?>
								<br><strong>Role:</strong> <?php echo $addCon['AdditionalContact']['role']; ?>
								<br><strong>DOB:</strong> <?php echo $addCon['AdditionalContact']['dob']; ?>
							</td>
						</tr>
					<?php } ?>
					</table>
				<?php } ?>
				<?php } ?>


			</div>

		</div>
	</div>
	<hr/>
	<div class="body">
		<div class="row">

			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Unit Value:</span> <?php echo $contact['Contact']['unit_value']; ?></li>
					<li><span class="strong">Condition:</span> <?php echo $contact['Contact']['condition']; ?></li>
					<li><span class="strong">Year:</span> <?php echo ($contact['Contact']['year'] != '0')? $contact['Contact']['year'] : "Any Year" ; ?></li>
					<li><span class="strong">Make:</span> <?php echo $contact['Contact']['make']; ?></li>
					<li><span class="strong">Model:</span> <?php echo $contact['Contact']['model']; ?></li>
					<li><span class="strong">Unit Type:</span> <?php echo $contact['Contact']['type']; ?></li>
					<li><span class="strong">Class:</span> <?php echo $class; ?></li>
					<li><span class="strong">Stock Number:</span> <?php echo $contact['Contact']['stock_num']; ?></li>
					<li><span class="strong">Buying Time:</span> <?php echo $contact['Contact']['buying_time']; ?></li>
					<li><span class="strong">Best Time:</span> <?php echo $contact['Contact']['best_time']; ?></li>
				</ul>

			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">T/Value:</span> <?php echo $contact['Contact']['trade_value']; ?></li>
					<li><span class="strong">T/Used:</span> <?php echo $contact['Contact']['condition_trade']; ?></li>
					<li><span class="strong">T/Year:</span> <?php echo ($contact['Contact']['year_trade'] != '0')? $contact['Contact']['year_trade'] : "Any Year" ; ?></li>
					<li><span class="strong">T/Make:</span> <?php echo $contact['Contact']['make_trade']; ?></li>
					<li><span class="strong">T/Model:</span> <?php echo $contact['Contact']['model_trade']; ?></li>
					<li><span class="strong">T/Type:</span> <?php echo $contact['Contact']['category_trade']; ?></li>
					<li><span class="strong">T/Class:</span> <?php echo $class_trade; ?></li>
					<li><span class="strong">T/Stock#</span> <?php echo $contact['Contact']['stock_num_trade']; ?></li>

					<li><span class="strong">Deal:</span>

					<div class="btn-group">

							<?php if( in_array($group_id, $forms_view) || $group_id == '9' || $group_id == '9'  ){  ?>
                        	<button contact_id = "<?php echo $contact['Contact']['id']; ?>"  class='btn btn-xs btn-success deal_add_new'>Forms</button>
                        	<?php }  ?>


						<?php /* if(!empty($contact['Deal'])){ ?>

							<button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown">
								Edit
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right">
								<li><a id="worksheet_poup" class="no-ajaxify" href="/deals/work_sheet2/<?php echo $contact['Deal'][0]['id']; ?>">Worksheet</a></li>
								<li><a href="/deals/deals_input_edit/<?php echo $contact['Deal'][0]['id']; ?>/selected_lead_type:/">Credit</a></li>
							</ul>

						<?php }else{ ?>

							<button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown">
								+ New
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right">
									<li><a id="worksheet_poup" class="no-ajaxify" href="/deals/worksheet/<?php echo $contact['Contact']['id']; ?>">Worksheet</a></li>
									<li><a href="/deals/deals_input/<?php echo $contact['Contact']['id']; ?>">Credit</a></li>
							</ul>

						<?php } */ ?>


					</div>

				</li>



					<li><span><strong>Lead Age: </strong>
					<?php
					$startTimeStamp1 = strtotime($contact['Contact']['created']);
					$endTimeStamp1 = strtotime("now");
					$timeDiff1 = abs($endTimeStamp1 - $startTimeStamp1);
					$numberDays1 = $timeDiff1/86400;  // 86400 seconds in one day
					$numberDays1 = intval($numberDays1);
					echo $numberDays1
					?> Day(s)&nbsp;</span></li>

				</ul>

			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Lead ID:</span>&nbsp; <span class="label label-primary label-stroke">#<?php echo $contact['Contact']['id']; ?></span></li>
					<li>
						<span class="strong">This Lead is:
							<?php if($contact['Contact']['lead_status'] =='Open'){ ?>
								<i class="fa fa-folder-open-o"></i>
							<?php }else if($contact['Contact']['lead_status'] =='Closed'){ ?>

								<?php if($contact['Contact']['sales_step'] == '10'){ ?>
									<i class="fa fa-dollar text-success"></i>
								<?php }else{ ?>
									<i class="fa fa-times-circle"></i>
								<?php } ?>

							<?php } ?>
						</span>
						<?php echo $contact['Contact']['lead_status']; ?>
					</li>
				    <li><span class="strong">Source</span> <?php echo $contact['Contact']['source']; ?></li>
					<li><span class="strong">Gender:</span> <?php echo $contact['Contact']['gender']; ?></li>
          <li><span class="strong">Date of Birth:</span> <?php echo $contact['Contact']['dob']; ?></li>
					<li><span class="strong">Second Face: </span> <?php echo $second_face; ?></li>
					<li><span class="strong">Created:</span> <?php echo $this->Time->format('n/j/Y g:i A', $contact['Contact']['created']); ?></li>
					<li><span class="strong">Modified:</span> <?php echo $this->Time->format('n/j/Y g:i A', $contact['Contact']['modified']); ?></li>


					<li>
						<?php if($casl_feature == 'On'){ ?>

							<span class="strong">CASL Status:</span> <?php echo $contact['ContactCaslStatus']['name']; ?>
							<?php
							if(in_array($contact['ContactCaslStatus']['id'], array('3', '4')) ){
								echo " <i style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
							} ?>

						<?php }else{ ?>
							<span class="strong">DNC Status:</span> <?php echo ($contact['Contact']['dnc_status'] != '')? $DncStatusOptions[$contact['Contact']['dnc_status']] : ""  ; ?>
							<?php
							if($contact['Contact']['dnc_status'] != '' && $contact['Contact']['dnc_status'] != 'ok_call_email'){
								echo " <i style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
							} ?>
						<?php } ?>

					</li>
					<li><span class="strong">Event:</span>
						<?php  if(!empty($appointment)){ ?>
							<a style="display: inline; color: blue; padding: 0; font-weight: normal;"
							 href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['Contact']['id'], '?'=> array('update_type'=>'Set Appointment') )); ?>"  class='no-ajaxify status_note_update'  ><u><?php echo date('m/d/Y g:i A', strtotime($appointment['Event']['start'])); ?></u></a>
						<?php } ?>

					</li>
						<li><span><strong>Dormant: </strong><?php

				$event_start = 0;
				if(!empty($appointment)){
					$event_start = strtotime($appointment['Event']['start']);
				}
				 $startTimeStamp = strtotime($contact['Contact']['modified']);
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

			</div>
		</div>

		<div class="row">
			<div class="col-md-12 highlight-text">
				<hr>
				<span class="strong"><i class="fa fa-book"></i> <span style='font-size: 15px;'>Current Notes:</span></span>

					<?php if($contact['Contact']['spit_deal_update'] == 'yes' ){  ?>
						<span class="text-primary">Split Deal Update:</span>
					<?php }  ?>

					<?php
					echo $this->Text->truncate( strip_tags($contact['Contact']['notes']),200,array('html'=>true,
					'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_details no-ajaxify" contact_id = "'.
					$contact['Contact']['id'].'" >Read more</a>'));
					?>

					<br> <span>(<?php echo $note_sales_person; ?> -  <?php echo $this->Time->format('n/j/Y g:i A', $contact['Contact']['modified']); ?> )</span>

					<!-- Location Transfer Notes -->

					<?php
					// debug($contact);
					if($contact['Contact']['staff_transfer'] == true && $contact['Contact']['modified'] == $contact['Contact']['location_modified']){

						 // debug($history_ar);
					?>

					<div class="blink" id="lead_transfer_comment"><?php echo $lead_transfer_note; ?></div>

					<?php } ?>


					<hr>

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

		<?php if(!empty($addonTradeVehicles)){ ?>
		<div class="row">
			<div class="col-md-12">
				<h4 class="text-primary">Trade Add-On Vehicle</h4>
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
					<?php foreach($addonTradeVehicles as $addonTradeVehicle){ ?>
						<tr>
							<td><?php echo $addonTradeVehicle['AddonTradeVehicle']['category']; ?></td>
							<td><?php echo $addonTradeVehicle['AddonTradeVehicle']['type']; ?></td>
							<td><?php echo $addonTradeVehicle['AddonTradeVehicle']['year']; ?></td>
							<td><?php echo $addonTradeVehicle['AddonTradeVehicle']['make']; ?></td>
							<td><?php echo $addonTradeVehicle['AddonTradeVehicle']['model']; ?></td>
							<td><?php echo
								($addonTradeVehicle['Category']['body_sub_type'] != '')?
									$addonTradeVehicle['Category']['body_sub_type'] :
									$addonTradeVehicle['AddonTradeVehicle']['class'];
							?></td>
							<td><?php echo $addonTradeVehicle['AddonTradeVehicle']['condition']; ?></td>
							<td><?php echo $addonTradeVehicle['AddonTradeVehicle']['vin']; ?></td>
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
				<a class="glyphicons <?php echo $value;  ?>"

					<?php echo ($key == 'Consent' &&  in_array($contact['Contact']['contact_casl_status_id'], array('3', '4')) ) ? "style='color: red;  font-weight: bold;'" : "";  ?>

				   <?php echo ($key == 'DNC')? "style='color: red;  font-weight: bold;'" : "";  ?>
				     href="#content_<?php echo str_replace(" ", "_", $key);  ?>" data-toggle="tab">
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
				<?php echo $this->element('history_content', array('htype' => $key, 'history'=>$history_ar[$key], 'update_type'=>$update_type)); ?>
			</div>
			<?php $cnt++; } }  ?>
<!--Andi -->
			<?php
			 if(!empty($history_others)){
			?>
			<div id="content_others" class="tab-pane">
				<?php echo $this->element('history_content', array('htype' => "",'history'=>$history_others)); ?>
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
<?php //debug($contact);   ?>
<script>
$(function(){

	console.log(location.hash);

	var $div2blink = $("#lead_transfer_comment");
	setInterval(function(){
		$div2blink.toggleClass("button_flash");
	},1000);


	$(".bdc_apt_show_log").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			dataType: "json",
			url: $(this).attr("href"),
			success: function(data){
				var message_apt_show = '<br><b>You set the following customer as arrived for a lead visit. They have visited ('+data.count+') times '+data.datetime + " :  "+data.contact.Contact.first_name + " "+data.contact.Contact.last_name+"</b><br><br>";

				bootbox.dialog({
					message: message_apt_show,
					backdrop: true,
					title: "Apt. Show",
				}).find("div.modal-dialog").addClass("largeWidth");


				$.ajax({
					type: "GET",
					cache: false,
					url: "/contacts/lead_details/"+data.contact.Contact.id,
					success: function(data){
						$("#lead_details_content").html(data);
					}
				});





			}
		});


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
		<?php
		$html='<div style="text-align:center;">';
		$i=1;

		//echo "<pre>";
	//	print_r($dealer_forms);
		//die;

		foreach($dealer_forms as $form){
			$form_dealer_id = $form['DealerForm']['dealer_id'];
			if($form['CustomForm']['form_type']=='credit'){
				$html.='<a href="/deals/deals_input/###" class="btn btn-primary no-ajaxify" style="margin-left:5px;" >'.$form['CustomForm']['button_name'].'</a>';
			}
			if($form['CustomForm']['action_name']=='worksheet' && !empty($contact['Deal']))
			{


                            $html.='<input type="checkbox" name="custom_print_form[]" data-id="'.$form['CustomForm']['id'].'" class="custom_print_form" style="margin-left:7px;" /><button data-url="/deals/work_sheet2/'.$contact['Deal'][0]['id'].'" type="button" class="btn btn-inverse deal_forms" style="margin-left:5px;">'.$form['CustomForm']['button_name'].'</button>';
			}else{

			/*
			if($form['CustomForm']['action_name']=='custom_worksheet' && in_array($form_dealer_id,array(61000,62000,112)))
			{
				$form['CustomForm']['button_name'] = "Whole Goods";
			}


			if($form['CustomForm']['action_name']=='custom_worksheet' && in_array($form_dealer_id,array(62000)))
			{
				$form['CustomForm']['button_name'] = "Trade Evaul";
			}
			if($form['CustomForm']['action_name']=='custom_worksheet' && in_array($form_dealer_id,array(1606)))
			{
				$form['CustomForm']['button_name'] = "River Valley Power";
			}
			*/

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
								title: "<?php echo AuthComponent::user('dealer'); ?>",
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
								title: "<?php echo AuthComponent::user('dealer'); ?>",
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
								title: "<?php echo AuthComponent::user('dealer'); ?>",
							}).find("div.modal-dialog,div.modal-dialog div.model-content").addClass("largeWidth");
							$("div.dynamic_height").scrollTop(1);
						}
					});

		});
	});


	$(".remove_bad_web_lead").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Remove bad web lead",
				}).find("div.modal-dialog").addClass("largeWidth3");
			}
		});

	});


	$("#uplaod_files").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/contact_s3/index/"+$("#uplaod_files").attr("data-contact-id"),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "File Manager",
				});
			}
		});

	});
	function drag_start(event) {
	    var style = window.getComputedStyle(event.target, null);
	    event.dataTransfer.setData("text/plain",
	    (parseInt(style.getPropertyValue("left"),10) - event.clientX) + ',' + (parseInt(style.getPropertyValue("top"),10) - event.clientY));
	}
	function drag_over(event) {
	    event.preventDefault();
	    return false;
	}
	function drop(event) {
	    var offset = event.dataTransfer.getData("text/plain").split(',');
	    var dm = document.getElementById('dragme');
	    dm.style.left = (event.clientX + parseInt(offset[0],10)) + 'px';
	    dm.style.top = (event.clientY + parseInt(offset[1],10)) + 'px';
	    event.preventDefault();
	    return false;
	}

	document.body.addEventListener('dragover',drag_over,false);
	document.body.addEventListener('drop',drop,false);
	var short_form_url = "";
	$(".status_note_update").click(function(event){

		event.preventDefault();

		short_form_url = $(this).attr('href');

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

			<?php if( AuthComponent::user('id') != $contact['Contact']['user_id'] && !empty($contact['Contact']['user_id'])){ ?>



			// if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
			// 	$.ajax({
			// 		type: "GET",
			// 		cache: false,
			// 		url: $(this).attr('href'),
			// 		success: function(data){
			// 			bootbox.dialog({
			// 				message: data,
			// 				title: "Update lead",
			// 			}).find("div.modal-dialog").addClass("largeWidth3");
			// 		}
			// 	});
			// }



			bootbox.dialog({
				message: "<div  style='text-align: center'><strong><i style='color: #CC3A3A; font-size: 20px;' class='fa fa-exclamation-triangle'></i> You are not the current owner of this customer lead. Your changes will be added to the owners change-Log<div>",
				title: "Update lead",
				buttons: {
					success: {
						label: "Ok",
						className: "btn-success",
						callback: function() {

							$.ajax({
								type: "GET",
								cache: false,
								url: short_form_url,
								success: function(data){
									bootbox.dialog({
										message: data,
										closeButton : false,
										title: "Update lead",
									}).find("div.modal-dialog").addClass("largeWidth3").attr("id", "dragme").attr("draggable", true);
									var dm = document.getElementById('dragme');
									dm.addEventListener('dragstart',drag_start,false);
								}
							});


						}
					},
					alert: {
						label: "Split Deal Update",
						className: "btn-warning",
						callback: function() {

							$.ajax({
								type: "GET",
								cache: false,
								url: short_form_url,
								data: {spit_deal_update:"yes"},
								success: function(data){
									bootbox.dialog({
										message: data,
										title: "Update lead",
									}).find("div.modal-dialog").addClass("largeWidth3").attr("id", "dragme").attr("draggable", true);
									var dm = document.getElementById('dragme');
									dm.addEventListener('dragstart',drag_start,false);
								}
							});

						}
					},
					<?php if($group_id == 10 || $group_id == 11 || $group_id == 12){  ?>
					internet_update: {
						label: "Internet Sales (Update)",
						className: "btn-warning",
						callback: function() {

							$.ajax({
								type: "GET",
								cache: false,
								url: short_form_url,
								data: {spit_deal_update:"yes"},
								success: function(data){
									bootbox.dialog({
										message: data,
										title: "Update lead",
									}).find("div.modal-dialog").addClass("largeWidth3").attr("id", "dragme").attr("draggable", true);
									var dm = document.getElementById('dragme');
									dm.addEventListener('dragstart',drag_start,false);
								}
							});

						}
					},
					<?php } ?>
					danger: {
						label: "Cancel",
						className: "btn-danger",
						callback: function() {

						}
					}
				}

			}).find("div.modal-dialog").addClass("largeWidth-min center_footerbutotn");






			<?php }else{ ?>

			$.ajax({
				type: "GET",
				cache: false,
				url: $(this).attr('href'),
				success: function(data){
					bootbox.dialog({
						message: data,
						closeButton : false,
						title: "Update lead",
					}).find("div.modal-dialog").addClass("largeWidth3").attr("id", "dragme").attr("draggable", true);
					var dm = document.getElementById('dragme');
					dm.addEventListener('dragstart',drag_start,false);
				}
			});
			<?php } ?>



		<?php } ?>



	});



	$(".read_more_contact_note_details").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "/contacts_manage/contact_comment",
			data: {'contact_id': $(this).attr('contact_id')},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Contact Notes",
				});
			}
		});


	});


	$(".push_deal").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "/Deals/push_deal/"+$(this).attr('id'),
                          beforeSend: function(){
                            bootbox.dialog({
                                closeButton: false,
                                message: '<b>Please wait...</b>',
                                backdrop: true,
                                title: "Push to DMS",
                            });
                                    //.find("div.modal-dialog").addClass("largeWidth");
                        },
			success: function(data){
                             bootbox.hideAll();
				bootbox.dialog({
					message: data,
					title: "Push to DMS",
				});
			}
		});


	});

        $(".push_deal_rv").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "/Deals/rv_push_deal/"+$(this).attr('id'),
                          beforeSend: function(){
                            bootbox.dialog({
                                closeButton: false,
                                message: '<b>Please wait...</b>',
                                backdrop: true,
                                title: "Push to DMS RV Worksheet",
                            });
                                    //.find("div.modal-dialog").addClass("largeWidth");
                        },
			success: function(data){
                             bootbox.hideAll();
				bootbox.dialog({
					message: data,
					title: "Push to DMS RV Worksheet",
				});
			}
		});


	});


	$(".read_more_history_note_details").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "/contacts_manage/history_comment",
			data: {'history_id':$(this).attr('history_id')},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "History Notes",
				});
			}
		});

	});

	$(".btn_owner_change").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Originator Change",
				});
			}
		});

	});



	$("#transfer_lead_link, #transfer_lead_location_link").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Move Lead",
				}).find("div.modal-dialog").addClass("largeWidth3");
			}
		});

	});


	$("#worksheet_poup").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "<?php echo AuthComponent::user('dealer'); ?>",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});

	});


	//Note upate

	$("#note_update_link").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					title: "Note Update",
					buttons: {
						success: {
							label: "Ok",
							className: "btn-success",
							callback: function() {

								if( $("#ContactNoteUpdate").val() != '' ){

									$("#message_eror").html('');
									$.ajax({
										type: "POST",
										data: $("#ContactNoteUpdateForm").serialize(),
										url: $("#ContactNoteUpdateForm").attr('action'),
										success: function(data){
											//console.log(data);
											//return true;
											location.href = "/contacts/leads_main/view/"+$("#ContactContactId").val();
										}
									});
									return false;

								}else{
									 $("#message_eror").html('Please enter note');
									 return false;
								}
							}
						},
					}
				});


			}
		});


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
                                            location.reload();
											//location.href = "/contacts/leads_main/view/"+data;
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



	$("#work_lead_link, #work_lead_link2, #work_lead_link_gsm").click(function(event){
		<?php if( AuthComponent::user('id') != $contact['Contact']['user_id']){ ?>
			event.preventDefault();
			if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
				location.href = $(this).attr('href');
			}
		<?php } ?>
	});

	$("#uplaod_additional_contact").click(function(e){
		e.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Upload Additional Contacts",
				}).find("div.modal-dialog").addClass("midWidth");
			}
		});
	});




	//surveyresponse
	$(".show_survey_response").click(function(e){
		e.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "BDC Survey",
				}).find("div.modal-dialog").addClass("midWidth");
			}
		});

	});
	// view lead score

	$(".view_lead_score").click(function(e){
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
					title: <?php echo json_encode("Score Lead - ". $contact['Contact']['first_name'] . "&nbsp;" . $contact['Contact']['last_name'].' '.$cleaned.'  Sperson:'.$contact['Contact']['sperson']);  ?>,
				}).find("div.modal-dialog").addClass("midWidth");
				}
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
					title: <?php echo json_encode("Score Lead - ". $contact['Contact']['first_name'] . "&nbsp;" . $contact['Contact']['last_name'].' '.$cleaned.'  Sperson:'.$contact['Contact']['sperson']);  ?>,
				}).find("div.modal-dialog").addClass("midWidth");
			}
		});
		}else
		{
			alert('Please add the recipients email address in the Score Lead Email Group in Dealer Settings');
			return false;
		}

	});

	// Appointment mark as showed

		$(".mark_cust_showed").on('click',function(e){
		e.preventDefault();
		data_id = $(this).attr('data-id');
		$obj = $(this);
		$.ajax({
			type:'GET',
			url:'<?php echo $this->Html->url(array('controller' =>'events','action' => 'customer_showed')); ?>/'+data_id,
			success: function(data){
			$obj.parent().remove();
				}
			});

		});

		<?php if($other_salesperson_transfer){ ?>
		$.ajax({
			type: "GET",
			cache: false,
			url:'<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'lead_transfer', $contact['Contact']['id'])); ?>',
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Move Lead",
				}).find("div.modal-dialog").addClass("largeWidth3");
			}
		});
		<?php } ?>

    $(".highlight-text").on('click', function(){
        $('mark').contents().unwrap();
    });

});
</script>
