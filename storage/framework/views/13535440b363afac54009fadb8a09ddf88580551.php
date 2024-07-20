<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.customer.customers')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/customers/customers.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.customer.customers')); ?></h1>
            <div class="section-header-breadcrumb">
                <a href="<?php echo e(route('customers.create')); ?>"
                   class="btn btn-primary form-btn float-right-mobile"><?php echo e(__('messages.common.add')); ?>

                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-body">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('customers')->html();
} elseif ($_instance->childHasBeenRendered('n4VU93R')) {
    $componentId = $_instance->getRenderedChildComponentId('n4VU93R');
    $componentTag = $_instance->getRenderedChildComponentTagName('n4VU93R');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('n4VU93R');
} else {
    $response = \Livewire\Livewire::mount('customers');
    $html = $response->html();
    $_instance->logRenderedChild('n4VU93R', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('vendor/livewire/livewire.js')); ?>"></script>
    <?php echo $__env->make('livewire.livewire-turbo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(mix('assets/js/customers/customers.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/customers/index.blade.php ENDPATH**/ ?>