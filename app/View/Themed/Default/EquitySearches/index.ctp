<?php
$input_id =  CakeText::uuid();
//debug($dealer_spike_round_loc_cond_rules);
?>
<link rel="stylesheet" href="/app/View/Themed/Default/webroot/assets/components/common/forms/elements/select2/assets/lib/css/select2.css" />

<div class="widget widget-body-white">
		<div class="widget-body">

			<div class="row">

				<div class="col-md-7">

					<h4>Create New Search</h4>
					<?php echo $this->Form->create('EquitySearch', array('type'=>'GET','url' => array('controller' => 'equity_searches', 'action' => 'save_search'),'class' => 'form-inline no-ajaxify', 'id' => 'EquitySearchIndexForm' )); ?>

					<input type='hidden' name='s_d_range' value='<?php echo date("Y-m-d",strtotime("-1 month")); ?>' id = 's_d_range'>
					<input type='hidden' name='e_d_range' value='<?php echo date("Y-m-d",strtotime("now")); ?>' id = 'e_d_range'>
					<div class="row">
						<div class="col-md-3">
							<?php  echo $this->Form->label('search_lead_type', 'Lead Type: &nbsp;');
							echo $this->Form->input('search_lead_type', array(
							'div' => false,
							'options' => array('All' => 'All', 'Open'=>'Open', 'Closed'=>'Closed','Sold'=>'Sold'),
							'class' => 'form-control',
							'label' => false,
							'style' => 'width: 100%'), array('div' => false));
							?>
						</div>

						<div class="col-md-3">
							<?php
							echo $this->Form->label('search_status_header','Status Header: &nbsp;');
							echo $this->Form->select('search_status_header', $lead_status_headers, array(
								'empty' => 'Select',
								'value'=>$search_status_header,
								'label'=>false, 'class' => 'form-control','style'=>'width:175px'));
							?>
						</div>


						<div class="col-md-3">
						<?php
						echo $this->Form->label('search_status','Status: &nbsp;');
						echo $this->Form->select('search_status',  null , array(
							'name'=>'search_status',
							'empty' => 'Select',
							'label'=>false,'div'=>false,
							'class' => 'form-control',
							'style' => 'width:90%'
						));
						?>

					</div>
					<div class="col-md-3">
					<?php echo $this->Form->label('search_sales_step','Step:', array('class'=>'strong')); ?>
					<?php
						echo $this->Form->input('search_sales_step',array(
						'type'=>'select',
						'options'=> $SalesStep,
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'empty'=>'Select',
						'style' => 'width:90%'
						));
					?>
                </div>
				</div>

				<div class="separator"></div>

		<div class="row">
        	<div class="col-md-3">
                    <?php
					$est_payment_options = array();
					for($i=0; $i<=19; $i++){
						$st = $i*100;
						$lt = $st+100;
						$est_payment_options[ "$".$st."-"."$".$lt ] = "$".$st."-"."$".$lt;
					}

					echo $this->Form->label('search_est_payment_search','Payment:  &nbsp;');
					echo $this->Form->input('search_est_payment_search',array('options'=>$est_payment_options,
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'empty'=>'Select',
						'style' => 'width:90%'
						));
					?>

	      	</div>
	      	<div class="col-md-3">

                    <?php echo $this->Form->label('search_source','Source:', array('class'=>'strong')); ?>
					<?php
						echo $this->Form->input('search_source',array(
						'type'=>'select',
						'options'=> $lead_sources_options,
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'empty'=>'Select',
						'style' => 'width:90%'
						));
					?>
        	</div>
			<div class="col-md-3">
				<?php
					echo $this->Form->label('search_zip', 'Zip: &nbsp;');
					echo $this->Form->input('search_zip', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'style' => 'width: 100%'), array('div' => false)
					);
				?>
			</div>
			<div class="col-md-3">
				<?php
					echo $this->Form->label('search_state', 'State/Province: &nbsp;');
					echo $this->Form->input('search_state', array(
						'type' => 'select',
						'options' => $this->App->getStateList(),
						'empty' => 'Select',
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'style' => 'width: 100%'), array('div' => false)
					);
				?>
			</div>

		</div>
			<div class="separator"></div>
				<div class="row">
				<div class="col-md-4">
					<?php echo $this->Form->label('search_type','Category:', array('class'=>'strong')); ?>
					<?php echo $this->Form->select('search_type',$body_type,
				  array('multiple' => true, 'style'=>'width: 100%', "id"=>$input_id."_round_robin_filter_group_category", 'class' => 'input-small round_robin_filter_input_category','empty'=>"Select", 'rel'=>"Category")); ?>
				</div>
		        <div class="col-md-4">
		          <?php echo $this->Form->label('search_class','Class:', array('class'=>'strong')); ?>
					<?php
						echo $this->Form->input('search_class',array(
						'type'=>'select',
						'options'=> $all_class_array,
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'empty'=>'Select',
						'style' => 'width:95%'
						));
					?>
				</div>
				<div class="col-md-4">
				<?php echo $this->Form->label('search_condition','Condition:', array('class'=>'strong')); ?>
				<?php
					echo $this->Form->input('search_condition',array(
					'type'=>'select',
					'options'=> array(
						'New' => 'New',
						'Used' => 'Used',
						'All' => 'All'
					),
					'div' => false,
					'class' => 'form-control',
					'label' => false,
					'empty'=>'Select',
					'style' => 'width:95%'
					));
				?>
	      </div>

			</div>

