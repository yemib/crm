<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.predefined_reply.new_predefined_reply')); ?></h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <?php echo e(Form::open(['id'=>'addNewForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('reply_name',__('messages.predefined_reply.reply_name').':')); ?><span
                                class="required">*</span>
                        <?php echo e(Form::text('reply_name', null, ['class' => 'form-control','required','autocomplete' => 'off','placeholder'=>__('messages.predefined_reply.reply_name')])); ?>

                    </div>
                    <div class="form-group col-sm-12 mb-0">
                        <?php echo e(Form::label('body',__('messages.predefined_reply.body').':')); ?>

                        <?php echo e(Form::textarea('body', null, ['class' => 'form-control summernote-simple','id' => 'createBody'])); ?>

                    </div>
                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?></button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/predefined_replies/add_modal.blade.php ENDPATH**/ ?>