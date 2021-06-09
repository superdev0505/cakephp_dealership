$(function()
{
	/* initialize the external events
	-----------------------------------------------------------------*/

	/* initialize the calendar
	-----------------------------------------------------------------*/
	
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month'
		},
	//	defaultView: 'agendaWeek',
		editable: false,
		droppable: false,
		events: "/events/feed",
		drop: function(date, allDay) 
		{
			
			
		},
		eventDragStart: function(event) {
            $(this).qtip("destroy");
        },
		eventResizeStart: function(event) {
            $(this).qtip("destroy");
        },
		eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
			/*
			alert(
				"The end date of " + event.title + "has been moved " +
				dayDelta + " days and " +
				minuteDelta + " minutes."
			);
			*/
			if (confirm("is this okay?")) {
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
				var url = "/events/update?id=" + event.id + "&start=" + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00&end=" + endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00&allday=" + allday;
				$.post(url, function(data) {   
					$('#calendar').fullCalendar( 'refetchEvents' );
					//update left side list
					$.ajax({
						type: "GET",
						cache: false,
						url:  "/events/event_list/",
						success: function(data){
							$("#event_list_content").html(data);
						}
					});
					
									 
			 	});
			}else{
				revertFunc();
			}
			
    	},
		eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {
			if (confirm("is this okay?")) {
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
				var url = "/events/update?id=" + event.id + "&start=" + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00&end=" + endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00&allday=" + allday;
				$.post(url, function(data) {     
					$('#calendar').fullCalendar( 'refetchEvents' );
					//update left side list
					$.ajax({
						type: "GET",
						cache: false,
						url:  "/events/event_list/",
						success: function(data){
							$("#event_list_content").html(data);
						}
					});
					
			 	});

			
			}else{
				revertFunc();
			}
        },
		eventRender: function(event, element) {
			element.qtip({
                content: {
                    title: event.title,
                    text: event.toolTip
                },
                position: {
				  corner: {
					 target: 'bottomLeft',
					 tooltip: 'topRight'
				  }
			 	},
                style: {
                    name: 'light',
                    tip: 'bottomLeft'
                }
            });
			
			element.bind('dblclick', function() {
				//edit_page = "/events/edit/" +  event.id;
				 $(this).qtip("destroy");
				edit_page = event.lead_url;
				location.href = edit_page;
			
				/*
				$.ajax({
					type: "GET",
					cache: false,
					url:  edit_page,
					success: function(data){
						
						bootbox.dialog({
							message: data,
							title: "Edit Event",
						});
					}
				});
				*/
				
				
				
			});
			
			
			
   		}
		
		
		
	});

	$("#employees_calendar").val("");

	$("#employees_calendar").change(function(){
	 	var selectedSite = $('#employees_calendar').val();
        var events = {
              url: '/events/feed',
              type: 'get',
              data: {
                sperson: selectedSite
              }
        }
        $('#calendar').fullCalendar('removeEventSource', events);
        $('#calendar').fullCalendar('addEventSource', events);
	});















});