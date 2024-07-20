<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.contact.estimates')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/clients/estimates/estimates.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.contact.estimates')); ?></h1>
            <div class="section-header-breadcrumb float-right">
                <div class="card-header-action mr-3 select2-mobile-margin">
                    <?php echo e(Form::select('status', $statusArr, null, ['id' => 'filterStatus', 'class' => 'form-control','placeholder' =>__('messages.placeholder.select_status')])); ?>

                </div>
            </div>
            <div class="float-right">
                <a href="<?php echo e(route('estimates.create')); ?>"
                   class="btn btn-primary form-btn"><?php echo e(__('messages.common.add')); ?>

                    <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-body">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('estimates')->html();
} elseif ($_instance->childHasBeenRendered('jVgahcH')) {
    $componentId = $_instance->getRenderedChildComponentId('jVgahcH');
    $componentTag = $_instance->getRenderedChildComponentTagName('jVgahcH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jVgahcH');
} else {
    $response = \Livewire\Livewire::mount('estimates');
    $html = $response->html();
    $_instance->logRenderedChild('jVgahcH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('vendor/livewire/livewire.js')); ?>"></script>
    <?php echo $__env->make('livewire.livewire-turbo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        let customerId = null;
    </script>
    <script src="<?php echo e(mix('assets/js/estimates/estimates-datatable.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/status-counts/status-counts.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/estimates/index.blade.php ENDPATH**/ ?>