<div class="separator"></div>

			<div class="row">
					<!--	<div class="col-md-4">
							<?php
								echo $this->Form->label('search_make', 'Make: &nbsp;');
								echo $this->Form->input('search_make', array(
									'type' => 'select',
									'empty' => 'select',
									'options'=> $makeOptions,
									'div' => false,
									'class' => 'form-control',
									'label' => false,
									'style' => 'width: 95%'), array('div' => false)
								);
							?>
						</div> -->

				<div class="col-md-4">
					<?php
					  echo $this->Form->label('search_make','Make:', array('class'=>'strong'));
						echo $this->Form->input('search_make', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'style' => 'width: 100%'), array('div' => false)
						);
					?>
				</div>

				<div class="col-md-4">
					<?php
						echo $this->Form->label('search_model', 'Model: &nbsp;');
						echo $this->Form->input('search_model', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'style' => 'width: 95%'), array('div' => false)
						);
					?>
				</div>


				<div class="col-md-4">
					<?php
					echo $this->Form->input('search_pushed', array(
					'type' => 'checkbox',
					'div' => false,
					'hiddenField' => false,
					'label' => "&nbsp; Pushed",
					'style' => 'width: auto'), array('div' => false));
					?>
				</div>
				<div class="col-md-4">
					<?php
					  echo $this->Form->label('search_vin','Stock Number/Vin:', array('class'=>'strong'));
						echo $this->Form->input('search_vin', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'style' => 'width: 100%'), array('div' => false)
						);
					?>
				</div>
			</div>

