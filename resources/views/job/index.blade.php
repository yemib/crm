@extends('layouts.app')
@section('title')
   Jobs
@endsection
@section('page_css')
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bs4-summernote/summernote-bs4.css') }}">

    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ mix('assets/css/services/services.css') }}">

@endsection


@section('css')

@endsection
@section('content')

<style>
    #out_map  ,  #in_map{
    height: 200px;
    width: 100%  ;
    }
    </style>
    <section class="section">
        <div class="section-header">
            <h1  style="text-transform: capitalize">Jobs</h1>
            <div class="section-header-breadcrumb">

                <a   href="#" class="btn btn-primary form-btn addServiceModal float-right-mobile" data-toggle="modal"
                   data-target="#addModal">{{ __('messages.service.add') }} <i class="fas fa-plus"></i></a>


            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('job.table')
                </div>
            </div>
        </div>
        @include('job.add_modal')
       @include('job.reminder_modal')
        @include('job.templates.templates')
    </section>
@endsection
@section('page_scripts')
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ mix('assets/js/bs4-summernote/summernote-bs4.js') }}"></script>
@endsection

@section('scripts')
<script>
    var type = 9;
</script>
    <script src="/assets/js/job/job.js"></script>

    <script>
        $(document).ready(function() {

          // AJAX request to fetch localities based on the selected country
          $('#add_fieldcontainer #billingCountryId').change(function() {

            //var country = $(this).val();
            var country = $(this).find('option:selected').text();
            //alert(country);

            $.ajax({
              url: '/get_localities',
              type: 'GET',
              data: { country: country },
              dataType: 'json',
              success: function(response) {
                // Clear the locality dropdown
                $('#add_fieldcontainer #locality').empty();

                // Populate the locality dropdown with options

                $.each(response, function(index, locality) {
                  $('#add_fieldcontainer #locality').append('<option value="' + locality + '">' + locality + '</option>');
                });


              }
            });
          });
        $('#editcontainer #billingCountryId').change(function() {

            //var country = $(this).val();
            var country = $(this).find('option:selected').text();
            //alert(country);

            $.ajax({
              url: '/get_localities',
              type: 'GET',
              data: { country: country },
              dataType: 'json',
              success: function(response) {
                // Clear the locality dropdown
                $('#editcontainer #locality').empty();

                // Populate the locality dropdown with options
                $('#editcontainer #locality').append('<option id="editlocality"></option>');
                $.each(response, function(index, locality) {
                  $('#editcontainer #locality').append('<option value="' + locality + '">' + locality + '</option>');
                });

              }
            });
          });




        });
      </script>




    <?php
     $lat_in = 35.892423 ;
    $long_in =  14.440963 ;

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
