<div>
    <div class="row">
        <div class="col-md-12">
            <div wire:loading id="overlay-screen-lock">
                <div class="live-wire-infy-loader">
                    <?php echo $__env->make('loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-end flex-wrap">
        <div>
            <div class="selectgroup">
                <input wire:model="searchByCustomer" type="search" id="searchByCustomer"
                    placeholder="<?php echo e(__('messages.common.search')); ?>" autocomplete="off"
                    class="form-control customer-dashboard-ticket-search">
            </div>
        </div>
    </div>
    <div class="users-card">
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-xl-4 col-md-6">
                    <div class="hover-effect-users position-relative mb-5 users-card-hover-border users-border">
                        <div class="users-listing-details">
                            <div
                                class="d-flex users-listing-description align-items-center justify-content-center flex-column">
                                <div class="pl-0 mb-2 users-avatar">
                                    <img src="<?php echo e(asset('assets/icons/male.png')); ?>" alt="user-avatar-img"
                                        class="img-responsive users-avatar-img users-img mr-2">
                                </div>
                                <div class="mb-auto w-100 users-data">
                                    <div class="d-flex justify-content-center align-items-center w-100">
                                        <div>
                                            <a href="<?php echo e(url('admin/customers', $customer->id)); ?>"
                                                class="users-listing-title text-decoration-none"><h5 align="center">
                                                     <?php echo e(\Illuminate\Support\Str::limit(html_entity_decode($customer->client_name), 15, '...')); ?> </h5>
                                                    
                                                

                                                    <?php echo e(\Illuminate\Support\Str::limit(html_entity_decode($customer->company_name), 15, '...')); ?> 
                                                    </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between assigned-user pt-0 pl-3 px-5">
                            <div>
                                <div class="text-center badge badge-primary font-weight-bold" data-toggle="tooltip"
                                    data-placement="top" title="<?php echo e(__('messages.customer.total_contact')); ?>">
                                    <?php echo e($customer->contact_count); ?></div>
                            </div>
                            <div>
                                <div class="text-center badge badge-success font-weight-bold" data-toggle="tooltip"
                                    data-placement="top" title="<?php echo e(__('messages.customer.total_project')); ?>">
                                    <?php echo e($customer->project_count); ?></div>
                            </div>
                        </div>
                        <div class="users-action-btn">
                            <a title="<?php echo e(__('messages.common.edit')); ?>" class="action-btn edit-btn users-edit"
                                href="<?php echo e(route('customers.edit', $customer->id)); ?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a title="<?php echo e(__('messages.common.delete')); ?>"
                                class="action-btn customer-delete-btn users-delete" data-id="<?php echo e($customer->id); ?>"
                                href="#">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-md-12 d-flex justify-content-center mt-3">
                    <?php if($searchByCustomer == null || empty($searchByCustomer)): ?>
                        <p class="text-dark"><?php echo e(__('messages.customer.no_customer_available')); ?></p>
                    <?php else: ?>
                        <p class="text-dark"><?php echo e(__('messages.customer.no_customer_found')); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if($customers->count() > 0): ?>
        <div class="mt-0 mb-5 col-12">
            <div class="row paginatorRow">
                <div class="col-lg-2 col-md-6 col-sm-12 pt-2">
                    <span class="d-inline-flex">
                        <?php if($customers->total()): ?>
                            <?php echo e(__('messages.common.showing')); ?>

                            <span class="font-weight-bold ml-1 mr-1"><?php echo e($customers->firstItem()); ?></span> -
                            <span class="font-weight-bold ml-1 mr-1"><?php echo e($customers->lastItem()); ?></span>
                            <?php echo e(__('messages.common.of')); ?>

                            <span class="font-weight-bold ml-1"><?php echo e($customers->total()); ?></span>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="col-lg-10 col-md-6 col-sm-12 d-flex justify-content-end">
                    <?php echo e($customers->links()); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH G:\websites\crm\crm\resources\views/livewire/customers.blade.php ENDPATH**/ ?>