<!-- Widget -->
<?php
//debug($this->request->query['returl']);
//debug( html_entity_decode($this->request->query['returl']) );

?>

<div class="widget widget-heading-simple widget-body-white" >

	<?php echo $this->Session->flash('flash');
	if(!empty($display_errors)){
	?>
	<div class="text-center">
	<?php
		echo '<div class="text-warning">Please Fix following error(s)</div>';
		foreach($display_errors as $display_error){
			echo '<div class="text-danger" >'.$display_error.'</div>';
		} ?>
	</div>
	<?php } ?>



<?php echo $this->Form->create('User', array('type'=>'post', 'autocomplete'=>"off", 'class' => 'form-inline apply-nolazy')); ?>
	<div class="widget-body">
		<div class="innerB">
			<div class="row">
				<div class="col-xs-3">
					<?php echo $this->Form->label('first_name','First Name:'); ?>
					<?php echo $this->Form->input('first_name', array( 'required' => 'required', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-3">
					<?php echo $this->Form->label('last_name','Last Name:'); ?>
					<?php echo $this->Form->input('last_name', array( 'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-3">
					<?php echo $this->Form->label('username','Username:'); ?>
					<?php echo $this->Form->input('username', array( 'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-3">
					<?php echo $this->Form->label('email','Email:'); ?>
					<?php echo $this->Form->input('email', array(  'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3">
					<?php echo $this->Form->label('password','Password:'); ?>
					<?php echo $this->Form->input('password', array('required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-3">
					<?php echo $this->Form->label('quick_code','Quick code:'); ?>
					<?php echo $this->Form->input('quick_code', array( 'required' => 'required', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-3">
					<?php echo $this->Form->label('group_id','Staff Type:'); ?>
					<?php echo $this->Form->input('group_id', array('type' => 'select', 'options'=>$groups, 'empty' => 'Group', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>

				<div class="col-xs-3">
					<br />
					<?php echo $this->Form->label('active','Active:'); ?>
					<?php echo $this->Form->input('active',array('class' => 'input-mini')); ?>
					<div class="separator"></div>
				</div>


			</div>

			<div class="row">

				<div class="col-xs-6">
					<br />
					<?php echo $this->Form->label('login_business_hours','Login only Business hours:'); ?>
					<?php echo $this->Form->input('login_business_hours',array('class' => 'input-mini')); ?>
					<div class="separator"></div>
				</div>

			</div>


		</div>

		<hr />
		<div class="separator"></div>

		<div class="innerB">
			<div class="row">

				<div class="col-xs-3">
					<?php echo $this->Form->label('d_type','Dealer Type:'); ?>
					<?php echo $this->Form->input('d_type', array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>

				<div class="col-xs-3">
					<?php echo $this->Form->label('dealer_id','Dealer ID:'); ?>
					<?php echo $this->Form->input('dealer_id', array('type' => 'select', 'options'=>$opt_dealer, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-3">
					<?php echo $this->Form->label('dealer_type','Dealership Type:'); ?>
					<?php echo $this->Form->input('dealer_type', array('type' => 'select',
						'options' => array(
                    'HD' => 'H-D Dealer',
                    'Metric' => 'Metric Dealer',
                    'RV' => 'RV',
                    'Marine' => 'Marine',
                    'Auto' => 'Auto',
                    'AG' => 'AG',
                    'Wheel/Tire' => 'Wheel/Tire'),
                     'empty' => 'Select',  'required'=>'required','class' => 'form-control','style'=>'width: 100%')); ?>

					<div class="separator"></div>
				</div>
				<div class="col-xs-3">
					<?php echo $this->Form->label('zone','Zone:'); ?>
					<?php echo $this->Form->input('zone', array('type' => 'select', 'options' => $this->App->getTimezoneList(), 'empty' => 'Select', 'required'=>'required','class'=>'form-control','style'=>'width: 100%'));
					?>
					<div class="separator"></div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-4">
					<?php echo $this->Form->label('step_procces','Step Process:'); ?>
					<?php echo $this->Form->input('step_procces', array('type' => 'select', 'options' => array(
					'lemco_steps' => 'Lemco 1-9',
					'hd_steps' => 'H-D Steps 1-7'
					), 'empty' => 'Select','required'=>'required','class' => 'form-control')); ?>

					<div class="separator"></div>
				</div>
				<div class="col-xs-4">
					<?php echo $this->Form->label('d_address','Dealer Address:'); ?>
					<?php echo $this->Form->input('d_address', array( 'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-4">
					<?php echo $this->Form->label('d_city','Dealer City:'); ?>
					<?php echo $this->Form->input('d_city', array( 'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<?php echo $this->Form->label('d_state','Dealer State:'); ?>
				    <?php	echo $this->Form->input('d_state', array('type' => 'select',
					'options' => array(
                                                'United States' => array(
                                                    'AL' => 'AL',
                                                    'AK' => 'AK',
                                                    'AZ' => 'AZ',
                                                    'AR' => 'AR',
                                                    'CA' => 'CA',
                                                    'CO' => 'CO',
                                                    'CT' => 'CT',
                                                    'DE' => 'DE',
                                                    'FL' => 'FL',
                                                    'GA' => 'GA',
                                                    'HI' => 'HI',
                                                    'ID' => 'ID',
                                                    'IL' => 'IL',
                                                    'IN' => 'IN',
                                                    'IA' => 'IA',
                                                    'KS' => 'KS',
                                                    'KY' => 'KY',
                                                    'LA' => 'LA',
                                                    'ME' => 'ME',
                                                    'MD' => 'MD',
                                                    'MA' => 'MA',
                                                    'MI' => 'MI',
                                                    'MN' => 'MN',
                                                    'MS' => 'MS',
                                                    'MO' => 'MO',
                                                    'MT' => 'MT',
                                                    'NE' => 'NE',
                                                    'NV' => 'NV',
                                                    'NH' => 'NH',
                                                    'NJ' => 'NJ',
                                                    'NM' => 'NM',
                                                    'NY' => 'NY',
                                                    'NC' => 'NC',
                                                    'ND' => 'ND',
                                                    'OH' => 'OH',
                                                    'OK' => 'OK',
                                                    'OR' => 'OR',
                                                    'PA' => 'PA',
                                                    'RI' => 'RI',
                                                    'SC' => 'SC',
                                                    'SD' => 'SD',
                                                    'TN' => 'TN',
                                                    'TX' => 'TX',
                                                    'UT' => 'UT',
                                                    'VT' => 'VT',
                                                    'VA' => 'VA',
                                                    'WA' => 'WA',
                                                    'WV' => 'WV',
                                                    'WI' => 'WI',
                                                    'WY' => 'WY',
                                                    'AS' => 'AS',
                                                    'DC' => 'DC',
                                                    'PR' => 'PR',
                                                    'VI' => 'VI'
                                                ),
                                                'Canada' => array(
                                                    'ON'=>'ON',
                                                    'QC'=>'QC',
                                                    'NS'=>'NS',
                                                    'NB'=>'NB',
                                                    'MB'=>'MB',
                                                    'BC'=>'BC',
                                                    'PE'=>'PE',
                                                    'SK'=>'SK',
                                                    'AB'=>'AB',
                                                    'NL'=>'NL',
                                                )
                                            ), 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));
					?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-4">
					<?php echo $this->Form->label('d_zip','Dealer Zip:'); ?>
					<?php echo $this->Form->input('d_zip', array( 'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-4">
					<?php echo $this->Form->label('d_phone','Dealer Phone:'); ?>
					<?php echo $this->Form->input('d_phone', array( 'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<?php echo $this->Form->label('d_fax','Dealer Fax:'); ?>
					<?php echo $this->Form->input('d_fax', array( 'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-4">
					<?php echo $this->Form->label('d_website','Dealer Website:'); ?>
					<?php echo $this->Form->input('d_website', array( 'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-4">
					<?php echo $this->Form->label('d_web_provider','Website Provider:', array('class'=>'strong')); ?>
					<?php
					echo $this->Form->input('d_web_provider', array(
					'options'=>array(
						'Dealer Spike' => 'Dealer Spike',
						'PSN' => 'PSN',
						'50 Below' => '50 Below',
						'ADP' => 'ADP',
						'Cobalt' => 'Cobalt',
						'ARI' => 'ARI',
						'Dealer Socket' => 'Dealer Socket'
					),
					'empty' => 'Select',
					'label'=>false,
					'div'=>false,
					'required' => 'required',
					'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>

			</div>

			<div class="row">
				<div class="col-xs-4">
					<?php echo $this->Form->label('d_email','Dealer Email:', array('class'=>'strong')); ?>
				      <?php echo $this->Form->input('d_email',array('type'=>'email','required'=>'required','class' => 'form-control')); ?>
					<div class="separator"></div>
				</div>

				<div class="col-xs-4">
					<?php echo $this->Form->label('dealer','Dealer:', array('class'=>'strong')); ?>
				      <?php echo $this->Form->input('dealer',array('type'=>'text','required'=>'required','class' => 'form-control')); ?>
					<div class="separator"></div>
				</div>

				<div class="col-md-4">
                    <?php echo $this->Form->label('locale', '<i style="color:red;">*</i> Dealer Locale:', array('class' => 'strong')); ?>
                    <?php echo $this->Form->input('locale', array('type' => 'select', 'class' => 'form-control','options' => $this->App->getLocaleList(), 'style' => 'width: 100%')); ?>
                    <div class="separator"></div>
                </div>

			</div>

			<div class="row">
				<div class="col-xs-6">
					<br />
					<?php echo $this->Form->label('active_report','Group Active - Report:'); ?>
					<?php echo $this->Form->input('active_report',array('class' => 'input-mini')); ?>
					<div class="separator"></div>
				</div>
			</div>


		</div>


		<div class="row">
				<div class="col-xs-12">
					<?php echo $this->Form->label('other_locations','Crmgroup Access:', array('class'=>'text-warning')); ?>
					<?php
					$other_locations_values = array();
					if($this->request->data['User']['other_locations'] != ''){
						$other_locations_values = explode(",", $this->request->data['User']['other_locations']);
					}
					echo $this->Form->input('other_locations', array('empty'=>false,  'value' => $other_locations_values, 'options' => $opt_dealer_crmgroup, 'multiple'=>true, 'label' => false, 'div' => false,'style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
		</div>


		<div class="innerB">
			<div class="row">
				<div class="col-md-12 text-right">
					<div class="separator"></div>
					<button type="button" id="btn_save_make" class="btn btn-success" >Save</button>&nbsp;
					<button type="button" id="close_modal_dialog" class="btn btn-danger" >Cancel</button>
				</div>
			</div>

		</div>

	</div>

<?php $this->Form->end(); ?>
</div>
<!-- // Widget END -->
<?php
//debug($body_type);
//debug($trim);
//echo $this->element("sql_dump");
 ?>
 <script>
$(function(){

	if (typeof $.fn.select2 != 'undefined'){
		$("#UserOtherLocations").select2({
		    placeholder: "Select Locations",
		    allowClear: true
		});
	}



	$("#btn_save_make").click(function(event){
		event.preventDefault();
		if( $("#MakeShortName").val() == ''){
			$("#MakeShortName").focus();
			alert('Please enter short name');
			return false;
		}
		if( $("#MakePrettyMame").val() == ''){
			$("#MakePrettyMame").focus();
			alert('Please enter pretty name');
			return false;
		}

		$.ajax({
			type: "POST",
			url:  $(this).closest('form').attr('action'),
			data: $(this).closest('form').serialize(),
			success: function(data){
				$(".bootbox-body").html(data);
			}
		});


	});

	$("#close_modal_dialog").click(function(event){
		event.preventDefault();
		bootbox.hideAll();
	});

	<?php
	 if(isset($save_sucees)){ ?>


		$.ajax({
			type: "GET",
			cache: false,
			url:  "/users/search_user?first_name=&last_name=&group=&dealer_id=<?php echo $this->request->query['dealer_id']; ?>&_=1403699290831",
			success: function(data){
				$("#trim_search_result").html(data);

				$.ajax({
					type: "GET",
					cache: false,
					url:  "/users/add_user/?dealer_id=<?php echo $this->request->query['dealer_id']; ?>",
					success: function(data){
						$(".bootbox-body").html(data);
					}
				});


			}
		});






	<?php } ?>



});

</script>
