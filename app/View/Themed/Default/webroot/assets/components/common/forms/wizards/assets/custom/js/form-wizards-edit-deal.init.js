$(function()
{
	$(".money_amount").on('change',function()
	{
		value=$(this).val();
		value=$.trim(value).replace('$','');
		$(this).val(value);
		if(!value.match(/^[0-9]+(\.[0-9]+)?$/))
		{
			field=$(this).prev('label').text();
			alert('Please enter a correct money amount in '+field);
			$(this).focus();
		}
	});
	
	
	var bWizardTabClass = '';
	$('.wizard').each(function()
	{
		if ($(this).is('#rootwizard'))
			bWizardTabClass = 'bwizard-steps';
		else
			bWizardTabClass = '';

		var wiz = $(this);
		
		$(this).bootstrapWizard(
		{
			onNext: function(tab, navigation, index) 
			{
				valid=true;
				$("div#tab"+index+"-1").find(".money_amount").each(function(){
													
												 value=$(this).val();
											     value=$.trim(value).replace('$','');
												 $(this).val(value);
												if(!value.match(/^[0-9]+(\.[0-9]+)?$/))
												{
													field=$(this).prev('label').text();
													alert('Please enter a correct money amount in '+field);
													
													$(this).focus();
													valid=false;
													
												}
												
												});
				
				if(!valid)
				{
					return false;
				}
				
				if(index==1){
					
					
					
					
					/*if(!wiz.find('#DealSuffix').val()) {
						alert('You must select Suffix');
						wiz.find('#DealSuffix').focus();
						return false;
					}*/
					
					/*
					if(!$.trim(wiz.find('#DealFirstName').val())) {
						alert('You must enter first name');
						wiz.find('#DealFirstName').focus();
						return false;
					}
					if(!wiz.find('#DealGender').val()) {
						alert('You must select Gender');
						wiz.find('#DealGender').focus();
						return false;
					}
					if(!$.trim(wiz.find('#DealMobile').val())) {
						alert('You must enter Cell');
						wiz.find('#DealMobile').focus();
						return false;
					}else
					{
						value=wiz.find('#DealMobile').val();
						if(!value.match(/^[0-9\-]+$/))
						{
							alert('Please enter a valid Cell number');
							wiz.find('#DealMobile').focus();
							return false;
						}
					}
					if($.trim(wiz.find('#DealPhone').val()))
					{
						value=wiz.find('#DealPhone').val();
						if(!value.match(/^[0-9\-]+$/))
						{
							alert('Please enter a valid Phone');
							wiz.find('#DealPhone').focus();
							return false;
						}
						
					}
					if($.trim(wiz.find('#DealEmail').val()))
					{
						value=wiz.find('#DealEmail').val();
						if(!value.match(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i))
						{
							alert('Please enter a valid Email');
							wiz.find('#DealEmail').focus();
							return false;
						}
						
					}
					
					if(!wiz.find('#DealDriverLicExp').val()) {
						alert('You must enter Driver Lic Exp');
						wiz.find('#DealDriverLicExp').focus();
						return false;
					}else
					{
						value=wiz.find('#DealDriverLicExp').val();
						if(!value.match(/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/))
						{
							alert('Please enter a valid Driver Lic Exp');
							wiz.find('#DealDriverLicExp').focus();
							return false;
						}
					}
					
					if(!wiz.find('#DealDob').val()) {
						alert('You must enter DOB');
						wiz.find('#DealDob').focus();
						return false;
					}else
					{
						value=wiz.find('#DealDob').val();
						if(!value.match(/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/))
						{
							alert('Please enter a valid DOB');
							wiz.find('#DealDob').focus();
							return false;
						}
					}
					if(!$.trim(wiz.find('#DealAddress2').val())) {
						alert('You must enter Address (2)');
						wiz.find('#DealAddress2').focus();
						return false;
					}
					if(!$.trim(wiz.find('#DealCity2').val())) {
						alert('You must enter City (2)');
						wiz.find('#DealCity2').focus();
						return false;
					}
					if(!$.trim(wiz.find('#DealZip2').val())) {
						alert('You must enter Zip (2)');
						wiz.find('#DealZip2').focus();
						return false;
					}
					*/
				
					
				}
				if(index==2){
					
					
					
				/*	
					
					if(!wiz.find('#DealResidenceStatus').val()) {
						alert('You must enter Residence Status:');
						wiz.find('#DealResidenceStatus').focus();
						return false;
					}
					if(!wiz.find('#DealMortgageMonthAmount').val()) {
						alert('You must enter Mortgage Month Amount');
						wiz.find('#DealMortgageMonthAmount').focus();
						return false;
					}
					if(!wiz.find('#DealMainJob').val()) {
						alert('You must enter Main Occupation');
						wiz.find('#DealMainJob').focus();
						return false;
					}
					if(!wiz.find('#DealJobLength').val()) {
						alert('You must select Job Length');
						wiz.find('#DealJobLength').focus();
						return false;
					}
					if(!wiz.find('#DealPreviousEmployerLength').val()) {
						alert('You must enter Previous Job Length');
						wiz.find('#DealPreviousEmployerLength').focus();
						return false;
					}
					if(!wiz.find('#DealPreviousEmployerNumber').val()) {
						alert('You must enter Previous Work#');
						wiz.find('#DealPreviousEmployerNumber').focus();
						return false;
					}
					if(!wiz.find('#DealOtherIncome').val()) {
						alert('You must enter Other Income');
						wiz.find('#DealOtherIncome').focus();
						return false;
					}
					if(!wiz.find('#DealOtherEmployer').val()) {
						alert('You must enter Other Employer');
						wiz.find('#DealOtherEmployer').focus();
						return false;
					}
					if(!wiz.find('#DealOtherYearly').val()) {
						alert('You must enter Other Yearly');
						wiz.find('#DealOtherYearly').focus();
						return false;
					}
				
					
				*/
				
				}
				if(index==3){
					
					/*
					
					if(!wiz.find('#DealCoSuffix').val()) {
						alert('You must enter Co-Suffix');
						wiz.find('#DealCoSuffix').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerFname').val()) {
						alert('You must enter Co-First Name');
						wiz.find('#DealCobuyerFname').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerGender').val()) {
						alert('You must enter Co-Gender');
						wiz.find('#DealCobuyerGender').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerMobile').val()) {
						alert('You must enter Co-Cell');
						wiz.find('#DealCobuyerMobile').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerLicenceExp').val()) {
						alert('You must enter Co-Driver Lic Exp');
						wiz.find('#DealCobuyerLicenceExp').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerSsn').val()) {
						alert('You must enter Co-Social Secuirty#');
						wiz.find('#DealCobuyerSsn').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerDob').val()) {
						alert('You must enter Co-DOB');
						wiz.find('#DealCobuyerDob').focus();
						return false;
					}
					if(!wiz.find('#DealCoAddress').val()) {
						alert('You must enter Co-Address (2)');
						wiz.find('#DealCoAddress').focus();
						return false;
					}
					if(!wiz.find('#DealCoCity').val()) {
						alert('You must enter Co-City (2)');
						wiz.find('#DealCoCity').focus();
						return false;
					}
					if(!wiz.find('#DealCoZip').val()) {
						alert('You must enter Co-Zip (2)');
						wiz.find('#DealCoZip').focus();
						return false;
					}
					
					*/
					
				}
				if(index==4){
					
					/*
					
					if(!wiz.find('#DealCobuyerResidenceStatus').val()) {
						alert('You must enter Co-Residence Status');
						wiz.find('#DealCobuyerResidenceStatus').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerMonthlyMortgage').val()) {
						alert('You must enter Co-Mortgage Month Amount');
						wiz.find('#DealCobuyerMonthlyMortgage').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerMainJob').val()) {
						alert('You must enter Co-Main Occupation');
						wiz.find('#DealCobuyerMainJob').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerJobLength').val()) {
						alert('You must enter Co-Job Length');
						wiz.find('#DealCobuyerJobLength').focus();
						return false;
					}
					if(!wiz.find('#DealCoPreviousEmployerLength').val()) {
						alert('You must enter Co-Previous Job Length');
						wiz.find('#DealCoPreviousEmployerLength').focus();
						return false;
					}
					if(!wiz.find('#DealCoPreviousEmployerNumber').val()) {
						alert('You must enter Co-Previous Work');
						wiz.find('#DealCoPreviousEmployerNumber').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerOtherIncome').val()) {
						alert('You must enter Co-Other Income');
						wiz.find('#DealCobuyerOtherIncome').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerOtherEmployer').val()) {
						alert('You must enter Co-Other Employer');
						wiz.find('#DealCobuyerOtherEmployer').focus();
						return false;
					}
					if(!wiz.find('#DealCobuyerOtherIncomeYearly').val()) {
						alert('You must enter Co-Other Yearly');
						wiz.find('#DealCobuyerOtherIncomeYearly').focus();
						return false;
					}
					
					*/
				}
				if(index==5){
					/*
					if(!wiz.find('#DealRef1Name').val()) {
						alert('You must enter Ref #1 Name');
						wiz.find('#DealRef1Name').focus();
						return false;
					}
					if(!wiz.find('#DealRef1Phone').val()) {
						alert('You must enter Ref #1 Phone');
						wiz.find('#DealRef1Phone').focus();
						return false;
					}
					if(!wiz.find('#DealRef1City').val()) {
						alert('You must enter Ref #1 City');
						wiz.find('#DealRef1City').focus();
						return false;
					}
					if(!wiz.find('#DealRef1State').val()) {
						alert('You must enter Ref #1 State');
						wiz.find('#DealRef1State').focus();
						return false;
					}
					if(!wiz.find('#DealRef2Name').val()) {
						alert('You must enter Ref #2 Name');
						wiz.find('#DealRef2Name').focus();
						return false;
					}
					if(!wiz.find('#DealRef2Phone').val()) {
						alert('You must enter Ref #2 Phone');
						wiz.find('#DealRef2Phone').focus();
						return false;
					}
					if(!wiz.find('#DealRef2City').val()) {
						alert('You must enter Ref #2 City');
						wiz.find('#DealRef2City').focus();
						return false;
					}
					if(!wiz.find('#DealRef2State').val()) {
						alert('You must enter Ref #2 State');
						wiz.find('#DealRef2State').focus();
						return false;
					}
					if(!wiz.find('#DealRef3Name').val()) {
						alert('You must enter Ref #3 Name');
						wiz.find('#DealRef3Name').focus();
						return false;
					}
					if(!wiz.find('#DealRef3Phone').val()) {
						alert('You must enter Ref #3 Phone');
						wiz.find('#DealRef3Phone').focus();
						return false;
					}
					if(!wiz.find('#DealRef3City').val()) {
						alert('You must enter Ref #3 City');
						wiz.find('#DealRef3City').focus();
						return false;
					}
					if(!wiz.find('#DealRef3State').val()) {
						alert('You must enter Ref #3 State');
						wiz.find('#DealRef3State').focus();
						return false;
					}
					*/
				}
				if(index==6){
					
					/*
					
					if(!wiz.find('#DealUnitValue').val()) {
						alert('You must enter Value/Unit:');
						wiz.find('#DealUnitValue').focus();
						return false;
					}
					if(!wiz.find('#DealStockNum').val()) {
						alert('You must enter Stock#');
						wiz.find('#DealStockNum').focus();
						return false;
					}
					if(!wiz.find('#DealCondition').val()) {
						alert('You must enter Condition:');
						wiz.find('#DealCondition').focus();
						return false;
					}
					if(!wiz.find('#DealYear').val()) {
						alert('You must select Year');
						wiz.find('#DealYear').focus();
						return false;
					}
					if(!wiz.find('#DealMake').val()) {
						alert('You must select Make:');
						wiz.find('#DealMake').focus();
						return false;
					}
					if(!wiz.find('#DealModel').val()) {
						alert('You must enter Model');
						wiz.find('#DealModel').focus();
						return false;
					}
					if($.trim(wiz.find('#DealOdometer').val())) {
						
						value=wiz.find('#DealOdometer').val();
						if(!value.match(/^[0-9]+$/))
						{
							alert('Please enter numeric value in Miles');
							wiz.find('#DealOdometer').focus();
							return false;
						}
					}
					if($.trim(wiz.find('#DealOdometerTrade').val())) {
						
						value=wiz.find('#DealOdometerTrade').val();
						if(!value.match(/^[0-9]+$/))
						{
							alert('Please enter numeric value in (Trade) Miles');
							wiz.find('#DealOdometerTrade').focus();
							return false;
						}
					}
					
					*/
				}
				if(index==7){
					/*	
					if(!wiz.find('#edit_options_type_condition').val()) {
						alert('You must select FIXED FEE / PAYMENT');
						wiz.find('#edit_options_type_condition').focus();
						return false;
					}
					*/
					
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

		wiz.find('.finish').click(function(tab) 
		{
			valid=true;
			$(".money_amount").each(function(){
												 value=$(this).val();
											     value=$.trim(value).replace('$','');
												 $(this).val(value);
												if(!value.match(/^[0-9]+(\.[0-9]+)?$/))
												{
													field=$(this).prev('label').text();
													alert('Please enter a correct money amount in '+field);
													$(this).focus();
													valid= false;
													return false;
												}
												});
			if(!valid)
				{
					return false;
				}
			// Tab 1 Start
			/*if(!wiz.find('#DealSuffix').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Suffix');
				wiz.find('#DealSuffix').focus();
				return false;
			}*/
			
			/*
			
			
			if(!wiz.find('#DealFirstName').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter first name');
				wiz.find('#DealFirstName').focus();
				return false;
			}
			if(!wiz.find('#DealGender').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must select Gender');
				wiz.find('#DealGender').focus();
				return false;
			}
			if(!wiz.find('#DealMobile').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter Cell');
				wiz.find('#DealMobile').focus();
				return false;
			}
			if(!wiz.find('#DealDriverLicExp').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter Driver Lic Exp');
				wiz.find('#DealDriverLicExp').focus();
				return false;
			}
			if(!wiz.find('#DealAddress2').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter Address (2)');
				wiz.find('#DealAddress2').focus();
				return false;
			}
			if(!wiz.find('#DealCity2').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter City (2)');
				wiz.find('#DealCity2').focus();
				return false;
			}
			if(!wiz.find('#DealZip2').val()) {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter Zip (2)');
				wiz.find('#DealZip2').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(0).css('color','black');
			// Tab 1 End
			
			// Tab 2 Start
						if(!wiz.find('#DealResidenceStatus').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Residence Status:');
				wiz.find('#DealResidenceStatus').focus();
				return false;
			}
			if(!wiz.find('#DealMortgageMonthAmount').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Mortgage Month Amount');
				wiz.find('#DealMortgageMonthAmount').focus();
				return false;
			}
			if(!wiz.find('#DealMainJob').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Main Occupation');
				wiz.find('#DealMainJob').focus();
				return false;
			}
			if(!wiz.find('#DealJobLength').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Job Length');
				wiz.find('#DealJobLength').focus();
				return false;
			}
			if(!wiz.find('#DealPreviousEmployerLength').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Previous Job Length');
				wiz.find('#DealPreviousEmployerLength').focus();
				return false;
			}
			if(!wiz.find('#DealPreviousEmployerNumber').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Previous Work#');
				wiz.find('#DealPreviousEmployerNumber').focus();
				return false;
			}
			if(!wiz.find('#DealOtherIncome').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Other Income');
				wiz.find('#DealOtherIncome').focus();
				return false;
			}
			if(!wiz.find('#DealOtherEmployer').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Other Employer');
				wiz.find('#DealOtherEmployer').focus();
				return false;
			}
			if(!wiz.find('#DealOtherYearly').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Other Yearly');
				wiz.find('#DealOtherYearly').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(1).css('color','black');
			// Tab 2 End
			
			// Tab 3 Start
						if(!wiz.find('#DealCoSuffix').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Co-Suffix');
				wiz.find('#DealCoSuffix').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerFname').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Co-First Name');
				wiz.find('#DealCobuyerFname').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerGender').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Co-Gender');
				wiz.find('#DealCobuyerGender').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerMobile').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Co-Cell');
				wiz.find('#DealCobuyerMobile').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerLicenceExp').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Co-Driver Lic Exp');
				wiz.find('#DealCobuyerLicenceExp').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerSsn').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Co-Social Secuirty#');
				wiz.find('#DealCobuyerSsn').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerDob').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Co-DOB');
				wiz.find('#DealCobuyerDob').focus();
				return false;
			}
			if(!wiz.find('#DealCoAddress').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Co-Address (2)');
				wiz.find('#DealCoAddress').focus();
				return false;
			}
			if(!wiz.find('#DealCoCity').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Co-City (2)');
				wiz.find('#DealCoCity').focus();
				return false;
			}
			if(!wiz.find('#DealCoZip').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Co-Zip (2)');
				wiz.find('#DealCoZip').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(2).css('color','black');
			// Tab 3 End
			
			// Tab 4 Start
						if(!wiz.find('#DealCobuyerResidenceStatus').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Co-Residence Status');
				wiz.find('#DealCobuyerResidenceStatus').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerMonthlyMortgage').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Co-Mortgage Month Amount');
				wiz.find('#DealCobuyerMonthlyMortgage').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerMainJob').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Co-Main Occupation');
				wiz.find('#DealCobuyerMainJob').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerJobLength').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Co-Job Length');
				wiz.find('#DealCobuyerJobLength').focus();
				return false;
			}
			if(!wiz.find('#DealCoPreviousEmployerLength').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Co-Previous Job Length');
				wiz.find('#DealCoPreviousEmployerLength').focus();
				return false;
			}
			if(!wiz.find('#DealCoPreviousEmployerNumber').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Co-Previous Work');
				wiz.find('#DealCoPreviousEmployerNumber').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerOtherIncome').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Co-Other Income');
				wiz.find('#DealCobuyerOtherIncome').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerOtherEmployer').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Co-Other Employer');
				wiz.find('#DealCobuyerOtherEmployer').focus();
				return false;
			}
			if(!wiz.find('#DealCobuyerOtherIncomeYearly').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Co-Other Yearly');
				wiz.find('#DealCobuyerOtherIncomeYearly').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(3).css('color','black');
			// Tab 4 End
			
			// Tab 5 Start
						if(!wiz.find('#DealRef1Name').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #1 Name');
				wiz.find('#DealRef1Name').focus();
				return false;
			}
			if(!wiz.find('#DealRef1Phone').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #1 Phone');
				wiz.find('#DealRef1Phone').focus();
				return false;
			}
			if(!wiz.find('#DealRef1City').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #1 City');
				wiz.find('#DealRef1City').focus();
				return false;
			}
			if(!wiz.find('#DealRef1State').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #1 State');
				wiz.find('#DealRef1State').focus();
				return false;
			}
			if(!wiz.find('#DealRef2Name').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #2 Name');
				wiz.find('#DealRef2Name').focus();
				return false;
			}
			if(!wiz.find('#DealRef2Phone').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #2 Phone');
				wiz.find('#DealRef2Phone').focus();
				return false;
			}
			if(!wiz.find('#DealRef2City').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #2 City');
				wiz.find('#DealRef2City').focus();
				return false;
			}
			if(!wiz.find('#DealRef2State').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #2 State');
				wiz.find('#DealRef2State').focus();
				return false;
			}
			if(!wiz.find('#DealRef3Name').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #3 Name');
				wiz.find('#DealRef3Name').focus();
				return false;
			}
			if(!wiz.find('#DealRef3Phone').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #3 Phone');
				wiz.find('#DealRef3Phone').focus();
				return false;
			}
			if(!wiz.find('#DealRef3City').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #3 City');
				wiz.find('#DealRef3City').focus();
				return false;
			}
			if(!wiz.find('#DealRef3State').val()) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must enter Ref #3 State');
				wiz.find('#DealRef3State').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(4).css('color','black');
			// Tab 5 End
			
			// Tab 6 Start
						if(!wiz.find('#DealUnitValue').val()) {
				wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
				alert('You must enter Value/Unit:');
				wiz.find('#DealUnitValue').focus();
				return false;
			}
			if(!wiz.find('#DealStockNum').val()) {
				wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
				alert('You must enter Stock#');
				wiz.find('#DealStockNum').focus();
				return false;
			}
			if(!wiz.find('#DealCondition').val()) {
				wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
				alert('You must enter Condition:');
				wiz.find('#DealCondition').focus();
				return false;
			}
			if(!wiz.find('#DealYear').val()) {
				wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
				alert('You must select Year');
				wiz.find('#DealYear').focus();
				return false;
			}
			if(!wiz.find('#DealMake').val()) {
				wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
				alert('You must select Make:');
				wiz.find('#DealMake').focus();
				return false;
			}
			if(!wiz.find('#DealModel').val()) {
				wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
				alert('You must enter Model');
				wiz.find('#DealModel').focus();
				return false;
			}
			if($.trim(wiz.find('#DealOdometer').val())) {
						
						value=wiz.find('#DealOdometer').val();
						if(!value.match(/^[0-9]+$/))
						{
							wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
							alert('Please enter numeric value in Miles');
							wiz.find('#DealOdometer').focus();
							return false;
						}
					}
					if($.trim(wiz.find('#DealOdometerTrade').val())) {
						
						value=wiz.find('#DealOdometerTrade').val();
						if(!value.match(/^[0-9]+$/))
						{
							wiz.find("a[data-toggle*='tab']").eq(5).css('color','red').trigger('click');
							alert('Please enter numeric value in (Trade) Miles');
							wiz.find('#DealOdometerTrade').focus();
							return false;
						}
					}
			wiz.find("a[data-toggle*='tab']").eq(5).css('color','black');
			// Tab 6 End
			
			// Tab 7 End
			if(!wiz.find('#edit_options_type_condition').val()) {
				wiz.find("a[data-toggle*='tab']").eq(6).css('color','red').trigger('click');
				alert('You must select FIXED FEE / PAYMENT');
				wiz.find('#edit_options_type_condition').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(6).css('color','black');
			// Tab 7 End
			
			
			
			if(!wiz.find('#DealNotes').val()) {
				tabnum = wiz.find('#DealNotesTabNum').val();
				wiz.find("a[data-toggle*='tab']").eq(tabnum).css('color','red').trigger('click');
				alert('You must enter notes');
				wiz.find('#DealNotes').focus();
				return false;
			}
			
			*/
			
			//wiz.find("form").submit();	
			//alert('Finished!, Starting over!');
			//wiz.find("button[type='submit']").removeClass('hide');
			//wiz.find("a[data-toggle*='tab']:first").trigger('click');
		});
	});
});