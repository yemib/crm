<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.customer.edit_customer')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/int-tel/css/intlTelInput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.customer.edit_customer')); ?></h1>
            <div class="section-header-breadcrumb">
                <a href="<?php echo e(url()->previous()); ?>"
                   class="btn btn-primary form-btn float-right-mobile"><?php echo e(__('messages.common.back')); ?></a>
            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-body">

                       <!--  place  the list of addresses  here fast kay  -->

                    <?php echo $__env->make('customers.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('customers.customer_group_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/int-tel/js/intlTelInput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/int-tel/js/utils.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        let utilsScript = "<?php echo e(asset('assets/js/int-tel/js/utils.min.js')); ?>"
        let phoneNo = "<?php echo e(old('prefix_code').old('phone')); ?>"
        let isEdit = true
        let localizeMessage = "<?php echo e(__('messages.placeholder.select_groups')); ?>"
    </script>
    <script src="<?php echo e(mix('assets/js/custom/phone-number-country-code.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/customers/create-edit.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/customers/edit.blade.php ENDPATH**/ ?>