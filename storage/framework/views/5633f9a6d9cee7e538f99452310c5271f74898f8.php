<div id="changeLanguageModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content left-margin">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.user.change_language')); ?></h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
                <?php echo e(csrf_field()); ?>

            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="changeLanguageValidationErrorsBox"></div>
                <?php echo e(Form::open(['id' => 'changeLanguageForm'])); ?>

                <div class="row">
                    <div class="form-group col-12">
                        <?php echo e(Form::label('default_language',__('messages.user.language') .':')); ?><span
                                class="required">*</span>
                        <?php echo e(Form::select('default_language',getLanguages(),getLoggedInUser()->default_language,['id' => 'defaultLanguage', 'class' => 'form-control','required'])); ?>

                    </div>
                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'),['type' => 'submit','class' => 'btn btn-primary mr-2', 'id' => 'btnLanguageChange', 
'data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing ..."])); ?>

                    <button type="button" class="btn btn-light left-margin"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?> </button>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/user_profile/change_language_modal.blade.php ENDPATH**/ ?>