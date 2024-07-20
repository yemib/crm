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
            <h1><?php if(isset($title)): ?> <?php echo e($title); ?>   <?php endif; ?> Projects</h1>
            <div class="section-header-breadcrumb float-right">
                <div class="card-header-action mr-3 select2-mobile-margin">
                  
                </div>
            </div>
            <div class="float-right">
               

            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-body">


                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('installation'  ,  ['status' => $status])->html();
} elseif ($_instance->childHasBeenRendered('T5SOOPY')) {
    $componentId = $_instance->getRenderedChildComponentId('T5SOOPY');
    $componentTag = $_instance->getRenderedChildComponentTagName('T5SOOPY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('T5SOOPY');
} else {
    $response = \Livewire\Livewire::mount('installation'  ,  ['status' => $status]);
    $html = $response->html();
    $_instance->logRenderedChild('T5SOOPY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>



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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/installation/index.blade.php ENDPATH**/ ?>