<div class="separator"></div>

			<div class="row">
						<div class="col-md-6">
							<?php
								echo $this->Form->label('search_comment', 'Comment: &nbsp;');
								echo $this->Form->input('search_comment', array(
									'div' => false,
									'class' => 'form-control',
									'label' => false,
									'style' => 'width: 100%'), array('div' => false)
								);
							?>
						</div>

						<div class="col-md-6">
							<?php echo $this->Form->label('range','Period:', array('class'=>'strong','style'=>'width:100%')); ?>
							<div id="reportrange"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;display:inline">
								<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
								<span>
									<?php echo date("F j, Y",strtotime("-1 month")); ?> - <?php echo date("F j, Y",strtotime("now")); ?>
									<b class="caret"></b>
								</span>
							</div>
						</div>
					</div>

					<div class="separator"></div>

					<div class="row">
						<div class="col-md-4">
							<?php
							if($show_user == 'On' || in_array(AuthComponent::user('group_id'),array(2,6,9))){

							 echo $this->Form->label('search_user_id','Sales Person:', array('class'=>'strong'));
								echo $this->Form->input('search_user_id',array(
								'type'=>'select',
								'options'=> $spersons,
								'div' => false,
								'style' => 'width: 100%',
								'class' => 'form-control',
								'label' => false,
								'empty'=>'All',
								));
							}
							?>
						</div>
						<div class="col-md-4">

							<?php  echo $this->Form->label('search_company_work', 'Company: &nbsp;');
							echo $this->Form->input('search_company_work', array(
							'div' => false,
							'class' => 'form-control',
							'style' => 'width: 100%',
							'label' => false
							), array('div' => false));
							?>

						</div>

						<div class="col-md-4">

							<?php  echo $this->Form->label('search_company_account_id', 'Company Account: &nbsp;');
							echo $this->Form->input('search_company_account_id', array(
							'div' => false,
							'type' => 'text',
							'class' => 'form-control',
							'style' => 'width: 100%',
							'label' => false,
							'style' => 'width: 100%'), array('div' => false));
							?>

						</div>

					</div>
					<div class="separator"></div>
					<div class="row">
						<div class="col-md-4">
							<?php  echo $this->Form->label('search_full_name', 'Contact Name: &nbsp;');
							echo $this->Form->input('search_full_name', array(
							'div' => false,
							'type' => 'text',
							'class' => 'form-control',
							'style' => 'width: 100%',
							'label' => false,
							'style' => 'width: 100%'), array('div' => false));
							?>
						</div>

            <div class="col-md-4">
            <?php
            echo $this->Form->input('validate_method_of_payment', array('id'=>'validate_method_of_payment','type' => 'hidden','value' => $validate_method_of_payment));
            $method_of_payment_options = array(
              'Cash' => 'Cash',
              'Cheque' => 'Cheque',
              'Credit' => 'Credit',
              'Credit Union' => 'Credit Union',
              'Debit' => 'Debit',
              'Credit App Received' => 'Credit App Received',
              'Financing' => 'Financing',
              'Other' => 'Other'
            );
            echo $this->Form->label('method_of_payment','Method Of Payment:');
            echo $this->Form->input('method_of_payment',array('options'=>$method_of_payment_options,
              'class'=>'form-control',
              'style'=>'width: 100%',
              'empty'=>'Select',
              ));
            ?>
          </div>

						<div class="col-md-4">
							<?php echo $this->Form->label('sor_order','<i class="fa fa-sort"></i> Sort Last Name:', array('class'=>'strong','style'=>'width:100%')); ?>
							<select id="sort_last_name" class="selectpicker col-md-6"  data-style="btn-default">
								<option>Select</option>
								<option>A-Z</option>
								<option>Z-A</option>
							</select>
                           <!-- <a href="javascript:void(0)" class="btn btn-inverse pull-right" id="print-equity-result"><i class="fa fa-print"></i> Print</a> -->
					</div>


					</div>

					<div class="separator"></div>
					<hr>
					<div class="separator"></div>

					<div class="row">
						<div class="col-md-2">
							<button type="button" id="btn_do_equity_search" class="btn btn-primary btn-sm">Search</button> &nbsp;
						</div>
						<div class="col-md-2">
							<button type="button" id="btn_reset_equity_search" class="btn btn-warning btn-sm">Reset</button> &nbsp;
            </div>
						<div class="col-md-8">&nbsp;</div>
					</div>

					<div class="separator"></div>
					<hr>
					<div class="separator"></div>

					<div class="row well">
						<div class="col-md-6">
						<?php  echo $this->Form->label('search_name', 'Name of Search: &nbsp;');
						echo $this->Form->input('search_name', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'style' => 'width: 100%'), array('div' => false));

						echo $this->Form->hidden('bdc_search');
						?> &nbsp; &nbsp;
					</div>
            <div class="col-md-3">
                            <button type="button" id="btn_save_equity_search" data-bdc="1" class="btn btn-primary btn-sm">Save Search</button>
                            <?php
							$access_group_ids = array_merge($this->App->mgr_group_ids(),$this->App->bdc_staff_group_ids());
							if(in_array(AuthComponent::user('group_id'),$access_group_ids)){
							?>
						</div>
						<div class="col-md3">
								<button type="button" id="btn_save_bdc_search" data-bdc="1" class="btn btn-success btn-sm">Save as BDC Search</button>
                            <?php } ?>
            </div>

					</div>

<div class="row">

</div>



					<?php echo $this->Form->end(); ?>


				</div>

				<div class="col-md-5">
					<h4>Saved Search</h4>
					<div id="saved_search" class="innerAll" style="max-height: 241px; overflow: auto; border: 1px solid #e2e1e1;">
						<?php foreach ($equitySearches as $equitySearch) { ?>

						<span style="margin-top: 5px; font-size: 90%"
						data-searchid="<?php echo $equitySearch['EquitySearch']['id']; ?>" class="label label-primary label-stroke">
							<a  onclick="do_equity_search('<?php echo $equitySearch['EquitySearch']['id']; ?>', event)" class="equity_searches no-ajaxify" href="#" >
								<u><?php echo $equitySearch['EquitySearch']['search_name']; ?> <?php echo $equitySearch['User']['full_name']; ?> (
								<?php echo date("m/d/Y",strtotime($equitySearch['EquitySearch']['date_start'])); ?> -
								<?php echo date("m/d/Y",strtotime($equitySearch['EquitySearch']['date_end'])); ?> </u>
							)
							</a>
							&nbsp; &nbsp;
							<a class="remove_equity_searches" href="#" onclick="remove_equity_search('<?php echo $equitySearch['EquitySearch']['id']; ?>')"
							 class="btn btn-xs btn-danger">X</a>
						</span>

						<?php } ?>

					</div>
				</div>

			    <div class="col-md-2" style="margin-top: 45px;">
					<?php
						echo $this->Form->label('search_county', 'County: &nbsp;');
						echo $this->Form->input('search_county', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'style' => 'width: 100%'), array('div' => false)
						);
					?>
				</div>
		</div>
	</div>
