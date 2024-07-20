<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.predefined_replies')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/predefined_replay/predefined_replies.css')); ?>">
    <?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.predefined_replies')); ?></h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn addPredefinedReplyModal float-right-mobile"
                   data-toggle="modal"
                   data-target="#addModal"><?php echo e(__('messages.predefined_reply.add')); ?> <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('predefined-replies')->html();
} elseif ($_instance->childHasBeenRendered('gKZqcr4')) {
    $componentId = $_instance->getRenderedChildComponentId('gKZqcr4');
    $componentTag = $_instance->getRenderedChildComponentTagName('gKZqcr4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gKZqcr4');
} else {
    $response = \Livewire\Livewire::mount('predefined-replies');
    $html = $response->html();
    $_instance->logRenderedChild('gKZqcr4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('predefined_replies.add_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('predefined_replies.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('predefined_replies.show_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(mix('assets/js/bs4-summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('vendor/livewire/livewire.js')); ?>"></script>
    <?php echo $__env->make('livewire.livewire-turbo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(mix('assets/js/predefined-reply/predefined-reply.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/predefined_replies/index.blade.php ENDPATH**/ ?>