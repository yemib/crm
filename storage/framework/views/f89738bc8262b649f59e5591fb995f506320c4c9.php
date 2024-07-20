<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e($reminder->user->full_name); ?>,

This is the friendly reminder for your ticket you have been created on
<b><?php echo e(date('jS M, Y g:i A', strtotime($reminder->created_at))); ?></b><br>

<b>Ticket Description</b>
<hr>
<?php echo html_entity_decode($reminder->description); ?>

<br>
You may contact us with your suitable time for your ticket & we are here to assist you 24/7.
<br>
Thanks & Regards,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH G:\websites\crm\crm\resources\views/emails/reminder/reminder.blade.php ENDPATH**/ ?>