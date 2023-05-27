/*

Template:  Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template
Author: potenzaglobalsolutions.com
Design and Developed by: potenzaglobalsolutions.com

NOTE:

*/




(function($) {
    "use strict";

    $('#external-events .fc-event').each(function() {
      $(this).data('event', {
        title: $.trim($(this).text()),
        stick: true
      });

      $(this).draggable({
        zIndex: 999,
        revert: true,
        revertDuration: 0
      });
    });

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      droppable: true,
      drop: function(event) {
        if ($('#drop-remove').is(':checked')) {
          $(this).remove();
        }

        // Send event data to Laravel using AJAX
        var eventData = {
          title: event.target.innerText,
          start_date: event.start.format(),
          end_date: event.end ? event.end.format() : null
        };

        $.ajax({
          url: '/events', // Replace with your Laravel route for storing events
          type: 'POST',
          dataType: 'json',
          data: eventData,
          success: function(response) {
            // Handle success response
            console.log('Event stored successfully!');
          },
          error: function(xhr, status, error) {
            // Handle error response
            console.error('Error storing event:', error);
          }
        });
      },
      dayClick: function(event, jsEvent, view) {
        $('#calendarModal').modal('show');
      },
      events: [
        {
          title: 'simple event',
          start: '2018-06-02'
        },
        {
          title: 'event with URL',
          url: 'https://www.google.com/',
          start: '2018-06-03'
        }
      ]
    });
  })(jQuery);

