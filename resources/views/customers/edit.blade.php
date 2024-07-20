@extends('layouts.app')
@section('title')
    {{ __('messages.customer.edit_customer') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.customer.edit_customer') }}</h1>
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

                    @include('customers.fields')


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
@endsection
