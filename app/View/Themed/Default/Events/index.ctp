<br />
<br />
<br />
<br />
<?php
$zone = AuthComponent::user('zone');
date_default_timezone_set($zone);
$x = AuthComponent::user('full_name');
?>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<div style='display:none' id="feed_type" ><?php if(isset($this->request->query['type'])){ echo $this->request->query['type'] ; } ?></div>
	<div style='display:none' id="stat_type"><?php if(isset($this->request->query['stat_type'])){ echo $this->request->query['stat_type'] ; } ?></div>
	
	<!-- Widget -->
	<div class="wizard12">
	
		<div class="widget widget-heading-simple widget-body-white widget-employees">
			<div class="widget-body padding-none">
				
				<div class="row ">
					<div class="col-md-12 ">

						<div class="innerAll text-right">
							<?php echo $this->Form->input('employees_calendar', 
							array('empty'=>"All Employees", 'style'=>"width: auto; display: inline-block",
							 'class'=>'form-control', 'label'=>false,
							 'options'=>$employees)); ?>	
						</div>

					</div>

					
					<div class="col-md-12  detailsWrapper">
						<div class="ajax-loading hide">
							<i class="icon-spinner icon-spin icon-4x"></i>
						</div>
						<div class="innerAll">
							<div data-component>
								<div id="calendar"></div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	
	</div>
<!-- // Widget END -->	
	
	
	
	
	
	
</div>

<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
		$(".alert").delay(3000).fadeOut("slow");
		
		
		
		$("#EventEventTypeId").change(function(){
			if( $(this).val() != ""){
				$("#EventTitle").val(  $("#EventEventTypeId option[value='"+$(this).val()+"']").text()  );
			}
		});
		
		
		$("ul#list_event_search_result,  ul#list_event_search_result1").on('click', 'li', function() {
			
			edit_page = "/contacts/leads_main/view/" + $(this).attr('event_contact_id');
			location.href = edit_page;
			/*
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
			*/
			
		});
		
		$("#EventStartDate").bdatepicker({
			format: 'yyyy-mm-dd',
		//	startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#EventEndDate').bdatepicker('setStartDate', startDate);
			
		});
		
		$("#EventEndDate").bdatepicker({
			format: 'yyyy-mm-dd',
		//	startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#EventStartDate').bdatepicker('setEndDate', FromEndDate);
		});
		
		
		
			
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>