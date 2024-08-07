<div class="modal fade" tabindex="-1" role="dialog" id="showModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.predefined_reply.predefined_reply_details')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row details-page">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('name',__('messages.predefined_reply.reply_name').':')); ?><br>
                        <span id="showReplyName"></span>
                    </div>
                    <div class="form-group col-sm-12 faqs-description">
                        <?php echo e(Form::label('body',__('messages.predefined_reply.body').':')); ?><br>
                        <span id="showBody"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/predefined_replies/show_modal.blade.php ENDPATH**/ ?>