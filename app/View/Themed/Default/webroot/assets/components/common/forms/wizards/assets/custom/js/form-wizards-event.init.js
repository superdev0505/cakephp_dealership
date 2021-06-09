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
					if(!wiz.find('#EventEventTypeId').val()) {
						alert('You must select  Event Type');
						wiz.find('#EventEventTypeId').focus();
						return false;
					}
					if(!wiz.find('#EventStatus').val()) {
						alert('You must select Event Status');
						wiz.find('#EventStatus').focus();
						return false;
					}
					if(!$.trim(wiz.find('#EventTitle').val())) {
						alert('You must enter Event Title');
						wiz.find('#EventTitle').focus();
						return false;
					}
					if(!$.trim(wiz.find('#EventDetails').val())) {
						alert('You must enter Event Details');
						wiz.find('#EventDetails').focus();
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
			if(!wiz.find('#EventEventTypeId').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select  Event Type');
				wiz.find('#EventEventTypeId').focus();
				return false;
			}
			if(!wiz.find('#EventStatus').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Event Status');
				wiz.find('#EventStatus').focus();
				return false;
			}
			if(!$.trim(wiz.find('#EventTitle').val())) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Event Title');
				wiz.find('#EventTitle').focus();
				return false;
			}
			if(!$.trim(wiz.find('#EventDetails').val())) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Event Details');
				wiz.find('#EventDetails').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(1).css('color','black');
			//tab two end
			//tab three start
			if(!wiz.find('#EventStartDate').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Start Date');
				wiz.find('#EventStartDate').focus();
				return false;
			}
			if(!wiz.find('#EventEndDate').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter End Date');
				wiz.find('#EventEndDate').focus();
				return false;
			}
			startDate=wiz.find('#EventStartDate').val();
					endDate=wiz.find('#EventEndDate').val();
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
						wiz.find('#EventEndDate').focus();
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