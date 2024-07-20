<div id="addPaymentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.payment.new_payment')); ?></h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <?php echo e(Form::open(['id' => 'addNewPaymentForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <?php echo e(Form::hidden('owner_id', null, ['id' => 'paymentOwnerId'])); ?>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('amount_received', __('messages.payment.amount_received').':')); ?><span
                                class="required">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="<?php echo e(getCurrencyClass()); ?>"></i>
                                </div>
                            </div>
                            <?php echo e(Form::text('amount_received', null, ['class' => 'form-control price-input', 'required', 'id' => 'paymentAmount'])); ?>

                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('payment_date', __('messages.payment.payment_date').':')); ?><span
                                class="required">*</span>
                        <?php echo e(Form::text('payment_date', null, ['class' => 'form-control', 'required', 'id' => 'paymentDate'])); ?>

                    </div>
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('payment_mode', __('messages.payment.payment_mode').':')); ?><span
                                class="required">*</span>
                        <?php echo e(Form::select('payment_mode', $paymentModes, null, ['class' => 'form-control', 'required', 'id' => 'paymentMode', 'placeholder' => __('messages.placeholder.select_payment_mode')])); ?>

                    </div>
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('transaction_id', __('messages.payment.transaction_id').':')); ?>

                        <?php echo e(Form::text('transaction_id', null, ['class' => 'form-control', 'minLength' => '12', 'maxLength' => '18'])); ?>

                    </div>
                    <div class="form-group col-sm-12 mb-2">
                        <?php echo e(Form::label('note', __('messages.payment.note').':')); ?>

                        <?php echo e(Form::textarea('note', null, ['class' => 'form-control summernote-simple', 'id' => 'note'])); ?>

                    </div>
                    <div class="form-group col-sm-12 mb-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"
                                   id="customCheck"
                                   name="send_mail_to_customer_contacts" value="1">
                            <label class="custom-control-label"
                                   for="customCheck"><?php echo e(__('messages.payment.send_mail_to_customer_contacts')); ?></label>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-2">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnPaymentSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnPaymentCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?></button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH G:\websites\crm\crm\resources\views/payments/add_modal.blade.php ENDPATH**/ ?>