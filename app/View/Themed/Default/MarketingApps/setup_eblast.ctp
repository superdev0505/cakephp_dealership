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
							<li class="active" ><a href="#tab1-1" class="glyphicons edit" data-toggle="tab"><i></i> Campaign Name </a></li>
							<li><a href="#tab2-1" class="glyphicons search" data-toggle="tab"><i></i> Select Recipients </a></li>
							<li><a href="#tab4-1" class="glyphicons icon-folder-check fa-x" data-toggle="tab"><i></i> Select Template </a></li>
							<li><a href="#tab5-1" data-toggle="tab"><i class="fa fa-clock-o"> </i> Schedule Time </a></li>
						</ul>
					</div>
					<!-- // Widget heading END -->
					<div class="widget-body">
					<?php echo $this->Form->create('EblastApp', array('validate'=>"0", 'type'=>'post','class' => 'form-inline apply-nolazy', 'role'=>"form","onsubmit"=>"return Validate()")); ?>
						<div class="tab-content">
							<!-- Step 1 -->
							<div class="tab-pane active" id="tab1-1">
								<?php echo $this->element( 'campaign_name_app' ); ?>
							</div>
							<!-- // Step 1 END -->

							<div class="tab-pane" id="tab2-1">
								<?php echo $this->element( 'filter_recipient_app' ); ?>
							</div>


							<!-- Step 4 -->
							<div class="tab-pane" id="tab4-1">
								<?php echo $this->element( 'all_templates_app' ); ?>
							</div>
							<!-- // Step 4 END -->
							<!-- Step 5 -->
							<div class="tab-pane" id="tab5-1">
								<?php echo $this->element( 'schedule_time_app',array("type"=>$template_type) ); ?>
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

	<?php echo $this->element('sql_dump'); ?>

