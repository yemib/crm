@extends('layouts.app')
@section('title')
    {{ __('messages.activity_log.activity_logs') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/activity_logs/activity_log.css') }}">
@endsection
@section('content')
    <section class="section">
        @include('flash::message')
        <div class="section-header">
            <h1 class="page__heading">{{ __('messages.activity_log.activity_logs') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="mr-2 align-items-center mt-3 mt-lg-0">
                    <div id="time_range" class="time_range date_range_for_created_at_date">
                        <i class="far fa-calendar-alt"
                           aria-hidden="true"></i>&nbsp;&nbsp;<span></span> <b
                                class="caret"></b>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body activity-logs-data">
                            @include('activity_logs.activity_log_lists')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('activity_logs.templates.templates')
    </section>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/activity-logs/activity-log.js') }}"></script>
@endsection
