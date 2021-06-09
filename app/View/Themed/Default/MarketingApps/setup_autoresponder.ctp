<style>
.largeWidth {
    margin: 0 auto;
    width: 1084px;
}
.errorClass { border:1px solid #cc3a3a !important; }
</style>
<script>
<?php
if(isset($autoresponders['AutoresponderRule']) && is_array($autoresponders['AutoresponderRule'])){
	$total_rule_rows = count($autoresponders['AutoresponderRule']);
}else{
	$total_rule_rows = 1;
}


if(count($other_autoresponders)<=0){
	$total_other_rule_rows = 1;
}else{
	$total_other_rule_rows = count($other_autoresponders);
}

if(!isset($this->request->params['named']['reload'])){
?>
	url = window.location.href+"/reload:true";
	//alert(url);
	//window.location.href = url ;
<?php
}
?>

var TotalRulesRows = "<?php echo $total_rule_rows;?>";
function addNewRulesRow(){
	TotalRulesRows = parseInt(TotalRulesRows);
	var contents = $("#hidden_autoresponder_rules").html();
	TotalRulesRows = TotalRulesRows+1;
	var newRow = '<div id="rules_row_'+TotalRulesRows+'">';
	$("#rules_container").append(newRow+contents+'</div>');
	
	$("#rules_row_"+TotalRulesRows+" .closebutton").prepend('<div style="text-align: right; margin-top: 13px; " id="remove_rules_row"><a class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="removeRulesRow('+TotalRulesRows+');"> X </a></div>');
}

function removeRulesRow(id,db_id){
	if(id>1){
		if(parseInt(db_id)>0){
				if(confirm("Are you sure to delete this rule?")){
					delete_autoresponder_rule(db_id,'rules_row_'+id);
				}
		}else{
			$("#rules_row_"+id).remove();
		}
		
		
	}else{
		//alert("")
	}
	
}



var TotalOtherRulesRows = "<?php echo $total_other_rule_rows;?>";
function addNewOtherRulesRow(){
	TotalOtherRulesRows = parseInt(TotalOtherRulesRows);
	var contents = $("#hidden_autoresponder_other_rules").html();
	TotalOtherRulesRows = TotalOtherRulesRows+1;
	var newRow = '<div id="other_rules_row_'+TotalOtherRulesRows+'">';
	$("#other_rules_container").append(newRow+contents+'</div>');
	
	$("#other_rules_row_"+TotalOtherRulesRows+" .row").append('<div style="display: inline; vertical-align: middle; padding-top: 50px;" id="remove_other_rules_row"><a class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="removeOtherRulesRow('+TotalOtherRulesRows+');"> X </a></div>');
}

function removeOtherRulesRow(id,db_id){
	if(id>1){
		if(parseInt(db_id)>0){
				if(confirm("Are you sure to delete this rule?")){
					delete_autoresponder_rule(db_id,'other_rules_row_'+id);
				}
		}else{
			$("#other_rules_row_"+id).remove();
		}
	}else{
		//alert("")
	}
	
}

function delete_autoresponder_rule(id,delete_cntnr){
	$.ajax({
			type: "GET",
			cache: false,
			url: "/eblasts/delete_autoresponder_rule/"+id,
			success: function(data){
				$("#"+delete_cntnr).remove();
			}
		});
}
</script>
</br>
<?php
$timezone = AuthComponent::user('zone');
//echo $timezone;
?>
<?php
$sperson = AuthComponent::user('username');
//echo $sperson;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimeshort = date('mdY');
//echo $datetimeshort;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimeslash = date('m/d/Y');
//echo $datetimeslash;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimetext = date('Y-m-d H:i:s');
//echo $datetimetext;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimefullview = date('D - M d, Y g:i A');
//echo $datetimefullview;
?>
<?php
$company = AuthComponent::user('dealer');
// echo $x;
$companyid = AuthComponent::user('dealer_id');
// echo $x;
?>
<!-- get salesperson (user ful name) -->
<?php
$x = AuthComponent::user('full_name');
// echo $x;

?>
<style type="text/css"> .results { background-color: #7785A3; color: #FFFFFF; font-weight: bold; margin: 10px; padding: 10px; } #search-result-content { max-height:450px; overflow:scroll-x; } </style>


<br />
<br />
<br />
<div id="hidden_autoresponder_rules" style="display:none;">
	<?php echo $this->element( 'hidden_autoresponder_rules' ); ?>
</div>

<div id="hidden_autoresponder_other_rules" style="display:none;">
	<div class="row">
		<div class="col-md-2">
			<?php echo $this->Form->label('rule_type','Rule Type:'); ?>
			<?php 
			$rule_category = array('Purchase'=>'Purchase','Anniversary'=>'Anniversary','Warranty Reminder'=>'Warranty Reminder','Welcome'=>'Welcome');
			echo $this->Form->input('rule_type[]', array('id'=>'AutoresponderRuleType[]','name'=>'rule_type[]','type' => 'select', 'options' => $rule_category,'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%','value'=>$rule_type,'onchange'=>'return ShowDuration(this)'));?>
			<div class="separator"></div>
		</div>
		
		<div class="col-md-2 DurationFields" style="display:none;">
			<?php echo $this->Form->label('duration','Send Email:'); ?>
			<?php 
			$duration_category = array('Immediately'=>'Immediately','Other'=>'Other');
			echo $this->Form->input('duration_category[]', array('name'=>'duration_category[]','type' => 'select', 'options' => $duration_category,'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%','value'=>'','onchange'=>'return ShowOtherField(this)'));?>
			<div class="separator"></div>
		</div>
		
		<div class="col-md-2 OtherFields" style="display:none;">
			<?php echo $this->Form->label('other','&nbsp;'); ?><br>
			<?php 
			$Days = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10);
			$AfterBefore = array('Before'=>'Before','After'=>'After');
			echo $this->Form->input('duration_days[]', array('name'=>'duration_days[]','type' => 'select', 'options' => $Days,'empty' => 'Days','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 35%','value'=>''));
			echo '&nbsp;'.$this->Form->input('duration_afterbefore[]', array('name'=>'duration_afterbefore[]','type' => 'select', 'options' => $AfterBefore,'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 50%','value'=>''));
			?>
			<div class="separator"></div>
		</div>

		<div class="col-md-1 OtherFields" style="display:none;">
			<?php
			echo $this->Form->label("date",'Date:'); 
			echo $this->Form->input('date', array(
				'name'=>'date',
				'type' => 'select',
				'id' => false,
				'options' => array("Sold Date"=>'Sold Date'),
				'empty' => false,
				'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'
			));
			?>
			<div class="separator"></div>
		</div>

		
		<div class="col-md-2">
			<?php
			echo $this->Form->label('search_source','Template:'); 
			echo $this->Form->input('template_other[]', array(
				'name'=>'template_other[]',
				'type' => 'select',
				'options' => $templates,
				'empty' => 'Select',
				'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%',
				'selected'=>$sel_template_id
			));
			?>
			<span style="float:right;"><a href="javascript:void(0)" onclick="ShowTemplate(this,'first');">Click to View Template</a></span>
			<div class="separator"></div>
		</div>

		<div class="col-md-2" style="width:150px;" >
			<?php echo $this->Form->label('duration','Email Mode:'); ?>
			<?php 
			$email_mode = array('SendgridAPI'=>'Sendgrid API','Email'=>'Email');
			echo $this->Form->input('email_mode[]', array('name'=>'email_mode[]','type' => 'select', 'options' => $email_mode,'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 90%','value'=>''));?>
			<div class="separator"></div>
		</div>
		
		<div class="col-md-2">
			<div class="make-switch" style="margin-top:25px" data-on="success" data-off="default">
				<input class="active_other_rule_tmp" name="other_rule_activate_tmp_<?php echo $details['id'];?>" id="other_rule_active_<?php echo $details['id'];?>" type="checkbox"  checked="checked"  value=""   />
			</div>
			
			
		</div>
	</div>
</div>


<?php echo $this->Form->create('Autoresponder', array('validate'=>"0", 'type'=>'post','class' => 'form-inline apply-nolazy', 'role'=>"form","onsubmit"=>"return ValidateAutoresponder();")); ?>

<div class="innerLR widget-employees">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">



			<div class="wizard">
				<div class="widget widget-tabs widget-tabs-responsive">
					<!-- Widget heading -->
					<!-- // Widget heading END -->
					<div class="widget-body"> 
					
						<div class="tab-content">
							<!-- Step 1 -->
							<div class="tab-pane active" id="tab1-1">
								<div class="row">
									<div class="col-md-8">
										<div>
											Add Autoresponder Rule(s): 
											



											<div class="separator"></div>
										</div>
										
										<?php
											//echo $this->Form->label('campaign_name','Campaign Name');
											/*echo $this->Form->input('campaign_name', array(
												'type' => 'text',
												'label'=>false,'div'=>false,'class'=>'form-control',
												'value'=>$autoresponders['Autoresponder']['name']
											)); */
										?>
							
									</div>
									<div class="col-md-4">
										&nbsp;
									</div>
									<div class="separator"></div>
								</div>
									
									<div id="rules_container">
										<?php
										if(count($autoresponders) == 0){
											$total_rule_rows = 1;
										}else{
											$total_rule_rows = count($autoresponders);
										}
										for($i=1;$i<=$total_rule_rows;$i++){
											$details = $autoresponders[$i-1]['AutoresponderRule'];
											$rule_type = $details['rule_type'];
											$search_lead_status = $details['search_lead_status'];
											$search_contact_status_id = $details['search_contact_status_id'];
											$search_sales_step = $details['search_sales_step'];
											$search_status = $details['search_status'];
											$search_status_header = $details['search_status_header'];

											$search_source = $details['search_source'];
											$sel_template_id = $details['template_id'];
											$sel_email_mode = $details['email_mode'];

											$search_status_options = $details['search_status_options'];

											if(isset($details['id'])){
												$id = $details['id'];
											}else{
												$id = 0;
											}

											
										?>
										<?php echo $this->Form->hidden('id[]', array('value' =>$id,'name'=>'id[]'));  ?>
										<?php //echo $this->Form->hidden('rule_type[]', array('name'=>'rule_type[]', 'value' =>"auto_renponder", 'id'=>false) ); ?>

											<div id="rules_row_<?php echo $i;?>">

												

												<div class="row">
													<div class="col-md-10"  >
														<?php echo $this->Form->label('duration','Email Mode:'); ?>
														<?php 
														$email_mode = array('SendgridAPI'=>'Sendgrid API','Email'=>'Email');
														echo $this->Form->input('email_mode', array('name'=>'email_mode[]','type' => 'select', 'options' => $email_mode,'label'=>false,'div'=>false, 'value'=>$sel_email_mode, 'id'=>false,'class' => 'form-control selectpicker'));?>
														<div class="separator"></div>
													</div>
													<div class="col-md-2"  >
														<?php if($i>1){ ?>
															<div style="text-align: right; margin-top: 13px; " id="remove_rules_row"><a class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="removeRulesRow(<?php echo $i;?>,'<?php echo $id;?>');"> X </a></div>
														<?php 	} ?>
													</div>
												</div>	

												<div class="row">
														<div class="col-md-2" >
															<?php echo $this->Form->label('search_contact_status_id','Lead Type:'); ?>
															<?php echo $this->Form->input('search_contact_status_id[]', array(
																'name'=>'search_contact_status_id[]',
																'type' => 'select',
																'options' => $ContactStatus,
																'empty' => 'Select', 'id'=>false, 'label'=>false,'div'=>false,'class' => 'form-control selectpicker search_contact_status_id','style'=>'width: 100%','selected'=>$search_contact_status_id ));
															?>
															<div class="separator"></div>
														</div>
														
														<div class="col-md-1"  >
															<?php echo $this->Form->label('search_lead_status','Open/Close:'); ?>
															<?php echo $this->Form->input('search_lead_status[]', array('name'=>'search_lead_status[]','type' => 'select', 'options' => array('Open' => 'Open','Closed' => 'Closed'), 'id'=>false, 'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%','value'=>$search_lead_status));?>
															<div class="separator"></div>
														</div>
														
														<div class="col-md-1" >
															<?php echo $this->Form->label('search_sales_step','Step:'); ?>
															<?php
																

															// echo "Here".$search_sales_step;
															 echo $this->Form->select('search_sales_step[]', $SalesStep, array(
																'value'=>trim($search_sales_step),
																'name'=>'search_sales_step[]',
																'empty' => 'Select',
																'label'=>false,'div'=>false, 'class' => 'form-control selectpicker','style'=>'width: 100%'
															));
															?>
															<div class="separator"></div>
														</div>
														
														<div class="col-md-2">
															<?php
															echo $this->Form->label('search_status_header','Status Header:'); 
															echo $this->Form->select('search_status_header[]', $lead_status_headers, array(
																'name'=>'search_status_header[]',
																'empty' => 'Select',
																'value'=>$search_status_header,
																'label'=>false,'div'=>false, 'onchange'=>'set_statuses(this)', 'class' => 'form-control selectpicker','style'=>'width: 100%'));
															?>
															<div class="separator"></div>
														</div>

														<div class="col-md-2">
															<?php
															echo $this->Form->label('search_status','Status:'); 
															echo $this->Form->select('search_status[]',  $search_status_options , array(
																'name'=>'search_status[]',
																'empty' => 'Select',
																'label'=>false,'id'=>false,'div'=>false, 
																'class' => 'form-control selectpicker','style'=>'width: 100%','value'=>trim($search_status)
															));
															?>
															<div class="separator"></div>
														</div>
														
														
														<div class="col-md-2">
															<?php
															echo $this->Form->label('search_source','Source:'); 
															echo $this->Form->input('search_source[]', array(
																'name'=>'search_source[]',
																'type' => 'select',
																'options' => $LeadSource,
																'empty' => 'Select',
																'label'=>false,'id'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%',
																'selected'=>$search_source
															));
															?>
															<div class="separator"></div>
														</div>
														
														<div class="col-md-2">
															<?php
															echo $this->Form->label('search_source','Template:'); 
															echo $this->Form->input('template[]', array(
																'name'=>'template[]',
																'type' => 'select',
																'options' => $templates,
																'empty' => 'Select',
																'label'=>false,'id'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%',
																'value'=>$sel_template_id
															));
															?>
															<span style="float:right;"><a href="javascript:void(0)" onclick="ShowTemplate(this,'first');">Click to View Template</a></span>
															<div class="separator"></div>
														</div>
														
													</div>
												</div>
										<?php
										}
										?>
										</div>
								
								
							</div>
							<!-- // Step 1 END -->
							
						</div>
						<div class="row" style="float:right;">
							 <a href="javascript:void(0);" class="btn btn-xs btn-success" onclick="addNewRulesRow();"> Add </a> &nbsp;&nbsp;&nbsp;
						</div>
						<div class="separator"></div>
						<div class="separator"></div>
			
									
					</div>
				</div>
			</div>




			<div class="wizard">
				<div class="widget widget-tabs widget-tabs-responsive">
					<div class="widget-body"> 




						<!-- Other Rules -->
						<div class="row">
							<div class="col-md-8">
								<div>
									Other Rule(s): 
									
									<div class="separator"></div>
								</div>
								
							</div>
							<div class="col-md-4">
								&nbsp;
							</div>
							<div class="separator"></div>
						</div>
						<div id="other_rules_container">
							<?php
							if(count($other_autoresponders)<=0){
								$total_other_rule_rows = 1;
							}else{
								$total_other_rule_rows = count($other_autoresponders);
							}
							for($i=1;$i<=$total_other_rule_rows;$i++){
								$details = $other_autoresponders[$i-1]['AutoresponderRule'];
								$rule_type = $details['rule_type'];
								$search_lead_status = $details['search_lead_status'];
								$search_contact_status_id = $details['search_contact_status_id'];
								$search_sales_step = $details['search_sales_step'];
								$search_status = $details['search_status'];
								$search_source = $details['search_source'];
								$sel_template_id = $details['template_id'];
								$duration_category = $details['duration_category'];
								$duration_days = $details['duration_days'];
								$duration_afterbefore = $details['duration_afterbefore'];
								$sel_email_mode = $details['email_mode']; 
								$ShowDurationFields = '';
								$ShowOtherFields = '';
								
								if(trim($rule_type)=='Purchase' || trim($rule_type)=='Anniversary' || trim($rule_type)=='Warranty Reminder' ){
									$ShowDurationFields = '';
									if(trim($duration_category)=='Other'){
										$ShowOtherFields = '';
									}else{
										$ShowOtherFields = 'display:none;';
									}
									
								}else{
									$ShowDurationFields = $ShowOtherFields = 'display:none;';
								}
								
								
								
								
								if(isset($details['id'])){
									$id = $details['id'];
								}else{
									$id = 0;
								}
							
							
							
							?>
								<?php echo $this->Form->hidden('id_other[]', array('name'=>'id_other[]','value' =>$id));  ?>
									<div id="other_rules_row_<?php echo $i;?>">
									<div class="row">
										<div class="col-md-2">
											<?php echo $this->Form->label('rule_type','Rule Type:'); ?>
											<?php 
											$rule_category = array('Purchase'=>'Purchase','Anniversary'=>'Anniversary', 'Warranty Reminder'=>'Warranty Reminder' ,'Welcome'=>'Welcome');
											echo $this->Form->input('rule_type[]', array('name'=>'rule_type[]','type' => 'select', 'options' => $rule_category,'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%','value'=>$rule_type,'onchange'=>'return ShowDuration(this)'));?>
											<div class="separator"></div>
										</div>
										
										<div class="col-md-2 DurationFields" style="<?php echo $ShowDurationFields;?>">
											<?php echo $this->Form->label('duration','Send Email:'); ?>
											<?php 
											$duration_category_opt = array('Immediately'=>'Immediately','Other'=>'Other');
											echo $this->Form->input('duration_category[]', array('name'=>'duration_category[]','type' => 'select', 'options' => $duration_category_opt,'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%','value'=>$duration_category,'onchange'=>'return ShowOtherField(this)'));?>
											<div class="separator"></div>
										</div>
										
										<div class="col-md-2 OtherFields" style="<?php echo $ShowOtherFields;?>">
											<?php echo $this->Form->label('other','&nbsp;'); ?><br>
											<?php 
											$Days = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10);
											$AfterBefore = array('Before'=>'Before','After'=>'After');
											echo $this->Form->input('duration_days[]', array('name'=>'duration_days[]','type' => 'select', 'options' => $Days,'empty' => 'Days','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 35%','value'=>$duration_days));
											echo '&nbsp;'.$this->Form->input('duration_afterbefore[]', array('name'=>'duration_afterbefore[]','type' => 'select', 'options' => $AfterBefore,'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 50%','value'=>$duration_afterbefore));
											?>
											<div class="separator"></div>
										</div>

										<div class="col-md-1 DurationFields" style="<?php echo $ShowOtherFields;?>" >
											<?php
											echo $this->Form->label("date",'Date:'); 
											echo $this->Form->input('date', array(
												'name'=>'date',
												'type' => 'select',
												'id' => false,
												'options' => array("Sold Date"=>'Sold Date'),
												'empty' => false,
												'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'
											));
											?>
											<div class="separator"></div>
										</div>

		
										<div class="col-md-2">
											<?php
											echo $this->Form->label('template','Template:'); 
											echo $this->Form->input('template_other[]', array(
												'name'=>'template_other[]',
												'type' => 'select',
												'options' => $templates,
												'empty' => 'Select',
												'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%',
												'value'=>$sel_template_id
											));
											?>
											<span style="float:right;"><a href="javascript:void(0)" onclick="ShowTemplate(this,'second');">Click to View Template</a></span>
											<div class="separator"></div>
										</div>

										<div class="col-md-2" style="width:150px;" >
											<?php echo $this->Form->label('duration','Email Mode:'); ?>
											<?php 
											$email_mode = array('SendgridAPI'=>'Sendgrid API','Email'=>'Email');
											echo $this->Form->input('email_mode[]', array('name'=>'email_mode[]','type' => 'select', 'options' => $email_mode,'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 90%','value'=>$sel_email_mode));?>
											<div class="separator"></div>
										</div>
										
										
										
										<div class="col-md-2">
											<div class="make-switch" style="margin-top:25px" data-on="success" data-off="default">
												<input class="active_other_rule" name="other_rule_activate_<?php echo $details['id'];?>" id="other_rule_active_<?php echo $details['id'];?>" type="checkbox"  <?php if(isset($details['active']) && $details['active'] == 1)  echo 'checked="checked"'; else echo ''; ?>  value="<?php echo $details['id'];?>"   />
											</div>
											
											
										</div>
										
										
										<?php
										if($i>1){
										?>
											<div style="display: inline; vertical-align: middle; padding-top: 50px;" id="remove_other_rules_row"><a class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="removeOtherRulesRow(<?php echo $i;?>,'<?php echo $id;?>');"> X </a></div>
										<?php
										}
										?>
									</div>
								</div>
							<?php
							}
							?>
						</div>
						
						<div class="row" style="float:right;">
							 <a href="javascript:void(0);" class="btn btn-xs btn-success" onclick="addNewOtherRulesRow();"> Add </a> &nbsp;&nbsp;&nbsp;
							<!--  <a href="javascript:void(0);" onclick="removeOtherRulesRow();"> Remove </a>&nbsp;&nbsp;  -->
							
						</div>


						<div class="separator"></div>
						<div class="separator"></div>



					</div>
				</div>
			</div>






				<div class="row">
					<div class="col-md-2 ">
					  <a href="<?php echo $this->Html->url(array('controller'=>'marketing', 'action'=>'index')); ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Cancel</a>
					  <button type="submit" class="btn btn-success hide"><i class="fa fa-save"></i> Add Contact</button>
					</div>
					
					<div class="col-md-10">
						<div class="pagination pull-right margin-none" >
						
							<!-- Wizard pagination controls -->
							<ul class="pagination margin-bottom-none">
								<li >
									<button class="btn btn-success" id="btn-submit-wizard" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Save</button>
								</li>
							</ul>
							<!-- // Wizard pagination controls END -->

						</div>
					</div>
					
				</div>





		</div>
	</div>
	<!-- // row END -->





	
	<?php 

	//debug( $this->request->data );
	
	echo $this->element('sql_dump'); 

	

	?>
	