</div>
<script type="text/javascript">

	function mysql_format_data(date_str){
		var d = new Date(date_str);
		return (d.getMonth()+1) + "-" + d.getDate() + "-" + d.getFullYear();
	}

	var saved_search = [];
	var sales_step_ar = [];
	<?php foreach($SalesStep as $key=>$value){ ?>
	sales_step_ar[ <?php echo $key; ?> ] = "<?php echo $value; ?>";
	<?php } ?>

	function remove_added_search(secindex){
		if(confirm("Do you want to remove this search?")){
			saved_search.splice(secindex,1);
			generate_added_search_list();
		}
	}

	function generate_added_search_list(){
		$('#list_added_searches > li').remove();
		$.each(saved_search, function( index, value ) {
			// console.log(value);
			var html_data = '<span class="text-primary">Start:</span> '+mysql_format_data(value.s_d_range)+', <span class="text-primary">End:</span> '+mysql_format_data(value.e_d_range);
			if(value.search_lead_type != ''){
				html_data += ', <span class="text-primary">Lead Type:</span> '+value.search_lead_type;
			}
			if(value.search_status != ''){
				html_data += ', <span class="text-primary">Status:</span> '+value.search_status;
			}
			if(value.search_sales_step != ''){
				html_data += ', <span class="text-primary">Step:</span> '+sales_step_ar[ value.search_sales_step ];
			}
			if(value.search_type != ''){
				html_data += ', <span class="text-primary">Category:</span> '+value.search_type;
			}
			if(value.search_est_payment_search != ''){
				html_data += ', <span class="text-primary">Estimated Payment:</span> '+value.search_est_payment_search;
			}
			if(value.search_source != ''){
				html_data += ', <span class="text-primary">Source:</span> '+value.search_source;
			}
			if(value.search_zip != ''){
				html_data += ', <span class="text-primary">Zip:</span> '+value.search_zip;
			}
			if(value.search_model != ''){
				html_data += ', <span class="text-primary">Model:</span> '+value.search_model;
			}
			html_data += '<span class="count"><button type="button" onclick="remove_added_search(\''+ index +'\')" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>';

    		$('<li />', {html: html_data }).css({'height': 'auto'}).appendTo('#list_added_searches');
		});

		$("#multiple_added_search").val( JSON.stringify(saved_search) );

		$("#btn_reset_equity_search").trigger("click");

	}


	$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>

		//Save Search
		$("#btn_add_this_search").click(function(){

			bootbox.dialog({
				message: "<div  style='text-align: center'><strong>Do you want to add this search in this Eblast? </strong><div>",
				title: "Add Search To Eblast",
				buttons: {
					success: {
						label: "Yes",
						className: "btn-success",
						callback: function() {

							var search_data = {
								's_d_range' : $("#s_d_range").val() ,
								'e_d_range' : $("#e_d_range").val(),
								'search_status' : $("#EblastAppSearchStatus").val(),
								'search_lead_type' : $("#EblastAppSearchLeadType").val(),
								'search_model' : $("#EblastAppSearchModel").val(),
								'search_zip' : $("#EblastAppSearchZip").val(),
								'search_est_payment_search' :  $("#EblastAppSearchEstPaymentSearch").val(),
								'search_source' : $("#EblastAppSearchSource").val(),
								'search_sales_step' : $("#EblastAppSearchSalesStep").val(),
								'search_type' : $("#EblastAppSearchType").val(),
								'search_name' : $("#EblastAppSearchName").val(),
								'search_status_header' : $("#EblastAppSearchStatusHeader").val()
							};
							if($("#EblastAppSearchUserId").val()){
								search_data.search_user_id = $("#EblastAppSearchUserId").val();
							}
							console.log(search_data);
							saved_search.push(search_data);
							generate_added_search_list();
						}
					},
					danger: {
						label: "No",
						className: "btn-danger",
						callback: function() {

						}
					}
				}
			});


		});





		//Select Recipient type
		$("input[name='data[EblastApp][recipient_type]']").click(function(){
		    var recipient_type = $("input:radio[name='data[EblastApp][recipient_type]']:checked").val();
		    if(recipient_type == 'lead'){
		    	$("#recipient_search_container").show();
		    	$("#recipient_list_container").hide();
		    	$("#EblastAppListId").val("");
		    }else if(recipient_type == 'list'){
		    	$("#recipient_search_container").hide();
		    	$("#recipient_list_container").show();
		    }

		});


		//Open sold validation
		function open_sold_validation(){
			var lead_status = $("#EblastAppSearchLeadStatus").val();
			var sales_step = $("#EblastAppSearchSalesStep").val();
			if(lead_status == 'Open' && sales_step == '10'){
				alert("OPEN and SOLD selected will get Zero results . Solds are CLOSED. Please Tray again");
			}
		}

		$("#EblastAppSearchLeadStatus").change(function(){
			open_sold_validation();
		});
		$("#EblastAppSearchSalesStep").change(function(){
			open_sold_validation();
		});


		<?php if($restrict_eblast_salesperson == 'On' && !in_array(AuthComponent::user('group_id'),array('2','4','6','7','9','12','13'))){ ?>
			$("#EblastAppSearchUserId").val("<?php echo AuthComponent::user('id'); ?>");
		<?php } ?>


		$(".alert").delay(3000).fadeOut("slow");

		$("#EblastAppSetupEblastForm").submit(function(){
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
				data: $("#EblastAppSetupEblastForm").serialize(),
				url: '<?php echo $this->webroot; ?>marketing_apps/search_result/',
				success: function(data){
					if(data != ''){
						$("#search-result-content").html(data);
						$('#recipients_count').html( $('#search-result-content .results').html() );
						$("#EblastAppCountRecipient").val("found");
					}else{
						$("#search-result-content").html("");
						$('#recipients_count').html( 'Narrow your search...' );
						$("#EblastAppCountRecipient").val("");
					}
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});

		$("#EblastAppSearchCreated").bdatepicker({
			format: 'yyyy-mm-dd',

		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#EblastAppSearchModified').bdatepicker('setStartDate', startDate);
		});

		$("#EblastAppSearchModified").bdatepicker({
			format: 'yyyy-mm-dd',

		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#EblastAppSearchCreated').bdatepicker('setEndDate', FromEndDate);
		});


		$("#EblastAppScheduleStartDate").bdatepicker({
			format: 'yyyy-mm-dd',
			//startDate: "<?php echo date('m-d-Y'); ?>"
		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#EblastAppScheduleEndDate').bdatepicker('setStartDate', startDate);
		});

		$("#EblastAppScheduleEndDate").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "<?php echo date('m-d-Y'); ?>"
		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#EblastAppScheduleStartDate').bdatepicker('setEndDate', FromEndDate);
		});


		$("#EblastAppScheduleSingleDate").bdatepicker({
			format: 'mm-dd-yyyy',
			//startDate: "<?php echo date('m-d-Y'); ?>",
			"setDate": ""
		}).on('changeDate', function(selected){
			 $(this).bdatepicker('hide');
		});
		$('#EblastAppScheduleTime').timepicker({ defaultTime: "<?php echo date("H:i",(time()+(10*60)));?>" });
		// $('.selectpicker').selectpicker().css({'height':'200px'});


		//Equity Search


		$("#btn_save_equity_search").click(function(event){
			event.preventDefault();

			//search data
			var search_data = {
				's_d_range' : $("#s_d_range").val() ,
				'e_d_range' : $("#e_d_range").val(),
				'search_status' : $("#EblastAppSearchStatus").val(),
				'search_lead_type' : $("#EblastAppSearchLeadType").val(),
				'search_model' : $("#EblastAppSearchModel").val(),
				'search_zip' : $("#EblastAppSearchZip").val(),
				'search_est_payment_search' :  $("#EblastAppSearchEstPaymentSearch").val(),
				'search_source' : $("#EblastAppSearchSource").val(),
				'search_sales_step' : $("#EblastAppSearchSalesStep").val(),
				'search_type' : $("#EblastAppSearchType").val(),
				'search_name' : $("#EblastAppSearchName").val(),
				'search_status_header' : $("#EblastAppSearchStatusHeader").val(),


			};


			if( $("#EblastAppSearchName").val() == '' ){
				alert("Please enter search name");
				$("#EblastAppSearchName").focus();
			}else{
				//$("#btn_save_equity_search").attr("disabled",true);
				$.ajax({
					type: "POST",
					data: search_data,
					url: "/marketing_apps/save_search/",
					success: function(data){
						$("#EblastAppSearchName").val("");
						$("#btn_save_equity_search").attr("disabled",false);
						$("#saved_search").html(data);
					}
				});
			}

		});


		$("#btn_do_equity_search").click(function(){

			//search data
			var search_data = {
				's_d_range' : $("#s_d_range").val() ,
				'e_d_range' : $("#e_d_range").val(),
				'search_status' : $("#EblastAppSearchStatus").val(),
				'search_lead_type' : $("#EblastAppSearchLeadType").val(),
				'search_model' : $("#EblastAppSearchModel").val(),
				'search_zip' : $("#EblastAppSearchZip").val(),
				'search_make' : $("#EblastAppSearchMake").val(),
				'search_est_payment_search' :  $("#EblastAppSearchEstPaymentSearch").val(),
				'search_source' : $("#EblastAppSearchSource").val(),
				'search_sales_step' : $("#EblastAppSearchSalesStep").val(),
				'search_type' : $("#EblastAppSearchType").val()
			};

			if($("#EblastAppSearchUserId").val()){
				search_data.search_user_id = $("#EblastAppSearchUserId").val();
			}

	  		$.ajax({
				url: "/marketing_apps/do_equity_search/",
				type: "get",
				data: search_data,
				cache: false,
				success: function(results){
					$("#equity_search_result").html(results);
				}
			});

  		});

		$("#btn_reset_equity_search").click(function(){

	  		$("#EblastAppSearchLeadType").val("All");
			$("#EblastAppSearchStatusHeader").val("");
			$("#EblastAppSearchSalesStep").val("");
			$("#EblastAppSearchSalesStep").val("");
			$("#EblastAppSearchEstPaymentSearch").val("");
			$("#EblastAppSearchSource").val("");
			$("#EblastAppSearchModel").val("");
			$("#EblastAppSearchStatus").val("");
			$("#EblastAppSearchType").val("");
			$("#EblastAppSearchZip").val("");
			$("#EblastAppSearchUserId").val("");

			<?php if($restrict_eblast_salesperson == 'On' && !in_array(AuthComponent::user('group_id'),array('2','4','6','7','9','12','13'))){ ?>
				$("#EblastAppSearchUserId").val("<?php echo AuthComponent::user('id'); ?>");
			<?php } ?>

  		});

  		$("#EblastAppSearchStatusHeader").change(function(){
			status_header = $(this).val();
			search_status = $("#EblastAppSearchStatus");
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
			//console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
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




	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>
});

function Validate(){
	var template_type = $("#EblastAppTemplateType").val();
	var flag = true;
	if($.trim(template_type)=='M'){ // only for eblast
		var dateTime = $("#EblastAppScheduleSingleDate").val()+" "+$("#EblastAppScheduleTime").val()
		$.ajax({
			type: "POST",
			cache: false,
			data: {dateTime:dateTime},
			async:false,
			url: '<?php echo $this->webroot; ?>marketing_apps/validate_eblast_time/',
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






function remove_equity_search(search_id,search_source){
	if(confirm("Do you want to remove the search?")){
    	$.ajax({
			url: "/marketing_apps/remove_search/"+search_id+"/"+search_source,
			type: "get",
			cache: false,
			success: function(results){
				$("#saved_search").html(results);
			}
		});
    }
    return false;
}

function do_equity_search(search_id, event, search_source){
		sessionStorage.setItem('current_equity_search',search_id);
	if(typeof(event) !== "undefined") event.preventDefault();

	$.ajax({
		url: "/marketing_apps/do_equity_search/"+search_id+"/"+search_source,
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

























</script>
