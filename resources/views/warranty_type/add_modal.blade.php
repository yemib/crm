<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Warranty Period </h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id' => 'addNewForm']) }}

            {{ csrf_field() }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('number', 'Period :') }}<span class="required">*</span>
                        <div  class="input-group">


                        <input required  class="form-control"   type="number"   name="number"   placeholder="Period"      />
                        <div class="input-group-prepend">
                            <div  class="input-group-text"> Year(s) </div>
                        </div>

                    </div>


                    </div>



                    <div  style="display: none" class="form-group col-sm-12">
                        <label> Type :</label>
                       <span class="required">*</span>
                        <select   id="type" name="type"  class="form-control">
                        <option   value="Year">Year</option>
                        <option  value="Years">Years</option>
                        </select>

                    </div>









                </div>
                <div class="text-right mt-3">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary', 'id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
