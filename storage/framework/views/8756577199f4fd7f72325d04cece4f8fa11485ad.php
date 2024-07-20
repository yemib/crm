<h4 class="text-dark"><?php echo e(__('messages.ticket.add_reply')); ?></h4>
<div class="card">
    <?php echo e(Form::open(['id' => 'ticketReplyStoreForm'])); ?>

    <div class="card-body">
        <?php echo e(Form::hidden('ticket_id', $ticket->id)); ?>

        <?php echo e(Form::hidden('user_id', getLoggedInUserId())); ?>

        <div class="form-group">
            <?php echo e(Form::textarea('reply', null, ['class' => 'form-control', 'id' => 'replyId'])); ?>

        </div>
        <div class="d-flex justify-content-end">
            <?php echo e(Form::submit(__('messages.ticket.reply'),['class' => 'btn btn-primary', 'id' => 'btnReply'])); ?>

        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH G:\websites\crm\crm\resources\views/ticket_replies/add_reply.blade.php ENDPATH**/ ?>