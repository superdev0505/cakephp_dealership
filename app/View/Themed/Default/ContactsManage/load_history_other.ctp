<?php if(!empty($history_ar)){ ?>

<!-- Widget -->
<div class="widget widget-tabs widget-tabs-responsive history_tabs">

	<!-- Widget heading -->
	<div class="widget-head ">
		<ul>
			<?php
			$cnt = 1;
			 foreach ($history_types as $key => $value) { 
				if(!empty($history_ar[$key])){
			?>
			<li  <?php echo ($cnt == 1)? 'class="active"' : '' ;  ?>         >
				<a class="glyphicons <?php echo $value;  ?>" href="#content_<?php echo str_replace(" ", "_", $key);  ?>_<?php echo $contact_id;?>" data-toggle="tab">
					<i></i><span><?php echo $key;  ?> (<?php echo count($history_ar[$key]);  ?>) </span>
				</a>
			</li>	
			<?php $cnt++; } }  ?>

			<?php
			$history_others = array(); 
			foreach ($history_ar as $key => $value) { 
				if(!isset($history_types[$key])){
					foreach($value as $v){
						$history_others[] = $v;	
					}
			 	}
			 }

			 if(!empty($history_others)){
			?>
			<li >
				<a class="glyphicons log_book" href="#content_others_<?php echo $contact_id;?>" data-toggle="tab">
					<i></i><span>Others (<?php echo count($history_others);  ?>) </span>
				</a>
			</li>

			<?php  } ?>


			<li>
				<span style="float:right;"><a href="javascript:" class='close_history_table' onclick="hide_history_table(<?php echo $contact_id;?>)" 
				   >( X )</a></span>
			</li>



		</ul>
	</div>
	<!-- // Widget heading END -->
	
	<div class="widget-body">
		<div class="tab-content">
		
				

			<?php
			$cnt = 1;
			 foreach ($history_types as $key => $value) { 
				if(!empty($history_ar[$key])){
			?>	
			<div id="content_<?php echo str_replace(" ", "_", $key);  ?>_<?php echo $contact_id;?>" class="tab-pane <?php echo ($cnt == 1)? 'active' : '' ;  ?>">
				<?php echo $this->element('history_content_other', array('htype' => $key,'history'=>$history_ar[$key])); ?>
			</div>
			<?php $cnt++; } }  ?>

			<?php
			 if(!empty($history_others)){
			?>
			<div id="content_others_<?php echo $contact_id;?>" class="tab-pane">
				<?php echo $this->element('history_content_other', array('htype' => '','history'=>$history_others)); ?>
			</div>
			<?php  } ?>
			
		</div>
	</div>
</div>
<!-- // Widget END -->
<?php  }else{ ?>

<h3>History not available</h3>
<?php  } ?>














						<script>
							function hide_history_table(contact_id){
								$('#history_otherloc_'+contact_id).hide();
							}
						
						</script>
						
						