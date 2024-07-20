<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.invoices')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/invoices/invoices.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.invoices')); ?></h1>
            <div class="section-header-breadcrumb float-right">
                <div class="card-header-action mr-3 select2-mobile-margin">
                    <?php echo e(Form::select('payment_status',$paymentStatuses,null,['id' => 'paymentStatus','class' => 'form-control','placeholder' => __('messages.placeholder.select_status')])); ?>

                </div>
            </div>
            <div class="float-right">
                <a href="<?php echo e(route('invoices.create')); ?>"
                   class="btn btn-primary form-btn"><?php echo e(__('messages.common.add')); ?>

                    <i class="fas fa-plus"></i></a>

            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($job)): ?>

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('invoices'  ,  ['job' => $job])->html();
} elseif ($_instance->childHasBeenRendered('5bS4Jpq')) {
    $componentId = $_instance->getRenderedChildComponentId('5bS4Jpq');
    $componentTag = $_instance->getRenderedChildComponentTagName('5bS4Jpq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5bS4Jpq');
} else {
    $response = \Livewire\Livewire::mount('invoices'  ,  ['job' => $job]);
    $html = $response->html();
    $_instance->logRenderedChild('5bS4Jpq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <?php else: ?>

                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('invoices' , ['job' => 0])->html();
} elseif ($_instance->childHasBeenRendered('x3MyhHJ')) {
    $componentId = $_instance->getRenderedChildComponentId('x3MyhHJ');
    $componentTag = $_instance->getRenderedChildComponentTagName('x3MyhHJ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('x3MyhHJ');
} else {
    $response = \Livewire\Livewire::mount('invoices' , ['job' => 0]);
    $html = $response->html();
    $_instance->logRenderedChild('x3MyhHJ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('invoices.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('vendor/livewire/livewire.js')); ?>"></script>
    <?php echo $__env->make('livewire.livewire-turbo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        let invoiceUrl = "<?php echo e(route('invoices.index')); ?>";
        let customerId = null;
    </script>
    <script src="<?php echo e(mix('assets/js/invoices/invoices-datatable.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/status-counts/status-counts.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/invoices/index.blade.php ENDPATH**/ ?>