@extends('layouts.app')
@section('title')
  Product Warranty
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ mix('assets/css/services/services.css') }}">
@endsection
@section('css')

@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h5>Serial No : {{  $warrant_detail->serial_no }}  <br/>
                Customer: {{  $warrant_detail->customer }}    <br/>
                Installation Date : {{  $warrant_detail->installation_date}} <br/>
                Location : {{  $warrant_detail->country }} , {{  $warrant_detail->locality }}

            </h5>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn addServiceModal float-right-mobile" data-toggle="modal"
                   data-target="#addModal">{{ __('messages.service.add') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('productwarranty.table')
                </div>
            </div>
        </div>
        @include('productwarranty.add_modal')
        @include('productwarranty.edit_modal')
        @include('productwarranty.templates.templates')
    </section>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
   <script>
   var warranty_id = {{ $_GET['id']}}
    </script>
    <script src="/assets/js/productwarranty/productwarranty.js"></script>


@endsection
