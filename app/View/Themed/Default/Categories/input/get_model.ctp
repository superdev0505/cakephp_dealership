<?php echo $this->Form->input('model_input', array('type' => 'select', 'required' => 'required', 'options' =>$model_opt, 'empty' => 'Model', 'label' => false, 'div' => false, 'class' => 'form-control'));  ?>
<button id="btn_get_models_input" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-plus"></i></button>


<script>
$(function(){

	$("#btn_get_models_input").click(function(event){
		event.preventDefault();
		model_id = $("#model_input").val();
		
		if(model_id != ''){
			
			if(confirm('Are you sure you want to add this to vehicle?')){
			
				//get vehicle details
				$.ajax({
					type: "get",
					cache: false,
					dataType:'JSON',
					data: {'model_id':model_id},
					url:  "/categories/vehicle_details/",
					success: function(data){
						$("#ContactUnitValue").val( "" );
						$("#ContactCondition").val("");
						$("#ContactYear").val("");
						$("#ContactMake").val("");
						$("#ContactModel").val("");
						$("#ContactType").val("");
						$("#ContactClass").val("");
						
						if(data.Trim != null){
							$("#ContactUnitValue").val( data.Trim.msrp  );
						}
						$("#ContactCondition").val("New");
						
						$("#ContactYear").val(data.Model.year);
						$("#ContactMake").val(data.Make.short_name);
						$("#ContactModel").val(data.Model.short_name);
						
						if(data.Category != null){
							$("#ContactType").val(data.Category.body_type);
							$("#ContactClass").val(data.Category.body_sub_type);
						}
					}
				});
			
			}
		}else{
			alert('Please select model');
		}
		
	});

})

</script>
