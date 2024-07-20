@extends('layouts.app')
@section('title')
    {{ __('messages.invoice.invoice') }}
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
        #in_map {
            height: 200px;
            width: 100%;


        }
    </style>

    <section class="section">
        <div class="section-header">
            <h1>Bill Details</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ url()->previous() }}" class="btn btn-primary form-btn float-right-mobile">
                    {{ __('messages.common.back') }}
                </a>
            </div>
        </div>


        <div class="section-body">


            <div class="card">





            </div>





            <!----ends here --->
            @include('layouts.errors')
            <div class="card">


                <div class="row"  style="padding: 30px">

                    <div class="form-group col-md-4 col-12">
                        {{ Form::label('title', 'Invoice  :') }}
                        <p>{{ html_entity_decode($invoice->title) }}</p>
                    </div>


                    <div class="form-group col-md-4 col-12">
                        {{ Form::label('title', ' Customer :') }}
                        <p>{{ html_entity_decode( $invoice->customer->company_name ) }}</p>
                    </div>


                </div>


                {{ Form::open(['route' => 'installation.store', 'validated' => false, 'id' => 'invoiceForm']) }}
                <input type="hidden" name="invoice_id" value="{{ $invoice->id }}" />
                <div class="">
                    <div>
                        <div class="alert alert-danger d-none" id="validationErrorsBox"></div>


                        <div class="row">
                            <div class="form-group col-sm-6 " style="margin-left: 20px">

                                {{ Form::label('installation_date', 'Date Of Installation') }}


                                <input value="{{ $invoice->installation_date }}" required id="date_of_installation"
                                    class="form-control" name="installation_date" placeholder="Date Of Installation"
                                    type="date" />

                            </div>




                        </div>




                    </div>




                    <!----list of  products  ----->

                            <div style="padding: 20px">

                    <h6> Products
                    </h6>
                    <br />

                    <table
                        class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-bordered"
                        style="">
                        <thead>
                            <tr>
                                <th>Product Code  :</th>
                                {{-- <th>Product Title :</th> --}}
                                <th> Quantity : </th>

                            </tr>

                        </thead>
                        <tbody>

                            <?php foreach ($invoice->salesItems as $sales) {
                        # code...
                        ?>



                            <tr>
                                <td>
                                    {{ $sales->item }}

                                </td>
                              {{--   <td> {{ $sales->description }}</td> --}}

                                <td> {{  $sales->quantity }} </td>




                            </tr>

                            <?php  } ?>
                        </tbody>

                    </table>

                    </div>





                    <div class="row">
                        <div   style="display: none" class="form-group col-sm-12">
                            <div class="col-sm-12 col-form-label">
                                <strong class="field-title">Location</strong>
                            </div>

                            <div  style="display: none" class="col-sm-12 col-content" style="width:100%">

                                <input  readonly id="address" class="form-control" type=""
                                    value="{{ $invoice->address }}" name="address" />
                             {{--    <div id="in_map"> </div> --}}

                                <div style="display: none">
                                    <input id="user_lat_in" class="form-control" type="" value="{{ $invoice->map }}"
                                        name="lat" />
                                    <input id="user_log_in" class="form-control" type="" value="0"
                                        name="long" />
                                </div>
                               {{--  <small class="form-text text-muted">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>In Location
                                </small> --}}
                            </div>
                        </div>




                    </div>

                    <div class="col-sm-12 col-form-label">
                        <strong class="field-title">  @if(count($invoice->customer->installationaddresses) > 1) Locations   @else  Location @endif </strong>
                    </div>

                    <div class="col-sm-12 col-content" style="width:100%">

                        @foreach($invoice->customer->installationaddresses as $address)

                        @if($address->latlog !=  NULL)
                        <h6> Address : {{ $address->mapaddress   }}

                            <br/>
                         House No :    {{ $address->street  }}
                        <br/>

                        Postcode :  {{  $address->zip }}

                      <br/>

                      Locality : {{  $address->locality }}

                      <br/>
                      Region :   {{   $address->country   == 2 ?  "Gozo" :   "Malta"  }}


                        </h6>
                        <div  style=" height: 300px;width: 100%;" id="in_map{{ $address->id   }}"> </div>
                        @endif

                        @endforeach





                        <br />





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
                    <div class="row">
                        <div class="form-group col-sm-6 " style="margin-left: 20px">
                            <label> Assign Employee </label>

                            <select required name="worker" class="form-control">
                                <option>Select</option>

                                <?php
        $members  =  App\Models\User::get();

     foreach (  $members as  $member) {

        $memberPermissions = $member->permissions()->pluck('id')->toArray();

       // $permission  = App\Models\permission::where('model_id'   ,  $member->id)->first();
        if(  in_array( 41 ,  $memberPermissions)){  ?>
                                <option @if ($member->id == $invoice->employees) selected @endif value="{{ $member->id }}">
                                    {{ $member->first_name }}
                                    {{ $member->last_name }} ( {{ $member->email }})</option>



                                <?php  }



     }


                        ?>

                            </select>

                            <br />
                            <input type="submit" value="Save" class="btn btn-success" />

                        </div>
                    </div>


                    <div class="" style="margin-top: 30px">
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
    <?php
    $lat_in = 35.892423;
    $long_in = 14.440963;

    /*
if($data->user_lat_in != ""){
   $lat_in = $data->user_lat_in ;
$long_in = $data->user_log_in ;


}
*/

    //$google_key   =  App\Models\Setting::first();

    ?>



<script>

    @foreach($invoice->customer->installationaddresses as $address)
    @if($address->latlog   !=  NULL)
 <?php

    //split the address
            $output = str_replace("(", "", $address->latlog);
            $output = str_replace(")", "",  $output);
            $output = str_replace("LatLng", "",  $output);
            //now explode
            $output =    explode(",", $output);
            $lat_in = $output[0];
            $long_in = $output[1];


?>

     apiKey =
        "AAPK9c8be54fb23c4afa9dfdbedca8408781cJdyM_NqIK7SUniTe7bkkIscLlatFcfSfpfSovieUfPj8_83oblovHrfM73E9J4e";
    var map{{ $address->id }} = L.map('in_map{{ $address->id }}').setView([{{ $lat_in }}, {{ $long_in }}], 13);
    /*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
    // Add the OpenStreetMap tiles
    L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
        attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
        maxZoom: 20,
        minZoom: 5,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map{{ $address->id }});

    L.marker([{{ $lat_in }}, {{ $long_in }}], {
        title: "{{  $address->mapaddress }}"
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

@endsection
