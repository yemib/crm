@extends('layouts.app')
@section('title')

@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bs4-summernote/summernote-bs4.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.expense_categories') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn addExpenseCategoryModal float-right-mobile"
                   data-toggle="modal"
                   data-target="#addModal">{{ __('messages.common.add') }}
                    <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('expense_categories.table')
                </div>
            </div>
        </div>
        @include('expense_categories.templates.templates')
        @include('expense_categories.add_modal')
        @include('expense_categories.edit_modal')
    </section>
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/bs4-summernote/summernote-bs4.js') }}"></script>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/expense-categories/expense-categories.js') }}"></script>

    <script>

        $(document).ready(function() {

            $('.predefine_fieldst').select2({
            placeholder: "Select Predefined Fields"

            });
            });
    </script>
@endsection


