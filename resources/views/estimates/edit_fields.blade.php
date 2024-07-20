<input type="hidden" id="estimateId" value="{{ $estimate->id }}">
<div class="card-body">
    <div class="alert alert-danger d-none" id="validationErrorsBox"></div>

    <div class="row">
        <div align="right" class="col-sm-12">

            @if ($estimate->is_admin == 0)

                @if ($estimate->discount > 10 && auth()->user()->is_admin == 1)


                    @if ($estimate->discount_approved == null)

                        <a href="{{ route('estimate.discount.approve', $estimate->id) }}"
                            onclick="return confirm('Are you sure you want to approve the discount?')" href=""
                            class="btn btn-success"> Approve Discount </a>



                        &nbsp; &nbsp;

                        <a href="{{ route('estimate.discount.reject', $estimate->id) }}"
                            onclick="return confirm('Are you sure you want to reject the discount?')" href=""
                            class="btn btn-danger"> Reject Discount </a>


                    @endif



                @endif


                <br />
                <br />
            @endif
        </div>


        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('title', __('messages.estimate.title') . ':') }}<span class="required">*</span>

            <select onchange="handleSelectChange()" id="mySelect" name="title" class="form-control" required
                autofocus>
                @foreach ($data['category'] as $category)
                    <option value="{{ $category->name }}" description="{{ $category->description }}"
                        term = "{{ $category->term }}"
                        @if (isset($estimate->title)) @if ($estimate->title == $category->name) selected @endif
                        @endif>{{ $category->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('estimate_number', __('messages.estimate.estimate_number') . ':') }}<span
                class="required">*</span>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        {{ __('messages.estimate.estimate_prefix') }}
                    </div>
                </div>
                {{ Form::text('estimate_number', isset($estimate->estimate_number) ? $estimate->estimate_number : generateUniqueEstimateNumber(), ['class' => 'form-control', 'required', 'id' => 'estimateNumber', 'placeholder' => __('messages.estimate.estimate_number')]) }}
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('customer', __('messages.invoice.customer') . ':') }}<span class="required">*</span>

            <select placeholder="{{ __('messages.placeholder.select_customer') }}" name="customer_id"
                id="customerSelectBox" class="form-control" required>

                @foreach ($data['customers'] as $customer)
                    <option @if (isset($estimate->customer_id)) @if ($estimate->customer_id == $customer->id)   selected @endif
                        @endif value="{{ $customer->id }} "> {{ $customer->company_name }} - {{ $customer->client_name }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('estimate_date', __('messages.estimate.estimate_date') . ':') }} <span
                class="required">*</span>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                {{ Form::text('estimate_date', isset($estimate->estimate_date) ? date('Y-m-d H:i:s', strtotime($estimate->estimate_date)) : null, ['class' => 'form-control datepicker', 'required', 'autocomplete' => 'off', 'placeholder' => __('messages.estimate.estimate_date')]) }}
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('expiry_date', __('messages.estimate.expiry_date') . ':') }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                {{ Form::text('estimate_expiry_date', isset($estimate->estimate_expiry_date) ? date('Y-m-d H:i:s', strtotime($estimate->estimate_expiry_date)) : null, ['class' => 'form-control due-datepicker', 'autocomplete' => 'off', 'placeholder' => __('messages.estimate.expiry_date')]) }}
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('tag', __('messages.tags') . ':') }}
            <div class="input-group">
                {{ Form::select('tags[]', $data['tags'], isset($estimate->tags) ? $estimate->tags : null, ['class' => 'form-control', 'id' => 'tagId', 'autocomplete' => 'off', 'multiple' => 'multiple']) }}
                <div class="input-group-append plus-icon-height">
                    <div class="input-group-text">
                        <a href="#" data-toggle="modal" data-target="#addCommonTagModal"><i
                                class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('currency', __('messages.customer.currency') . ':') }}<span class="required">*</span>
            <select id="estimateCurrencyId" data-show-content="true" class="form-control currency-select-box"
                name="currency" required>
                <option value="0" disabled="true" {{ isset($estimate->currency) ? '' : 'selected' }}>
                    {{ __('messages.placeholder.select_currency') }}
                </option>
                @foreach ($data['currencies'] as $key => $currency)
                    <option value="{{ $key }}"
                        {{ (isset($estimate->currency) ? $estimate->currency : null) == $key ? 'selected' : '' }}>
                        &#{{ getCurrencyIcon($key) }}&nbsp;&nbsp;&nbsp; {{ $currency }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('reference', __('messages.credit_note.reference') . ':') }}
            {{ Form::text('reference', isset($estimate->reference) ? $estimate->reference : null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => __('messages.credit_note.reference')]) }}
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('sale_agent', __('messages.invoice.sale_agent') . ':') }}
            {{ Form::select('sales_agent_id', $data['saleAgents'], isset($estimate->sales_agent_id) ? $estimate->sales_agent_id : null, ['class' => 'form-control sale-agent-select-box', 'id' => 'saleAgentId', 'placeholder' => __('messages.placeholder.select_sale_agent')]) }}
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('discount_type', __('messages.invoice.discount_type') . ':') }}<span
                class="required">*</span>
            {{ Form::select('discount_type', $data['discountType'], isset($estimate->discount_type) ? $estimate->discount_type : null, ['class' => 'form-control', 'id' => 'discountTypeSelect', 'required', 'placeholder' => __('messages.placeholder.select_discount_type')]) }}
        </div>


        {{--     <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('hsn_tax', __('messages.invoice.hsn_tax').':') }}
            {{ Form::text('hsn_tax', isset($estimate->hsn_tax) ? $estimate->hsn_tax : null, ['class' => 'form-control', 'required', 'id' => 'hsnTax','placeholder'=>__('messages.invoice.hsn_tax')]) }}
        </div> --}}


        <div class="col-sm-12">

            <label> Addresses </label>
            <div id="bill_to" class="row">

                <?php  $output   =  " ";
                 foreach($estimate->estimateAddresses as $address){

                    if( $address->billing_id   == NULL) {
                    $country  =  $address->country;

                    $bill_address  =  App\Models\EstimateAddress::where('billing_id' , $address->id)->first();

                    $bill_street  =   isset($bill_address->mapaddress) ?  $bill_address->mapaddress   :  ' ';
                    $bill_locality  =  isset($bill_address->locality) ?  $bill_address->locality  : ' ';
                    $bill_country  =  isset($bill_address->country) ? $bill_address->country :  ' ';
                    $bill_postal  =  isset( $bill_address->zip_code)  ?   $bill_address->zip_code  :  ' ';

                    ?>


                <div class='col-sm-6'>

                    <table class='table left-align-table'>
                        <tr>
                            <th>
                                <a href="{{ route('estimate.address.delete', $address->id) }}"
                                    onclick="return confirm('Are You Sure?')"> <i style='color: red'
                                        class='fa fa-trash'></i> </a>

                                <a href='/admin/edit_estimateaddress/{{ $estimate->id }}/{{ $address->id }}'
                                    class='mr-3 addressModalIcon'><i class='fa fa-edit'></i></a> <label
                                    for='selectaddress$address'> Sales Order to </label> :
                            </th>
                            <th>
                                <label for='selectaddress$address'> Delivery to: </label>
                            </th>

                        <tr>
                            <td class='break-word'>
                                <p>
                                    <label for='selectaddress$address'>
                                        Street : {{ $address->mapaddress }} <br />
                                        Locality : {{ $address->locality }}
                                        <br />
                                        Region : {{ $country }}
                                        <br />
                                        Postal Code : {{ $address->zip_code }}
                                </p>
                                </label>
                            </td>
                            <td align='left' class='break-word'>
                                <label for='selectaddress$address'>
                                    <p>
                                        Street : {{ $bill_street }}<br />
                                        Locality : {{ $bill_locality }}
                                        <br />
                                        Region : {{ $bill_country }}
                                        <br />
                                        Postal Code : {{ $bill_postal }}
                                    </p>
                                </label>

                            </td>
                            </td>


                        </tr>

                    </table>

                </div>

                <?php
                    }

         }


        ?>
                @if (count($estimate->estimateAddresses) == 0)
                    _ _ _ _ _ _
                @endif

            </div>
        </div>





        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            {{ Form::label('admin_note', __('messages.invoice.admin_note') . ':') }}
            {{ Form::textarea('admin_note', isset($estimate->admin_note) ? nl2br(e($estimate->admin_note)) : null, ['class' => 'form-control summernote-simple', 'id' => 'editAdminNote']) }}
        </div>
    </div>

    <hr />
    <br />

    <div class="row">
        <div class="form-group col-lg-6 col-md-12 col-sm-12">
            {{--    <div class="input-group">
                {{ Form::select('item', $data['items'], null, ['class' => 'form-control', 'id' => 'addItemSelectBox', 'placeholder' => __('messages.placeholder.select_product')]) }}
            </div> --}}
        </div>
        <div
            class="form-group col-lg-6 col-md-12 col-sm-12 showQuantityAs d-flex align-items-center justify-content-end">
            <span class="font-weight-bold mr-2">{{ __('messages.invoice.show_quantity_as') . ':' }}</span>
            <div class="float-right showQuantityAs">
                <div class="custom-control custom-radio mr-3 d-inline-block">
                    <input type="radio" id="qty" name="unit" required value="1"
                        class="custom-control-input" data-quantity-for="qty"
                        {{ $estimate->unit == 1 ? 'checked' : '' }}>
                    <label class="custom-control-label" for="qty">{{ __('messages.invoice.qty') }}</label>
                </div>
                {{--  <div class="custom-control custom-radio mr-3 d-inline-block">
                    <input type="radio" id="hours" name="unit" required value="2" class="custom-control-input" data-quantity-for="hours"
                            {{$estimate->unit == 2 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="hours">{{ __('messages.invoice.hours') }}</label>
                </div>
                <div class="custom-control custom-radio d-inline-block">
                    <input type="radio" id="qtyHours" name="unit" required value="3" class="custom-control-input" data-quantity-for="qtyHours"
                            {{$estimate->unit == 3 ? 'checked' : ''}}>
                    <label class="custom-control-label"
                           for="qtyHours">{{ __('messages.invoice.qty_hours') }}</label>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12 overflow-section">
            @php

               $invoice  =  $estimate ;
            @endphp
            @include('invoices.item_edit_table')
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('sub_total', __('messages.invoice.sub_total') . ' (EXCL VAT):') }}
            <p><i data-set-currency-class="true"></i> <span id="subTotal">{{ $estimate->sub_total }}</span></p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="fDiscount form-group">
                {{ Form::label('discount', __('messages.invoice.discount') . ':') }}
                <div style="display: none"> (<i data-set-currency-class="true"></i> <span
                        class="footer-discount-numbers">{{ formatNumber($estimate->discount) }}</span>) </div>
                <div class="input-group">
                    {{ Form::text('final_discount', $estimate->discount, ['class' => 'form-control footer-discount-input', 'placeholder' => __('messages.invoice.discount')]) }}
                    <div class="input-group-append">
                        @if (isset($estimate->discount_type) && $estimate->discount_type === 0)
                            <input type="hidden" name="discount_symbol" value="0">
                        @endif
                        <select class="input-group-text dropdown" id="footerDiscount" name="discount_symbol">
                            <div class="dropdown-menu">
                                <option value="1" class="dropdown-item"
                                    {{ isset($estimate->discount_symbol) && $estimate->discount_symbol == 1 ? 'selected' : '' }}>
                                    %
                                </option>
                                {{--  <option value="2" class="dropdown-item"
                                    {{ isset($estimate->discount_symbol) && $estimate->discount_symbol == 2 ? 'selected' : '' }}>
                                    {{ __('messages.invoice.fixed') }}</option> --}}
                            </div>
                        </select>
                    </div>
                </div>
            </div>
            <div style="color: red" class="discount_message"></div>
            <table id="taxesListTable" class="w-100">
                @foreach ($estimate->salesTaxes as $tax)
                    <tr>
                        <td colspan="2" class="font-weight-bold tax-value">{{ $tax->tax }}%</td>
                        <td style="display: none" class="footer-numbers footer-tax-numbers">
                            {{ number_format($tax->amount, 2) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div style="display:none" class="form-group col-lg-3 col-md-6 col-sm-12">
            {{ Form::label('adjustment', __('messages.estimate.adjustment') . ':') }}
            (<i data-set-currency-class="true"></i> <span
                class="adjustment-numbers">{{ number_format($estimate->adjustment) }}</span>)
            {{ Form::number('adjustment', $estimate->adjustment, ['class' => 'form-control', 'id' => 'adjustment', 'placeholder' => __('messages.estimate.adjustment')]) }}
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12">
            {{ Form::label('total', __('messages.invoice.total') . ' (INCL VAT):') }}
            <p><i data-set-currency-class="true"></i> <span
                    class="total-numbers">{{ number_format($estimate->total_amount) }}</span></p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            {{ Form::label('client_note', __('messages.invoice.client_note') . ':') }}
            {{ Form::textarea('client_note', isset($estimate->client_note) ? nl2br(e($estimate->client_note)) : null, ['class' => 'form-control summernote-simple', 'id' => 'editClientNote']) }}
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            {{ Form::label('terms_conditions', __('messages.invoice.terms_conditions') . ':') }}
            {{ Form::textarea('term_conditions', isset($estimate->term_conditions) ? nl2br(e($estimate->term_conditions)) : null, ['class' => 'form-control summernote-simple', 'id' => 'editTermAndConditions']) }}
        </div>
        <div class="form-group col-sm-12">
            <div class="btn-group dropup open">
                {{ Form::button('Save', ['class' => 'btn btn-primary']) }}
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-left width200">
                    <li>
                        <a href="#" class="dropdown-item" id="editSaveSend"
                            data-status="1">{{ __('messages.estimate.save_and_send') }}</a>
                    </li>
                </ul>
            </div>
            <a href="{{ url()->previous() }}"
                class="btn btn-secondary text-dark ml-3">{{ __('messages.common.cancel') }}</a>
        </div>
    </div>
</div>

<script>
    function handleSelectChange() {

        // Get the select element
        var selectElement = document.getElementById("mySelect");
        // Get the selected option
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        // Get the value of the description attribute
        var descriptionValue = selectedOption.getAttribute("description");
        var termValue = selectedOption.getAttribute("term");
        // Get the value of the selected option
        var selectedValue = selectedOption.value;
        // Log the description value to the console
        //  alert("Description:"+selectedValue);
        //$('.note-editable').html(selectedValue);
        var $all = selectedValue + `<br/>` + descriptionValue;


        document.getElementById('editTermAndConditions').value = termValue;


        // Find the second element with the class name 'note-editable'
        var noteEditableElements = document.getElementsByClassName("note-editable");

        // Check if the second element exists
        if (noteEditableElements.length >= 2) {



            // Change the HTML content of the second element
            noteEditableElements[2].innerHTML = termValue;



        }


    }

    // handleSelectChange()  ;
</script>
