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
		
		$(this).bootstrapWizard(
		{
			onNext: function(tab, navigation, index) 
			{
				if(index==2){
					if(!wiz.find('#ServiceEventEventTypeId').val()) {
						alert('You must select  Event Type');
						wiz.find('#ServiceEventEventTypeId').focus();
						return false;
					}
					if(!wiz.find('#ServiceEventStatus').val()) {
						alert('You must select Event Status');
						wiz.find('#ServiceEventStatus').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceEventTitle').val())) {
						alert('You must enter Event Title');
						wiz.find('#ServiceEventTitle').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceEventDetails').val())) {
						alert('You must enter Event Details');
						wiz.find('#ServiceEventDetails').focus();
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

			//tab two start
			if(!wiz.find('#ServiceEventEventTypeId').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select  Event Type');
				wiz.find('#ServiceEventEventTypeId').focus();
				return false;
			}
			if(!wiz.find('#ServiceEventStatus').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Event Status');
				wiz.find('#ServiceEventStatus').focus();
				return false;
			}
			if(!$.trim(wiz.find('#ServiceEventTitle').val())) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Event Title');
				wiz.find('#ServiceEventTitle').focus();
				return false;
			}
			if(!$.trim(wiz.find('#ServiceEventDetails').val())) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Event Details');
				wiz.find('#ServiceEventDetails').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(1).css('color','black');
			//tab two end
			//tab three start
			if(!wiz.find('#ServiceEventStartDate').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Start Date');
				wiz.find('#ServiceEventStartDate').focus();
				return false;
			}
			if(!wiz.find('#ServiceEventEndDate').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter End Date');
				wiz.find('#ServiceEventEndDate').focus();
				return false;
			}
			startDate=wiz.find('#ServiceEventStartDate').val();
					endDate=wiz.find('#ServiceEventEndDate').val();
					startTime=wiz.find('#EventStartTime').val();
					endTime=wiz.find('#EventEndTime').val();
					if(startTime.match(/pm$/i))
					{
						stparts=startTime.split(':');
						stparts[0]=parseInt(stparts[0])+12;
						startTime=stparts[0]+':'+stparts[1];
						
					}
					if(endTime.match(/pm$/i))
					{
						enparts=endTime.split(':');
						enparts[0]=parseInt(enparts[0])+12;
						endTime=enparts[0]+':'+enparts[1];
						
					}
					startTime=$.trim(startTime.replace(/[ap]m$/i,''));
					endTime=$.trim(endTime.replace(/[ap]m$/i,''));
					stDateTime=startDate+'T'+startTime+':00';
					endDateTime=endDate+'T'+endTime+':00';
					st=new Date(stDateTime);
					end=new Date(endDateTime);
					if(end<st)
					{
						wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
						alert('End Date/Time must be greater than Start Date/Time ');
						wiz.find('#ServiceEventEndDate').focus();
						return false;
					}
			
			wiz.find("a[data-toggle*='tab']").eq(2).css('color','black');
			//tab three end

			
			
			
			//alert('Finished!, Starting over!');
			//wiz.find("button[type='submit']").removeClass('hide');
			//wiz.find("a[data-toggle*='tab']:first").trigger('click');
		});
	});
});