@extends('layouts.app')

<style>

    td:has(input[name="description[]"]){
           /*  display: none; */
        }

    </style>
@section('title')
    {{ __('messages.invoice.invoice') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bs4-summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ mix('assets/css/invoices/invoices.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>   @if(!isset($who))   @if(isset($_POST['aftersale']))  After-Sale  Repair Invoice  @else  {{ __('messages.invoice.edit_invoice') }}     @endif  @else Product Warranty  @endif</h1>
            <div class="section-header-breadcrumb">
                @if(isset($who))
                @if( $invoice->warranty  ==  1)
                <a href="{{  route('employee.active.warranties')}}" class="btn btn-primary form-btn float-right-mobile">
                    Active Warranties
                </a>


                @endif


                @if( $invoice->warranty  ==  -1)
                <a href="{{  route('employee.void.warranties')}}" class="btn btn-primary form-btn float-right-mobile">
                    Void Warranties
                </a>


                @endif


                @if( $invoice->warranty  ==  -2)
                <a href="{{  route('employee.expired.warranties')}}" class="btn btn-primary form-btn float-right-mobile">
                    Expired Warranties
                </a>


                @endif


                @else
                <a href="{{  route('invoices.index')}}" class="btn btn-primary form-btn float-right-mobile">
                    Invoices
                </a>


                @endif
            </div>
        </div>
        <div class="section-body">
            @include('layouts.errors')
            <div class="card">
                @if(!isset($who))

                @if(isset($_POST['aftersale']))
                {{ Form::open(['route' => ['invoices.store'], 'validated' => false,
                'method' => 'POST', 'id' => 'editInvoiceForm']) }}

                @else
                {{ Form::open(['route' => ['invoices.update', $invoice->id], 'validated' => false, 'method' => 'POST', 'id' => 'editInvoiceForm']) }}
                  @endif


                  @if(isset($_POST['aftersale']))

                  <input    name="aftersale"   value="{{  $invoice->id }}"  type="hidden"/>

                  @endif

                @endif
                @include('invoices.address_modal')
                @include('invoices.edit_fields')
                @if(!isset($who))
                {{ Form::close() }}
                @endif
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
        let editData = true;
        let invoiceEdit = true;
        let taxData = JSON.parse('@json($data['taxes'])');

         @if(isset($_POST['aftersale']))
         let  invoicestore  =  "{{ route('invoices.store') }}"  ;

         let invoiceEditURL =  "{{  route('invoices.index')  }}"

         @else
        let invoiceEditURL = "{{ route('invoices.index') }}";

        @endif


        let editInvoiceAddress = true;
        let customerURL = "{{ route('get.customer.address') }}";
    </script>
      @include('sales.sales')
    <script src="{{ mix('assets/js/custom/input-price-format.js') }}"></script>



    @include('invoices.editscript')


    <script>

function sendFormData(id   ,  url) {
    // Get a reference to the form element
    var form = document.getElementById("warranty"+id);
    var button = document.getElementById("button"+id);
    button.innerHTML  =  "Loading";
    button.disabled   =  true  ;



    // Create a new FormData object to collect form data
    var formData = new FormData(form);

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the URL and method for the request
    var url = url;
    var method = 'POST';

    // Set up the request
    xhr.open(method, url, true);

    // Define a callback function to handle the response
    xhr.onload = function () {
        if (xhr.status === 200) {
            button.disabled   =  false  ;

            button.innerHTML  =  "Apply";
            alert("successful");
            // Request was successful, handle the response here
            //var response = JSON.parse(xhr.responseText);
            //console.log(response);
        } else {
            button.disabled   =  false  ;

            button.innerHTML  =  "Apply";
            alert("failed");
            // Request failed, handle the error here
           // console.error('Request failed with status:', xhr.status);
        }
    };

    // Send the form data as the request body
    xhr.send(formData);
}




@if(isset($who))     @if( $invoice->warranty  !=  NULL)

 // Make Select2 readonly by disabling it
 $('#salesAgentId').prop('disabled', true);

@endif  @endif
    </script>
@endsection
