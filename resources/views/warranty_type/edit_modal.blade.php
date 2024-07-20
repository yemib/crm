<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Warranty Period</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['id' => 'editForm']) }}
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>


                <input  name="id"  value=""  type="hidden"  id="warrantyId"   />
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('number', 'Period :') }}<span class="required">*</span>

                        <div  class="input-group">
                        <input  id="edit_period"  class="form-control"   type="number"   name="number"   placeholder="Period"      />
                     <div  class="input-group-prepend">   <div  class="input-group-text">Year(s) </div> </div>

                    </div>

                    </div>

                    <div  style="display: none" class="form-group col-sm-12 mb-0">
                        <label> Type :</label>
                        <span class="required">*</span>
                         <select   id="edit_select_type" name="type"  class="form-control">
                         <option   value="Year">Year</option>
                         <option  value="Years">Years</option>
                         </select>

                    </div>





                </div>
                <div class="text-right mt-3">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary', 'id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
