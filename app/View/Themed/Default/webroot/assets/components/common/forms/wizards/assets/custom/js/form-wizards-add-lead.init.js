$(function()
{
	var bWizardTabClass = '';
	$('.wizard').each(function()
	{
		if ($(this).is('#rootwizard'))
			bWizardTabClass = 'bwizard-steps';
		else
			bWizardTabClass = '';

		var wiz = $(this);

		wiz.find("li").eq(1).css('display','none');
		wiz.find("li").eq(2).css('display','none');
		wiz.find("li").eq(3).css('display','none');
		wiz.find("li").eq(4).css('display','none');
		wiz.find("li").eq(5).css('display','none');


		$(this).bootstrapWizard(
		{
			onNext: function(tab, navigation, index)
			{
				if(index==1){

					if(!wiz.find('#ContactContactStatusId').val()) {
						alert('You must select Lead Type');
						wiz.find('#ContactContactStatusId').focus();
						return false;
					}

					if(!wiz.find('#ContactSalesStep').val()) {
						alert('You must select Step');
						wiz.find('#ContactSalesStep').focus();
						return false;
					}

					if(wiz.find('#ContactContactStatusId').val() == '6'
						&&  wiz.find('#ContactSalesStep').val()
						&& wiz.find('#ContactSalesStep').val() != '1'
					   	&&  !wiz.find('#ContactLeadCallTypes').val()
					) {

						alert('You must select Lead Call Type');
						wiz.find('#ContactLeadCallTypes').focus();
						return false;
					}


					if(!wiz.find('#ContactStatus').val()) {
						alert('You must select Status');
						wiz.find('#ContactStatus').focus();
						return false;
					}
					if(!wiz.find('#ContactLeadStatus').val()) {
						alert('You must select open/close');
						wiz.find('#ContactLeadStatus').focus();
						return false;
					}

					if(!wiz.find('#ContactFirstName').val()) {
						alert('You must enter first name');
						wiz.find('#ContactFirstName').focus();
						return false;
					}

					if(  wiz.find('#ContactValidationPalmer').val() == '1' && !wiz.find('#ContactLastName').val() ){
						alert('You must enter last name');
						wiz.find('#ContactLastName').focus();
						return false;
					}



					//VALIDATION FOR SOLD ITEMS
					if(wiz.find('#ContactSalesStep').val() && wiz.find('#ContactSalesStep').val() == '10' && wiz.find('#ContactAddressValidation').val() == 'On' ){
						if(!wiz.find('#ContactAddress').val() ){
							alert('You must enter address');
							wiz.find('#ContactAddress').focus();
							return false;
						}
						if(!wiz.find('#ContactCity').val() ){
							alert('You must enter city');
							wiz.find('#ContactCity').focus();
							return false;
						}
						if(!wiz.find('#ContactState').val() ){
							alert('You must select state');
							wiz.find('#ContactState').focus();
							return false;
						}
						if(!wiz.find('#ContactZip').val() ){
							alert('You must enter zip');
							wiz.find('#ContactZip').focus();
							return false;
						}
					}



					//validateGender
					if(!wiz.find('#ContactGender').val() && wiz.find('#ContactGenderRequired').val() == 'On' ){
						alert('You must select Gender');
						wiz.find('#ContactGender').focus();
						return false;
					}

					if(wiz.find('#ContactValidationPalmer').val() == '0'){

						if(!$.trim(wiz.find('#ContactMobile').val())) {
							alert('You must enter Cell');
							wiz.find('#ContactMobile').focus();
							return false;
						}else
						{
							value=wiz.find('#ContactMobile').val();
							if(!value.match(/^[0-9\-]+$/))
							{
								alert('Please enter a valid Cell number');
								wiz.find('#ContactMobile').focus();
								return false;
							}
						}
					}

					if(  wiz.find('#ContactValidationPalmer').val() == '1' ){

					 	if(!$.trim(wiz.find('#ContactWorkNumber').val())) {
							alert('You must enter work number');
							wiz.find('#ContactWorkNumber').focus();
							return false;
						}else
						{
							value=wiz.find('#ContactWorkNumber').val();
							if(!value.match(/^[0-9\-]+$/))
							{
								alert('Please enter a valid work number');
								wiz.find('#ContactWorkNumber').focus();
								return false;
							}
						}
					}



					if(wiz.find('#email_required').val() == 'On' && !wiz.find('#ContactEmail').val()   ) {
						alert('You must enter email');
						wiz.find('#ContactEmail').focus();
						return false;
					}


					/*if(!wiz.find('#ContactBestTime').val()) {
						alert('You must select Best Time');
						wiz.find('#ContactBestTime').focus();
						return false;
					}*/
					/*if(!wiz.find('#ContactBuyingTime').val()) {
						alert('You must select Buying Time');
						wiz.find('#ContactBuyingTime').focus();
						return false;
					}*/
					if(!wiz.find('#ContactSource').val()) {
						alert('You must select Source');
						wiz.find('#ContactSource').focus();
						return false;
					}

					/*if(!wiz.find('#ContactBestTime').val()) {
						alert('You must select Best Time');
						wiz.find('#ContactBestTime').focus();
						return false;
					}*/

					//console.log(  wiz.find('#ContactRequiredSecondFace').val()  );

					if(wiz.find('#ContactRequiredSecondFace').val() == 'On' && !wiz.find('#ContactSecondFace').val()   ) {
						alert('You must select Second Face');
						wiz.find('#ContactSecondFace').focus();
						return false;
					}


					if(  wiz.find('#ContactValidationPalmer').val() == '1' && !wiz.find('#ContactCompanyWork').val() ){
						alert('You must enter company name');
						wiz.find('#ContactCompanyWork').focus();
						return false;
					}







					wiz.find("li").eq(1).css('display','block');
					wiz.find("a[data-toggle*='tab']").eq(0).css('color','#8BBF61');
				}
				if(index==2){
					if(!wiz.find('#ContactCategory').val()) {
						alert('You must select Type');
						wiz.find('#ContactCategory').focus();
						return false;
					}
					if(!wiz.find('#ContactType').val()  && wiz.find('#ContactRequiredYearMakeModel').val() == 'On'  ) {
						alert('You must select Category');
						wiz.find('#ContactType').focus();
						return false;
					}
					if(!wiz.find('#ContactClass').val()  && wiz.find('#ContactRequiredYearMakeModel').val() == 'On'  ) {
						alert('You must select Class');
						wiz.find('#ContactClass').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ContactUnitValue').val())) {
						alert('You must enter Value/Unit');
						wiz.find('#ContactUnitValue').focus();
						return false;
					}else
					{
						value=wiz.find('#ContactUnitValue').val();
						value=$.trim(value).replace('$','');

						var num_unit_value = Number(value);
						if(!isNaN(num_unit_value) ){
							value = num_unit_value.toFixed(2);
						}else{
							alert('Please enter only numbers');
							wiz.find('#ContactUnitValue').focus();
							return false;
						}
						wiz.find('#ContactUnitValue').val(value);
					}

					if(wiz.find('#ContactSalesStep').val()){
                        // Removed per Dan's request
						if(wiz.find('#ContactSalesStep').val() == '10' && !wiz.find('#ContactStockNum').val() && wiz.find('#stock_num_required_sold').val() == 'On' ){
							alert('You must enter Stock');
							wiz.find('#ContactStockNum').focus();
							return false;
						}
                        
					}


					if(!wiz.find('#ContactCondition').val()  && wiz.find('#ContactRequiredYearMakeModel').val() == 'On'  ) {
						alert('You must select Condition');
						wiz.find('#ContactCondition').focus();
						return false;
					}
					if(!wiz.find('#ContactYear').val()  && wiz.find('#ContactRequiredYearMakeModel').val() == 'On'  ) {
						alert('You must select Year');
						wiz.find('#ContactYear').focus();
						return false;
					}
					if(!wiz.find('#ContactMake').val()  && wiz.find('#ContactRequiredYearMakeModel').val() == 'On'  ) {
						alert('You must select Make');
						wiz.find('#ContactMake').focus();
						return false;
					}
					if(!wiz.find('#ContactModel').val()  && wiz.find('#ContactRequiredYearMakeModel').val() == 'On'  ) {
						alert('You must select Model');
						wiz.find('#ContactModel').focus();
						return false;
					}
					// if(!wiz.find('#ContactType').val()) {
					// 	alert('You must select Unit Type');
					// 	wiz.find('#ContactType').focus();
					// 	return false;
					// }
					if(!wiz.find('#ContactOdometer').val().match(/^[0-9]*$/)) {
						alert('Miles value should be numeric');
						wiz.find('#ContactOdometer').focus();
						return false;
					}

					//validate OEM
					var oem_dealer = wiz.find('#oem_dealer_ids_text').val().indexOf( "'"+wiz.find('#ContactCompanyId').val()+"'" );
					var oem_make = wiz.find('#oem_makes_text').val().indexOf( "'"+wiz.find('#ContactMake').val()+"'" );

					if( oem_dealer != -1 &&  oem_make  != -1){

						bootbox.dialog({
							message: "<div  style='text-align: center'><strong>Please select customer type </strong><div>",
							title: "Add Lead",
							buttons: {
								success: {
									label: "OEM BMW Customer",
									className: "btn-success",
									callback: function() {
										$("#ContactOemBmwLocation").val("OEM BMW Customer");

										wiz.find("a[data-toggle*='tab']").eq(1).css('color','#8BBF61');
										wiz.find("li").eq(2).css('display','block');
										wiz.find("li").eq(3).css('display','block');
										wiz.find("a[data-toggle*='tab']").eq(2).trigger('click');
									}
								},
								danger: {
									label: "Location NO OEM",
									className: "btn-success",
									callback: function() {
										$("#ContactOemBmwLocation").val("Location NO OEM");

										wiz.find("a[data-toggle*='tab']").eq(1).css('color','#8BBF61');
										wiz.find("li").eq(2).css('display','block');
										wiz.find("li").eq(3).css('display','block');
										wiz.find("a[data-toggle*='tab']").eq(2).trigger('click');
									}
								}
							}
						});

						return false;
					}else{
						$("#ContactOemBmwLocation").val("");
					}


					wiz.find("a[data-toggle*='tab']").eq(1).css('color','#8BBF61');
					wiz.find("li").eq(2).css('display','block');
					wiz.find("li").eq(3).css('display','block');
				}
				if(index==3)
				{
					if(wiz.find('#ContactTypeTrade').val()) {
						if(!wiz.find('#ContactType').val())
						{
							alert('You must select Model');
							wiz.find('#ContactModel').focus();
							return false;
						}
						if(!wiz.find('#ContactClassTrade').val())
						{
							alert('You must select Class');
							wiz.find('#ContactClassTrade').focus();
							return false;
						}
						if(!wiz.find('#ContactYearTrade').val())
						{
							alert('You must select (Trade)Year');
							wiz.find('#ContactYearTrade').focus();
							return false;
						}
						if(!wiz.find('#ContactMakeTrade').val())
						{
							alert('You must select (Trade)Make');
							wiz.find('#ContactMakeTrade').focus();
							return false;
						}
						if(!wiz.find('#ContactModelTrade').val())
						{
							alert('You must select (Trade)Model');
							wiz.find('#ContactModelIdTrade').focus();
							return false;
						}
						if(!$.trim(wiz.find('#ContactTradeValue').val())) {
							alert('You must enter (Trade)Value');
							wiz.find('#ContactTradeValue').focus();
							return false;
						}else{

							value=wiz.find('#ContactTradeValue').val();
							value=$.trim(value).replace('$','');

							var num_unit_value = Number(value);
							if(!isNaN(num_unit_value) ){
								value = num_unit_value.toFixed(2);
							}else{
								alert('Please enter only numbers');
								wiz.find('#ContactTradeValue').focus();
								return false;
							}
							wiz.find('#ContactTradeValue').val(value);

						}
						if(!wiz.find('#ContactConditionTrade').val())
						{
							alert('You must select (Trade)Condition');
							wiz.find('#ContactConditionTrade').focus();
							return false;
						}

					}
				}
				if(index==4){
					if(!wiz.find('#ContactNotes').val()) {
						alert('You must enter Notes');
						wiz.find('#ContactNotes').focus();
						return false;
					}

					//validate  your location
					if(!wiz.find('#ContactYourLocation').val() && wiz.find('#location_names').val() == 'On' ){
						alert('You must select your location');
						wiz.find('#ContactYourLocation').focus();
						return false;
					}


					//validate  method of payment
					// if(!wiz.find('#ContactMethodOfPayment').val() && wiz.find('#validate_method_of_payment').val() == 'On' ){
					// 	alert('You must select method of payment');
					// 	wiz.find('#ContactMethodOfPayment').focus();
					// 	return false;
					// }



					wiz.find("a[data-toggle*='tab']").eq(3).css('color','#8BBF61');
					wiz.find("li").eq(4).css('display','block');
					wiz.find("li").eq(5).css('display','block');
				}

				if(index==5){




					var validate_event = true;
					if(wiz.find('#follow_up_24').val() == 'Off' && !wiz.find('#EventId').val()   ) {
						validate_event =  false;
					}
					if(validate_event == true){


						//tab five start
						if(!wiz.find('#EventEventTypeId').val()) {
							wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
							alert('You must select  Event Type');
							wiz.find('#EventEventTypeId').focus();
							return false;
						}
						if(!wiz.find('#EventStatus').val()) {
							wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
							alert('You must select Event Status');
							wiz.find('#EventStatus').focus();
							return false;
						}
						if(!wiz.find('#EventTitle').val()) {
							wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
							alert('You must enter Event Title');
							wiz.find('#EventTitle').focus();
							return false;
						}
						if(!wiz.find('#EventDetails').val()) {
							wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
							alert('You must enter Event Details');
							wiz.find('#EventDetails').focus();
							return false;
						}
						if(!wiz.find('#EventStartDate').val()) {
							wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
							alert('You must enter Start Date');
							wiz.find('#EventStartDate').focus();
							return false;
						}
						if(!wiz.find('#EventEndDate').val()) {
							wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
							alert('You must enter End Date');
							wiz.find('#EventEndDate').focus();
							return false;
						}

					}

					//wiz.find("li").eq(5).css('display','block');


				}


			},
			onLast: function(tab, navigation, index)
			{
				// Make sure we entered the title
				if(!wiz.find('#inputTitle').val()) {
					alert('You must enter the product title');
					wiz.find('#inputTitle').focus();
					return false;
				}
				wiz.find("li").eq(4).css('display','block');

			},
			onTabClick: function(tab, navigation, index)
			{


			},
			onTabShow: function(tab, navigation, index)
			{
				var $total = navigation.find('li:not(.status)').length;
				var $current = index+1;
				var $percent = ($current/$total) * 100;

				if (wiz.find('.progress-bar').length)
				{
					wiz.find('.progress-bar').css({width:$percent+'%'});
					wiz.find('.progress-bar')
						.find('.step-current').html($current)
						.parent().find('.steps-total').html($total)
						.parent().find('.steps-percent').html(Math.round($percent) + "%");
				}

				// update status
				if (wiz.find('.step-current').length) wiz.find('.step-current').html($current);
				if (wiz.find('.steps-total').length) wiz.find('.steps-total').html($total);
				if (wiz.find('.steps-complete').length) wiz.find('.steps-complete').html(($current-1));

				// mark all previous tabs as complete
				navigation.find('li:not(.status)').removeClass('primary');
				navigation.find('li:not(.status):lt('+($current-1)+')').addClass('primary');

				// If it's the last tab then hide the last button and show the finish instead
				if($current >= $total) {
					wiz.find('.pagination .next').hide();
					wiz.find('.pagination .finish').show();
					wiz.find('.pagination .finish').removeClass('disabled');
				} else {
					wiz.find('.pagination .next').show();
					wiz.find('.pagination .finish').hide();
				}
			},
			tabClass: bWizardTabClass,
			nextSelector: '.next',
			previousSelector: '.previous',
			firstSelector: '.first',
			lastSelector: '.last'
		});

		wiz.find('.finish').click(function()
		{

			//tab one start
			if(!wiz.find('#ContactContactStatusId').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Lead Type');
				wiz.find('#ContactContactStatusId').focus();
				return false;
			}


			if(!wiz.find('#ContactSalesStep').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Step');
				wiz.find('#ContactSalesStep').focus();
				return false;
			}


			if( wiz.find('#ContactContactStatusId').val() == '6' &&  !wiz.find('#ContactLeadCallTypes').val() ) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Lead Call Type');
				wiz.find('#ContactLeadCallTypes').focus();
				return false;
			}









			if(!wiz.find('#ContactStatus').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Status');
				wiz.find('#ContactStatus').focus();
				return false;
			}
			if(!wiz.find('#ContactLeadStatus').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select open/close');
				wiz.find('#ContactLeadStatus').focus();
				return false;
			}

			if(!wiz.find('#ContactFirstName').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter first name');
				wiz.find('#ContactFirstName').focus();
				return false;
			}

			if(wiz.find('#ContactValidationPalmer').val() == '1' && !wiz.find('#ContactLastName').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter last name');
				wiz.find('#ContactLastName').focus();
				return false;
			}




			//VALIDATION FOR SOLD ITEMS
			if(wiz.find('#ContactSalesStep').val() && wiz.find('#ContactSalesStep').val() == '10' && wiz.find('#ContactAddressValidation').val() == 'On'  ){
				if(!wiz.find('#ContactAddress').val() ){
					wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
					alert('You must enter address');
					wiz.find('#ContactAddress').focus();
					return false;
				}
				if(!wiz.find('#ContactCity').val() ){
					wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
					alert('You must enter city');
					wiz.find('#ContactCity').focus();
					return false;
				}
				if(!wiz.find('#ContactState').val() ){
					wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
					alert('You must select state');
					wiz.find('#ContactState').focus();
					return false;
				}
				if(!wiz.find('#ContactZip').val() ){
					wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
					alert('You must enter zip');
					wiz.find('#ContactZip').focus();
					return false;
				}
			}




			if(!wiz.find('#ContactGender').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Gender');
				wiz.find('#ContactGender').focus();
				return false;
			}

			if(wiz.find('#ContactValidationPalmer').val() == '0'){

				if(!$.trim(wiz.find('#ContactMobile').val())) {
					wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
					alert('You must enter Cell');
					wiz.find('#ContactMobile').focus();
					return false;
				}else
				{
					value=wiz.find('#ContactMobile').val();
					if(!value.match(/^[0-9\-]+$/))
					{
						wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
						alert('Please enter a valid Cell number');
						wiz.find('#ContactMobile').focus();
						return false;
					}
				}
			}


			if(wiz.find('#ContactValidationPalmer').val() == '1'){

				if(!$.trim(wiz.find('#ContactWorkNumber').val())) {
					wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
					alert('You must enter work number');
					wiz.find('#ContactWorkNumber').focus();
					return false;
				}else
				{
					value=wiz.find('#ContactWorkNumber').val();
					if(!value.match(/^[0-9\-]+$/))
					{
						wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
						alert('Please enter a valid work number');
						wiz.find('#ContactWorkNumber').focus();
						return false;
					}
				}
			}


			/*if(!wiz.find('#ContactBuyingTime').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Buying Time');
				wiz.find('#ContactBuyingTime').focus();
				return false;
			}*/
			if(!wiz.find('#ContactSource').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Source');
				wiz.find('#ContactSource').focus();
				return false;
			}

			if(wiz.find('#ContactRequiredSecondFace').val() == 'On' && !wiz.find('#ContactSecondFace').val()   ) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Second Face');
				wiz.find('#ContactSecondFace').focus();
				return false;
			}


			if(  wiz.find('#ContactValidationPalmer').val() == '1' && !wiz.find('#ContactCompanyWork').val() ){
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter company name');
				wiz.find('#ContactCompanyWork').focus();
				return false;
			}


			/*if(!wiz.find('#ContactBestTime').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Best Time');
				wiz.find('#ContactBestTime').focus();
				return false;
			}*/


			wiz.find("a[data-toggle*='tab']").eq(0).css('color','black');
			//tab one end

			//tab two start

			if(!wiz.find('#ContactCategory').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Type');
				wiz.find('#ContactCategory').focus();
				return false;
			}
			if(!wiz.find('#ContactType').val() && wiz.find('#ContactRequiredYearMakeModel').val() == 'On' ) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Category');
				wiz.find('#ContactType').focus();
				return false;
			}
			if(!wiz.find('#ContactClass').val() && wiz.find('#ContactRequiredYearMakeModel').val() == 'On' ) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Class');
				wiz.find('#ContactClass').focus();
				return false;
			}

			if(!$.trim(wiz.find('#ContactUnitValue').val())) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Value/Unit');
				wiz.find('#ContactUnitValue').focus();
				return false;
			}else
			{
				value=wiz.find('#ContactUnitValue').val()
				value=$.trim(value).replace('$','');
				wiz.find('#ContactUnitValue').val(value);
				if(!value.match(/^[0-9]+(\.[0-9]{2})?$/))
				{
					wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
					alert('Please enter non-negative value');
					wiz.find('#ContactUnitValue').focus();
					return false;
				}
			}

			if(wiz.find('#ContactSalesStep').val()){
                //Removed per Dan's Request
				if(wiz.find('#ContactSalesStep').val() == '10' && !wiz.find('#ContactStockNum').val() && wiz.find('#stock_num_required_sold').val() == 'On' ){
					wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
					alert('You must enter Stock');
					wiz.find('#ContactStockNum').focus();
					return false;
				}
                
			}

			if(!wiz.find('#ContactCondition').val() && wiz.find('#ContactRequiredYearMakeModel').val() == 'On' ) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Condition');
				wiz.find('#ContactCondition').focus();
				return false;
			}
			if(!wiz.find('#ContactYear').val() && wiz.find('#ContactRequiredYearMakeModel').val() == 'On' ) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Year');
				wiz.find('#ContactYear').focus();
				return false;
			}
			if(!wiz.find('#ContactMake').val() && wiz.find('#ContactRequiredYearMakeModel').val() == 'On' ) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Make');
				wiz.find('#ContactMake').focus();
				return false;
			}
			if(!wiz.find('#ContactModel').val() && wiz.find('#ContactRequiredYearMakeModel').val() == 'On' ) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Model');
				wiz.find('#ContactModel').focus();
				return false;
			}
			// if(!wiz.find('#ContactType').val()) {
			// 	wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
			// 	alert('You must select Unit Type');
			// 	wiz.find('#ContactType').focus();
			// 	return false;
			// }
			if(!wiz.find('#ContactOdometer').val().match(/^[0-9]*$/)) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('Miles value should be numeric');
				wiz.find('#ContactOdometer').focus();
				return false;
			}

			wiz.find("a[data-toggle*='tab']").eq(1).css('color','black');
			//tab two end

			//tab three start

					if(wiz.find('#ContactTypeTrade').val()) {
						if(!wiz.find('#ContactType').val())
						{
							wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
							alert('You must select Model');
							wiz.find('#ContactModel').focus();
							return false;
						}
						if(!wiz.find('#ContactClassTrade').val())
						{
							wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
							alert('You must select Class');
							wiz.find('#ContactClassTrade').focus();
							return false;
						}
						if(!wiz.find('#ContactYearTrade').val())
						{
							wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
							alert('You must select (Trade)Year');
							wiz.find('#ContactYearTrade').focus();
							return false;
						}
						if(!wiz.find('#ContactMakeTrade').val())
						{
							wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
							alert('You must select (Trade)Make');
							wiz.find('#ContactMakeTrade').focus();
							return false;
						}
						if(!wiz.find('#ContactModelTrade').val())
						{
							wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
							alert('You must select (Trade)Model');
							wiz.find('#ContactModelTrade').focus();
							return false;
						}
						if(!$.trim(wiz.find('#ContactTradeValue').val())) {
							wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
						alert('You must enter (Trade)Value');
						wiz.find('#ContactTradeValue').focus();
						return false;
						}else
						{
							value=wiz.find('#ContactTradeValue').val();
							value=$.trim(value).replace('$','');
							wiz.find('#ContactTradeValue').val(value);
							if(!value.match(/^[0-9]+(\.[0-9]{2})?$/))
							{
								wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
								alert('Please enter non-negative value in (Trade)Value');
								wiz.find('#ContactTradeValue').focus();
								return false;
							}
						}
						if(!wiz.find('#ContactConditionTrade').val())
						{
							wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
							alert('You must select (Trade)Condition');
							wiz.find('#ContactConditionTrade').focus();
							return false;
						}

					}

			wiz.find("a[data-toggle*='tab']").eq(2).css('color','black');
			//tab three end

			//tab four start
			if(!wiz.find('#ContactNotes').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Notes');
				wiz.find('#ContactNotes').focus();
				return false;
			}

			//validate  method of payment
			// if(!wiz.find('#ContactMethodOfPayment').val() && wiz.find('#validate_method_of_payment').val() == 'On' ){
			// 	wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
			// 	alert('You must select method of payment');
			// 	wiz.find('#ContactMethodOfPayment').focus();
			// 	return false;
			// }


			wiz.find("a[data-toggle*='tab']").eq(3).css('color','black');
			//tab four end


			var validate_event = true;
			if(wiz.find('#follow_up_24').val() == 'Off' && !wiz.find('#EventId').val()   ) {
				validate_event =  false;
			}
			if(validate_event == true){


				//tab five start
				if(!wiz.find('#EventEventTypeId').val()) {
					wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
					alert('You must select  Event Type');
					wiz.find('#EventEventTypeId').focus();
					return false;
				}
				if(!wiz.find('#EventStatus').val()) {
					wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
					alert('You must select Event Status');
					wiz.find('#EventStatus').focus();
					return false;
				}
				if(!wiz.find('#EventTitle').val()) {
					wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
					alert('You must enter Event Title');
					wiz.find('#EventTitle').focus();
					return false;
				}
				if(!wiz.find('#EventDetails').val()) {
					wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
					alert('You must enter Event Details');
					wiz.find('#EventDetails').focus();
					return false;
				}
				if(!wiz.find('#EventStartDate').val()) {
					wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
					alert('You must enter Start Date');
					wiz.find('#EventStartDate').focus();
					return false;
				}
				if(!wiz.find('#EventEndDate').val()) {
					wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
					alert('You must enter End Date');
					wiz.find('#EventEndDate').focus();
					return false;
				}
			}

			wiz.find("a[data-toggle*='tab']").eq(4).css('color','black');


			validate_email = true;
			if(wiz.find('#UserEmailSendEmail').is(":checked") == false  ) {
				validate_email =  false;
			}
			if(validate_email == true){

				if(!wiz.find('#ContactEmail').val()) {
					wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
					wiz.find('#ContactEmail').focus();
					alert('Please enter email');
					return false;
				}

				if(!wiz.find('#UserEmailSubject').val()) {
					wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
					wiz.find('#UserEmailSubject').focus();
					alert('Please enter subject');
					return false;
				}
			}
			wiz.find("a[data-toggle*='tab']").eq(5).css('color','black');





			//tab five end
			/*
			if(! confirm('Are you sure?') ) {
				return false;
			}else{
				$("#btn_finish_add_lead").hide();
			}
			 */

			 if(wiz.find('#ContactMgrSignoffCheck').val() == 'On') {

			 	if(!wiz.find('#ContactMgrSignoff').val()) {
					wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
					wiz.find('#ContactMgrSignoff').focus();
					alert('Please enter mgr signoff password');
					return false;
				}else{

					var mgr_password = wiz.find('#ContactMgrSignoff').val();
					console.log( mgr_password );

					$.ajax({
						type: "POST",
						url: "/users/validate_mgr",
						data: {'mgr_signoff': mgr_password},
						success: function(data){
							if( data != 'invalid'  ){

								$("#ContactMgrSignoffUserId").val( data );

								// Submit form start
								bootbox.dialog({
									message: "<div  style='text-align: center'><strong>Are you sure? </strong><div>",
									title: "Add Lead",
									buttons: {
										success: {
											label: "Yes",
											className: "btn-success",
											callback: function() {
												$("#btn_finish_add_lead").hide();
												$("#ContactLeadsInputForm").submit();
											}
										},
										danger: {
											label: "No",
											className: "btn-danger",
											callback: function() {

											}
										}
									}
								});
								// Submit form ends

							}else{

								wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
								wiz.find('#ContactMgrSignoff').focus();
								alert('Please enter a valid mgr signoff password');
								return false;

							}

						}
					});


					return false;
				}

			 }



			bootbox.dialog({
				message: "<div  style='text-align: center'><strong>Are you sure? </strong><div>",
				title: "Add Lead",
				buttons: {
					success: {
						label: "Yes",
						className: "btn-success",
						callback: function() {
							$("#btn_finish_add_lead").hide();
							$("#ContactLeadsInputForm").submit();
						}
					},
					danger: {
						label: "No",
						className: "btn-danger",
						callback: function() {

						}
					}
				}
			});

			return false;


















			//alert('Finished!, Starting over!');
			//wiz.find("button[type='submit']").removeClass('hide');
			//wiz.find("a[data-toggle*='tab']:first").trigger('click');
		});
	});
});
