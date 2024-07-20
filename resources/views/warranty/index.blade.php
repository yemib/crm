@extends('layouts.app')
@section('title')
   Warranties
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
            <h1  style="text-transform: capitalize">{{ $_GET['type'] }}  Warranties</h1>
            <div class="section-header-breadcrumb">
                @if($_GET['type'] == "open")
                <a href="#" class="btn btn-primary form-btn addServiceModal float-right-mobile" data-toggle="modal"
                   data-target="#addModal">{{ __('messages.service.add') }} <i class="fas fa-plus"></i></a>

                   @endif
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('warranty.table')
                </div>
            </div>
        </div>
        @include('warranty.add_modal')
        @include('warranty.edit_modal')
        @include('warranty.templates.templates')
    </section>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
@endsection
@section('scripts')
<script>
    var type = "{{$_GET['type']}}";
</script>
    <script src="/assets/js/warranty/warranty.js"></script>

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
        $('#country').change(function() {

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
                $('#editlocal').empty();

                // Populate the locality dropdown with options
                $('#editlocal').append('<option id="editlocality"></option>');
                $.each(response, function(index, locality) {
                  $('#editlocal').append('<option value="' + locality + '">' + locality + '</option>');
                });

              }
            });
          });




        });
      </script>

@endsection
