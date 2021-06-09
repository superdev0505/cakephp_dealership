<?php echo $this->Form->create('Support', array( 'class' => 'form-inline apply-nolazy', 'role'=>"form")); ?>
	
	
	<div style="margin-top: 10px">
				
		
		<div class="row">
			<div class="col-md-3">
				<?php echo $this->Form->label('category','Type:'); ?>
				<?php echo $this->Form->input('category', array('type' => 'select', 'options' => $d_type_options, 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
				<div class="separator"></div>
			</div>
			<div class="col-md-3">
				<?php echo $this->Form->label('type','Category:'); ?>
				<?php echo $this->Form->input('type', array('type' => 'select',  'options'=>$body_type, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
			</div>
			<div class="col-md-3">
				<?php echo $this->Form->label('make','Make:'); ?>
				<?php echo $this->Form->input('make', array('type' => 'text',   'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>
				<div class="separator"></div>
			</div>
			<div class="col-md-3">
				<?php echo $this->Form->label('year','Year:'); ?><br />
				<?php echo $this->Form->input('year', array('type' => 'select', 'options'=>$year_opt,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>
				<div class="separator"></div>
			</div>
			<div class="col-md-3">
				<?php echo $this->Form->label('model','Model:'); ?>
				<?php echo $this->Form->input('model', array('type' => 'text',   'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>
				<div class="separator"></div>
			</div>
			<div class="col-md-12 text-right">
				<div class="separator"></div>
				<button type="button" id="btn_submit_support" class="btn btn-success" >Submit</button>&nbsp;
				<button type="button" id="close_modal_dialog" class="btn btn-danger" >Cancel</button>
			</div>
		</div>	

		
			
		
		
	
		
		
	</div>

<?php echo $this->Form->end(); ?> 


<?php 
//debug( $messages );
//echo $this->element('sql_dump'); 
?> 

<script>

$(function(){

	//inventory model		
	$.inventory({
		input_type: "#SupportCategory", 
		input_category:"#SupportType",
		
	});



	$("#close_modal_dialog").click(function(event){
		event.preventDefault();
		bootbox.hideAll();
	});
	
	$("#btn_submit_support").click(function(event){
		event.preventDefault();
		if( $("#SupportMake").val() == ''){
			alert('Please select enter make');
			return true;
		}
		
		if( $("#SupportYear").val() == ''){
			alert('Please select year');
			return true;
		}
		
		$(this).attr('disabled', true);
		$(this).html('Sending...');
		
				
		
		$.ajax({
			type: "POST",
			data: $("#SupportAddMakeForm").serialize(),
			url: $("#SupportAddMakeForm").attr('action'),
			success: function(data){
				bootbox.hideAll();
			}
		});
		
	});
	

	
});



</script>







