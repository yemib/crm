<div class="row">
    <div class="mt-0 mb-3 col-12 d-flex justify-content-end">
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
    <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-12 col-md-6 col-lg-4 col-xl-4 extra-large">
            <div class="livewire-card card <?php echo e($loop->odd ? 'card-primary' : 'card-dark'); ?> shadow mb-5 rounded user-card-view user-card-mbl-height">
                <div class="card-header d-flex align-items-center user-card-index d-sm-flex-wrap-0">
                    <div class="author-box-left pl-0 mb-auto">
                        <img alt="image" width="50" src="<?php echo e($member->image_url); ?>"
                             class="rounded-circle user-avatar-image uAvatar">
                    </div>
                    <div class="ml-2 w-100 mb-auto">
                        <div class="justify-content-between d-flex">
                            <div class="user-card-name pb-1">
                                <a href="<?php echo e(url('admin/members/'.$member->id)); ?>" class="anchor-underline">
                                    <h4><?php echo e(Str::limit(html_entity_decode($member->first_name), 12, '...')); ?></h4></a>
                            </div>
                            <a class="dropdown dropdown-list-toggle">
                                <a href="#" data-toggle="dropdown"
                                   class="notification-toggle action-dropdown d-none position-xs-bottom">
                                    <i class="fas fa-ellipsis-v action-toggle-mr"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-list-content dropdown-list-icons">
                                        <a href="<?php echo e(route('members.edit',$member->id)); ?>"
                                           class="dropdown-item dropdown-item-desc edit-btn"
                                           data-id="<?php echo e($member->id); ?>"><i
                                                    class="fas fa-edit mr-2 card-edit-icon"></i> <?php echo e(__('messages.common.edit')); ?>

                                        </a>
                                        <?php if(getLoggedInUserId() != $member->id): ?>
                                            <a href="#" class="dropdown-item dropdown-item-desc delete-btn"
                                               data-id="<?php echo e($member->id); ?>"><i
                                                        class="fas fa-trash mr-2 card-delete-icon"></i><?php echo e(__('messages.common.delete')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php if(!empty($member->role_names)): ?>
                            <div class="card-member-role">

                                <?php $__currentLoopData = $member->memberGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php echo e($roles->name); ?>,

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                               
                            </div>
                        <?php endif; ?>
                        <div class="card-user-email pt-1 mb-1">
                            <?php echo e($member->email); ?>

                            <?php if(!empty($member->email_verified_at)): ?>
                                <span data-toggle="tooltip" title="<?php echo e(__('messages.member.email_is_verified')); ?>"><i
                                            class="fas fa-check-circle email-verified"></i></span>
                            <?php else: ?>
                                <span data-toggle="tooltip" title="<?php echo e(__('messages.member.email_is_not_verified')); ?>"><i
                                            class="fas fa-times-circle email-not-verified"></i></span>
                            <?php endif; ?>
                        </div>
                        <div class="mr-3 mt-2">
                             <?php echo e($member->member_id); ?>

                           
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex align-items-center pt-0 pl-3 ml-2">
                    <?php if($member->id != getLoggedInUserId()): ?>
                        <div class="mt-2 member-card-toggle card-toggle-mr">
                            <label class="custom-switch pl-0" data-placement="bottom"
                                   data-toggle="tooltip" title="<?php echo e(__('messages.common.status')); ?>">
                                <input type="checkbox" name="is_enable" class="custom-switch-input is-administrator"
                                       data-id="<?php echo e($member->id); ?>" value="1"
                                       data-class="is_enable" <?php echo e($member->is_enable ? 'checked' : ''); ?>>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    <?php endif; ?>
                    <?php if(empty($member->email_verified_at)): ?>
                        <div class="ml-auto mt-1 member-card-toggle">
                            <button class="btn btn-danger btn-sm p-0 pl-1 pr-1 email-verify-btn"
                                    data-id="<?php echo e($member->id); ?>"
                                    data-toggle="tooltip" title="<?php echo e(__('messages.member.email_verify')); ?>">
                                <i class="fas fa-envelope font-size-12px"></i></button>
                            <button class="btn btn-primary btn-sm p-0 pl-1 pr-1 email-btn" data-id="<?php echo e($member->id); ?>"
                                    data-toggle="tooltip" title="<?php echo e(__('messages.member.resend_email_verification')); ?>"><i
                                        class="fas fa-sync font-size-12px"></i></button>
                        </div>
                    <?php else: ?>
                        <div class="ml-auto mt-1 member-card-toggle">
                            <?php if(!$member->is_admin): ?>
                                <?php if(!getLoggedInUser()->hasRole('client') && $member->is_enable): ?>
                                    <a href="<?php echo e(route('impersonate',$member->id)); ?>">
                                        <button class="btn btn-primary btn-sm p-0 pl-1 pr-1 email-verified-btn"
                                                data-toggle="tooltip" title="<?php echo e(__('messages.contact.impersonate')); ?>">
                                            <i class="fas fa-user font-size-12px"></i></button>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <button class="btn btn-success btn-sm p-0 pl-1 pr-1 email-verified-btn"
                                    data-toggle="tooltip" title="<?php echo e(__('messages.member.email_verified')); ?>">
                                <i class="fas fa-envelope font-size-12px"></i></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="mt-0 mb-5 col-12 d-flex justify-content-center mb-5 rounded">
            <div class="p-2">
                <?php if(empty($search)): ?>
                    <p class="text-dark"><?php echo e(__('messages.member.no_member_available')); ?></p>
                <?php else: ?>
                    <p class="text-dark"><?php echo e(__('messages.member.no_member_found')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if($members->count() > 0): ?>
        <div class="mt-0 mb-5 col-12">
            <div class="row paginatorRow">
                <div class="col-lg-2 col-md-6 col-sm-12 pt-2">
                <span class="d-inline-flex">
                    <?php echo e(__('messages.common.showing')); ?>

                    <span class="font-weight-bold ml-1 mr-1"><?php echo e($members->firstItem()); ?></span> -
                    <span class="font-weight-bold ml-1 mr-1"><?php echo e($members->lastItem()); ?></span> <?php echo e(__('messages.common.of')); ?>

                    <span class="font-weight-bold ml-1"><?php echo e($members->total()); ?></span>
                </span>
                </div>
                <div class="col-lg-10 col-md-6 col-sm-12 d-flex justify-content-end">
                    <?php echo e($members->links()); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\websites\crm\crm\resources\views/livewire/members.blade.php ENDPATH**/ ?>