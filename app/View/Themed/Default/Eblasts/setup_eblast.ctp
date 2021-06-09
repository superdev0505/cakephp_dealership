<script>
<?php

if(!isset($this->request->params['named']['reload'])){
?>
	url = window.location.href+"/reload:true";
	//alert(url);
	//window.location.href = url ;
<?php
}
?>
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
<div class="innerLR widget-employees">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<div class="wizard">
				<div class="widget widget-tabs widget-tabs-responsive">
					<!-- Widget heading -->
					<div class="widget-head">
						<ul>
							<li class="active"><a href="#tab1-1" class="glyphicons edit" data-toggle="tab"><i></i> Campaign Name </a></li>
							<li><a href="#tab2-1" class="glyphicons search" data-toggle="tab"><i></i> Select Recipients </a></li>
							<li><a href="#tab3-1" class="glyphicons group" data-toggle="tab"><i></i> Eblast Recipients </a></li>
							<li><a href="#tab4-1" class="glyphicons icon-folder-check fa-x" data-toggle="tab"><i></i> Select Template </a></li>
							<li><a href="#tab5-1" data-toggle="tab"><i class="fa fa-clock-o"> </i> Schedule Time </a></li>
						</ul>
					</div>
					<!-- // Widget heading END -->
					<div class="widget-body">
					<?php echo $this->Form->create('Eblast', array('validate'=>"0", 'type'=>'post','class' => 'form-inline apply-nolazy', 'role'=>"form","onsubmit"=>"return Validate()")); ?>
						<div class="tab-content">
							<!-- Step 1 -->
							<div class="tab-pane active" id="tab1-1">
								<?php echo $this->element( 'campaign_name' ); ?>
							</div>
							<!-- // Step 1 END -->
							<!-- Step 2 -->
							<div class="tab-pane" id="tab2-1">
								<?php echo $this->element( 'filter_recipient' ); ?>
							</div>
							<!-- // Step 2 END -->
							<!-- Step 3 -->
							<div class="tab-pane" id="tab3-1">
								<?php echo $this->element( 'all_recipients' ); ?>
							</div>
							<!-- // Step 3 END -->
							<!-- Step 4 -->
							<div class="tab-pane" id="tab4-1">
								<?php echo $this->element( 'all_templates' ); ?>
							</div>
							<!-- // Step 4 END -->
							<!-- Step 5 -->
							<div class="tab-pane" id="tab5-1">
								<?php echo $this->element( 'schedule_time',array("type"=>$template_type) ); ?>
							</div>
							<!-- // Step 5 END -->
						</div>
						<div class="row">
							<div class="col-md-2 pagination">
							  <a href="<?php echo $this->Html->url(array('action'=>'/eblasts_list',$template_type)); ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Cancel</a>
							  <button type="submit" class="btn btn-success hide"><i class="fa fa-save"></i> Add Contact</button>
							</div>
							<div class="col-md-9">
								<div class="pagination pull-right margin-none" >

									<!-- Wizard pagination controls -->
									<ul class="pagination margin-bottom-none">
										<li class="primary previous first"><a href="#" class="no-ajaxify">First</a></li>
										<li class="primary previous"><a href="#" class="no-ajaxify">Previous</a></li>
                                        <li class="next primary"><a href="#" class="no-ajaxify">Next</a></li>
										<li class="last primary"><a href="#" class="no-ajaxify">Last</a></li>

										<li class="next finish primary" style="display:none;">
											<button class="btn btn-success" id="btn-submit-wizard" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Complete</button>
										</li>
									</ul>
									<!-- // Wizard pagination controls END -->

								</div>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- // row END -->

	<?php //echo $this->element('sql_dump'); ?>

