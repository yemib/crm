<div id="excelModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Bulk Products         <a download=""  target="_blank"  href="/product_upload_sample.xlsx"  class="btn btn-sm btn-primary">Download Excel Sample </a></h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>


            <form  action="<?php echo e(route("products.import")); ?>" id="addNewExcel"  method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">


                <div class="form-group col-sm-12">



            </div>

                    <div class="form-group col-sm-12">

                    <label  class="btn btn-success"  for="file"> Select Excel file </label><span class="required">*</span>

                      <input  id="file" type="file"  name="file"  class="form-control"   require />


                    </div>







                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?></button>
                </div>


            </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/products/excel.blade.php ENDPATH**/ ?>