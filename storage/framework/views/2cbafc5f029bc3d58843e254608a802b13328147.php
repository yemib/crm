<?php $__env->startSection('title'); ?>
  Job Calendar
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/services/services.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

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

        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if(isset($job->id)): ?>

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

            id: "<?php echo e($job->id); ?>",
             className :  ['<?php echo e($classname); ?>'],
            title: '<?php echo e($name); ?>',
            allDay:true,


            start: '<?php echo e($job->installation_date); ?>',
            end: '<?php echo e($job->installation_date); ?>',
            url: '<?php echo e(route("employee.view.project"  ,$job->id  )); ?>',


          },

          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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


<?php $__env->stopSection(); ?>


<?php $__env->startSection('top_script'); ?>

<script src="/fullcalendar/dist/index.global.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/job/calendar.blade.php ENDPATH**/ ?>