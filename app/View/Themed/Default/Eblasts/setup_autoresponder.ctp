<?php 

?>

<style>
.largeWidth {
    margin: 0 auto;
    width: 1084px;
}
.errorClass { border:1px solid #cc3a3a !important; }
input:required, select:required {
    -webkit-transition: text-shadow 1s linear !important;
    -moz-transition: text-shadow 1s linear !important;
    -ms-transition: text-shadow 1s linear !important;
    -o-transition: text-shadow 1s linear !important;
    transition: text-shadow 1s linear  !important;
	border-color: #FF9D81 !important;
    box-shadow: 0px 0px 10px #FFB4B4 !important;
}
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
	unit_content = $("#hidden-unit-info").html();
	TotalOtherRulesRows = TotalOtherRulesRows+1;
	unit_content = unit_content.replace(/######/g,'otherrule_'+TotalOtherRulesRows);
	contents += unit_content;
	var newRow = '<div id="other_rules_row_'+TotalOtherRulesRows+'">';
	$("#other_rules_container").append(newRow+contents+'</div>');

	$("#other_rules_row_"+TotalOtherRulesRows+" .row").first().append('<div style="display: inline; vertical-align: middle; padding-top: 50px;" id="remove_other_rules_row"><a class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="removeOtherRulesRow('+TotalOtherRulesRows+');"> X </a></div>');
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

$TotalWebLeadRules = <?php echo count($autoweblead_rule); ?>;
function addNewWebLeadRule()
{
	$TotalWebLeadRules = parseInt($TotalWebLeadRules)+1;
	var contents = $("#hidden-weblead-rule-clone").html();
	contents = contents.replace(/#####/g,$TotalWebLeadRules);
	$("#weblead-rule-container").append(contents);
	$TotalWebLeadRules = parseInt($TotalWebLeadRules)+1;	
	
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
			$rule_category = array('Purchase'=>'Purchase',
				//'Anniversary'=>'Anniversary',
				'Warranty Reminder'=>'Warranty Reminder','Welcome'=>'Welcome');
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
			//$Days = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10);
			//$Days = range(1,730);
	    $Days = range(1,1460);
			$Days = array_combine($Days,$Days);
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
			<div class="make-switch22" style="margin-top:25px" data-on="success" data-off="default">
				<input class="active_other_rule_tmp" name="other_rule_activate_tmp_<?php echo $details['id'];?>" id="other_rule_active_<?php echo $details['id'];?>" type="checkbox"  checked="checked"  value=""   />
			</div>


		</div>
	</div>
</div>

<div id="hidden-unit-info" style="display:none;">
<div class="row container_unit_info" id="container_unit_info_######" style="display:none;">
<h3>Unit Info</h3>
<div class="col-md-2">
<label>Type</label>
<?php echo $this->Form->input('search_unit_category.', array('type' => 'select', 'options' => $d_type_options, 'empty' => 'Select', 'label'=>false,'div'=>false,'id' =>'search_unit_category_######','data-id' =>'######', 'class' => 'form-control search_unit_category_','style'=>'width: 100%')); ?>
</div>

<div class="col-md-2">
<label>Make</label>
<?php echo $this->Form->input('search_unit_make.', array('type' => 'select', 'required' => false,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control search_unit_make_','id' =>'search_unit_make_######','data-id' =>'######' ,'style'=>'width: 100%'));  ?>
</div>


<div class="col-md-2">
<label>Year</label>
<?php 
$year_all_options['0'] = 'Any Year';
for($i = date('Y') + 1; $i >= 1980; $i--){
	$year_all_options[ $i ] = $i;
}
echo $this->Form->input('search_unit_year.', array('type' => 'select','options' => $year_all_options, 'required' => false,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control search_unit_year_','id' =>'search_unit_year_######','data-id' =>'######','style'=>'width: 100%'));  ?>
</div>

<div class="col-md-2">
<label>Model</label>
<?php 
	echo $this->Form->input('search_unit_model_id.', array('type' => 'select', 'required' => false,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control search_unit_model_id_','id' =>'search_unit_model_id_######','data-id' =>'######','style'=>'width: 100%')); 
	echo $this->Form->hidden('search_unit_model.',array('class' => 'search_unit_model_','id' =>'search_unit_model_######','data-id' =>'######'))
 ?>
</div>
<div class="col-md-2">
<label>Category</label>
<?php echo $this->Form->input('search_unit_type.', array('type' => 'select', 'required' => false,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control search_unit_type_','id' =>'search_unit_type_######','data-id' =>'######','style'=>'width: 100%'));  ?>
</div>
<div class="col-md-2">
<label>Class</label>
<?php echo $this->Form->input('search_unit_class.', array('type' => 'select', 'required' => false,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control search_unit_class_','id' =>'search_unit_class_######','data-id' =>'######','style'=>'width: 100%'));  ?>
</div>
<div class="col-md-12"><div class="separator"></div><div class="separator"></div><hr/></div>

</div>
</div>

<div id="hidden-weblead-rule-clone" style="display:none;">
<div class="row  web-rule-row" data-id ="#####">
 <a style="margin-right:10px;margin-bottom:10px;" class="btn btn-xs btn-danger no-ajaxify pull-right temp-web-rule-remove" href="javascript:void(0)" data-id="#####"> X </a>

    <div class="col-md-4">
    
        <?php echo $this->Form->label('auto_weblead_template','Template:'); ?>
        <br>
        <?php
        
        echo $this->Form->input('WebAutoresponder.#####.auto_weblead_template', array(
            'type' => 'select',
            'options' => $templates,
            'empty' => 'Select',
            'label'=>false,'div'=>false,'class' => 'form-control',
            'style' => 'width:100%;',
            'data-id' => "#####"
        )); ?>
        <div><a href="javascript:void(0)" onclick="ShowTemplateAutoWebLead(#####);">Click to View Template</a></div>
    </div>
    
    <div class="col-md-2">
	  <?php
            echo $this->Form->label('search_source','Source:');
            echo $this->Form->input('WebAutoresponder.#####.search_source', array(
                'type' => 'select',
                'options' => $LeadSource,
                'empty' => 'Select',
                'label'=>false,
                'div'=>false,'class' => 'form-control','style'=>'width: 100%',
                'data-id' => '#####'
            ));
   	  ?>
      
      <?php echo $this->Form->input('WebAutoresponder.#####.auto_weblead_id', array('type' => 'hidden','data-id' => '#####')); ?>
	  <?php echo $this->Form->input('WebAutoresponder.#####.auto_weblead_email_mode', array('type' => 'hidden','data-id' => '#####', 'value'=>'SendgridAPI')); ?>
                        
   </div>
    
     <div class="col-md-12">
     
         <div class="separator"></div>
         <hr/>
          <div class="separator"></div>
     </div>



</div>

</div>






<div class="innerLR">
<?php echo $this->Form->create('WebAutoresponder', array('validate'=>"0", 'type'=>'post','class' => 'form-inline apply-nolazy', 'role'=>"form",'id' =>'WebAutoresponderRuleForm')); ?>
	<div class="row">
		<div class="col-md-12">

			<h4>No Delay, Pre Purchase, Web Only, Auto Responders</h4>
			<div class="widget widget-body-white">

				<div class="widget-body">


					<div>Auto Weblead Rule:</div>
					<br>
				<div id="weblead-rule-container">
					<?php
					
						if(empty($autoweblead_rule))
						{
							$autoweblead_rule[] = array();
						}
						$web_index = 0;
						foreach($autoweblead_rule as $weblead_rule){
					 ?>

					<div class="row web-rule-row" data-id ="<?php echo $web_index; ?>">
                    <?php if(!empty($weblead_rule['AutoresponderRule']['id'])){ ?>
                                            <div class="col-md-1" style="display: inline; vertical-align: middle; padding-top: 10px;float: right" >
                    <a onclick="return confirm('Are you sure to delete this rule?')" style="margin-right:10px;margin-bottom:10px;" class="btn btn-xs btn-danger no-ajaxify pull-right" href="/eblasts/delete_autoresponder_rules_autoweblead/<?php echo $weblead_rule['AutoresponderRule']['id']; ?>"> X </a>
                    </div>
                    <div class="col-md-1" style="float: right;">
        <div class="make-switch22" style="margin-top:5px" data-on="success" data-off="default">
            <input class="active_other_rule" name="other_rule_activate_<?php echo $weblead_rule['AutoresponderRule']['id']; ?>" id="other_rule_active_<?php echo $weblead_rule['AutoresponderRule']['id']; ?>" type="checkbox"  <?php if (isset($weblead_rule['AutoresponderRule']['active']) && $weblead_rule['AutoresponderRule']['active'] == 1) echo 'checked="checked"'; else echo ''; ?>  value="<?php echo $weblead_rule['AutoresponderRule']['id']; ?>"   />
        </div>
    </div>
                    
                    
                    <?php } ?>
						<div class="col-md-4">

							<?php echo $this->Form->label('auto_weblead_template','Template:'); ?>
							<br>
							<?php
							
							echo $this->Form->input('WebAutoresponder.'.$web_index.'.auto_weblead_template', array(
								'type' => 'select',
								'value'=>!empty($weblead_rule['AutoresponderRule']['template_id'])?$weblead_rule['AutoresponderRule']['template_id']:'',
								'options' => $templates,
								'empty' => 'Select',
								'label'=>false,'div'=>false,'class' => 'form-control',
								'style' => 'width:100%;',
								'data-id' => $web_index
							)); ?>
							<div><a href="javascript:void(0)" onclick="ShowTemplateAutoWebLead(<?php echo  $web_index; ?>);">Click to View Template</a></div>
						</div>
                        <div class="col-md-2">
                      <?php
							echo $this->Form->label('search_source','Source:');
							echo $this->Form->input('WebAutoresponder.'.$web_index.'.search_source', array(
								'type' => 'select',
								'options' => $LeadSource,
								'empty' => 'Select',
								'label'=>false,
								'div'=>false,'class' => 'form-control','style'=>'width: 100%',
								'value'=>!empty($weblead_rule['AutoresponderRule']['search_source'])?$weblead_rule['AutoresponderRule']['search_source']:'',
								'data-id' => $web_index
							));
					?>
                        
                        </div>

						<div class="col-md-6">
							<div style="border: 1px solid #c2c2c2" class="innerAll <?php echo empty($weblead_rule['AutoresponderRule']['id'])? 'hide' : ""; ?> " >
								<?php /* ?><a  onclick="return confirm('Are you sure to delete this rule?')" class="btn  btn-danger no-ajaxify pull-right" href="/eblasts/delete_autoresponder_rules_autoweblead/<?php echo $weblead_rule['AutoresponderRule']['id']; ?>">
								<i class="fa fa-times"></i> Remove
							</a><?php */ ?>
								<div class="row" >
									<div class="col-md-3">
										<?php
										$array_days_week = array(
											'Monday' => 'Monday',
											'Tuesday' => 'Tuesday',
											'Wednesday' => 'Wednesday',
											'Thursday' => 'Thursday',
											'Friday' => 'Friday',
											'Saturday' => 'Saturday',
											'Sunday' => 'Sunday',
										); ?>
										<strong>Create Schedule:</strong>
										<?php
										echo $this->Form->input('WebAutoresponder.'.$web_index.'.auto_weblead_weekdays', array(
											'empty'=>'Day',
											'type' => 'select',
											'class'=>"form-control",
											'options' => $array_days_week,
											'label'=>false,
											'div'=>false,
											'data-id' => $web_index
										));
										 ?>
									</div>
									<div class="col-md-3">
										Start:
										<div class="input-group bootstrap-timepicker">
											<?php echo $this->Form->input('WebAutoresponder.'.$web_index.'.auto_weblead_weekdays_start', array('value'=>'', 'placeholder' => 'Start','class'=>"form-control start-time-input",'label'=>false,'div'=>false,'data-id' => $web_index)); ?>
											<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
										</div>

									</div>
									<div class="col-md-3">
										End:
										<div class="input-group bootstrap-timepicker">
											<?php echo $this->Form->input('WebAutoresponder.'.$web_index.'.auto_weblead_weekdays_end', array('value'=>'', 'placeholder' => 'End','class'=>"form-control end-time-input",'label'=>false,'div'=>false,'data-id' => $web_index)); ?>
											<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
										</div>
									</div>
									<div class="col-md-3">
										<br>
										<button type="button" id="add_auto_schedule" data-id="<?php echo $web_index; ?>" class="btn btn-success add_auto_schedule">
											<i class="fa fa-plus"></i>
										</button>
									</div>

								</div>
								<br>
								<hr>
								<div class="row">
									<div class="col-md-12">
										List of schedule
									</div>
									<div class="col-md-12">
										<div id="list_auto_schedule_<?php echo $web_index; ?>" data-id ="<?php echo $web_index; ?>" style="max-height:150px;overflow-y:auto;">
                                        
                                        <?php echo $this->element('save_auto_weblead_scuedule',array('AutowebleadSchedules' => $weblead_rule['AutoresponderRule']['Schedule'])); ?>
                                        
                                        
                                        
                                        </div>
									</div>
								</div>
							</div>
						</div>
                              <div class="col-md-12">  <div class="separator"></div>
                              <hr/>
                               <div class="separator"></div>
                              </div>
                              
                              <?php echo $this->Form->input('WebAutoresponder.'.$web_index.'.auto_weblead_id', array('type' => 'hidden','data-id' => $web_index, 'value'=>!empty($weblead_rule['AutoresponderRule']['id'])?$weblead_rule['AutoresponderRule']['id']:'')); ?>
							<?php echo $this->Form->input('WebAutoresponder.'.$web_index.'.auto_weblead_email_mode', array('type' => 'hidden','data-id' => $web_index, 'value'=>'SendgridAPI')); ?>
					
                   </div>

							
							

						
					<?php
					$web_index++;
					 } ?>
					
				       </div> 

			<div class="row">            
			 <a href="javascript:void(0);" class="btn btn-xs btn-success pull-right" onclick="addNewWebLeadRule();" style="margin-right:10px;margin-top:10px;"> Add </a>
			</div>   

			</div>
               
          
            
		</div>
              <div class="row">
					<div class="col-md-2 ">

					</div>

					<div class="col-md-10 text-right">

						<button class="btn btn-success" id="save_autoresponder_rule" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Save</button>

					</div>

				</div>
				<div class="separator"></div>
	</div>

</div>


<?php echo $this->Form->end(); ?>


<div class="innerLR widget-employees">
	<!-- row -->
	<div class="row">
    <!-- Pre Purchase Rules Start here  -->
    <?php echo $this->Form->create('Autoresponder', array('validate'=>"0", 'type'=>'post','class' => 'form-inline apply-nolazy autoResponseFormCommon','id' => 'AutoResponderForm1', 'role'=>"form","onsubmit"=>"return ValidateAutoresponder(1);")); ?>
		<div class="col-md-12">
			<h4>Variable Pre Purchase, All Leads, Auto Responders</h4>
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
											$sel_top_duration = $details['duration_days'];
											$sel_dormant_duration = $details['dormant_days'];
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
													<div class="col-md-2"  >
														<?php echo $this->Form->label('duration11','Email Mode:'); ?>
														<?php
														$email_mode = array('SendgridAPI'=>'Sendgrid API','Email'=>'Email');
														echo $this->Form->input('email_mode', array('name'=>'email_mode[]','type' => 'select', 'options' => $email_mode,'label'=>false,'div'=>false, 'value'=>$sel_email_mode, 'id'=>false,'class' => 'form-control selectpicker'));?>
														<div class="separator"></div>
													</div>

													<div class="col-md-2" >
														<?php echo $this->Form->label('duration33','After (Days):'); ?>
														<?php
														//$Days = range(1,730);
                            $Days = range(1,1460);
														$Days = array_combine($Days,$Days);
														echo $this->Form->input('top_duration[]', array('name'=>'top_duration[]','type' => 'select', 'options' => $Days,'label'=>false,'div'=>false, 'value'=>$sel_top_duration, 'id'=>false, 'empty' => 'Days', 'class' => 'form-control selectpicker'));?>
														<div class="separator"></div>
													</div>
                                                    <div class="col-md-2" >
														<?php echo $this->Form->label('duration33','Dormant (Days):'); ?>
														<?php
														//$Days = range(1,730);
                           								 $Days = range(1,1460);
														$Days = array_combine($Days,$Days);
														echo $this->Form->input('dormant_days[]', array('name'=>'dormant_days[]','type' => 'select', 'options' => $Days,'label'=>false,'div'=>false, 'value'=>$sel_dormant_duration, 'id'=>false, 'empty' => 'Days', 'class' => 'form-control selectpicker'));?>
														<div class="separator"></div>

			
													</div>
<div class="col-md-1"  style="float: right;">
														<?php if($i>1){ ?>
															<div style="text-align: right; margin-top: 13px; " id="remove_rules_row"><a class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="removeRulesRow(<?php echo $i;?>,'<?php echo $id;?>');"> X </a></div>

														<?php }else{
														if($id != '0'){
													 ?>

													<div style="text-align: right; margin-top: 5px;" ><a onclick="return confirm('Are you sure to delete this rule?')" class="btn btn-xs btn-danger no-ajaxify" href="/eblasts/delete_autoresponder_rules/<?php echo $id; ?>"> X </a></div>

													<?php } }?>

													</div>
<?php 
if($id!='0'){
?>												
    <div class="col-md-1" style="float: right;">
        <div class="make-switch22" style="margin-top:5px" data-on="success" data-off="default">
            <input class="active_other_rule" name="other_rule_activate_<?php echo $id; ?>" id="other_rule_active_<?php echo $id; ?>" type="checkbox"  <?php if (isset($details['active']) && $details['active'] == 1) echo 'checked="checked"'; else echo ''; ?>  value="<?php echo $id; ?>"   />
        </div>
    </div>
<?php
}
?>												</div>

												<div class="row">
														<div class="col-md-2" >
															<font color="red">*</font>
															<?php echo $this->Form->label('search_contact_status_id','Lead Type:'); ?>
															<?php echo $this->Form->input('search_contact_status_id[]', array(
																'name'=>'search_contact_status_id[]',
																'type' => 'select',
																'required' => 'required',
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


					</div>
				</div>
			</div>

            <div class="row">
                <div class="col-md-2 ">

                </div>

                <div class="col-md-10 text-right">

                    <button class="btn btn-success" id="btn-submit-wizard" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Save</button>

                </div>
            </div>
     		<div class="separator"></div>

</div>
<?php echo $this->Form->end(); ?>
		
     <!-- Post Purchase Rules Start here -->  
     <?php echo $this->Form->create('Autoresponder', array('validate'=>"0", 'type'=>'post','class' => 'form-inline apply-nolazy autoResponseFormCommon','id' => 'AutoResponderForm2', 'role'=>"form","onsubmit"=>"return ValidateAutoresponder(2);")); ?> 
		<div class="col-md-12">
			<h4>Variable Post Purchase, All Leads, Auto Responders</h4>
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
											$rule_category = array('Purchase'=>'Purchase',
												//'Anniversary'=>'Anniversary',
												'Warranty Reminder'=>'Warranty Reminder' ,'Welcome'=>'Welcome');
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
											//$Days = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10);
											//$Days = range(1,730);
                      $Days = range(1,1460);
											$Days = array_combine($Days,$Days);
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
                   								<?php
										if($i>1){
										?>
                                                                            <div class="col-md-1" style="display: inline; vertical-align: middle; padding-top: 25px;float: right" id="remove_other_rules_row"><a class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="removeOtherRulesRow(<?php echo $i;?>,'<?php echo $id;?>');"> X </a></div>

										<?php }else{
											if($id != '0'){
										 ?>

										 <div class="col-md-1" style="display: inline; vertical-align: middle; padding-top: 25px;float: right" ><a onclick="return confirm('Are you sure to delete this rule?')" class="btn btn-xs btn-danger no-ajaxify" href="/eblasts/delete_autoresponder_rules/<?php echo $id; ?>"> X </a></div>

										<?php } }?>
                                                                                 
 <div class="col-md-1" style="width:135px;float: right">
                            <div class="make-switch22" style="margin-top:25px" data-on="success" data-off="default">
                                <input class="active_other_rule" name="other_rule_activate_<?php echo $details['id']; ?>" id="other_rule_active_<?php echo $details['id']; ?>" type="checkbox"  <?php if (isset($details['active']) && $details['active'] == 1) echo 'checked="checked"'; else echo ''; ?>  value="<?php echo $details['id']; ?>"   />
                            </div>
                        </div>                                                                                 
                                                                                 
									</div>
								
							
                            <?php 
							$unit_style = '';
							//if($details['rule_type'] != 'Purchase' || $details['duration_category'] != 'Other')
							//$unit_style = 'display:none;';
							?>
									<div class="row container_unit_info" style=" <?php echo $unit_style;  ?>" id="container_unit_info_<?php echo $i; ?>">
<h3>Unit Info</h3></div>
<div class="row">	
	<div class="col-md-2">		
		<label>Filter:&nbsp</label>
		<select id="condition" class="form-control">
			<option value="" name="select">Select</option>
		  	<option value="Used" name="Used">Used</option>
		  	<option value="New" name="New">New</option>		  
		</select>			
	</div>
</div>	
<div class="row">
	<div class="col-md-2">
		<label>Type</label>
		<?php 	
			echo $this->Form->input('search_unit_category.', array('type' => 'select','name' => 'search_unit_category[]', 'options' => $d_type_options, 'empty' => 'Select', 'label'=>false,'div'=>false,'id' =>'search_unit_category_'.$i,'data-id' =>$i, 'class' => 'form-control search_unit_category_','style'=>'width: 100%','value' => $details['search_unit_category'])); ?>
	</div>

	<div class="col-md-2">
	<label>Make</label>
	<?php echo $this->Form->input('search_unit_make.', array('type' => 'select','name' => 'search_unit_make[]', 'required' => false,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control search_unit_make_','id' =>'search_unit_make_'.$i,'data-id' =>$i ,'style'=>'width: 100%','value' => $details['search_unit_make'],'options' => !empty($details['unit_make_options'])?$details['unit_make_options']:array()));  ?>
	</div>


	<div class="col-md-2">
	<label>Year</label>
	<?php 
	$year_all_options['0'] = 'Any Year';
	for($index = date('Y') + 1; $index >= 1980; $index--){
		$year_all_options[ $index ] = $index;
	}
	echo $this->Form->input('search_unit_year.', array('type' => 'select','name' => 'search_unit_year[]','options' => $year_all_options, 'required' => false,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control search_unit_year_','id' =>'search_unit_year_'.$i,'data-id' =>$i,'style'=>'width: 100%','value' => $details['search_unit_year']));  ?>
	</div>

	<div class="col-md-2">
	<label>Model</label>
	<?php echo $this->Form->input('search_unit_model_id.', array('type' => 'select','name' => 'search_unit_model_id[]', 'required' => false,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control search_unit_model_id_','id' =>'search_unit_model_id_'.$i,'data-id' =>$i,'style'=>'width: 100%','value' => $details['search_unit_model_id'],'options' => !empty($details['unit_model_options'])?$details['unit_model_options']:array()));
	echo $this->Form->hidden('search_unit_model.',array('class' => 'search_unit_model_','id' =>'search_unit_model_'.$i,'data-id' =>$i,'value' =>$details['search_unit_model'],'name' => 'search_unit_model[]' ))  

	?>
	</div>
	<div class="col-md-2">
	<label>Category</label>
	<?php echo $this->Form->input('search_unit_type.', array('type' => 'select','name' => 'search_unit_type[]', 'required' => false,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control search_unit_type_','id' =>'search_unit_type_'.$i,'data-id' =>$i,'style'=>'width: 100%','value' => $details['search_unit_type'],'options' => !empty($details['unit_type_options'])?$details['unit_type_options']:array()));  ?>
	</div>

	<div class="col-md-2">
	<label>Class</label>
	<?php echo $this->Form->input('search_unit_class.', array('type' => 'select','name' => 'search_unit_class[]', 'required' => false,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control search_unit_class_','id' =>'search_unit_class_'.$i,'data-id' =>$i,'style'=>'width: 100%','value' => $details['search_unit_class'],'options' => !empty($details['unit_class_options'])?$details['unit_class_options']:array()));  ?>
	</div>
</div>
<div class="row">
<div class="col-md-12">
	<div class="separator"></div>
	<div class="separator"></div>
	<hr/>
</div>
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
					  <a href="<?php echo $this->Html->url(array('action'=>'index')); ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Cancel</a>
					  <button type="submit" class="btn btn-success hide"><i class="fa fa-save"></i> Add Contact</button>
					</div>

					<div class="col-md-10">
						<button class="btn btn-success pull-right" id="btn-submit-wizard2" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Save</button>
					</div>

				</div>
		</div>
        <?php echo $this->Form->end(); ?>
	</div>
	<!-- // row END -->






	<?php

//	debug( $this->request->data );

	//echo $this->element('sql_dump');



	?>

</div>





<script>
function ValidateAutoresponder(form_id){
	/* Remove all errorClass */
	$(".errorClass").each(function () {
		$(this).removeClass("errorClass");
	});
	var k=1;
	var errorMsg = '';

	jQuery('#AutoResponderForm'+form_id+' select[name="search_contact_status_id[]"]').each(function () {

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
	jQuery('#AutoResponderForm'+form_id+' select[id="AutoresponderRuleType[]"]').each(function () {
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




function ShowTemplateAutoWebLead(data_id){

	var sel_template_id = $("#WebAutoresponder"+data_id+"AutoWebleadTemplate").val();
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
			$(obj).parent().parent().parent().find('.container_unit_info').show();
		
		}
		
	}else{
		$(obj).parent().parent().find('.DurationFields').hide();
		$(obj).parent().parent().find('.OtherFields').hide();
		$(obj).parent().parent().parent().find('.container_unit_info').hide();
	}

}

function ShowOtherField(obj){
	var duration_category = $(obj).parent().parent().find('select[name="duration_category[]"]').val();

  if(duration_category=='Other'){
			$(obj).parent().parent().find('.OtherFields').show();;
			$(obj).parent().parent().parent().find('.container_unit_info').show();
		}else{
			$(obj).parent().parent().find('.OtherFields').hide();
			$(obj).parent().parent().parent().find('.container_unit_info').hide();
		}
}

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


	if (typeof $.fn.bootstrapSwitch != 'undefined' && $('.make-switch22').length)
		$('.make-switch22:not(.has-switch)').bootstrapSwitch();



	$("#save_autoresponder_rule").on('click',function(e){
		
		e.preventDefault();
		
		
		$("#save_autoresponder_rule").attr("disabled", true);

		$.ajax({
			type: "post",
			cache: false,
			data: $("#WebAutoresponderRuleForm").serialize(),
			url:  "/eblasts/activate_auto_weblead/",
			success: function(data){
				location.href = "/eblasts/setup_autoresponder";
			}
		});

	});


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



	$('#AutoResponderForm1 select[name="search_lead_status[]"]').change(function () {
		var sales_step = $(this).parent().parent().find('select[name="search_sales_step[]"]').val();
		if($(this).val() == 'Open' && sales_step == '10'){
			alert("OPEN and SOLD selected will get Zero results . Solds are CLOSED. Please Tray again");
		}
	});

	$('#AutoResponderForm1 select[name="search_sales_step[]"]').change(function () {
		var lead_status = $(this).parent().parent().find('select[name="search_lead_status[]"]').val();
		if($(this).val() == '10' && lead_status == 'Open'){
			alert("OPEN and SOLD selected will get Zero results . Solds are CLOSED. Please Tray again");
		}
	});

	$('.start-time-input').timepicker({defaultTime: '12:00 AM'});
	$('.end-time-input').timepicker({defaultTime: '11:59 PM'});


	//Create schedule
	$(".add_auto_schedule").click(function(){
		data_id = $(this).attr('data-id');
		
		if( $('#WebAutoresponder'+data_id+'AutoWebleadWeekdays').val() == ''){
			$('#WebAutoresponder'+data_id+'AutoWebleadWeekdays').focus();
			alert('Please select day');
			return true;
		}

		if( $('#WebAutoresponder'+data_id+'AutoWebleadWeekdaysEnd').val() != '' && $('#WebAutoresponder'+data_id+'AutoWebleadWeekdaysStart').val() == '' ){
			$('#WebAutoresponder'+data_id+'AutoWebleadWeekdaysStart').focus();
			alert('Please set start time');
			return true;
		}
		$web_rule_id = $('#WebAutoresponder'+data_id+'AutoWebleadId').val();
		console.log('web rule id '+ $web_rule_id);
		if($web_rule_id != ''){
			$.ajax({
				type: "post",
				cache: false,
				data: {'week_day': $('#WebAutoresponder'+data_id+'AutoWebleadWeekdays').val()  ,'start_time': $('#WebAutoresponder'+data_id+'AutoWebleadWeekdaysStart').val(), 'end_time':$('#WebAutoresponder'+data_id+'AutoWebleadWeekdaysEnd').val()},
				url:  "/eblasts/save_auto_weblead_scuedule/"+$web_rule_id,
				success: function(data){
					$("#list_auto_schedule_"+data_id).html(data);
				}
			});
		}

	});



	$(document).on("click",".remove_auto_weblead_schedule",function() {
        var autoweblead_schedule_id = $(this).attr('autoweblead_schedule_id');
        var autoweblead_autoresponderrule_id = $(this).attr('autoweblead_autoresponderrule_id');

		$.ajax({
			type: "post",
			cache: false,
			data: {'autoweblead_schedule_id': autoweblead_schedule_id  ,'autoweblead_autoresponderrule_id': autoweblead_autoresponderrule_id},
			url:  "/eblasts/delete_auto_weblead_scuedule/",
			success: function(data){
				$("#list_auto_schedule").html(data);
			}
		});

    });


		
	


// Remove Temparary Auto weblead rules

$('body').on('click','.temp-web-rule-remove',function(e){
		e.preventDefault();
		$(this).parent().remove();
	
	});





$.autoresponder_inventory({
	
		no_sold: "yes",
		input_type: "search_unit_category_",
		input_make: "search_unit_make_",
		input_year: "search_unit_year_",
		input_model_id: "search_unit_model_id_",
		input_model: "search_unit_model_",
		input_category: "search_unit_type_",
		input_class: "search_unit_class_",	
	
	});	


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

// $(".search_contact_status_id").each(function() {
//    GetStepNStatus($(this));
// });

$(document).ready(function($) {
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
$(window).load(function(){ 
<?php  } ?>
	$("#condition").change(function() {
	    var conditionVal = $(this).val();	        
	    var url = "<?php echo $this->Html->url(array('controller'=>'dealer_settings','action'=>'d_condition_options'));?>/conditionVal:"+conditionVal;
	    
	    $('#condition').prop('disabled', true);
	    $('#search_unit_category_1').prop('disabled', true);
	    $.ajax({
	    	type: "POST",
			cache: false,
	        url: url,	           
	        success: function(data){
	        	//console.log(data);
	        	var resJSON = JSON.parse(data);            	
	            var strHtml="<select name='search_unit_category[]' id='search_unit_category_1' data-id='1' class='form-control search_unit_category_' style='width: 100%'><option value=''>Select</option>";
	            for(var i=0;i<Object.keys(resJSON).length;i++){
	            	strHtml = strHtml+"<option value='"+resJSON[i]['settings_dtypes'].dtype+"'>"+resJSON[i]['settings_dtypes'].dtype+"</option>";	                	
	            }
	            strHtml=strHtml+"</select>";                  	                              
	            $('#search_unit_category_1').html("<select name='search_unit_category[]'' id='search_unit_category_1' data-id='1' class='form-control search_unit_category_' style='width: 100%''><option value=''>Loading----</option></select>");        
				$("#search_unit_category_1").html(strHtml);	                
	        }	            
	    })
		$('#search_unit_category_1').prop('disabled',false);
	    $('#condition').prop('disabled',false);
	});

 <?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
});
<?php  } ?>
});
</script>