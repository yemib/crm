<div class="card-body">
    <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
    <div class="row">


        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('title', __('messages.estimate.title') . ':') }}<span class="required">*</span>
            {{--     {{ Form::text('title', isset($estimate->title) ? $estimate->title : null,
             ['class' => 'form-control', 'required','autocomplete' => 'off','autofocus','placeholder'=> __('messages.products.title')]) }} --}}

            <select onchange="handleSelectChange()" id="mySelect" name="title" class="form-control" required autofocus>
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
                {{ Form::text('estimate_number', generateUniqueEstimateNumber(), ['class' => 'form-control', 'required', 'id' => 'estimateNumber', 'readonly', 'placeholder' => __('messages.estimate.estimate_number')]) }}
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('customer', __('messages.invoice.customer') . ':') }}
            <span class="required">*</span>

            <select placeholder="{{ __('messages.placeholder.select_customer') }}" name="customer_id"
                id="customerSelectBox" class="form-control" required>

                @foreach ($data['customers'] as $customer)
                    <option value="{{ $customer->id }} "> {{ $customer->company_name }} - {{ $customer->client_name }}
                    </option>
                @endforeach
            </select>

        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('estimate_date', __('messages.estimate.estimate_date') . ':') }} <span
                class="required">*</span>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>

                <input onchange="add30DaysToDateString()" onkeydown="add30DaysToDateString()"
                    onclick="add30DaysToDateString()" id="estimate_date" name="estimate_date"
                    value="{{ date('Y-m-d H:i:s') }}" class="form-control datepicker" required
                    placeholder="{{ __('messages.estimate.estimate_date') }}" />
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('expiry_date', __('messages.estimate.expiry_date') . ':') }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>

                <input id="estimate_expiry_date" name="estimate_expiry_date" class="form-control due-datepicker"
                    placeholder="{{ __('messages.estimate.expiry_date') }}" />
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('tag', __('messages.tags') . ':') }}
            <div class="input-group">
                {{ Form::select('tags[]', $data['tags'], null, ['class' => 'form-control', 'id' => 'tagId', 'autocomplete' => 'off', 'multiple' => 'multiple']) }}
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
                <option value="0" disabled="true" selected="true">{{ __('messages.placeholder.select_currency') }}
                </option>
                @foreach ($data['currencies'] as $key => $currency)
                    <option value="{{ $key }}"
                        {{ $key == getCurrentCurrencyIndex(getCurrentCurrency()) ? 'selected' : '' }}>
                        &#{{ getCurrencyIcon($key) }}&nbsp;&nbsp;&nbsp; {{ $currency }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('reference', __('messages.credit_note.reference') . ':') }}
            {{ Form::text('reference', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => __('messages.credit_note.reference')]) }}
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('sale_agent', __('messages.invoice.sale_agent') . ':') }}
            <select name="sales_agent_id" class = 'form-control sale-agent-select-box' id="saleAgentId">
                <?php
                $usert = auth()->user();
                ?>
                @foreach ($data['saleAgents'] as $key => $value)
                    <option @if ($usert->id == $key) selected ="selected" @endif value="{{ $key }}">
                        {{ $value }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            {{ Form::label('discount_type', __('messages.invoice.discount_type') . ':') }}<span class="required">*</span>
            {{ Form::select('discount_type', $data['discountType'], 2, ['class' => 'form-control', 'id' => 'discountTypeSelect', 'required', 'placeholder' => __('messages.placeholder.select_discount_type')]) }}
        </div>
        <div style="display: none" class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('hsn_tax', __('messages.invoice.hsn_tax') . ':') }}
            {{ Form::text('hsn_tax', isset($estimate->hsn_tax) ? $estimate->hsn_tax : null, ['class' => 'form-control', 'placeholder' => __('messages.invoice.hsn_tax')]) }}
        </div>

        <div class="col-sm-12">
            <style>
                label {
                    cursor: pointer
                }

                .left-align-table {
                    text-align: left;
                }

                .break-word {
                    word-wrap: break-word;
                    width: 50% !important
                }
            </style>

            {{--    {{ Form::label('bill_to', __('messages.invoice.bill_to').':') }} --}}

            <label> Select Address </label>


            <div class="row" id="bill_to">
                _ _ _ _ _ _
            </div>


        </div>
        <div class="form-group col-lg-2 col-md-4 col-sm-12">
            {{ Form::label('ship_to', __('messages.invoice.ship_to') . ':') }}
            <div id="ship_to">

            </div>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            {{ Form::label('admin_note', __('messages.invoice.admin_note') . ':') }}
            {{ Form::textarea('admin_note', isset($settings) ? $settings['admin_note'] : null, ['class' => 'form-control summernote-simple']) }}
        </div>
    </div>

    <hr />
    <br />

    <div class="row">
        <div class="form-group col-lg-6 col-md-12 col-sm-12">
            <div class="input-group">

                {{--   {{ Form::select('item', $data['items'], null, ['class' => 'form-control',
                'id' => 'addItemSelectBox', 'placeholder' => __('messages.placeholder.select_product')]) }} --}}
            </div>
        </div>
        <div
            class="form-group col-lg-6 col-md-12 col-sm-12 showQuantityAs d-flex align-items-center justify-content-end">
            <span class="font-weight-bold mr-2">{{ __('messages.invoice.show_quantity_as') . ':' }}</span>
            <div class="float-right showQuantityAs">
                <div class="custom-control custom-radio mr-3 d-inline-block">
                    <input type="radio" id="qty" name="unit" required value="1"
                        class="custom-control-input" data-quantity-for="qty" checked>
                    <label class="custom-control-label" for="qty">{{ __('messages.invoice.qty') }}</label>
                </div>

                {{--     <div class="custom-control custom-radio mr-3 d-inline-block">
                    <input type="radio" id="hours" name="unit" required value="2" class="custom-control-input" data-quantity-for="hours">
                    <label class="custom-control-label" for="hours">{{ __('messages.invoice.hours') }}</label>
                </div>
                <div class="custom-control custom-radio d-inline-block">
                    <input type="radio" id="qtyHours" name="unit" required value="3"
                           class="custom-control-input" data-quantity-for="qtyHours">
                    <label class="custom-control-label"
                           for="qtyHours">{{ __('messages.invoice.qty/hours') }}</label>
                </div>
 --}}

            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12 overflow-section">
            @include('invoices.items_table')
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('sub_total', __('messages.estimate.sub_total') . '  (EXCL VAT):') }}
            <p><i data-set-currency-class="true"></i> <span id="subTotal">0</span></p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="fDiscount form-group">
                {{ Form::label('discount', __('messages.estimate.discount') . ':') }}
                {{-- <i data-set-currency-class="true"></i> --}} <span style="display:none" class="footer-discount-numbers">0</span>
                <div class="input-group">
                    {{--                     {{ Form::text('final_discount', 0, ['class' => 'form-control footer-discount-input','placeholder'=>__('messages.estimate.discount')]) }} --}}
                    <input name="final_discount" value="0" class="form-control footer-discount-input"
                        placeholder="{{ __('messages.estimate.discount') }}" />
                    <div class="input-group-append">
                        <select class="input-group-text dropdown" id="footerDiscount" name="discount_symbol">
                            <div class="dropdown-menu">
                                <option value="1" class="dropdown-item">%</option>
                                {{--  <option value="2"
                                        class="dropdown-item">{{ __('messages.invoice.fixed') }}</option> --}}
                            </div>
                        </select>
                    </div>
                </div>
            </div>
            <div style="color: red" class="discount_message"></div>
            <table id="taxesListTable" class="w-100">
            </table>
        </div>
        <div style="display:none" class="form-group col-lg-3 col-md-6 col-sm-12">
            {{ Form::label('adjustment', __('messages.estimate.adjustment') . ':') }}
            (<i data-set-currency-class="true"></i> <span class="adjustment-numbers">0</span>)
            {{ Form::number('adjustment', 0, ['class' => 'form-control', 'id' => 'adjustment', 'placeholder' => __('messages.estimate.adjustment')]) }}
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12">
            {{ Form::label('total', __('messages.estimate.total') . ' (INCL VAT):') }}
            <p><i data-set-currency-class="true"></i> <span class="total-numbers">0</span></p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            {{ Form::label('client_note', __('messages.common.client_note') . ':') }}
            {{ Form::textarea('client_note', isset($settings) ? $settings['client_note'] : null, ['class' => 'form-control summernote-simple']) }}
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            {{ Form::label('terms_conditions', __('messages.estimate.terms_conditions') . ':') }}
            {{ Form::textarea('term_conditions', isset($settings) ? $settings['term_and_conditions'] : null, ['id' => 'term_conditions', 'class' => 'form-control summernote-simple']) }}
        </div>
        <div class="form-group col-sm-12">
            <div class="btn-group dropup open">
                {{--                {{ Form::button('Save', ['class' => 'btn btn-primary']) }} --}}
                <a href="#" class="btn btn-primary" id="saveAsDraft"
                    data-status="0">{{ __('messages.common.save') }}</a>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-left width200">
                    <li>
                        <a href="#" class="dropdown-item" id="saveAsDraft"
                            data-status="0">{{ __('messages.estimate.save_as_draft') }}</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item" id="saveAndSend"
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
    function add30DaysToDateString() {

        // Parse the input date string
        estimatedate = document.getElementById('estimate_date').value;


        const currentDate = new Date(estimatedate);

        // Add 30 days to the date
        currentDate.setDate(currentDate.getDate() + 30);

        // Format the result in the same format
        const resultDateString = currentDate.toISOString().slice(0, 19).replace("T", " ");
        document.getElementById('estimate_expiry_date').value = resultDateString;
        // return resultDateString;
    }

    add30DaysToDateString();

    // Example usage:
    /* const inputDate = "2024-01-09 13:41:14";
    const newDate = add30DaysToDateString(inputDate); */



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
        document.getElementById('term_conditions').value = termValue;


        // Find the second element with the class name 'note-editable'
        var noteEditableElements = document.getElementsByClassName("note-editable");

        // Check if the second element exists
        if (noteEditableElements.length >= 2) {



            // Change the HTML content of the second element
            noteEditableElements[2].innerHTML = termValue;



        }


    }

    handleSelectChange();
</script>
