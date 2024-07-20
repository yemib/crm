<?php $__env->startSection('section'); ?>
    <section class="section">
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-header">
                    <div class="row w-100 justify-content-end">
                        <div>
                            <a href="#" class="btn btn-primary addReminderModal add-button custom-btn-line-height"
                               data-toggle="modal"
                               data-target="#addModal"><?php echo e(__('messages.reminder.set_reminder')); ?> <i
                                        class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('reminders.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('reminders.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tickets.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/tickets/views/reminders.blade.php ENDPATH**/ ?>