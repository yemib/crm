@extends('layouts.app')
@section('title')
   Edit Estimate Address
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1> Edit  {{  $estimate_d->estimate_number }}   Invoice ({{ $estimate_d->customer->client_name }} )Address</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ url()->previous() }}"
                   class="btn btn-primary form-btn float-right-mobile">{{ __('messages.common.back') }}</a>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.errors')
            <div class="card">
                <div class="card-body">

                       <!--  place  the list of addresses  here fast kay  -->

                       <div >

                        <?php
                            //get the address

                                $address_upadte  =  route('invoice.update.address' , [ $estimate_d->id ,$data['billingAddress']['id'] ] ) ;


                            ?>

                        <form  method="POST"  action="{{  $address_upadte   }}"  >
                            @csrf

                        <div class="row">
                            <div class="col-md-6 col-sm-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-black-50 font-weight-bold">{{__('messages.customer.billing_address')}}</h4>
                                    </div>
                                </div>
                        {{--
                           <div class="row">
                                    <div class="form-group col-sm-12">
                                        {{ Form::label('street', 'House no/name') }}
                                        {{ Form::text('street[1]', (isset($data['billingAddress']) &&
                                        $data['billingAddress']['street']!=null)?$data['billingAddress']['street']:null,
                                        ['class' => 'form-control', 'id' => 'billingStreet', 'autocomplete' => 'off',
                                        'placeholder'=>__('messages.customer.street')]) }}
                                    </div>
                                </div> --}}
                                            {{--           <div class="row">

                                                            <div class="form-group col-sm-12">
                                                                {{ Form::label('city', 'Locality') }}
                                                                {{ Form::text('locality[1]',
                                                                (isset($data['billingAddress'])
                                                                && $data['billingAddress']['locality']!=null)?
                                                                $data['billingAddress']['locality']:null,
                                                                ['class' => 'form-control',
                                                                'id' => 'billingCity',
                                                                'autocomplete' => 'off',
                                                                'placeholder'=>'Locality']) }}
                                                            </div>


                                                        </div> --}}
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        {{ Form::label('zip_code', 'Postal Code'.':') }}
                                        {{ Form::text('zip_code[1]',
                                        (isset($data['billingAddress']) &&
                                        $data['billingAddress']['zip_code']!=null)?
                                        $data['billingAddress']['zip_code']:null,
                                        ['class' => 'form-control',
                                        'id' => 'billingZip',

                                         'autocomplete' => 'off',
                                         'placeholder'=>'Postal Code']) }}
                                    </div>
                                </div>
                                     {{--          <div class="row">
                                    <div class="form-group col-sm-12">
                                        {{ Form::label('state', __('messages.customer.state').':') }}
                                        {{ Form::text('state[1]', (isset($data['billingAddress'])
                                        &&
                                        $data['billingAddress']['state']!=null)?$data['billingAddress']['state']:null,
                                         ['class' => 'form-control', 'id' => 'billingState', 'autocomplete' => 'off',
                                         'placeholder'=>__('messages.customer.state')]) }}
                                    </div>
                                </div> --}}


                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        {{ Form::label('country', 'Region'.':') }}
                                        {{ Form::select('country[1]', $data['countries'],(isset($data['billingAddress']) &&
                                        $data['billingAddress']['country']!=null)?( ($data['billingAddress']['country'] ==  "Gozo") ? 2  : 10  )   :null,
                                        ['id'=>'billingCountryId','class' => 'form-control','placeholder' => __('messages.placeholder.select_country')]) }}
                                    </div>
                                </div>





                                <div  class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="locality">Locality:</label>


                                    <select name="locality[1]"  id="locality" class="form-control">

                                        @if (isset($data['billingAddress']) &&
                                        $data['billingAddress']['locality']!=null)

                                            <option>{{ $data['billingAddress']['locality'] }}</option>
                                        @endif

                                        </select>


                                </div>
                                </div>


                                <div class="row">

                                    <div  class="form-group col-sm-12">
                                        <label for="street"> Street Name</label>
                                        <input  value="{{  $data['billingAddress']['mapaddress'] }}" readonly  name="mapaddress[1]"   id="billingaddress"  class="form-control" />
                                        <input  value="{{  $data['billingAddress']['latlog'] }}" name="latlog[1]" type="hidden" name=""  id="billing_lat_in"   class="form-control" />

                                        <div  id="in_map"  style="height: 150px  ; width:100%"></div>



                                    </div>


                                  </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header text-nowrap">
                                        <h4 class="text-black-50 font-weight-bold">

                                            <i class="fa fa-question-circle" data-toggle="tooltip"
                                               data-title="{{ __('messages.customer.do_not_fill_shipping_address_customer_invoices') }}"
                                               data-original-title="" title=""></i>
                                            {{__('messages.customer.shipping_address')}}</h4>

                                    </div>
                                </div>
                          {{--       <div class="row">
                                    <div class="form-group col-sm-12">
                                        {{ Form::label('street', 'House no/name'.':') }}
                                        {{ Form::text('street[2]', (isset($data['shippingAddress']) &&
                                        $data['shippingAddress']['street']!=null)?$data['shippingAddress']['street']:null,
                                        ['class' => 'form-control', 'id' => 'shippingStreet', 'autocomplete' => 'off',
                                        'placeholder'=>'House no/name']) }}
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        {{ Form::label('zip_code', 'Postal Code'.':') }}
                                        {{ Form::text('zip_code[2]', (isset($data['shippingAddress'])
                                        && $data['shippingAddress']['zip_code']!=null)?$data['shippingAddress']['zip_code']:null,
                                        ['class' => 'form-control', 'id' => 'shippingZip',

                                        'autocomplete' => 'off','placeholder'=> 'Postal Code']) }}
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        {{ Form::label('country', 'Region'.':') }}
                                        {{ Form::select('country[2]', $data['countries'],(isset($data['shippingAddress']) &&
                                        $data['shippingAddress']['country']!=null)?( ($data['shippingAddress']['country'] ==  "Gozo") ? 2  : 10  ) :null,
                                        ['id'=>'shippingCountryId','class' => 'form-control','placeholder' => __('messages.placeholder.select_country')]) }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        {{ Form::label('city', "Locality".':') }}

                                        {{-- <select  name="locality[2]" id="shippinglocality" name="shippinglocality"  class="form-control"> --}}
                                            <!-- Locality options will be populated dynamically -->


                                                <select name="locality[2]"  id="shippinglocality" class="form-control">

                                                @if (isset($data['shippingAddress']) &&
                                                $data['shippingAddress']['locality']!=null)

                                                    <option>{{ $data['shippingAddress']['locality'] }}</option>
                                                @endif

                                                </select>



                                         {{--  </select>
                                                    --}}

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label> Street Name </label>

                                       <input   value="{{  $data['shippingAddress']['mapaddress']  }}"  class="form-control"  readonly  name="mapaddress[2]"  id="shippingaddress"   />

                                       <input  value="{{ $data['shippingAddress']['latlog']}}" type="hidden"  id="shipping_lat_in"  name="latlog[2]"   class="form-control" />

                                        <div  id="in_map_shipping"  style="height: 150px  ; width:100%"></div>
                                    </div>
                                </div>

                                             {{--     <div class="row">
                                    <div class="form-group col-sm-12">
                                        {{ Form::label('state', __('messages.customer.state').':') }}
                                        {{ Form::text('state[2]', (isset($data['shippingAddress']) &&
                                        $data['shippingAddress']['state']!=null)?$data['shippingAddress']['state']:null,
                                         ['class' => 'form-control', 'id' => 'shippingState',
                                          'autocomplete' => 'off','placeholder'=>__('messages.customer.state')]) }}
                                    </div>
                                </div> --}}

                            </div>
                        </div>


                    <div class="row">
                        <div class="form-group col-sm-12">
                            <input   type="submit"  value="Submit"  class="btn btn-primary"/>

                        </div>
                    </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
    @include('customers.customer_group_modal')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}"
        let phoneNo = "{{ old('prefix_code').old('phone') }}"
        let isEdit = true
        let localizeMessage = "{{ __('messages.placeholder.select_groups') }}"
    </script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
    <script src="{{mix('assets/js/customers/create-edit.js')}}"></script>


<script>
    $(document).ready(function() {
      // AJAX request to fetch localities based on the selected country
      $('#billingCountryId').change(function() {
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
            $('#locality').empty();

            // Populate the locality dropdown with options
            $.each(response, function(index, locality) {
              $('#locality').append('<option value="' + locality + '">' + locality + '</option>');
            });
          }
        });
      });

      $('#shippingCountryId').change(function() {
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
            $('#shippinglocality').empty();

            // Populate the locality dropdown with options
            $.each(response, function(index, locality) {
              $('#shippinglocality').append('<option value="' + locality + '">' + locality + '</option>');
            });
          }
        });
      });



    });
  </script>

