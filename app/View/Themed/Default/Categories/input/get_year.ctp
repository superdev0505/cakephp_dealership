<?php echo $this->Form->input('year_input', array('type' => 'select', 'required' => 'required', 'options' =>$year_opt, 'empty' => 'Year', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>
<script>
$(function(){

	//Load Year
	$("#year_input").change(function(){
		if($(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				data: {'year':$(this).val(),'class':<?php echo json_encode($this->request->query['class']); ?>},
				url:  "/categories/get_make/input",
				success: function(data){
					$("#opt_make_input").html(data);
				}
			});
		}else{
			$("#opt_make_input").html("");
		}
	});
	
	
});
	
</script>