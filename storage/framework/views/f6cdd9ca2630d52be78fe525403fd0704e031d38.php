<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.reminder.edit_reminder')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo e(Form::open(['id' => 'editForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                <?php echo e(Form::hidden('reminderId',null,['id'=>'reminderId'])); ?>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('notified_date',__('messages.reminder.notified_date').':',['class' =>'mb-0'])); ?>

                        <span
                                class="required">*</span>
                        <span class="reminder-note-text"><b><?php echo e(__('messages.reminder.note').':'); ?></b> <?php echo e(__('messages.reminder.note_text')); ?></span>
                        <?php echo e(Form::text('notified_date', null, ['class' => 'form-control edit-notified-date','id' => 'editNotifiedDate','required','autocomplete' => 'off','placeholder'=>__('messages.reminder.notified_date'),'data-name' => 'notified-date'])); ?>

                    </div>
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('reminder_to', __('messages.reminder.reminder_to').':')); ?><span
                                class="required">*</span>
                        <?php echo e(Form::select('reminder_to', $data['reminderTo'],null, ['id'=>'editReminderTo','class' => 'form-control select2Selector','placeholder' => __('messages.placeholder.select_reminder_to'),'required'])); ?>

                    </div>
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('description',__('messages.reminder.description').':')); ?><span
                                class="required">*</span>
                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control summernote-simple','id' => 'editReminderDescription'])); ?>

                    </div>
                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?>

                    </button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH G:\websites\crm\crm\resources\views/reminders/edit_modal.blade.php ENDPATH**/ ?>