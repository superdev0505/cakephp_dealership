<?php echo $this->Form->create('Contact', array('type'=>'post','class' => 'form-inline apply-nolazy', 'role'=>"form")); ?>
	
	<?php echo $this->Form->input('id', array('type' => 'hidden','value'=>$contact['Contact']['id'])); ?>

	<div class="row">

		<div class="col-md-12" > 
			<span id='<?php echo $contact['Contact']['id']; ?>_lead_full_name'><?php echo $contact['Contact']['first_name'] . "&nbsp;" . $contact['Contact']['last_name'];  ?></span>

			<div class="separator"></div>
		</div>

		<div class="col-md-12" > 
			<font color="red">*</font>
			<?php echo $this->Form->label('notes','Notes:'); ?>
			<?php echo $this->Form->input('notes', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
			<div class="separator"></div>
		</div>

		<div class='row'>
			<div class="col-md-12 text-right">
				<div class="separator"></div>
				<button type="button" id="btn_submit_update" class="btn btn-success" >Submit</button>&nbsp;
				<button type="button" id="close_modal_dialog" class="btn btn-danger" >Cancel</button>
			</div>
		</div>	

	</div>

<?php echo $this->Form->end(); ?> 

<script>
$(function(){

	$("#close_modal_dialog").click(function(event){
		event.preventDefault();
		bootbox.hideAll();
	});

	$("#btn_submit_update").click(function(event){
		event.preventDefault();


		if(  $("#ContactNotes").val() == ''){

			$("#ContactNotes").focus();	
			alert('You must enter Notes');
			return true;
		}

		$.ajax({
			type: "POST",
			data: $("#ContactRemoveBadForm").serialize(),
			url: $("#ContactRemoveBadForm").attr('action'),
			success: function(data){
				//$(".bootbox-body").html(data);
				//console.log(data);
				location.href = "/contacts/leads_main?search_source=left_menu";

			}
		});



	});



});



</script>