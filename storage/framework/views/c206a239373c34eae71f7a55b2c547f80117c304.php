<ul class="nav nav-tabs mb-3" role="tablist">
    <li class="nav-item">
        <a href="<?php echo e(route('tickets.show',['ticket' => $ticket->id, 'group' => 'ticket_details'])); ?>"
           class="nav-link <?php echo e((isset($groupName) && $groupName == 'ticket_details' || !isset($groupName)) ? 'active' : ''); ?>">
            <?php echo e(__('messages.ticket.ticket_details')); ?>

        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('tickets.show',['ticket' => $ticket->id, 'group' => 'tasks'])); ?>"
           class="nav-link <?php echo e((isset($groupName) && $groupName == 'tasks') ? 'active' : ''); ?>">
            <?php echo e(__('messages.tasks')); ?>

        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('tickets.show',['ticket' => $ticket->id, 'group' => 'notes'])); ?>"
           class="nav-link <?php echo e((isset($groupName) && $groupName == 'notes') ? 'active' : ''); ?>">
            <?php echo e(__('messages.notes')); ?>

        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('tickets.show',['ticket' => $ticket->id, 'group' => 'reminders'])); ?>"
           class="nav-link <?php echo e((isset($groupName) && $groupName == 'reminders') ? 'active' : ''); ?>">
            <?php echo e(__('messages.reminders')); ?>

        </a>
    </li>
</ul>
<br>
<?php echo $__env->yieldContent('section'); ?>
<?php /**PATH G:\websites\crm\crm\resources\views/tickets/show_fields.blade.php ENDPATH**/ ?>