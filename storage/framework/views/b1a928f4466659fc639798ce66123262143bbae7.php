<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.expense_category.edit_category')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo e(Form::open(['id' => 'editForm'])); ?>

            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                <?php echo e(Form::hidden('categoryId', null, ['id'=>'categoryId'])); ?>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('name', __('messages.common.name').':')); ?><span class="required">*</span>
                        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required', 'id' => 'editName','autocomplete' => 'off','placeholder'=>__('messages.common.name')])); ?>

                    </div>

                    <div class="form-group col-sm-12 mb-0">
                        <?php echo e(Form::label('description', __('messages.common.description').':')); ?>

                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control summernote-simple', 'id' => 'editDescription'])); ?>

                    </div>

                    
                    <div class="form-group col-sm-12 mb-0">
                        <?php echo e(Form::label('term', 'Terms and Condition:')); ?>

                        <?php echo e(Form::textarea('term', null, ['class' => 'form-control summernote-simple', 'id' => 'editterms'])); ?>

                    </div>



                </div>
                <div class="text-right mt-3">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary', 'id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?>

                    </button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH G:\websites\crm\crm\resources\views/expense_categories/edit_modal.blade.php ENDPATH**/ ?>