<div class="modal fade" tabindex="-1" role="dialog" id="editCountryModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.country.edit_country')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo e(Form::open(['id' => 'editForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                <?php echo e(Form::hidden('countryId',null,['id'=>'countryId'])); ?>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('name',__('messages.country.name').':')); ?><span class="required">*</span>
                        <?php echo e(Form::text('name', null, ['class' => 'form-control','required','id' => 'editName','autocomplete' => 'off','placeholder'=>__('messages.country.name')])); ?>

                    </div>
                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?>

                    </button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/countries/edit_modal.blade.php ENDPATH**/ ?>