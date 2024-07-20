<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.members')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header m-section item-align-right">

            <h1><?php echo e(__('messages.members')); ?></h1>
            <div class="section-header-breadcrumb float-right">
                <div class="card-header-action mr-3 select2-mobile-margin">
                    <?php echo e(Form::select('is_enable',$memberStatus, 2 ,['id' => 'memberStatus','class' => 'form-control','placeholder'=> __('messages.placeholder.select_status')])); ?>

                </div>
            </div>
            <div class="float-right">
                <a href="<?php echo e(route('members.create')); ?>"
                   class="btn btn-primary form-btn"><?php echo e(__('messages.member.add')); ?> <i
                            class="fas fa-plus"></i></a>
            </div>
        </div>
        <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="section-body">
            <div class="card">
                <div class="card-body">

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('members')->html();
} elseif ($_instance->childHasBeenRendered('cLHoYdM')) {
    $componentId = $_instance->getRenderedChildComponentId('cLHoYdM');
    $componentTag = $_instance->getRenderedChildComponentTagName('cLHoYdM');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('cLHoYdM');
} else {
    $response = \Livewire\Livewire::mount('members');
    $html = $response->html();
    $_instance->logRenderedChild('cLHoYdM', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    <script>
        let getLoginUserId = "<?php echo e(getLoggedInUserId()); ?>";
    </script>
    <script src="<?php echo e(mix('assets/js/members/member.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/members/index.blade.php ENDPATH**/ ?>