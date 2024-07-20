<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.payment_modes')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/payment_modes/payment-modes.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.payment_modes')); ?></h1>
            <div class="section-header-breadcrumb float-right">
                <div class="card-header-action mr-3 select2-mobile-margin">
                    <?php echo e(Form::select('active', $activePaymentMode, null, ['id' => 'filterActivePaymentMode', 'class' => 'form-control','placeholder' => __('messages.placeholder.select_status')])); ?>

                </div>
            </div>
            <div class="float-right">
                <a href="#" class="btn btn-primary form-btn" data-toggle="modal"
                   data-target="#addModal"><?php echo e(__('messages.common.add')); ?> <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('payment-modes')->html();
} elseif ($_instance->childHasBeenRendered('8fCxjwX')) {
    $componentId = $_instance->getRenderedChildComponentId('8fCxjwX');
    $componentTag = $_instance->getRenderedChildComponentTagName('8fCxjwX');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8fCxjwX');
} else {
    $response = \Livewire\Livewire::mount('payment-modes');
    $html = $response->html();
    $_instance->logRenderedChild('8fCxjwX', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('payment_modes.add_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('payment_modes.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('payment_modes.show_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(mix('assets/js/bs4-summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('vendor/livewire/livewire.js')); ?>"></script>
    <?php echo $__env->make('livewire.livewire-turbo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(mix('assets/js/payment-modes/payment-modes.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/payment_modes/index.blade.php ENDPATH**/ ?>