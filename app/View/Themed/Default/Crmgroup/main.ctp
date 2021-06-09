
<style type="text/css">

body .widget .widget-head.tabsbar_inverse, body .widget .widget-head.tabsbar_inverse ul {
	height: 100%;
}

.tabsbar_inverse ul li.active{
	background: #424242 !important;
}
.tabsbar_inverse ul li.active a, .tabsbar_inverse ul li.active a i:before {
	color: #FFF !important;
}

</style>


<div class="innerLR">
	<div class="widget widget-body-white">
		<div class="widget-body">
			<div class="row">
				<div class="col-md-12" >




<div class="relativeWrap">
	<div class="widget widget-tabs widget-tabs-responsive" style='position: relative;'>

		<!-- Tabs Heading -->
		<div class="widget-head tabsbar_inverse">
			<ul>
				<?php if($show_web_lead == 'On'){ ?>
				<li class="active">
					<a class="glyphicons cloud" href="#tab-1" id="btn-tab-1"  data-toggle="tab">
						<i></i>
						All Web Leads (<span id="all_web_tab_count"><?php echo $cnt_web_lead; ?></span>)
					</a>
				</li>
				<?php } ?>

				<?php if($show_web_lead_push == 'On'){ ?>
					<li><a class="glyphicons user" href="#tab-3" id="btn-tab-3"  data-toggle="tab"><i></i>Leads Push To Me (<?php echo $lead_pushed_cnt; ?>)</a></li>
				<?php } ?>

				<li class=""><a class="glyphicons stats" href="#tab-event-today" id="btn-tab-event-today"  data-toggle="tab"><i></i>
					Todays Events  (<span id="today_tab_count"><?php echo $today_event_count; ?></span>)
					</a>
				</li>

				<li class=""><a class="glyphicons stats" href="#tab-event" id="btn-tab-event"  data-toggle="tab"><i></i>
					Overdue Events (<span id="over_due_tab_count"><?php echo $overdue_event_count; ?></span>)
					</a>
				</li>

				<?php if($group_id == '6'){ ?>
				<li class=""><a class="glyphicons group" href="#tab-all-leads" id="btn-all-leads"  data-toggle="tab"><i></i>
					All Leads
					</a>
				</li>
				<?php } ?>

				<li class="<?php if($show_web_lead == 'Off'){ echo "active";  } ?>"><a class="glyphicons share_alt" href="#tab-2" id="btn-tab-2" data-toggle="tab"><i></i>Location</a></li>

				<li>
					<a class="glyphicons search" href="#tab-src" id="btn-tab-src" data-toggle="tab"><i></i>Search</a>
				</li>
                 <?php if(AuthComponent::user('report_access')){ ?>
                 <li>
					<a class="glyphicons stats" href="<?php echo $this->Html->url(array('controller' =>'users','action' => 'login','crmreport' => true)); ?>" target="_blank" ><i></i>Reports</a>
				</li>

				 <?php } ?>


				<?php
				if(!empty($crmgroupTabs)){
					foreach ($crmgroupTabs as $crmgroupTab) {
				?>
				<li class="">
					<a class="glyphicons group" custom_tab_id = '<?php echo $crmgroupTab['CrmgroupTab']['id']; ?>' href="#tab-custom-<?php echo $crmgroupTab['CrmgroupTab']['id']; ?>" class="btn-custom-tab" id="btn-tab-custom-<?php echo $crmgroupTab['CrmgroupTab']['id']; ?>"  data-toggle="tab"><i></i>
					<?php echo $crmgroupTab['CrmgroupTab']['name']; ?>
					</a>
				</li>

				<?php } } ?>

				<li>

							<!--<div style="position: absolute; top: 0; right: 0px;z-index: 10000;">-->

							<style>
							body .widget .widget-head .dropdown-menu.not-inherit li>a:hover, .widget .widget-head .dropdown-menu.not-inherit li>a:focus, .widget .widget-head .dropdown-submenu.not-inherit:hover>a {
								color: #262626;
								text-decoration: none;
								background-color: #f5f5f5;
								background-image: none;

							}
							body .widget .widget-head .dropdown-menu.not-inherit li>a, .widget .widget-head .dropdown-menu.not-inherit li>a:focus, .widget .widget-head .dropdown-submenu.not-inherit>a { padding: 6px 5px 6px 15px; }
							body .widget.widget-tabs>.widget-head ol.not-inherit li {
								border-right:none;
								width:100%;
							}
							</style>
						<div class="btn-group" style="display:block;">
								<a  id="crm_group_add_tab" href="#modal-add-custom-tab" data-toggle="modal"  class="btn btn-inverse" style="padding-top:6px;">
									<i class="fa fa-plus"></i>
								</a>
								<button type="button" class="btn  btn-primary dropdown-toggle" data-toggle="dropdown" style="height:35px;">
									Locations <span class="caret"></span>
								</button>
								<ol class="dropdown-menu pull-right not-inherit">
									<?php foreach($dealer_ids as $key=>$value){ ?>
										<li>
											<a class='no-ajaxify open_build' href="/crmgroup/open_build/<?php echo $key; ?>"><?php echo $value; ?></a>
										</li>
									<?php } ?>
										<li>
											<a class='no-ajaxify' href="#modal-2" data-toggle="modal"  href="/crmgroup/settins/">Settings</a>
										</li>
								</ol>
						</div>
					</li>
					<li>
						<a class="btn btn-primary no-ajaxify" href='/crmgroup/' style="padding-top:6px;">Logout</a>


				</li>

			</ul>
		</div>
		<!-- // Tabs Heading END -->

		<div class="widget-body">
			<div class="tab-content">


				<?php
				if(!empty($crmgroupTabs)){
					foreach ($crmgroupTabs as $crmgroupTab) {
				?>
				<div class="tab-pane animated fadeInUp" id="tab-custom-<?php echo $crmgroupTab['CrmgroupTab']['id']; ?>">
					<div id="custom_tab_content_<?php echo $crmgroupTab['CrmgroupTab']['id']; ?>"></div>
				</div>
				<?php } } ?>



				<?php if($show_web_lead == 'On'){ ?>
				<!-- Tab content -->
				<div class="tab-pane animated fadeInUp active" id="tab-1">

					<button id="brn_refresh_all_web_lead" class="btn btn-primary btn-xs"><i class="fa fa-refresh"></i> Refresh</button> &nbsp; &nbsp;

					<div id="weblead_result">
					</div>
				</div>
				<!-- // Tab content END -->
				<?php } ?>

				<?php if($show_web_lead_push == 'On'){ ?>
				<!-- Tab content -->
				<div class="tab-pane animated fadeInUp" id="tab-3">
					<div id="web_leads_pushed"></div>
				</div>
				<!-- // Tab content END -->
				<?php } ?>


				<!-- Tab content -->
				<div class="tab-pane animated fadeInUp" id="tab-event-today">
					<div id="web_leads_today_event"></div>
				</div>
				<!-- // Tab content END -->

				<!-- Tab content -->
				<div class="tab-pane animated fadeInUp" id="tab-event">
					<div id="web_leads_overdue"></div>
				</div>
				<!-- // Tab content END -->

				<?php if($group_id == '6'){ ?>
				<!-- Tab all leads -->
				<div class="tab-pane animated fadeInUp form-inline" id="tab-all-leads">

					<?php echo $this->Form->create('CrmgroupSrc', array('type'=>'GET','url' => array('action' => 'crmgroup_search_result') ,'id' => 'CrmgroupAlllead',  'class' => 'form-inline no-ajaxify')); ?>

					<input type='hidden' name='s_d_range' value='<?php echo date("Y-m-d",strtotime("now")); ?>' id = 's_d_range'>
					<input type='hidden' name='e_d_range' value='<?php echo date("Y-m-d",strtotime("now")); ?>' id = 'e_d_range'>


					<div class="row">

						<div class="col-md-1 col-md-offset-2 text-right">
							<?php echo $this->Form->label('search_status_header','Status Header: &nbsp;'); ?>
						</div>

						<div class="col-md-2">
							<?php
							echo $this->Form->select('search_status_header', $lead_status_headers, array(
								'empty' => 'Select',
								'value'=>$search_status_header,
								'label'=>false, 'class' => 'form-control','style'=>'width:auto'));
							?>
						</div>
						<div class="col-md-3">
							Period:
							<div id="reportrange"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;display:inline">
								<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
								<span>
									<?php echo date("F j, Y",strtotime("-1 month")); ?> - <?php echo date("F j, Y",strtotime("now")); ?>
									<b class="caret"></b>
								</span>
							</div>

							&nbsp; &nbsp; <button type="button" id="btn_do_all_lead_search" class="btn btn-primary btn-sm">Search</button>
						</div>
					</div>
					<div class="separator"></div>
					<div class="row">
						<div class="col-md-1 col-md-offset-2 text-right">
							<?php echo $this->Form->label('search_status','Status: &nbsp;'); ?>
						</div>
						<div class="col-md-2">
							<?php
							echo $this->Form->select('search_status',  null , array(
								'name'=>'search_status',
								'empty' => 'Select',
								'label'=>false,'div'=>false,
								'class' => 'form-control',
								'style' => 'width:auto'
							));
							?>

						</div>

						<div class="col-md-6">

							<label>
								<input type="radio" value="all" class="btn_alllead_color_code" name="alllead_colorcode"> <span style="color: #000000">All Lead</span>
							</label> &nbsp;
							<label
								data-toggle="tooltip"
								data-original-title="Lead Not Pushed and Not Worked"
								data-placement="top"
							>
								<input type="radio" value="red" class="btn_alllead_color_code" name="alllead_colorcode"> <span style="color: #cc3a3a">Unassigned Unworked</span>
							</label> &nbsp;

							<label
								data-toggle="tooltip"
								data-original-title="Lead Pushed and Not Worked"
								data-placement="top"
							>
								<input type="radio" value="yellow" class="btn_alllead_color_code" name="alllead_colorcode"> <span style="color: #d2ba02">Assigned Not Worked</span>
							</label> &nbsp;

							<label

								data-toggle="tooltip"
								data-original-title="Lead Worked"
								data-placement="top"
							>
								<input type="radio" value="green" class="btn_alllead_color_code" name="alllead_colorcode"> <span style="color: #8bbf61">Assigned and Worked</span>
							</label>

						</div>




					</div>

					<?php echo $this->Form->end(); ?>

					<div id="all_leads_result"></div>
				</div>
				<!-- // Tab all leads END -->
				<?php } ?>




				<!-- Tab content -->
				<div class="tab-pane animated fadeInUp <?php if($show_web_lead == 'Off'){ echo "active";  } ?>" id="tab-2">

					<iframe sandbox="allow-same-origin allow-scripts allow-forms allow-modals allow-popups" src="" width="100%" height="1000" id="frameDemo"></iframe>

				</div>
				<!-- // Tab content END -->

				<div class="tab-pane animated fadeInUp" id="tab-src">

					<?php echo $this->Form->create('Crmgroup', array('type'=>'GET','url' => array('action' => 'crmgroup_search_result') ,'id' => 'CrmgroupMainForm',  'class' => 'form-inline no-ajaxify')); ?>

					<div class="row">

						<div class="col-md-2">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<?php
								echo $this->Form->input('search_phone', array(
								'div' => false,
								'class' => 'form-control',
								'label' => false,
								'placeholder' => '(ALL) Phone - Mobile, Home, Work'), array('div' => false));
								?>
							</div>
							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<?php
								echo $this->Form->input('search_email', array(
								'div' => false,
								'class' => 'form-control',
								'label' => false,
								'placeholder' => 'Email'), array('div' => false));
								?>
							</div>
							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<?php
							echo $this->Form->input('search_first_name', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => 'First Name - Company, Spouse'), array('div' => false));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<?php
							echo $this->Form->input('search_last_name', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => 'Last Name'), array('div' => false));
							?>
							<div class="separator"></div>
							<div>

								<?php
								echo $this->Form->input('search_bdc_lead', array(
								'div' => false,
								'hiddenField' => false,
								'label' => "&nbsp; BDC Lead",
								'type' => 'checkbox'), array('div' => false));
								?>
							</div>

							<div class="separator"></div>
						</div>

						<div class="col-md-2">
							<button id="btn_src_crm_group" type="button" class="btn btn-inverse btn-sm">
								<i class="fa fa-search"></i> Search
							</button>

							<button id="btn_reset_crm_group" type="reset" class="btn btn-danger btn-sm">
								Reset
							</button>

							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<div id='crm_grop_src_count'></div>
							<div class="separator"></div>
						</div>


					</div>


					<div class="row">
						<div class="col-md-12">

							<label>
								<input type="radio" value="all" class="btn_leadsearch_color_code" name="leadsearch_colorcode"> <span style="color: #000000">All Lead</span>
							</label> &nbsp;
							<label
								data-toggle="tooltip"
								data-original-title="Lead Not Pushed and Not Worked"
								data-placement="top"
							>
								<input type="radio" value="red" class="btn_leadsearch_color_code" name="leadsearch_colorcode"> <span style="color: #cc3a3a">Unassigned Unworked</span>
							</label> &nbsp;

							<label
								data-toggle="tooltip"
								data-original-title="Lead Pushed and Not Worked"
								data-placement="top"
							>
								<input type="radio" value="yellow" class="btn_leadsearch_color_code" name="leadsearch_colorcode"> <span style="color: #d2ba02">Assigned Not Worked</span>
							</label> &nbsp;

							<label

								data-toggle="tooltip"
								data-original-title="Lead Worked"
								data-placement="top"
							>
								<input type="radio" value="green" class="btn_leadsearch_color_code" name="leadsearch_colorcode"> <span style="color: #8bbf61">Assigned and Worked</span>
							</label>


						</div>
					</div>




					<?php echo $this->Form->end(); ?>

					<div class="row">
						<div class="col-md-12 innerAll">
							<div id='crm_search_result'></div>
						</div>
					</div>





				</div>
				<!-- // Tab content END -->



			</div>
		</div>
	</div>
