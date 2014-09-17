/**
 * Js agenda
 * @created on : 10-06-2014
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


$(document).ready(function() {
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();

  var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                 left: 'prev,next today',
                 center: 'title',
                 right: 'month,agendaWeek,agendaDay'
                },
   
                events: base_url + 'agenda/get_events',
   
   // Convert the allDay from string to boolean
   eventRender: function(event, element, view) {
    if (event.allDay === 'true') {
     event.allDay = true;
    } else {
     event.allDay = false;
    }
   },
   selectable: true,
   selectHelper: true,
   select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            var url = prompt('Type Event url, if exits:');
            if (title) {
            var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
            $.ajax({
                    url:  base_url + 'agenda/create',
                    data: 'title='+ title+'&start='+ start +'&end='+ end +'&url='+ url ,
                    type: "POST",
                    success: function(json) {
                                     alert('Added Successfully');
                    }
            });
            
            calendar.fullCalendar('renderEvent',
            {
                 title: title,
                 start: start,
                 end: end,
                 allDay: allDay
            },
                 true // make the event "stick"
            );
            }
            calendar.fullCalendar('unselect');
   },
   
   editable: true,
   eventDrop: function(event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
            $.ajax({
            url:  base_url + 'agenda/edit',
            data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
            type: "POST",
            success: function(json) {
             alert("Updated Successfully");
            }
            });
   },
   eventResize: function(event) {
        var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
        var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
        $.ajax({
            url: base_url + 'agenda/edit',
            data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
            type: "POST",
            success: function(json) {
                    alert("Updated Successfully");
            }
        });

}
   
  });
  
 });