<div class="widget widget-body-white">
	<div class="widget-body">
		<div id="equity_search_result">
		</div>
	</div>
</div>

<script>
	var search_url = "";
	var search_data = {};

    function remove_equity_search(search_id){
    	if(confirm("You can only remove searches that you created. Do you want to remove the search?")){
        	$.ajax({
				url: "/equity_searches/remove_search/"+search_id,
				type: "get",
				cache: false,
				success: function(results){
					$("#saved_search").html(results);
				}
			});
        }
        return false;
    }

    function do_equity_search(search_id, event) {
		sessionStorage.setItem('current_equity_search',search_id);
    	if(typeof(event) !== "undefined") event.preventDefault();

    	search_url = "/equity_searches/do_equity_search/"+search_id;
		search_data = {};

		$("#sort_last_name").val('');
		$("#sort_last_name").selectpicker('refresh');

		$.ajax({
			url: "/equity_searches/do_equity_search/"+search_id,
			type: "get",
			cache: false,
			success: function(results){
				$("#equity_search_result").html(results);

			},
			error: function(results){

			}
		});

		return false;
    }

	function equity_lead_search_refresh_list() {
		var data = sessionStorage.getItem('current_equity_search');
		if(typeof(data !== "undefinded")) {
			if(data !== "") do_equity_search(data);
		}
	}

    $(document).ready(function(){

    });

