<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.estimate.estimate_details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/sales/view-as-customer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/estimates/estimates.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header item-align-right">
            <h1><?php echo e(__('messages.estimate.estimate_details')); ?></h1>
            <div class="section-header-breadcrumb float-right">
                <?php if($estimate->status !== \App\Models\Estimate::STATUS_DECLINED && $estimate->status !== \App\Models\Estimate::STATUS_EXPIRED): ?>
                    <a href="<?php echo e(route('estimates.edit', ['estimate' => $estimate->id])); ?>"
                       class="btn btn-warning mr-2 form-btn"><?php echo e(__('messages.common.edit')); ?></a>
                <?php endif; ?>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary form-btn"><?php echo e(__('messages.common.back')); ?></a>
            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-body">
                    <?php echo $__env->make('estimates.show_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('tasks.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/custom-datatable.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/select2.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        let estimateId = "<?php echo e($estimate->id); ?>";
        let invoiceUrl = "<?php echo e(route('invoices.index')); ?>";
        let taskUrl = "<?php echo e(route('tasks.index')); ?>";
        let statusArray = JSON.parse('<?php echo json_encode($status, 15, 512) ?>');
        let priorities = JSON.parse('<?php echo json_encode($priorities, 15, 512) ?>');
        let ownerId = "<?php echo e($estimate->id); ?>";
        let ownerType = 'App\\Models\\Estimate';
        let memberUrl = "<?php echo e(route('members.index')); ?>";
    </script>
    <script src="<?php echo e(mix('assets/js/tasks/tasks.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/estimates/show-page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/estimates/show.blade.php ENDPATH**/ ?>