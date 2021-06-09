(function ( $ ) {

	$(document).on("click", '.notification_modal_top', function(e) {
    	event.preventDefault();
	  	

	  	if( $( this ).next("ul").html()  ){
	  		var modal_html = "<ul class='notification_modal_list' style='list-style: none'>" + $( this ).next("ul").html()+ "</ul>";
	  		bootbox.dialog({
				message: modal_html,
				title: $( this ).attr("modal_title"),
				buttons: {
					success: {
						label: "Ok",
						className: "btn-success",
						callback: function() {
						}
					},
				}
			});

	  	}	
		  


	});


	


	
	function set_options(json_data, element){
		$(element).html('<option value="">Select</option>');
		$.each(json_data, function(i, item) {
			$(element).append('<option value="'+i.trim()+'">'+item+'</option>');
		});
	}
 
    $.inventory = function( options ) {
        var settings = $.extend({
			inventory_mode: null,
			no_sold: null,
			edit_mode: null,					
            input_type: null,
            input_category: null,
			input_make: null,
			btn_edit_make: null,	

			input_year: null,
			input_yearedit: null,
			
			input_model_id: null,
			input_model: null,
			input_class: null,
			
			btn_edit_model: null,
			
			input_unitColor_id: null,
			input_unitColor_fieldname: null,
			
			input_condition: null,
			input_stock: null,
			input_miles: null,
			input_vin: null,
			input_color: null,
			
			input_floor_plans : null,
			input_sleeps : null,
			input_fuel_type : null,
			
			input_UnitValue: null,
			input_Engine: null,

			input_odometer: null,
			input_branch_location: null,

			
			input_contactId: null,
			spec_container: null,

			input_edit_make_id: null,
			input_edit_make_fieldname: null,
			vehicle_selection_type_container : null,
			vehicle_unknown : null,


        }, options );
		
		var inventory_mode = settings.inventory_mode;
		
		var edit_mode = settings.edit_mode;
		
		var no_sold = settings.no_sold;
		
		var input_type = settings.input_type;
		var input_category = settings.input_category;
		var input_make = settings.input_make;
		var btn_edit_make = settings.btn_edit_make;
	

		var input_year = settings.input_year;
		var input_yearedit = settings.input_yearedit;

		
		var input_model_id = settings.input_model_id;
		var input_model = settings.input_model;
		var input_class = settings.input_class;
		var btn_edit_model = settings.btn_edit_model;
		
		var input_unitColor_id = settings.input_unitColor_id; // "#ContactUnitColor"
		var input_unitColor_fieldname = settings.input_unitColor_fieldname; //data[Contact][unit_color]
		
		var input_condition = settings.input_condition;
		var input_stock = settings.input_stock;
		var input_miles = settings.input_miles;
		var input_vin = settings.input_vin;
		var input_color = settings.input_color;

		var input_floor_plans = settings.input_floor_plans;
		var input_sleeps = settings.input_sleeps;
		var input_fuel_type = settings.input_fuel_type;
		
		
		var input_UnitValue = settings.input_UnitValue;
		var input_Engine = settings.input_Engine;
		var input_contactId = settings.input_contactId;
		var spec_container = settings.spec_container;

		var input_odometer = settings.input_odometer;
		var input_branch_location = settings.input_branch_location;

		var input_edit_make_id = settings.input_edit_make_id;
		var input_edit_make_fieldname = settings.input_edit_make_fieldname;
		var vehicle_selection_type_container = settings.vehicle_selection_type_container;
		var vehicle_unknown = settings.vehicle_unknown;

		// if(edit_mode == null){
			
		// 	if( $(input_type).val() == '' ){
		// 		$(input_type).val( 'In Stock' );
		// 	}
			
		// }


		$(vehicle_selection_type_container+' input:radio').click(function() {
			//console.log(input_type);
			$(input_type).html('<option value="">Loading...</option>');
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				data: {'vehicle_selection_type':$(this).val()},
				url:  "/categories/get_d_type/",
				success: function(data){
					set_options(data, input_type);
				}
			});

			//Reset type	
			$(input_type).val("");

			//Reset make	
			$(input_make).val("");
			
			//Reset year	
			$(input_year).val("");
			
			//Reset Model
			$(input_model_id).val("");
			$(input_model_id).show();
			$(input_model).hide();
			$(input_model).val("");

			//Reset Category
			$(input_category).val("");

			//Reset Class
			$(input_class).val("");

			
		});
		
		

		$(input_type).trigger('change');
		
		
		
		
		
		
		$(vehicle_unknown).on('change',function(){
			if(this.checked) {

        		$(input_make).html('<option value="Any Make" selected="selected" >Any Make</option>');
				$(input_category).html('<option value="Any Category" selected="selected" >Any Category</option>');
				$(input_class).html('<option value="Any Class" selected="selected" >Any Class</option>');

				$(input_model_id).hide();
				$(input_model).show();
				$(input_model_id).val("");
				$(input_model).val('Any Model');
				
				$(input_UnitValue).val('0.00');
				$(input_condition).val('Any');
				$(input_year).val('0');

				//$("input[name=mygroup]").val(5);
				$(vehicle_selection_type_container+' input:radio[value="Showroom"]').attr('checked', 'checked');


				$(input_type).html('<option value="">Loading...</option>');
				$.ajax({
					type: "get",
					cache: false,
					dataType: 'json',
					data: {'vehicle_selection_type':'Showroom'},
					url:  "/categories/get_d_type/",
					success: function(data){
						set_options(data, input_type);
						console.log(data);
						console.log( $("#default_d_type").attr("d_type") );
						$(input_type).val( $("#default_d_type").attr("d_type") );
					}
				});

    		}else{
    			$(input_type).val("");
    		}
		});
		
		
		
		
		
		//Model in text format
		$(input_model).on('change',function(){
			$(input_model_id).val("");
		});
		//Model edit button
		$(btn_edit_model).on('click',function(){

			var vehicle_selection_type = $(vehicle_selection_type_container+' input:radio:checked').val();

			$(input_model_id).toggle();
			$(input_model).toggle();
			
			if( $(input_model).is(':visible') ){

				//Load categories
				console.log("load categories ");

				$(input_model_id).val("");
				$("#ContactUnitColor").replaceWith('<input name="'+input_unitColor_fieldname+'" class="form-control" type="text" value="" id="'+$(input_unitColor_id).attr('id')+'">');
				
				
				//load classes based on types
				if(  $(input_type).val()  != '' ){
					$(input_category).html('<option value="">Loading...</option>');
					$.ajax({
						type: "get",
						cache: false,
						dataType: 'json',
						data: {'vehicle_selection_type' : vehicle_selection_type,  'type': $(input_type).val()},
						url:  "/categories/get_classes_type/",
						success: function(data){
							set_options(data, input_category);
						}
					});
	
				}

				if(input_condition == '#ContactConditionTrade'){
					$(input_condition).val( "Used"  );	
				}
				if(input_UnitValue == '#ContactTradeValue'){
					$(input_UnitValue).val( "0.00"  );	
				}
				
				
			}
			if( $(input_model_id).is(':visible') ){
				$(input_model).val("");
				//Load All Model
				$(input_year).trigger('change');
				
				
				
			}
		});
		

		$(input_yearedit).click(function(){
			year_select_option = '<option value="">Select Year</option>';
			year_select_option += '<option value="0">Any Year</option>';
			for(i=new Date().getFullYear()+1; i>=1980; i--){
				year_select_option += '<option value="'+i+'">'+i+'</option>';
			}
			$(input_year).html(year_select_option);
		});


		function make_dropdown(){
			if($(input_make).attr('type') == 'text'){
				//console.log("text_mode");
				$(input_make).replaceWith('<select name="'+input_edit_make_fieldname+'" style="width: 80%" class="form-control" id="'+input_edit_make_id+'" ><option value="">Select</option></select>');	
			}
		}

		$(btn_edit_make).click(function(){
			

			if($("#"+input_edit_make_id).attr('type') == 'text'){
				$("#"+input_edit_make_id).replaceWith('<select name="'+input_edit_make_fieldname+'" style="width: 80%" class="form-control" id="'+input_edit_make_id+'" ><option value="">Select</option></select>');	
				$(input_category).trigger("change");
			}else{
				$("#"+input_edit_make_id).replaceWith('<input name="'+input_edit_make_fieldname+'" style="width: 80%" class="form-control" type="text" value="" id="'+input_edit_make_id+'">');
			}

 
			year_select_option = '<option value="">Select Year</option>';
			year_select_option += '<option value="0">Any Year</option>';
			for(i=new Date().getFullYear()+1; i>=1980; i--){
				year_select_option += '<option value="'+i+'">'+i+'</option>';
			}
			//$(input_year).html(year_select_option);
		});













		
		
		
		//Model id change
				
		$(input_model_id).change(function(){
			model_txt = $(input_model_id+" option[value='"+$(input_model_id).val()+"']").text();
			//console.log(model_txt);
			if(model_txt == 'Select'){
				$(input_model).val(""); 
				$(input_unitColor_id).replaceWith('<input name="'+input_unitColor_fieldname+'" class="form-control" type="text" value="" id="'+$(input_unitColor_id).attr('id')+'">');
			}else{
				
				// console.log("reset model update");	

				var vehicle_selection_type = $(vehicle_selection_type_container+' input:radio:checked').val();
				//console.log(vehicle_selection_type);

				$(input_model).val(model_txt);
				console.log(model_txt);
				
				//for add/edit form
				if(input_condition != null){
					$(input_condition).val('New'); // pending
				}
				
				//set Unit value
				$.ajax({
					type: "get",
					cache: false,
					dataType:'JSON',
					data: {    'vehicle_selection_type': vehicle_selection_type , 'model_id':$(input_model_id).val()},
					url:  "/categories/vehicle_details/",
					success: function(data){
						
						if( vehicle_selection_type == 'Branch Inventory' ){

							//console.log(data);
							$(input_class).html(' <option value="">Select</option> <option value="Any Class"  >Any Class</option>   <option selected="selected" value="'+data.Class+'">'+data.Class+'</option>');
							// $(input_category).html(' <option value="">Select</option>  <option selected="selected" value="'+data.Category+'">'+data.Category+'</option>');
							$(input_category).val(data.Category);

							if(input_Engine != null){
								$(input_Engine).val( data.Engine  );
							}

							$(input_UnitValue).val( data.Price  );

							if( input_vin != null){
								$(input_vin).val( data.Vin  );
							}

							if( input_stock != null){
								$(input_stock).val( data.Stock_num  );
							}


							if( input_color != null){
								$(input_color).val( data.Color  );
							}
							$(input_condition).val( data.Condition  );

							if( input_odometer != null){
								$(input_odometer).val( data.Miles  );
							}
							if( input_branch_location != null){
								$(input_branch_location).val( data.Branch_location  );
							}

						}else if( vehicle_selection_type == 'In Stock' ){

							$(input_class).html(' <option value="">Select</option>  <option selected="selected" value="'+data.Model.bodysubtype+'">'+data.Model.bodysubtype+'</option>');
							//$(input_category).html(' <option value="">Select</option>  <option selected="selected" value="'+data.Model.category_name+'">'+data.Model.category_name+'</option>');	
							$(input_category).val(data.Model.category_name);
							
							$(input_UnitValue).val( data.Model.price  );
							$(input_condition).val( data.Model.condition  );
							if( input_stock != null){
								$(input_stock).val( data.Model.stocknumber  );
							}
							if( input_miles != null){
								$(input_miles).val( data.Model.miles  );
							}
							if( input_vin != null){
								$(input_vin).val( data.Model.vin  );
							}
							if( input_color != null){
								$(input_color).val( data.Model.color  );
							}

							if( input_floor_plans != null){
								$(input_floor_plans).val( data.Model.floor_plans  );
							}
							if( input_sleeps != null){
								$(input_sleeps).val( data.Model.sleeps  );
							}
							if( input_fuel_type != null){
								$(input_fuel_type).val( data.Model.fuel_type  );
							}
							
						}else{

							// console.log("Update category ");
							//console.log( data );

							$(input_class).html(' <option value="">Select</option>  <option selected="selected" value="'+data.Category.id+'">'+data.Category.body_sub_type+'</option>');
							//$(input_category).html(' <option value="">Select</option>  <option selected="selected" value="'+data.Category.body_type+'">'+data.Category.body_type+'</option>');
							$(input_category).val(data.Category.body_type);
							
							//reset unit value
							if(input_UnitValue != null){
								$(input_UnitValue).val("");
							}
							
							if(data.Trim != null){
								$(input_UnitValue).val( data.Trim.msrp  );
								//set engine value
								if(input_Engine != null){
									$(input_Engine).val( data.Engine  );
								}
								$cnt = Object.keys(data.Color).length;
								if($cnt == 1){
									color_single = "";
									$.each(data.Color, function(i, item){
										color_single =  i ;
									});
									$(input_unitColor_id).replaceWith('<input name="'+input_unitColor_fieldname+'" class="form-control" type="text" value="'+color_single+'" id="'+$(input_unitColor_id).attr('id')+'">');
								}else{
									select_option = '<select style="width: 100%" id="'+$(input_unitColor_id).attr('id')+'" name="'+input_unitColor_fieldname+'" class="form-control"><option value="">Select</option>';
									$.each(data.Color, function(i, item){
										select_option += '<option value="'+i+'">'+i+'</option>';
									});
									select_option += '</select>';
									$(input_unitColor_id).replaceWith(select_option);
								}
							}

							if(input_condition == '#ContactConditionTrade'){
								$(input_condition).val( "Used"  );	
							}
						
						}
						
						
					}
				});
				
				if(spec_container != null && input_contactId != null && vehicle_selection_type == 'Branch Inventory' ){
					$(spec_container).html("");
					
				}else if(spec_container != null && input_contactId != null && vehicle_selection_type != 'In Stock' ){
					$(spec_container).html("");
					$.ajax({
						type: "get",
						url:  "/categories/get_specification/"+$(input_model_id).val()+"/"+$(input_contactId).val(),
						success: function(data){
							$(spec_container).html( data );
						}
					});
				}
				
				if(spec_container != null && input_contactId != null && vehicle_selection_type == 'In Stock' ){
					$(spec_container).html("");
					$.ajax({
						type: "get",
						url:  "/categories/get_specification_xml/"+$(input_model_id).val()+"/"+$(input_contactId).val(),
						success: function(data){
							$(spec_container).html( data );
						}
					});
				}
				
				
			}
		});
		
		function load_categoreis(){

			var vehicle_selection_type = $(vehicle_selection_type_container+' input:radio:checked').val();
			//Load Categories
			if(input_category){
				$(input_category).html('<option value="">Loading...</option>');
				$.ajax({
					type: "get",
					cache: false,
					dataType: 'json',
					data: {'no_sold':no_sold, 'vehicle_selection_type' : vehicle_selection_type, 'type': $(input_type).val()},
					url:  "/categories/get_classes_type/",
					success: function(data){
						set_options(data, input_category);
					}
				});

			}

		}

		//Type Change
		$(input_type).on('change',function(e) {

			var vehicle_selection_type = $(vehicle_selection_type_container+' input:radio:checked').val();

			if($(this).val() != ''){


				$(input_make).html('<option value="">Loading...</option>');
				$.ajax({
					type: "get",
					cache: false,
					dataType: 'json',
					data: {'no_sold':no_sold, 'vehicle_selection_type' : vehicle_selection_type, 'type': $(input_type).val()},
					url:  "/categories/get_make_n/",
					success: function(data){

						make_dropdown();
						set_options(data, input_make);

						load_categoreis(); 
						

					}
				});

			}

			//Reset year	
			$(input_year).val("");

			//Reset Model
			$(input_model_id).val("");
			$(input_model_id).show();
			$(input_model).hide();
			$(input_model).val("");

			//Reset Category
			$(input_category).val("");

			//Reset Class
			$(input_class).val("");
	    });
		
		//Category Change
		$(input_category).on('change',function(){

			var vehicle_selection_type = $(vehicle_selection_type_container+' input:radio:checked').val();

			console.log(vehicle_selection_type);

			if($(this).val() != '' && $(input_category).val() == 'Any Category' && vehicle_selection_type != 'In Stock' ){	

				$(input_class).html('<option value="Any Class" selected="selected" >Any Class</option>');

			}else if($(this).val() != ''){
				
				$(input_class).html('<option value="">Loading...</option>');
				$.ajax({
					type: "get",
					cache: false,
					dataType: 'json',
					data: {'no_sold':no_sold, 'vehicle_selection_type' : vehicle_selection_type,  'type': $(input_type).val(),  'category':$(input_category).val() },
					url:  "/categories/get_classes/",
					success: function(data){
						set_options(data, input_class);	
					}
				});
			}









		});
		
		//Make Change
		$(document).on('change', input_make ,function(){
			
			if($(this).val() != '' && $(input_type).val() != '' ){

				if( $(input_make).val() == 'Any Make' ){

					$(input_model_id).hide();
					$(input_model).show();
					$(input_model_id).val("");
					$(input_model).val('Any Model');

					$(input_category).val('Any Category');

					// $(input_category).html('<option value="Any Category" selected="selected" >Any Category</option>');
					$(input_class).html('<option value="Any Class" selected="selected" >Any Class</option>');


					$(input_UnitValue).val('0.00');
					$(input_condition).val('Any');

					$(input_year).val(0);


				}else{


					var vehicle_selection_type = $(vehicle_selection_type_container+' input:radio:checked').val();					
					$(input_year).html('<option value="">Loading...</option>');
					$.ajax({
						type: "get",
						cache: false,
						dataType: 'json',
						data: {'no_sold':no_sold, 'vehicle_selection_type' : vehicle_selection_type , 'make' : $(input_make).val()  ,'type': $(input_type).val()},
						url:  "/categories/get_year_n/",
						success: function(data){
							set_options(data, input_year);
						}
					});

				}

			}

			//Reset year	
			$(input_year).val("");
			
			//Reset Model
			$(input_model_id).val("");
			$(input_model_id).show();
			$(input_model).hide();
			$(input_model).val("");

			//Reset Category
			// $(input_category).val("");

			//Reset Class
			// $(input_class).val("");


		});
		
		//year change
		$(input_year).on('change',function(){

			var vehicle_selection_type = $(vehicle_selection_type_container+' input:radio:checked').val();

			$(input_model_id).val("");
			$(input_model_id).show();
			$(input_model).hide();
			$(input_model).val("");
			
			if($(this).val() != '0' &&  $(input_type).val() != ''){
				

				var vehicle_selection_type = $(vehicle_selection_type_container+' input:radio:checked').val();

				$(input_model_id).val("");
				$(input_model_id).show();
				$(input_model).hide();
				$(input_model).val("");

				$(input_model_id).html('<option value="">Loading...</option>');
				$.ajax({
					type: "get",
					cache: false,
					dataType: 'json',
					data: {'no_sold':no_sold, 'vehicle_selection_type' : vehicle_selection_type,  'type': $(input_type).val(),'year': $(input_year).val(), 'make' : $(input_make).val() },
					url:  "/categories/get_model_n/",
					success: function(data){
						set_options(data, input_model_id);
					}
				});


			}
			if($(this).val() == '0'){
				//Set any to all inputs

				// $(input_category).html('<option value="Any Category" selected="selected" >Any Category</option>');
				$(input_class).html('<option value="Any Class" selected="selected" >Any Class</option>');

				$(input_category).val('Any Category');


				$(input_model_id).hide();
				$(input_model).show();
				$(input_model_id).val("");
				$(input_model).val('Any Model');
				
				$(input_UnitValue).val('0.00');
				$(input_condition).val('Any');
				
			} 


		});
		
		
		
        return true
    };
	
	
 
}( jQuery ));