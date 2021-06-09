<?php echo $this->Form->input('make_input', array('type' => 'select', 'required' => 'required', 'options' =>$mk_options, 'empty' => 'Make', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>
<script>
$(function(){

	//Load Year
	$("#make_input").change(function(){
		if($(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				data: {'make':$(this).val(),'year':<?php echo json_encode($this->request->query['year']); ?>,'class':<?php echo json_encode($this->request->query['class']); ?>},
				url:  "/categories/get_model/input",
				success: function(data){
					$("#opt_model_input").html(data);
				}
			});
		}else{
			$("#opt_model_input").html("");
		}
	});
	
	
});
	
</script>