$script.ready('bundle', function() {


		$('#sort_last_name').selectpicker();
		$("#sort_last_name").change(function(){

			if(search_url != '') {

				if( $(this).val() == 'A-Z' ){
					var req_url = search_url + "/sort:Contact.last_name/direction:asc/";
				}
				if( $(this).val() == 'Z-A' ){
					var req_url = search_url + "/sort:Contact.last_name/direction:desc/";
				}

				$.ajax({
					url: req_url,
					type: "get",
					data: search_data,
					cache: false,
					success: function(results){
						$("#equity_search_result").html(results);
					}
				});
			}
		});

		$("#btn_reset_equity_search").click(function(){

	  		$("#EquitySearchSearchLeadType").val("Open");
			$("#EquitySearchSearchStatusHeader").val("");
			$("#EquitySearchSearchSalesStep").val("");

			$("#EquitySearchSearchSalesStep").val("");
			$("#EquitySearchSearchEstPaymentSearch").val("");
			$("#EquitySearchSearchSource").val("");
			$("#EquitySearchSearchType").val("");
			$("#EquitySearchSearchClass").val("");
			$("#EquitySearchSearchModel").val("");
			$("#EquitySearchSearchStatus").val("");
			$("#EquitySearchSearchPushed").attr("checked" , false);
			/* add by SB */
			$("#EquitySearchSearchVin").val("");
			/* add by SB */
			$("#EquitySearchSearchMake").val("");
			$("#EquitySearchSearchComment").val("");

			$("#EquitySearchSearchZip").val("");
			$("#EquitySearchSearchCounty").val("");
			$('#reportrange span').html( "<?php echo date("F j, Y", strtotime("-1 month")) . " - " . date("F j, Y", strtotime("now")); ?>" );

			$('#reportrange').data('daterangepicker').setStartDate('<?php echo date("m/d/Y", strtotime("-1 month")); ?>');
			$('#reportrange').data('daterangepicker').setEndDate('<?php echo date("m/d/Y", strtotime("now")); ?>');

			$("#s_d_range").val( "<?php echo date("Y-m-d", strtotime("-1 month")); ?>" );
			$("#e_d_range").val( "<?php echo date("Y-m-d", strtotime("now")); ?>" );

			$("#EquitySearchSearchUserId").val("");
			$("#EquitySearchSearchCompanyWork").val("");
			$("#EquitySearchSearchFullName").val("");
			$("#EquitySearchSearchCompanyAccountId").val("");

			search_url = "";
			search_data = {};

			$("#sort_last_name").val('');
			$("#sort_last_name").selectpicker('refresh');
  		});

		$('#EquitySearchSearchModel').autocomplete({
        	source: "/equity_searches/automodel"
  		});

  		$('#EquitySearchSearchCompanyAccountId').autocomplete({
        	source: "/contact_accounts/autoaccount"
  		});

  		$("#btn_do_equity_search").click(function(){

  			search_url = "/equity_searches/do_equity_search";
			search_data = $("#EquitySearchIndexForm").serialize();

			console.log(search_data);

			$("#sort_last_name").val('');
			$("#sort_last_name").selectpicker('refresh');

	  		$.ajax({
				url: "/equity_searches/do_equity_search",
				type: "get",
				data: $("#EquitySearchIndexForm").serialize(),
				cache: false,
				success: function(results){
					$("#equity_search_result").html(results);
				}
			});

  		});


		$("#btn_save_equity_search,#btn_save_bdc_search").click(function(event){
			event.preventDefault();
			$is_bdc = $(this).attr('data-bdc');
			if($is_bdc != 'undefined' )
			$("#EquitySearchBdcSearch").val($is_bdc);
			if( $("#EquitySearchSearchName").val() == '' ) {
				alert("Please enter search name");
				$("#EquitySearchSearchName").focus();
			} else {
				$("#btn_save_equity_search").attr("disabled",true);
				$.ajax({
					type: "POST",
					data: $("#EquitySearchIndexForm").serialize(),
					url:  $("#EquitySearchIndexForm").attr('action'),
					success: function(data){
						$("#EquitySearchSearchName").val("");
						$("#btn_save_equity_search").attr("disabled",false);
						$("#saved_search").html(data);
					}
				});
			}
		});

		$("#EquitySearchSearchStatusHeader").change(function() {

			status_header = $(this).val();
			search_status = $("#EquitySearchSearchStatus");
			$(search_status).html('<option value="">Loading....</option>');
			$.ajax({
				type: "GET",
				cache: false,
				url: "/eblasts/status_by_header",
				data: {'header': status_header},
				success: function(data){
					var opts = $.parseJSON(data);
					$(search_status).empty();
					$(search_status).html('<option value="">Select</option>');
					$.each(opts, function(i, d) {
						$(search_status).append('<option value="' + i + '">' + d + '</option>');
					});
				}
			});
		});

		var cb = function(start, end, label) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			$("#s_d_range").val( start.format('YYYY-MM-DD') );
			$("#e_d_range").val( end.format('YYYY-MM-DD') );
		}

		var optionSet1 = {
			startDate: '<?php echo date("m/d/Y",strtotime("-1 month")); ?>',
			endDate: '<?php echo date("m/d/Y",strtotime("now")); ?>',
	        minDate: '01/01/2000',
	        maxDate: '12/31/<?php echo date('Y'); ?>',
	        showDropdowns: true,
	        showWeekNumbers: true,
	        timePicker: false,
	        timePickerIncrement: 1,
	        timePicker12Hour: true,
	        ranges: {
	           'Today': [moment(), moment()],
	           'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
	           'Last 7 Days': [moment().subtract('days', 6), moment()],
	           'Last 30 Days': [moment().subtract('days', 29), moment()],
	           'This Month': [moment().startOf('month'), moment().endOf('month')],
	           'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
	        },
	        opens: 'left',
	        buttonClasses: ['btn btn-default'],
	        applyClass: 'btn-small btn-primary',
	        cancelClass: 'btn-small',
	        format: 'MM/DD/YYYY',
	        separator: ' to ',
	        locale: {
	            applyLabel: 'Submit',
	            cancelLabel: 'Clear',
	            fromLabel: 'From',
	            toLabel: 'To',
	            customRangeLabel: 'Custom',
	            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
	            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
	            firstDay: 1
	        }
		};
		$('#reportrange').daterangepicker(optionSet1, cb);

	});

	if (typeof $.fn.select2 != 'undefined'){
		$(".round_robin_filter_input_category").select2({
		    placeholder: "Select Categories",
		    allowClear: true
		});
	}
	if (typeof $.fn.select2 != 'undefined'){
		$(".round_robin_filter_input_county").select2({
		    placeholder: "Select County",
		    allowClear: true
		});
	}
</script>
