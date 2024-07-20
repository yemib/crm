<?php $__env->startSection('section'); ?>
    <section class="section">
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row w-100 justify-content-end">
                <div class="justify-content-end mr-2">
                    <?php echo e(Form::select('status',$status,null,['class' => 'form-control', 'id' => 'filter_status', 'placeholder' => __('messages.placeholder.select_status')])); ?>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php echo $__env->make('tasks.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('estimates.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/estimates/views/tasks.blade.php ENDPATH**/ ?>