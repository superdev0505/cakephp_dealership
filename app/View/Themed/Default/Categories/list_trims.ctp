<br />
<br />
<br />

<style>
.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}

</style>

<div class="innerAll">

	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
			<!--Search start-->
			<?php echo $this->Form->create('Contact', array('type'=>'GET','url' => array('controller'=>'categories','action' => 'search_result'),'class' => 'form-inline apply-nolazy')); ?>
			<div class="row">
				<div class="col-md-2">
					<?php echo $this->Form->label('search_category','Type:'); ?>
					<?php echo $this->Form->input('search_category', array('type' => 'select', 'options' => $d_type_options,  'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
					<div class="separator"></div>
				</div>
				<div class="col-md-2">
					<?php echo $this->Form->label('search_type','Category:'); ?>
					<?php echo $this->Form->input('search_type', array('type' => 'select', 'options'=>$type_options, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
				<div class="col-md-2">
					<?php echo $this->Form->label('search_make','Make:'); ?>
					<?php echo $this->Form->input('search_make', array('type' => 'select',  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>
					<div class="separator"></div>
				</div>
				<div class="col-md-2">
					<font color='red'>*</font> <?php echo $this->Form->label('search_year','Year:'); ?><br />
					<?php echo $this->Form->input('search_year', array('type' => 'select',  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>
					<div class="separator"></div>
				</div>
				<div class="col-md-2">
					<font color='red'>*</font> 
					<?php echo $this->Form->label('search_model_id','Model:'); ?><br />
					<?php echo $this->Form->input('search_model_id', array('type' => 'select', 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style'=>'width: 100%'));  ?>
					<div class="separator"></div>
				</div>
				<div class="col-md-2">
					<?php echo $this->Form->label('search_class','Class:'); ?>
					<?php echo $this->Form->input('search_class', array('type' => 'select', 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<input type="checkbox" name="search_new_add" value="1" id="search_new_add">
					<label for="search_new_add">Newly added</label>
				</div>
				<div class="col-md-6">
					<button type="submit" id="submit_advance_search_filter" class="btn btn-success no-ajaxify"><i class="fa fa-search"></i> Search</button>
					<button type="button" id="inv_add_new_make" class="btn btn-success no-ajaxify"><i class="fa fa-plus"></i> New Make</button>
					<button type="button" id="inv_add_new_model" class="btn btn-success no-ajaxify"><i class="fa fa-plus"></i> New Model</button>
					
				</div>
			</div>
			<?php echo $this->Form->end(); ?>
			<!-- //Search End-->
		</div>
	</div>

	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
			<!-- Search result-->
			<div id="trim_search_result">
				
			</div>
			<!-- //Search result End-->
		</div>
	</div>
</div>


<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
	
	$("#inv_add_new_make" ).click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/trims/add_make",
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Add new make",
				});
			}
		});
		
	});
	
	$("#inv_add_new_model" ).click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/trims/add",
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Add new model",
				});
			}
		});
		
	});
	


	//inventory search tool
	$.inventory({
		input_type: "#ContactSearchCategory", 
		input_category:"#ContactSearchType",
		input_make:"#ContactSearchMake", 
		input_year:"#ContactSearchYear",
		input_yearedit:"#btn_year_edit",
		
	 	input_model_id:"#ContactSearchModelId", 
		input_model:"#ContactSearchModel", 
		input_class:"#ContactSearchClass",
		btn_edit_model:"#btn_models_edit",
		
		input_unitColor_id:"#ContactSearchUnitColor",
		input_unitColor_fieldname:"search_unit_color",
	});

	
	//advance search
	$("#submit_advance_search_filter").click(function(event){
		$("#search-result-content").html("");
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			data: $(this).closest('form').serialize(),
			url:  $(this).closest('form').attr('action'),
			success: function(data){
				$("#trim_search_result").html(data);
			}
		});
		return false;
	});
	
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
















