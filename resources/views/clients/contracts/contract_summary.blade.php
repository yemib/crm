@extends('clients.layouts.app')
@section('title')
    {{ __('messages.contract.contract_summary') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.contract.contract_summary') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="card-header-action mr-3">
                    <a href="{{ route('clients.contracts.index') }}"
                       class="btn btn-primary form-btn float-right-mobile">{{ __('messages.contract.contract_list') }}</a>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 class="contract-summary-heading">{{ __('messages.contract.contracts_by_type') }}</h6>
                            <canvas id="clientContractChartId" width="400" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page_scripts')
    <script>
        let contractTypesData = JSON.parse('@json($contractTypes)');
    </script>
    <script src="{{ mix('assets/js/chart/Chart.min.js') }}"></script>
    <script src="{{ mix('assets/js/clients/contracts/contract-summary.js') }}"></script>
@endsection
