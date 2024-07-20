@extends('layouts.app')
@section('title')
View Installation
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bs4-summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ mix('assets/css/invoices/invoices.css') }}">
@endsection
@section('content')

<style>
    #out_map  ,  #in_map{
    height: 300px;
    width: 100%  ;
    }
    </style>

    <section class="section">
        <div class="section-header">
            <h1>Project Details</h1>
            <div class="section-header-breadcrumb">

<button @if($invoice->progress  !=  0)   style="display: none;"
       @endif  id="startButton" onclick="startTimer()"
         class="btn btn-primary form-btn float-right-mobile">
                   Start Installation
                </button>

    <button     @if($invoice->progress  ==  1  ||  $invoice->progress  ==  3 )   style="display: inline-block;"   @else    style="display: none;"   @endif

        class="btn btn-info form-btn float-right-mobile" id="pauseButton"
         onclick="pauseTimer()" >Pause Installation</button>

    <button  id="resumeButton"  @if($invoice->progress  !=  2)   style="display: none;"    @endif
        class="btn btn-danger form-btn float-right-mobile"
        onclick="resumeTimerbutton()" >Resume Installation</button>

    <button  id="endButton"  @if($invoice->progress   ==  0   ||   $invoice->progress   == 4 )  style="display:none"   @endif
         class="btn btn-danger form-btn float-right-mobile"
          onclick="endTimer()" >End Installation</button>



      <a  href="{{ route('assigned.invoices.edit'  ,  $invoice->id )}}"   id="warrantyButton"  @if($invoice->progress  !=  4)   style="display: none;"    @endif
          class="btn btn-success  form-btn float-right-mobile" >
    Start/Open
    Warranty
      </a>


    <button   @if($invoice->progress   ==  0)  style="display:none"   @endif   class="btn btn-danger form-btn float-right-mobile"
     id="cancelButton" onclick="stopTimer()" >
     Cancel </button>




            </div>
        </div>
        <div class="section-body">

            <div id="">


<h6>  Invoice :   {{ $invoice->title   }}   </h6>
<h6>  Customer Name  :   {{ $invoice->customer->company_name   }}   </h6>
 <h6>  Customer Phone :   {{ $invoice->customer->phone  }}   </h6>
<h6>  Products  :
    @php  $count  =  0  ; @endphp
    @foreach ( $invoice->salesItems as  $sales )
  {{  $sales->item  }}
  @if($count  >  0  )
        ,
  @endif
  @php  $count++  ; @endphp
@endforeach    </h6>



</div>



