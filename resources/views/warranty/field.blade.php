
<div >
    <div class="alert alert-danger d-none" id="validationErrorsBox"></div>


    <div class="row">
        <div class="form-group col-sm-6">
            {{ Form::label('installation_date', 'Date Of Installation') }}


            <input class="form-control" name="installation_date" placeholder="Date Of Installation"
                type="date" />

        </div>

        <div class="form-group col-sm-6">
            {{ Form::label('serial_no', 'Serial No') }}
            {{ Form::text('serial_no', null, [
                'class' => 'form-control',
                'autocomplete' => 'off',
                'placeholder' => 'Serial No',
            ]) }}
        </div>
    </div>
{{--
    <div class="row">
        <div class="form-group col-sm-12">
            {{ Form::label('product', 'Select Product' . ':') }}
            <select class="form-control" name="product">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                @endforeach
            </select>
        </div>
    </div> --}}


    <div class="row">
        <div class="form-group  col-sm-6">
            {{ Form::label('customer', 'Select Customer') }}
            <select class="form-control" name="customer">
                <option></option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group  col-sm-6">
            {{ Form::label('groups', 'Customer Group') }}
            <select class="form-control" name="group">
                <option></option>
                @foreach ($customergroups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>

    </div>




</div>
