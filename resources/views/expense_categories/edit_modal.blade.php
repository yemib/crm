<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.expense_category.edit_category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['id' => 'editForm']) }}
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('categoryId', null, ['id'=>'categoryId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name', __('messages.common.name').':') }}<span class="required">*</span>
                        {{ Form::text('name', null, ['class' => 'form-control', 'required', 'id' => 'editName','autocomplete' => 'off','placeholder'=>__('messages.common.name')]) }}
                    </div>

                    <div class="form-group col-sm-12 mb-0">
                        {{ Form::label('description', __('messages.common.description').':') }}
                        {{ Form::textarea('description', null, ['class' => 'form-control summernote-simple', 'id' => 'editDescription']) }}
                    </div>


                    <div class="form-group col-sm-12 mb-0">
                        {{ Form::label('term', 'Terms and Condition:') }}
                        {{ Form::textarea('term', null, ['class' => 'form-control summernote-simple', 'id' => 'editterms']) }}
                    </div>




                        <br/>



                        @foreach ($fields as $key => $field)
                        <div class="form-group col-sm-12 mb-0">
                            <label> {{ $field->reply_name }} </label>
                            <input type="hidden" value="{{ $field->reply_name }}" name="predefined_label[]" />
                            <input  id="predefined_value{{ $key }}" placeholder="{{ $field->reply_name }}" name="predefined_value[]" value=""
                                class="form-control predefined_value" />
                        </div>
                        @endforeach









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
