
<div >
    <div class="alert alert-danger d-none" id="validationErrorsBox"></div>


    <div class="row">
        <div class="form-group col-sm-6">
            {{ Form::label('installation_date', 'Date Of Installation') }}


            <input id="date_of_installation" class="form-control" name="installation_date" placeholder="Date Of Installation"
                type="date" />

        </div>




        <div class="form-group  col-sm-6">
            {{ Form::label('customer', 'Select Customer') }}
            <select id="" class="form-control" name="customer">
                <option id="customer"></option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->company_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group  col-sm-6">
            {{ Form::label('product', 'Products') }}
            <select  id="product" class="form-control" name="product">
                <option id="editproduct"></option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->title }}</option>
                @endforeach
            </select>
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





</div>


<div class="row">
    <div class="form-group col-sm-12">
        <div class="col-sm-12 col-form-label">
            <strong class="field-title">Location</strong>
        </div>

        <div class="col-sm-12 col-content" style="width:100%">

         <input  readonly   id="address"  class="form-control"  type=""    value=""   name="address"/>
        <div   id="in_map"  > </div>

        <div style="display: none">
         <input    id="user_lat_in"  class="form-control"  type=""   value="0"   name="user_lat_in"/>
         <input    id="user_log_in"  class="form-control"  type=""    value="0"   name="user_log_in"/>
                </div>
            <small class="form-text text-muted">
                <i class="fa fa-question-circle" aria-hidden="true"></i>In Location
            </small>
        </div>
    </div>




</div>

