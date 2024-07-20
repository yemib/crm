<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.reminder.new_reminder')); ?></h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <?php echo e(Form::open(['id'=>'addNewForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <input type="hidden" name="module_id" value="<?php echo e($data['moduleId']); ?>" id="moduleId">
                <input type="hidden" name="owner_id" value="<?php echo e($data['ownerId']); ?>" id="ownerId">
                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('notified_date',__('messages.reminder.notified_date').':',['class' => 'mb-0'])); ?>

                        <span
                                class="required">*</span><br>
                        <span class="reminder-note-text"><b><?php echo e(__('messages.reminder.note').':'); ?></b> <?php echo e(__('messages.reminder.note_text')); ?></span>
                        <?php echo e(Form::text('notified_date', null, ['class' => 'form-control notified-date','autocomplete' => 'off','required','placeholder'=>__('messages.reminder.notified_date'),'data-name' => 'notified-date'])); ?>

                    </div>
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('reminder_to', __('messages.reminder.reminder_to').':')); ?><span
                                class="required">*</span>
                        <?php echo e(Form::select('reminder_to', $data['reminderTo'],null, ['id'=>'reminderTo','class' => 'form-control select2Selector','required'])); ?>

                    </div>

                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('description',__('messages.reminder.description').':')); ?><span
                                class="required">*</span>
                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control summernote-simple', 'id' => 'reminderDescription'])); ?>

                    </div>
                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnCreateSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?></button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/reminders/add_modal.blade.php ENDPATH**/ ?>