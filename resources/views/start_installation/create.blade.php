@extends('layouts.app')
@section('title')
    View Installation
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bs4-summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ mix('assets/css/invoices/invoices.css') }}">
@endsection
@section('content')

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

                <button @if ($invoice->progress != 0) style="display: none;" @endif id="startButton"
                    onclick="startTimer()" class="btn btn-primary form-btn float-right-mobile">
                    Start Installation
                </button>

                <button
                    @if ($invoice->progress == 1 || $invoice->progress == 3) style="display: inline-block;" @else
                style="display: none;" @endif
                    class="btn btn-info form-btn float-right-mobile" id="pauseButton" onclick="pauseTimernotes()"
                    data-toggle="modal" data-target="#myModal">Pause
                    Installation</button>

                <button id="resumeButton" @if ($invoice->progress != 2) style="display: none;" @endif
                    class="btn btn-danger form-btn float-right-mobile" onclick="resumeTimerbutton()">Resume
                    Installation</button>

                <button data-toggle="modal" data-target="#myModal" id="endButton"
                    @if ($invoice->progress == 0 || $invoice->progress == 4) style="display:none" @endif
                    class="btn btn-danger form-btn float-right-mobile" onclick="endTimernotes()">End Installation</button>



                <a href="{{ route('assigned.warranty', $invoice->id) }}" id="warrantyButton"
                    @if ($invoice->progress != 4) style="display: none;" @endif
                    class="btn btn-success form-btn float-right-mobile">
                    Start/Open
                    Warranty
                </a>


                <button @if ($invoice->progress == 0) style="display:none" @endif
                    class="btn btn-danger form-btn float-right-mobile" id="cancelButton" onclick="stopTimer()">
                    Cancel </button>




            </div>
        </div>
        <div class="section-body">


            <!----ends here --->
            @include('layouts.errors')
            <div class="card">


                <div class="row" style="padding: 30px">

                    <div class="form-group col-md-4 col-12">
                        {{ Form::label('title', 'Invoice  :') }}
                        <p>{{ html_entity_decode($invoice->title) }}</p>
                    </div>



                    <div class="form-group col-md-4 col-12">
                        {{ Form::label('title', ' Customer Name  :') }}
                        <p>{{ html_entity_decode($invoice->customer->client_name) }}</p>
                    </div>


                    <div class="form-group col-md-4 col-12">
                        {{ Form::label('title', ' Company Name :') }}
                        <p>{{ html_entity_decode($invoice->customer->company_name) }}</p>
                    </div>

                    <div class="form-group col-md-4 col-12">
                        {{ Form::label('title', 'Customer Phone :') }}
                        <p>{{ html_entity_decode($invoice->customer->phone) }}</p>
                    </div>


                    {{-- <h6>
                    Address : @foreach ($invoice->customer->installationaddresses as $address)
                    {{ $address->mapaddress }}, @endforeach
                </h6>

                --}}
                    <?php

                    $manage = permission_count(auth()->user()->id, 42);

                    ?>

                    @if (auth()->user()->is_admin == 1 || $manage > 0)
                        <div class="form-group col-md-4 col-12">
                            {{ Form::label('title', 'Assigned To :') }}
                            <p>
                                @if (isset($invoice->employee->id))
                                    {{ html_entity_decode($invoice->employee->first_name . '  ' . $invoice->employee->last_name . ' (' . $invoice->employee->email . ')') }}
                                @endif
                            </p>
                        </div>
                    @endif


                </div>






                {{ Form::open(['route' => 'installation.store', 'validated' => false, 'id' => 'invoiceForm']) }}
                <input type="hidden" name="invoice_id" value="{{ $invoice->id }}" />
                <div class="">
                    <div>
                        <div class="alert alert-danger d-none" id="validationErrorsBox"></div>


                        <div class="row" style="position: relative">
                            <div class=" col-sm-6 " style="margin-left: 20px">

                                {{ Form::label('installation_date', 'Date Of Installation') }}


                                <input readonly value="{{ $invoice->installation_date }}" required
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
                                <h2 id="counter">{{ $days }} days
                                    {{ $hours }}:{{ $minutes }}:{{ $seconds }}</h2>



                            </div>




                        </div>




                    </div>
                    <div class="col-sm-6" style="padding: 20px  ; display:none ">
                        <input required readonly id="address" class="form-control" type=""
                            value="{{ $invoice->address }}" name="address" placeholder="Location Address" />
                    </div>

                    <div style="display: none">
                        <input id="user_lat_in" class="form-control" type="" value="{{ $invoice->map }}"
                            name="lat" />
                        <input id="user_log_in" class="form-control" type="" value="0" name="long" />
                    </div>

                    {{ Form::close() }}
                    <div class="row">
                        <div class="form-group col-sm-12">














                            <div style="padding: 20px">
                                @if (count($notes) > 0)
                                    <h6> Installation Notes
                                    </h6>
                                @endif
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
                                        @foreach ($notes as $note)
                                            <tr>
                                                <td>
                                                Date  :      {{ date_format($note->created_at, 'd-M-Y') }}
                                                <br/>

                                                Type : {{ $note->type }}

                                                </td>
                                                <td>
                                                    {{ $note->note }}
                                                  {{-- just get the predefined fields here  okay   --}}
                                                  <br/>
                                                  <br/>

                                                    @if($note->predefined_value  !=  NULL)
                                                            <?php
                                                                $predefined_value  =  json_decode($note->predefined_value  ,  true);
                                                                $predefined_label  =  json_decode($note->predefined_label ,  true);
                                                                $count = 0  ;

                                                            ?>

                                                            @foreach($predefined_value   as $data)
                                                                    @if($data != "")
                                                                        <label>  {{  $predefined_label[$count] }} : </label>

                                                                        <input  readonly  class="form-control"  value="{{  $data }}" />

                                                                    @endif


                                                                @php  $count++ ;  @endphp

                                                            @endforeach

                                                    @endif
                                                    <br/>

                                                </td>


                                                <td><a href="/admin/delete_note/{{ $note->id }}"> <i style="color: red"
                                                            class="fa fa-trash"></i> </a></td>


                                            </tr>
                                        @endforeach

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
                                                <form id="formserial{{ $sales->id }}" method="post">

                                                    <input type="hidden" name="id" value="{{ $sales->id }}" />

                                                    <div class="input-group">

                                                        <input name="serial_no" class="form-control"
                                                            placeholder="Enter Serial No"
                                                            value="{{ $sales->serial_no }}" />
                                                        <div class="input-group-prepend"> <button
                                                                id="serialbutton<?php echo $sales->id; ?>"
                                                                onclick="subserial({{ $sales->id }})" type="button"
                                                                class="btn btn-sm btn-success">
                                                                @if ($sales->serial_no == null)
                                                                    Save
                                                                @else
                                                                    Update
                                                                @endif
                                                            </button></div>



                                                    </div>




                                                </form>
                                            </td>
                                            <td> {{ $sales->item }}</td>
                                            <td>
                                                <form id="formproduct{{ $sales->id }}"
                                                    action="{{ route('upload-image') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="id" value="{{ $sales->id }}" />

                                                    <input onchange="subimage({{ $sales->id }})" style="display: none"
                                                        type="file" name="image" id="image{{ $sales->id }}"
                                                        accept="image/*">
                                                    <label class="btn" for="image{{ $sales->id }}" type="submit">
                                                        📷 Upload
                                                        Image</label>


                                                </form>

                                                <div id="imagepreview{{ $sales->id }}">
                                                    @if ($sales->image != null)
                                                        <a href="{{ $sales->image }}">
                                                            <img src="{{ $sales->image }}" height="100"
                                                                width="100" /> </a>
                                                    @endif
                                                </div>

                                            </td>



                                        </tr>

                                        <?php  } ?>
                                    </tbody>

                                </table>

                            </div>
                            <div class="col-sm-12 col-form-label">
                                <strong class="field-title">
                                    @if (count($invoice->customer->installationaddresses) > 1)
                                        Locations
                                    @else
                                        Location
                                    @endif
                                </strong>
                            </div>

                            <div class="col-sm-12 col-content" style="width:100%">

                                @foreach ($invoice->customer->installationaddresses as $address)
                                    @if ($address->latlog != null)
                                        <h6> Address : {{ $address->mapaddress }}

                                            <br />
                                            House No : {{ $address->street }}
                                            <br />

                                            Postcode : {{ $address->zip }}

                                            <br />

                                            Locality : {{ $address->locality }}

                                            <br />
                                            Region : {{ $address->country == 2 ? 'Gozo' : 'Malta' }}


                                        </h6>
                                        <div style=" height: 300px;width: 100%;" id="in_map{{ $address->id }}"> </div>
                                    @endif
                                @endforeach





                                <br />





                            </div>



                        </div>



                    </div>
                    {{--
                <div class="row">

                    <div class="col-sm-12 col-content" style="width:100%">
                        <div class="col-sm-12 col-form-label">
                            <strong class="field-title">Customer Message</strong>
                        </div>

                        <div class="col-sm-12 col-content" style="width:100%">
                            <textarea class="form-control" name="message"></textarea>
                        </div>



                    </div>


                </div>
                --}}



                    <div class="" style="margin-top: 30px">
                    </div>





                </div>






            </div>
        </div>
    </section>
    @include('invoices.templates.templates')
    @include('tags.common_tag_modal')
    @include('payment_modes.common_payment_mode')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/bs4-summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ mix('assets/js/select2.min.js') }}"></script>
