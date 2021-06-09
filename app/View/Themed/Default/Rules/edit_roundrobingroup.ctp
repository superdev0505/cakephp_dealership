<?php if($saveSuccess == false){ ?>

<?php echo $this->Form->create('RoundRobinGroup', array('type'=>'file','class' => ' apply-nolazy', 'role'=>"form")); ?>

	<?php $input_id =  CakeText::uuid(); ?>
	<?php echo $this->Form->input('RoundRobinGroup.id'); ?>


	<div class="row outside_category">
		<div class="col-md-12">
			<?php echo $this->Form->label('RoundRobinGroup.group_name', 'Filter Name:'); ?>
			<?php echo $this->Form->text('RoundRobinGroup.group_name', array('class' => 'form-control','empty'=>"Select",'rel'=>"User")); ?>
		</div>
	</div>


	<div class="row outside_category">

		<?php if(!empty($rr_ds_locations_list))  { ?>
		<div class="col-md-6">
			Location: <br><?php echo $this->Form->select('RoundRobinGroup.location',$rr_ds_locations_list,
			array("id"=>$input_id."_round_robin_filter_group_location", 'class' => 'form-control','rel'=>'Location','empty'=>"Select")); ?>
			<div class="separator"></div>
		</div>
		<?php } ?>

        <?php if(!empty($rr_ds_sources_list))  { ?>
		<div class="col-md-6">
            Source: <br><?php echo $this->Form->select('RoundRobinGroup.source', $rr_ds_sources_list,
			array("id"=>$input_id."_round_robin_filter_group_source", 'class' => 'form-control','rel'=>'Source','empty'=>"Select")); ?>
			<div class="separator"></div>
		</div>
		<?php } ?>

		<?php if(!empty($rr_ds_conditions_list)) { ?>
		<div class="col-md-6">
			Condition: <br><?php echo $this->Form->select('RoundRobinGroup.condition',$rr_ds_conditions_list,
			array("id"=>$input_id."_round_robin_filter_group_condition", 'class' => 'form-control','empty'=>"Select", 'rel'=>"Condition")); ?>
			<div class="separator"></div>
		</div>
		<?php } ?>

		<?php if(!empty($rr_ds_type_list)) { ?>
		<div class="col-md-6">
			Class: <br><?php echo $this->Form->select('RoundRobinGroup.vehicle_type',$rr_ds_type_list,
			array("id" => $input_id."_round_robin_filter_group_type", "input-id" => $input_id, 'class' => 'form-control select_type','style'=>'width: 100%',  'empty' => "Select", 'rel' => "Type")); ?>
			<div class="separator"></div>
		</div>
		<?php } ?>

		<?php if(!empty($rr_ds_make_list)) { ?>
		<div class="col-md-12">
			Make: <br>
			<?php echo $this->Form->hidden('RoundRobinGroup.vehicle_make', array( 'style'=>"width: 90%;")); ?>
			<div class="separator"></div>
		</div>
		<?php } ?>

		<?php if(!empty($rr_ds_d_type_list)) { ?>
		<div class="col-md-6">
			Type: <br><?php echo $this->Form->select('RoundRobinGroup.d_type', $rr_ds_d_type_list,
			array("id" => $input_id."_round_robin_filter_group_d_type", 'class' => 'form-control', 'empty' => "Select", 'rel' => "D Type")); ?>
			<div class="separator"></div>
		</div>
		<?php } ?>

	</div>


	<div class="row">
		<?php if(!empty($rr_ds_categories_list)) { ?>
		<div class="col-md-12">
			Category:
			<?php echo $this->Form->hidden('RoundRobinGroup.category', array( 'style'=>"width: 90%;")); ?>
			<div class="separator"></div>
		</div>
		<?php } ?>
	</div>

	<div class="row outside_category">

		<div class="col-md-12">
			<?php echo $this->Form->input('RoundRobinGroup.is_default',array('type' => 'checkbox', 'class' => '', 'label' => 'Set as Default Filter Group', 'style' => array("width: auto; display: inline-block"))); ?>
		</div>

	</div>
	<div class='row outside_category'>
		<div class="col-md-12">
			<hr>
		</div>



		<div class="col-md-2">
			&nbsp;
		</div>
		<div class="col-md-10 text-right">
			<div class="separator"></div>
			<button type="button" id="close_modal_dialog_edit_rule" class="btn btn-danger" >Cancel</button>
			&nbsp;
			<button type="button" id="btn_roundrobbin_group_save_rule" class="btn btn-success" >Submit</button>
		</div>
	</div>

<?php echo $this->Form->end(); ?>

<script type="text/javascript">
$(function(){


	$('#btn_roundrobbin_group_save_rule').click(function(){

		$.ajax({
			type: "POST",
			data: $("#RoundRobinGroupEditRoundrobingroupForm").serialize(),
			url: $("#RoundRobinGroupEditRoundrobingroupForm").attr('action'),
			success: function(data){
				$("#RoundRobinGroup_details_container_<?php echo $this->request->data['RoundRobinGroup']['id']; ?>").html(data);
				bootbox.hideAll();
			}
		});


	});

	$('.outside_category').click(function(){
		$('#RoundRobinGroupCategory').select2("close");
		$('#RoundRobinGroupVehicleMake').select2("close");
	});

	$("#RoundRobinGroupCategory").select2({
		placeholder: "Select Categories",
		tags:[<?php echo implode(",", $category_options);  ?>]
	});

	$("#RoundRobinGroupVehicleMake").select2({
		placeholder: "Select Makes",
		tags:[<?php echo implode(",", $make_options);  ?>]
	});


	$("#close_modal_dialog_edit_rule").click(function(){
		bootbox.hideAll();
	});


});
</script>

<?php }else{ ?>

	<?php
	$row = $this->request->data;
	?>
	<i class="fa fa-group"></i> <strong><?php echo $row['RoundRobinGroup']['group_name']; ?> # <?php echo $row['RoundRobinGroup']['id']; ?> </strong> -

	<?php if($row['RoundRobinGroup']['is_default']){ $filter_criterias[] = "<span class='text-primary'>Default</span>"; }  ?>
	<?php if($row['RoundRobinGroup']['location'] != ''){ $filter_criterias[] = "Location: ".$row['RoundRobinGroup']['location']; }  ?>
    <?php if($row['RoundRobinGroup']['source'] != ''){ $filter_criterias[] = "Source: ".$row['RoundRobinGroup']['source']; }  ?>
	<?php if($row['RoundRobinGroup']['condition'] != ''){ $filter_criterias[] = "Condition: ".$row['RoundRobinGroup']['condition']; }  ?>
	<?php if($row['RoundRobinGroup']['category'] != ''){ $filter_criterias[] = "Category: ".$row['RoundRobinGroup']['category']; }  ?>

	<?php if($row['RoundRobinGroup']['vehicle_type'] != ''){ $filter_criterias[] = "Class: ".$row['RoundRobinGroup']['vehicle_type']; }  ?>
	<?php if($row['RoundRobinGroup']['vehicle_make'] != ''){ $filter_criterias[] = "Make: ".$row['RoundRobinGroup']['vehicle_make']; }  ?>

	<?php if($row['RoundRobinGroup']['d_type'] != ''){ $filter_criterias[] = "Type: ".$row['RoundRobinGroup']['d_type']; }  ?>

	<?php echo implode(", ", $filter_criterias); ?>
<?php } ?>