</div>



















				</div>
			</div>
		</div>
	</div>
</div>


<br><br><br><br>







<!-- Modal -->
<div class="modal fade" id="modal-2">

	<div class="modal-dialog modal900" >
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<div>
					 <center>
						Show Web Leads: <div class="make-switch" data-on="success" data-off="default">
							<input name="show_web_lead" id="show_web_lead"
							 type="checkbox"  <?php if($show_web_lead == 'Off') echo ""; else echo 'checked="checked"'; ?>   />
						</div>
	 					<br><br>

						 Lead Process: <div class="make-switch" id='cnt_lead_process' data-on="success" data-off="default">
						<input name="lead_process" id="lead_process"
						 type="checkbox"  <?php if($lead_process == 'Off') echo ""; else echo 'checked="checked"'; ?>   />
						</div>
						<br><br>
						 Show Lead Push: <div class="make-switch" data-on="success" data-off="default">
						<input name="show_web_lead_push" id="show_web_lead_push"
						 type="checkbox"  <?php if($show_web_lead_push == 'Off') echo ""; else echo 'checked="checked"'; ?>   />
						</div>
						<br><br>
						 Show All Locations: <div class="make-switch" data-on="success" data-off="default">
						<input name="show_other_locations" id="show_other_locations"
						 type="checkbox"  <?php if($show_other_locations == 'Off') echo ""; else echo 'checked="checked"'; ?>   />
						</div>
					</center>

				</div>


			</div>
			<div class="modal-footer center margin-none">
				<a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
			</div>


		</div>
	</div>

