@extends('layouts.app')
@section('title')
    {{ __('messages.customer.new_customer') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.customer.new_customer') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('customers.index') }}"
                   class="btn btn-primary form-btn float-right-mobile">{{ __('messages.common.back') }}</a>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.errors')
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' => 'customers.store','id'=>'createCustomer','novalidate']) }}
                    <div class="tab-pane fade show active" id="cForm" role="tabpanel" aria-labelledby="customerForm">


                        <div class="row">


                            <div class="form-group col-md-6 col-sm-12">
                                        <label>Client Name</label><span
                                        class="required">*</span>

                                        <input   id="client_name" name="client_name"  class="form-control"
                                         required placeholder="Client Name" autofocus = "true" autocomplete="off"  />

                            </div>

                            <div class="form-group col-md-6 col-sm-12">

                                <br/>
                            </div>



                            <div class="form-group col-md-6 col-sm-12">
                                {{ Form::label('company_name', __('messages.customer.company_name').':') }}
                                {{ Form::text('company_name', null, ['class' => 'form-control','autocomplete' => 'off','autofocus' => true,'placeholder'=>__('messages.customer.company_name')]) }}
                            </div>


                            <div class="form-group col-md-6 col-sm-12">
                                {{ Form::label('vat_number', __('messages.customer.vat_number').':') }}
                                {{ Form::text('vat_number', null, ['class' => 'form-control' ,'minLength' => '4','maxLength' => '15', 'autocomplete' => 'off','placeholder'=>__('messages.customer.vat_number')]) }}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {{ Form::label('website', __('messages.customer.website').':') }}
                                {{ Form::url('website', null, ['class' => 'form-control', 'id' => 'website', 'autocomplete' => 'off','placeholder'=>__('messages.customer.website')]) }}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {{ Form::label('phone', __('messages.customer.phone').(':')) }}<br>
                                {{ Form::tel('phone', null, ['class' => 'form-control','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'placeholder'=>__('messages.customer.phone')]) }}
                                {{ Form::hidden('prefix_code',old('prefix_code'),['id'=>'prefix_code']) }}
                                <span id="valid-msg" class="hide">{{ __('messages.placeholder.valid_number') }}</span>
                                <span id="error-msg" class="hide"></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {{ Form::label('currency', __('messages.customer.currency').':') }}
                                <select id="currencyId" data-show-content="true" class="form-control" name="currency">
                                    <option value="0"
                                            disabled="true" {{ isset($customer->currency) ? '' : 'selected' }}>{{ __('messages.placeholder.select_currency') }}
                                    </option>
                                    @foreach($data['currencies'] as $key => $currency)
                                        <option value="{{$key}}"   selected>
                                            &#{{getCurrencyIcon($key)}}&nbsp;&nbsp;&nbsp; {{$currency}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {{ Form::label('country', __('messages.customer.country').':') }}
                                {{ Form::select('country[0]', $data['countries'],(isset($customer) && $customer->country!=null)?$customer->country:null, ['id'=>'countryId','class' => 'form-control','placeholder' => __('messages.placeholder.select_country')]) }}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {{ Form::label('default_language', __('messages.customer.default_language').':') }}
                                {{ Form::select('default_language', $data['languages'],null, ['id'=>'languageId','class' => 'form-control','placeholder' => __('messages.placeholder.select_language')]) }}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {{ Form::label('groups', __('messages.customer.groups').':') }}
                                <div class="input-group">
                                    {{ Form::select('groups[]', $data['customerGroups'],isset($customer->customerGroups)?$customer->customerGroups:null, ['id'=>'groupId','class' => 'form-control', 'multiple' => 'multiple']) }}
                                    <div class="input-group-append">
                                        <div class="input-group-text plus-icon-height">
                                            <a href="#" data-toggle="modal" data-target="#customerGroupModal"><i
                                                        class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="form-group col-sm-12">
                            {{-- __('messages.common.save') --}}
                            {{ Form::button('Next', ['type'=>'submit','class' => 'btn btn-primary',
                            'id' => 'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                            <a href="{{ route('customers.index') }}"
                               class="btn btn-secondary text-dark">{{ __('messages.common.cancel') }}</a>
                        </div>
                    </div>

                    </div>

                    {{ Form::close() }}
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
        let isEdit = false
        let localizeMessage = "{{ __('messages.placeholder.select_groups') }}"
    </script>
    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>
    <script src="{{mix('assets/js/customers/create-edit.js')}}"></script>
@endsection
