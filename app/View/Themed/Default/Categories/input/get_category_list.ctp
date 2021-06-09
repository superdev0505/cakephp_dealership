<?php echo $this->Form->input('category_input', array('type' => 'select', 'required' => 'required', 'options' =>$d_type_options, 'empty' => 'Category', 'label' => false, 'div' => false, 'class' => 'form-control')); ?>
<script>
$(function(){
	
	$("#category_input").change(function(event){
		

		$("#opt_class_input").html("");
		$("#opt_year_input").html("");
		$("#opt_make_input").html("");
		$("#opt_model_input").html("");
		
		$.ajax({
			type: "get",
			cache: false,
			data: {'d_type':<?php echo json_encode($this->request->query['d_type']); ?>,'body_type':$(this).val()},
			url:  "/categories/get_body_sub_type/input",
			success: function(data){
				$("#opt_class_input").html(data);
			}
		});
	});	
	
});

</script>