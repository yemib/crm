    <form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
        </li>
    </ul>
    <div class="search-element">
        <input class="form-control search-input-css" type="text" id="searchCustomer" disabled
               placeholder="<?php echo e(__('messages.placeholder.search_customers')); ?>" aria-label="Search" autocomplete="off">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        <div class="search-backdrop"></div>
        <div class="search-result search-result-mobile-w">
            <div id="customerName" class="py-2">
                <h6 class="py-1 px-3 my-0"><i
                            class="fab fa fa-search text-primary"></i> <?php echo e(__('messages.common.search_results')); ?></h6>
            </div>
        </div>
    </div>
</form>
<ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                                 class="nav-link notification-toggle nav-link-lg" data-toggle="tooltip"
                                                 title="<?php echo e(__('messages.notification.notifications')); ?>"> <i
                    class="far fa-bell"></i></a>


        <div class="dropdown-menu dropdown-list dropdown-menu-right" id="notification">
            <div class="dropdown-header">
                <div class="row justify-content-between">
                    <div class="px-3"><?php echo e(__('messages.notification.notifications')); ?></div>
                    <div class="px-3" id="allRead">
                        <a href="#" class="text-decoration-none"><?php echo e(__('messages.notification.mark_all_as_read')); ?></a>
                    </div>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons notification-content"
                 style="overflow-y:auto !important; ">
                <div class="empty-state empty-notification d-none" data-height="300" style="padding: 0px 40px;">
                    <div class="empty-state-icon">
                        <i class="fas fa-question mt-4"></i>
                    </div>
                    <h2><?php echo e(__('messages.notification.empty_notifications')); ?></h2>
                </div>
            </div>
        </div>
    </li>
</ul>
<?php if(session('impersonated_by')): ?>
    <a href="<?php echo e(route('impersonate.leave')); ?>"
       class="mr-3 text-warning-all" data-toggle="tooltip"
       title="<?php echo e(__('messages.user.return_to_admin')); ?>">
        <i class="fas fa-user-check return_to_admin"></i>
    </a>
<?php endif; ?>
<ul class="navbar-nav navbar-right">
    <?php if(getLoggedInUser()): ?>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" width="50" id="loginUserImage" src="<?php echo e(getLoggedInUser()->image_url??''); ?>"
                     class="rounded-circle user-avatar-image" alt="InfyOm">
                <div class="d-sm-none d-lg-inline-block">
                    <?php echo e(__('messages.edit_profile.hi')); ?>, <?php echo e(getLoggedInUser()->first_name); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    <?php echo e(__('messages.edit_profile.welcome')); ?>

                    , <?php echo e(getLoggedInUser()->full_name); ?></div>
                <a href="<?php echo e(route('profile')); ?>" class="dropdown-item has-icon">
                    <i class="far fa-user mr-2"></i><?php echo e(__('messages.edit_profile.edit_profile')); ?>

                </a>
                <a class="dropdown-item has-icon" href="#" data-toggle="modal" data-id="<?php echo e(getLoggedInUserId()); ?>"
                   data-target="#changePasswordModal"><i
                            class="fa fa-lock mr-2"></i>
                    <div class="change-pass-wrap"><?php echo e(__('messages.edit_profile.change_password')); ?></div>
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-id="<?php echo e(getLoggedInUserId()); ?>"
                   data-target="#changeLanguageModal"><i
                            class="fa fa-language mr-2"></i><?php echo e(__('messages.user.change_language')); ?></a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(route('logout')); ?>" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> <?php echo e(__('messages.edit_profile.logout')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo e(csrf_field()); ?>

                </form>
            </div>
        </li>
    <?php else: ?>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="#" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?php echo e(__('messages.edit_profile.hello')); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title"><?php echo e(__('messages.edit_profile.login_register')); ?></div>
                <a href="<?php echo e(route('login')); ?>" class="dropdown-item has-icon">
                    <i class="fas fa-sign-in-alt"></i> <?php echo e(__('messages.edit_profile.login')); ?>

                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(route('register')); ?>" class="dropdown-item has-icon">
                    <i class="fas fa-user-plus"></i> <?php echo e(__('messages.edit_profile.register')); ?>

                </a>
            </div>
        </li>
    <?php endif; ?>
</ul>
<?php /**PATH G:\websites\crm\crm\resources\views/layouts/header.blade.php ENDPATH**/ ?>