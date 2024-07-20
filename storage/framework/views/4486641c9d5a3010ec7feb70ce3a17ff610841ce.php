<div id="addCountryModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.country.new_country')); ?></h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <?php echo e(Form::open(['id'=>'addNewForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('name',__('messages.country.name').':')); ?><span class="required">*</span>
                        <?php echo e(Form::text('name', null, ['class' => 'form-control','required','autocomplete' => 'off','placeholder'=>__('messages.country.name')])); ?>

                    </div>
                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?></button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/countries/add_modal.blade.php ENDPATH**/ ?>