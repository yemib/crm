<?php if($errors->any()): ?>
    <div class="alert alert-danger p-0">
        <ul>
            <li><?php echo e($errors->first()); ?></li>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH G:\websites\crm\crm\resources\views/layouts/errors.blade.php ENDPATH**/ ?>