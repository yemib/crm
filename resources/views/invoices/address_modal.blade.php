<div id="addModal" class="modal fade address-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row" id="addressForm">
                    <div class="form-group col-sm-12">
                        {{ Form::label('street', __('messages.address.street') . ':') }} <span class="required">*</span>
                        {{ Form::textarea('street[]', isset($addresses[0]->street) ? nl2br(e($addresses[0]->street)) : null, ['class' => 'form-control street billingShippingTextarea', 'id' => 'billStreet', 'data-err-msg' => 'Billing Street field required']) }}
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        {{ Form::label('country', __('messages.address.country') . ':') }}

                        {{ Form::select(
                            'country[]',
                            $data['countries'],
                            isset($addresses[0]->country) ? $addresses[0]->country : null,
                            ['id' => 'billCountry', 'class' => 'form-control', 'placeholder' => __('messages.address.country') . ':'],
                        ) }}
                        {{--    {{ Form::text('country[]', isset($addresses[0]->country) ? $addresses[0]->country : null, ['class' => 'form-control country', 'id' => 'billCountry']) }} --}}
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        {{ Form::label('city', __('messages.address.city') . ':') }}
                        {{--        {{ Form::text('city[]', isset($addresses[0]->city) ? $addresses[0]->city : null, ['class' => 'form-control city', 'id' => 'billCity']) }}
 --}}
                        <select name="city[]" class="form-control" id="billCity">
                            @if (isset($addresses[0]->city))
                                <option> {{ $addresses[0]->city }}</option>
                            @endif

                        </select>

                    </div>
                    {{--          <div class="form-group col-sm-12 col-md-6">
                        {{ Form::label('state',__('messages.address.state').':') }}
                        {{ Form::text('state[]', isset($addresses[0]->state) ? $addresses[0]->state : null, ['class' => 'form-control state', 'id' => 'billState']) }}
                    </div> --}}
                    <div class="form-group col-sm-12 col-md-6">
                        {{ Form::label('zip_code', __('messages.address.zip_code') . ':') }}
                        {{ Form::text('zip_code[]', isset($addresses[0]->zip_code) ? $addresses[0]->zip_code : null, ['class' => 'form-control zip-code',
                       'id' => 'billZipCode']) }}
                    </div>

                </div>
                <hr>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="shippingAddressEnable">
                    <label class="custom-control-label"
                        for="shippingAddressEnable">{{ __('messages.invoice.add_shipping_address') }}</label>

                </div>
                <br>
                <div id="shippingAddressForm" class="display-none">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="copyBillingAddress">
                        <label class="custom-control-label"
                            for="copyBillingAddress">{{ __('messages.customer.copy_billing_address') }}</label>
                    </div>
                    <br>
                    <div class="row" id="addressForm">
                        <div class="form-group col-sm-12">
                            {{ Form::label('street', __('messages.address.street') . ':') }} <span
                                class="required">*</span>
                            {{ Form::textarea('street[]', isset($addresses[1]->street) ? nl2br(e($addresses[1]->street)) : null, ['class' => 'form-control street billingShippingTextarea', 'id' => 'shipStreet', 'data-err-msg' => 'Shipping Street field required']) }}
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            {{ Form::label('country', __('messages.address.country') . ':') }}
                            {{--     {{ Form::text('country[]', isset($addresses[1]->country) ? $addresses[1]->country : null,
                            ['id' => 'shipCountry','class' => 'form-control country']) }} --}}

                            {{ Form::select(
                                'country[]',
                                $data['countries'],
                                isset($addresses[1]->country) ? $addresses[1]->country : null,
                                ['id' => 'shipCountry', 'class' => 'form-control country', 'placeholder' => __('messages.address.country') . ':'],
                            ) }}
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            {{ Form::label('city', __('messages.address.city') . ':') }}
                            {{--  {{ Form::text('city[]', isset($addresses[1]->city) ? $addresses[1]->city : null,
                             [ 'id' => 'shipCity','class' => 'form-control city']) }} --}}

                            <select name="city[]" id="shipCity" class = 'form-control city'>
                                @if (isset($addresses[1]->city))
                                    <option> {{ $addresses[1]->city }} </option>
                                @endif

                            </select>
                        </div>
                        {{--     <div class="form-group col-sm-12 col-md-6">
                            {{ Form::label('state',__('messages.address.state').':') }}
                            {{ Form::text('state[]', isset($addresses[1]->state) ? $addresses[1]->state : null, ['id' => 'shipState','class' => 'form-control state']) }}
                        </div> --}}
                        <div class="form-group col-sm-12 col-md-6">
                            {{ Form::label('zip_code', __('messages.address.zip_code') . ':') }}
                            {{ Form::text('zip_code[]', isset($addresses[1]->zip_code) ? $addresses[1]->zip_code : null, ['class' => 'form-control zip-code',  'id' => 'shipZipCode']) }}
                        </div>

                    </div>
                </div>
                <div class="text-right modal-footer">
                    <button type="button" id="btnSaveAddress"
                        class="btn btn-primary ml-1">{{ __('messages.common.save') }}</button>
                    <button type="button" class="btn btn-secondary text-dark" id="btnCancel"
                        data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // AJAX request to fetch localities based on the selected country
        $('#billCountry').change(function() {
            //var country = $(this).val();
            var country = $(this).find('option:selected').text();
            //alert(country);

            $.ajax({
                url: '/get_localities',
                type: 'GET',
                data: {
                    country: country
                },
                dataType: 'json',
                success: function(response) {
                    // Clear the locality dropdown
                    $('#billCity').empty();

                    // Populate the locality dropdown with options
                    $.each(response, function(index, locality) {
                        $('#billCity').append('<option value="' + locality + '">' +
                            locality + '</option>');
                    });
                }
            });
        });

        // AJAX request to fetch localities based on the selected country
        $('#shipCountry').change(function() {
            //var country = $(this).val();
            var country = $(this).find('option:selected').text();
            //alert(country);

            $.ajax({
                url: '/get_localities',
                type: 'GET',
                data: {
                    country: country
                },
                dataType: 'json',
                success: function(response) {
                    // Clear the locality dropdown
                    $('#shipCity').empty();

                    // Populate the locality dropdown with options
                    $.each(response, function(index, locality) {
                        $('#shipCity').append('<option value="' + locality + '">' +
                            locality + '</option>');
                    });
                }
            });
        });




    });
</script>
