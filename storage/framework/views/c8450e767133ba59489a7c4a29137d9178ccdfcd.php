<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.payment_mode.edit_payment_mode')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo e(Form::open(['id' => 'editForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                <?php echo e(Form::hidden('paymentModeId', null, ['id' => 'paymentModeId'])); ?>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('name', __('messages.common.name').':')); ?><span class="required">*</span>
                        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required', 'id' => 'editName','autocomplete' => 'off','placeholder'=>__('messages.common.name')])); ?>

                    </div>
                    <div class="form-group col-sm-12 mb-0">
                        <?php echo e(Form::label('description', __('messages.payment_mode.bank_accounts').'/'.__('messages.common.description').':')); ?>

                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control summernote-simple', 'id' => 'editDescription'])); ?>

                    </div>
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('editActive',__('messages.common.status').':')); ?><br>
                        <label class="custom-switch pl-0">
                            <input type="checkbox" name="active" value="1" class="custom-switch-input" id="editActive">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit', 'class' => 'btn btn-primary', 'id' => 'btnEditSave', 'data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?>

                    </button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/payment_modes/edit_modal.blade.php ENDPATH**/ ?>