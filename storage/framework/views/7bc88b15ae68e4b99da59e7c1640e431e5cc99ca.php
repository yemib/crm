<aside id="sidebar-wrapper">
    <div class="sidebar-brand sidebar-sticky sidebar-bottom-padding h-auto line-height-0 padding-bottom-zero">
        <a class="navbar-brand d-flex align-items-center justify-content-center py-3 px-2"
            href="<?php echo e(route('redirect.login')); ?>">
            <img class="navbar-brand-full w-25" src="<?php echo e(getAppLogo() ?? asset('img/infyom-logo.png')); ?>" width="50px"
                alt="">&nbsp;&nbsp;
            <span class="navbar-brand-full-name text-black text-wrap pl-2 w-75"><?php echo e(getAppName()); ?></span>
        </a>
        <div class="input-group sidebar-search-box">
            <input type="text" class="form-control searchTerm" id="searchText"
                placeholder="<?php echo e(__('messages.placeholder.search_menu')); ?>">
            <div class="input-group-append sGroup">
                <div class="input-group-text">
                    <i class="fas fa-search search-sign"></i>
                    <i class="fas fa-times close-sign"></i>
                </div>
            </div>
            <div class="no-results mt-3 ml-1"><?php echo e(__('messages.no_matching_records_found')); ?></div>
        </div>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo e(route('redirect.login')); ?>" class="small text-white">
            <img class="navbar-brand-full" src="<?php echo e(getAppLogo() ?? asset('img/infyom-logo.png')); ?>" width="50px"
                alt="">
        </a>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-header side-menus"><?php echo e(__('messages.dashboard')); ?></li>


        <li class="side-menus <?php echo e(Request::is('admin/dashboard*') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-lg fa-tachometer-alt"></i>
                <span class="menu-text-wrap"><?php echo e(__('messages.dashboard')); ?></span></a>
        </li>
        <?php if(auth()->user()->id == 1): ?>
            <li class="side-menus ">
                <a target="_blank" class="nav-link" href="<?php echo e(route('cal_login')); ?>"><i
                        class="fas fa-lg fa-tachometer-alt"></i>
                    <span class="menu-text-wrap"> Login To Cal </span></a>
            </li>
        <?php endif; ?>


        <!--  assign projects--->
        

        <?php
        $assign = permission_count(auth()->user()->id, 41);
        $manage = permission_count(auth()->user()->id, 42);

        ?>


        <?php if($assign > 0 && $manage == 0): ?>
            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fa fa-wrench" aria-hidden="true"></i>
                    <span>Installations </span>
                </a>
                <ul class="dropdown-menu side-menus">

                    <li class="side-menus   <?php echo e(Request::is('admin/assigned_projects*') ? 'active' : ''); ?> ">

                        <a href="<?php echo e(route('employee.projects')); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span class="menu-text-wrap">Assigned Projects</span>
                        </a>


                    </li>
                    <li class="side-menus   <?php echo e(Request::is('admin/complete_projects*') ? 'active' : ''); ?> ">

                        <a href="<?php echo e(route('employee.complete.projects')); ?>"><i class="fa fa-check"
                                aria-hidden="true"></i>
                            <span class="menu-text-wrap">Finished Projects</span>
                        </a>


                    </li>

                </ul>
            </li>


            <li class="menu-header side-menus">After Sales</li>


            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-shield">🛡️</i>
                    <span>Warranty </span>
                </a>
                <ul class="dropdown-menu side-menus">

                    <li class="side-menus   <?php echo e(Request::is('admin/active_warranties*') ? 'active' : ''); ?> ">
                        <a href="<?php echo e(route('employee.active.warranties')); ?>"><i class="fa fa-check"
                                aria-hidden="true"></i>
                            <span class="menu-text-wrap">Active Warranties</span>
                        </a>
                    </li>

                    <li class="side-menus   <?php echo e(Request::is('admin/void_warranties*') ? 'active' : ''); ?> ">
                        <a href="<?php echo e(route('employee.void.warranties')); ?>"><i class="fa fa-exclamation-triangle"
                                aria-hidden="true"></i>
                            <span class="menu-text-wrap">Voided Warranties</span>
                        </a>
                    </li>

                    <li class="side-menus   <?php echo e(Request::is('admin/expired_warranties*') ? 'active' : ''); ?> ">
                        <a href="<?php echo e(route('employee.expired.warranties')); ?>">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            <span class="menu-text-wrap">Expired Warranties</span>
                        </a>
                    </li>




                </ul>
            </li>
        <?php endif; ?>



        




        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_customers', 'manage_customer_groups'])): ?>
            <li class="menu-header side-menus"><?php echo e(__('messages.customers')); ?></li>
            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-street-view"></i>
                    <span><?php echo e(__('messages.customers')); ?></span></a>
                <ul class="dropdown-menu side-menus">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_customer_groups')): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/customer-groups*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('customer-groups.index')); ?>">
                                <i class="fas fa-lg fa-people-arrows"></i>
                                <span class="menu-text-wrap"><?php echo e(__('messages.customer_groups')); ?></span></a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_customers')): ?>
                        <li
                            class="side-menus <?php echo e(Request::is('admin/customers*') || Request::is('admin/contacts*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('customers.index')); ?>">
                                <i class="fas fa-lg fa-street-view"></i><span
                                    class="menu-text-wrap"><?php echo e(__('messages.customers')); ?></span></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_staff_member')): ?>

        <li class="nav-item dropdown side-menus">
            <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-user-friends"></i>
                <span>Members</span></a>

            <ul class="dropdown-menu side-menus">

                    <li class="side-menus <?php echo e(Request::is('admin/member-groups*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('member-groups.index')); ?>">
                            <i class="fas fa-lg fa-people-arrows"></i>
                            <span class="menu-text-wrap">Member Groups</span></a>
                    </li>

                    <li class="side-menus <?php echo e(Request::is('admin/members*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('members.index')); ?>"><i class="fas fa-lg fa-user-friends"></i>
                            <span class="menu-text-wrap"><?php echo e(__('messages.members')); ?> </span>
                        </a>
                    </li>

            </ul>

        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_articles', 'manage_article_groups'])): ?>
            <?php if(auth()->user()->is_admin == 1): ?>
                <li class="nav-item dropdown side-menus">
                    <a class="nav-link has-dropdown" href="#"><i class="fab fa-lg fa-autoprefixer"></i>
                        <span><?php echo e(__('messages.articles')); ?></span></a>
                    <ul class="dropdown-menu side-menus">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_article_groups')): ?>
                            <li class="side-menus <?php echo e(Request::is('admin/article-groups*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('article-groups.index')); ?>"><i class="fas fa-lg fa-edit"></i>
                                    <span class="menu-text-wrap"><?php echo e(__('messages.article_group.article_groups')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_articles')): ?>
                            <li class="side-menus <?php echo e(Request::is('admin/articles*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('articles.index')); ?>"><i class="fab fa-lg fa-autoprefixer"></i>
                                    <span class="menu-text-wrap"><?php echo e(__('messages.articles')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_tags')): ?>
            <li class="side-menus <?php echo e(Request::is('admin/tags*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('tags.index')); ?>">
                    <i class="fas fa-tags"></i><span class="menu-text-wrap"><?php echo e(__('messages.tags')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_lead_status', 'manage_lead_sources', 'manage_leads'])): ?>
            <li class="menu-header side-menus"><?php echo e(__('messages.leads')); ?></li>
            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-tty"></i>
                    <span><?php echo e(__('messages.leads')); ?></span></a>
                <ul class="dropdown-menu side-menus">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_lead_status')): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/lead-status*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('lead.status.index')); ?>"><i class="fas fa-lg fa-blender-phone"></i>
                                <span class="menu-text-wrap"><?php echo e(__('messages.lead_status.lead_status')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_lead_sources')): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/lead-sources*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('lead.source.index')); ?>"><i class="fas fa-lg fa-globe"></i>
                                <span class="menu-text-wrap"><?php echo e(__('messages.lead_sources')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_leads')): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/leads*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('leads.index')); ?>">
                                <i class="fas fa-lg fa-tty"></i><span
                                    class="menu-text-wrap"><?php echo e(__('messages.leads')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_tasks', 'manage_tickets', 'manage_ticket_priority', 'manage_ticket_statuses',
            'manage_predefined_replies'])): ?>
            <li class="menu-header side-menus"><?php echo e(__('messages.projects')); ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_projects')): ?>
                <li class="side-menus <?php echo e(Request::is('admin/projects*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('projects.index')); ?>">
                        <i class="fas fa-lg fa-layer-group"></i>
                        <span class="menu-text-wrap"><?php echo e(__('messages.projects')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_tasks')): ?>
                <li class="side-menus <?php echo e(Request::is('admin/tasks*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('tasks.index')); ?>">
                        <i class="fas fa-lg fa-tasks"></i>
                        <span class="menu-text-wrap"><?php echo e(__('messages.tasks')); ?></span></a>
                </li>
            <?php endif; ?>

        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_invoices', 'manage_payments', 'manage_credit_notes', 'manage_proposals', 'manage_estimates'])): ?>
            <li class="menu-header side-menus"><?php echo e(__('messages.sales')); ?></li>
                <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fab fa-lg fa-speakap"></i>
                    <span><?php echo e(__('messages.sales')); ?> </span></a>
                <ul class="dropdown-menu side-menus">


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_estimates')): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/estimates*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('estimates.index')); ?>"><i class="fas fa-lg fa-calculator"></i>
                                <span class="menu-text-wrap"><?php echo e(__('messages.contact.estimates')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_invoices')): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/invoices*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('invoices.index')); ?>"><i class="fas fa-lg fa-file-invoice"></i>
                                <span class="menu-text-wrap"> <?php echo e(__('messages.invoices')); ?> </span>
                            </a>
                        </li>
                    <?php endif; ?>



                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_invoices')): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/warranty-types*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('warranty-types.index')); ?>"><i class="fas fa-lg fa-file-invoice"></i>
                                <span class="menu-text-wrap"> Warranty Periods </span>
                            </a>
                        </li>
                    <?php endif; ?>



                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_payment_mode')): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/payment-modes*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('payment-modes.index')); ?>"><i class="fab fa-lg fa-product-hunt"></i>
                                <span class="menu-text-wrap"><?php echo e(__('messages.payment_modes')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    

                    


                </ul>
            </li>
        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_expense_category')): ?>
            <li class="side-menus <?php echo e(Request::is('admin/expense-categories*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('expense-categories.index')); ?>"><i class="fas fa-lg fa-list-ol"></i>
                    <span class="menu-text-wrap">Categories</span>
                </a>
            </li>
        <?php endif; ?>



        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_departments'])): ?>
            <li class="menu-header side-menus"><?php echo e(__('messages.support')); ?></li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_departments')): ?>
                <li class="side-menus <?php echo e(Request::is('admin/departments*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('departments.index')); ?>"><i class="fas fa-lg fa-columns"></i>
                        <span class="menu-text-wrap"><?php echo e(__('messages.department.departments')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_expense_category', 'manage_expenses'])): ?>
            <?php if(auth()->user()->is_admin == 1): ?>
                <li class="menu-header side-menus"><?php echo e(__('messages.expenses')); ?></li>
                <li class="nav-item dropdown side-menus">
                    <a class="nav-link has-dropdown" href="#"><i class="fab fa-lg fa-erlang"></i>
                        <span><?php echo e(__('messages.expenses')); ?></span></a>
                    <ul class="dropdown-menu side-menus">
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_expenses')): ?>
                            <li class="side-menus <?php echo e(Request::is('admin/expenses*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('expenses.index')); ?>"><i class="fab fa-lg fa-erlang"></i>
                                    <span class="menu-text-wrap"><?php echo e(__('messages.expenses')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_settings'])): ?>
            <li class="menu-header side-menus"><?php echo e(__('messages.others')); ?></li>
            <li class="nav-item dropdown side-menus">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_announcements')): ?>
                <li class="side-menus <?php echo e(Request::is('admin/announcements*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('announcements.index')); ?>"><i class="fas fa-lg fa-bullhorn"></i>
                        <span class="menu-text-wrap"><?php echo e(__('messages.announcements')); ?></span>
                    </a>
                </li>
            <?php endif; ?>





        <?php endif; ?>


        <?php
        $manage = permission_count(auth()->user()->id, 44);
        $manage_group = permission_count(auth()->user()->id, 45);

        ?>

        <?php if($manage > 0 || auth()->user()->is_admin == 1 || $manage_group > 0): ?>

            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-sitemap"></i>
                    <span><?php echo e(__('messages.products.products')); ?> </span>
                </a>
                <ul class="dropdown-menu side-menus">
                    <?php if($manage > 0 || auth()->user()->is_admin == 1): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/products*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('products.index')); ?>"><i class="fas fa-lg fa-sitemap"></i>
                                <span class="menu-text-wrap"><?php echo e(__('messages.products.products')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if($manage_group > 0 || auth()->user()->is_admin == 1): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/product-groups*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('product-groups.index')); ?>"><i class="fas fa-lg fa-object-group"></i>
                                <span class="menu-text-wrap"><?php echo e(__('messages.product_groups')); ?></span></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>



        <?php endif; ?>


        <?php
        $manage = permission_count(auth()->user()->id, 42);

        ?>

        <?php if($manage > 0 || auth()->user()->is_admin == 1): ?>
            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fa fa-wrench" aria-hidden="true"></i>
                    <span>Installations </span>
                </a>
                <ul class="dropdown-menu side-menus">
                    <?php
                    $manage_new_product = permission_count(auth()->user()->id, 50);
                    $manage_assign_installation = permission_count(auth()->user()->id, 41);

                    ?>
                    <?php if($manage_new_product > 0 || auth()->user()->is_admin == 1  ||  $manage_assign_installation > 0): ?>
                        <li class="side-menus   <?php echo e(Request::is('admin/new_projects*') ? 'active' : ''); ?> ">

                            <a href="<?php echo e(route('newproject.index')); ?>"><i class="fa fa-plus-circle"
                                    aria-hidden="true"></i>
                                <span class="menu-text-wrap">New Projects</span>
                            </a>


                        </li>
                    <?php endif; ?>




                    <li
                        class="side-menus   <?php echo e(Request::is('admin/assign_projects*') || Request::is('admin/view_project*') ? 'active' : ''); ?> ">

                        <a href="<?php echo e(route('assign.projects')); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span class="menu-text-wrap">Edit Assigned Projects</span>
                        </a>


                    </li>


                    <li
                        class="side-menus   <?php echo e(Request::is('admin/assigned_projects*') || Request::is('admin/assigned_projects*') ? 'active' : ''); ?> ">

                        <a href="<?php echo e(route('employee.projects')); ?>"><i class="fa fa-user-plus"
                                aria-hidden="true"></i>
                            <span class="menu-text-wrap"> Assigned Projects</span>
                        </a>


                    </li>




                    <li
                        class="side-menus
                        <?php echo e(Request::is('admin/complete_projects*') || Request::is('admin/view_project*') ? 'active' : ''); ?> ">
                        
                        <a href=" <?php echo e(route('employee.complete.projects')); ?>"><i class="fa fa-check"
                                aria-hidden="true"></i>
                            <span class="menu-text-wrap">Finished Installations</span>
                        </a>


                    </li>

                    <?php
                    $manage_calendar = permission_count(auth()->user()->id, 29);

                    ?>
                    <?php if($manage_calendar > 0 || auth()->user()->is_admin == 1): ?>
                        <li class="side-menus  <?php echo e(Request::is('admin/calendar*') ? 'active' : ''); ?> ">
                            <a href="<?php echo e(route('calendar')); ?>?type=active"><i class="fas fa-lg fa-object-group"></i>
                                <span class="menu-text-wrap">Calendar</span></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>




        <?php endif; ?>

        <?php

        $open_warrany = permission_count(auth()->user()->id, 46);
        $view_warrany = permission_count(auth()->user()->id, 47);
        $void_warrany = permission_count(auth()->user()->id, 48);

        ?>

        <?php if($open_warrany > 0 || $view_warrany > 0 || $void_warrany > 0 || auth()->user()->is_admin == 1): ?>
            <li class="menu-header side-menus">After Sales</li>

            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fa fa-shield">🛡️</i>
                    <span>Warranty </span>
                </a>


                <ul class="dropdown-menu side-menus">
                    <?php if($open_warrany > 0 || auth()->user()->is_admin == 1): ?>
                        <li class="side-menus   <?php echo e(Request::is('admin/active_warranties*') ? 'active' : ''); ?> ">
                            <a href="<?php echo e(route('employee.active.warranties')); ?>"><i class="fa fa-check"
                                    aria-hidden="true"></i>
                                <span class="menu-text-wrap">Active Warranties</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if($void_warrany > 0 || auth()->user()->is_admin == 1): ?>
                        <li class="side-menus   <?php echo e(Request::is('admin/void_warranties*') ? 'active' : ''); ?> ">
                            <a href="<?php echo e(route('employee.void.warranties')); ?>"><i class="fa fa-exclamation-triangle"
                                    aria-hidden="true"></i>
                                <span class="menu-text-wrap">Voided Warranties</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="side-menus   <?php echo e(Request::is('admin/expired_warranties*') ? 'active' : ''); ?> ">
                        <a href="<?php echo e(route('employee.expired.warranties')); ?>">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            <span class="menu-text-wrap">Expired Warranties</span>
                        </a>
                    </li>




                </ul>
                



            </li>


        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_tasks', 'manage_tickets', 'manage_ticket_priority', 'manage_ticket_statuses',
        'manage_predefined_replies'])): ?>

    <li class="nav-item dropdown side-menus">
        <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-ticket-alt"></i>
            <span><?php echo e(__('messages.tickets')); ?></span></a>
        <ul class="dropdown-menu side-menus">


          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_tickets')): ?>
                <li class="side-menus <?php echo e(Request::is('admin/tickets*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('ticket.index')); ?>"><i class="fas fa-lg fa-ticket-alt"></i>
                        <span class="menu-text-wrap"><?php echo e(__('messages.tickets')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_ticket_priority')): ?>
                <li class="side-menus <?php echo e(Request::is('admin/ticket-priorities*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('ticketPriorities.index')); ?>">
                        <i class="fas fa-lg fa-sticky-note"></i>
                        <span class="menu-text-wrap"><?php echo e(__('messages.ticket_priorities')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_ticket_statuses')): ?>
                <li class="side-menus <?php echo e(Request::is('admin/ticket-statuses*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('ticket.status.index')); ?>">
                        <i class="fas fa-lg fa-info-circle"></i><span
                            class="menu-text-wrap"><?php echo e(__('messages.ticket_status.ticket_status')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_predefined_replies')): ?>
                <li class="side-menus <?php echo e(Request::is('admin/predefined-replies*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('predefinedReplies.index')); ?>">
                        <i class="fas fa-lg fa-reply"></i><span
                            class="menu-text-wrap"><?php echo e(__('messages.predefined_replies')); ?></span></a>
                </li>
            <?php endif; ?>

        </ul>
    </li>


    <?php endif; ?>




        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_contracts', 'manage_contracts_types'])): ?>
            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-file-signature"></i>
                    <span><?php echo e(__('messages.contracts')); ?></span>
                </a>
                <ul class="dropdown-menu side-menus">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_contracts')): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/contracts*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('contracts.index')); ?>"><i class="fas fa-lg fa-file-signature"></i>
                                <span class="menu-text-wrap"><?php echo e(__('messages.contracts')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_contracts_types')): ?>
                        <li class="side-menus <?php echo e(Request::is('admin/contract-types*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('contract-types.index')); ?>"><i class="fas fa-lg fa-file-contract"></i>
                                <span class="menu-text-wrap"><?php echo e(__('messages.contract_types')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_goals')): ?>
            <li class="side-menus <?php echo e(Request::is('admin/goals*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('goals.index')); ?>"><i class="fas fa-lg fa-bullseye"></i>
                    <span class="menu-text-wrap"><?php echo e(__('messages.goals')); ?></span>
                </a>
            </li>
        <?php endif; ?>



        <?php if($open_warrany > 0 || $view_warrany > 0 || $void_warrany > 0 || auth()->user()->is_admin == 1): ?>
            <li class="side-menus <?php echo e(Request::is('admin/jobs*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('employee.jobs')); ?>"><i class="fas fa-lg fa-bullseye"></i>
                    <span class="menu-text-wrap">Jobs</span>
                </a>
            </li>
        <?php endif; ?>



        <?php if(auth()->user()->is_admin == 1): ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_settings'])): ?>
                <li class="menu-header side-menus"><?php echo e(__('messages.cms')); ?></li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_services')): ?>
                    <li class="side-menus <?php echo e(Request::is('admin/services*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('services.index')); ?>">
                            <i class="fab fa-lg fa-stripe-s"></i>
                            <span class="menu-text-wrap"><?php echo e(__('messages.services')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_settings')): ?>
                    <li class="nav-item side-menus <?php echo e(Request::is('admin/settings*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('settings.show', ['group' => 'general'])); ?>">
                            <i class="nav-icon fa-lg fas fa-cogs"></i>
                            <span class="menu-text-wrap"><?php echo e(__('messages.settings')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <li class="side-menus <?php echo e(Request::is('admin/countries*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('countries.index')); ?>">
                    <i class="fas fa-lg fa-globe-asia"></i>
                    <span class="menu-text-wrap"><?php echo e(__('messages.countries')); ?></span>
                </a>
            </li>
            <li class="side-menus <?php echo e(Request::is('admin/activity-logs*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('activity.logs.index')); ?>">
                    <i class="fas fa-clipboard-check fa-lg" aria-hidden="true"></i>
                    <span><?php echo e(__('messages.activity_log.activity_logs')); ?></span>
                </a>
            </li>
            <li class="side-menus <?php echo e(Request::is('admin/translation-manager*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('translation-manager.index')); ?>">
                    <i class="fas fa-language"></i>
                    <span><?php echo e(__('messages.translation_manager')); ?></span>
                </a>
            </li>

        <?php endif; ?>
    </ul>
</aside>

<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/sidebar-menu-search/sidebar-menu-search.js')); ?>"></script>
<?php /**PATH G:\websites\crm\crm\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>