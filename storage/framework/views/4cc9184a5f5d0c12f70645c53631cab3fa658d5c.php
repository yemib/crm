<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.products.products')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header item-align-right">
            <h1><?php echo e(__('messages.products.products')); ?></h1>
            <div class="section-header-breadcrumb float-right">
                <div class="card-header-action mr-3 select2-mobile-margin">
                    <?php echo e(Form::select('group', $data['itemGroups'], null, ['id' => 'filter_group', 'class' => 'form-control', 'placeholder' => __('messages.placeholder.select_product_group')])); ?>

                </div>
            </div>
            <div class="float-right">
                <a href="#" class="btn btn-primary form-btn" data-toggle="modal"
                   data-target="#addModal"><?php echo e(__('messages.common.add')); ?> <i class="fas fa-plus"></i></a>

                   <a href="#" class="btn btn-primary form-btn" data-toggle="modal"
                   data-target="#excelModal">Bulk Upload <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body"  style="overflow:auto">
                    <?php echo $__env->make('products.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('products.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('products.add_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('products.excel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('products.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('products.product_group_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('products.edit_product_group_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/custom-datatable.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/bs4-summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/select2.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(mix('assets/js/custom/input-price-format.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/products/products.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/products/index.blade.php ENDPATH**/ ?>