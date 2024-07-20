<input type="hidden" id="hdnInvoiceId" value="{{ $invoice->id }}">
<div class="card-body">
    <div class="alert alert-danger d-none" id="validationErrorsBox"></div>

    <div class="row">

        <div align="right" class="col-sm-12">

            @if ($invoice->is_admin == 0)

                @if ($invoice->discount > 10 && auth()->user()->is_admin == 1)


                    @if ($invoice->discount_approved == null)

                        <a href="{{ route('invoice.discount.approve', $invoice->id) }}"
                            onclick="return confirm('Are you sure you want to approve the discount?')" href=""
                            class="btn btn-success"> Approve Discount </a>



                        &nbsp; &nbsp;

                        <a href="{{ route('invoice.discount.reject', $invoice->id) }}"
                            onclick="return confirm('Are you sure you want to reject the discount?')" href=""
                            class="btn btn-danger"> Reject Discount </a>


                    @endif



                @endif


                <br />
                <br />
            @endif
        </div>


        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('title', __('messages.invoice.title') . ':') }}<span class="required">*</span>


            <select onchange="handleSelectChange()" id="mySelect" name="title" class="form-control" required
                autofocus>
                @foreach ($data['category'] as $category)
                    <option value="{{ $category->name }}" description="{{ $category->description }}"
                        term = "{{ $category->term }}"
                        @if (isset($invoice->title)) @if ($invoice->title == $category->name) selected @endif
                        @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            {{--   {{ Form::text('title', isset($invoice->title) ? $invoice->title : null, ['class' => 'form-control', 'required','autocomplete' => 'off','autofocus','placeholder'=>__('messages.invoice.title')]) }} --}}
        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('invoice_no', __('messages.invoice.invoice_number') . ':') }}<span class="required">*</span>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        {{ __('messages.invoice.invoice_prefix') }}
                    </div>
                </div>
                {{ Form::text('invoice_number', isset($invoice->invoice_number) ? $invoice->invoice_number : generateUniqueInvoiceNumber(), ['class' => 'form-control', 'required', 'id' => 'invoiceNumber', 'placeholder' => __('messages.invoice.invoice_number')]) }}
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('customer', __('messages.invoice.customer') . ':') }}<span class="required">*</span>
            <select placeholder="{{ __('messages.placeholder.select_customer') }}" name="customer_id"
                id="customerSelectBox" class="form-control" required>

                @foreach ($data['customers'] as $customer)
                    <option @if (isset($estimate->customer_id)) @if ($estimate->customer_id == $customer->id)   selected @endif
                        @endif value="{{ $customer->id }} "> {{ $customer->company_name }} -
                        {{ $customer->client_name }}</option>
                @endforeach
            </select>


        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('invoice_date', __('messages.invoice.invoice_date') . ':') }} <span class="required">*</span>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                {{ Form::text('invoice_date', isset($invoice->invoice_date) ? date('Y-m-d', strtotime($invoice->invoice_date)) : null, ['class' => 'form-control invoiceDate', 'required', 'autocomplete' => 'off', 'placeholder' => __('messages.invoice.invoice_date')]) }}
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('due_date', __('messages.invoice.due_date') . ':') }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                {{ Form::text('due_date', isset($invoice->due_date) ? date('Y-m-d', strtotime($invoice->due_date)) : null, ['class' => 'form-control invoiceDueDate', 'autocomplete' => 'off', 'placeholder' => __('messages.invoice.due_date')]) }}
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('tag', __('messages.tags') . ':') }}
            <div class="input-group">
                {{ Form::select('tags[]', $data['tags'], $invoice->tags->pluck('id'), ['class' => 'form-control', 'id' => 'tagId', 'autocomplete' => 'off', 'multiple' => 'multiple']) }}
                <div class="input-group-append plus-icon-height">
                    <div class="input-group-text">
                        <a href="#" data-toggle="modal" data-target="#addCommonTagModal"><i
                                class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('payment_modes', __('messages.invoice.allowed_payment_modes_for_this_invoice') . ':') }}
            <span class="required">*</span>
            <div class="input-group">
                {{ Form::select('payment_modes[]', $data['paymentModes'], $invoice->paymentModes->pluck('id'), ['class' => 'form-control', 'id' => 'paymentMode', 'required', 'autocomplete' => 'off', 'multiple' => 'multiple']) }}
                <div class="input-group-append plus-icon-height">
                    <div class="input-group-text">
                        <a href="#" data-toggle="modal" data-target="#addCommonPaymentModeModal"><i
                                class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('currency', __('messages.customer.currency') . ':') }}<span class="required">*</span>
            <select id="invoiceCurrencyId" data-show-content="true" class="form-control currency-select-box"
                name="currency" required>
                <option value="0" disabled="true" {{ isset($invoice->currency) ? '' : 'selected' }}>
                    {{ __('messages.placeholder.select_currency') }}
                </option>
                @foreach ($data['currencies'] as $key => $currency)
                    <option value="{{ $key }}"
                        {{ (isset($invoice->currency) ? $invoice->currency : null) == $key ? 'selected' : '' }}>
                        &#{{ getCurrencyIcon($key) }}&nbsp;&nbsp;&nbsp; {{ $currency }}
                    </option>
                @endforeach
            </select>
        </div>



        <div  class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('sale_agent', __('messages.invoice.sale_agent') . ':') }}
            {{ Form::select('sales_agent_id', $data['saleAgents'], isset($invoice->sales_agent_id) ? $invoice->sales_agent_id : null, ['class' => 'form-control', 'id' => 'salesAgentId', 'placeholder' => __('messages.placeholder.select_sale_agent')]) }}
        </div>


        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('discount_type', __('messages.invoice.discount_type') . ':') }}<span class="required">*</span>
            {{ Form::select('discount_type', $data['discountType'], isset($invoice->discount_type) ? $invoice->discount_type : null, ['class' => 'form-control', 'id' => 'discountTypeSelect', 'placeholder', 'require']) }}
        </div>
        {{--    <div class="form-group col-lg-4 col-md-6 col-sm-12">
            {{ Form::label('hsn_tax', __('messages.invoice.hsn_tax').':') }}
            {{ Form::text('hsn_tax', isset($invoice->hsn_tax) ? $invoice->hsn_tax : null, ['class' => 'form-control','placeholder'=>__('messages.invoice.hsn_tax')]) }}
        </div> --}}

        <div class="col-sm-12">

            <label> Addresses </label>
            <div id="bill_to" class="row">

                <?php  $output   =  " ";
                 foreach($invoice->invoiceAddresses as $address){

                    if( $address->billing_id   == NULL) {
                    $country  =  $address->country;

                    $bill_address  =  App\Models\InvoiceAddress::where('billing_id' , $address->id)->first();

                    $bill_street  =   isset($bill_address->mapaddress) ?  $bill_address->mapaddress   :  ' ';
                    $bill_locality  =  isset($bill_address->locality) ?  $bill_address->locality  : ' ';
                    $bill_country  =  isset($bill_address->country) ? $bill_address->country :  ' ';
                    $bill_postal  =  isset( $bill_address->zip_code)  ?   $bill_address->zip_code  :  ' ';

                    ?>


                <div class='col-sm-6'>

                    <table class='table left-align-table'>
                        <tr>
                            <th>
                                <a href="{{ route('invoice.address.delete', $address->id) }}"
                                    onclick="return confirm('Are You Sure?')"> <i style='color: red'
                                        class='fa fa-trash'></i> </a>

                                <a href='/admin/edit_invoicesaddress/{{ $invoice->id }}/{{ $address->id }}'
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
                @if (count($invoice->invoiceAddresses) == 0)
                    _ _ _ _ _ _
                @endif

            </div>
        </div>





        <div class="form-group col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('ship_to', __('messages.invoice.ship_to') . ':') }}
            <div id="ship_to">

            </div>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            {{ Form::label('admin_note', __('messages.invoice.admin_note') . ':') }}
            {{ Form::textarea('admin_text', isset($invoice->admin_text) ? nl2br(e($invoice->admin_text)) : null, ['class' => 'form-control summernote-simple', 'id' => 'editAdminNote']) }}
        </div>
    </div>

    <hr />
    <br />

    <div class="row">
        <div class="form-group col-lg-6 col-md-12 col-sm-12">
            @if (!isset($who))
                {{-- <div class="input-group">
                {{ Form::select('item', $data['items'], null, ['class' => 'form-control', 'id' => 'addItemSelectBox',
                'placeholder' => __('messages.placeholder.add_product')]) }}
            </div> --}}
            @endif
        </div>

        <div
            class="form-group col-lg-6 col-md-12 col-sm-12 showQuantityAs d-flex align-items-center justify-content-end">
            <span class="font-weight-bold mr-2">{{ __('messages.invoice.show_quantity_as') . ':' }}</span>
            <div class="float-right showQuantityAs">
                <div class="custom-control custom-radio mr-3 d-inline-block">
                    <input type="radio" id="qty" name="unit" required value="1"
                        class="custom-control-input" data-quantity-for="qty"
                        {{ $invoice->unit == 1 ? 'checked' : '' }}>
                    <label class="custom-control-label" for="qty">{{ __('messages.invoice.qty') }}</label>
                </div>
                {{--       <div class="custom-control custom-radio mr-3 d-inline-block">
                    <input type="radio" id="hours" name="unit" required value="2" class="custom-control-input" data-quantity-for="hours"
                            {{$invoice->unit == 2 ? 'checked' : ''}}>
                    <label class="custom-control-label" for="hours">{{ __('messages.invoice.hours') }}</label>
                </div>
                <div class="custom-control custom-radio d-inline-block">
                    <input type="radio" id="qtyHours" name="unit" required value="3" class="custom-control-input" data-quantity-for="qtyHours"
                            {{$invoice->unit == 3 ? 'checked' : ''}}>
                    <label class="custom-control-label"
                           for="qtyHours">{{ __('messages.invoice.qty_hours') }}</label>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="row">
        <div style="overflow: auto" class="form-group col-lg-12 col-md-12 col-sm-12 overflow-section">
              @include('invoices.item_edit_table')
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-2 col-md-6 col-sm-12">
            {{ Form::label('sub_total', __('messages.invoice.sub_total') . ' (EXCL VAT):') }}
            <p><i data-set-currency-class="true"></i> <span id="subTotal">{{ $invoice->sub_total }}</span></p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="fDiscount form-group">
                {{ Form::label('discount', __('messages.invoice.discount') . ':') }}


             <!-- (  -->




             {{-- <i data-set-currency-class="true"></i> --}} <span   style="display:none"
                    class="footer-discount-numbers">{{ formatNumber($invoice->discount) }}</span> {{-- %) --}}
                <div class="input-group">
                    {{ Form::text('final_discount', $invoice->discount, [
                        'class' => 'form-control footer-discount-input',
                        'placeholder' => __('messages.invoice.discount'),
                    ]) }}
                    <div class="input-group-append">
                        @if (isset($invoice->discount_type) && $invoice->discount_type === 0)
                            <input type="hidden" name="discount_symbol" value="0">
                        @endif
                        <select class="input-group-text dropdown" id="footerDiscount" name="discount_symbol">
                            <div class="dropdown-menu">
                                <option value="1" class="dropdown-item"
                                    {{ isset($invoice->discount_symbol) && $invoice->discount_symbol == 1 ? 'selected' : '' }}>
                                    %
                                </option>
                                {{--    <option value="2"
                                        class="dropdown-item" {{ isset($invoice->discount_symbol) && $invoice->discount_symbol == 2 ?  'selected':'' }}>{{ __('messages.invoice.fixed') }}</option> --}}
                            </div>
                        </select>
                    </div>
                </div>
            </div>
            <div style="color: red" class="discount_message"></div>
            <table id="taxesListTable" class="w-100">
                @foreach ($invoice->salesTaxes as $tax)
                    <tr>
                        <td colspan="2" class="font-weight-bold tax-value">{{ $tax->tax }}%</td>
                        <td class="footer-numbers footer-tax-numbers">{{ $tax->amount }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div style="display:none" class="form-group col-lg-3 col-md-6 col-sm-12">
            {{ Form::label('adjustment', __('messages.invoice.adjustment') . ':') }}
            (<i data-set-currency-class="true"></i> <span
                class="adjustment-numbers">{{ number_format($invoice->adjustment) }}</span>)
            {{ Form::number('adjustment', $invoice->adjustment, ['class' => 'form-control', 'id' => 'adjustment', 'placeholder' => __('messages.invoice.adjustment')]) }}
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12">
            {{ Form::label('total', __('messages.invoice.total') . ' (INCL VAT):') }}
            <p><i data-set-currency-class="true"></i> <span
                    class="total-numbers">{{ number_format($invoice->total_amount) }}</span></p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            {{ Form::label('client_note', __('messages.invoice.client_note') . ':') }}
            {{ Form::textarea('client_note', isset($invoice->client_note) ? nl2br(e($invoice->client_note)) : null, ['class' => 'form-control summernote-simple', 'id' => 'editClientNote']) }}
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            {{ Form::label('terms_conditions', __('messages.invoice.terms_conditions') . ':') }}
            {{ Form::textarea('term_conditions', isset($invoice->term_conditions) ? nl2br(e($invoice->term_conditions)) : null, ['class' => 'form-control summernote-simple', 'id' => 'editTermAndConditions']) }}
        </div>
        @if (!isset($who))
            <div class="form-group col-sm-12">
                <div class="btn-group dropup open">

                    <a href="#" class="btn btn-primary" id="editSaveSend"
                        data-status="1">{{ __('messages.invoice.save_and_send') }}</a>


                    {{--  {{ Form::button('Save', ['class' => 'btn btn-primary', 'id' => 'editSaveSend'   ]) }} --}}
                    {{--   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="true">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-left width200">
                    <li>
                        <a href="#" class="dropdown-item" id="editSaveSend"
                           data-status="1">{{ __('messages.invoice.save_and_send') }}</a>
                    </li>
                </ul> --}}
                </div>
                <a href="{{ url()->previous() }}"
                    class="btn btn-secondary text-dark ml-3">{{ __('messages.common.cancel') }}</a>
            </div>

        @endif


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
</script>
