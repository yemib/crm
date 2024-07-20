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
            <?php if(count($paymentModes) > 0): ?>
                <div class="content">
                    <div class="row position-relative">
                        <?php $__currentLoopData = $paymentModes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-sm-12 col-md-6 col-xl-4 mb-3">
                                <div class="hover-effect-payment-mode position-relative mb-4 payment-mode-card-hover-border">
                                    <div class="payment-mode-listing-details">
                                        <div class="d-flex payment-mode-listing-description">
                                            <div class="payment-mode-data">
                                                <h3 class="payment-mode-listing-title mb-1">
                                                    <a href="#"
                                                       class="text-dark text-decoration-none tags-listing-text show-btn"
                                                       data-id="<?php echo e($paymentMode->id); ?>">
                                                        <?php echo e(Str::limit(html_entity_decode($paymentMode->name), 20, '...')); ?>

                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="payment-mode-status">
                                        <label class="custom-switch pl-0" data-placement="bottom"
                                               title="<?php echo e($paymentMode->active ? __('messages.common.active') : __('messages.common.deactive')); ?>">
                                            <input type="checkbox" name="active" class="custom-switch-input isActive"
                                                   data-id="<?php echo e($paymentMode->id); ?>" value="1"
                                                   data-class="active" <?php echo e($paymentMode->active ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="payment-mode-action-btn mt-1">
                                        <a title="<?php echo e(__('messages.common.edit')); ?>"
                                           class="btn action-btn edit-btn payment-mode-edit"
                                           data-id="<?php echo e($paymentMode->id); ?>"
                                           href="#">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a title="<?php echo e(__('messages.common.delete')); ?>"
                                           class="btn action-btn delete-btn payment-mode-delete"
                                           data-id="<?php echo e($paymentMode->id); ?>"
                                           href="#">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($paymentModes->count() > 0): ?>
                        <div class="mt-0 mb-5 col-12">
                            <div class="row paginatorRow">
                                <div class="col-lg-2 col-md-6 col-sm-12 pt-2">
                                <span class="d-inline-flex">
                                    <?php echo e(__('messages.common.showing')); ?>

                                    <span class="font-weight-bold ml-1 mr-1"><?php echo e($paymentModes->firstItem()); ?></span> -
                                    <span class="font-weight-bold ml-1 mr-1"><?php echo e($paymentModes->lastItem()); ?></span> <?php echo e(__('messages.common.of')); ?>

                                    <span class="font-weight-bold ml-1"><?php echo e($paymentModes->total()); ?></span>
                                </span>
                                </div>
                                <div class="col-lg-10 col-md-6 col-sm-12 d-flex justify-content-end">
                                    <?php echo e($paymentModes->links()); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="col-lg-12 col-md-12 d-flex justify-content-center">
                    <?php if(empty($search)): ?>
                        <p class="text-dark"><?php echo e(__('messages.payment_mode.no_payment_mode_available')); ?></p>
                    <?php else: ?>
                        <p class="text-dark"><?php echo e(__('messages.payment_mode.no_payment_mode_found')); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/livewire/payment-modes.blade.php ENDPATH**/ ?>