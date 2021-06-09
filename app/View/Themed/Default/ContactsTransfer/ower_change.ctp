<?php if( $group == 9 ||  $group == 12){  ?>

<?php echo $this->Form->create('Contact', array( 'class' => 'form-inline apply-nolazy', 'role'=>"form")); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->hidden('contact_id', array('value'=>$contact['Contact']['id'])); ?>
		<font color="red">*</font>
		<?php echo $this->Form->label('user_id','Select sales person:', array('class'=>'strong')); ?>
		<?php
		echo $this->Form->select('user_id',$users , array(
		'empty' => 'Select',
		'required' => 'required',
		'selected' => '',
		'class' => 'form-control required_input' ,'style'=>'width: 100%'
		));
		?>
		<div class="separator"></div>
		<font color="red">*</font> <?php echo $this->Form->label('note','Note:'); ?>
		<?php echo $this->Form->textarea('note', array('class'=>'form-control required_input')); ?>
	</div>



	<div class="col-md-12 text-right">
		<div class="separator"></div>
		<button type="button" id="btn_submit_owner_change" class="btn btn-success" >Change Originator</button>&nbsp;
		<button type="button" id="close_modal_dialog" class="btn btn-danger" >Cancel</button>
	</div>
</div>
<?php echo $this->Form->end(); ?>

<script>
$(function(){


	$("#close_modal_dialog").click(function(event){
		event.preventDefault();
		bootbox.hideAll();
	});

	$("#btn_submit_owner_change").click(function(event){

		event.preventDefault();
		if( $("#ContactUserId").val() == ''){
			alert('Please select sales person');
			return true;
		}
		if( $("#ContactNote").val() == ''){
			alert('Please enter note');
			return true;
		}

		$.ajax({
			type: "POST",
			cache: false,
			url:  "/contacts_transfer/ower_change/<?php echo $contact['Contact']['id']; ?>",
			data: $("#ContactOwerChangeForm").serialize(),
			success: function(data){
				location.href = "/contacts/leads_main/view/<?php echo $contact['Contact']['id']; ?>";
			}
		});


	});

});

</script>



<?php }else{  ?>
You are not authorized to make this change
<?php }  ?>
