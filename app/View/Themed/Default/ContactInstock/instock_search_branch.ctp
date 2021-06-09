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
<div style='max-height: 480px; overflow: auto;'>
	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
			<!-- Table heading -->
			<thead>
			<tr class='bg-inverse' >
				<th>Category</th>
				<th>Year</th>
				<th>Make</th>
				<th>Model</th>
				<th>Class</th>
				<th>Value/Unit</th>
				<th>VIN</th>
				<th>Stock#</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach($marineInventories as $marineInventory){ ?>
				<tr class="gradeA">
					<td><?php echo $marineInventory['MarineInventory']['category']; ?></td>
					<td><?php echo $marineInventory['MarineInventory']['year']; ?></td>
					<td><?php echo $marineInventory['MarineInventory']['make']; ?></td>
					<td><?php echo $marineInventory['MarineInventory']['model']; ?></td>
					<td><?php echo $marineInventory['MarineInventory']['class']; ?></td>
					<td><?php echo $marineInventory['MarineInventory']['price']; ?></td>
					<td><?php echo $marineInventory['MarineInventory']['hin']; ?></td>
					<td><?php echo $marineInventory['MarineInventory']['stock_num']; ?></td>
					<td>
						<button class='btn btn-primary btn-xs btn-instock-add'  data-stock-id='<?php echo $marineInventory['MarineInventory']['inv_id']; ?>'> Add </button>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			<!-- // Table body END -->
		</table>

	<div class="paging">
		<ul class="pagination margin-none">
			<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
			<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
			<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
		</ul>
	</div>


</div>

<div class='clearfix'>
	<button type="button" id="close_child_modal_dialog" class="close btn-imp" data-dismiss="modal">Cancel</button>
</div>


<?php //debug($XmlInventories);  ?>

