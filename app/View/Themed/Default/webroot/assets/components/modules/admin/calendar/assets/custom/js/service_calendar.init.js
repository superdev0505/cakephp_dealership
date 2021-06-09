function isOverlapping(event){
    var array = $('#calendar').fullCalendar('clientEvents');
  
    resource_id=event.resources[0];
   
    for(i in array){
		
        if(array[i].id != event.id){
			
            if(event.end >= array[i].start && event.start <= array[i].end  && array[i].user_id == resource_id){
                console.log(i);
				return true;
            }
        }
    }
    return false;
}

function close_noty()
{
	jQuery.noty.closeAll();
}
function generate_noty(type, text) {

            var n = noty({
                text        : text,
                type        : type,
                layout      : 'topRight',
                closeWith   : ['click'],
                theme       : 'relax',
                killer  : true,
                /*animation   : {
                    open  : 'animated bounceInLeft',
                    close : 'animated bounceOutLeft',
                    easing: 'swing',
                    speed : 500
                }*/
            });
            return n;
     }
	
function show_calendar(url,bay_id)
{
	/* initialize the external events
	-----------------------------------------------------------------*/
	/* initialize the calendar
	-----------------------------------------------------------------*/
	//alert(calendarStartTime);
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'resourceDay,agendaWeek,month'
		},
		titleFormat : {day:'ddd MMM D, YYYY'},
		buttonText: {
			month : 'All Tech - Month',
			day : 'All Tech - Day',
			week: 'Tech - Week'
			},
		timezone:'local',
		ignoreTimezone :true,
		defaultView: 'month',
		resources: $resource_list,
		slotEventOverlap: false,
		selectable: {
			  month: false,
			  agenda: true,
			  resourceDay:true
   			},
		aspectRatio:1.35,
		height : $(window).height()-150,
		
		dayClick: function(date, jsEvent, view) {
		if(view.name == 'month'){
     
            // Clicked on the entire day 
			  if ($(jsEvent.target).is('div.fc-day-number')) {      
                // Clicked on the day number 
				$ss_date = date.format('YYYY-MM-DD');
				
                $('#calendar') 
                    .fullCalendar('changeView', 'resourceDay'/* or 'basicDay' */) ;
                     $('#calendar').fullCalendar('gotoDate',$ss_date); 
           			 }
        	}
	
  			  },
		select: function (start, end, ev,view) {
			if(view.name == 'month'){
				return false;
				//$ss_date = start.format('YYYY-MM-DD');
				//$ss_date+='T06:00:00';
				//$get_current = new Date($ss_date);
				//console.log($get_current);
				//$('#calendar').fullCalendar('changeView','resourceDay');
				//$('#calendar').fullCalendar('gotoDate',$ss_date);
				/*var currentHour = $.fullCalendar.moment(new Date()).format('hA').toLowerCase();
				console.log(currentHour);
				currentHour = '1pm';
				var $viewWrapper = $("div.fc-view-" + view.name +" div.fc-agenda-body");
				var currentHourLabel = $viewWrapper.find("table.fc-agenda-slots tbody tr th:contains('"+ currentHour +"')");
				
				//$viewWrapper.scrollTo(currentHourLabel, 1);
				if(currentHourLabel){
				$viewWrapper.animate({
      							  scrollTop:currentHourLabel.offset().top
   							}, 2000);
				}*/
				//$get_current = new Date();
				
				
			}else{
           	var startdate = new Date(start);
			var startyear = startdate.getFullYear();
			var startday = startdate.getDate();
			var startmonth = startdate.getMonth() + 1;
			var starthour = startdate.getHours();
			var startminute = startdate.getMinutes();
			url='/serviceapp/ServiceCalendar/add';
			$start_date = startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00";
			
			$user_field ='';
			$boot_title = '';
			$("#AppointmentResourceId").val('');
			$("#AppointmentTechName").val('');
			if(view.name =='resourceDay'){
				$("#AppointmentResourceId").val(ev.data.id);	
				$user_field = '/user_id:'+ev.data.id;
				$boot_title = '(Tech : '+ev.data.name+')';
				$("#AppointmentTechName").val(ev.data.name);
				$("#submit_new_lead_search").attr('data-user',ev.data.name);
			}
			$("#AppointmentStartTime").val($start_date);	
			url=url+'/start_date:' + $start_date +$user_field;
			$("#submit_new_lead_search").attr('href',url);
			
			$("#modal-2").modal('show');
			/*$.ajax({
					type: "GET",
					cache: false,
					url:  url,
					success: function(data){
						
						bootbox.dialog({
							message: data,
							closeButton: false,
							title: 'Service Appointment'+$boot_title,
							 buttons: {
								 "Cancel": {
								className: "btn-danger",
								callback: function() {
									bootbox.hideAll();
									//$('#calendar').fullCalendar('removeEvents','temporaryEvent');
									}
										},
									},
						});
					},
				});  */
			}
		   // resources
        },
		editable: true,
		droppable: true,
		events: url,
		allDaySlot : true,
		allDayText : 'Hours',
		slotMinutes: calendarTimeSlot,
		minTime :calendarStartTime,
		maxTime :calendarEndTime,
		snapDuration: '00:02:00',
		//contentHeight: 2500,
		
		viewRender:function(view,element){
			
			//alert(view.intervalEnd);
			//m=$.fullCalendar.moment(view.start);
			if(view.name !='month'){
				
				$('#calendar').fullCalendar( 'refetchEvents' );
				$('#calendar').fullCalendar('option', 'contentHeight', 2500);
				var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
				var days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
				var startdate = new Date(view.start);
				var startyear = startdate.getFullYear();
				var startday = startdate.getDate();
				var startmonth = startdate.getMonth() + 1;
				var startweek = days[startdate.getDay()];
				start_date=startyear+'-'+startmonth+'-'+startday;
				real_date = startweek+' '+startmonth+' '+startday+', '+startyear;
				var enddate = new Date(view.end);
				var endyear = enddate.getFullYear();
				var endday = enddate.getDate();
				var endmonth = enddate.getMonth() + 1;
				//var end_date=endyear+'-'+endmonth+'-'+endday;
				var end_date = view.end.format('YYYY-MM-DD');
				var start_date = view.start.format('YYYY-MM-DD');
			data={start_date:start_date,end_date:end_date,view_name:view.name,bay_id:bay_id};
			$.ajax({
				type:'POST',
				data:data,
				//async:true,
				url:'/serviceapp/ServiceCalendar/get_hours',
				success: function(data){
					element.find('table.fc-agenda-allday').html(data);
					element.find('table.fc-agenda-allday').addClass('booked_hours');
					},
				});
			}
			
			
			if(view.name == 'agendaWeek'){
			if(!$("#AllTechList").length){
				select_dropdown = $("#tech_list_dropdown").html();
				select_dropdown = select_dropdown.replace('#####',"AllTechList");
				$("table.fc-header td.fc-header-left").append(select_dropdown);	
				tech_id = $("#AllTechList").val();
				tech_name=allTechArray[tech_id];
				if(!tech_name){
					tech_name = 'All Tech';
				}
				$(".fc-button.fc-button-agendaWeek").text(tech_name+ " - Week");
				}else{
					$("#AllTechList").parent().show();
				}
			}else{
				$("#AllTechList").parent().hide();
			}
			if(view.name == 'resourceDay'){
				//$('table.fc-header .fc-header-title h2').html(real_date);
				element.find('table.fc-agenda-days thead').first("tr").find("th.fc-widget-header").not("th.fc-first,th.fc-last").each(function(){
				$thHtml = $(this).html();
				$thHtml = '<i class="fa fa-wrench"></i>&nbsp;'+$thHtml;
				$(this).html($thHtml);
				});
				
			}
			},
		drop: function(date, allDay) 
		{
			var originalEventObject = $(this).data('eventObject');
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.id="temporaryEvent"
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			color=$(this).attr('data-color');
			copiedEventObject.color=color;
			url=$(this).attr('data-url');
			type=$(this).attr('data-etype');
			var startdate = new Date(date);
			var startyear = startdate.getFullYear();
			var startday = startdate.getDate();
			var startmonth = startdate.getMonth() + 1;
			var starthour = startdate.getHours();
			var startminute = startdate.getMinutes();
			etype='';
			if(type == 'Lunch' || type == 'Break')
			{
				etype='/etype:'+type;
			}
			url=url+'/start_date:' + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00"+etype;
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject,false);
			$.ajax({
					type: "GET",
					cache: false,
					url:  url,
					success: function(data){
						
						bootbox.dialog({
							message: data,
							closeButton: false,
							title: type,
							 buttons: {
								 "Cancel": {
								className: "btn-danger",
								callback: function() {
									bootbox.hideAll();
									$('#calendar').fullCalendar('removeEvents','temporaryEvent');
									}
										},
									},
						});
					},
				});
			
		},
		eventDragStart: function(event) {
           // $(this).qtip("destroy");
        },
		eventResizeStart: function(event) {
            //$(this).qtip("destroy");
        },
		eventResize: function(event,dayDelta,revertFunc) {
			/*
			alert(
				"The end date of " + event.title + "has been moved " +
				dayDelta + " days and " +
				minuteDelta + " minutes."
			);
			*/
			
			if(isOverlapping(event))
			{
				alert('This time slot is already booked');
				revertFunc();
			}else{
				 
			var $msg = "Appointment moved  "+event.start.format('MM/DD/YYYY, h:mm a')+" - "+event.end.format('MM/DD/YYYY, h:mm a')+" .\n is this okay?";	
			if (confirm($msg)) {
				//revertFunc();
				
				var startdate = new Date(event.start);
				var startyear = startdate.getFullYear();
				var startday = startdate.getDate();
				var startmonth = startdate.getMonth() + 1;
				var starthour = startdate.getHours();
				var startminute = startdate.getMinutes();
				var enddate = new Date(event.end);
				var endyear = enddate.getFullYear();
				var endday = enddate.getDate();
				var endmonth = enddate.getMonth() + 1;
				var endhour = enddate.getHours();
				var endminute = enddate.getMinutes();
				if (event.allDay == true) {
					var allday = 1;
				} else {
					var allday = 0;
				}
				if(event.event_type=='service'){
			var url = "/serviceapp/service_calendar/update";
				start=startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00";
				end=endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00";
				post_data = {start : start,end : end,id : event.id,all_day : allday,user_id : event.resources};
				$.ajax({
					type : 'POST',
					url : url,
					data:post_data,
					success: function(data){}					
					});
			}
			else
				{
					var url = "/serviceapp/service_calendar/break_update?id=" + event.id + "&start=" + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00&end=" + endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00&allday=" + allday;
				$.post(url, function(data) {     
					$('#calendar').fullCalendar( 'render' );
					//update left side list
					
					
			 	});
			}
			}else{
				revertFunc();
			}
			}
			
    	},
		eventOverlap: false,
		eventDrop: function(event, Delta, revertFunc, jsEvent, ui, view) {
			 
			if(isOverlapping(event))
			{
				alert('This time slot is already booked');
				revertFunc();
			}else{
			var $msg = "Appointment moved  "+event.start.format('MM/DD/YYYY, h:mm a')+" to "+event.end.format('MM/DD/YYYY, h:mm a')+" .\n is this okay?";	
			if (confirm($msg)) {
				var startdate = new Date(event.start);
				var startyear = startdate.getFullYear();
				var startday = startdate.getDate();
				var startmonth = startdate.getMonth() + 1;
				var starthour = startdate.getHours();
				var startminute = startdate.getMinutes();
				var enddate = new Date(event.end);
				var endyear = enddate.getFullYear();
				var endday = enddate.getDate();
				var endmonth = enddate.getMonth() + 1;
				var endhour = enddate.getHours();
				var endminute = enddate.getMinutes();
				if (event.allDay == true) {
					var allday = 1;
				} else {
					var allday = 0;
				}
				if(event.event_type=='service'){
				
					
				var url = "/serviceapp/service_calendar/update";
				start=startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00";
				end=endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00";
				post_data = {start : start,end : end,id : event.id,all_day : allday,user_id : event.resources};
				$.ajax({
					type : 'POST',
					url : url,
					data:post_data,
					success: function(data){
						$('#calendar').fullCalendar( 'render' );
						}					
					});
				
				/*$.post(url, function(data) {     
					$('#calendar').fullCalendar( 'render' );
					//update left side list
					$.ajax({
						type: "GET",
						cache: false,
						url:  "/serviceapp/service_calendar/event_list/"+bay_id,
						success: function(data){
							$("#event_list_content").html(data);
						}
					});
					
			 	});*/
				}else
				{
					var url = "/serviceapp/service_calendar/break_update?id=" + event.id + "&start=" + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00&end=" + endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00&allday=" + allday;
				$.post(url, function(data) {     
					
					//update left side list
					$('#calendar').fullCalendar( 'render' );
					
			 	});
				}

			
			}else{
				revertFunc();
			}
			}
        },
		eventMouseover:function( event, jsEvent, view ){
			 
			text = event.toolTip;
			nid=generate_noty('warning',text);
			},
		eventMouseout:function( event, jsEvent, view ){ close_noty(); },
		eventRender: function(event, element) {
			if(event.is_overdue){
			$Text=element.find('div.fc-event-title').html();
			$text = '<span style="color:#fff;font-weight:bold;">'+$Text+'</span>';
			element.find('div.fc-event-title').html($text);
			}
			
/*	element.qtip({
              content: {
                    title: event.title,
                    text: event.toolTip
                },
                position: {
				  corner: {
					 target: 'topRight',
         			 tooltip: 'bottomLeft'
				  },
				  adjust : {
       				 screen : true
    			},
			 	},
                style: {
                    name: 'light',
                    tip: 'bottomMiddle'
                }
            });
*/			if(event.month_view == 'no' && event.event_type != 'dealer_break'){
			$TimeText=element.find('div.fc-event-time').html();
			$delete_class = 'delete_service_appointment';
			if(event.event_type=='tech_event')
			$delete_class = 'delete_tech_break';
			$TimeText += '<a href="#" style="margin-left:5px;color:#000;background:#fff" class = "label  pull-right '+$delete_class+'" data-id ="'+event.id+'"><i class ="fa fa-trash-o fa-2x"></i></a><a href="#" style="margin-left:5px;color:#000;background:#fff" class = "label  pull-right edit_service_appointment" data-id ="'+event.id+'"><i class ="fa fa-pencil fa-2x"></i></a>';
			element.find('div.fc-event-time').html($TimeText);	
			element.find('div.fc-event-time').find(' a.edit_service_appointment').bind('click', function(e) {
				e.preventDefault();
				if(event.event_type=='service'){
				edit_page = "/serviceapp/service_calendar/edit/set_view:edit2/" +  event.id;
				$.ajax({
					type: "GET",
					cache: false,
					url:  edit_page,
					success: function(data){
						
						bootbox.dialog({
							message: data,
							title: "Edit - "+event.contact_name,
						});
					}
				});
				
				}else
				{
				edit_page = "/serviceapp/service_calendar/add_break/" +  event.id;
				$.ajax({
					type: "GET",
					cache: false,
					url:  edit_page,
					success: function(data){
						
						bootbox.dialog({
							message: data,
							title: "Edit "+event.title,
						});
					}
				});
				}
				
				
				
			});
			
			
			}else if(event.event_type == 'dealer_break')
			{
				element.draggable = false; 				
			}			
			else
			{
				element.draggable = false; 
				element.find('span.fc-event-time').remove();
				element.bind('dblclick', function() {
					//$(this).qtip("destroy");
					$('#calendar').fullCalendar('changeView','resourceDay');
					$('#calendar').fullCalendar('gotoDate',event.stat_date);
					});
			}
   		}
		
		
		
	});
}