<style>

    td:has(input[name="description[]"]){
          /*   display: none; */
        }

    </style>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.estimate.new_estimate')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
    <link href="<?php echo e(asset('css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/estimates/estimates.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.estimate.new_estimate')); ?></h1>
            <div class="section-header-breadcrumb">
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary form-btn float-right-mobile">
                    <?php echo e(__('messages.common.back')); ?>

                </a>
            </div>
        </div>

        <div class="section-body">
            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <?php echo e(Form::open(['route' => 'estimates.store', 'validated' => false, 'id' => 'estimateForm'])); ?>

                <?php echo $__env->make('estimates.address_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('estimates.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </section>

    <?php
    $warranty_template   = @include('invoices.warranty_period') ;

 ?>

    <?php echo $__env->make('invoices.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('tags.common_tag_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/custom-datatable.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/bs4-summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/select2.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        let taxData = JSON.parse('<?php echo json_encode($data['taxes'], 15, 512) ?>');
        let productUrl = "<?php echo e(route('products.index')); ?>";
        let estimateUrl = "<?php echo e(route('estimates.index')); ?>";
        let isCreate = true;
        let createData = true;
        let createEstimateAddress = true;
        let customerURL = "<?php echo e(route('get.estimate.customer.address')); ?>";
        let editData = false;
        let tagSaveUrl = "<?php echo e(route('tags.store')); ?>";
    </script>
  <?php echo $__env->make('sales.sales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(mix('assets/js/custom/input-price-format.js')); ?>"></script>

    <?php echo $__env->make('estimates.estimate_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/estimates/create.blade.php ENDPATH**/ ?>