</div>


<?php echo $this->Form->end(); ?>


<script>
function ValidateAutoresponder(){
	/* Remove all errorClass */
	$(".errorClass").each(function () { 
		$(this).removeClass("errorClass");
	});
	var k=1;
	var errorMsg = '';

	jQuery('#AutoresponderSetupAutoresponderForm select[name="search_contact_status_id[]"]').each(function () { 

		var lead_type = $(this).val();
		if(lead_type != ''){
			var lead_status = $(this).parent().parent().find('select[name="search_lead_status[]"]').val();
			var sales_step = $(this).parent().parent().find('select[name="search_sales_step[]"]').val();
			var status = $(this).parent().parent().find('select[name="search_status[]"]').val();
			var source = $(this).parent().parent().find('select[name="search_source[]"]').val();
			var template = $(this).parent().parent().find('select[name="template[]"]').val();
			if($.trim(lead_type)=='' && $.trim(lead_status)=='' && $.trim(sales_step)=='' && $.trim(status)=='' && $.trim(source)==''){
				// do nothing, just ignore
			}else if($.trim(template)==''){
				errorMsg = errorMsg+"\n\r"+" -Select a Template under 'Add Autoresponder Rule(s)' section, row #"+k;
				$(this).parent().parent().find('select[name="template[]"]').addClass("errorClass");
				
			}
		}

		k++;
	});
	var i = 1;
	jQuery('#AutoresponderSetupAutoresponderForm select[id="AutoresponderRuleType[]"]').each(function () { 
		var rule_type = $.trim($(this).val());
		if(rule_type!=''){
			var duration_category = $(this).parent().parent().find('select[name="duration_category[]"]').val();
			var duration_days = $(this).parent().parent().find('select[name="duration_days[]"]').val();
			var duration_afterbefore = $(this).parent().parent().find('select[name="duration_afterbefore[]"]').val();
			var template = $(this).parent().parent().find('select[name="template_other[]"]').val();
			if($.trim(duration_category)=='Other' && rule_type!='Welcome'){
				if($.trim(duration_afterbefore)==''){
					errorMsg = errorMsg+"\n\r"+' -Select "Before/After" under "Other Rule(s)" section, row #'+i;
					$(this).parent().parent().find('select[name="duration_afterbefore[]"]').addClass("errorClass");
					
				}
				
				if($.trim(duration_days)==''){
					errorMsg = errorMsg+"\n\r"+' -Select "Days" under "Other Rule(s)" section, row #'+i;
					$(this).parent().parent().find('select[name="duration_days[]"]').addClass("errorClass");
					
				}
			}
			if($.trim(template)==''){
				errorMsg = errorMsg+"\n\r"+' -Select a Template under "Other Rule(s)" section, row #'+i;
				$(this).parent().parent().find('select[name="template_other[]"]').addClass("errorClass");
				
			}
		}
		i++;
	});
	
	if(errorMsg!=''){
		alert("Please correct following error(s)"+errorMsg);
		return false;
	}


	//return false;
	
}

