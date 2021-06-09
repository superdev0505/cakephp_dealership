<div class="row">
<?php foreach($models as $model){ ?>
	<div class="col-md-6"><a href="jvascript:" class="select_category" model_id="<?php echo $model['Model']['id']; ?>" ><?php echo $model['Model']['short_name']; ?> - <?php echo $model['Model']['year']; ?></a></div>
<?php } ?>
</div>

<script>
$(function(){

	$(".select_category").click(function(event){
		event.preventDefault();
		model_id = $(this).attr('model_id');
		
		$('.wizard').find("a[data-toggle*='tab']").eq(1).trigger('click');
		
		if(confirm('Are you sure you want to add this to vehicle?')){
		
			//get vehicle details
			$.ajax({
				type: "get",
				cache: false,
				dataType:'JSON',
				data: {'model_id':$(this).attr('model_id')},
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
		
	});

})

</script>