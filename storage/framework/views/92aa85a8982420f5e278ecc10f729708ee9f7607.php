<?php $__env->startSection('title'); ?>
    View Installation
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
    <link href="<?php echo e(asset('css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/@fortawesome/fontawesome-free/css/all.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/invoices/invoices.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <style>
        #out_map,
        #in_map,
        map {
            height: 300px;
            width: 100%;
        }
    </style>

    <section class="section" style="overflow: auto">
        <div class="section-header">
            <h1>Project Details</h1>

            <div class="section-header-breadcrumb">

                <button <?php if($invoice->progress != 0): ?> style="display: none;" <?php endif; ?> id="startButton"
                    onclick="startTimer()" class="btn btn-primary form-btn float-right-mobile">
                    Start Installation
                </button>

                <button
                    <?php if($invoice->progress == 1 || $invoice->progress == 3): ?> style="display: inline-block;" <?php else: ?>
                style="display: none;" <?php endif; ?>
                    class="btn btn-info form-btn float-right-mobile" id="pauseButton" onclick="pauseTimernotes()"
                    data-toggle="modal" data-target="#myModal">Pause
                    Installation</button>

                <button id="resumeButton" <?php if($invoice->progress != 2): ?> style="display: none;" <?php endif; ?>
                    class="btn btn-danger form-btn float-right-mobile" onclick="resumeTimerbutton()">Resume
                    Installation</button>

                <button data-toggle="modal" data-target="#myModal" id="endButton"
                    <?php if($invoice->progress == 0 || $invoice->progress == 4): ?> style="display:none" <?php endif; ?>
                    class="btn btn-danger form-btn float-right-mobile" onclick="endTimernotes()">End Installation</button>



                <a href="<?php echo e(route('assigned.warranty', $invoice->id)); ?>" id="warrantyButton"
                    <?php if($invoice->progress != 4): ?> style="display: none;" <?php endif; ?>
                    class="btn btn-success form-btn float-right-mobile">
                    Start/Open
                    Warranty
                </a>


                <button <?php if($invoice->progress == 0): ?> style="display:none" <?php endif; ?>
                    class="btn btn-danger form-btn float-right-mobile" id="cancelButton" onclick="stopTimer()">
                    Cancel </button>




            </div>
        </div>
        <div class="section-body">


            <!----ends here --->
            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">


                <div class="row" style="padding: 30px">

                    <div class="form-group col-md-4 col-12">
                        <?php echo e(Form::label('title', 'Invoice  :')); ?>

                        <p><?php echo e(html_entity_decode($invoice->title)); ?></p>
                    </div>



                    <div class="form-group col-md-4 col-12">
                        <?php echo e(Form::label('title', ' Customer Name  :')); ?>

                        <p><?php echo e(html_entity_decode($invoice->customer->client_name)); ?></p>
                    </div>


                    <div class="form-group col-md-4 col-12">
                        <?php echo e(Form::label('title', ' Company Name :')); ?>

                        <p><?php echo e(html_entity_decode($invoice->customer->company_name)); ?></p>
                    </div>

                    <div class="form-group col-md-4 col-12">
                        <?php echo e(Form::label('title', 'Customer Phone :')); ?>

                        <p><?php echo e(html_entity_decode($invoice->customer->phone)); ?></p>
                    </div>


                    
                    <?php

                    $manage = permission_count(auth()->user()->id, 42);

                    ?>

                    <?php if(auth()->user()->is_admin == 1 || $manage > 0): ?>
                        <div class="form-group col-md-4 col-12">
                            <?php echo e(Form::label('title', 'Assigned To :')); ?>

                            <p>
                                <?php if(isset($invoice->employee->id)): ?>
                                    <?php echo e(html_entity_decode($invoice->employee->first_name . '  ' . $invoice->employee->last_name . ' (' . $invoice->employee->email . ')')); ?>

                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endif; ?>


                </div>






                <?php echo e(Form::open(['route' => 'installation.store', 'validated' => false, 'id' => 'invoiceForm'])); ?>

                <input type="hidden" name="invoice_id" value="<?php echo e($invoice->id); ?>" />
                <div class="">
                    <div>
                        <div class="alert alert-danger d-none" id="validationErrorsBox"></div>


                        <div class="row" style="position: relative">
                            <div class=" col-sm-6 " style="margin-left: 20px">

                                <?php echo e(Form::label('installation_date', 'Date Of Installation')); ?>



                                <input readonly value="<?php echo e($invoice->installation_date); ?>" required
                                    id="date_of_installation" class="form-control" name="installation_date"
                                    placeholder="Date Of Installation" type="date" />



                            </div>




                            <?php

                            $days = 0; // Total days
                            $hours = 0; // Hours
                            $minutes = 0; // Minutes
                            $seconds = 0;
                            if ($invoice->start_date != null && $invoice->progress != 0) {
                                // Define two date-time strings
                                $date1 = $invoice->start_date;
                                $date2 = date('Y-m-d H:i:s');
                                if ($invoice->progress == 2 || $invoice->progress == 3) {
                                    $date2 = $invoice->pause_date;

                                    //echo("pulse state");
                                }

                                if ($invoice->progress == 4) {
                                    $date2 = $invoice->end_date;
                                    //echo("end state");
                                }

                                // Create DateTime objects for each date
                                $dateTime1 = new DateTime($date1);
                                $dateTime2 = new DateTime($date2);

                                // Calculate the interval between the two dates
                                $interval = $dateTime1->diff($dateTime2);

                                // Extract the difference in days, hours, minutes, and seconds
                                $days = $interval->format('%a'); // Total days
                                $hours = $interval->format('%h'); // Hours
                                $minutes = $interval->format('%i'); // Minutes
                                $seconds = $interval->format('%s'); // Seconds
                            }
                            // Display the results
                            // echo "Difference: $days days, $hours hours, $minutes minutes, $seconds seconds";
                            ?>

                            <?php

                            if ($invoice->progress == 3) {
                                //echo("resume state < br/> ");

                                //have
                                $date1 = $invoice->resume_date;
                                $date2 = date('Y-m-d H:i:s');
                                $dateTime1 = new DateTime($date1);
                                $dateTime2 = new DateTime($date2);

                                $interval = $dateTime1->diff($dateTime2);

                                $days1 = $interval->format('%a'); // Total days
                                $hours1 = $interval->format('%h'); // Hours
                                $minutes1 = $interval->format('%i'); // Minutes
                                $seconds1 = $interval->format('%s');

                                // Convert components to seconds
                                $totalSeconds1 = $seconds1 + $minutes1 * 60 + $hours1 * 3600 + $days1 * 86400;
                                $totalSeconds2 = $seconds + $minutes * 60 + $hours * 3600 + $days * 86400;

                                // Add the seconds together
                                $resultSeconds = $totalSeconds1 + $totalSeconds2;

                                // Calculate the new components
                                $resultDays = floor($resultSeconds / 86400);
                                $resultSeconds -= $resultDays * 86400;
                                $resultHours = floor($resultSeconds / 3600);
                                $resultSeconds -= $resultHours * 3600;
                                $resultMinutes = floor($resultSeconds / 60);
                                $resultSeconds -= $resultMinutes * 60;

                                $days = $resultDays;
                                $seconds = $resultSeconds;
                                $hours = $resultHours;
                                $minutes = $resultMinutes;

                                //echo   ("$days1  : $hours1 : $minutes1  : $seconds1");
                            }

                            ?>




                            <div class="col-sm-4">
                                <label> Time Taken </label>
                                <h2 id="counter"><?php echo e($days); ?> days
                                    <?php echo e($hours); ?>:<?php echo e($minutes); ?>:<?php echo e($seconds); ?></h2>



                            </div>




                        </div>




                    </div>
                    <div class="col-sm-6" style="padding: 20px  ; display:none ">
                        <input required readonly id="address" class="form-control" type=""
                            value="<?php echo e($invoice->address); ?>" name="address" placeholder="Location Address" />
                    </div>

                    <div style="display: none">
                        <input id="user_lat_in" class="form-control" type="" value="<?php echo e($invoice->map); ?>"
                            name="lat" />
                        <input id="user_log_in" class="form-control" type="" value="0" name="long" />
                    </div>

                    <?php echo e(Form::close()); ?>

                    <div class="row">
                        <div class="form-group col-sm-12">














                            <div style="padding: 20px">
                                <?php if(count($notes) > 0): ?>
                                    <h6> Installation Notes
                                    </h6>
                                <?php endif; ?>
                                <!-----notes  ---->
                                <table id="table_note" border="1" class="table">

                                    <thead>

                                        <tr>

                                            <th>Date</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                Date  :      <?php echo e(date_format($note->created_at, 'd-M-Y')); ?>

                                                <br/>

                                                Type : <?php echo e($note->type); ?>


                                                </td>
                                                <td>
                                                    <?php echo e($note->note); ?>

                                                  
                                                  <br/>
                                                  <br/>

                                                    <?php if($note->predefined_value  !=  NULL): ?>
                                                            <?php
                                                                $predefined_value  =  json_decode($note->predefined_value  ,  true);
                                                                $predefined_label  =  json_decode($note->predefined_label ,  true);
                                                                $count = 0  ;

                                                            ?>

                                                            <?php $__currentLoopData = $predefined_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($data != ""): ?>
                                                                        <label>  <?php echo e($predefined_label[$count]); ?> : </label>

                                                                        <input  readonly  class="form-control"  value="<?php echo e($data); ?>" />

                                                                    <?php endif; ?>


                                                                <?php  $count++ ;  ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <?php endif; ?>
                                                    <br/>

                                                </td>


                                                <td><a href="/admin/delete_note/<?php echo e($note->id); ?>"> <i style="color: red"
                                                            class="fa fa-trash"></i> </a></td>


                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>

                                </table>


                                <h6> Products Installed
                                </h6>
                                <br />

                                <table
                                    class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-bordered"
                                    style="">
                                    <thead>
                                        <tr>
                                            <th>Serial No :</th>
                                            <th>Product Installed :</th>
                                            <th>Product Image</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php foreach ($invoice->salesItems as $sales) {
                                    # code...
                                    ?>



                                        <tr>
                                            <td>
                                                <form id="formserial<?php echo e($sales->id); ?>" method="post">

                                                    <input type="hidden" name="id" value="<?php echo e($sales->id); ?>" />

                                                    <div class="input-group">

                                                        <input name="serial_no" class="form-control"
                                                            placeholder="Enter Serial No"
                                                            value="<?php echo e($sales->serial_no); ?>" />
                                                        <div class="input-group-prepend"> <button
                                                                id="serialbutton<?php echo $sales->id; ?>"
                                                                onclick="subserial(<?php echo e($sales->id); ?>)" type="button"
                                                                class="btn btn-sm btn-success">
                                                                <?php if($sales->serial_no == null): ?>
                                                                    Save
                                                                <?php else: ?>
                                                                    Update
                                                                <?php endif; ?>
                                                            </button></div>



                                                    </div>




                                                </form>
                                            </td>
                                            <td> <?php echo e($sales->item); ?></td>
                                            <td>
                                                <form id="formproduct<?php echo e($sales->id); ?>"
                                                    action="<?php echo e(route('upload-image')); ?>" method="POST"
                                                    enctype="multipart/form-data">
                                                    <?php echo e(csrf_field()); ?>


                                                    <input type="hidden" name="id" value="<?php echo e($sales->id); ?>" />

                                                    <input onchange="subimage(<?php echo e($sales->id); ?>)" style="display: none"
                                                        type="file" name="image" id="image<?php echo e($sales->id); ?>"
                                                        accept="image/*">
                                                    <label class="btn" for="image<?php echo e($sales->id); ?>" type="submit">
                                                        📷 Upload
                                                        Image</label>


                                                </form>

                                                <div id="imagepreview<?php echo e($sales->id); ?>">
                                                    <?php if($sales->image != null): ?>
                                                        <a href="<?php echo e($sales->image); ?>">
                                                            <img src="<?php echo e($sales->image); ?>" height="100"
                                                                width="100" /> </a>
                                                    <?php endif; ?>
                                                </div>

                                            </td>



                                        </tr>

                                        <?php  } ?>
                                    </tbody>

                                </table>

                            </div>
                            <div class="col-sm-12 col-form-label">
                                <strong class="field-title">
                                    <?php if(count($invoice->customer->installationaddresses) > 1): ?>
                                        Locations
                                    <?php else: ?>
                                        Location
                                    <?php endif; ?>
                                </strong>
                            </div>

                            <div class="col-sm-12 col-content" style="width:100%">

                                <?php $__currentLoopData = $invoice->customer->installationaddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($address->latlog != null): ?>
                                        <h6> Address : <?php echo e($address->mapaddress); ?>


                                            <br />
                                            House No : <?php echo e($address->street); ?>

                                            <br />

                                            Postcode : <?php echo e($address->zip); ?>


                                            <br />

                                            Locality : <?php echo e($address->locality); ?>


                                            <br />
                                            Region : <?php echo e($address->country == 2 ? 'Gozo' : 'Malta'); ?>



                                        </h6>
                                        <div style=" height: 300px;width: 100%;" id="in_map<?php echo e($address->id); ?>"> </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                                <br />





                            </div>



                        </div>



                    </div>
                    



                    <div class="" style="margin-top: 30px">
                    </div>





                </div>






            </div>
        </div>
    </section>
    <?php echo $__env->make('invoices.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('tags.common_tag_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('payment_modes.common_payment_mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/custom-datatable.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/bs4-summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/select2.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        function pauseTimernotes() {
            // Display the pause button
            document.getElementById('pausebutton').style.display = "block";
            document.getElementById('endbutton').style.display = "none";
            $('#predefined_field').hide();

            // Update the innerHTML of the element with id 'headingnote'
            document.getElementById('headingnote').innerHTML = "Pause Installation Note";
        }

        function endTimernotes() {
            // Display the pause button
            document.getElementById('endbutton').style.display = "block";
            document.getElementById('pausebutton').style.display = "none";
            $('#predefined_field').show();

            // Update the innerHTML of the element with id 'headingnote'
            document.getElementById('headingnote').innerHTML = "End Installation Note";
        }

        // Variables to track the timer and interval
        let start = false;
        let intervalId;
        let days = <?php echo e($days); ?>;
        let hours = <?php echo e($hours); ?>;
        let minutes = <?php echo e($minutes); ?>;
        let seconds = <?php echo e($seconds); ?>;
        let isPaused = false;
        counterElement = document.getElementById('counter');

        formattedTime =
            `${days} days ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        counterElement.innerText = formattedTime;

        // Function to update the time counter
        function updateTimeCounter() {
            start = true;
            const counterElement = document.getElementById('counter');

            intervalId = setInterval(function() {
                if (!isPaused) {
                    seconds++;
                    if (seconds === 60) {
                        seconds = 0;
                        minutes++;
                    }
                    if (minutes === 60) {
                        minutes = 0;
                        hours++;
                    }
                    if (hours === 24) {
                        hours = 0;
                        days++;
                    }

                    const formattedTime =
                        `${days} days ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                    counterElement.innerText = formattedTime;
                }
            }, 1000); // 1000 milliseconds = 1 second
        }

        // Function to start the timer
        function resumeTimer() {
            //document.getElementById('stopButton').disabled = false;
            isPaused = false;
            //send an ajax here  okay!!
            if (start == false) {
                updateTimeCounter();

            }

        }



        //now resume the  timer now

        function resumeTimerbutton() {
            document.getElementById('pauseButton').style.display = "inline-block";
            document.getElementById('resumeButton').style.display = "none";

            // document.getElementById('stopButton').disabled = false;

            isPaused = false;

            $.ajax({
                url: '/admin/progress/<?php echo e($invoice->id); ?>/3',
                type: 'GET',

                success: function(data) {
                    // Handle the successful response here
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(xhr.responseText);
                }
            });

            //send an ajax here  okay!!
            if (start == false) {

                updateTimeCounter();
            }
        }






        function startTimer() {



            //document.getElementById('stopButton').disabled = false;



            //send an ajax here  okay!!

            $.ajax({
                url: '/admin/progress/<?php echo e($invoice->id); ?>/1',
                type: 'GET',

                success: function(data) {
                    // Handle the successful response here
                    // console.log(data);
                    isPaused = false;
                    if (start == false) {
                        updateTimeCounter();
                    }



                    document.getElementById('startButton').style.display = "none";
                    document.getElementById('pauseButton').style.display = "inline-block";
                    document.getElementById('endButton').style.display = "inline-block";
                    document.getElementById('cancelButton').style.display = "inline-block";


                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(xhr.responseText);
                }
            });




        }

        // Function to pause the timer


        function pauseTimer() {

            //alert("thanks");
            //check = confirm("Are You Sure");
            // if (check == true) {
            var message = document.getElementById('notemessage').value;
            var fields = $('#predefine_fields').val();

            $.ajax({
                url: '/admin/progress/<?php echo e($invoice->id); ?>/2',
                type: 'POST',
                data: {
                    note: message,
                    _token: '<?php echo e(csrf_token()); ?>', // Include the CSRF token

                },
                success: function(data) {


                    // Handle the successful response here
                    console.log(data);
                    isPaused = true;
                    document.getElementById('pauseButton').style.display = "none";
                    document.getElementById('resumeButton').style.display = "inline-block";

                    // Add the message
                    $message_value = document.getElementById('table_note').innerHTML;
                    if (message.length != 0) {
                        $output_message = `<tr>
                                    <td> Date : <?php echo e(date('d-M-Y')); ?>   <br/>  Type : Pause Installation Note  </td>
                                    <td >` + message + `</td>
                                    <td><a href="/admin/delete_note/` + data.id +
                            `"><i style="color:red" class="fa fa-trash"></i></a></td></tr>`;
                        $message_value = document.getElementById('table_note').innerHTML = $output_message +
                            $message_value;
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    alert(xhr.responseText);
                    console.error(xhr.responseText);
                }
            });


            // }
        }



        function endTimer() {
            var message = document.getElementById('notemessage').value;
            var form = document.getElementById('note_form');
            const formData = new FormData(form);
            $('.predefined_field').show();

            $.ajax({
                url: '/admin/progress/<?php echo e($invoice->id); ?>/4',
                type: 'POST',
                data: formData,
                processData: false, // Important!
                contentType: false, // Important!
                success: function(data) {
                    // Handle the successful response here
                    console.log(data);
                    isPaused = true;
                    document.getElementById('endButton').style.display = "none";
                    document.getElementById('resumeButton').style.display = "none";
                    document.getElementById('pauseButton').style.display = "none";
                    document.getElementById('warrantyButton').style.display = "inline-block";

                    // Add the message
                    var message_value = document.getElementById('table_note').innerHTML;
                    if (message.length != 0) {
                        //get all the  predefined fields here....

                        var fields = ``;
                        var label  ;


                        if(data.data.predefined_value  !=  null){

                            var predefined_value  =  JSON.parse(data.data.predefined_value);
                            var  $predefined_labels  =  JSON.parse(data.data.predefined_label)   ;



                            $.each(predefined_value, function(index, element) {

                                if(element !=  ""){
                                    fields   +=  ` <label> ${$predefined_labels[index]}   : </label>
                                                <input  readonly  class="form-control"  value="${element}" />`;

                                }



                            });



                        }




                        var output_message = `<tr>
                    <td>
                      Date  :   <?php echo e(date('d-M-Y')); ?> <br/>
                      Type  :    End Installation Note

                        </td>
                    <td>  ${message} <br/><br/> ${fields} <br/></td>

                    <td><a href="/admin/delete_note/` + data.id + `"><i style="color:red" class="fa fa-trash"></i></a></td>
                </tr>`;
                        document.getElementById('table_note').innerHTML = output_message + message_value;
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    alert(xhr.responseText);
                    console.error(xhr.responseText);
                }
            });
        }



        // Function to stop the timer
        function stopTimer() {


            var check = confirm("Are You Sure");

            if (check == true) {

                /*   document.getElementById('startButton').disabled = false;
                  document.getElementById('pauseButton').disabled = true;
                  document.getElementById('stopButton').disabled = true;
                  clearInterval(intervalId); */

                // Reset the timer



                $.ajax({
                    url: '/admin/progress/<?php echo e($invoice->id); ?>/0',
                    type: 'GET',

                    success: function(data) {
                        days = 0;
                        hours = 0;
                        minutes = 0;
                        seconds = 0;
                        // Handle the successful response here
                        //console.log(data);
                        isPaused = true;

                        document.getElementById('resumeButton').style.display = "none";
                        document.getElementById('pauseButton').style.display = "none";
                        document.getElementById('warrantyButton').style.display = "none";
                        document.getElementById('endButton').style.display = "none";
                        document.getElementById('cancelButton').style.display = "none";
                        document.getElementById('startButton').style.display = "inline-block";
                        document.getElementById('counter').innerText = '0 days 00:00:00';
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });

                //send
            }
        }

        <?php
if ($invoice->progress ==  1  ||  $invoice->progress == 3  ){  ?>

        resumeTimer();
        <?php
}  ?>
    </script>



    <?php

    /*
if($data->user_lat_in != ""){
   $lat_in = $data->user_lat_in ;
$long_in = $data->user_log_in ;


}
*/

    //$google_key   =  App\Models\Setting::first();
    ?>
    <script>
        <?php $__currentLoopData = $invoice->customer->installationaddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($address->latlog != null): ?>
                <?php

                //split the address
                $output = str_replace('(', '', $address->latlog);
                $output = str_replace(')', '', $output);
                $output = str_replace('LatLng', '', $output);
                //now explode
                $output = explode(',', $output);
                $lat_in = $output[0];
                $long_in = $output[1];

                ?>

                apiKey =
                    "AAPK9c8be54fb23c4afa9dfdbedca8408781cJdyM_NqIK7SUniTe7bkkIscLlatFcfSfpfSovieUfPj8_83oblovHrfM73E9J4e";
                var map<?php echo e($address->id); ?> = L.map('in_map<?php echo e($address->id); ?>').setView([<?php echo e($lat_in); ?>,
                    <?php echo e($long_in); ?>

                ], 13);
                /*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
                // Add the OpenStreetMap tiles
                L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
                    attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
                    maxZoom: 20,
                    minZoom: 5,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                }).addTo(map<?php echo e($address->id); ?>);

                L.marker([<?php echo e($lat_in); ?>, <?php echo e($long_in); ?>], {
                    title: "<?php echo e($address->mapaddress); ?>"
                }).addTo(map<?php echo e($address->id); ?>).openPopup();
                // leaflet draw
                //search options


                searchControl<?php echo e($address->id); ?> = L.esri.Geocoding.geosearch({
                    position: "topright",
                    placeholder: "Enter Location Address",
                    useMapBounds: false,
                    expanded: true,
                    providers: [
                        L.esri.Geocoding.arcgisOnlineProvider({
                            apikey: apiKey,
                            nearby: {
                                lat: <?php echo e($lat_in); ?>,
                                lng: <?php echo e($long_in); ?>

                            }
                        })
                    ]
                }).addTo(map<?php echo e($address->id); ?>);

                results<?php echo e($address->id); ?> = L.layerGroup().addTo(map<?php echo e($address->id); ?>);

                searchControl<?php echo e($address->id); ?>.on("results", function(data) {
                    // $('#pac-input').val($(".geocoder-control-input").val());
                    results.clearLayers();
                    for (let i = data.results.length - 1; i >= 0; i--) {


                        results.addLayer(L.marker(data.results[i].latlng));
                    }
                });
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>


    <script>
        function validateImageUpload(id) {
            var input = document.getElementById("image" + id);
            var file = input.files[0];

            if (file) {
                var fileType = file.type;
                if (fileType.indexOf("image") === 0) {
                    // It's an image file, proceed with the upload.
                    return true;
                } else {
                    //  alert("Please select a valid image file.");
                    return false; // Prevent the form from submitting.
                }
            } else {
                alert("Please select an image to upload.");
                return false; // Prevent the form from submitting.
            }
        }

        function subimage(id) {
            var validate = validateImageUpload(id);
            try {
                if (validate == true) {

                    $('#imagepreview' + id).html("Uploading...");

                    var form = document.getElementById("formproduct" + id);
                    // Create a FormData object using the form element
                    var formData = new FormData(form);
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo e(route('upload-image')); ?>",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if (data.image_path) {
                                $('#imagepreview' + id).html('<img  height="100"  width="100" src="' + data
                                    .image_path + '" alt="Uploaded Image">');
                            }
                        },
                        error: function(data) {


                            $('#imagepreview' + id).html(data.error);
                        }
                    });

                } else {

                    alert("Please only upload image");
                }
            } catch (e) {
                alert(e);

            }



        }



        function subserial(id) {

            try {
                $('#serialbutton' + id).html("Loading...");

                var form = document.getElementById("formserial" + id);
                // Create a FormData object using the form element
                var formData = new FormData(form);
                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(route('serial-update')); ?>",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        //show toast here  okay ..
                        $('#serialbutton' + id).html("Update");

                        showToastr('success', 'Serial No Saved Successfully');

                    },
                    error: function(data) {

                        //show toast error
                        $('#serialbutton' + id).html("Save");
                        showToastr('error', 'An Error Occured');



                        //  $('#imagepreview'+id).html(data.error);
                    }
                });


            } catch (e) {

                //use toast here...

                alert(e);

            }



        }

        $(document).ready(function() {

            $('.predefine_fieldst').select2({
                placeholder: "Select Predefined Fields"

            });
        });
    </script>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 id="headingnote" class="modal-title">Note</h4>
                    <button type="button" class="close" style="color: red" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <form method="POST" id="note_form">
                        <?php echo e(csrf_field()); ?>


                        <textarea style="height: 100px" placeholder="Enter Note" id="notemessage" class="form-control" name="note"></textarea>

                        <br />

                        <!-------show predefined fields---->

                        <div  id="predefined_field" class="predefined_field">

                                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group">
                                        <label> <?php echo e($field->reply_name); ?> </label>
                                        <input type="hidden" value="<?php echo e($field->reply_name); ?>" name="predefined_label[]" />
                                        <input placeholder="<?php echo e($field->reply_name); ?>" name="predefined_value[]" value=""
                                            class="form-control" />
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>


                        <br />
                        <br />


                    </form>




                    <input data-dismiss="modal" onclick="pauseTimer()" style="display:none" id="pausebutton"
                        class="btn btn-primary" type="submit" value="Pause Installation" />

                    <input data-dismiss="modal" onclick="endTimer()" style="display: none" id="endbutton"
                        class="btn btn-danger" type="submit" value="End Installation" />




                </div>






                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/start_installation/create.blade.php ENDPATH**/ ?>