@endsection
@section('scripts')
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
        let days = {{ $days }};
        let hours = {{ $hours }};
        let minutes = {{ $minutes }};
        let seconds = {{ $seconds }};
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
                url: '/admin/progress/{{ $invoice->id }}/3',
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
                url: '/admin/progress/{{ $invoice->id }}/1',
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
                url: '/admin/progress/{{ $invoice->id }}/2',
                type: 'POST',
                data: {
                    note: message,
                    _token: '{{ csrf_token() }}', // Include the CSRF token

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
                                    <td> Date : {{ date('d-M-Y') }}   <br/>  Type : Pause Installation Note  </td>
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
                url: '/admin/progress/{{ $invoice->id }}/4',
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
                      Date  :   {{ date('d-M-Y') }} <br/>
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
                    url: '/admin/progress/{{ $invoice->id }}/0',
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
        @foreach ($invoice->customer->installationaddresses as $address)
            @if ($address->latlog != null)
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
                var map{{ $address->id }} = L.map('in_map{{ $address->id }}').setView([{{ $lat_in }},
                    {{ $long_in }}
                ], 13);
                /*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
                // Add the OpenStreetMap tiles
                L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
                    attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
                    maxZoom: 20,
                    minZoom: 5,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                }).addTo(map{{ $address->id }});

                L.marker([{{ $lat_in }}, {{ $long_in }}], {
                    title: "{{ $address->mapaddress }}"
                }).addTo(map{{ $address->id }}).openPopup();
                // leaflet draw
                //search options


                searchControl{{ $address->id }} = L.esri.Geocoding.geosearch({
                    position: "topright",
                    placeholder: "Enter Location Address",
                    useMapBounds: false,
                    expanded: true,
                    providers: [
                        L.esri.Geocoding.arcgisOnlineProvider({
                            apikey: apiKey,
                            nearby: {
                                lat: {{ $lat_in }},
                                lng: {{ $long_in }}
                            }
                        })
                    ]
                }).addTo(map{{ $address->id }});

                results{{ $address->id }} = L.layerGroup().addTo(map{{ $address->id }});

                searchControl{{ $address->id }}.on("results", function(data) {
                    // $('#pac-input').val($(".geocoder-control-input").val());
                    results.clearLayers();
                    for (let i = data.results.length - 1; i >= 0; i--) {


                        results.addLayer(L.marker(data.results[i].latlng));
                    }
                });
            @endif
        @endforeach
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
                        url: "{{ route('upload-image') }}",
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
                    url: "{{ route('serial-update') }}",
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
                        {{ csrf_field() }}

                        <textarea style="height: 100px" placeholder="Enter Note" id="notemessage" class="form-control" name="note"></textarea>

                        <br />

                        <!-------show predefined fields---->

                        <div  id="predefined_field" class="predefined_field">

                                @foreach ($fields as $field)
                                    <div class="form-group">
                                        <label> {{ $field->reply_name }} </label>
                                        <input type="hidden" value="{{ $field->reply_name }}" name="predefined_label[]" />
                                        <input placeholder="{{ $field->reply_name }}" name="predefined_value[]" value=""
                                            class="form-control" />
                                    </div>
                                @endforeach

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
@endsection
