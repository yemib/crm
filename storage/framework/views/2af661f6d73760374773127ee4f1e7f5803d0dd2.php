<div class="modal fade" role="dialog" id="editTicketReplyModal" style="opacity: 1; z-index: 9999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.ticket.edit_reply')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo e(Form::open(['id' => 'ticketReplyUpdateForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                <?php echo e(Form::hidden('ticket_reply_id',null,['id'=>'ticketReplyID'])); ?>

                <div class="row">
                    <div class="form-group col-sm-12 mb-0">
                        <?php echo e(Form::label('reply',__('messages.ticket.reply').':')); ?>

                        <?php echo e(Form::textarea('reply', null, ['class' => 'form-control edit-reply','id' => 'editReplyID'])); ?>

                    </div>
                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditReplySave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?>

                    </button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/ticket_replies/edit_reply_modal.blade.php ENDPATH**/ ?>