<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.countries')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/countries/country.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.countries')); ?></h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn addCountryModal float-right-mobile" data-toggle="modal"
                   data-target="#addModal"><?php echo e(__('messages.country.add')); ?> <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('countries')->html();
} elseif ($_instance->childHasBeenRendered('bqEPdD1')) {
    $componentId = $_instance->getRenderedChildComponentId('bqEPdD1');
    $componentTag = $_instance->getRenderedChildComponentTagName('bqEPdD1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bqEPdD1');
} else {
    $response = \Livewire\Livewire::mount('countries');
    $html = $response->html();
    $_instance->logRenderedChild('bqEPdD1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('countries.add_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('countries.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('vendor/livewire/livewire.js')); ?>"></script>
    <?php echo $__env->make('livewire.livewire-turbo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(mix('assets/js/countries/country.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/countries/index.blade.php ENDPATH**/ ?>