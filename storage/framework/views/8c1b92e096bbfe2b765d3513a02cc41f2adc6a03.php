<?php $__env->startSection('section'); ?>
    <section class="section">
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row w-100 justify-content-end">
                <a href="#" class="btn btn-primary addReminderModal add-button custom-btn-line-height"
                   data-toggle="modal"
                   data-target="#addModal"><?php echo e(__('messages.reminder.set_reminder')); ?> <i
                            class="fas fa-plus"></i></a>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php echo $__env->make('reminders.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('invoices.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/invoices/views/reminders.blade.php ENDPATH**/ ?>