<div id="addCommonPaymentModeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tagHeader"><?php echo e(__('messages.payment_mode.new_payment_mode')); ?></h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <?php echo e(Form::open(['id' => 'addCommonPaymentModeForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('name', __('messages.common.name').':')); ?><span class="required">*</span>
                        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required','autocomplete' => 'off','placeholder'=> __('messages.common.name')])); ?>

                    </div>
                    <input type="hidden" name="active" value="1">
                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnSave', 'data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?></button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/payment_modes/common_payment_mode.blade.php ENDPATH**/ ?>