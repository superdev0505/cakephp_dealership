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
<div><?php  echo $this->Paginator->counter('Page {:page} of {:pages},  Total: {:count} '); ?> </div>
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
				<th>Stock</th>
				<th>Vin Number</th>
        <th>Color</th>
        <th>Mileage</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach($XmlInventories as $XmlInventory){ ?>
				<tr class="gradeA">
					<td><?php echo $XmlInventory['XmlInventory']['vehtype']; ?></td>
					<td><?php echo $XmlInventory['XmlInventory']['year']; ?></td>
					<td><?php echo $XmlInventory['XmlInventory']['make']; ?></td>
					<td><?php echo $XmlInventory['XmlInventory']['model']; ?></td>
					<td><?php echo $XmlInventory['XmlInventory']['bodysubtype']; ?></td>
					<td><?php echo $XmlInventory['XmlInventory']['price']; ?></td>
					<td><?php echo $XmlInventory['XmlInventory']['stocknumber']; ?></td>
					<td><?php echo $XmlInventory['XmlInventory']['vin']; ?></td>
          <td><?php echo $XmlInventory['XmlInventory']['color']; ?></td>
          <td><?php echo $XmlInventory['XmlInventory']['miles']; ?></td>
					<td>
						<button class='btn btn-primary btn-xs btn-instock-add'  data-stock-id='<?php echo $XmlInventory['XmlInventory']['id']; ?>'> Add </button>
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


<?php //debug($XmlInventories);

	// debug($this->request->query['v_type']);

 ?>

<script type="text/javascript">
$(function(){

	var src = "";
<?php if(isset($this->request->query["src"])){ ?>
	src = <?php echo json_encode($this->request->query["src"]); ?>;
<?php } ?>


<?php if($this->request->query['search_type'] == 'stock_num'){ ?>
	$(".modal-header").html('<button type="button" class="bootbox-close-button close">×</button><h4 style="display: inline-block;" class="modal-title">Search:</h4><input value="'+src+'" type="text" class="form-control input-sm" id="search_vin_stock" style="width: auto; display: inline-block; margin-left: 7px;"> <button id="btn_search_vin_stock" class="btn btn-inverse btn-sm"><i class="fa fa-search"></i></button>');
<?php }else{ ?>
$(".modal-header").html('<button type="button" class="bootbox-close-button close">×</button><h4 style="display: inline-block;" class="modal-title">In Stock Search:</h4><input type="text" value="'+src+'" class="form-control input-sm" id="search_vin_stock" style="width: auto; display: inline-block; margin-left: 7px;"> <button id="btn_search_vin_stock" class="btn btn-inverse btn-sm"><i class="fa fa-search"></i></button>');
<?php } ?>







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
		var inp_unitColor_fieldname = "data[Contact][unit_color]";
		var vehicle_selection_type_container = "#vehicle_selection_type_container";

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

		<?php } ?>
		//Set Input ids ends

		$(vehicle_selection_type_container+" input:radio[value='In Stock']").attr('checked', true);

		$.ajax({
			type: "get",
			cache: false,
			dataType:'JSON',
			data: {'vehicle_selection_type': 'In Stock' , 'model_id': instock_model_id},
			url:  "/categories/vehicle_details/",
			success: function(data_main){

				// console.log(data);
				// $(inp_ContactCategory).val(data.Model.instock_d_type);

				//LOAD D_TYPE
				$.ajax({
					type: "get",
					cache: false,
					dataType: 'json',
					data: {'vehicle_selection_type': 'In Stock'},
					url:  "/categories/get_d_type/",
					success: function(data_get_d_type){

						//console.log(data_get_d_type);
						set_options(data_get_d_type, inp_ContactCategory);

						if(data_main.Model.vehtype == '' || data_main.Model.vehtype == null){
							data_main.Model.vehtype = 'Other';
						}

						$(inp_ContactCategory).val(data_main.Model.vehtype);

						//LOAD MAKE
						$.ajax({
							type: "get",
							cache: false,
							dataType: 'json',
							data: {'vehicle_selection_type': 'In Stock', 'type' : data_main.Model.vehtype},
							url:  "/categories/get_make_n/",
							success: function(data_get_make_n){
								set_options(data_get_make_n, inp_ContactMake);
								$(inp_ContactMake).val(data_main.Model.make);

								// LOAD YEAR
								$.ajax({
									type: "get",
									cache: false,
									dataType: 'json',
									data: {'vehicle_selection_type': 'In Stock', 'type' : data_main.Model.vehtype, 'make' : data_main.Model.make},
									url:  "/categories/get_year_n/",
									success: function(data_get_year_n){
										set_options(data_get_year_n, inp_ContactYear);
										$(inp_ContactYear).val(data_main.Model.year);

										$(inp_ContactModelId).val("");
										$(inp_ContactModelId).show();
										$(inp_ContactModel).hide();
										$(inp_ContactModel).val("");
										$(inp_ContactModelId).html('<option value="">Loading...</option>');

										//LOAD MODEL
										$.ajax({
											type: "get",
											cache: false,
											dataType: 'json',
											data: {
												'vehicle_selection_type': 'In Stock', 'type' : data_main.Model.vehtype, 'make' : data_main.Model.make,
												'year' : data_main.Model.year
											},
											url:  "/categories/get_model_n/",
											success: function(data_get_model_n){
												set_options(data_get_model_n, inp_ContactModelId);
												$(inp_ContactModelId).val(data_main.Model.id);
												$(inp_ContactModel).val(data_main.Model.model);

												//Set Details Values
												$(inp_ContactClass).html(' <option value="">Select</option>  <option selected="selected" value="'+data_main.Model.bodysubtype+'">'+data_main.Model.bodysubtype+'</option>');

												$(inp_ContactType).html(' <option value="">Select</option>  <option selected="selected" value="'+data_main.Model.category_name+'">'+data_main.Model.category_name+'</option>');

												$(inp_ContactUnitValue).val( data_main.Model.price  );
												$(inp_ContactCondition).val( data_main.Model.condition  );
												$(inp_ContactStockNum).val( data_main.Model.stocknumber  );
												$(inp_ContactOdometer).val( data_main.Model.miles  );
												$(inp_ContactVin).val( data_main.Model.vin  );

												$("#"+inp_ContactUnitColor).replaceWith('<input name="'+inp_unitColor_fieldname+'" class="form-control" type="text" value="" id="'+inp_ContactUnitColor+'">');

												$("#"+inp_ContactUnitColor).val( data_main.Model.color  );


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
		var search_type = '<?php echo ($this->request->query["search_type"] == "stock_num")? "stocknumber" : "vin"; ?>';

		$.ajax({
			url: "/contact_instock/instock_search?search_type=<?php echo $this->request->query['search_type']; ?>",
			data: {'search_field':search_type,"src":value, 'v_type' : '<?php echo $this->request->query['v_type']; ?>' },
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
