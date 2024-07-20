<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.dashboard')); ?></h1>
        </div>
        <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 col-lg-4 col-sm-6">
                            <div class="col-sm-12">
                                <p class="mt-2"><b><?php echo e(__('messages.lead.leads_overview')); ?></b></p>
                                <hr>
                                <canvas id="leadChartId" width="400" height="250" class="mt-2 mb-4"></canvas>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-sm-6">
                            <div class="col-sm-12">
                                <p class="mt-2"><b><?php echo e(__('messages.project.statistics_by_project_status')); ?></b></p>
                                <hr>
                                <canvas id="projectChartId" width="400" height="250" class="mt-2 mb-4"></canvas>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-sm-6">
                            <div class="col-sm-12">
                                <p class="mt-2"><b><?php echo e(__('messages.ticket.tickets_status')); ?></b></p>
                                <hr>
                                <canvas id="ticketChartId" width="400" height="250" class="mt-2 mb-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 dashboard-card-css">
                <div class="card card-statistic-2 d-total-one-border">
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <a href="<?php echo e(route('invoices.index')); ?>"
                               class="font-weight-bold anchor-underline"><?php echo e(__('messages.invoices')); ?></a>
                        </div>
                        <div class="card-stats-items d-stat-items-flex">
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($invoiceStatusCount['drafted']); ?></div>
                                <span class="text-warning font-weight-bold"><?php echo e(__('messages.common.drafted')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($invoiceStatusCount['unpaid']); ?></div>
                                <span class="text-primary font-weight-bold"><?php echo e(__('messages.invoice.unpaid')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($invoiceStatusCount['partially_paid']); ?></div>
                                <span class="text-info font-weight-bold"><?php echo e(__('messages.invoice.partially_paid')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($invoiceStatusCount['paid']); ?></div>
                                <span class="text-success font-weight-bold"><?php echo e(__('messages.invoice.paid')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary d-total-one-bg d-border-radius">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(__('messages.invoice.total_invoices')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($invoiceStatusCount['total_invoices']); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 dashboard-card-css">
                <div class="card card-statistic-2 d-total-two-border">
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <a href="<?php echo e(route('estimates.index')); ?>"
                               class="font-weight-bold anchor-underline"><?php echo e(__('messages.estimates')); ?></a>
                        </div>
                        <div class="card-stats-items d-stat-items-flex">
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($estimateStatusCount['drafted']); ?></div>
                                <span class="text-warning font-weight-bold"><?php echo e(__('messages.common.drafted')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($estimateStatusCount['sent']); ?></div>
                                <span class="text-primary font-weight-bold"><?php echo e(__('messages.estimate.sent')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($estimateStatusCount['declined']); ?></div>
                                <span class="text-info font-weight-bold"><?php echo e(__('messages.estimate.declined')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($estimateStatusCount['accepted']); ?></div>
                                <span class="text-success font-weight-bold"><?php echo e(__('messages.estimate.accepted')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($estimateStatusCount['expired']); ?></div>
                                <span class="text-danger font-weight-bold"><?php echo e(__('messages.estimate.expired')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary d-total-two-bg d-border-radius">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(__('messages.estimate.total_estimates')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($estimateStatusCount['total_estimates']); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 dashboard-card-css">
                <div class="card card-statistic-2 d-total-three-border">
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <a href="<?php echo e(route('proposals.index')); ?>"
                               class="font-weight-bold anchor-underline"><?php echo e(__('messages.proposals')); ?></a>
                        </div>
                        <div class="card-stats-items d-stat-items-flex">
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($proposalStatusCount['drafted']); ?></div>
                                <span class="text-warning font-weight-bold"><?php echo e(__('messages.common.drafted')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($proposalStatusCount['open']); ?></div>
                                <span class="text-danger font-weight-bold"><?php echo e(__('messages.proposal.open')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($proposalStatusCount['revised']); ?></div>
                                <span class="text-primary font-weight-bold"><?php echo e(__('messages.proposal.revised')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($proposalStatusCount['accepted']); ?></div>
                                <span class="text-success font-weight-bold"><?php echo e(__('messages.proposal.accepted')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($proposalStatusCount['declined']); ?></div>
                                <span class="text-info font-weight-bold"><?php echo e(__('messages.proposal.declined')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary d-total-three-bg d-border-radius">
                        <i class="fas fa-scroll"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(__('messages.proposal.total_proposal')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($proposalStatusCount['total_proposals']); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 dashboard-card-css">
                <div class="card card-statistic-2 d-total-four-border">
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <a href="<?php echo e(route('projects.index')); ?>"
                               class="font-weight-bold anchor-underline"><?php echo e(__('messages.projects')); ?></a>
                        </div>
                        <div class="card-stats-items d-stat-items-flex">
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($projectStatusCount['not_started']); ?></div>
                                <span class="text-danger font-weight-bold"><?php echo e(__('messages.project.not_started')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($projectStatusCount['in_progress']); ?></div>
                                <span class="text-primary font-weight-bold"><?php echo e(__('messages.project.in_progress')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($projectStatusCount['on_hold']); ?></div>
                                <span class="text-warning font-weight-bold"><?php echo e(__('messages.project.on_hold')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($projectStatusCount['cancelled']); ?></div>
                                <span class="text-info font-weight-bold"><?php echo e(__('messages.project.cancelled')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($projectStatusCount['finished']); ?></div>
                                <span class="text-success font-weight-bold"><?php echo e(__('messages.project.finished')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary d-total-four-bg d-border-radius">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(__('messages.project.total_projects')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($projectStatusCount['total_projects']); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 dashboard-card-css">
                <div class="card card-statistic-2 d-total-five-border">
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <a href="<?php echo e(route('members.index')); ?>"
                               class="font-weight-bold anchor-underline"><?php echo e(__('messages.members')); ?></a>
                        </div>
                        <div class="card-stats-items d-stat-items-flex">
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($memberCount['active_members']); ?></div>
                                <span class="text-success font-weight-bold"><?php echo e(__('messages.common.active')); ?></span>
                            </div>
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($memberCount['deactive_members']); ?></div>
                                <span class="text-danger font-weight-bold"><?php echo e(__('messages.common.deactive')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary d-total-five-bg d-border-radius">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(__('messages.member.total_members')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($memberCount['total_members']); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 dashboard-card-css">
                <div class="card card-statistic-2 d-total-six-border">
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <a href="<?php echo e(route('customers.index')); ?>"
                               class="font-weight-bold anchor-underline"><?php echo e(__('messages.customers')); ?></a>
                        </div>
                        <div class="card-stats-items d-stat-items-flex">
                            <div class="card-stats-item d-stat-item-flex">
                                <div class="card-stats-item-count"><?php echo e($customerCount['total_customers']); ?></div>
                                <span class="text-success font-weight-bold"><?php echo e(__('messages.common.active')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary d-total-six-bg d-border-radius">
                        <i class="fas fa-street-view"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(__('messages.customer.total_customers')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($customerCount['total_customers']); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 col-lg-4 col-sm-6">
                            <div class="col-sm-12">
                                <p class="text-dark mt-3">
                                    <a href="<?php echo e(route('invoices.index')); ?>"
                                       class="inline-block font-weight-bold anchor-underline"><?php echo e(__('messages.invoice.invoice_overview')); ?></a>
                                </p>
                                <hr>
                            </div>
                            <?php
                                $style = 'style';
                                $width = 'width';
                            ?>
                            <div class="col-md-12 d-flex">
                                <span class="inline-block font-weight-bold text-warning"> <?php echo e(__('messages.common.drafted')); ?></span>
                            </div>
                            <div class="col-md-12 progress-finance-status">
                                <div class="progress progress-bar-mini height-25 mt-3">
                                    <div class="progress-bar" role="progressbar"
                                         aria-valuenow="<?php echo e($invoiceStatusCount['drafted'] * 100/totalCountForDashboard($invoiceStatusCount['total_invoices'])); ?>" aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?> :<?php echo e($invoiceStatusCount['drafted'] * 100/totalCountForDashboard($invoiceStatusCount['total_invoices'])); ?>%">
                                    <?php echo e(number_format($invoiceStatusCount['drafted'] * 100/totalCountForDashboard($invoiceStatusCount['total_invoices']),2)); ?>%
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex">
                            <span class="inline-block font-weight-bold text-primary"><?php echo e(__('messages.invoice.unpaid_cap')); ?></span>
                        </div>
                        <div class="col-md-12 progress-finance-status">
                            <div class="progress progress-bar-mini height-25 mt-3">
                                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($invoiceStatusCount['unpaid'] * 100/totalCountForDashboard($invoiceStatusCount['total_invoices'])); ?>"
                                     aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?> :<?php echo e($invoiceStatusCount['unpaid'] * 100/totalCountForDashboard($invoiceStatusCount['total_invoices'])); ?>%">
                                <?php echo e(number_format($invoiceStatusCount['unpaid'] * 100/totalCountForDashboard($invoiceStatusCount['total_invoices']),2)); ?>%
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mt-3 d-flex">
                        <span class="inline-block font-weight-bold text-success"> <?php echo e(__('messages.invoice.paid_cap')); ?></span>
                            </div>
                            <div class="col-md-12 progress-finance-status">
                                <div class="progress progress-bar-mini height-25 mt-3">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($invoiceStatusCount['paid'] * 100/totalCountForDashboard($invoiceStatusCount['total_invoices'])); ?>"
                                         aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?>: <?php echo e($invoiceStatusCount['paid'] * 100/totalCountForDashboard($invoiceStatusCount['total_invoices'])); ?>%">
                                    <?php echo e(number_format($invoiceStatusCount['paid'] * 100/totalCountForDashboard($invoiceStatusCount['total_invoices']),2)); ?>%
                                </div>
                            </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4 col-sm-6">
                <div class="col-sm-12">
                    <p class="text-dark mt-3">
                        <a href="<?php echo e(route('estimates.index')); ?>"
                           class="inline-block font-weight-bold anchor-underline"><?php echo e(__('messages.estimate.estimate_overview')); ?></a>
                    </p>
                    <hr>
                </div>
                <div class="col-sm-12 d-flex">
                    <span class="inline-block font-weight-bold ml-2 text-warning"> <?php echo e(__('messages.common.drafted')); ?></span>
                </div>
                <div class="col-md-12 text-right progress-finance-status">
                    <div class="progress progress-bar-mini height-25 mt-3">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($estimateStatusCount['drafted'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates'])); ?>" aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?> :<?php echo e($estimateStatusCount['drafted'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates'])); ?>%">
                        <?php echo e(number_format($estimateStatusCount['drafted'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates']),2)); ?>%
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-3 d-flex">
                <span class="inline-block font-weight-bold ml-2 text-primary"> <?php echo e(__('messages.estimate.sent')); ?></span>
            </div>
            <div class="col-md-12 text-right progress-finance-status">
                <div class="progress progress-bar-mini height-25 mt-3">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($estimateStatusCount['sent'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates'])); ?>"
                         aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?> :<?php echo e($estimateStatusCount['sent'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates'])); ?>%">
                    <?php echo e(number_format($estimateStatusCount['sent'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates']),2)); ?>%
                </div>
            </div>
        </div>

        <div class="col-sm-12 mt-3 d-flex">
            <span class="inline-block font-weight-bold ml-2 text-success"> <?php echo e(__('messages.estimate.accepted')); ?></span>
        </div>
        <div class="col-md-12 text-right progress-finance-status">
            <div class="progress progress-bar-mini height-25 mt-3">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($estimateStatusCount['accepted'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates'])); ?>"
                     aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?> :<?php echo e($estimateStatusCount['accepted'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates'])); ?>%">
                <?php echo e(number_format($estimateStatusCount['accepted'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates']),2)); ?> %
                </div>
            </div>
        </div>

        <div class="col-sm-12 mt-3 d-flex">
            <span class="inline-block font-weight-bold ml-2 text-danger"> <?php echo e(__('messages.estimate.expired')); ?></span>
        </div>
        <div class="col-md-12 text-right progress-finance-status">
            <div class="progress progress-bar-mini height-25 mt-3">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($estimateStatusCount['expired'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates'])); ?>" aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?> :<?php echo e($estimateStatusCount['expired'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates'])); ?>%">
                <?php echo e(number_format($estimateStatusCount['expired'] * 100/totalCountForDashboard($estimateStatusCount['total_estimates']),2)); ?>%
            </div>
        </div>
        </div>
        </div>

        <div class="col-md-12 col-lg-4 col-sm-6">
            <div class="col-sm-12">
                <p class="text-dark mt-3">
                    <a href="<?php echo e(route('proposals.index')); ?>"
                       class="inline-block font-weight-bold anchor-underline"><?php echo e(__('messages.proposal.proposal_overview')); ?></a>
                </p>
                <hr>
            </div>
            <div class="col-sm-12 d-flex">
                <span class="inline-block font-weight-bold text-warning"><?php echo e(__('messages.common.drafted')); ?></span>
            </div>
            <div class="col-md-12 text-right progress-finance-status">
                <div class="progress progress-bar-mini height-25 mt-3">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($proposalStatusCount['drafted'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals'])); ?>" aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?> :<?php echo e($proposalStatusCount['drafted'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals'])); ?>%">
                    <?php echo e(number_format($proposalStatusCount['drafted'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals']),2)); ?>%
                </div>
            </div>
        </div>

        <div class="col-sm-12 mt-3 d-flex">
            <span class="inline-block font-weight-bold text-danger"> <?php echo e(__('messages.proposal.open')); ?></span>
        </div>
        <div class="col-md-12 text-right progress-finance-status">
            <div class="progress progress-bar-mini height-25 mt-3">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($proposalStatusCount['open'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals'])); ?>"
                     aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?> : <?php echo e($proposalStatusCount['open'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals'])); ?>%">
                <?php echo e(number_format($proposalStatusCount['open'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals']),2)); ?>%
            </div>
        </div>
        </div>

        <div class="col-sm-12 mt-3 d-flex">
            <span class="inline-block font-weight-bold text-primary"> <?php echo e(__('messages.proposal.revised')); ?></span>
        </div>
        <div class="col-md-12 text-right progress-finance-status">
            <div class="progress progress-bar-mini height-25 mt-3">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($proposalStatusCount['revised'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals'])); ?>" aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?> : <?php echo e($proposalStatusCount['revised'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals'])); ?>%">
                <?php echo e(number_format($proposalStatusCount['revised'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals']),2)); ?>%
            </div>
        </div>
        </div>

        <div class="col-sm-12 mt-3 d-flex">
            <span class="inline-block font-weight-bold text-success"> <?php echo e(__('messages.proposal.accepted')); ?></span>
        </div>
        <div class="col-md-12 text-right progress-finance-status">
            <div class="progress progress-bar-mini height-25 mt-3">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo e($proposalStatusCount['accepted'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals'])); ?>" aria-valuemin="0" aria-valuemax="100" <?php echo e($style); ?>="<?php echo e($width); ?> : <?php echo e($proposalStatusCount['accepted'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals'])); ?>%"><?php echo e(number_format($proposalStatusCount['accepted'] * 100/totalCountForDashboard($proposalStatusCount['total_proposals']),2)); ?>

                %
            </div>
        </div>
        </div>
        </div>
        </div>
        <hr>
        </div>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-dark"><?php echo e(__('messages.common.weekly_payment_records')); ?></h6>
                    </div>
                    <div class="card-body">
                        <canvas id="weeklyPaymentChart" width="400" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-dark"><?php echo e(__('messages.common.incomes_vs_expenses')); ?></h6>
                    </div>
                    <div class="card-body">
                        <canvas id="incomeVsExpenseChart" width="400" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-dark w-100"><?php echo e(__('messages.contract.contracts_expiring_this_month')); ?></h6>
                        <div>
                            <?php echo Form::select('month', $months, $currentMonth,['class' => 'form-control', 'id' => 'monthId']); ?>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-responsive-sm" id="contractExpiredTable">
                            <thead class="text-white contract-table-bg-color">
                            <tr>
                                <td><?php echo e(__('messages.contract.subject')); ?></td>
                                <td><?php echo e(__('messages.contract.customer_id')); ?></td>
                                <td><?php echo e(__('messages.contract.start_date')); ?></td>
                                <td><?php echo e(__('messages.contract.end_date')); ?></td>
                            </tr>
                            </thead>
                            <tbody class="expiring-contracts">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('dashboard.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script>
        let leadData = JSON.parse('<?php echo json_encode($leadStatuses, 15, 512) ?>');
        let projectStatus = JSON.parse('<?php echo json_encode($projectStatus, 15, 512) ?>');
        let projectStatusCounts = JSON.parse('<?php echo json_encode($projectStatusCount, 15, 512) ?>');
        let ticketStatusData = JSON.parse('<?php echo json_encode($ticketStatus, 15, 512) ?>');
        let currentWeekInvoices = JSON.parse('<?php echo json_encode($currentWeekInvoices, 15, 512) ?>');
        let lastWeekInvoices = JSON.parse('<?php echo json_encode($lastWeekInvoices, 15, 512) ?>');
        let incomeAndExpenseData = JSON.parse('<?php echo json_encode($monthWiseRecords, 15, 512) ?>');
        let expiringContractLists = JSON.parse('<?php echo json_encode($contractsCurrentMonths, 15, 512) ?>');
    </script>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/custom-datatable.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/bs4-summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/chart/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/dashboard/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>