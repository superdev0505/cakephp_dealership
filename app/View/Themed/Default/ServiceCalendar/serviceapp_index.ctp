
<?php
//echo $this->Html->script('jquery.noty.packaged.min',array('inline' => true));
 $slot_height=array('15'=>'45','30'=>'70','60'=>'100'); ?>
<br />
<br />
<br />
<br />
<style>
.booked_hours{
	padding-top:10px;
	padding-bottom:10px;
}
.noty_message .noty_text{font-size:15px!important;}
.noty_message .noty_text li{margin-bottom:5px;}
div.fc-day-number{cursor: pointer;text-decoration: underline;color: #4193d0;font-weight: bold;}
</style>
<style type="text/css">
    .fc-agenda-slots td div {
         height: <?php echo $slot_height[empty($service_timings['ServiceSetting']['time_slots'])?30:$service_timings['ServiceSetting']['time_slots']]; ?>px !important;
         
    }  
.my_custom_class{
  margin: 0 0 5px;
  padding: 5px 5px 5px 33px;
  display: block;
  background: #3695d5;
  color: #fff;
  text-shadow: 0 1px 0 rgba(0,0,0,0.5);
  font-size: .85em;
  height: 26px;
  line-height: 16px;
  cursor: pointer;
  -webkit-border-radius: 3px 3px 3px 3px;
  -moz-border-radius: 3px 3px 3px 3px;
  border-radius: 3px 3px 3px 3px; 
  text-decoration: none;
  vertical-align: middle;
}
    
</style>

<?php echo $this->Session->flash(); ?>
<?php
$zone = AuthComponent::user('zone');
date_default_timezone_set($zone);
$x = AuthComponent::user('full_name');
?>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<?php /*?><div style='display:none' id="feed_type" ><?php if(isset($this->request->query['type'])){ echo $this->request->query['type'] ; } ?></div>
	<div style='display:none' id="stat_type"><?php if(isset($this->request->query['stat_type'])){ echo $this->request->query['stat_type'] ; } ?></div><?php */?>
    
    <div class="clearfix"></div>
    
    
	
	<!-- Widget -->
	<div class="wizard12">
	
		<div class="widget widget-heading-simple widget-body-white widget-employees">
			<div class="widget-body padding-none">
				
				<div class="row row-merge">
								
					<!-- <button type="button" id="open_test_modal">Test Modal</button> -->
					
						
					
					<div class="col-md-12 col-lg-12 detailsWrapper">
						<div class="ajax-loading hide">
							<i class="icon-spinner icon-spin icon-4x"></i>
						</div>
						<div class="innerAll">
                        <div class="col-md-12 center" id="tech_list_dropdown" style="display:none;"><span style="margin-left:5px;">&nbsp;<strong>Switch Tech:</strong><?php echo $this->Form->input('service_tech_id',array('type' =>'select','div' => false,'label' => false,'options' => $service_guys,'id' =>'#####','name' =>'service_tech_id','style' =>'margin-left:5px;')); ?>&nbsp;<i class="fa fa-user"></i></span></div>
							<div data-component>
								<div id="calendar" class = "col-md-12 col-lg-12 col-sm-12" ></div>
							</div>
                            
                             <div class="col-md-12">
                        <div class="separator"></div>
                       <div class="panel panel-primary">
                        <div class="panel-heading"><h3>Status Colors </h3></div>
                        <div class="panel-body">
						<?php 
						$color_array= $this->App->get_service_status_color();
						foreach($event_statuses as $e_status){
							echo '<div class="col-md-2"><label><span style="padding:3px 8px;background-color:'.$e_status['ServiceEventStatus']['color_code'].'" >&nbsp;</span>&nbsp;'.$e_status['ServiceEventStatus']['name'].' </label></div>';
						
						}
						echo '<div class="col-md-2"><label><span style="padding:3px 8px;background-color:red" >&nbsp;</span>&nbsp;Lunch/Overdue Appt </label></div>';
						?> 
                        </div>                       
                        </div>
                        </div>
                        
                        
						</div>
                        
                       
					</div>
                
				</div>
				
			</div>
		</div>
	
	</div>
<!-- // Widget END -->	
	
	
	
	
	
	
</div>

<?php // Search Modal For contact leads ?>
<div class="modal fade" id="modal-2">
	
	<div class="modal-dialog modal900" >
		<div class="modal-content">

			<?php echo $this->Form->create('Contact', array('type'=>'GET','id'=>'ContactLeadsForm2','class' => 'form-inline no-ajaxify')); ?>
			<!-- Modal body -->
			<div class="modal-body">
				
				<div>
					 
					 
					 
					 <center>
					 
					 	
						<div class="checkbox" style="display: inline-block; margin-top: 0;"> 
							<label class="checkbox-custom" > 
								<input type="checkbox" checked="checked" id="ContactSearchBroad"   class="chk_lead_src_type" name="checkbox_status_broad" value="broad" >
								<i class="fa fa-fw fa-square-o"></i> Contains Word Search
							</label> 
						</div>
						&nbsp; &nbsp; &nbsp;
						 <div class="checkbox" style="display: inline-block; margin-top: 0;"> 
							<label class="checkbox-custom" > 
								<input type="checkbox" id="ContactSearchExact"   class="chk_lead_src_type" name="checkbox_status_exact" value="exact" >
								<i class="fa fa-fw fa-square-o"></i> Starts With Word Search
							</label> 
						</div> 
					
						 
					</center>
					 <div class="separator"></div>
				</div>
			
				<!--<div class="row">
				
					<div class="col-md-12 text-center">
						Quick Search (All): <?php						
						echo $this->Form->input('nsearch_quick', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'style' => 'width: auto',
						'placeholder' => 'Quick Search'), array('div' => false));
						?>	
						<div class="separator"></div>	
					</div>
				
				</div>
				-->
				
				<div class="row">
	
					

					<!-- <div class="col-md-4 col-md-offset-2">
						<?php						
						echo $this->Form->input('nsearch_mobile', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'Mobile Phone'), array('div' => false));
						?>
						<div class="separator"></div>		
					</div> -->
					
					<div class="col-md-5 col-md-offset-1">
					
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone"></i></span>
							<?php						
							echo $this->Form->input('nsearch_phone', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => '(ALL) Phone - Mobile, Home, Work'), array('div' => false));
							?>
						</div>
						<div class="separator"></div>	
							
					</div>
					
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<?php						
							echo $this->Form->input('nsearch_email', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => 'Email'), array('div' => false));
							?>
						</div>		
						<div class="separator"></div>					
					</div>
					
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<?php						
						echo $this->Form->input('nsearch_first_name', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'First Name - Company, Spouse'), array('div' => false));
						?>
						<div class="separator"></div>		
					</div>
					<div class="col-md-6">
						<?php						
						echo $this->Form->input('nsearch_last_name', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'Last Name'), array('div' => false));
						?>
						<div class="separator"></div>						
					</div>
					
				</div>	
							
				
				
			<div class="row">
					<div class="col-md-6 col-md-offset-1"> 
						<?php
						echo $this->Form->input('nsearch_vin', array('type' => 'text','placeholder'=>'VIN','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
						?>
						<div class="separator"></div>
					</div>
					<div class="col-md-2"> 
						<?php echo $this->Form->input('nsearch_stock_num', array(
						'type' => 'text',
						'placeholder' =>'Stock#',
						'label'=>false,'div'=>false,
						'class' => 'form-control'
						));
						?>
						<div class="separator"></div>
					</div>


					
				<input type="text" id="AppointmentResourceId" style="display:none;" />
                <input type="text" id="AppointmentStartTime" style="display:none;" />
                <input type="text" id="AppointmentTechName" style="display:none;" />


				</div>
				
				
				
				
				
				
				
				<div class="row">
					
				</div>
				
			</div>
			<div class="modal-footer center margin-none">


				<div class="row">
					<div class="col-md-4 text-left">
						<a href="#" class="btn btn-danger" id="close_modal" data-dismiss="modal">Cancel</a>
                        <a href="#" class="btn btn-info" id="add_tech_break">Add Break</a>
					</div>
					<div class="col-md-5">
						<div id='new_search_cnt_alert'  style='display: none; margin-top: 9px; font-size: 13px; color: #fff;padding: 3px; margin-bottom: 10px;'></div>	
						<span class='label label-info label-inverse' id='new_search_cnt' style='display: none; margin-top: 9px; font-size: 13px;'></span>
                        <span class='label label-danger' id='string_count_message' style='display: none; margin-top: 9px; font-size: 13px;'>Please enter atleast 3 characters in the input field to search </span>
					</div>
					<div class="col-md-3">
						<a id="submit_new_lead_search" disabled="disabled" href="<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'search_contact_result','serviceapp' => true)); ?>" class="btn btn-success pull-right no-ajaxify contact_lead"> Start Appointment </a>
					</div>
				</div>

				<!-- shoppers start	  -->
				<div class='row' id='result_shoppers' style='display: none'>
				</div>
				<!-- shoppers ends  -->


			</div>
			<?php echo $this->Form->end(); ?>
			
		</div>
	</div>
	
</div>
<?php /// ?>

<script>
var calendarStartTime='<?php echo $service_timings['ServiceSetting']['start']; ?>';
var calendarEndTime='<?php echo $service_timings['ServiceSetting']['end']; ?>';
var calendarTimeSlot=<?php echo empty($service_timings['ServiceSetting']['time_slots'])?30:$service_timings['ServiceSetting']['time_slots']; ?>;
var allTechArray = <?php echo json_encode($service_guys); ?>;
var is_value_searched = false;
/*var calendarTimeSlot= { days:00, hours:00, minutes:15 } ;

*/
var $resource_list = <?php echo json_encode($service_tech_array); ?>;
function refresh_list(url)
{ 
	$.ajax({
			type: "GET",
			cache: false,
			url:  url,
			success: function(data){
			$("#event_list_content").html(data);
						}
					});
}


$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$("#open_test_modal").on('click',function(e){
			$.ajax({
				type: "GET",
				cache: false,
				url: "/serviceapp/ServiceCalendar/add/contact_id:1442373/user_id:/start_date:2015-12-19%207:10:00?checkbox_status_broad=broad&nsearch_phone=&nsearch_email=&nsearch_first_name=&nsearch_last_name=&nsearch_vin=&nsearch_stock_num=&_=1447946443927",
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Edit User",
					});
				}
			});

		});
	
	<?php if($show_change_password == true){ ?>
		
			
			$.ajax({
				type: "GET",
				cache: false,
				url: "<?php echo $this->Html->url(array('controller' => 'users','action' => 'edit_account')); ?>",
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Edit User",
					});
				}
			});
		
		<?php } ?>
	
	$("#add_tech_break").on('click',function(e){
			e.preventDefault();
			$("#modal-2").modal('hide');
			$start_time = $("#AppointmentStartTime").val();
			$user_id =   $("#AppointmentResourceId").val();
			$url = '<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'add_break','serviceapp' => true)); ?>/start_date:'+$start_time+'/user_id:'+$user_id;
			$.ajax({
				type: "GET",
				cache: false,
				url:  $url,
				success: function(data){					
					bootbox.dialog({
						message: data,
						closeButton: false,
						title: 'Add Break',
						 buttons: {
							 "Cancel": {
							className: "btn-danger",
							callback: function() {
								bootbox.hideAll();
								//$('#calendar').fullCalendar('removeEvents','temporaryEvent');
								}
									},
								},
					});
				},
			}); 
			
		
		});
	
	
	$("body").on('change','select#AllTechList',function(){
		tech_id = $(this).val();
		$.ajax({
			type : 'GET',
			url:'<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'set_service_tech','serviceapp' => true)); ?>/'+tech_id,
			async:true,
			success: function(data){
					start_date = $('#calendar').fullCalendar('getView').start;
					end_date = $('#calendar').fullCalendar('getView').end;
					$('#calendar').fullCalendar( 'render' );
					
					}
			});
			
			tech_name=allTechArray[tech_id];
			if(!tech_name){
				tech_name = 'All Tech';
			}
			$(".fc-button.fc-button-agendaWeek").text(tech_name+ " - Week");
		
		});
		
	// Add 	
		
	$("body").on('click','a.delete_service_appointment',function(e){
		e.preventDefault();
		if(confirm('Are you sure you want to delete this appointment?')){
		data_id = $(this).attr('data-id');
		 //$(this).parent().parent().parent().qtip('destroy');
		 $.ajax({
			type : 'GET',
			url:'<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'delete_service_appointment','serviceapp' => true)); ?>/'+data_id,
			async:true,
			success: function(data){
					$('#calendar').fullCalendar('render');
					
					}
			});
		}
		
		});	
		
		
		$("body").on('click','a.delete_tech_break',function(e){
		e.preventDefault();
		if(confirm('Are you sure you want to delete this break time?')){
		data_id = $(this).attr('data-id');
		 //$(this).parent().parent().parent().qtip('destroy');
		 $.ajax({
			type : 'GET',
			url:'<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'serviceapp_delete_break','serviceapp' => true)); ?>/'+data_id,
			async:true,
			success: function(data){
					$('#calendar').fullCalendar('render');
					
					}
			});
		}
		
		});		
	
	$('body').on('click','a.contact_lead',function(e){
		e.preventDefault();
		if(is_value_searched){
		
		$("#submit_new_lead_search").attr('disabled','disabled');
		is_value_searched = false;	
		url = $(this).attr('href');
		$("#result_shoppers").html("");
		$("#result_shoppers").hide();
		$("#new_search_cnt").html("");
		$("#new_search_cnt").hide();
		$boot_title= ''; 
		$("#modal-2").modal('hide');
		$("#AppointmentResourceId").val('');
		$("#AppointmentTechName").val('');
		$("#AppointmentStartTime").val('');
		if($(this).attr('data-user'))
		{
			$boot_title = '(Tech : '+$(this).attr('data-user')+')';
		}
		$.ajax({
				type: "GET",
				cache: false,
				url:  url,
				data:$("#ContactLeadsForm2").serialize(),
				success: function(data){
					
					bootbox.dialog({
						message: data,
						closeButton: false,
						title: 'Service Appointment'+$boot_title,
						 buttons: {
							 "Cancel": {
							className: "btn-danger",
							callback: function() {
								bootbox.hideAll();
								//$('#calendar').fullCalendar('removeEvents','temporaryEvent');
								}
									},
								},
					});
					$("#ContactLeadsForm2")[0].reset();
				},
			}); 
		
		}else{
			alert('Please use the Search field to find the customer . If you do not find the customer through search then click on Start Appointment.');
		}
		});
		
	$('#external-events ul li').each(function() 
	{
	
		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};
		
		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);
		
		// make the event draggable using jQuery UI
		$(this).draggable(
		{
			zIndex: 999,
			revert: true, // will cause the event to go back to its
			appendTo: 'body',
			containment: 'window',
			scroll: false,
			//helper: 'clone',
			helper: function(){
              	$copy = $(this).clone();
				$copy .addClass('my_custom_class');
                return $copy;},
  			appendTo: 'body',
			revertDuration: 0,  //  original position after the drag,
			start: function() { if (typeof mainYScroller != 'undefined') mainYScroller.disable(); },
	        stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
		});
		
	});
		
		$(".alert").delay(3000).fadeOut("slow");
		url='<?php echo $this->Html->url(array('controller'=>'ServiceCalendar','action'=>'feed')); ?>';
		show_calendar(url);
		
		
		$("#EventEventTypeId").change(function(){
			if( $(this).val() != ""){
				$("#EventTitle").val(  $("#EventEventTypeId option[value='"+$(this).val()+"']").text()  );
			}
		});
		
		
		$("ul#list_event_search_result,  ul#list_event_search_result1, ul#list_event_search_result2").on('click', 'li', function() {
			
			edit_page = "/serviceapp/service_calendar/edit/" +  $(this).attr('event_row_id');
			//location.href = edit_page;
			
			$.ajax({
				type: "GET",
				cache: false,
				url:  edit_page,
				success: function(data){
					
					bootbox.dialog({
						message: data,
						title: "Edit Event",
					});
				}
			});
			
			
		});
		
		$("#ServiceEventStartDate").bdatepicker({
			format: 'yyyy-mm-dd',
		//	startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#ServiceEventEndDate').bdatepicker('setStartDate', startDate);
			 $(this).bdatepicker('hide');
		});
		
		$("#ServiceEventEndDate").bdatepicker({
			format: 'yyyy-mm-dd',
		//	startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#ServiceEventStartDate').bdatepicker('setEndDate', FromEndDate);
			 $(this).bdatepicker('hide');
		});
		

		$('#ServiceEventStartTime').timepicker();
		$('#ServiceEventEndTime').timepicker();
		$("#service_bay").on('change',function(){
			bay_id=$(this).val();
			$url='<?php echo $this->Html->url(array('controller'=>'ServiceCalendar','action'=>'feed')); ?>/'+bay_id;
			$("#calendar").html('');
			show_calendar($url,bay_id);
			url2='<?php echo $this->Html->url(array('controller'=>'ServiceCalendar','action'=>'event_list')); ?>/'+bay_id;
			refresh_list(url2);
			
			});
		$('#ContactNsearchPhone, #ContactNsearchEmail, #ContactNsearchFirstName, #ContactNsearchLastName,#ContactNsearchVin,#ContactNsearchStockNum').bind('input keyup', function(){
	    var $this = $(this);
		var input_val = $.trim($this.val());
		var delay = 1000;
		if(input_val.length >= 3){
			is_value_searched = true;
			 // 2 seconds delay after last input
			$("#string_count_message").hide();
			clearTimeout($this.data('timer'));
			$this.data('timer', setTimeout(function(){
				search_contact_lead();
			}, delay));
		}else
		{
			clearTimeout($this.data('timer'));
			$this.data('timer', setTimeout(function(){
				$("#string_count_message").show();
			}, delay));
			
		}
	});	
	
	$('body').on('click','a.main-search-switch-btn',function(e){
			e.preventDefault();
			div_show= $(this).attr('data-id');
			div_hide= $(this).attr('data-hide');
			show_text= $(this).attr('data-text');
			hide_text = $(this).text();
			$('#'+div_show).detach().insertBefore('#'+$(this).attr('data-first'));
			 $(this).text(show_text);
			$(this).attr('data-id',div_hide);
			$(this).attr('data-hide',div_show);
			$(this).attr('data-text',hide_text);
			$(".main-search-switch-btn").attr('data-first',div_show)
			
		});
	
	$("#ContactSearchBroad").checkbox('check');
		
		$(".chk_lead_src_type").click(function(event){
			$(".chk_lead_src_type").checkbox('uncheck');
			$(this).checkbox('check');
			if(is_value_searched){
				search_contact_lead();
			}
		});
	<?php if(!empty($this->request->params['named']['appt_date'])){ ?>
	setTimeout(function(){
		$('#calendar').fullCalendar('changeView','resourceDay');
		$("#calendar").fullCalendar('gotoDate','<?php echo $this->request->params['named']['appt_date']; ?>');
		},300);
	<?php }?>
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

