<div id="addModal" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.service.new_service') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id' => 'addNewForm']) }}
                    <div class="modal-body">

                        @include('warranty.field')




    <div class="row">
        <div class="form-group col-sm-6">


            {{ Form::label('country', 'Region' . ':') }}

            <select id="billingCountryId" class="form-control" name="country">
                <option>Select Region</option>
                @foreach ($data['countries'] as $country)
                    <option>{{ $country->name }}</option>
                @endforeach


            </select>

        </div>


        <div class="form-group col-sm-6">
            <label for="locality">Locality:</label>


            <select name="locality" id="locality" class="form-control">

                @if (isset($data['billingAddress']) && $data['billingAddress']['locality'] != null)
                    <option>{{ $data['billingAddress']['locality'] }}</option>
                @endif

            </select>

        </div>
    </div>


                        <div class="text-right">
                            {{ Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnSave', 'data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                            <button type="button" id="btnCancel" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                        </div>


                    </div>

            {{ Form::close() }}
        </div>
    </div>

</div>
