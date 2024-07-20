@extends('layouts.app')
@section('title')
  Job Calendar
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ mix('assets/css/services/services.css') }}">
@endsection
@section('css')
@endsection
@section('content')

<style>
    .progress{
    background-color: blue  !important;
    color: white !important ;

    display: inline-block;
         padding: 10px;





    }

    .completed{

        background-color: green  !important;
    color: white !important;
    display: inline-block;
    padding: 10px;

    }

    .fc-h-event .fc-event-title{

        overflow: show !important ;
          width:  100%  !important ;

    }


.fc-h-event .fc-event-title-container {
    flex-grow: 1;
    flex-shrink: 1;
    min-width: 0;
}
.fc-h-event .fc-event-title {
    display: inline;
    vertical-align: center;

    max-width: 100%;
    overflow: show;
}


    </style>

{{--
<script>
    //'prevYear,prev,next,nextYear today'

        // center: 'title',
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: 'prev,next title',
            right: 'dayGridMonth,dayGridWeek,dayGridDay,list'
          },
          initialDate: '<?php echo date('Y-m-d');  ?>',
          navLinks: true, // can click day/week names to navigate views
          editable: true,
          dayMaxEvents: true,
            minTime: '08:00:00',
        maxTime: '20:00:00',
             weekends: true,
        allDaySlot: true,

              views: {
        dayGridMonth: { // name of view

          // other view-specific options here
        },


              dayGrid: {
          // options apply to dayGridMonth, dayGridWeek, and dayGridDay views
        },
        timeGrid: {
          // options apply to timeGridWeek and timeGridDay views
        },
        week: {
          // options apply to dayGridWeek and timeGridWeek views
        },
        day: {
          // options apply to dayGridDay and timeGridDay views
        }	,


      },



        // allow "more" link when too many events
          events: [
                id:'weldoen',
                 classNames:['weldone'],
              title: 'customer',
              start: '2023-07-20',
              end: '2023-07-22',
                dow: '1, 5',
            allDay: false,
            backgroundColor : 'rgba(40,199,111,.12)'   ,

            borderColor:'rgba(40,199,111,.1)' ,


            textColor: '#28c76f'  ,

               },

          ];
        });

        calendar.render();
      });

</script>

 --}}

 <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: '<?php echo date('Y-m-d');  ?>',
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,
        selectable: true,
        dayMaxEvents: true,
        weekends: true,
        allDaySlot: true,
        events: [

        @foreach ($jobs as  $job)

        @if(isset($job->id))

        <?php

        $classname  =  "";
        $name  =  "";


        if(isset($job->id)){

            $name  =  $job->title  .  " ( " .  $job->invoice_number .  " )" ;
            $name = char_length($name , 20);



            if($job->job_done  == 2){

                $classname =  "completed";

            }else{
                 $classname  =  "progress";

            }


        }

        ?>




          {

            id: "{{ $job->id}}",
             className :  ['{{ $classname  }}'],
            title: '{{   $name   }}',
            allDay:true,


            start: '{{ $job->installation_date}}',
            end: '{{ $job->installation_date}}',
            url: '{{ route("employee.view.project"  ,$job->id  )}}',


          },

          @endif
          @endforeach

        ]


      });

      calendar.render();
    });

  </script>


    <section class="section">
        <div class="section-header">
            <h1  style="text-transform: capitalize">Jobs  Calender</h1>
            <div class="section-header-breadcrumb">



            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                <!---  place calendar here  .--->
                    <div  id="calendar"></div>

                </div>
            </div>
        </div>

    </section>


@endsection


@section('top_script')

<script src="/fullcalendar/dist/index.global.js"></script>

@endsection
