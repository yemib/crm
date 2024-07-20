<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.tickets')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(mix('assets/css/tickets/tickets.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header ticket-sec-mbl-hdr">
            <h1><?php echo e(__('messages.tickets')); ?></h1>
            <div class="section-header-breadcrumb float-right">
                <div class="mr-3 ipad-margin-left">
                    <?php echo e(Form::select('status', $statusArr, null, ['id' => 'ticketStatus', 'class' => 'form-control', 'placeholder' => __('messages.placeholder.select_status')])); ?>

                </div>
            </div>
            <div class="float-right mr-3">
                <?php echo e(Form::select('priority', $ticketPriorityArr, null, ['class' => 'form-control', 'id' => 'ticketPriorityId', 'placeholder' => __('messages.placeholder.select_ticket_priority')])); ?>

            </div>
            <div class="float-right d-flex">
                <a href="<?php echo e(route('tickets.kanbanList')); ?>"
                   class="btn btn-warning form-btn mr-2 text-nowrap"><?php echo e(__('messages.kanban_view')); ?>

                </a>
                <a href="<?php echo e(route('ticket.create')); ?>"
                   class="btn btn-primary form-btn text-nowrap"><?php echo e(__('messages.common.add')); ?>

                    <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-body">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('tickets')->html();
} elseif ($_instance->childHasBeenRendered('TMHpuMS')) {
    $componentId = $_instance->getRenderedChildComponentId('TMHpuMS');
    $componentTag = $_instance->getRenderedChildComponentTagName('TMHpuMS');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TMHpuMS');
} else {
    $response = \Livewire\Livewire::mount('tickets');
    $html = $response->html();
    $_instance->logRenderedChild('TMHpuMS', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
        let downloadAttachmentUrl = "<?php echo e(url('admin/tickets-attachment-download')); ?>";
    </script>
    <script src="<?php echo e(mix('assets/js/status-counts/status-counts.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/tickets/tickets.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/tickets/index.blade.php ENDPATH**/ ?>