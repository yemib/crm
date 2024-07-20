<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.service.edit_service') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['id' => 'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('serviceId',null,['id'=>'serviceId']) }}


<div >
    <div class="alert alert-danger d-none" id="validationErrorsBox"></div>


    <div class="row">
        <div class="form-group col-sm-6">
            {{ Form::label('installation_date', 'Date Of Installation') }}


            <input  id="editinstallation_date" class="form-control" name="installation_date" placeholder="Date Of Installation"
                type="date" />

        </div>

        <div class="form-group col-sm-6">
            {{ Form::label('serial_noedit', 'Serial No') }}
            {{ Form::text('serial_no', null, [
                'id'=>'serial_noedit',
                'class' => 'form-control',
                'autocomplete' => 'off',
                'placeholder' => 'Serial No',
            ]) }}
        </div>
    </div>



    <div class="row">
        <div class="form-group  col-sm-6">
            {{ Form::label('customer', 'Select Customer') }}
            <select   class="form-control" name="customer">
                <option  id="editcustomer"></option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group  col-sm-6">
            {{ Form::label('groups', 'Customer Group') }}
            <select id="groupselect" class="form-control" name="group">
                <option  id="groupedit1"></option>
                @foreach ($customergroups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>

    </div>




</div>





    <div class="row">
        <div class="form-group col-sm-6">


            {{ Form::label('country', 'Region' . ':') }}

            <select id="country" class="form-control" name="country">
                <option id="regionedit"></option>
                @foreach ($data['countries'] as $country)
                    <option>{{ $country->name }}</option>
                @endforeach


            </select>

        </div>


        <div class="form-group col-sm-6">
            <label for="locality">Locality:</label>


            <select name="locality" id="editlocal" class="form-control">
            <option id="editlocality"></option>
                @if (isset($data['billingAddress']) && $data['billingAddress']['locality'] != null)
                    <option>{{ $data['billingAddress']['locality'] }}</option>
                @endif

            </select>

        </div>
    </div>



                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
