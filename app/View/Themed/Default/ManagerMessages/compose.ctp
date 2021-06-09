<?php echo $this->Form->create('ManagerMessage', array( 'class' => 'form-inline apply-nolazy', 'role'=>"form")); ?>

	<strong>Sales Person:</strong> <?php echo $contact_info['Contact']['sperson']; ?>, <strong>Customer:</strong> <?php echo $contact_info['Contact']['full_name'] ?>
	<div style="margin-top: 10px">
		<?php echo $this->Form->hidden('to_id', array('value' => $contact_info['Contact']['user_id'])); ?>
		<?php echo $this->Form->hidden('from_id', array('value' => $from_id)); ?>
		<?php echo $this->Form->hidden('contact_id', array('value' => $contact_info['Contact']['id'])); ?>
		<?php echo $this->Form->hidden('sender_name', array('value' => $sender_name)); ?>
		<?php echo $this->Form->hidden('receiver_name', array('value' => $contact_info['Contact']['sperson'])); ?>
	
		<font color="red">*</font> <?php echo $this->Form->label('message'); ?>
		<?php echo $this->Form->input('message', array('type' => 'textarea', 'class' => 'form-control')); ?>
		<div id="message_eror" class="text-danger"></div>
	</div>

<?php echo $this->Form->end(); ?> 


<div class="separator bottom"></div>
<div class="separator bottom"></div>

<div >
	<?php foreach($messages as $message){ ?> 
		<div class="row">
			<div class="col-md-3">
				<span class="text-primary"><?php echo ($message['ManagerMessage']['from_id'] != $from_id)? $message['ManagerMessage']['sender_name'] :  "" ; ?> </span>
			</div>
			<div class="col-md-6">
				<div style="font-weight: bold;"><?php echo $message['ManagerMessage']['message']; ?></div> 
				<div><?php echo date("m/d/Y g:i A",strtotime($message['ManagerMessage']['created'])); ?></div>
			</div>
			<div class="col-md-3">
				<span class="text-primary"><?php echo ($message['ManagerMessage']['from_id'] == $from_id)? $message['ManagerMessage']['sender_name'] :  "" ; ?></span>
			</div>
		</div>
		<div class="separator bottom"></div>
	<?php } ?> 
</div>


<?php 
//debug( $messages );
//echo $this->element('sql_dump'); 
?> 
