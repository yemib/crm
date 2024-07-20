<ul class="nav nav-tabs mb-3" id="customerTab" role="tablist">
    <li class="nav-item">
        <a href="<?php echo e(route('members.show',['member' => $member->id, 'group' => 'member_details'])); ?>"
           class="nav-link <?php echo e((isset($groupName) && $groupName == 'member_details' || !isset($groupName)) ? 'active' : ''); ?>">
            <?php echo e(__('messages.member.member_details')); ?>

        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('members.show',['member' => $member->id, 'group' => 'tasks'])); ?>"
           class="nav-link <?php echo e((isset($groupName) && $groupName == 'tasks') ? 'active' : ''); ?>">
            <?php echo e(__('messages.tasks')); ?>

        </a>
    </li>
</ul>
<br>
<?php echo $__env->yieldContent('section'); ?>
<?php /**PATH G:\websites\crm\crm\resources\views/members/show_fields.blade.php ENDPATH**/ ?>