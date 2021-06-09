(function ( $ ) {

	function set_options(json_data, element){
		$(element).html('<option value="">Select</option>');
		$.each(json_data, function(i, item) {
			$(element).append('<option value="'+i.trim()+'">'+item+'</option>');
		});
	}
	
	function set_model_options(json_data, element){
		$(element).html('<option value="">Select</option>');
		$.each(json_data, function(i, item) {
			$(element).append('<option value="'+item+'">'+item+'</option>');
		});
	}
 
    $.autoresponder_inventory = function( options ) {
        var settings = $.extend({
			inventory_mode: null,
			input_type: null,
          	input_make: null,
			input_year: null,
			input_model: null,
			input_category: null,
			input_class: null,
			no_sold : null,
			input_model: null
		}, options );
		
		var inventory_mode = settings.inventory_mode;
		var no_sold = settings.no_sold;
		var input_type = settings.input_type;
		var input_make = settings.input_make;
		var input_year = settings.input_year;
		var input_model_id = settings.input_model_id;
		var input_model = settings.input_model;	
		var input_category = settings.input_category;
		var input_class = settings.input_class;		
		
		
		//Type Change
		$(document).on('change','.'+input_type,function(e) {
			
			$input_type =  '#'+$(this).attr('id');
			data_id = $(this).attr('data-id');
			$input_make = '#'+input_make+data_id;
			$input_year = '#'+input_year+data_id;
			$input_model_id = '#'+input_model_id+data_id;
			$input_model = '#'+input_model+data_id;
			$input_category = '#'+input_category+data_id;
			$input_class = '#'+input_class+data_id;
			
			var vehicle_selection_type = 'Showroom';

			if($(this).val() != ''){

				$($input_make).html('<option value="">Loading...</option>');
				$.ajax({
					type: "get",
					cache: false,
					dataType: 'json',
					data: {'no_sold':no_sold, 'vehicle_selection_type' : vehicle_selection_type, 'type': $($input_type).val()},
					url:  "/categories/get_make_n/",
					success: function(data){

						set_options(data, $input_make);
						load_categoreis(data_id);
					}
				});

			}

			//Reset year	
			$($input_year).val("");

			//Reset Model
			$($input_model_id).val("");
			$($input_model).val("");
			$($input_category).val("");
			$($input_class).val("");
			
	    });
		
		
		// Make Change
		
		
		//Make Change
		$(document).on('change', '.'+input_make ,function(){
			
			$input_make =  '#'+$(this).attr('id');
			data_id = $(this).attr('data-id');
			$input_type = '#'+input_type+data_id;
			$input_year = '#'+input_year+data_id;
			$input_model_id = '#'+input_model_id+data_id;
			$input_model = '#'+input_model+data_id;
			$input_category = '#'+input_category+data_id;
			$input_class = '#'+input_class+data_id;
			
			
			if($(this).val() != '' && $($input_type).val() != '' ){

				if( $($input_make).val() == 'Any Make' ){

					$($input_model_id).html('<option value="Any Model" selected="selected" >Any Model</option>');
					$($input_year).val(0);
					$($input_category).val('Any Category');
					$($input_model).val('Any Model');
					$($input_class).html('<option value="Any Class" selected="selected" >Any Class</option>');
					


				}else{


					var vehicle_selection_type = 'Showroom'					
					$($input_year).html('<option value="">Loading...</option>');
					$.ajax({
						type: "get",
						cache: false,
						dataType: 'json',
						data: {'no_sold':no_sold, 'vehicle_selection_type' : vehicle_selection_type , 'make' : $($input_make).val()  ,'type': $($input_type).val()},
						url:  "/categories/get_year_n/",
						success: function(data){
							set_options(data, $input_year);
						}
					});

				}

			}

			//Reset year	
			$($input_year).val("");
			
			//Reset Model
			$($input_model_id).val("");
			$($input_model).val("");
			
			$($input_category).val("");
			$($input_class).val("");
			

		});
		
		//year change
		$(document).on('change','.'+input_year,function(){
			var vehicle_selection_type = 'Showroom';
			$input_year =  '#'+$(this).attr('id');
			
			data_id = $(this).attr('data-id');
			$input_type = '#'+input_type+data_id;
			$input_make = '#'+input_make+data_id;
			$input_model_id = '#'+input_model_id+data_id;
					
			$($input_model_id).val("");
			
			if($(this).val() != '0' &&  $($input_type).val() != ''){
				

		
				$($input_model_id).val("");
				
				$($input_model_id).html('<option value="">Loading...</option>');
				$.ajax({
					type: "get",
					cache: false,
					dataType: 'json',
					data: {'no_sold':no_sold, 'vehicle_selection_type' : vehicle_selection_type,  'type': $($input_type).val(),'year': $($input_year).val(), 'make' : $($input_make).val() },
					url:  "/categories/get_model_n/",
					success: function(data){
						set_options(data, $input_model_id);
					}
				});


			}
			if($(this).val() == '0'){
				//Set any to all inputs

				 $($input_model_id).html('<option value="Any Model" selected="selected" >Any Model</option>');
				
				$($input_model).val("Any Model");
				$($input_category).val("Any Category");
				$($input_class).val("Any Class");
				
				
			}else{
				$($input_model_id).val('');
				$($input_model).val('');
				$($input_category).val("");
				$($input_class).val("");
			}

		});
		

		//Category Change
		$(document).on('change','.'+input_category,function(){

			var vehicle_selection_type = 'Showroom';
			$input_category = $(this).attr('id');
			data_id = $(this).attr('data-id');
			$input_type = '#'+input_type+data_id;
			$input_class = '#'+input_class+data_id;

			

			if($($input_category).val() == 'Any Category'){	
				$($input_class).html('<option value="Any Class" selected="selected" >Any Class</option>');

			}else if($(this).val() != ''){
				
				$($input_class).html('<option value="">Loading...</option>');
				$.ajax({
					type: "get",
					cache: false,
					dataType: 'json',
					data: {'no_sold':no_sold, 'vehicle_selection_type' : vehicle_selection_type,  'type': $($input_type).val(),  'category':$($input_category).val() },
					url:  "/categories/get_classes/",
					success: function(data){
						set_options(data, $input_class);	
					}
				});
			}
		});
		

		//Model id change
				
		$(document).on('change','.'+input_model_id,function(){
			$input_model_id =  '#'+$(this).attr('id');		
			data_id = $(this).attr('data-id');
			$input_type = '#'+input_type+data_id;
			$input_make = '#'+input_make+data_id;
			$input_category = '#'+input_category+data_id;
			$input_class = '#'+input_class+data_id;
			$input_model = '#'+input_model+data_id;
			
			model_txt = $($input_model_id+" option[value='"+$($input_model_id).val()+"']").text();
			//console.log(model_txt);
			if(model_txt == 'Select'){
				 
				 $($input_model).val(""); 
				}else{
				
				// console.log("reset model update");	
				$($input_model).val(model_txt);
				var vehicle_selection_type = 'Showroom';
								
				//set Unit value
				$.ajax({
					type: "get",
					cache: false,
					dataType:'JSON',
					data: {    'vehicle_selection_type': vehicle_selection_type , 'model_id':$($input_model_id).val()},
					url:  "/categories/vehicle_details/",
					success: function(data){
						
							

							$($input_class).html(' <option value="">Select</option>  <option selected="selected" value="'+data.Category.body_sub_type+'">'+data.Category.body_sub_type+'</option>');
							//$(input_category).html(' <option value="">Select</option>  <option selected="selected" value="'+data.Category.body_type+'">'+data.Category.body_type+'</option>');
							$($input_category).val(data.Category.body_type);			
											
											
					}
				});		
				
				
				
			}
		});
		

		
		
		
		function load_categoreis(data_id){

			var vehicle_selection_type = 'Showroom';
			//Load Categories
			//no_sold = 'yes';
			$input_category = '#'+input_category+data_id;
			$input_type = '#'+input_type+data_id;
			if($input_category){
				$($input_category).html('<option value="">Loading...</option>');
				$.ajax({
					type: "get",
					cache: false,
					dataType: 'json',
					data: {'no_sold':no_sold, 'vehicle_selection_type' : vehicle_selection_type, 'type': $($input_type).val()},
					url:  "/categories/get_classes_type/",
					success: function(data){
						set_options(data, $input_category);
					}
				});
			}

		}
		
		
		
		
        return true
    };
	
	
 
}( jQuery ));