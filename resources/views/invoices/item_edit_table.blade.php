<table class="table table-responsive-sm table-responsive-md table-striped table-bordered" id="itemTable">
    <thead>

        @if (!isset($who))
            <tr>
                <th style="width: 20%">{{ __('messages.invoice.item') }}<span class="required">*</span>
                </th>
                <th style="width: 15%  ; ">{{ __('messages.common.description') }}</th>
                <th class="small-column"><span
                        class="qtyHeader">{{ __('messages.invoice.qty') }}</span><span
                        class="required">*</span></th>
                <th style="white-space: nowrap;" class="small-column">
                    {{ __('messages.products.rate') }}(<i data-set-currency-class="true"></i>)<span
                        class="required">*</span>
                </th>
                <th style="white-space: nowrap;" class="medium-column">
                    {{ __('messages.products.tax') }}(<i class="fas fa-percentage"></i>)</th>
                <th style="white-space: nowrap;"> Warranty Period </th>


                @if (isset($who))
                    <th class="button-column"> Warranty Expires</th>

                @endif


                <th class="small-column">{{ __('messages.invoice.amount') }}<span
                        class="required">*</span></th>

                @if (!isset($who))
                    <th class="button-column"><a href="#" id="itemAddBtn"><i
                                class="fas fa-plus"></i></a></th>
                @endif


            </tr>
        @else
            <tr>
                <th> Serial No</th>

                <th> Image </th>

                <th>{{ __('messages.invoice.item') }}</span></th>
               <th>{{ __('messages.common.description') }}</th>

                <th class="small-column"><span class="qtyHeader">{{ __('messages.invoice.qty') }}</span>
                </th>

                <th style="white-space: nowrap;"> Warranty Period </th>



                <th class="button-column"> Warranty Expires </th>



                <th class="small-column">{{ __('messages.invoice.amount') }}</th>




            </tr>



        @endif
    </thead>
    <tbody class="items-container">

        <?php if (isset($_POST['product_check'])) {
            $products = $_POST['product_check'];
        } ?>
        @foreach ($invoice->salesItems as $item)
            <?php
            if (isset($_POST['product_check'])) {
                if (!in_array($item->id, $products)) {
                    continue;
                }
            } ?>
            @if (!isset($who))

                <tr>
                    <td>
                        {{--     <input type="text" name="item[]" class="form-control item-name" required
                       value="{{ html_entity_decode($item->item) }}" placeholder="{{ __('messages.invoice.item') }}"> --}}

                        <select onchange="extractdata($(this))" id="singleproduct" class="form-control"
                            required>
                            @foreach ($data['items'] as $key => $value)
                                <option value="{{ $key }}"
                                    @if ($item->item == $value) selected @endif> {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="item[]" value="{{ $item->item }}"
                            class="item-name" required />

                    </td>
                    <td><input name="description[]" class="form-control item-description"
                            placeholder="{{ __('messages.common.description') }}"
                            value="{{ $item->description }}" /></td>

                    <td><input type="text" name="quantity[]" class="form-control qty" required
                            min="0" value="{{ $item->quantity }}"></td>
                    <td><input type="text" name="rate[]" class="form-control rate" required
                            value="{{ $item->rate }}"
                            placeholder="{{ __('messages.products.rate') }}">
                    </td>
                    <td class="">
                        {{ Form::select('tax[]', $data['taxesArr'], $item->taxes->pluck('id'), ['class' => 'form-control tax-rates', 'multiple']) }}
                    </td>
                    <td class="warranty_period">
                        @if (!isset($who))


                            <select name="warranty_period[]" class="form-control">
                                <option value="">Select Warranty Period</option>
                                <?php $warranties = App\Models\WarrantyType::get(); ?>
                                @foreach ($warranties as $warranty)
                                    <option
                                        @if (isset($item->warrantyperiod->id)) @if ($item->warrantyperiod->id == $warranty->id)
                    selected @endif
                                        @endif value="{{ $warranty->id }}">
                                        {{ $warranty->number }} {{ $warranty->type }}</option>
                                @endforeach

                            </select>
                        @else
                            @if (isset($item->warrantyperiod->id))

                                {{ $item->warrantyperiod->number }} {{ $item->warrantyperiod->type }}

                            @endif


                        @endif



                    </td>

                    @if (isset($who))
                        <td>

                            {{ $item->warranty }}
                        </td>


                    @endif

                    <td class="item-amount-width"><i data-set-currency-class="true"></i> <span
                            class="item-amount">{{ number_format($item->total) }}</span></td>
                    @if (!isset($who))
                        <td><a href="#" class="remove-invoice-item text-danger"><i
                                    class="far fa-trash-alt"></i></a>
                        </td>
                    @endif


                </tr>
            @else
                <tr>

                    <td style="white-space: nowrap;">{{ $item->serial_no }}</td>
                    <td>
                        @if ($item->image != null) <a
                                target="_blank" href="{{ $item->image }}">
                                <img src="{{ $item->image }}" height="100px" width="100px" /> </a>
                        @endif
                    </td>

                    <td style="white-space: nowrap;">
                        {{ $item->item }}

                    </td>

                     <td style="white-space: nowrap;">{{ $item->description }}</td>

                    <td>{{ $item->quantity }}</td>


                    <td style="white-space: nowrap;" class="warranty_period">
                        @if (isset($item->warrantyperiod->id))

                            {{ $item->warrantyperiod->number }} {{ $item->warrantyperiod->type }}

                        @endif
                    </td>


                    <td style="white-space: nowrap;">

                        <?php

                        $date_format = '';
                        if ($item->warranty != null) {
                            $date_format = date_format(date_create($item->warranty), 'd - M  Y');
                        }

                        ?>

                        {{ $date_format }}
                    </td>


                    <td class="item-amount-width"><i data-set-currency-class="true"></i> <span
                            class="item-amount">{{ number_format($item->total) }}</span></td>



                </tr>




            @endif
        @endforeach
    </tbody>
</table>