</div>
<!-- // Modal END -->




<!-- Modal -->
<div class="modal fade" id="modal-add-custom-tab">

	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Custom Tab</h3>
			</div>
			<!-- // Modal heading END -->

			<!-- Modal body -->
			<div class="modal-body">

				<div class="innerAll">
					<form class="margin-none innerLR inner-2x">
					  	<div class="form-group">
					    	<label for="CrmgroupTabsName">Name</label>
					    	<input type="text" class="form-control" name="CrmgroupTabName" id="CrmgroupTabName" placeholder="Name of the Tab">
					  	</div>
					  	<div class="form-group">
					    	<label for="CrmgroupTabSource">Source</label>
					    	<?php echo $this->Form->input('source', array('type' => 'select', 'name' => 'CrmgroupTabSource', 'id' => 'CrmgroupTabSource', 'options' => $lead_sources_options, 'empty' => 'Select',  'required' => 'required','label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					  	</div>
					  	<div class="form-group">
					    	<input type="checkbox" class="" name="CrmgroupTabRemoveSourceAllWeblead" id="CrmgroupTabRemoveSourceAllWeblead" >
					    	<label for="CrmgroupTabRemoveSourceAllWeblead">Remove Source From All Weblead</label>
					  	</div>
					  	<div class="text-center innerAll">
							<button type="button"  class="btn btn-primary" id="add_custom_tab" aria-hidden="true">Add Tab</a>
						</div>
					</form>
				</div>

			</div>
			<!-- // Modal body END -->

		</div>
	</div>

</div>
<!-- // Modal END -->










<?php echo $this->element('sql_dump'); ?>


<script>


	// window.onbeforeunload = function(){
 //        return true; // This will stop the redirecting.
 //    }
window.crmgroup_refresh_url = "";

function refresh_crm_group(){

	setTimeout(refresh_crm_group, 180000);
	if(window.crmgroup_refresh_url != ''){
		$.ajax({
			type: "GET",
			cache: false,
			url: window.crmgroup_refresh_url,
			success: function(data){
				$("#weblead_result").html(data);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				refresh_crm_group_click();
		    }

		});
	}
}

function refresh_crm_group_click(){
	if(window.crmgroup_refresh_url != ''){
		$("#weblead_result").html('Loading...');
		$.ajax({
			type: "GET",
			cache: false,
			url: window.crmgroup_refresh_url,
			success: function(data){
				$("#weblead_result").html(data);
			},
			error: function (xhr, ajaxOptions, thrownError) {

		    }



		});
	}
}


function count_crmgroup_lead(){
	if( $("#CrmgroupSearchPhone").val() == '' && $("#CrmgroupSearchEmail").val() == ''
		&& $("#CrmgroupSearchFirstName").val() == '' && $("#CrmgroupSearchLastName").val() == '' ){
		$("#crm_grop_src_count").html("");
	}else{

		$.ajax({
			type: "GET",
			cache: false,
			data: $("#CrmgroupMainForm").serialize(),
			url: "<?php echo $this->Html->url(array('controller'=>'crmgroup', 'action'=>'crmgroup_search_result')); ?>/count",
			success: function(data){
				$("#crm_grop_src_count").html(data);
			}
		});
	}

}

$script.ready('bundle', function() {


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>

	$("#CrmgroupSrcSearchStatusHeader").change(function() {
		status_header = $(this).val();
		search_status = $("#CrmgroupSrcSearchStatus");
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



	$("#btn_do_all_lead_search").click(function(){

		search_url = "/crm_group/all_lead_search";
		search_data = $("#CrmgroupAlllead").serialize();
  		$.ajax({
			url: search_url,
			type: "get",
			data: search_data,
			cache: false,
			success: function(results){
				$("#all_leads_result").html(results);
			}
		});

	});














	$("#btn-tab-event").click(function(){

		$.ajax({
			type: "GET",
			cache: false,
			url: "/crmgroup/overdue_events",
			success: function(data){
				$("#web_leads_overdue").html(data);
			}
		});

	});

	$("#btn-tab-event-today").click(function(){

		$.ajax({
			type: "GET",
			cache: false,
			url: "/crmgroup/today_events",
			success: function(data){
				$("#web_leads_today_event").html(data);
			}
		});

	});







	$("#btn_reset_crm_group").click(function(){
		$("#crm_search_result").html("");
		$("#crm_grop_src_count").html("");
	});

	$("#CrmgroupSearchPhone").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

	$("#btn_src_crm_group").click(function(){

		if( $("#CrmgroupSearchPhone").val().trim().length >= 3  || $("#CrmgroupSearchEmail").val().trim().search('@') >= 0
			|| $("#CrmgroupSearchFirstName").val().trim().length > 1  || $("#CrmgroupSearchLastName").val().trim().length > 1 ){

			$.ajax({
				type: "GET",
				cache: false,
				data: $("#CrmgroupMainForm").serialize(),
				url: "<?php echo $this->Html->url(array('controller'=>'crmgroup', 'action'=>'crmgroup_search_result')); ?>",
				success: function(data){
					$("#crm_search_result").html(data);
				}
			});

		}else{

			alert('Please narrow your search');


		}



	});

	$('#CrmgroupSearchPhone, #CrmgroupSearchEmail, #CrmgroupSearchFirstName, #CrmgroupSearchLastName').bind('input keyup', function(){
	    var $this = $(this);
	    var delay = 1500; // 2 seconds delay after last input


	    var elementid = $(this).attr('id');
	    //console.log(elementid);
	    if( elementid == 'CrmgroupSearchPhone' &&  $("#CrmgroupSearchPhone").val().trim().length < 3 && $("#CrmgroupSearchPhone").val().trim().length > 0    ){
	    	return true;
	    }
	    if( elementid == 'CrmgroupSearchFirstName' &&  $("#CrmgroupSearchFirstName").val().trim().length == 1   ){
	    	return true;
	    }
	    if( elementid == 'CrmgroupSearchLastName' &&  $("#CrmgroupSearchLastName").val().trim().length == 1 ){
	    	return true;
	    }
	    if( elementid == 'CrmgroupSearchEmail' &&  $("#CrmgroupSearchEmail").val().search('@') < 1 ){
	    	return true;
	    }




	    clearTimeout($this.data('timer'));
	    $this.data('timer', setTimeout(function(){
	        count_crmgroup_lead();
	    }, delay));
	});


	$('#CrmgroupSearchBdcLead').change(function(){
		count_crmgroup_lead();
	});



	function web_leads_pushed(){
		$.ajax({
			type: "GET",
			cache: false,
			url: "<?php echo $this->Html->url(array('controller'=>'crmgroup', 'action'=>'web_leads_pushed')); ?>?dealer_id=",
			success: function(data){
				$("#web_leads_pushed").html(data);
			}
		});
	}


	<?php if($show_web_lead_push == 'On'){ ?>
		$("#btn-tab-3").click(function(){
			$("#web_leads_pushed").html("Loading...");
			web_leads_pushed();
		});
	<?php } ?>



	<?php if($show_web_lead == 'On'){ ?>

	$("#weblead_result").html("Loading...");
	$.ajax({
		type: "GET",
		cache: false,
		url: "<?php echo $this->Html->url(array('controller'=>'crmgroup', 'action'=>'web_leads')); ?>?dealer_id=",
		success: function(data){
			$("#weblead_result").html(data);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			refresh_crm_group_click();
		}
	});
	window.crmgroup_refresh_url = "<?php echo $this->Html->url(array('controller'=>'crmgroup', 'action'=>'web_leads')); ?>?dealer_id=";
	setTimeout(refresh_crm_group, 180000);


	$("#btn-tab-1").click(function(){
		refresh_crm_group_click();

	});
	$("#brn_refresh_all_web_lead").click(function(){

		if(window.crmgroup_refresh_url != ''){
			$("#weblead_result").html('Loading...');
			$.ajax({
				type: "GET",
				cache: false,
				url: window.crmgroup_refresh_url,
				success: function(data){
					$("#weblead_result").html(data);

					//Error Log
					$.ajax({
						type: "GET",
						cache: false,
						data : {'page_url' : window.crmgroup_refresh_url, user_id : <?php echo json_encode(AuthComponent::user('id') ); ?>, dealer_id: <?php echo json_encode(AuthComponent::user('dealer_id') ); ?> },
						url: "/crmgroup_errorlogs/add",
						success: function(data){



						}
					});

				},
				error: function (xhr, ajaxOptions, thrownError) {

			    }

			});
		}


	});





	<?php } ?>



	$(".open_build").click(function(event){
		event.preventDefault();
		//console.log($(this).attr('href'));
		$("#frameDemo").attr("src", $(this).attr('href') );
		$("#btn-tab-2").trigger('click');
	});

	$("#show_web_lead").change(function(){

		$.ajax({
			type: "post",
			cache: false,
			dataType: 'json',
			data: {'value': $(this).is(":checked")},
			url:  "/crmgroup/save_settings/show_web_lead/",
			success: function(data){
				alert('Please refresh to see changes');
			}
		});

	});

	$("#show_web_lead_push").change(function(){

		$.ajax({
			type: "post",
			cache: false,
			dataType: 'json',
			data: {'value': $(this).is(":checked")},
			url:  "/crmgroup/save_settings/show_web_lead_push/",
			success: function(data){
				alert('Please refresh to see changes');
			}
		});

	});

	$("#show_other_locations").change(function(){

		$.ajax({
			type: "post",
			cache: false,
			dataType: 'json',
			data: {'value': $(this).is(":checked")},
			url:  "/crmgroup/save_settings/show_other_locations/",
			success: function(data){
				alert('Please refresh to see changes');
			}
		});

	});


	$('#cnt_lead_process').on('switch-change', function (event, state) {
    	//console.log("inside switchchange");
    	//console.log(state.value);

		<?php if($group_id != '2' && $group_id != '12'){  ?>
    	bootbox.dialog({
			message: "<div  style='text-align: center'><strong>Password: </strong>   <input style='width: auto;display: inline-block;' type='password' class='form-control' id='master_pwd' name='master_pwd' /><div>",
			title: "Pleae enter master password",
			buttons: {
				success: {
					label: "Ok",
					className: "btn-success",
					callback: function() {
						if( $("#master_pwd").val() != '' ){
							$.ajax({
								type: "post",
								cache: false,
								dataType: 'json',
								data: {'value': state.value,'master_pwd' : $("#master_pwd").val() },
								url:  "/crmgroup/save_settings/lead_process/",
								success: function(data){
									//alert('Plese refresh to see chnages');
									if(data.status == 'failed'){
										$('#cnt_lead_process').bootstrapSwitch('toggleState', true);
									}
									alert(data.message);
								}
							});
						}else{
							alert("Please enter password");
							return false;
						}
					}
				},
				danger: {
					label: "Cancel",
					className: "btn-danger",
					callback: function() {
						$('#cnt_lead_process').bootstrapSwitch('toggleState', true);
					}
				}
			}
		});
	<?php }else{  ?>

			$.ajax({
				type: "post",
				cache: false,
				dataType: 'json',
				data: {'value': state.value,'master_pwd' : $("#master_pwd").val() },
				url:  "/crmgroup/save_settings/lead_process/",
				success: function(data){
					alert(data.message);
				}
			});



	<?php }  ?>




	});


	// $("#lead_process").switchChange(function(){

	// 	bootbox.dialog({
	// 		message: "<div  style='text-align: center'><strong>Password: </strong>   <input style='width: auto;display: inline-block;' type='password' class='form-control' id='master_pwd' name='master_pwd' /><div>",
	// 		title: "Pleae enter master password",
	// 		buttons: {
	// 			success: {
	// 				label: "Ok",
	// 				className: "btn-success",
	// 				callback: function() {
	// 					if( $("#master_pwd").val() != '' ){
	// 						$.ajax({
	// 							type: "post",
	// 							cache: false,
	// 							dataType: 'json',
	// 							data: {'value': $(this).is(":checked"),'master_pwd' : $("#master_pwd").val() },
	// 							url:  "/crmgroup/save_settings/lead_process/",
	// 							success: function(data){
	// 								//alert('Plese refresh to see chnages');
	// 								if(data.status == 'failed'){
	// 									console.log("sdfd sf");
	// 									$('#cnt_lead_process').bootstrapSwitch('toggleState', false);
	// 								}
	// 							}
	// 						});
	// 					}else{
	// 						alert("Please enter password");
	// 						return false;
	// 					}
	// 				}
	// 			},
	// 			danger: {
	// 				label: "Cancel",
	// 				className: "btn-danger",
	// 				callback: function() {

	// 				}
	// 			}
	// 		}
	// 	});






	// });




		var cb = function(start, end, label) {
			//console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

			$("#s_d_range").val( start.format('YYYY-MM-DD') );
			$("#e_d_range").val( end.format('YYYY-MM-DD') );
		}

	 	var optionSet1 = {
	        startDate: '<?php echo date("m/d/Y",strtotime("now")); ?>',
	       	endDate: '<?php echo date("m/d/Y",strtotime("now")); ?>',
	        minDate: '01/01/2000',
	        maxDate: '12/31/<?php echo date('Y'); ?>',
	        "dateLimit": {
		        "days": 30
		    },
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





		//Add Custom Tab
		$("#add_custom_tab").click(function(){

			if( $("#CrmgroupTabName").val() == ''){
				alert("Please enter name");
				$("#CrmgroupTabName").focus();
				return false;
			}
			if( $("#CrmgroupTabSource").val() == ''){
				alert("Please select source");
				$("#CrmgroupTabSource").focus();
				return false;
			}

			$.ajax({
				type: "post",
				cache: false,
				dataType: 'json',
				data: {'name': $("#CrmgroupTabName").val(),'source' : $("#CrmgroupTabSource").val(), 'remove_source_all_weblead' : $("#CrmgroupTabRemoveSourceAllWeblead").is(":checked")  },
				url:  "/crmgroup/save_save_custom_tab",
				success: function(data){
					location.href = "/crmgroup/main";
				}
			});
		});


		//Delete custom tab
		$(document).on("click",".btn-delete-custom-tab",function() {

			if(confirm("Do you want to remove the tab?")){
				$.ajax({
					type: "post",
					cache: false,
					data: {'custom_tab_id': $(this).attr("custom_tab_id") },
					url:  "/crmgroup/remove_custom_tab",
					success: function(data){
						location.href = "/crmgroup/main";
					}
				});
			}
		});



		//Custom Tab Data
		<?php
		if(!empty($crmgroupTabs)){
			foreach ($crmgroupTabs as $crmgroupTab) {
		?>
		$('#btn-tab-custom-<?php echo $crmgroupTab['CrmgroupTab']['id']; ?>').click(function(){

			$.ajax({
				type: "GET",
				cache: false,
				data : {'custom_tab_id' : '<?php echo $crmgroupTab['CrmgroupTab']['id']; ?>'},
				url: "/crmgroup/custom_tab_data",
				success: function(data){
					$("#custom_tab_content_<?php echo $crmgroupTab['CrmgroupTab']['id']; ?>").html(data);
				}
			});

		});

		<?php } } ?>


















	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});
</script>
