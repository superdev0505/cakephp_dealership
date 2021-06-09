<?php
$dealer = AuthComponent::user('dealer');
//echo $dealer;
?>
<?php
$dealer_id = AuthComponent::user('dealer_id');
// echo $dealer_id;
?>
<div class="users form">
<?php echo $this->Form->create('User',array('action'=>'register','class'=>'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Please enter your Dealer ID to register!'); ?></legend>
        <?php echo $this->Form->input('register',array('type'=>'password','label'=>'Dealer ID','class'=>'input-mini','id'=>'register','name'=>'register'));
    ?>
    <div class="form-actions">
&nbsp;<?php echo $this->Html->link('Back to Login',array('controller'=>'users','action'=>'login'),array('icon'=>'lightbulb','class'=>'btn btn-info')); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<?php echo $this->Form->submit('<i class="icon-magic"></i> Registration (find your dealer id)',array( 'div'=>false,'class'=>'btn btn-info')); ?>
	
	</div>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<script>
$(document).ready(function(){
	$('#register').focus();
});
</script>