function set_statuses(obj){

	status_header = $(obj).val();
	search_status = $(obj).parent().parent().find('select[name="search_status[]"]');
	var already_sel_val = $(search_status).val();

	$(search_status).html('<option value="">Loading....</option>');

	$.ajax({
		type: "GET",
		cache: false,
		url: "/eblasts/status_by_header",
		data: {'header': status_header},
		success: function(data){
			var opts = $.parseJSON(data);
				// Use jQuery's each to iterate over the opts value
				$(search_status).empty();
				$(search_status).append('<option value="">Select</option>');
				$.each(opts, function(i, d) {
					$(search_status).append('<option value="' + i + '">' + d + '</option>');
				});
				if($(search_status).find('option[value="'+already_sel_val+'"]').length > 0){
					$(search_status).val(already_sel_val);
				}
		}
	});


}

/*
function GetStepNStatus(obj){
	var search_sales_step = $(obj).parent().parent().find('select[name="search_sales_step[]"]');
	var search_contact_status_id = $(obj).parent().parent().find('select[name="search_contact_status_id[]"]');
	var sel_val = $(search_contact_status_id).val();
	
	var search_lead_status = $(obj).parent().parent().find('select[name="search_lead_status[]"]');
	var search_lead_status_val = $(search_lead_status).val();
	
	var search_status = $(obj).parent().parent().find('select[name="search_status[]"]');
	
	if(sel_val=='7'){ 
		// Don't  Show Pending for Showroom 
		$(search_sales_step).find('option[value=1]').remove();
	}else if($(search_sales_step).find('option[value=1]').length<=0){
		$(search_sales_step).append('<option value="1">Pending</option>');
	}
	// Reload Status Dropdown 
	var already_sel_val = $(search_status).val();
	if(sel_val=='5'){
		$(search_status).empty();
		$(search_status).append('<option value="">Select</option><option value="Web Lead">Web Lead</option>');
		if($(search_status).find('option[value="'+already_sel_val+'"]').length > 0){
			$(search_status).val(already_sel_val);
		}
	}else{
		if(search_lead_status_val==''){
			search_lead_status_val = 0;
		}
		$(search_status).empty();
		$(search_status).append('<option value="">Loading....</option>');
		$.ajax({
			type: "GET",
			cache: false,
			url: "/eblasts/status_by_leadtype/"+sel_val+"/"+search_lead_status_val,
			success: function(data){
				var opts = $.parseJSON(data);
					// Use jQuery's each to iterate over the opts value
					$(search_status).empty();
					$(search_status).append('<option value="">Select</option>');
					$.each(opts, function(i, d) {
						$(search_status).append('<option value="' + i + '">' + d + '</option>');
					});
					if($(search_status).find('option[value="'+already_sel_val+'"]').length > 0){
						$(search_status).val(already_sel_val);
					}
			}
		});
	}
	
}

*/

