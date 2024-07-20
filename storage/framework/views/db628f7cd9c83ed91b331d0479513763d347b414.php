<div>
    <div class="row">
        <div class="col-md-12">
            <div wire:loading id="overlay-screen-lock">
                <div class="live-wire-infy-loader">
                    <?php echo $__env->make('loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="row mb-3 justify-content-end flex-wrap">
                <div>
                    <div class="selectgroup mr-3">
                        <input wire:model.debounce.100ms="search" type="search" autocomplete="off"
                               id="search" placeholder="<?php echo e(__('messages.common.search')); ?>"
                               class="form-control">
                    </div>
                </div>
            </div>
            <?php if(count($predefinedReplies) > 0): ?>
                <div class="content">
                    <div class="row position-relative">
                        <?php $__currentLoopData = $predefinedReplies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $predefinedReply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-sm-12 col-md-6 col-xl-4 mb-3">
                                <div class="hover-effect-predefined-reply position-relative mb-4 predefined-reply-card-hover-border">
                                    <div class="predefined-reply-listing-details">
                                        <div class="d-flex predefined-reply-listing-description">
                                            <div class="predefined-reply-data">
                                                <h3 class="predefined-reply-listing-title mb-1">
                                                    <a href="#"
                                                       class="text-dark text-decoration-none tags-listing-text show-btn"
                                                       data-id="<?php echo e($predefinedReply->id); ?>">
                                                        <?php echo e(Str::limit(html_entity_decode($predefinedReply->reply_name), 8, '...')); ?>

                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="predefined-reply-action-btn">
                                        <a title="<?php echo e(__('messages.common.edit')); ?>"
                                           class="btn action-btn edit-btn predefined-reply-edit"
                                           data-id="<?php echo e($predefinedReply->id); ?>"
                                           href="#">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a title="<?php echo e(__('messages.common.delete')); ?>"
                                           class="btn action-btn delete-btn predefined-reply-delete"
                                           data-id="<?php echo e($predefinedReply->id); ?>"
                                           href="#">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($predefinedReplies->count() > 0): ?>
                        <div class="mt-0 mb-5 col-12">
                            <div class="row paginatorRow">
                                <div class="col-lg-2 col-md-6 col-sm-12 pt-2">
                                <span class="d-inline-flex">
                                    <?php echo e(__('messages.common.showing')); ?>

                                    <span class="font-weight-bold ml-1 mr-1"><?php echo e($predefinedReplies->firstItem()); ?></span> -
                                    <span class="font-weight-bold ml-1 mr-1"><?php echo e($predefinedReplies->lastItem()); ?></span> <?php echo e(__('messages.common.of')); ?>

                                    <span class="font-weight-bold ml-1"><?php echo e($predefinedReplies->total()); ?></span>
                                </span>
                                </div>
                                <div class="col-lg-10 col-md-6 col-sm-12 d-flex justify-content-end">
                                    <?php echo e($predefinedReplies->links()); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="col-lg-12 col-md-12 d-flex justify-content-center">
                    <?php if(empty($search)): ?>
                        <p class="text-dark"><?php echo e(__('messages.predefined_reply.no_predefined_reply_available')); ?></p>
                    <?php else: ?>
                        <p class="text-dark"><?php echo e(__('messages.predefined_reply.no_predefined_reply_found')); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/livewire/predefined-replies.blade.php ENDPATH**/ ?>