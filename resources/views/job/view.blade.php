@extends('layouts.app')
@section('title')
  Job Installation For  {{ $job->customer_name}}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ mix('assets/css/services/services.css') }}">
@endsection
@section('css')
@endsection
@section('content')


<style>
    #map {
height: 400px;
/* The height is 400 pixels */
width: 100%;
/* The width is the width of the web page */
}
    </style>


    <section class="section">
        <div class="section-header">
            <h1  style="text-transform: capitalize">Job Details</h1>
            <div class="section-header-breadcrumb">



            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                <!---  place calendar here  .--->
                    <div  id="">
                        <?php
                        $installationDateObj = new DateTime($job->installation_date);
// Now, $installationDateObj holds a DateTime object representing the installation date

// Option 2: Format the date
$formattedInstallationDate = date('d/M/Y', strtotime($job->installation_date));
// Now, $formattedInstallationDate holds a formatted date string



                            ?>
                            <div align="right"> <a    href="{{route('job.index') }}" class="btn btn-primary"> Jobs </a>    {{-- <a  href="{{route('job.edit' , $job->id ) }}" class="btn btn-primary"> Add Invoice </a>  --}} </div>

                                @if(session('success'))
                                <h6   class="alert-success" align="right">

                                {{   session('success')}}
                                </h6>

                                @endif

                    <h6>  Date Of Installation :  {{  $formattedInstallationDate  }}</h6>
                    <h6>  Customer :  {{ $job->customer_name}}</h6>
                    <h6>  Product :   {{ $job->product_name}}</h6>
                    <h6>   Address:   &nbsp;&nbsp;   {{  $job->address }}  </h6>




                        <div>


                            <div  style="height: 500px" id="map"></div>

                        </div>

                        <div>
                <h3> Invoices </h3>
                      <?php
                       if($job->invoice_id  !=  null){
                                $arrays  =  json_decode($job->invoice_id ,  true);


                       }else{
                        $arrays=[];
                       }

                      ?>

                        <table  class="table table-bordered">
                            <tr>
                                <th style="text-transform: uppercase">title</th>
                                <th></th>
                            </tr>
                            @foreach ( $arrays as $value)

                                <?php
                                $invoice  =  \App\Models\Invoice::find($value[0]);
                                ?>
                                @isset($invoice->id)



                                <tr>
                                    <td>{{ $invoice->title  }}</td>
                                    <td><a  target="_blank" class="btn btn-info" href="{{ route('invoices.show'  ,  $invoice->id )}}"> view </a>


                                        <a  target="_blank" class="btn btn-info"  href="/admin/job_invoices/{{$job->id}}"> Edit</a>

                                       {{--

                                        <a onclick="return confirm('Are you sure?')"  target="_blank" class="btn btn-danger"
                                         href="{{ route('invoices.job.destroy'  ,  $invoice->id )}}"> Delete </a>  --}}



                                        </td>
                                </tr>

                                @endisset
                            @endforeach

                        </table>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    </section>

<?php
$lat  =   $job->lat ;
$log  =   $job->long;
$address =  $job->address;

?>

    <script>



var map = L.map('map').setView([{{$lat}}, {{$log}}], 13);

  L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
     attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
       maxZoom: 20,
       minZoom :18,
      subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

/* L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map); */

var greenIcon = new L.Icon({

iconSize: [50, 60],

});

//L.marker([51.5, -0.09], {icon: greenIcon}).addTo(map);


L.marker([{{$lat}}, {{$log}}]  ,{Icon:greenIcon  , title:"{{ $address }}"} ).addTo(map).openPopup();

var circle = L.circle([{{$lat}}, {{$log}}], {
  color: 'green',
  /* fillColor: '#f03', */
  fillOpacity: 0,
  radius: 30
}).addTo(map);

        </script>




@endsection


@section('top_script')

<script src="/fullcalendar/dist/index.global.js"></script>

@endsection
