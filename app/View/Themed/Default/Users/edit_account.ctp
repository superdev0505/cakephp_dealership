<!-- Widget -->
<?php
//debug($this->request->query['returl']);
//debug( html_entity_decode($this->request->query['returl']) );

?>

<div class="widget widget-heading-simple widget-body-white" >

	<?php echo $this->Session->flash('flash'); ?>

<?php echo $this->Form->create('User', array('type'=>'post', 'autocomplete'=>"off", 'class' => 'form-inline apply-nolazy')); ?>
	<div class="widget-body">
		<div class="innerB">
			<div class="row">
				<div class="col-xs-12">
					 <strong>Welcome first time visitor! Please take a moment to set your CRM Password</strong>
					<div class="separator"></div>
				</div>
			</div>
			<div class="row">
				<!--<div class="col-xs-4">
					<?php //echo $this->Form->label('email','Email:'); ?>
					<?php //echo $this->Form->input('email', array(  'required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>-->
				<div class="col-xs-4">
					<?php echo $this->Form->label('password','New Password:'); ?>
					<?php echo $this->Form->input('password', array('required' => 'required','label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>

			</div>
		</div>

		<div class="innerB">
			<div class="row">
				<div class="col-md-12 text-right">
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

		$.ajax({
			type: "POST",
			url:  $(this).closest('form').attr('action'),
			data: $(this).closest('form').serialize(),
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
