@extends('layouts.calendareventlayouts.calendarlayout')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<body>
<div class="row d-flex justify-content-between" style="position:relative; top:20px;">
    <div class="column">
      <h2 style="color: dimgray; font-size:20px; ">List of Events</h2><hr>
      <div class="card" style="width: 445px; margin:auto;">
        <h3 style="color: dimgray; font-size: 20px;">
            <img src="/images/image17.png" class="user-image img-circle elevation-2" alt="User Image" style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
            School Events
        </h3>
           <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-dark" style="text-align: center">Event Title</th>
                        <th class="text-dark" style="text-align: center">Date</th>
                        <th class="text-dark" style="text-align:center">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $sched)
                    <tr class="text-dark">
                         
                        <td>{{$sched->title}}</td>
                        <td>{{$sched->start}}</td>
                        <td>-</td>
                        

                    </tr>
                    @endforeach
                    
                </tbody>
           </table>
       
        <button class="btn btn-sm input-group-center bg-success ">Send to all students</button>
      </div>

     
      
   
</div>
  
    <div class="column">
        <h3 style="color: dimgray; font-size:20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin:auto;">Calendar of Events</h3><hr>
        <div class="card d-flex justify-content-end" style="width: 445px;">
        <div id='calendar' class="calendar elevation-2 rounded mx-auto" style="width:100%;">
        </div>
   
      </div>
    </div>
  </div>

</body>
   



<script>
$(document).ready(function () {
    
   
    
   
var SITEURL = "{{ url('/') }}";
  
$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: SITEURL + "/fullcalender",
                    displayEventTime: false,
                    editable: true,
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
                        var title = prompt('Event Title:');
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                            $.ajax({
                                url: SITEURL + "/fullcalenderAjax",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    type: 'add'
                                },
                                type: "POST",
                                success: function (data) {
                                    displayMessage("Event Created Successfully");
  
                                    calendar.fullCalendar('renderEvent',
                                        {
                                            id: data.id,
                                            title: title,
                                            start: start,
                                            end: end,
                                            allDay: allDay
                                        },true);
  
                                    calendar.fullCalendar('unselect');
                                }
                            });
                        }
                    },
                    eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
  
                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update'
                            },
                            type: "POST",
                            success: function (response) {
                                displayMessage("Event Updated Successfully");
                            }
                        });
                    },
                    eventClick: function (event) {
                        var deleteMsg = confirm("Do you really want to delete scheduled event?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/fullcalenderAjax',
                                data: {
                                        id: event.id,
                                        type: 'delete'
                                },
                                success: function (response) {
                                    calendar.fullCalendar('removeEvents', event.id);
                                    displayMessage("Event Deleted Successfully");
                                }
                            });
                        }
                    }
 
                });
 
});
 
function displayMessage(message) {
    toastr.success(message, 'Event');
} 
  
</script>

</html>

<style scoped>

* {
      box-sizing: border-box;
    }
    
    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    
    /* Float four columns side by side */
    .column {
      float: left;
      width: 25%;
      padding: 0 10px;
    }
    
    /* Remove extra left and right margins, due to padding */
    .row {margin: 0 -5px;}
    
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    
    /* Responsive columns */
    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
      }
    }
    
    /* Style the counter cards */
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 16px;
      text-align: center;
      background-color: #f1f1f1;
    }








    
   .fc-toolbar{
    background-color: #292b2c;
   }
   h2{
    color:white;
    font-size: 25px;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   }
   button{
    background-color: white;
   }
   
   .fc-day-header{
    background-color:#292b2c;
    color:white;
   }

   .fc-day-number{
    font-weight: bold;
    color:#292b2c;
    
    
   }

   .fc-unthemed td.fc-today{
    background-color: #d9534f; 
    color:white;
   }

   .fc-content{
    color:white;
   }

   .calendar{
    background-color:silver;
    position:relative;
    top:3px;
  
   }


   
</style>
    
@endsection