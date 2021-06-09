$(function(){
	

	$("#btn_move_contact_mass").click(function(event){
		
		//validation
		error = "";
		if( $("#ContactUserIdFrom").val() == '' ){
			error += "Please select leads from \n";
		}
		if( $("#ContactUserIdTo").val() == '' ){
			error += "Please select leads to \n";
		}
		if( $("#ContactUserIdFrom").val() !='' && $("#ContactUserIdTo").val() != '' &&  $("#ContactUserIdFrom").val() == $("#ContactUserIdTo").val() ){
			error += "Leads from and to cannot be same \n";
		}
		if( $("#ContactNote").val() == '' ){
			error += "Please enter note \n";
		}

		
		if(error != ''){
			alert(error);
			return false;
		}
												  
  	});



});