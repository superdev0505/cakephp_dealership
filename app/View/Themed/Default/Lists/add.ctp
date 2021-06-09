<!-- Widget -->
<div class="" >

	<?php echo $this->Session->flash('flash'); ?> 
	<?php echo $this->Form->create('List', array('type'=>'post', 'autocomplete'=>"off", 'class' => 'form-inline apply-nolazy')); ?>

	<div class="widget-body">
		<div class="innerB">
			<div class="row">
				<div class="col-xs-12">
					<?php echo $this->Form->label('list_name','List Name:'); ?>
					<?php echo $this->Form->input('list_name', array( 'required' => 'required', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
					<div class="separator"></div>
				</div>
			</div>

		</div>

		
		
		<div class="innerB">
			<div class="row">
				<div class="col-md-12 text-right">
					<button type="submit" id="btn_save_list" class="btn btn-success" >Save</button>&nbsp;
					<button type="button" id="close_modal_dialog" class="btn btn-danger" >Cancel</button>
				</div>
			</div>
			
		</div>
		
	</div>

	<?php $this->Form->end(); ?>	
</div>

 <script>
$(function(){ 
		
	$("#btn_save_list").click(function(event){
		event.preventDefault();
		if( $("#ListListName").val() == ''){
			$("#MakeShortName").focus();
			alert('Please enter list name');
			return false;
		}
		
		
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
	 	location.href = "/recipients/add?key=<?php echo $list_id; ?>"
	<?php } ?>
	
	
	
});

</script>
