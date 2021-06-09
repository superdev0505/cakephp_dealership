<strong>Click (below) for Models</strong> <button id="btn_get_models_reset" type="button" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i></button>
<div class="separator"></div>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->input('year', array('type' => 'select', 'required' => 'required', 'options' =>$model_year_opt, 'empty' => 'Year', 'value'=>$select_year, 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 100px;  float: left;')); ?>
		<?php echo $this->Form->input('make', array('type' => 'select', 'required' => 'required', 'options' =>$make_opts, 'empty' => 'Make',  'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 150px;  float: left;')); ?>
		<button id="btn_get_models" type="button" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>

		<div class="separator"></div>
	</div>
</div>

<div id="list_models">
	
</div>



<script>
$(function(){
	
	$("#btn_get_models_reset").click(function(){
		$("#category_list").html("");
		$.ajax({
			type: "get",
			cache: false,
			data: {'d_type':<?php echo json_encode($this->request->query['d_type']); ?>,'body_type':<?php echo json_encode($this->request->query['body_type']); ?>},
			url:  "/categories/get_body_sub_type/",
			success: function(data){
				$("#category_list").html(data);
			}
		});
	});
	

	$("#btn_get_models").click(function(){
		$("#list_models").html("");
		if($("#year").val() != '' && $("#make").val() != ''){

			$.ajax({
				type: "get",
				cache: false,
				data: {'year':$("#year").val(),'make_id':$("#make").val()},
				url:  "/categories/model_list/",
				success: function(data){
					$("#list_models").html(data);
				}
			});
		}
	
	});


});

</script>

