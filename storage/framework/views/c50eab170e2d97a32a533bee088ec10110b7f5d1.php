<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.predefined_reply.edit_predefined_reply')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo e(Form::open(['id' => 'editForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                <?php echo e(Form::hidden('predefinedReplyId',null,['id'=>'predefinedReplyId'])); ?>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('reply_name',__('messages.predefined_reply.reply_name').':')); ?><span
                                class="required">*</span>
                        <?php echo e(Form::text('reply_name', null, ['class' => 'form-control','required','id' => 'editReplyName','autocomplete' => 'off','placeholder'=>__('messages.predefined_reply.reply_name')])); ?>

                    </div>
                    <div class="form-group col-sm-12 mb-0">
                        <?php echo e(Form::label('body',__('messages.predefined_reply.body').':')); ?>

                        <?php echo e(Form::textarea('body', null, ['class' => 'form-control summernote-simple','id' => 'editBody'])); ?>

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
<?php /**PATH C:\websites\crm\crm\resources\views/predefined_replies/edit_modal.blade.php ENDPATH**/ ?>