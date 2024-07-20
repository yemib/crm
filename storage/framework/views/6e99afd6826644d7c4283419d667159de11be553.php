<div class="modal fade" tabindex="-1" role="dialog" id="changePasswordModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.user.change_password')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo e(Form::open(['id' => 'changePasswordForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                <?php echo e(Form::hidden('tagId',null,['id'=>'pfUserId'])); ?>

                <div class="form-group col-sm-12">
                    <?php echo e(Form::label('current password', __('messages.change_password.current_password').':')); ?><span
                            class="required">*</span>
                    <div class="input-group">
                        <input class="form-control input-group__addon" id="pfCurrentPassword" type="password"
                               name="password_current" required autocomplete="off" placeholder="<?php echo e(__('messages.change_password.current_password')); ?>">
                        <div class="input-group-append input-group__icon">
                            <span class="input-group-text changeType">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <?php echo e(Form::label('password', __('messages.change_password.new_password').':')); ?><span
                            class="required">*</span>
                    <div class="input-group">
                        <input class="form-control input-group__addon" id="pfNewPassword" type="password"
                               name="password" required autocomplete="off" placeholder="<?php echo e(__('messages.change_password.new_password')); ?>">
                        <div class="input-group-append input-group__icon">
                            <span class="input-group-text changeType">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <?php echo e(Form::label('password_confirmation', __('messages.change_password.confirm_password').':')); ?><span
                            class="required">*</span>
                    <div class="input-group">
                        <input class="form-control input-group__addon" id="pfNewConfirmPassword" type="password"
                               name="password_confirmation" required autocomplete="off" placeholder="<?php echo e(__('messages.change_password.confirm_password')); ?>">
                        <div class="input-group-append input-group__icon">
                            <span class="input-group-text changeType">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSavePassword','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?>

                    </button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/user_profile/change_password_modal.blade.php ENDPATH**/ ?>