<script type="text/javascript">
$(function(){

	var src = "";
<?php if(isset($this->request->query["src"])){ ?>
	src = <?php echo json_encode($this->request->query["src"]); ?>;
<?php } ?>



$(".modal-header").html('<button type="button" class="bootbox-close-button close">×</button><h4 style="display: inline-block;" class="modal-title">Branch Inventory Search:</h4><input placeholder="VIN, Stock#, Year, Make, Model" type="text" value="'+src+'" class="form-control input-sm" id="search_vin_stock" style="width: auto; display: inline-block; margin-left: 7px;"> <button id="btn_search_vin_stock" class="btn btn-inverse btn-sm"><i class="fa fa-search"></i></button>');


	


	function set_options(json_data, element){
		$(element).html('<option value="">Select</option>');
		$.each(json_data, function(i, item) {
			$(element).append('<option value="'+i.trim()+'">'+item+'</option>');
		});
	}


	// set category 
	function set_category(instock_model_id){

		// var ContactType = "Motorcycle / Scooter";
		// var ContactMake = "Yamaha";
		// var ContactYear = "2014";
		// var ContactModelId = "6038";
		// var model_name = "Stratoliner Deluxe";
		// var ContactClass = "Cruiser";



		//Set Input ids start
		<?php if($this->request->query['v_type'] == 'main'){ ?>
		var inp_ContactCategory = '#ContactCategory';	
		var inp_ContactType = '#ContactType';
		var inp_ContactMake = '#ContactMake';
		var inp_ContactYear = '#ContactYear';
		var inp_ContactModelId = '#ContactModelId';
		var inp_ContactModel = '#ContactModel';
		var inp_ContactUnitValue = '#ContactUnitValue';
		var inp_ContactClass = '#ContactClass';
		var inp_ContactCondition = '#ContactCondition';
		var inp_ContactStockNum = '#ContactStockNum';
		var inp_ContactOdometer = '#ContactOdometer';
		var inp_ContactVin = '#ContactVin';
		var inp_ContactUnitColor = 'ContactUnitColor';

		var vehicle_selection_type_container = "#vehicle_selection_type_container";

		var inp_ContactBranchLocation = '#ContactBranchLocation';
		var inp_ContactEngine = '#ContactEngine';
		var inp_unitColor_fieldname = "data[Contact][unit_color]";

		var vehicle_selection_type_container_name = "data[Contact][vehicle_selection_type]";

		<?php }else if($this->request->query['v_type'] == 'addon1'){ ?>	

		var inp_ContactCategory = '#ContactCategoryAddon1';
		var inp_ContactType = '#ContactTypeAddon1';
		var inp_ContactMake = '#ContactMakeAddon1';
		var inp_ContactYear = '#ContactYearAddon1';
		var inp_ContactModelId = '#ContactModelIdAddon1';
		var inp_ContactModel = '#ContactModelAddon1';
		var inp_ContactUnitValue = '#ContactUnitValue_addon1';
		var inp_ContactClass = '#ContactClassAddon1';
		var inp_ContactCondition = '#ContactConditionAddon1';
		var inp_ContactStockNum = '#ContactStockNumAddon1';
		var inp_ContactOdometer = '#ContactOdometerAddon1';
		var inp_ContactVin = '#ContactVinAddon1';
		var inp_ContactUnitColor = 'ContactUnitColorAddon1';
		var inp_unitColor_fieldname = "data[Contact][unit_color_addon1]";
		var vehicle_selection_type_container = "#vehicle_selection_type_container_addon1";

		var inp_ContactBranchLocation = '';
		var inp_ContactEngine = '';

		var vehicle_selection_type_container_name = "data[Contact][vehicle_selection_type_addon1]";

		<?php }else if($this->request->query['v_type'] == 'addon2'){ ?>	

		var inp_ContactCategory = '#ContactCategoryAddon2';	
		var inp_ContactType = '#ContactTypeAddon2';
		var inp_ContactMake = '#ContactMakeAddon2';
		var inp_ContactYear = '#ContactYearAddon2';
		var inp_ContactModelId = '#ContactModelIdAddon2';
		var inp_ContactModel = '#ContactModelAddon2';
		var inp_ContactUnitValue = '#ContactUnitValue_addon2';
		var inp_ContactClass = '#ContactClassAddon2';
		var inp_ContactCondition = '#ContactConditionAddon2';
		var inp_ContactStockNum = '#ContactStockNumAddon2';
		var inp_ContactOdometer = '#ContactOdometerAddon2';
		var inp_ContactVin = '#ContactVinAddon2';
		var inp_ContactUnitColor = 'ContactUnitColorAddon2';
		var inp_unitColor_fieldname = "data[Contact][unit_color_addon2]";	

		var vehicle_selection_type_container = "#vehicle_selection_type_container_addon2";			


		var inp_ContactBranchLocation = '';
		var inp_ContactEngine = '';

		var vehicle_selection_type_container_name = "data[Contact][vehicle_selection_type_addon2]";

		<?php } ?>		
		//Set Input ids ends


		$.ajax({
			type: "get",
			cache: false,
			dataType:'JSON',
			data: {'vehicle_selection_type': 'Branch Inventory' , 'model_id': instock_model_id},
			url:  "/categories/vehicle_details/",
			success: function(data_main){
				//console.log(data);

				var ContactType = data_main.Category;
				var ContactMake = data_main.Make;
				var ContactYear = data_main.Year;
				var ContactModelId = data_main.Model_id;
				var model_name = data_main.Model;
				var ContactClass = data_main.Class;

				$(inp_ContactType).val(ContactType);

				//LOAD D_TYPE
				$.ajax({
					type: "get", 
					cache: false,
					dataType: 'json',
					data: {'vehicle_selection_type': 'Branch Inventory'},
					url:  "/categories/get_d_type/",
					success: function(data_get_d_type){

						set_options(data_get_d_type, inp_ContactCategory);

						$(inp_ContactCategory).val('Marine');

						//Set Make
						$.ajax({
							type: "get",
							cache: false,
							dataType: 'json',
							data: {'vehicle_selection_type': 'Branch Inventory','type': 'Marine'},
							url:  "/categories/get_make_n/",
							success: function(data_make){
								set_options(data_make, inp_ContactMake);
								$(inp_ContactMake).val(ContactMake);

								//Set Year
								$.ajax({
									type: "get",
									cache: false,
									dataType: 'json',
									data: {'vehicle_selection_type': 'Branch Inventory','type':  'Marine', 'make' : ContactMake },
									url:  "/categories/get_year_n/",
									success: function(data_year){
										set_options(data_year, inp_ContactYear);
										$(inp_ContactYear).val(ContactYear);

										//Set Model
										$(inp_ContactModelId).val("");
										$(inp_ContactModelId).show();
										$(inp_ContactModel).hide();
										$(inp_ContactModel).val("");
										$(inp_ContactModelId).html('<option value="">Loading...</option>');
										$.ajax({
											type: "get",
											cache: false,
											dataType: 'json',
											data: {'year':ContactYear,'vehicle_selection_type':'Branch Inventory','type': 'Marine', 'make' : ContactMake },
											url:  "/categories/get_model_n/",
											success: function(data_get_model_n){
												set_options(data_get_model_n, inp_ContactModelId);
												$(inp_ContactModelId).val( ContactModelId.trim() );
												
												$(inp_ContactModel).val(model_name);


												$(inp_ContactClass).html(' <option value="">Select</option>  <option selected="selected" value="'+data_main.Class+'">'+data_main.Class+'</option>');
												$(inp_ContactType).html(' <option value="">Select</option>  <option selected="selected" value="'+data_main.Category+'">'+data_main.Category+'</option>');

												$(inp_ContactUnitValue).val( data_main.Price  );
												$(inp_ContactCondition).val( data_main.Condition  );
												$(inp_ContactOdometer).val( data_main.Miles  );
												$(inp_ContactVin).val( data_main.Vin  );

												$(inp_ContactStockNum).val( data_main.Stock_num  );

												if(inp_ContactBranchLocation != ''){
													$(inp_ContactBranchLocation).val( data_main.Branch_location  );	
												}

												if(inp_ContactEngine != ''){
													$(inp_ContactEngine).val( data_main.Engine  );
												}

												$("#"+inp_ContactUnitColor).replaceWith('<input name="'+inp_unitColor_fieldname+'" class="form-control" type="text" value="" id="'+inp_ContactUnitColor+'">');
												$("#"+inp_ContactUnitColor).val( data_main.Color  );

												$("[name = '"+vehicle_selection_type_container_name+"'][value='Branch Inventory']").prop('checked', true);

												//Set Vehicle Details

													// $.ajax({
													// 	type: "get",
													// 	cache: false,
													// 	dataType:'JSON',
													// 	data: {'type': 'Branch Inventory' , 'model_id': ContactModelId},
													// 	url:  "/categories/vehicle_details/",
													// 	success: function(data){
													// 		//console.log(data);
													// 		 $(inp_ContactClass).html(' <option value="">Select</option>  <option selected="selected" value="'+data.Class+'">'+data.Class+'</option>');

													// 		 $(inp_ContactType).html(' <option value="">Select</option>  <option selected="selected" value="'+data.Category+'">'+data.Category+'</option>');

													// 		$(inp_ContactUnitValue).val( data.Price  );
													// 		$(inp_ContactCondition).val( data.Condition  );
													// 		$(inp_ContactOdometer).val( data.Miles  );
													// 		$(inp_ContactVin).val( data.Vin  );
															
													// 		$(inp_ContactStockNum).val( data.Stock_num  );

													// 		if(inp_ContactBranchLocation != ''){
													// 			$(inp_ContactBranchLocation).val( data.Branch_location  );	
													// 		}
															
													// 		if(inp_ContactEngine != ''){
													// 			$(inp_ContactEngine).val( data.Engine  );
													// 		}

													// 		$("#"+inp_ContactUnitColor).replaceWith('<input name="'+inp_unitColor_fieldname+'" class="form-control" type="text" value="" id="'+inp_ContactUnitColor+'">');

													// 		$("#"+inp_ContactUnitColor).val( data.Color  );
															
															

													// 	}
													// });

											}
										});
										

									}
								});


							}
						});

					}
				});	





				
			}
		});






	}




	$(".btn-instock-add").click(function(){
		var instock_id = $(this).attr('data-stock-id');
		//console.log(instock_id);
		set_category(instock_id);
		$("#close_child_modal_dialog").click();
	});


	$("#btn_search_vin_stock").click(function(){
		var value = $("#search_vin_stock").val();
		var search_type = '<?php echo ($this->request->query["search_type"] == "stock_num")? "stocknumber" : "hin"; ?>';

		$.ajax({
			url: "/contact_instock/instock_search_branch?search_type=<?php echo $this->request->query['search_type']; ?>",
			data: {'search_field':search_type,"src":value, 'v_type' : '<?php echo $this->request->query['v_type']; ?>'},
			type: "get",
			cache: false,
			success: function(results){ 
				$('.bootbox-body').html(results);
			}
		});
		
	});


	$(".paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		//$("#ajaxOverlayLoader").show();
		window.crmgroup_refresh_url = $(this).attr('href');
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){ 
				$('.bootbox-body').html(results);
			}
		});
	});

});

</script>