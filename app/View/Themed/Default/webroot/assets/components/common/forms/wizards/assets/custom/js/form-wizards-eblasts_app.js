$(function()
{
	
	template_type = $('#EblastAppTemplateType').val();
	
	/*
	if(template_type == "M" || template_type ==  "N"){
		$('#EblastAppSendEvery').val(0);
		$('#EblastAppSendEvery').hide();
	}
	*/
	
	$('#EblastAppSendEvery').on('change', function() {
		if( $(this).val() <=0 ) {
			$('#schedule_single').slideDown();
			$('#schedule_range').slideUp();
		} else {
			$('#schedule_single').slideUp();
			$('#schedule_range').slideDown();
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
				console.log(index);

				if(index==1){
					// Make sure we entered the campaign name
					if(wiz.find('#EblastAppCampaignName').val()=='') {
						alert('You must enter the campaign title');
						wiz.find('#EblastAppCampaignName').focus();
						return false;
					}
					
				}
				if(index==2){
					
				}

				if(index==3){
					var selectedTemplate = false;
					$('.templates').each(function() {
						if($(this).is(':checked')) {
							selectedTemplate = true;
						}
					});
					if(!selectedTemplate) {
						alert('You must select template');
						return false;
					}
				}
				// if(index==3){
				// 	if(wiz.find('#EblastAppSendEvery').val()=='') {
				// 		alert('You must select mail sending schedule.');
				// 		wiz.find('#EblastAppSendEvery').focus();
				// 		return false;
				// 	}
				// 	else if(wiz.find('#EblastAppSendEvery').val()=='0' && wiz.find('#EblastAppScheduleSingleDate').val()=='') {
				// 		alert('You must select date.');
				// 		wiz.find('#EblastAppsScheduleSingleDate').focus();
				// 		return false;
				// 	}
				// 	else if(wiz.find('#EblastAppSendEvery').val()>0 && (wiz.find('#EblastAppScheduleStartDate').val()==''||wiz.find('#EblastAppScheduleEndDate').val()=='')){
				// 		alert('You must select date range.');
				// 		wiz.find('#EblastAppsScheduleSingleDate').focus();
				// 		return false;
				// 	}
				// 	else if(wiz.find('#EblastAppSendEvery').val()>0 && (wiz.find('#EblastAppScheduleStartTime').val()==''||wiz.find('#EblastAppScheduleEndTime').val()=='')){
				// 		alert('You must select date range and time.');
				// 		wiz.find('#EblastAppScheduleStartTime').focus();
				// 		return false;
				// 	}
				// }
			},
			onLast: function(tab, navigation, index) 
			{
				
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
					wiz.find('.pagination .last').hide();
					wiz.find('.pagination .finish').removeClass('disabled');
				} else {
					wiz.find('.pagination .next').show();
					wiz.find('.pagination .finish').hide();
					wiz.find('.pagination .last').show();
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
			$("#EblastAppSetupEblastForm").attr('validate', '0');
			wiz.find("a[data-toggle*='tab']").eq(0).css('color','black');
			wiz.find("a[data-toggle*='tab']").eq(1).css('color','black');
			wiz.find("a[data-toggle*='tab']").eq(2).css('color','black');
			
			//tab one start
			if(wiz.find('#EblastAppCampaignName').val()=='') {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter the campaign title');
				wiz.find('#EblastAppCampaignName').focus();
				return false;
			}


			// //Recipient List
			// var recipient_type = $("input:radio[name='data[EblastApp][recipient_type]']:checked").val();
		 //    if(recipient_type == 'lead'){
		    	
		 //    	if(wiz.find('#EblastAppCountRecipient').val()=='') {
			// 		wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
			// 		alert('You must select Recipient');
			// 		return false;
			// 	}

		 //    }else if(recipient_type == 'list'){

		 //    	if(wiz.find('#EblastAppListId').val()=='') {
			// 		wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
			// 		alert('You must select recipient list');
			// 		wiz.find('#EblastAppListId').focus();
			// 		return false;
			// 	}
		 //    }
			// wiz.find("a[data-toggle*='tab']").eq(1).css('color','black');






			//tab one end

			//tab two start
			var selectedTemplate = false;
			$('.templates').each(function() {
				if($(this).is(':checked')) {
					selectedTemplate = true;
				}
			});
			if(!selectedTemplate) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must select template');
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(2).css('color','black');
			
			//tab two end
			

			//tab fourth start
			if(wiz.find('#EblastAppSendEvery').val()=='') {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must select mail sending schedule.');
				wiz.find('#EblastAppSendEvery').focus();
				return false;
			}
			else if( wiz.find('#EblastAppSendEvery').val()=='0' && wiz.find('#EblastAppScheduleSingleDate').val()=='') {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must select date.');
				wiz.find('#EblastAppScheduleSingleDate').focus();
			}
			else if(wiz.find('#EblastAppSendEvery').val()>0 && (wiz.find('#EblastAppScheduleStartDate').val()=='' || wiz.find('#EblastAppScheduleEndDate').val()=='')) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must select date range.');
				wiz.find('#EblastAppsScheduleSingleDate').focus();
			}
			else if(template_type=="M") {
				if(wiz.find('#EblastAppScheduleSingleDate').val()==''){
					wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
					alert('You must select a date.');
					wiz.find('#EblastAppScheduleSingleDate').focus();
					return false;
				}
			}
			wiz.find("a[data-toggle*='tab']").eq(4).css('color','black');
			
			//tab fourth end
			$("#EblastAppSetupEblastForm").attr('validate', '1');
			//alert('Finished!, Starting over!');
			//wiz.find("button[type='submit']").removeClass('hide');
			//wiz.find("a[data-toggle*='tab']:first").trigger('click');
		});
	});
});