
<div >
    <div class="alert alert-danger d-none" id="validationErrorsBox"></div>




    <div class="row">
        <div class="form-group col-sm-6">
            {{ Form::label('product', 'Select Product' . ':') }}
            <select class="form-control" name="product">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group col-sm-6">
            {{ Form::label('quantity', 'Quantity' ) }}
           <input id="quantity" class="form-control"
            name="quantity" placeholder="Quantity"  />
        </div>
    </div>


    <div class="row">
        <div class="form-group  col-sm-12">
            {{ Form::label('description', 'Description') }}

            <textarea  name="description"
             class="form-control"></textarea>

        </div>


    </div>
    <div class="row">
        <div class="form-group  col-sm-12">
            {{ Form::label('duration', 'Duration') }}

          <input id="duration"  placeholder="Duration" name="duration"  class="form-control"  />

        </div>
    <input   type="hidden"   name="warranty_id"  value="{{ $_GET['id']}}" />

    </div>




</div>
