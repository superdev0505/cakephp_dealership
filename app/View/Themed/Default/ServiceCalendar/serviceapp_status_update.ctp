<?php echo $this->Form->create('ServiceLead', array('type'=>'post','class' => 'form-inline apply-nolazy', 'role'=>"form")); ?>
	
	<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
	<?php echo $this->Form->input('current_status', array('type' => 'hidden','value'=>$contact_info['Contact']['status'])); ?>
	
	<div style="">
				
		
		<div class="row">
			
			
			
			<div class="col-md-3">
				<?php echo $this->Form->label('Status','Status:'); ?>
				<?php echo $this->Form->select('status', $sopt, array('empty' => 'Select', 'required' => 'required', 'class' => 'form-control','label'=>'false' ,'style'=>'width: 100%')); ?>
				
				<?php if($update_type == 'Email Update (All)' && !empty($smtp_settings) && $email_settings == 'On' ){	 ?>
				
				<?php }else{ ?>
					<div class="separator"></div>
				<?php } ?>

			</div>
			


		


			<div class="col-md-12" id='notes_container'> 
				<font color="red">*</font>
				<?php echo $this->Form->label('notes','Notes:'); ?>
				<?php echo $this->Form->input('notes', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
				<div class="separator"></div>
			</div>

			
			<?php /*?><div class="col-md-6"> 
				<?php 
				echo $this->Form->label('dnc_status','DNC Status: &nbsp;'); 
				echo $this->Form->input('dnc_status',array('options'=>$DncStatusOptions,
					'class'=>'form-control',
					'empty'=>'Select','required'=>'required'
					));
				?>
				<div class="separator"></div>
			</div><?php */?>
			
		
		</div>
		<div class='row'>	
			
			
			
			
			

		
		
		</div>
		
		
		
		
		<div class='row'>
			<div class="col-md-12 text-right">
				<div class="separator"></div>
				<button type="button" id="btn_submit_update" class="btn btn-success" >Submit</button>&nbsp;
				<?php
				/* Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required */ ?>
				
				<button type="button" id="close_modal_dialog" class="btn btn-danger" >Cancel</button>
				
			</div>
		</div>	
		
	</div>



<?php echo $this->Form->end(); ?> 


<?php 
//debug( $this->request->data );
//echo $this->element('sql_dump'); 
?> 

<script>


function ShowEmailPreview(){

	$.ajax({
		type: "POST",
		url: "/user_emails/email_preview_contact",
		data: {'contact_id':"<?php echo $this->request->params['pass'][0];  ?>",'message':CKEDITOR.instances["TemplateTemplateHtml"].getData()},
		success: function(data){
			
			bootbox.dialog({
				message: data,
				backdrop: true,
				title: "Email Preview",
			}).find("div.modal-dialog").addClass("largeWidth");
		}
	});

}

$(function(){

	
		$("#email_container").hide();	
		$("#notes_container").show();
		



	$("#NeweventEventTypeId").change(function(){
		if( $(this).val() != ""){
			$("#NeweventTitle").val(  $("#NeweventEventTypeId option[value='"+$(this).val()+"']").text()  );
		}
	});

	<?php if(empty($appointment)){ ?>
		$("#popup_new_event").hide();
		$("#NeweventCreate").val('no');

		$("#btn-set-newevent").click(function(){
			$("#popup_new_event").toggle();

			if(  $('#popup_new_event').is(':hidden') == false ){
				$("#NeweventCreate").val('yes');
				$(this).html('Hide New Event');
			}else{
				$("#NeweventCreate").val('no');
				$(this).html('Cancel New Event');
			}
		});
		
	<?php }else{ ?>

	$("#btn-set-newevent").hide();
	
	<?php } ?>

	/*
	$("#EventStatus").change(function(event){
		if($(this).val() == 'Completed' || $(this).val() == 'Canceled'){
			$("#popup_new_event").show();
			$("#NeweventCreate").val('yes');
		}else{
			$("#popup_new_event").hide();
			$("#NeweventCreate").val('no');	
		}
	});
	*/
	
	$("#close_modal_dialog").click(function(event){
		event.preventDefault();
		bootbox.hideAll();
	});

	$("input[name='event_confirm']").change(function () {

		$("#EventEditevent").val('yes');	
		
	    if($(this).val() == 'complete'  ){
		    
	    	$("#new_event_form").hide();
	    	$("#EventStatus").val('Completed');
	    	
	    	$("#popup_new_event").hide();
			$("#NeweventCreate").val('no');
			
	    }else if($(this).val() == 'Leave'  ){
		    
	    	$("#new_event_form").show();
	    	
	    	$("#popup_new_event").hide();
			$("#NeweventCreate").val('no');
			
	    }else if($(this).val() == 'cancel'  ){
		    
	    	$("#new_event_form").show();
	    	$("#EventStatus").val('Canceled');
	    	
	    	$("#popup_new_event").hide();
			$("#NeweventCreate").val('no');
			
	    }else if($(this).val() == 'close_reschedule'  ){
		    
	    	$("#new_event_form").hide();
	    	$("#EventStatus").val('Completed');
	    	
	    	$("#popup_new_event").show();
			$("#NeweventCreate").val('yes');
	    }
	});
	
	$("#btn_submit_update").click(function(event){
		event.preventDefault();
		
		
		if( $("#ServiceLeadStatus").val() == ''){
			$("#ServiceLeadStatus").focus();
			alert('Please select status');
			return true;
		}else if($("#ServiceLeadStatus").val() == $("#ServiceLeadCurrentStatus").val()){
			$("#ServiceLeadStatus").focus();
			alert('Please change Status on edit of lead');
			return true;
		}
		

		
				

		
			if(  $("#ServiceLeadNotes").val() == ''){

				$("#ServiceLeadNotes").focus();	
				alert('You must enter Notes');
				return true;
			}






		//Event validation
		
		//Validation for new event	
		
		
		$(this).attr('disabled', true);
		$(this).html('Updating...');
		
		$.ajax({
			type: "POST",
			data: $("#ServiceLeadServiceappStatusUpdateForm").serialize(),
			url: $("#ServiceLeadServiceappStatusUpdateForm").attr('action'),
			success: function(data){

				

				<?php
				// Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required 
				
				?>
					location.href = "<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'main'));?>";
					//$(".bootbox-body").html(data);
					//bootbox.hideAll();
				

				


			}
		});
		
	});


	/*Events*/

});



</script>







