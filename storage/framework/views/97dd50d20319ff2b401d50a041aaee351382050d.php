<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.ticket.ticket_details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
    <link href="<?php echo e(asset('css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('ticket_replies.edit_reply_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="section">
        <div class="section-header item-align-right">
            <h1><?php echo e(__('messages.ticket.ticket_details')); ?></h1>
            <div class="section-header-breadcrumb float-right">
                <a href="<?php echo e(route('ticket.edit', ['ticket' => $ticket->id])); ?>"
                   class="btn btn-warning mr-2 form-btn"><?php echo e(__('messages.common.edit')); ?>

                </a>
                <a href="<?php echo e(route('ticket.index')); ?>" class="btn btn-primary form-btn">
                    <?php echo e(__('messages.common.back')); ?>

                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <?php echo $__env->make('tickets.show_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <?php if($groupName == 'ticket_details'): ?>
                <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <?php echo $__env->make('ticket_replies.add_reply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <h4 class="text-dark"><?php echo e(__('messages.ticket.replies')); ?></h4>
                    <div class="card">
                        <div class="card-body scroll-tickets">
                            <?php $__empty_1 = true; $__currentLoopData = $ticket->ticketReplies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketReply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="card">
                                    <div class="card-body custom-ticket-card-body">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-sm-12 col-md-1 col-xl-1">
                                                <img src="<?php echo e($ticketReply->image_url); ?>" alt="profile"
                                                     class="ticket-user-avatar mb-md-0 mb-3">
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-xl-4">
                                                <div class="d-flex align-items-center mt-2 ml-xl-2 ml-lg-2 ml-0">
                                                    <h6><?php echo e($ticketReply->full_name); ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-7 col-xl-7">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <span class="mr-2"><?php echo e($ticketReply->pivot->created_at->diffForHumans()); ?></span>
                                                    <a title="<?php echo e(__('messages.common.edit')); ?>" class="edit-reply-btn edit-ticket-reply" data-id="<?php echo e($ticketReply->pivot->id); ?>" href="javascript:void(0)">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a title="<?php echo e(__('messages.common.delete')); ?>" class="delete-reply-btn delete-ticket-reply" data-id="<?php echo e($ticketReply->pivot->id); ?>" href="javascript:void(0)">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <p><?php echo $ticketReply->pivot->reply; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-center"><?php echo e(__('messages.ticket.no_ticket_reply_found')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php echo $__env->make('tasks.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('reminders.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('reminders.add_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('reminders.edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/custom-datatable.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/bs4-summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        let statusArray = JSON.parse('<?php echo json_encode($status, 15, 512) ?>')
        let priorities = JSON.parse('<?php echo json_encode($priorities, 15, 512) ?>')
        let ownerId = "<?php echo e($ticket->id); ?>"
        let ownerType = 'App\\Models\\Ticket'
        let ticketUrl = "<?php echo e(route('ticket.index')); ?>/"
        let ticketId = '<?php echo e($ticket->id); ?>'
        let authId = '<?php echo e(getLoggedInUserId()); ?>'
        let ownerUrl = "<?php echo e(route('ticket.index')); ?>"
        let memberUrl = "<?php echo e(route('members.index')); ?>"
    </script>
    <script src="<?php echo e(mix('assets/js/tasks/tasks.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/notes/new-notes.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/reminder/reminder.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/tickets/ticket-details.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/ticket-reply.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/tickets/show.blade.php ENDPATH**/ ?>