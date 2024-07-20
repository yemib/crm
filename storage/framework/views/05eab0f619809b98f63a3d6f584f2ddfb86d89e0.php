<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.invoice.invoice_details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/@fortawesome/fontawesome-free/css/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/sales/view-as-customer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/invoices/invoices.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header item-align-right">
            <h1><?php echo e(__('messages.invoice.invoice_details')); ?> (  <?php echo e(html_entity_decode($invoice->title)); ?> )</h1>
            <div class="section-header-breadcrumb float-right">
                <?php if($invoice->payment_status !== \App\Models\Invoice::STATUS_PAID && $invoice->payment_status !== \App\Models\Invoice::STATUS_PARTIALLY_PAID && $invoice->payment_status !== \App\Models\Invoice::STATUS_CANCELLED): ?>
                    <a href="<?php echo e(route('invoices.edit', ['invoice' => $invoice->id])); ?>"
                       class="btn btn-warning mr-2 form-btn"><?php echo e(__('messages.common.edit')); ?>

                    </a>
                <?php endif; ?>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary form-btn"><?php echo e(__('messages.common.back')); ?>

                </a>
            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-body">
                    <?php echo $__env->make('invoices.show_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('tasks.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('payments.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('reminders.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('payments.add_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('reminders.add_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('reminders.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/custom-datatable.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/bs4-summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        let invoiceUrl = "<?php echo e(route('invoices.index')); ?>";
        let invoiceId = "<?php echo e($invoice->id); ?>";
        let ownerType = 'App\\Models\\Invoice';
        let changeStatus = "<?php echo e(route('invoice.change-status', $invoice->id)); ?>";
        let taskUrl = "<?php echo e(route('tasks.index')); ?>";
        let statusArray = JSON.parse('<?php echo json_encode($status, 15, 512) ?>');
        let priorities = JSON.parse('<?php echo json_encode($priorities, 15, 512) ?>');
        let ownerId = "<?php echo e($invoice->id); ?>";
        let authId = '<?php echo e(Auth::id()); ?>';
        let ownerUrl = "<?php echo e(route('invoices.index')); ?>";
        let memberUrl = "<?php echo e(route('members.index')); ?>";
        let addNote="<?php echo e(__('messages.placeholder.add_note')); ?>";
    </script>
    <script src="<?php echo e(mix('assets/js/notes/new-notes.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/reminder/reminder.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/payments/payments.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/get-price-format.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/payments/add-payment.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/invoices/show-page.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/tasks/tasks.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/invoices/show.blade.php ENDPATH**/ ?>