<?php
$lat_in = 35.892423;
$long_in = 14.440963;

$shippinglat = $lat_in;
    $shippinglong = $long_in ;

    $billinglat = $lat_in;
    $billinglong = $long_in ;


if ($data['shippingAddress']['latlog'] != NULL) {


    $output = str_replace("(", "",  $data['shippingAddress']['latlog']);
    $output = str_replace(")", "",  $output);
    $output = str_replace("LatLng", "",  $output);
    //now explode

    $output =    explode(",", $output);
    $shippinglat = $output[0];
    $shippinglong = $output[1];

}


if ($data['billingAddress']['latlog'] != NULL) {


    $output = str_replace("(", "",  $data['billingAddress']['latlog']);
    $output = str_replace(")", "",  $output);
    $output = str_replace("LatLng", "",  $output);
    //now explode

    $output =    explode(",", $output);
    $billinglat = $output[0];
    $billinglong = $output[1];

}

?>



<script>
    // Initialize the map
    const apiKey =
        "AAPK9c8be54fb23c4afa9dfdbedca8408781cJdyM_NqIK7SUniTe7bkkIscLlatFcfSfpfSovieUfPj8_83oblovHrfM73E9J4e";
    var map = L.map('in_map').setView([{{ $billinglat }}, {{ $billinglong }}], 13);
    /*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
    // Add the OpenStreetMap tiles
    L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
        attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
        maxZoom: 20,
        minZoom: 5,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    L.marker([{{ $billinglat }}, {{ $billinglong }}], {
        title: "{{ $data['billingAddress']['mapaddress']  }} "
    }).addTo(map).openPopup();
    // leaflet draw
    //search options


    const searchControl = L.esri.Geocoding.geosearch({
        position: "topright",
        placeholder: "Enter Street Name",
        useMapBounds: false,
        expanded: true,
        providers: [
            L.esri.Geocoding.arcgisOnlineProvider({
                apikey: apiKey,
                nearby: {
                    lat: {{ $billinglat}},
                    lng: {{ $billinglong }}
                }
            })
        ]
    }).addTo(map);

    const results = L.layerGroup().addTo(map);

    searchControl.on("results", function(data) {
        // $('#pac-input').val($(".geocoder-control-input").val());
        results.clearLayers();
        for (let i = data.results.length - 1; i >= 0; i--) {
            //$('#pac-input').val(data.results[i].text);
            $('#billingaddress').val(data.results[i].text);
            $('#billing_lat_in').val(data.results[i].latlng);
            //alert(data.results[i].text);
            results.addLayer(L.marker(data.results[i].latlng));
        }
    });
</script>

<script>
// Initialize the map

var map2 = L.map('in_map_shipping').setView([{{ $shippinglat }}, {{ $shippinglong}}], 13);
/*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
// Add the OpenStreetMap tiles
L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
    attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
    maxZoom: 20,
    minZoom: 5,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
}).addTo(map2);

L.marker([{{ $shippinglat }}, {{  $shippinglong }}], {
    title: "{{  $data['shippingAddress']['mapaddress']  }}"
}).addTo(map2).openPopup();
// leaflet draw
//search options


const searchControl2 = L.esri.Geocoding.geosearch({
    position: "topright",
    placeholder: "Enter Street Name",
    useMapBounds: false,
    expanded: true,
    providers: [
        L.esri.Geocoding.arcgisOnlineProvider({
            apikey: apiKey,
            nearby: {
                lat: {{ $shippinglat }},
                lng: {{  $shippinglong }}
            }
        })
    ]
}).addTo(map2);

const results2 = L.layerGroup().addTo(map2);

searchControl2.on("results", function(data) {
    // $('#pac-input').val($(".geocoder-control-input").val());
    results2.clearLayers();
    for (let i = data.results.length - 1; i >= 0; i--) {
        //$('#pac-input').val(data.results[i].text);
        $('#shippingaddress').val(data.results[i].text);
        $('#shipping_lat_in').val(data.results[i].latlng);
        //alert(data.results[i].text);
        results.addLayer(L.marker(data.results[i].latlng));
    }
});
</script>



@endsection
