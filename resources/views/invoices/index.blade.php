@extends('layouts.app')
@section('title')
    {{ __('messages.invoices') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ mix('assets/css/invoices/invoices.css') }}">
@endsection
@section('css')
    @livewireStyles
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.invoices') }}</h1>
            <div class="section-header-breadcrumb float-right">
                <div class="card-header-action mr-3 select2-mobile-margin">
                    {{ Form::select('payment_status',$paymentStatuses,null,['id' => 'paymentStatus','class' => 'form-control','placeholder' => __('messages.placeholder.select_status')]) }}
                </div>
            </div>
            <div class="float-right">
                <a href="{{ route('invoices.create') }}"
                   class="btn btn-primary form-btn">{{ __('messages.common.add') }}
                    <i class="fas fa-plus"></i></a>

            </div>
        </div>
        <div class="section-body">
            @include('flash::message')
            <div class="card">
                <div class="card-body">
                    @if(isset($job))

                    @livewire('invoices'  ,  ['job' => $job])
                        @else

                        @livewire('invoices' , ['job' => 0])

                    @endif
                </div>
            </div>
        </div>
    </section>
    @include('invoices.templates.templates')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
@endsection
@section('scripts')
    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>
    @include('livewire.livewire-turbo')
    <script>
        let invoiceUrl = "{{ route('invoices.index') }}";
        let customerId = null;
    </script>
    <script src="{{ mix('assets/js/invoices/invoices-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/status-counts/status-counts.js')}}"></script>
@endsection

