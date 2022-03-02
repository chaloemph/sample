<!DOCTYPE html>
<html>
<head>
  <title>Lipeferry</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" />
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.print.css" rel="stylesheet" media="print">

<script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
 
<style>
    .fc-time{
        display : none;
    }
    body .fc {
        overflow:auto;
    }
    .fc-event, .fc-event-dot{
        background-color: #dc3545;
        border-color: #dc3545;
        color: aliceblue;
    }
    .fc .fc-row .fc-content-skeleton table, .fc .fc-row .fc-content-skeleton td, .fc .fc-row .fc-helper-skeleton td{
        text-align: center;
        /* color: white; */
    }
</style>
<body>
  <div class="container">
      <div class="row">
          <div class="col my-3">
            <h1>{{ ($type === 'ship')? 'จัดการตารางเรือ':'จัดการตารางรถ' }}</h1>
            <h3>ต้นทาง : {{$schedules->startpoint}} ปลายทาง : {{$schedules->endpoint}} เวลา : {{$schedules->starttime}}</h3>
          </div>
      </div>
      <div class="response"></div>
      <div id='calendar'></div>  
  </div>
 {{-- {{dd($type)}} --}}
 <script>
  $(document).ready(function () {
         
        var SITEURL = "/";
        
 
        var calendar = $('#calendar').fullCalendar({
            // editable: true,
            lang: 'th',
            events: SITEURL + "fullcalendar/{{$type}}/{{$type_id}}",
            displayEventTime: true,
            editable: true,
            droppable: true,
            dayMaxEvents: 1,

            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var title = "off"
 
                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                    
                    $.ajax({
                        url: SITEURL + "fullcalendar/create",
                        data: {title,start,end,_token:'{{csrf_token()}}',type:'{{$type}}',type_id:'{{$type_id}}'},
                        type: "POST",
                        dataType: "JSON",
                        success: function (data) {
                            if(!data.id) {
                                calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                    true
                            );
                            }
                            displayMessage("Added Successfully");
                        }
                    });
                }
                calendar.fullCalendar('unselect');
            },
             
            eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: SITEURL + 'fullcalendar/update',
                            data:{title:event.title,start,end,id:event.id,_token:'{{csrf_token()}}',type:'{{$type}}',type_id:'{{$type_id}}'},
                            type: "POST",
                            success: function (response) {
                                displayMessage("Updated Successfully");
                            }
                        });
                    },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + 'fullcalendar/delete',
                        data: {id:event.id,_token:'{{csrf_token()}}',type:'{{$type}}',type_id:'{{$type_id}}'},
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Deleted Successfully");
                            }
                        }
                    });
                }
            },
            viewRender: function (view, element) {
                var month = $('.fc-left').text().split(" ")[0]
                change_month(month , $('.fc-left').text().split(" ")[1])
        }
            
        });

        

  });

  function displayMessage(message) {
    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
  }

  function change_month(month, year) {
      switch (month) {
            case 'January':
              month = 'มกราคม';
            break;
            case 'February':
              month = 'กุมภาพันธ์';
            break;
            case 'March':
              month = 'มีนาคม';
            break;
            case 'April':
              month = 'เมษายน';
              break;
              case 'May':
              month = 'พฤษภาคม';
              break;
              case 'June':
              month = 'มิถุนายน';
              break;
              case 'July':
              month = 'กรกฎาคม';
              break;
              case 'August':
              month = 'สิงหาคม';
              break;
              case 'September':
              month = 'กันยายน';
              break;
              case 'October':
              month = 'ตุลาคม';
              break;
              case 'November':
              month = 'พฤศจิกายน';
              break;
              case 'December':
              month = 'ธันวาคม';
              break; 
      }
      $('.fc-left').find("h2").text(`${month} ${year}`)
  }

  
</script>

</body>
</html>