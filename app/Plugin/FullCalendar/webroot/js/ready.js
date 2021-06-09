// JavaScript Document
$(document).ready(function() {

    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
        theme: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        events: plgFcRoot + "/events/feed",
        defaultView: 'month',
        firstHour: 8,
        weekMode: 'variable',
        aspectRatio: 2,
        eventRender: function(event, element) {
            element.qtip({
                content: {
                    title: event.title,
                    text: event.toolTip
                },
                position: {
                    target: 'mouse',
                    adjust: {
                        x: 10,
                        y: -5
                    }
                },
                style: {
                    name: 'light',
                    tip: 'leftTop'
                }
            });
            element.dblclick(function(evnt) {
                evnt.preventDefault();
                window.location.href = plgFcRoot + "/events/edit/" + event.id;
                return false;
            });
        },
        dayClick: function(date, allDay, jsEvent, view) {
            var singleClick = date.toUTCString();

            if (doubleClick == singleClick) {
                console.log('Double-click!');
                doubleClick = null;
            } else {
                doubleClick = date.toUTCString();
                clearInterval(clickTimer);
                clickTimer = setInterval(function() {
                    doubleClick = null;
                    clearInterval(clickTimer);
                }, 500);
            }
        },
        eventDragStart: function(event) {
            $(this).qtip("destroy");
        },
        eventDrop: function(event) {
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
            var url = plgFcRoot + "/events/update?id=" + event.id + "&start=" + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00&end=" + endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00&allday=" + allday;
            $.post(url, function(data) {
            });
        },
        eventResizeStart: function(event) {
            $(this).qtip("destroy");
        },
        eventResize: function(event) {
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
            var url = plgFcRoot + "/events/update?id=" + event.id + "&start=" + startyear + "-" + startmonth + "-" + startday + " " + starthour + ":" + startminute + ":00&end=" + endyear + "-" + endmonth + "-" + endday + " " + endhour + ":" + endminute + ":00";
            $.post(url, function(data) {

            });
        }
    })

});
