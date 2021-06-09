$(function()
{
	
	template_type = $('#EblastTemplateType').val();
	
	/*
	if(template_type == "M" || template_type ==  "N"){
		$('#EblastSendEvery').val(0);
		$('#EblastSendEvery').hide();
	}
	*/
	
	$('#EblastSendEvery').on('change', function() {
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
				if(index==1){
					// Make sure we entered the campaign name
					if(wiz.find('#EblastCampaignName').val()=='') {
						alert('You must enter the campaign title');
						wiz.find('#EblastCampaignName').focus();
						return false;
					}
				}
				if(index==2){
					// If the recipients not filtered yet then trigger a click to filter. Ajax code is in setup_eblast.ctp file.
					// if( $('#search-result-content').html() == '') {
					$('#filter_recipients').trigger('click');
					// }
					// setTimeout( $('.alert .alert-warning').hide() );
				}
				if(index==4){
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
				if(index==5){
					if(wiz.find('#EblastSendEvery').val()=='') {
						alert('You must select mail sending schedule.');
						wiz.find('#EblastSendEvery').focus();
						return false;
					}
					else if(wiz.find('#EblastSendEvery').val()=='0' && wiz.find('#EblastScheduleSingleDate').val()=='') {
						alert('You must select date.');
						wiz.find('#EblastsScheduleSingleDate').focus();
						return false;
					}
					else if(wiz.find('#EblastSendEvery').val()>0 && (wiz.find('#EblastScheduleStartDate').val()==''||wiz.find('#EblastScheduleEndDate').val()=='')){
						alert('You must select date range.');
						wiz.find('#EblastsScheduleSingleDate').focus();
						return false;
					}
					else if(wiz.find('#EblastSendEvery').val()>0 && (wiz.find('#EblastScheduleStartTime').val()==''||wiz.find('#EblastScheduleEndTime').val()=='')){
						alert('You must select date range and time.');
						wiz.find('#EblastScheduleStartTime').focus();
						return false;
					}
				}
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
			$("#EblastSetupEblastForm").attr('validate', '0');
			wiz.find("a[data-toggle*='tab']").eq(0).css('color','black');
			wiz.find("a[data-toggle*='tab']").eq(1).css('color','black');
			wiz.find("a[data-toggle*='tab']").eq(2).css('color','black');
			wiz.find("a[data-toggle*='tab']").eq(3).css('color','black');
			wiz.find("a[data-toggle*='tab']").eq(4).css('color','black');
			
			
			//tab one start
			if(wiz.find('#EblastCampaignName').val()=='') {
				wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
				alert('You must enter the campaign title');
				wiz.find('#EblastCampaignName').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(0).css('color','black');
			//tab one end

			//tab two start
			var selectedTemplate = false;
			$('.templates').each(function() {
				if($(this).is(':checked')) {
					selectedTemplate = true;
				}
			});
			if(!selectedTemplate) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must select template');
				return false;
			}
			
			//tab two end
			
			//tab three start
			if(wiz.find('#EblastCountRecipient').val()=='') {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Recipient');
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(1).css('color','black');
			//tab three end
			

			//tab fourth start
			if(wiz.find('#EblastSendEvery').val()=='') {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must select mail sending schedule.');
				wiz.find('#EblastSendEvery').focus();
				return false;
			}
			else if( wiz.find('#EblastSendEvery').val()=='0' && wiz.find('#EblastScheduleSingleDate').val()=='') {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must select date.');
				wiz.find('#EblastScheduleSingleDate').focus();
			}
			else if(wiz.find('#EblastSendEvery').val()>0 && (wiz.find('#EblastScheduleStartDate').val()=='' || wiz.find('#EblastScheduleEndDate').val()=='')) {
				wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
				alert('You must select date range.');
				wiz.find('#EblastsScheduleSingleDate').focus();
			}
			else if(template_type=="M") {
				if(wiz.find('#EblastScheduleSingleDate').val()==''){
					wiz.find("a[data-toggle*='tab']").eq(4).css('color','red').trigger('click');
					alert('You must select a date.');
					wiz.find('#EblastScheduleSingleDate').focus();
					return false;
				}
			}
			
			//tab fourth end
			$("#EblastSetupEblastForm").attr('validate', '1');
			//alert('Finished!, Starting over!');
			//wiz.find("button[type='submit']").removeClass('hide');
			//wiz.find("a[data-toggle*='tab']:first").trigger('click');
		});
	});
});