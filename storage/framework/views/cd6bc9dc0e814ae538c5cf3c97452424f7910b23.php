<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.member.member_details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header item-align-right">
            <h1><?php echo e(__('messages.member.member_details')); ?></h1>
            <div class="section-header-breadcrumb float-right">
                <a href="<?php echo e(route('members.edit', ['member' => $member->id])); ?>"
                   class="btn btn-warning mr-2 form-btn"><?php echo e(__('messages.common.edit')); ?>

                </a>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary form-btn"><?php echo e(__('messages.common.back')); ?>

                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <?php echo $__env->make('members.show_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        let member_id = "<?php echo e($member->id); ?>";
    </script>
    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/custom-datatable.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('page-scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/members/show.blade.php ENDPATH**/ ?>