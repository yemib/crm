<div id="instantmessage" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reminder Message</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewMessage']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('subject',__('messages.announcement.subject').':') }}<span
                                class="required">*</span>
                        {{ Form::text('subject', null, ['class' => 'form-control','required','autocomplete' => 'off','placeholder'=>__('messages.announcement.subject')]) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('date','Reminder Date') }}<span
                                class="required">*</span>
                        {{ Form::text('date',null,['class' => 'form-control','id' => 'announcementDate','required','autocomplete' => 'off','placeholder'=>__('messages.announcement.announcement_date')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-0">
                        {{ Form::label('message',__('messages.announcement.message').':') }}
                        {{ Form::textarea('message', null, ['class' => 'form-control summernote-simple', 'id' => 'createMessage']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('showToClients','Active') }}<br>
                        <label class="custom-switch pl-0">
                            <input id="active_id" type="checkbox" name="active" value="1" class="custom-switch-input" checked>
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                </div>

                <input  name="message_id"  value="0"  type="hidden"   id="message_id" />
                <input name="job_id"  value="0"  type="hidden"   id="job_id" />
                <div class="text-right mt-4">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>


                {{ Form::close() }}
            </div>

        </div>
    </div>
</div>