function search_contact_lead(){
	
		$("#new_search_cnt").show();
		$("#new_search_cnt").html("Loading...");
		$resourceID = $("#AppointmentResourceId").val();
		$startTime = $("#AppointmentStartTime").val();
		$techName = $("#AppointmentTechName").val();	
		var search_type = (  $("#ContactSearchExact").is(":checked") )? 'exact' : 'broad';
		var search_url = "<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'search_contact_result','serviceapp' => true)); ?>";
		 if($("#ContactNsearchEmail").val().trim() != '' ||     
				$("#ContactNsearchPhone").val().trim() != '' || 
				$("#ContactNsearchFirstName").val().trim() != '' || 
				$("#ContactNsearchLastName").val().trim() != '' || 
				$("#ContactNsearchVin").val().trim() != ''  ||
				$("#ContactNsearchStockNum").val().trim() != '')
				{
					$.ajax({
					type: "GET",
					cache: false,
					data: {'search_type': search_type, 
					email: $("#ContactNsearchEmail").val().trim(),    
					phone: $("#ContactNsearchPhone").val().trim(), first_name:$("#ContactNsearchFirstName").val().trim(), last_name : $("#ContactNsearchLastName").val().trim(),	
					vin: $("#ContactNsearchVin").val().trim(),
					stock_num: $("#ContactNsearchStockNum").val().trim()
					},
					url:  search_url,
					dataType: "json",
					success: function(data){
						$("#submit_new_lead_search").removeAttr('disabled');
						if(data.result == '0'){
							$("#new_search_cnt").html("0 - Lead found, Submit will start a new lead");
							$("#result_shoppers").html("");
						}else{
							$("#new_search_cnt").html(data.result+" - Lead Found");
						}
						if(data.shoppers &&  data.shoppers.length > 0){
							$("#result_shoppers").show();
							$("#result_shoppers").html("");
							$switch_btn = '';
							if(data.lightspeed_search && data.lightspeed_search.length > 0)
							{
								$switch_btn += '<a href="javascript:void(0)" style="margin-top:5px;" class="btn btn-primary main-search-switch-btn pull-right" data-first="other-location-result" data-id="result_lightspeed_search" data-hide="other-location-result" data-text="'+data.shoppers.length+' CRM Leads found">'+data.lightspeed_search.length+' Lightspeed Contacts Found</a>';
							}
							
							var result_shoppers = $switch_btn +
							'<div class="col-md-12 text-left" id="other-location-result">  <br> <h4>Leads Found In CRM ('+data.shoppers.length+')</h4> <table class="dynamicTable tableTools table table-bordered checkboxs"  style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0"> \
							<thead> \
							<tr class="bg-inverse" > \
								<th>#</th> \
								<th>Name</th> \
								<th>Contact</th> \
								<th>Vehicle</th> \
								<th>Sperson</th> \
								<th>Modified</th> \
							</tr> \
							</thead> \
							<tbody>	';
							
							$.each( data.shoppers, function( key, value ) {
  								//alert( value.Contact.id );
  								result_shoppers += 
  								'<tr class="gradeA">' +
	  								'<td>'+value.Contact.id+'<br /><a class="btn btn-primary btn-xs no-ajaxify contact_lead" href="<?php echo $this->Html->url(array('controller' =>'ServiceCalendar','action' => 'add','serviceapp' => true)); ?>/contact_id:'+value.Contact.id+'/user_id:'+$resourceID+'/start_date:'+$startTime+'" data-user="'+$techName+'">Book Appointment</a>'+
							'</td>'+
	  								'<td>'+value.Contact.first_name+' '+value.Contact.last_name+'</td>'+
	  								'<td>Mobile: '+value.Contact.mobile+'<br>Phone: '+value.Contact.phone+'<br>Work:'+value.Contact.phone+'<br>Email: '+value.Contact.email+'</td>'+
	  								'<td>'+value.Contact.year+' '+value.Contact.make+' '+value.Contact.model+' '+value.Contact.stock_num+'</td>'+
	  								'<td>'+value.Contact.sperson+'</td>'+
	  								'<td>'+value.Contact.modified+'</td>'+
  								'</tr>'+

  								'<tr id="history_otherloc_'+value.Contact.id+'" class="gradeA" style="display: none;" >'+
									'<td colspan="8">'+
										'<div class="row">'+
											'<div class="col-md-12" id = "history_otherloc_container_'+value.Contact.id+'">&nbsp;</div>'+
										'</div>'+
									'</td>'+
								'</tr>'


  								;
							});
							result_shoppers +=  '</tbody></table> </div>';
							$("#result_shoppers").html(result_shoppers);	
							
						}
						if(data.lightspeed_search && data.lightspeed_search.length > 0)
						{
							$("#result_shoppers").show();
							if($("#result_shoppers").html()=='')
							{
								$("#result_shoppers").html('');
							}
							var result_lightspeed = 
							'<div class="col-md-12 text-left" id="result_lightspeed_search">  <br> <h4>Contacts Found In Lightspeed('+data.lightspeed_search.length+')</h4> <table class="dynamicTable tableTools table table-bordered checkboxs"  style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0"> \
							<thead> \
							<tr class="bg-inverse" > \
								<th>#</th> \
								<th>Name</th> \
								<th>Contact</th> \
								<th>Modified</th> \
								<th>Source</th> \
							</tr> \
							</thead> \
							<tbody>	';
							
							$.each( data.lightspeed_search, function( key, value ) {
  								//alert( value.Contact.id );
  								result_lightspeed += 
  								'<tr class="gradeA">' +
	  								'<td>'+value.AdpCustomer.id+'<br /><a class="btn btn-primary btn-xs no-ajaxify contact_lead" href="<?php echo $this->Html->url(array('controller' =>'ServiceCalendar','action' => 'add','serviceapp' => true)); ?>/adp_customer_id:'+value.AdpCustomer.id+'/user_id:'+$resourceID+'/start_date:'+$startTime+'" data-user="'+$techName+'">Book Appointment</a>'+	

	  								'</td>'+	  								
	  								'<td>'+value.AdpCustomer.first_name+' '+value.AdpCustomer.last_name+'</td>'+
	  								'<td>Mobile: '+value.AdpCustomer.mobile+'<br>Phone: '+value.AdpCustomer.phone+'<br>Work:'+value.AdpCustomer.phone+'<br>Email: '+value.AdpCustomer.email+'</td>'+  								
	  								'<td>'+value.AdpCustomer.modified+'</td>'+
									'<td>'+value.AdpCustomer.lead_source+'</td>'+
  								'</tr>';
							});
							result_lightspeed +=  '</tbody></table> </div>';
							$("#result_shoppers").append(result_lightspeed);
							$("#result_shoppers").show();				

						}			
						
					}
				

				});
			}
		}



</script>