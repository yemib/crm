<table class="table table-responsive-sm table-responsive-md table-striped table-bordered">
    <thead>
        <tr>
            <th  style="width: 20%"  > Product Code &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; {{-- {{ __('messages.invoice.item') }} --}}<span class="required">*</span></th>
            <th    style="width: 15% ;">{{ __('messages.common.description') }} </th>
            <th class="small-column"><span class="qtyHeader">{{ __('messages.invoice.qty') }}</span><span
                    class="required">*</span></th>
            <th   style="white-space: nowrap;"   class="small-column">{{ __('messages.products.rate') }}(<i
                    data-set-currency-class="true"></i>)
                <span class="required">*</span>
            </th>
            <th   class="medium-column">{{ __('messages.products.tax') }}(<i class="fas fa-percentage"></i>)
            </th>

            <th   style="white-space: nowrap;" class="medium-column">Warranty Period
            </th>


            <th class="small-column">{{ __('messages.invoice.amount') }}<span class="required">*</span>
            </th>
            <th class="button-column"><a href="#" id="itemAddBtn"><i class="fas fa-plus"></i></a>
            </th>
        </tr>
    </thead>
    <tbody class="items-container">
        <tr>
            <td  > {{-- <input type="text" name="item[]" id="item" class="form-control item-name"
                    required placeholder="{{ __('messages.invoice.item') }}"> --}}

                <select onchange="extractdata($(this))" class="form-control" id="singleproduct" required>
                    <option>Select Product</option>
                    @foreach ($data['items'] as $key => $value)
                        <option value="{{ $key }}"> {{ $value }}</option>
                    @endforeach
                </select>

                <input type="hidden" name="item[]" class="form-control item-name" required
                    placeholder="{{ __('messages.estimate.item') }}">

            </td>
            <td  >
                <input name="description[]" class="form-control item-description"
                    placeholder="{{ __('messages.common.description') }}" />
            </td>
            <td><input type="text" name="quantity[]" id="quantity" class="form-control qty" required
                    min="0" placeholder="{{ __('messages.invoice.qty') }}">
            </td>
            <td><input type="text" name="rate[]" id="rate" class="form-control rate" required
                    placeholder="{{ __('messages.products.rate') }}"></td>



            <td class="">
                <select name="" class="form-control tax-rates" multiple>
                </select>
            </td>

            <td   class="warranty_period">


             <select  name="warranty_period[]"  class="form-control">
                <option value="">Select Warranty Period</option>
                <?php  $warranties =   App\Models\WarrantyType::get(); ?>
                @foreach ( $warranties as $warranty )
                <option   value="{{   $warranty->id  }}"> {{   $warranty->number }}   {{   $warranty->type }}</option>

                @endforeach

                </select>



            </td>

            <td class="item-amount-width"><i data-set-currency-class="true"></i> <span
                    class="item-amount">0</span></td>
            <td></td>
        </tr>
    </tbody>
</table>
