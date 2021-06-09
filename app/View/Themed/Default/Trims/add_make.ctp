<!-- Widget -->
<?php 
//debug($this->request->query['returl']);
//debug( html_entity_decode($this->request->query['returl']) ); 

?>

<div class="widget widget-heading-simple widget-body-white" >
<?php echo $this->Form->create('Make', array('type'=>'post', 'autocomplete'=>"off", 'class' => 'form-inline apply-nolazy')); ?>
	<div class="widget-body">
		<div class="innerB">
			<div class="row">
				<div class="col-xs-6">
					<?php echo $this->Form->label('short_name','Short Name:'); ?>
					<?php echo $this->Form->input('short_name', array('type' => 'text', 'required' => 'required', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
				<div class="col-xs-6">
					<?php echo $this->Form->label('pretty_mame','Pretty Name:'); ?>
					<?php echo $this->Form->input('pretty_mame', array('type' => 'text', 'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
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
			url:  $("#MakeAddMakeForm").attr('action'),
			data: $("#MakeAddMakeForm").serialize(),
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
		bootbox.hideAll();
	<?php } ?>
	
	
	
});

</script>
