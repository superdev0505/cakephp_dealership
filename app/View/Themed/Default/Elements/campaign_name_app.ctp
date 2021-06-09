<div class="row">
	<div class="col-md-8">
		<div>
			Type: 
			<?php 
				$eblast_types = array ( 'A' => 'Autoresponder', 'N' => 'Newsletter', 'M' => 'Eblast' );
				echo $eblast_types[$template_type];  
			?>
			<div class="separator"></div>
		</div>
		
		<?php
        	echo $this->Form->label('campaign_name','Campaign Name');
			echo $this->Form->input('campaign_name', array(
				'type' => 'text',
				'label'=>false,'div'=>false,'class'=>'form-control'
			));
        ?>
		<?php echo $this->Form->hidden('template_type', array('value' =>$template_type));  ?>
		<br><br>
		


	</div>
	<div class="col-md-4">
    	&nbsp;
    </div>
    <div class="separator"></div>
</div>
<?php
if($template_type=='A' && $_SESSION['Auth']['User']['dealer_id']==2501){
?>
<div class="row">
	<div class="col-md-8">
		
		<?php
			$rule_category = array('Purchase','Visit','Wish Birthday','Welcome');
			$after_before = array('after','before','on');
			$days = array('Same day','Day 1','Day 3','Day 4','Day 5','Day 6','Day 7','Day 8','Day 9','Day 10');
        	
		?>
		<br><div>
		<label for="AutorespondRules">Rules</label>
		</div>
			<div class="col-md-5" style="padding-left:0px;display:inline;">
				<?php echo $this->Form->input('rule_category', array('type' => 'select', 'options' => $rule_category, 'value'=>'', 'empty' => 'Type', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>''));?>: Auto-respond 
				<div class="separator"></div>
			</div>
			
			<div class="col-md-2" style="padding-left:0px;display:inline;">
				<?php echo $this->Form->input('after_before', array('type' => 'select', 'options' => $after_before, 'value'=>'', 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
				<div class="separator"></div>
			</div>
			<div class="col-md-4" style="padding-left:0px;display:inline;">
				<?php echo $this->Form->input('days', array('type' => 'select', 'options' => $days, 'value'=>'', 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>''));?> day(s)
				<div class="separator"></div>
			</div>
			
        
		<?php echo $this->Form->hidden('template_type', array('value' =>$template_type));  ?>
	</div>
	<div class="col-md-4">
    	&nbsp;
    </div>
    <div class="separator"></div>
</div>
<?php
}
?>
<div style="height:100px;">&nbsp;</div>