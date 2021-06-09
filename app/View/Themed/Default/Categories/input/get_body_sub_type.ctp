<?php echo $this->Form->input('class_input', array('type' => 'select', 'required' => 'required', 'options' =>$body_sub_type_options, 'empty' => 'Class', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>

<script>
$(function(){

	//Load Year
	$("#class_input").change(function(){
		
		$("#opt_year_input").html("");
		$("#opt_make_input").html("");
		$("#opt_model_input").html("");
		
		$.ajax({
			type: "get",
			cache: false,
			data: {'class':$(this).val()},
			url:  "/categories/get_year/input",
			success: function(data){
				$("#opt_year_input").html(data);
			}
		});
	});
	
	

	
});

</script>