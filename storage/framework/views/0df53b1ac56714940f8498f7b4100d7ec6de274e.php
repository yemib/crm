<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tagHeader"><?php echo e(__('messages.payment_mode.new_payment_mode')); ?></h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <?php echo e(Form::open(['id' => 'addNewForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('name', __('messages.common.name').':')); ?><span class="required">*</span>
                        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required','autocomplete' => 'off','placeholder'=> __('messages.common.name')])); ?>

                    </div>
                    <div class="form-group col-sm-12 mb-0">
                        <?php echo e(Form::label('description', __('messages.payment_mode.bank_accounts').'/'.__('messages.common.description').':')); ?>

                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control summernote-simple', 'id' => 'createDescription'])); ?>

                    </div>
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('active',__('messages.common.status').':')); ?><br>
                        <label class="custom-switch pl-0">
                            <input type="checkbox" name="active" value="1" class="custom-switch-input" id="active"
                                   checked="">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
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
<?php /**PATH C:\websites\crm\crm\resources\views/payment_modes/add_modal.blade.php ENDPATH**/ ?>