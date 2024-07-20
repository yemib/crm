<ul class="nav nav-tabs mb-3" role="tablist">
    <li class="nav-item">
        <a href="<?php echo e(route('estimates.show',['estimate' => $estimate->id, 'group' => 'estimate_details'])); ?>"
           class="nav-link <?php echo e((isset($groupName) && $groupName == 'estimate_details' || !isset($groupName)) ? 'active' : ''); ?>">
            <?php echo e(__('messages.estimate.estimate_details')); ?>

        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('estimates.show',['estimate' => $estimate->id, 'group' => 'tasks'])); ?>"
           class="nav-link <?php echo e((isset($groupName) && $groupName == 'tasks') ? 'active' : ''); ?>">
            <?php echo e(__('messages.tasks')); ?>

        </a>
    </li>
</ul>
<br>
<?php echo $__env->yieldContent('section'); ?>
<?php /**PATH G:\websites\crm\crm\resources\views/estimates/show_fields.blade.php ENDPATH**/ ?>