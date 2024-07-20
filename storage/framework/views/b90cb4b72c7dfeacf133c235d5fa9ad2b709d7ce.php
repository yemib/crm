<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.expense_category.new_category')); ?></h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <?php echo e(Form::open(['id' => 'addNewForm'])); ?>


            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('name', __('messages.common.name').':')); ?><span class="required">*</span>
                        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required','autocomplete' => 'off','placeholder'=>__('messages.common.name')])); ?>

                    </div>


                    <div class="form-group col-sm-12 mb-0">
                        <?php echo e(Form::label('description', __('messages.common.description').':')); ?>

                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control summernote-simple', 'id' => 'createDescription'])); ?>

                    </div>






                    <div class="form-group col-sm-12 mb-0">
                        <?php echo e(Form::label('term', 'Terms and Condition:')); ?>

                        <?php echo e(Form::textarea('term', null, ['class' => 'form-control summernote-simple', 'id' => 'createterms'])); ?>

                    </div>

                    <br/>

                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group col-sm-12 mb-0">
                        <label> <?php echo e($field->reply_name); ?> </label>
                        <input type="hidden" value="<?php echo e($field->reply_name); ?>" name="predefined_label[]" />
                        <input placeholder="<?php echo e($field->reply_name); ?>" name="predefined_value[]" value=""
                            class="form-control" />
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <br/>
                    <br/>




                </div>
                <div class="text-right mt-3">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary', 'id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?></button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/expense_categories/add_modal.blade.php ENDPATH**/ ?>