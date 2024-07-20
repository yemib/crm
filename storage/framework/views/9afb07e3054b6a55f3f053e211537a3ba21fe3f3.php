<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.product_groups')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.product_groups')); ?></h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn float-right-mobile" data-toggle="modal"
                   data-target="#addModal"><?php echo e(__('messages.common.add')); ?> <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <?php echo $__env->make('product_groups.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('product_groups.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('product_groups.add_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('product_groups.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/custom-datatable.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/bs4-summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(mix('assets/js/product-groups/product-groups.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/product_groups/index.blade.php ENDPATH**/ ?>