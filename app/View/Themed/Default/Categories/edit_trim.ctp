<!-- Widget -->
<?php 
//debug($this->request->query['returl']);
//debug( html_entity_decode($this->request->query['returl']) ); 

?>

<div class="widget widget-heading-simple widget-body-white" >
<?php echo $this->Form->create('Trim', array('type'=>'post', 'autocomplete'=>"off", 'class' => 'form-inline apply-nolazy')); ?>
	<div class="widget-body">
		<div class="innerB">
			<div class="row">
				<div class="col-xs-4">
					<?php echo $this->Form->input('id'); ?>
					<?php echo $this->Form->label('search_category','Type:'); ?>
					<?php echo $this->Form->input('search_category', array('type' => 'select', 'options' => $d_type_options,  'empty' => "Select", 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-4">
					<?php echo $this->Form->label('search_type','Category:'); ?>
					<?php echo $this->Form->input('search_type', array('type' => 'select', 'options'=>$body_type, 'required' => 'required', 'empty' => "Select", 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
				<div class="col-xs-4">
					<?php echo $this->Form->label('category_type_id','Class:'); ?>
					<?php echo $this->Form->input('category_type_id', array('type' => 'select', 'options'=>$body_sub_type_options,   'required' => 'required', 'empty' => "Select", 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
			</div>
		</div>
		<div class="innerB">
			<div class="row">
				<div class="col-xs-3">
					<?php echo $this->Form->label('msrp','MSRP:'); ?>
					<?php echo $this->Form->input('msrp', array('type' => 'text', 'required' => 'required', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
				<div class="col-xs-3">
					<?php echo $this->Form->label('model_prefix','Model Prefix:'); ?>
					<?php echo $this->Form->input('model_prefix', array('type' => 'text',  'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
					<div class="separator"></div>
				</div>
				<div class="col-xs-3">
					<?php echo $this->Form->label('pretty_name','Pretty Name:'); ?>
					<?php echo $this->Form->input('pretty_name', array('type' => 'text',  'required' => 'required',  'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
				<div class="col-xs-3">
					<?php echo $this->Form->label('short_name','Short Name:'); ?>
					<?php echo $this->Form->input('short_name', array('type' => 'text',  'required' => 'required',  'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-right">
					<div class="separator"></div>
					<button type="button" id="btn_save_trim" class="btn btn-success" >Save</button>&nbsp;
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
 ?>
 <script>
$(function(){ 
		
	$("#btn_save_trim").click(function(event){
		event.preventDefault();
		if( $("#TrimSearchCategory").val() == ''){
			$("#TrimSearchCategory").focus();
			alert('Please select type');
			return false;
		}
		if( $("#TrimSearchType").val() == ''){
			$("#TrimSearchType").focus();
			alert('Please select category');
			return false;
		}
		if( $("#TrimCategoryTypeId").val() == ''){
			$("#TrimCategoryTypeId").focus();
			alert('Please select class');
			return false;
		}
		if( $("#TrimMsrp").val() == ''){
			$("#TrimMsrp").focus();
			alert('Please enter marp');
			return false;
		}
		if( $("#TrimModelPrefix").val() == ''){
			$("#TrimModelPrefix").focus();
			alert('Please enter model prefix');
			return false;
		}
		if( $("#TrimPrettyName").val() == ''){
			$("#TrimPrettyName").focus();
			alert('Please enter pretty name');
			return false;
		}
		if( $("#TrimShortName").val() == ''){
			$("#TrimShortName").focus();
			alert('Please enter short name');
			return false;
		}
		
		
		$.ajax({
			type: "POST",
			url:  $("#TrimEditTrimForm").attr('action'),
			data: $("#TrimEditTrimForm").serialize(),
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
		
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo html_entity_decode($this->request->query['returl']); ?>",
			success: function(data){
				$("#trim_search_result").html(data);
				bootbox.hideAll();
			}
		});
	
		
	<?php } ?>
	

	function set_options_inventory(json_data, element){
		$(element).html('<option value="">Select</option>');
		$.each(json_data, function(i, item) {
			$(element).append('<option value="'+i+'">'+item+'</option>');
		});
	}

	//Type Change
	$("#TrimSearchCategory").change(function(){
		$("#TrimSearchType").html('<option value="">Select</option>');
		$("#TrimCategoryTypeId").html('<option value="">Select</option>');
		if($(this).val() != ''){
			$("#TrimSearchType").html('<option value="">Loading...</option>');
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				data: {'d_type':$(this).val()},
				url:  "/categories/get_category_list/",
				success: function(data){
					set_options_inventory(data, "#TrimSearchType");
				}
			});
		}
	});
	
	//Category Change
	$("#TrimSearchType").on('change',function(){
		if($(this).val() != ''){
			$("#TrimCategoryTypeId").html('<option value="">Loading...</option>');
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				data: { 'd_type':$("#TrimSearchCategory").val(), 'category':$(this).val()},
				url:  "/categories/get_classes_type/",
				success: function(data){
					set_options_inventory(data, "#TrimCategoryTypeId");
				}
			});
		}
	});

	
	
});

</script>