<!----ends here --->
            @include('layouts.errors')
            <div class="card">
                {{ Form::open(['route' => 'installation.store', 'validated' => false, 'id' => 'invoiceForm']) }}
                        <input  type="hidden"   name="invoice_id"  value="{{ $invoice->id}}" />
                <div  class="">
                    <div>
                        <div class="alert alert-danger d-none" id="validationErrorsBox"></div>


                        <div class="row">
                            <div class=" col-sm-6 "  style="margin-left: 20px">

                                {{ Form::label('installation_date', 'Date Of Installation') }}


                                <input  readonly  value="{{ $invoice->installation_date}}" required id="date_of_installation" class="form-control" name="installation_date"
                                    placeholder="Date Of Installation" type="date" />



                            </div>




                            <?php

                            $days = 0;        // Total days
                            $hours = 0;       // Hours
                            $minutes = 0;     // Minutes
                            $seconds = 0;
                            if( $invoice->start_date !=  NULL  &&  $invoice->progress !=  0 ){

                            // Define two date-time strings
                            $date1 =  $invoice->start_date;
                            $date2 = date('Y-m-d H:i:s');
                            if( $invoice->progress  ==  2 ||  $invoice->progress  == 3  ){
                                $date2 = $invoice->pause_date;
                            }


                            if($invoice->progress  ==  4){
                                $date2  =  $invoice->end_date  ;


                            }

                            // Create DateTime objects for each date
                            $dateTime1 = new DateTime($date1);
                            $dateTime2 = new DateTime($date2);

                            // Calculate the interval between the two dates
                            $interval = $dateTime1->diff($dateTime2);

                            // Extract the difference in days, hours, minutes, and seconds
                            $days = $interval->format('%a');        // Total days
                            $hours = $interval->format('%h');       // Hours
                            $minutes = $interval->format('%i');     // Minutes
                            $seconds = $interval->format('%s');     // Seconds
                            }
                            // Display the results
                          // echo "Difference: $days days, $hours hours, $minutes minutes, $seconds seconds";
                            ?>

                            <?php

                                    if($invoice->progress  == 3){

                                       //have
                                       $date1  = $invoice->resume_date;
                                       $date2  = date('Y-m-d H:i:s')  ;
                                       $dateTime1 = new DateTime($date1);
                                        $dateTime2 = new DateTime($date2);


                                        $interval = $dateTime1->diff($dateTime2);

                                        $days1 = $interval->format('%a');        // Total days
                                        $hours1 = $interval->format('%h');       // Hours
                                        $minutes1 = $interval->format('%i');     // Minutes
                                        $seconds1 = $interval->format('%s');

                                        // Seconds
                                        $second  =  $seconds  +  $seconds1   ;
                                        $minute = $minutes  + $minutes1  ;
                                        $hour  =  $hours + $hours1;
                                        $day = $days + $days1 ;

                                        if($second  < 60 ){
                                            $seconds  =  $second;

                                        }else{
                                            $minute   = floor(  ($second/60)   +  $minute  );

                                            $seconds  =   $second % 60;


                                        }


                                        if($minute  < 60 ){
                                            $minutes  =  $minute  ;

                                        }else{
                                            $hour   = floor( ($minute/60)   +  $hour   );
                                            $minutes  =  $minute%60;

                                        }


                                        if($hour  < 24 ){
                                            $hours  =  $hour   ;

                                        }else{
                                            $day   = floor( ($hour/24)   +  $day  ) ;
                                            $hours  =  $hour%24;

                                        }





                                    }



                            ?>




                            <div  class="col-sm-4">
                                <label> Time Taken </label>
                                <h2 id="counter">{{ $days }} days {{ $hours }}:{{ $minutes}}:{{ $seconds }}</h2>



                            </div>




                        </div>




                    </div>


                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="col-sm-12 col-form-label">
                                <strong class="field-title">Location</strong>
                            </div>

                            <div class="col-sm-12 col-content" style="width:100%">

                                <input required readonly id="address" class="form-control" type=""  value="{{ $invoice->address}}" name="address" />
                                <div id="in_map"> </div>

                                <div style="display: none">
                                    <input id="user_lat_in" class="form-control" type="" value="{{ $invoice->map}}" name="lat" />
                                    <input id="user_log_in" class="form-control" type="" value="0" name="long" />
                                </div>
                                <small class="form-text text-muted">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>In Location
                                </small>
                            </div>
                        </div>




                    </div>
                        {{--
                                            <div  class="row">

                                                <div class="col-sm-12 col-content" style="width:100%">
                                                    <div class="col-sm-12 col-form-label">
                                                        <strong class="field-title">Customer Message</strong>
                                                    </div>

                                                    <div class="col-sm-12 col-content" style="width:100%">
                                                            <textarea  class="form-control"  name="message"></textarea>
                                                    </div>



                                                </div>


                                            </div>
                        --}}



                    <div  class=""  style="margin-top: 30px">
                    </div>





                </div>





                {{ Form::close() }}
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
    // Variables to track the timer and interval
    let intervalId;
    let days = {{  $days}};
    let hours = {{ $hours }};
    let minutes = {{ $minutes }};
    let seconds =  {{  $seconds }};
    let isPaused = false;
  counterElement = document.getElementById('counter');

 formattedTime = `${days} days ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                counterElement.innerText = formattedTime;

    // Function to update the time counter
    function updateTimeCounter() {
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

                const formattedTime = `${days} days ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                counterElement.innerText = formattedTime;
            }
        }, 1000); // 1000 milliseconds = 1 second
    }

    // Function to start the timer
    function resumeTimer() {



        //document.getElementById('stopButton').disabled = false;

        isPaused = false;

        //send an ajax here  okay!!

        updateTimeCounter();
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

        updateTimeCounter();
    }






    function startTimer() {
         document.getElementById('startButton').style.display = "none";
         document.getElementById('pauseButton').style.display = "inline-block";
         document.getElementById('endButton').style.display = "inline-block";
         document.getElementById('cancelButton').style.display = "inline-block";


        //document.getElementById('stopButton').disabled = false;



        //send an ajax here  okay!!

        $.ajax({
           url: '/admin/progress/{{ $invoice->id }}/1',
                        type: 'GET',

                        success: function(data) {
                            // Handle the successful response here
                            console.log(data);
                            isPaused = false;

                            updateTimeCounter();
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error(xhr.responseText);
                        }
                    });




    }

    // Function to pause the timer
    function pauseTimer() {
        document.getElementById('pauseButton').style.display = "none";
        document.getElementById('resumeButton').style.display = "inline-block";


        $.ajax({
           url: '/admin/progress/{{ $invoice->id }}/2',
                        type: 'GET',

                        success: function(data) {
                            // Handle the successful response here
                            console.log(data);
                            isPaused = true;

                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error(xhr.responseText);
                        }
                    });

    }



    function  endTimer(){

        document.getElementById('endButton').style.display = "none";
        document.getElementById('resumeButton').style.display = "none";
        document.getElementById('warrantyButton').style.display = "inline-block";

        //alert("thanks");
   check  = confirm("Are You Sure");

   if(check  ==  true) {


        $.ajax({
           url: '/admin/progress/{{ $invoice->id }}/4',
                        type: 'GET',

                        success: function(data) {
                            // Handle the successful response here
                            console.log(data);
                            isPaused = true;
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error(xhr.responseText);
                        }
                    });


                }
    }



    // Function to stop the timer
    function stopTimer() {


var check  = confirm("Are You Sure");

if(check  ==  true){

    document.getElementById('pauseButton').style.display = "none";
    document.getElementById('warrantyButton').style.display = "none";
    document.getElementById('endButton').style.display = "none";
    document.getElementById('startButton').style.display = "inline-block";

      /*   document.getElementById('startButton').disabled = false;
        document.getElementById('pauseButton').disabled = true;
        document.getElementById('stopButton').disabled = true;
        clearInterval(intervalId); */


        isPaused = false;
        // Reset the timer
        days = 0;
        hours = 0;
        minutes = 0;
        seconds = 0;
        document.getElementById('counter').innerText = '0 days 00:00:00';

        $.ajax({
           url: '/admin/progress/{{ $invoice->id }}/0',
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
$lat_in =  $invoice->lat ;
$long_in =  $invoice->longitude  ;

/*
if($data->user_lat_in != ""){
   $lat_in = $data->user_lat_in ;
$long_in = $data->user_log_in ;


}
*/

//$google_key   =  App\Models\Setting::first();
?>
<script>
   // Initialize the map
       const apiKey = "AAPK9c8be54fb23c4afa9dfdbedca8408781cJdyM_NqIK7SUniTe7bkkIscLlatFcfSfpfSovieUfPj8_83oblovHrfM73E9J4e";
    var map = L.map('in_map').setView([ {{$lat_in}}  , {{$long_in}} ], 13);
 /*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
   // Add the OpenStreetMap tiles
     L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
      attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
        maxZoom: 20,
        minZoom :5,
       subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
     }).addTo(map);

L.marker([{{$lat_in}}, {{$long_in}}]  ,{ title:"hello"} ).addTo(map).openPopup();
   // leaflet draw
//search options


 const searchControl = L.esri.Geocoding.geosearch({
       position: "topright",
       placeholder: "Enter Location Address",
       useMapBounds: false,
       expanded : true  ,
       providers: [
         L.esri.Geocoding.arcgisOnlineProvider({
           apikey: apiKey,
           nearby: {
             lat: {{$lat_in}},
             lng: {{$long_in}}
           }
         })
       ]
     }).addTo(map);

    const results = L.layerGroup().addTo(map);

     searchControl.on("results", function (data) {
   // $('#pac-input').val($(".geocoder-control-input").val());
      results.clearLayers();
       for (let i = data.results.length - 1; i >= 0; i--) {
           //$('#pac-input').val(data.results[i].text);
           $('#address').val(data.results[i].text);
           $('#user_lat_in').val(data.results[i].latlng);
           //alert(data.results[i].text);
         results.addLayer(L.marker(data.results[i].latlng));
       }
     });

</script>
@endsection
