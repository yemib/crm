<div>
    <div class="row">
        <div class="mt-0 mb-3 col-12 d-flex justify-content-end search-display-block">
            <?php if(!empty($customer)): ?>
                <div class="mt-2">
                    <?php echo e(Form::select('status', $estimateStatus, $statusFilter, ['id' => 'estimateFilterStatus', 'class' => 'form-control', 'placeholder' => __('messages.placeholder.select_status')])); ?>

                </div>
            <?php endif; ?>
            <div class="p-2">
                <input wire:model.debounce.100ms="search" type="search" class="form-control" placeholder="<?php echo e(__('messages.common.search')); ?>"
                       id="search">
            </div>
        </div>
        <div class="col-md-12">
            <div wire:loading id="live-wire-screen-lock">
                <div class="live-wire-infy-loader">
                    <?php echo $__env->make('loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <?php if(empty($customer)): ?>
            <div class="col-md-12">
                <div class="row justify-content-md-center text-center mb-4">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="ticket-statistics mx-auto bg-primary">
                                <p><?php echo e($statusCount->sent); ?></p>
                            </div>
                            <h5 class="my-0 mt-1"><?php echo e(__('messages.estimate.sent')); ?></h5>
                        </div>
                        <div class="item">
                            <div class="ticket-statistics mx-auto bg-warning">
                                <p><?php echo e($statusCount->drafted); ?></p>
                            </div>
                            <h5 class="my-0 mt-1"><?php echo e(__('messages.estimate.drafted')); ?></h5>
                        </div>
                        <div class="item">
                            <div class="ticket-statistics mx-auto bg-info">
                                <p><?php echo e($statusCount->declined); ?></p>
                            </div>
                            <h5 class="my-0 mt-1"><?php echo e(__('messages.estimate.declined')); ?></h5>
                        </div>
                        <div class="item">
                            <div class="ticket-statistics mx-auto bg-danger">
                                <p><?php echo e($statusCount->expired); ?></p>
                            </div>
                            <h5 class="my-0 mt-1"><?php echo e(__('messages.estimate.expired')); ?></h5>
                        </div>
                        <div class="item">
                            <div class="ticket-statistics mx-auto bg-success">
                                <p><?php echo e($statusCount->accepted); ?></p>
                            </div>
                            <h5 class="my-0 mt-1"><?php echo e(__('messages.estimate.accepted')); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php $__empty_1 = true; $__currentLoopData = $estimates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estimate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-12 col-md-6 col-xl-3 col-xlg-4">
                <div class="estimate-card card card-<?php echo e(\App\Models\Estimate::STATUS_COLOR[$estimate->status]); ?> shadow mb-5 rounded hover-card estimate-card-border height-210">
                    <div class="card-header d-flex justify-content-between align-items-center itemCon p-3 invoice-card-height">
                        <div class="d-flex w-100 justify-content-between">
                            <a href="<?php echo e(url('admin/estimates', $estimate->id)); ?>"
                               class="d-flex flex-wrap text-decoration-none">
                                <h4 class="invoice-clients invoice_title"> <?php echo e(Str::limit(html_entity_decode($estimate->title), 8, '...')); ?></h4>
                                (<small><?php echo e($estimate->estimate_number); ?></small>)
                            </a>
                            <div>
                                <a class="dropdown dropdown-list-toggle">
                                    <a href="#" data-toggle="dropdown"
                                       class="notification-toggle action-dropdown d-none position-xs-bottom">
                                        <i class="fas fa-ellipsis-v action-toggle-mr"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-list-content dropdown-list-icons">
                                            <?php if($estimate->status != \App\Models\Estimate::STATUS_EXPIRED && $estimate->status != \App\Models\Estimate::STATUS_DECLINED): ?>
                                                <a href="<?php echo e(route('estimates.edit',$estimate->id)); ?>"
                                                   class="dropdown-item dropdown-item-desc edit-btn"
                                                   data-id="<?php echo e($estimate->id); ?>"><i
                                                            class="fas fa-edit mr-2 card-edit-icon"></i> <?php echo e(__('messages.common.edit')); ?>

                                                </a>
                                            <?php endif; ?>
                                            <a href="#" class="dropdown-item dropdown-item-desc delete-btn"
                                               data-id="<?php echo e($estimate->id); ?>"><i
                                                        class="fas fa-trash mr-2 card-delete-icon"></i><?php echo e(__('messages.common.delete')); ?>

                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between pt-1 px-3">
                        <div class="d-table w-100">
                            <div>
                                <i class="fas fa-street-view"></i><span
                                        class="text-decoration-none"
                                        title="<?php echo e($estimate->customer->company_name); ?>"> <?php echo e(Str::limit(html_entity_decode($estimate->customer->company_name), 15)); ?></span>
                            </div>
                            <span class="d-table-row w-100">
                            <big class="d-table-cell w-100 d-mobile-block">
                                <i class="<?php echo e(getCurrencyClassFromIndex($estimate->currency)); ?>"></i>

                                <?php   $invoice =  $estimate ;  ?>
                                <?php echo $__env->make('invoices.total_calculation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                            </big>
                            <span class="mt-mobile-2 badge-<?php echo e(App\Models\Estimate::STATUS_COLOR[$estimate->status]); ?> badge text-uppercase"><?php echo e(App\Models\Estimate::STATUS[$estimate->status]); ?></span>
                        </span>
                            <?php if(!empty($estimate->estimate_expiry_date)): ?>
                                <span class="d-table-row text-nowrap w-100 <?php echo e(now() > Carbon\Carbon::parse($estimate->estimate_expiry_date)  ? 'text-danger' : ''); ?>">
                                <?php echo e(Carbon\Carbon::parse($estimate->estimate_expiry_date)->translatedFormat('jS M, Y')); ?>

                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="mt-0 mb-5 col-12 d-flex justify-content-center  mb-5 rounded">
                <div class="p-2">
                    <?php if(empty($search)): ?>
                        <p class="text-dark"><?php echo e(__('messages.estimate.no_estimate_available').'.'); ?></p>
                    <?php else: ?>
                        <p class="text-dark"><?php echo e(__('messages.estimate.no_estimate_found')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if($estimates->count() > 0): ?>
            <div class="mt-0 mb-5 col-12">
                <div class="row paginatorRow">
                    <div class="col-lg-2 col-md-6 col-sm-12 pt-2">
                    <span class="d-inline-flex">
                        <?php echo e(__('messages.common.showing')); ?>

                        <span class="font-weight-bold ml-1 mr-1"><?php echo e($estimates->firstItem()); ?></span> -
                        <span class="font-weight-bold ml-1 mr-1"><?php echo e($estimates->lastItem()); ?></span> <?php echo e(__('messages.common.of')); ?>

                        <span class="font-weight-bold ml-1"><?php echo e($estimates->total()); ?></span>
                    </span>
                    </div>
                    <div class="col-lg-10 col-md-6 col-sm-12 d-flex justify-content-end">
                        <?php echo e($estimates->links()); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>
<?php /**PATH G:\websites\crm\crm\resources\views/livewire/estimates.blade.php ENDPATH**/ ?>