function ShowTemplate(obj,type){
	if(type=='first'){
		var template = $(obj).parent().parent().find('select[name="template[]"]');
	}else{
		var template = $(obj).parent().parent().find('select[name="template_other[]"]');
	}
	var sel_template_id = $(template).val();
	if(parseInt(sel_template_id)>0){
		$.ajax({
			type: "GET",
			url: "/eblasts/view_template/"+sel_template_id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Template Details",
				}).find("div.modal-dialog").addClass("largeWidth");;
				
				
				
				
			}
		});
	}else{
		alert("Please select a template first!");
		return false;
	}
}

function ShowDuration(obj){
	if(obj.value=='Purchase' || obj.value=='Anniversary' || obj.value == 'Warranty Reminder'){
		$(obj).parent().parent().find('.DurationFields').show();
		var duration_category = $(obj).parent().parent().find('select[name="duration_category[]"]').val();
		if(duration_category=='Other'){
			$(obj).parent().parent().find('.OtherFields').show();
		}
	}else{
		$(obj).parent().parent().find('.DurationFields').hide();
		$(obj).parent().parent().find('.OtherFields').hide();
	}

}

function ShowOtherField(obj){
	var duration_category = $(obj).parent().parent().find('select[name="duration_category[]"]').val();

  if(duration_category=='Other'){
			$(obj).parent().parent().find('.OtherFields').show();;
		}else{
			$(obj).parent().parent().find('.OtherFields').hide();
		}
}

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


	$('.active_other_rule').change(function(){
		$.ajax({
			type: "get",
			cache: false,
			dataType: 'json',
			data: {'active': $(this).is(":checked"),'id':$(this).val()},
			url:  "/eblasts/activate_autoresponder_rule/",
			success: function(data){
				
			}
		});
		
	});



	$('#AutoresponderSetupAutoresponderForm select[name="search_lead_status[]"]').change(function () { 
		var sales_step = $(this).parent().parent().find('select[name="search_sales_step[]"]').val();
		if($(this).val() == 'Open' && sales_step == '10'){
			alert("OPEN and SOLD selected will get Zero results . Solds are CLOSED. Please Tray again");
		}
	});

	$('#AutoresponderSetupAutoresponderForm select[name="search_sales_step[]"]').change(function () { 
		var lead_status = $(this).parent().parent().find('select[name="search_lead_status[]"]').val();
		if($(this).val() == '10' && lead_status == 'Open'){
			alert("OPEN and SOLD selected will get Zero results . Solds are CLOSED. Please Tray again");
		}
	});



	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

// $(".search_contact_status_id").each(function() {
//    GetStepNStatus($(this));
// });













</script>