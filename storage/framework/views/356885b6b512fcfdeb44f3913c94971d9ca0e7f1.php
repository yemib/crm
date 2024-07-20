<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('messages.products.edit_product')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo e(Form::open(['id' => 'editForm'])); ?>

            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                <?php echo e(Form::hidden('product_id', null, ['id'=>'productId'])); ?>

                <div class="row">

                    <div class="form-group col-sm-12">

                    <label>  Title </label>    <span class="required">*</span>

                    <input  class="form-control"  id="editTitle"  name="title"     />

                    </div>


                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('product_code','Product Code  :')); ?><span class="required">*</span>

                        <?php echo e(Form::text('product_code', null, ['class' => 'form-control', 'required', 'id' => 'editProductCode','autocomplete' => 'off','placeholder'=> 'Product Code'])); ?>

                    </div>

                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('brand', 'Brand')); ?>

                        <?php echo e(Form::text('brand', null, ['class' => 'form-control', 'id' => 'editBrand' ,'autocomplete' => 'off','placeholder'=>'Brand'])); ?>

                    </div>


                    <div class="form-group col-sm-12 mb-0">
                        <?php echo e(Form::label('description', 'Description :')); ?>

                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control textarea-sizing', 'id' => 'editProductDescription'])); ?>

                    </div>



                    <div class="form-group col-sm-12 col-lg-12 col-md-12">
                        <?php echo e(Form::label('product_group ', __('messages.products.product_group').':')); ?><span
                                class="required">*</span>
                        <div class="input-group">
                            <?php echo e(Form::select('item_group_id', $data['itemGroups'], null, ['class' => 'form-control', 'required', 'id' => 'editProductGroup','placeholder' => __('messages.placeholder.select_product_group')])); ?>

                            <div class="input-group-append plus-icon-height">
                                <div class="input-group-text">
                                    <a href="#" data-toggle="modal" data-target="#editProductGroupModal"><i
                                                class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-sm-12 col-lg-6 col-md-12">
                        <?php echo e(Form::label('rate ', __('messages.products.rate').':')); ?><span class="required">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="<?php echo e(getCurrencyClass()); ?>"></i>
                                </div>
                            </div>
                            <?php echo e(Form::text('rate', null, ['class' => 'form-control price-input', 'required', 'id' => 'editRate','autocomplete' => 'off','placeholder'=>__('messages.products.rate')])); ?>

                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-lg-6 col-md-12">
                        <?php echo e(Form::label('tax_1 ', __('messages.products.tax').' 1:')); ?>

                        <?php echo e(Form::select('tax_1_id', $data['taxes'], null, ['class' => 'form-control', 'id' => 'editTaxSelectOne','placeholder' => __('messages.placeholder.select_tax1')])); ?>

                    </div>

                    <div class="form-group col-sm-12 col-lg-6 col-md-12">
                        <?php echo e(Form::label('tax_2 ', __('messages.products.tax').' 2:')); ?>

                        <?php echo e(Form::select('tax_2_id', $data['taxes'], null, ['class' => 'form-control', 'id' => 'editTaxSelectTwo','placeholder' => __('messages.placeholder.select_tax2')])); ?>

                    </div>

                    <div class="form-group col-sm-12 col-lg-6 col-md-12">

                        <?php echo e(Form::label('Stock', 'Stock')); ?>

                       <input    id="editStock"  name="stock"  type="number"    value="" class="form-control"/>
                    </div>



                 


                    <div class="form-group col-sm-12 col-lg-6 col-md-12">

                        <?php echo e(Form::label('sub_category1', 'Sub Cateogory 1')); ?>

                       <input   id="editSubCategory1" name="subcategory1"    class="form-control"/>
                    </div>



                    <div class="form-group col-sm-12 col-lg-6 col-md-12">

                        <?php echo e(Form::label('subcategory2', 'Sub Cateogory 2')); ?>

                       <input   id="editSubCategory2"  name="subcategory2"    class="form-control"/>
                    </div>


                    <div  id="warranty_con" class="form-group col-sm-12 col-lg-6 col-md-12">

                        <label>  Warranty Period  </label>

                        <?php echo $__env->make('invoices.warranty_period', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    </div>



                </div>
                <div class="text-right">
                    <?php echo e(Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnEditSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.common.cancel')); ?>

                    </button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/products/edit_modal.blade.php ENDPATH**/ ?>