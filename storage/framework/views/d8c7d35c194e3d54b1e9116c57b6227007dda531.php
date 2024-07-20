<div>
    <div class="row">
        <div class="col-md-12">
            <div wire:loading id="overlay-screen-lock">
                <div class="live-wire-infy-loader">
                    <?php echo $__env->make('loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <div class="mt-0 mb-3 col-12 d-flex justify-content-end search-display-block">
            <?php if(!empty($customer)): ?>
                <div class="mt-2">
                    <?php echo e(Form::select('status', $ticketStatusArr, $filterTicketByStatus, ['id' => 'customerTicketStatus', 'class' => 'form-control status-filter', 'placeholder' => __('messages.placeholder.select_status')])); ?>

                </div>
            <?php endif; ?>
            <div class="p-2">
                <input wire:model.debounce.100ms="search" type="search" class="form-control" placeholder="<?php echo e(__('messages.common.search')); ?>"
                       id="search">
            </div>
        </div>
        <?php
            $inStyle = 'style';
            $style = 'background-color:';
        ?>
        <div class="col-md-12">
            <div class="row justify-content-md-center text-center mb-4">
                <div class="owl-carousel owl-theme">
                    <?php $__currentLoopData = $statusCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="ticket-statistics mx-auto" <?php echo e($inStyle); ?>="<?php echo e($style); ?> <?php echo e($status->pick_color); ?>">
                            <p><?php echo e($status->tickets_count); ?></p>
                        </div>
                        <h5 class="my-0 mt-1"><?php echo e(html_entity_decode($status->name)); ?></h5>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php
        $border = 'border-top: 2px solid ';
        ?>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php if(count($tickets) > 0): ?>
                <div class="content">
                    <div class="row position-relative">
                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-4">
                                <div class="livewire-card card shadow mb-5 rounded hover-card card-ticket-height"
                                     style="<?php echo e($border .$ticket->ticketStatus->pick_color); ?>">

                                    <div class="tickets-listing-details agent-tickets-listing-details">
                                        <div class="w-100 tickets-listing-description">
                                            <div class="tickets-data">
                                                <div class="d-flex justify-content-between btn-column">
                                                    <h3 class="tickets-listing-title mb-1">
                                                        <a href="<?php echo e(url('admin/tickets',$ticket->id)); ?>"
                                                           class="text-primary text-decoration-none letter-space-1"><?php echo e(\Illuminate\Support\Str::limit(html_entity_decode($ticket->subject_incident), 10 ,'...')); ?></a>
                                                    </h3>
                                                    <div class="ribbon float-right ribbon-success btn-flex-end">
                                                        <span class="badge ticket-status text-white" <?php echo e($inStyle); ?>=
                                                        "<?php echo e($style); ?> <?php echo e($ticket->ticketStatus->pick_color); ?>"
                                                        ><?php echo e(html_entity_decode($ticket->ticketStatus->name)); ?></span>
                                                    </div>
                                                </div>
                                                <?php if(!empty($ticket->user)): ?>
                                                    <h3 class="tickets-listing-title mt-2">
                                                        <span data-toggle="tooltip" title=""
                                                              data-original-title="<?php echo e(html_entity_decode($ticket->user->full_name)); ?>"><i
                                                                    class="fas fa-user text-pick"></i>
                                                        &nbsp;<?php echo e(Str::limit(html_entity_decode($ticket->user->full_name), 10, '...')); ?>

                                                        </span>
                                                    </h3>
                                                <?php endif; ?>
                                                <?php
                                                    $inStyle = 'style';
                                                    $styleBackground = 'color: ';
                                                ?>
                                                <?php if(!empty($ticket->department)): ?>
                                                    <h3 class="tickets-listing-title">
                                                        <span data-toggle="tooltip" title=""
                                                              data-original-title="<?php echo e(html_entity_decode($ticket->department->name)); ?>"><i
                                                                    class="fas fa-columns"></i>
                                                        <?php echo e(Str::limit(html_entity_decode($ticket->department->name), 10, '...')); ?>

                                                        </span>
                                                    </h3>
                                                <?php endif; ?>
                                                <h3 class="tickets-listing-title">
                                                    <i class="far fa-clock  text-lightgreen"></i>
                                                    &nbsp;<?php echo e($ticket->created_at->diffForHumans()); ?>

                                                </h3>
                                                <?php if(count($ticket->media) > 0): ?>
                                                    <div class="mt-2 mobile-d-grid">
                                                        <i class="fa fa-download mr-2"></i><a
                                                                href="<?php echo e(url('admin/tickets-attachment-download/'.$ticket->id)); ?>"
                                                                title="<?php echo e(__('messages.ticket.attachments')); ?>"
                                                                class="text-decoration-none"><?php echo e(__('messages.common.download')); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right ticket-action-btn d-none">
                                        <a title="<?php echo e(__('messages.common.edit')); ?>"
                                           class="action-btn edit-btn tickets-edit"
                                           href="<?php echo e(route('ticket.edit',$ticket->id)); ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a title="<?php echo e(__('messages.common.delete')); ?>"
                                           class="text-danger action-btn delete-btn tickets-delete"
                                           data-id="<?php echo e($ticket->id); ?>" href="#">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($tickets->count() > 0): ?>
                        <div class="mt-0 mb-5 col-12">
                            <div class="row paginatorRow">
                                <div class="col-lg-2 col-md-6 col-sm-12 pt-2">
                                    <span class="d-inline-flex">
                                        <?php echo e(__('messages.common.showing')); ?>

                                        <span class="font-weight-bold ml-1 mr-1"><?php echo e($tickets->firstItem()); ?></span> -
                                        <span class="font-weight-bold ml-1 mr-1"><?php echo e($tickets->lastItem()); ?></span> <?php echo e(__('messages.common.of')); ?>

                                        <span class="font-weight-bold ml-1"><?php echo e($tickets->total()); ?></span>
                                    </span>
                                </div>
                                <div class="col-lg-10 col-md-6 col-sm-12 d-flex justify-content-end">
                                    <?php echo e($tickets->links()); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="col-lg-12 col-md-12 d-flex justify-content-center">
                    <?php if(empty($search)): ?>
                        <p class="text-dark"><?php echo e(__('messages.ticket.no_ticket_available')); ?></p>
                    <?php else: ?>
                        <p class="text-dark"><?php echo e(__('messages.ticket.no_ticket_found')); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/livewire/tickets.blade.php ENDPATH**/ ?>