</div>
<script type="text/javascript">

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


		//Open sold validation
		function open_sold_validation(){
			var lead_status = $("#EblastSearchLeadStatus").val();
			var sales_step = $("#EblastSearchSalesStep").val();
			if(lead_status == 'Open' && sales_step == '10'){
				alert("OPEN and SOLD selected will get Zero results . Solds are CLOSED. Please Tray again");
			}
		}

		$("#EblastSearchLeadStatus").change(function(){
			open_sold_validation();
		});
		$("#EblastSearchSalesStep").change(function(){
			open_sold_validation();
		});









		$(".alert").delay(3000).fadeOut("slow");

		$("#EblastSetupEblastForm").submit(function(){
			if($(this).attr('validate') == 0)
				return false;
		});

		$('#filter_recipients').click(function(){
			$("#lead_details_content").html("&nbsp;");
			$('.ajax-loading').removeClass('hide');
			$('.removeme').remove();
			$.ajax({
				type: "GET",
				cache: false,
				data: $("#EblastSetupEblastForm").serialize(),
				url: '<?php echo $this->webroot; ?>eblasts/search_result/',
				success: function(data){
					if(data != ''){
						$("#search-result-content").html(data);
						$('#recipients_count').html( $('#search-result-content .results').html() );
						$("#EblastCountRecipient").val("found");
					}else{
						$("#search-result-content").html("");
						$('#recipients_count').html( 'Narrow your search...' );
						$("#EblastCountRecipient").val("");
					}
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});

		$("#EblastSearchCreated").bdatepicker({
			format: 'yyyy-mm-dd',

		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#EblastSearchModified').bdatepicker('setStartDate', startDate);
		});

		$("#EblastSearchModified").bdatepicker({
			format: 'yyyy-mm-dd',

		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#EblastSearchCreated').bdatepicker('setEndDate', FromEndDate);
		});


		$("#EblastScheduleStartDate").bdatepicker({
			format: 'yyyy-mm-dd',
			//startDate: "<?php echo date('m-d-Y'); ?>"
		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#EblastScheduleEndDate').bdatepicker('setStartDate', startDate);
		});

		$("#EblastScheduleEndDate").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "<?php echo date('m-d-Y'); ?>"
		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#EblastScheduleStartDate').bdatepicker('setEndDate', FromEndDate);
		});


		$("#EblastScheduleSingleDate").bdatepicker({
			format: 'mm-dd-yyyy',
			//startDate: "<?php echo date('m-d-Y'); ?>",
			"setDate": ""
		}).on('changeDate', function(selected){
			 $(this).bdatepicker('hide');
		});
		$('#EblastScheduleTime').timepicker({ defaultTime: "<?php echo date("H:i",(time()+(10*60)));?>" });
		// $('.selectpicker').selectpicker().css({'height':'200px'});


	//inventory search tool
	$.inventory({
		input_type: "#EblastSearchCategory",
		input_category:"#EblastSearchType",
		input_make:"#EblastSearchMake",
		input_year:"#EblastSearchYear",
		input_yearedit:"#btn_year_edit",

	 	input_model_id:"#EblastSearchModelId",
		input_model:"#EblastSearchModel",
		input_class:"#EblastSearchClass",
		btn_edit_model:"#btn_models_edit",

		input_unitColor_id:"#EblastSearchUnitColor",
		input_unitColor_fieldname:"data[Eblast][search_unit_color]",
	});



	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>
});

function Validate(){
	var template_type = $("#EblastTemplateType").val();
	var flag = true;
	if($.trim(template_type)=='M'){ // only for eblast
		var dateTime = $("#EblastScheduleSingleDate").val()+" "+$("#EblastScheduleTime").val()
		$.ajax({
			type: "POST",
			cache: false,
			data: {dateTime:dateTime},
			async:false,
			url: '<?php echo $this->webroot; ?>eblasts/validate_eblast_time/',
			success: function(data){
				var parsedData = $.parseJSON(data);
				if($.trim(parsedData.error)=='yes'){
					alert(parsedData.message);
					flag = false;
					$("#btn-submit-wizard").show();
				}else{
					flag = true;
				}
			}
		});
	}

	return flag;

}
</script>
