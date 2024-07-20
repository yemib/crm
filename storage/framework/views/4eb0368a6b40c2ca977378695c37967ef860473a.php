<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.member.edit_member')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/int-tel/css/intlTelInput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.member.edit_member')); ?></h1>
            <div class="section-header-breadcrumb">
                <a href="<?php echo e(route('members.index')); ?>"
                   class="btn btn-primary form-btn float-right-mobile"><?php echo e(__('messages.common.back')); ?></a>
            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-body">
                    <?php echo e(Form::model($member, ['route' => ['members.update', $member->id], 'method' => 'put','id' => 'editMember','files' => 'true'])); ?>


                    <?php echo $__env->make('members.edit_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/int-tel/js/intlTelInput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/int-tel/js/utils.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        let utilsScript = "<?php echo e(asset('assets/js/int-tel/js/utils.min.js')); ?>";
        let phoneNo = "<?php echo e(old('prefix_code').old('phone')); ?>";
        let isEdit = true;
    </script>
    <script src="<?php echo e(mix('assets/js/custom/phone-number-country-code.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/members/create-edit.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/members/edit.blade.php ENDPATH**/ ?>