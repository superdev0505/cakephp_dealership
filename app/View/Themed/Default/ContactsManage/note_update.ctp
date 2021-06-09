<?php echo $this->Form->create('Contact', array( 'class' => 'form-inline apply-nolazy', 'role'=>"form")); ?>

	<strong>Sales Person:</strong> <?php echo $contact_info['Contact']['sperson']; ?>, <strong>Customer:</strong> <?php echo $contact_info['Contact']['full_name'] ?>
	<div style="margin-top: 10px">
		<?php echo $this->Form->hidden('contact_id', array('value' => $contact_info['Contact']['id'])); ?>
		<font color="red">*</font> <?php echo $this->Form->label('note_update'); ?>
		<?php echo $this->Form->input('note_update', array('type' => 'textarea', 'class' => 'form-control')); ?>
		<div id="message_eror" class="text-danger"></div>
	</div>

<?php echo $this->Form->end(); ?> 


<?php 
//debug( $messages );
//echo $this->element('sql_dump'); 
?> 
