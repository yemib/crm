<aside id="sidebar-wrapper">
    <div class="sidebar-brand sidebar-sticky sidebar-bottom-padding h-auto line-height-0 padding-bottom-zero">
        <a class="navbar-brand d-flex align-items-center justify-content-center py-3 px-2"
            href="{{ route('redirect.login') }}">
            <img class="navbar-brand-full w-25" src="{{ getAppLogo() ?? asset('img/infyom-logo.png') }}" width="50px"
                alt="">&nbsp;&nbsp;
            <span class="navbar-brand-full-name text-black text-wrap pl-2 w-75">{{ getAppName() }}</span>
        </a>
        <div class="input-group sidebar-search-box">
            <input type="text" class="form-control searchTerm" id="searchText"
                placeholder="{{ __('messages.placeholder.search_menu') }}">
            <div class="input-group-append sGroup">
                <div class="input-group-text">
                    <i class="fas fa-search search-sign"></i>
                    <i class="fas fa-times close-sign"></i>
                </div>
            </div>
            <div class="no-results mt-3 ml-1">{{ __('messages.no_matching_records_found') }}</div>
        </div>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('redirect.login') }}" class="small text-white">
            <img class="navbar-brand-full" src="{{ getAppLogo() ?? asset('img/infyom-logo.png') }}" width="50px"
                alt="">
        </a>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-header side-menus">{{ __('messages.dashboard') }}</li>


        <li class="side-menus {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-lg fa-tachometer-alt"></i>
                <span class="menu-text-wrap">{{ __('messages.dashboard') }}</span></a>
        </li>
        @if (auth()->user()->id == 1)
            <li class="side-menus ">
                <a target="_blank" class="nav-link" href="{{ route('cal_login') }}"><i
                        class="fas fa-lg fa-tachometer-alt"></i>
                    <span class="menu-text-wrap"> Login To Cal </span></a>
            </li>
        @endif


        <!--  assign projects--->
        {{-- @can('assign_installations') --}}

        <?php
        $assign = permission_count(auth()->user()->id, 41);
        $manage = permission_count(auth()->user()->id, 42);

        ?>


        @if ($assign > 0 && $manage == 0)
            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fa fa-wrench" aria-hidden="true"></i>
                    <span>Installations </span>
                </a>
                <ul class="dropdown-menu side-menus">

                    <li class="side-menus   {{ Request::is('admin/assigned_projects*') ? 'active' : '' }} ">

                        <a href="{{ route('employee.projects') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span class="menu-text-wrap">Assigned Projects</span>
                        </a>


                    </li>
                    <li class="side-menus   {{ Request::is('admin/complete_projects*') ? 'active' : '' }} ">

                        <a href="{{ route('employee.complete.projects') }}"><i class="fa fa-check"
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

                    <li class="side-menus   {{ Request::is('admin/active_warranties*') ? 'active' : '' }} ">
                        <a href="{{ route('employee.active.warranties') }}"><i class="fa fa-check"
                                aria-hidden="true"></i>
                            <span class="menu-text-wrap">Active Warranties</span>
                        </a>
                    </li>

                    <li class="side-menus   {{ Request::is('admin/void_warranties*') ? 'active' : '' }} ">
                        <a href="{{ route('employee.void.warranties') }}"><i class="fa fa-exclamation-triangle"
                                aria-hidden="true"></i>
                            <span class="menu-text-wrap">Voided Warranties</span>
                        </a>
                    </li>

                    <li class="side-menus   {{ Request::is('admin/expired_warranties*') ? 'active' : '' }} ">
                        <a href="{{ route('employee.expired.warranties') }}">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            <span class="menu-text-wrap">Expired Warranties</span>
                        </a>
                    </li>




                </ul>
            </li>
        @endif



        {{-- @endcan --}}




        @canany(['manage_customers', 'manage_customer_groups'])
            <li class="menu-header side-menus">{{ __('messages.customers') }}</li>
            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-street-view"></i>
                    <span>{{ __('messages.customers') }}</span></a>
                <ul class="dropdown-menu side-menus">
                    @can('manage_customer_groups')
                        <li class="side-menus {{ Request::is('admin/customer-groups*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('customer-groups.index') }}">
                                <i class="fas fa-lg fa-people-arrows"></i>
                                <span class="menu-text-wrap">{{ __('messages.customer_groups') }}</span></a>
                        </li>
                    @endcan
                    @can('manage_customers')
                        <li
                            class="side-menus {{ Request::is('admin/customers*') || Request::is('admin/contacts*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('customers.index') }}">
                                <i class="fas fa-lg fa-street-view"></i><span
                                    class="menu-text-wrap">{{ __('messages.customers') }}</span></a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
        @can('manage_staff_member')

        <li class="nav-item dropdown side-menus">
            <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-user-friends"></i>
                <span>Members</span></a>

            <ul class="dropdown-menu side-menus">

                    <li class="side-menus {{ Request::is('admin/member-groups*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('member-groups.index') }}">
                            <i class="fas fa-lg fa-people-arrows"></i>
                            <span class="menu-text-wrap">Member Groups</span></a>
                    </li>

                    <li class="side-menus {{ Request::is('admin/members*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('members.index') }}"><i class="fas fa-lg fa-user-friends"></i>
                            <span class="menu-text-wrap">{{ __('messages.members') }} </span>
                        </a>
                    </li>

            </ul>

        </li>
        @endcan

        @canany(['manage_articles', 'manage_article_groups'])
            @if (auth()->user()->is_admin == 1)
                <li class="nav-item dropdown side-menus">
                    <a class="nav-link has-dropdown" href="#"><i class="fab fa-lg fa-autoprefixer"></i>
                        <span>{{ __('messages.articles') }}</span></a>
                    <ul class="dropdown-menu side-menus">
                        @can('manage_article_groups')
                            <li class="side-menus {{ Request::is('admin/article-groups*') ? 'active' : '' }}">
                                <a href="{{ route('article-groups.index') }}"><i class="fas fa-lg fa-edit"></i>
                                    <span class="menu-text-wrap">{{ __('messages.article_group.article_groups') }}</span>
                                </a>
                            </li>
                        @endcan


                        @can('manage_articles')
                            <li class="side-menus {{ Request::is('admin/articles*') ? 'active' : '' }}">
                                <a href="{{ route('articles.index') }}"><i class="fab fa-lg fa-autoprefixer"></i>
                                    <span class="menu-text-wrap">{{ __('messages.articles') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

        @endcanany
        @can('manage_tags')
            <li class="side-menus {{ Request::is('admin/tags*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('tags.index') }}">
                    <i class="fas fa-tags"></i><span class="menu-text-wrap">{{ __('messages.tags') }}</span>
                </a>
            </li>
        @endcan
        @canany(['manage_lead_status', 'manage_lead_sources', 'manage_leads'])
            <li class="menu-header side-menus">{{ __('messages.leads') }}</li>
            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-tty"></i>
                    <span>{{ __('messages.leads') }}</span></a>
                <ul class="dropdown-menu side-menus">
                    @can('manage_lead_status')
                        <li class="side-menus {{ Request::is('admin/lead-status*') ? 'active' : '' }}">
                            <a href="{{ route('lead.status.index') }}"><i class="fas fa-lg fa-blender-phone"></i>
                                <span class="menu-text-wrap">{{ __('messages.lead_status.lead_status') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_lead_sources')
                        <li class="side-menus {{ Request::is('admin/lead-sources*') ? 'active' : '' }}">
                            <a href="{{ route('lead.source.index') }}"><i class="fas fa-lg fa-globe"></i>
                                <span class="menu-text-wrap">{{ __('messages.lead_sources') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_leads')
                        <li class="side-menus {{ Request::is('admin/leads*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('leads.index') }}">
                                <i class="fas fa-lg fa-tty"></i><span
                                    class="menu-text-wrap">{{ __('messages.leads') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
        @canany(['manage_tasks', 'manage_tickets', 'manage_ticket_priority', 'manage_ticket_statuses',
            'manage_predefined_replies'])
            <li class="menu-header side-menus">{{ __('messages.projects') }}
                @can('manage_projects')
                <li class="side-menus {{ Request::is('admin/projects*') ? 'active' : '' }}">
                    <a href="{{ route('projects.index') }}">
                        <i class="fas fa-lg fa-layer-group"></i>
                        <span class="menu-text-wrap">{{ __('messages.projects') }}</span>
                    </a>
                </li>
            @endcan
            @can('manage_tasks')
                <li class="side-menus {{ Request::is('admin/tasks*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tasks.index') }}">
                        <i class="fas fa-lg fa-tasks"></i>
                        <span class="menu-text-wrap">{{ __('messages.tasks') }}</span></a>
                </li>
            @endcan

        @endcanany
        @canany(['manage_invoices', 'manage_payments', 'manage_credit_notes', 'manage_proposals', 'manage_estimates'])
            <li class="menu-header side-menus">{{ __('messages.sales') }}</li>
                <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fab fa-lg fa-speakap"></i>
                    <span>{{ __('messages.sales') }} </span></a>
                <ul class="dropdown-menu side-menus">


                    @can('manage_estimates')
                        <li class="side-menus {{ Request::is('admin/estimates*') ? 'active' : '' }}">
                            <a href="{{ route('estimates.index') }}"><i class="fas fa-lg fa-calculator"></i>
                                <span class="menu-text-wrap">{{ __('messages.contact.estimates') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage_invoices')
                        <li class="side-menus {{ Request::is('admin/invoices*') ? 'active' : '' }}">
                            <a href="{{ route('invoices.index') }}"><i class="fas fa-lg fa-file-invoice"></i>
                                <span class="menu-text-wrap"> {{ __('messages.invoices') }} </span>
                            </a>
                        </li>
                    @endcan



                    @can('manage_invoices')
                        <li class="side-menus {{ Request::is('admin/warranty-types*') ? 'active' : '' }}">
                            <a href="{{ route('warranty-types.index') }}"><i class="fas fa-lg fa-file-invoice"></i>
                                <span class="menu-text-wrap"> Warranty Periods </span>
                            </a>
                        </li>
                    @endcan



                    @can('manage_payment_mode')
                        <li class="side-menus {{ Request::is('admin/payment-modes*') ? 'active' : '' }}">
                            <a href="{{ route('payment-modes.index') }}"><i class="fab fa-lg fa-product-hunt"></i>
                                <span class="menu-text-wrap">{{ __('messages.payment_modes') }}</span>
                            </a>
                        </li>
                    @endcan

                    {{--   @can('manage_credit_notes')
                        <li class="side-menus {{ Request::is('admin/credit-notes*') ? 'active' : '' }}">
                            <a href="{{ route('credit-notes.index') }}"><i class="fas fa-lg fa-clipboard"></i>
                                <span class="menu-text-wrap">{{ __('messages.credit_notes') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_proposals')
                        <li class="side-menus {{ Request::is('admin/proposals*') ? 'active' : '' }}">
                            <a href="{{ route('proposals.index') }}"><i class="fas fa-lg fa-scroll"></i>
                                <span class="menu-text-wrap">{{ __('messages.proposals') }}</span>
                            </a>
                        </li>
                    @endcan

                    --}}

                    {{--
                    @can('manage_payments')
                        <li class="side-menus {{ Request::is('admin/payments-list*') ? 'active' : '' }}">
                            <a href="{{ route('payments.list.index') }}"><i class="fas fa-lg fa-money-check-alt"></i>
                                <span class="menu-text-wrap">
                                    {{ __('messages.invoice.invoice_payments') }}</span>
                            </a>
                        </li>
                    @endcan --}}


                </ul>
            </li>
        @endcanany


        @can('manage_expense_category')
            <li class="side-menus {{ Request::is('admin/expense-categories*') ? 'active' : '' }}">
                <a href="{{ route('expense-categories.index') }}"><i class="fas fa-lg fa-list-ol"></i>
                    <span class="menu-text-wrap">Categories</span>
                </a>
            </li>
        @endcan


        @can('manage_predefined_replies')
        <li class="side-menus {{ Request::is('admin/predefined-replies*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('predefinedReplies.index') }}">
                <i class="fas fa-lg fa-reply"></i><span
                    class="menu-text-wrap">{{ __('messages.predefined_replies') }}</span></a>
        </li>
    @endcan




        @canany(['manage_departments'])
            <li class="menu-header side-menus">{{ __('messages.support') }}</li>
            @can('manage_departments')
                <li class="side-menus {{ Request::is('admin/departments*') ? 'active' : '' }}">
                    <a href="{{ route('departments.index') }}"><i class="fas fa-lg fa-columns"></i>
                        <span class="menu-text-wrap">{{ __('messages.department.departments') }}</span>
                    </a>
                </li>
            @endcan
        @endcanany
        @canany(['manage_expense_category', 'manage_expenses'])
            @if (auth()->user()->is_admin == 1)
                <li class="menu-header side-menus">{{ __('messages.expenses') }}</li>
                <li class="nav-item dropdown side-menus">
                    <a class="nav-link has-dropdown" href="#"><i class="fab fa-lg fa-erlang"></i>
                        <span>{{ __('messages.expenses') }}</span></a>
                    <ul class="dropdown-menu side-menus">
                        {{--  @can('manage_expense_category')
                        <li class="side-menus {{ Request::is('admin/expense-categories*') ? 'active' : '' }}">
                            <a href="{{ route('expense-categories.index') }}"><i class="fas fa-lg fa-list-ol"></i>
                                <span class="menu-text-wrap">{{ __('messages.expense_categories') }}</span>
                            </a>
                        </li>
                    @endcan --}}
                        @can('manage_expenses')
                            <li class="side-menus {{ Request::is('admin/expenses*') ? 'active' : '' }}">
                                <a href="{{ route('expenses.index') }}"><i class="fab fa-lg fa-erlang"></i>
                                    <span class="menu-text-wrap">{{ __('messages.expenses') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

        @endcanany

        {{--
        @can('manage_tax_rates')
            <li class="side-menus {{ Request::is('admin/tax-rates*') ? 'active' : '' }}">
                <a href="{{ route('tax-rates.index') }}"><i class="fas fa-lg fa-percent"></i>
                    <span class="menu-text-wrap">{{ __('messages.tax_rates') }}</span>
                </a>
            </li>
        @endcan
 --}}
        @canany(['manage_settings'])
            <li class="menu-header side-menus">{{ __('messages.others') }}</li>
            <li class="nav-item dropdown side-menus">
                @can('manage_announcements')
                <li class="side-menus {{ Request::is('admin/announcements*') ? 'active' : '' }}">
                    <a href="{{ route('announcements.index') }}"><i class="fas fa-lg fa-bullhorn"></i>
                        <span class="menu-text-wrap">{{ __('messages.announcements') }}</span>
                    </a>
                </li>
            @endcan





        @endcanany


        <?php
        $manage = permission_count(auth()->user()->id, 44);
        $manage_group = permission_count(auth()->user()->id, 45);

        ?>

        @if ($manage > 0 || auth()->user()->is_admin == 1 || $manage_group > 0)

            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-sitemap"></i>
                    <span>{{ __('messages.products.products') }} </span>
                </a>
                <ul class="dropdown-menu side-menus">
                    @if ($manage > 0 || auth()->user()->is_admin == 1)
                        <li class="side-menus {{ Request::is('admin/products*') ? 'active' : '' }}">
                            <a href="{{ route('products.index') }}"><i class="fas fa-lg fa-sitemap"></i>
                                <span class="menu-text-wrap">{{ __('messages.products.products') }}</span>
                            </a>
                        </li>
                    @endif
                    @if ($manage_group > 0 || auth()->user()->is_admin == 1)
                        <li class="side-menus {{ Request::is('admin/product-groups*') ? 'active' : '' }}">
                            <a href="{{ route('product-groups.index') }}"><i class="fas fa-lg fa-object-group"></i>
                                <span class="menu-text-wrap">{{ __('messages.product_groups') }}</span></a>
                        </li>
                    @endif
                </ul>
            </li>



        @endif


        <?php
        $manage = permission_count(auth()->user()->id, 42);

        ?>

        @if ($manage > 0 || auth()->user()->is_admin == 1)
            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fa fa-wrench" aria-hidden="true"></i>
                    <span>Installations </span>
                </a>
                <ul class="dropdown-menu side-menus">
                    <?php
                    $manage_new_product = permission_count(auth()->user()->id, 50);
                    $manage_assign_installation = permission_count(auth()->user()->id, 41);

                    ?>
                    @if ($manage_new_product > 0 || auth()->user()->is_admin == 1  ||  $manage_assign_installation > 0)
                        <li class="side-menus   {{ Request::is('admin/new_projects*') ? 'active' : '' }} ">

                            <a href="{{ route('newproject.index') }}"><i class="fa fa-plus-circle"
                                    aria-hidden="true"></i>
                                <span class="menu-text-wrap">New Projects</span>
                            </a>


                        </li>
                    @endif




                    <li
                        class="side-menus   {{ Request::is('admin/assign_projects*') || Request::is('admin/view_project*') ? 'active' : '' }} ">

                        <a href="{{ route('assign.projects') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span class="menu-text-wrap">Edit Assigned Projects</span>
                        </a>


                    </li>


                    <li
                        class="side-menus   {{ Request::is('admin/assigned_projects*') || Request::is('admin/assigned_projects*') ? 'active' : '' }} ">

                        <a href="{{ route('employee.projects') }}"><i class="fa fa-user-plus"
                                aria-hidden="true"></i>
                            <span class="menu-text-wrap"> Assigned Projects</span>
                        </a>


                    </li>




                    <li
                        class="side-menus
                        {{ Request::is('admin/complete_projects*') || Request::is('admin/view_project*') ? 'active' : '' }} ">
                        {{--  {{ route('finished.projects') }}?type=open --}}
                        <a href=" {{ route('employee.complete.projects') }}"><i class="fa fa-check"
                                aria-hidden="true"></i>
                            <span class="menu-text-wrap">Finished Installations</span>
                        </a>


                    </li>

                    <?php
                    $manage_calendar = permission_count(auth()->user()->id, 29);

                    ?>
                    @if ($manage_calendar > 0 || auth()->user()->is_admin == 1)
                        <li class="side-menus  {{ Request::is('admin/calendar*') ? 'active' : '' }} ">
                            <a href="{{ route('calendar') }}?type=active"><i class="fas fa-lg fa-object-group"></i>
                                <span class="menu-text-wrap">Calendar</span></a>
                        </li>
                    @endif
                </ul>
            </li>




        @endif

        <?php

        $open_warrany = permission_count(auth()->user()->id, 46);
        $view_warrany = permission_count(auth()->user()->id, 47);
        $void_warrany = permission_count(auth()->user()->id, 48);
        $job  =  permission_count(auth()->user()->id, 51);

        ?>

        @if ($open_warrany > 0 || $view_warrany > 0 || $void_warrany > 0 || auth()->user()->is_admin == 1)
            <li class="menu-header side-menus">After Sales</li>

            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fa fa-shield">🛡️</i>
                    <span>Warranty </span>
                </a>


                <ul class="dropdown-menu side-menus">
                    @if ($open_warrany > 0 || auth()->user()->is_admin == 1)
                        <li class="side-menus   {{ Request::is('admin/active_warranties*') ? 'active' : '' }} ">
                            <a href="{{ route('employee.active.warranties') }}"><i class="fa fa-check"
                                    aria-hidden="true"></i>
                                <span class="menu-text-wrap">Active Warranties</span>
                            </a>
                        </li>
                    @endif

                    @if ($void_warrany > 0 || auth()->user()->is_admin == 1)
                        <li class="side-menus   {{ Request::is('admin/void_warranties*') ? 'active' : '' }} ">
                            <a href="{{ route('employee.void.warranties') }}"><i class="fa fa-exclamation-triangle"
                                    aria-hidden="true"></i>
                                <span class="menu-text-wrap">Voided Warranties</span>
                            </a>
                        </li>
                    @endif

                    <li class="side-menus   {{ Request::is('admin/expired_warranties*') ? 'active' : '' }} ">
                        <a href="{{ route('employee.expired.warranties') }}">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            <span class="menu-text-wrap">Expired Warranties</span>
                        </a>
                    </li>




                </ul>
                {{--      <ul class="dropdown-menu side-menus">
                                  @can('manage_items')
                                      <li class="side-menus @if (isset($_GET['type']))
                                       @if ($_GET['type'] == 'open'){{ Request::is('admin/warranties*') ? 'active' : '' }}   @endif  @endif ">
                                          <a href="{{ route('warranty.index') }}?type=open"><i class="fas fa-lg fa-sitemap"></i>
                                              <span class="menu-text-wrap">Open Warranty</span>
                                          </a>
                                      </li>
                                  @endcan

                                  @can('manage_items_groups')
                                      <li class="side-menus @if (isset($_GET['type']))  @if ($_GET['type'] == 'active'){{ Request::is('admin/warranties*') ? 'active' : '' }}   @endif  @endif ">
                                          <a href="{{ route('warranty.index') }}?type=active"><i class="fas fa-lg fa-object-group"></i>
                                              <span class="menu-text-wrap">Active Warranty</span></a>
                                      </li>
                                  @endcan
                              </ul>

                      --}}



            </li>


        @endif


        @canany(['manage_tasks', 'manage_tickets', 'manage_ticket_priority', 'manage_ticket_statuses',
        'manage_predefined_replies'])

    <li class="nav-item dropdown side-menus">
        <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-ticket-alt"></i>
            <span>{{ __('messages.tickets') }}</span></a>
        <ul class="dropdown-menu side-menus">


          @can('manage_tickets')
                <li class="side-menus {{ Request::is('admin/tickets*') ? 'active' : '' }}">
                    <a href="{{ route('ticket.index') }}"><i class="fas fa-lg fa-ticket-alt"></i>
                        <span class="menu-text-wrap">{{ __('messages.tickets') }}</span>
                    </a>
                </li>
            @endcan
            @can('manage_ticket_priority')
                <li class="side-menus {{ Request::is('admin/ticket-priorities*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ticketPriorities.index') }}">
                        <i class="fas fa-lg fa-sticky-note"></i>
                        <span class="menu-text-wrap">{{ __('messages.ticket_priorities') }}</span>
                    </a>
                </li>
            @endcan
            @can('manage_ticket_statuses')
                <li class="side-menus {{ Request::is('admin/ticket-statuses*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ticket.status.index') }}">
                        <i class="fas fa-lg fa-info-circle"></i><span
                            class="menu-text-wrap">{{ __('messages.ticket_status.ticket_status') }}</span></a>
                </li>
            @endcan


        </ul>
    </li>


    @endcanany




        @canany(['manage_contracts', 'manage_contracts_types'])
            <li class="nav-item dropdown side-menus">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-lg fa-file-signature"></i>
                    <span>{{ __('messages.contracts') }}</span>
                </a>
                <ul class="dropdown-menu side-menus">
                    @can('manage_contracts')
                        <li class="side-menus {{ Request::is('admin/contracts*') ? 'active' : '' }}">
                            <a href="{{ route('contracts.index') }}"><i class="fas fa-lg fa-file-signature"></i>
                                <span class="menu-text-wrap">{{ __('messages.contracts') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_contracts_types')
                        <li class="side-menus {{ Request::is('admin/contract-types*') ? 'active' : '' }}">
                            <a href="{{ route('contract-types.index') }}"><i class="fas fa-lg fa-file-contract"></i>
                                <span class="menu-text-wrap">{{ __('messages.contract_types') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany


        @can('manage_goals')
            <li class="side-menus {{ Request::is('admin/goals*') ? 'active' : '' }}">
                <a href="{{ route('goals.index') }}"><i class="fas fa-lg fa-bullseye"></i>
                    <span class="menu-text-wrap">{{ __('messages.goals') }}</span>
                </a>
            </li>
        @endcan



        @if ($job > 0  || auth()->user()->is_admin == 1)
            <li class="side-menus {{ Request::is('admin/jobs*') ? 'active' : '' }}">
                <a href="{{ route('employee.jobs') }}"><i class="fas fa-lg fa-bullseye"></i>
                    <span class="menu-text-wrap">Jobs</span>
                </a>
            </li>
        @endif



        @if (auth()->user()->is_admin == 1)

            @canany(['manage_settings'])
                <li class="menu-header side-menus">{{ __('messages.cms') }}</li>
                @can('manage_services')
                    <li class="side-menus {{ Request::is('admin/services*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('services.index') }}">
                            <i class="fab fa-lg fa-stripe-s"></i>
                            <span class="menu-text-wrap">{{ __('messages.services') }}</span>
                        </a>
                    </li>
                @endcan
                @can('manage_settings')
                    <li class="nav-item side-menus {{ Request::is('admin/settings*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('settings.show', ['group' => 'general']) }}">
                            <i class="nav-icon fa-lg fas fa-cogs"></i>
                            <span class="menu-text-wrap">{{ __('messages.settings') }}</span>
                        </a>
                    </li>
                @endcan
            @endcanany
            <li class="side-menus {{ Request::is('admin/countries*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('countries.index') }}">
                    <i class="fas fa-lg fa-globe-asia"></i>
                    <span class="menu-text-wrap">{{ __('messages.countries') }}</span>
                </a>
            </li>
            <li class="side-menus {{ Request::is('admin/activity-logs*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('activity.logs.index') }}">
                    <i class="fas fa-clipboard-check fa-lg" aria-hidden="true"></i>
                    <span>{{ __('messages.activity_log.activity_logs') }}</span>
                </a>
            </li>
            <li class="side-menus {{ Request::is('admin/translation-manager*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('translation-manager.index') }}">
                    <i class="fas fa-language"></i>
                    <span>{{ __('messages.translation_manager') }}</span>
                </a>
            </li>

        @endif
    </ul>
</aside>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ mix('assets/js/sidebar-menu-search/sidebar-menu-search.js') }}"></script>
