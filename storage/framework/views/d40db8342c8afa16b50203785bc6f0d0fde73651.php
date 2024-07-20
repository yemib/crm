<?php $__env->startSection('section'); ?>
    <hr>
    <div class="my-3 d-flex justify-content-between flex-sm-row flex-column">
        <div>
            <a href="#"
               class="btn text-white mt-sm-0 mt-2 mb-sm-0 mb-2 status-<?php echo e(\App\Models\Estimate::STATUS[$estimate->status]); ?>">
                <?php echo e(\App\Models\Estimate::STATUS[$estimate->status]); ?>

            </a>
        </div>
        <div class="d-flex justify-content-end align-items-center">
            <div class="dropdown d-inline">
                <button class="btn btn-warning dropdown-toggle mr-1 mobile-font-size" type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                    <?php echo e(__('messages.estimate.more')); ?>

                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?php echo e(route('estimate.pdf', ['estimate' => $estimate->id])); ?>" class="dropdown-item">
                        <?php echo e(__('messages.common.download_as_pdf')); ?>

                    </a>
                    <a href="<?php echo e(route('estimate.view-as-customer',$estimate->id)); ?>"
                       class="dropdown-item text-content-wrap"
                       data-toggle="tooltip"
                       data-placement="bottom" title="<?php echo e(__('messages.estimate.view_estimate_as_customer')); ?>"
                       data-delay='{"show":"500", "hide":"50"}'>
                        <?php echo e(__('messages.estimate.view_estimate_as_customer')); ?></a>
                    <?php if($estimate->status != \App\Models\Estimate::STATUS_DRAFT &&
                        $estimate->status != \App\Models\Estimate::STATUS_SEND &&
                        $estimate->status != \App\Models\Estimate::STATUS_EXPIRED &&
                        $estimate->status != \App\Models\Estimate::STATUS_DECLINED &&
                        $estimate->status != \App\Models\Estimate::STATUS_ACCEPTED): ?>
                        <a class="dropdown-item text-content-wrap" href="#" id="markAsDraft"
                           data-status="0" data-toggle="tooltip"
                           data-placement="bottom" title="<?php echo e(__('messages.estimate.mark_as_draft')); ?>"
                           data-delay='{"show":"500", "hide":"50"}'><?php echo e(__('messages.estimate.mark_as_draft')); ?></a>
                    <?php endif; ?>
                    <?php if($estimate->status != \App\Models\Estimate::STATUS_SEND &&
                        $estimate->status != \App\Models\Estimate::STATUS_DRAFT): ?>
                        <a class="dropdown-item text-content-wrap" href="#" id="markAsSend"
                           data-status="1" data-toggle="tooltip"
                           data-placement="bottom" title="<?php echo e(__('messages.estimate.mark_as_send')); ?>"
                           data-delay='{"show":"500", "hide":"50"}'><?php echo e(__('messages.estimate.mark_as_send')); ?></a>
                    <?php endif; ?>
                    <?php if($estimate->status != \App\Models\Estimate::STATUS_EXPIRED &&
                        $estimate->status != \App\Models\Estimate::STATUS_DRAFT): ?>
                        <a class="dropdown-item text-content-wrap" href="#" id="markAsExpired"
                           data-status="2" data-toggle="tooltip"
                           data-placement="bottom" title="<?php echo e(__('messages.estimate.mark_as_expired')); ?>"
                           data-delay='{"show":"500", "hide":"50"}'><?php echo e(__('messages.estimate.mark_as_expired')); ?></a>
                    <?php endif; ?>
                    <?php if($estimate->status != \App\Models\Estimate::STATUS_DECLINED &&
                        $estimate->status != \App\Models\Estimate::STATUS_DRAFT): ?>
                        <a class="dropdown-item text-content-wrap" href="#" id="markAsDeclined"
                           data-status="3" data-toggle="tooltip"
                           data-placement="bottom" title="<?php echo e(__('messages.estimate.mark_as_declined')); ?>"
                           data-delay='{"show":"500", "hide":"50"}'><?php echo e(__('messages.estimate.mark_as_declined')); ?></a>
                    <?php endif; ?>
                    <?php if($estimate->status != \App\Models\Estimate::STATUS_ACCEPTED &&
                        $estimate->status != \App\Models\Estimate::STATUS_DRAFT): ?>
                        <a class="dropdown-item text-content-wrap" href="#" id="markAsAccepted"
                           data-status="4" data-toggle="tooltip"
                           data-placement="bottom" title="<?php echo e(__('messages.estimate.mark_as_accepted')); ?>"
                           data-delay='{"show":"500", "hide":"50"}'><?php echo e(__('messages.estimate.mark_as_accepted')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="dropdown d-inline">
                <button class="btn btn-primary dropdown-toggle ml-1 mobile-font-size" type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true"><?php echo e(__('messages.estimate.convert_estimate')); ?>

                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item" id="convertToInvoice"><?php echo e(__('messages.invoice.invoice')); ?></a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('title', __('messages.estimate.title').':')); ?>

            <p><?php echo e(html_entity_decode($estimate->title)); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('customer', __('messages.invoice.customer').':')); ?>

            <p><a href="<?php echo e(url('admin/customers/'.$estimate->customer->id)); ?>"
                  class="anchor-underline"><?php echo e(html_entity_decode($estimate->customer->company_name)); ?>  -   <?php echo e(html_entity_decode($estimate->customer->client_name)); ?></a></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('estimate_number', __('messages.estimate.estimate_number').':')); ?>

            <p><?php echo e($estimate->estimate_number); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('tags', __('messages.tags').':')); ?>

            <p>
                <?php $__empty_1 = true; $__currentLoopData = $estimate->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <span class="badge border border-secondary mb-1"><?php echo e(html_entity_decode($tag->name)); ?> </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php echo e(__('messages.common.n/a')); ?>

                <?php endif; ?>
            </p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('estimate_date', __('messages.estimate.estimate_date').':')); ?>

            <p><?php echo e(Carbon\Carbon::parse($estimate->estimate_date)->translatedFormat('jS M, Y H:i A')); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('expiry_date', __('messages.estimate.expiry_date').':')); ?>

            <p><?php echo e(isset($estimate->estimate_expiry_date) ? Carbon\Carbon::parse($estimate->estimate_expiry_date)->translatedFormat('jS M, Y H:i A') : __('messages.common.n/a')); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('sales_agent_id', __('messages.invoice.sale_agent').':')); ?>

            <p>
                <?php if(!empty($estimate->sales_agent_id)): ?>
                    <a href="<?php echo e(url('admin/members/'.$estimate->sales_agent_id)); ?>" class="anchor-underline">
                        <?php echo e(html_entity_decode($estimate->user->full_name)); ?>

                    </a>
                <?php else: ?>
                    <?php echo e(__('messages.common.n/a')); ?>

                <?php endif; ?>
            </p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('currency', __('messages.invoice.currency').':')); ?>

            <p><?php echo e(isset($estimate->currency) ? $estimate->getCurrencyText($estimate->currency) : __('messages.common.n/a')); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('discount_type', __('messages.invoice.discount_type').':')); ?>

            <p><?php echo e(isset($estimate->discount_type) ? $estimate->getDiscountTypeText($estimate->discount_type) : __('messages.common.n/a')); ?></p>
        </div>
    

        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('reference', __('messages.credit_note.reference').':')); ?>

            <p><?php echo e(!empty($estimate->reference) ? html_entity_decode($estimate->reference) : __('messages.common.n/a')); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('created_at', __('messages.common.created_on').':')); ?>

            <p><span data-toggle="tooltip" data-placement="right"
                     title="<?php echo e(Carbon\Carbon::parse($estimate->created_at)->translatedFormat('jS M, Y')); ?>"><?php echo e($estimate->created_at->diffForHumans()); ?></span>
            </p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('updated_at', __('messages.common.last_updated').':')); ?>

            <p><span data-toggle="tooltip" data-placement="right"
                     title="<?php echo e(Carbon\Carbon::parse($estimate->updated_at)->translatedFormat('jS M, Y')); ?>"><?php echo e($estimate->updated_at->diffForHumans()); ?></span>
            </p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('admin_note', __('messages.invoice.admin_note').':')); ?>

            <br><?php echo !empty($estimate->admin_note) ? html_entity_decode($estimate->admin_note) :  __('messages.common.n/a'); ?>

        </div>
        <div class="col-12">
            <div class="row">
                <?php $__currentLoopData = $estimate->estimateAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($address->type == 1): ?>
                        <div class="form-group col-md-4 col-12">
                            <?php echo e(Form::label('bill_to', __('messages.invoice.bill_to').':')); ?>

                            <div><?php echo e(html_entity_decode($address->mapaddress)); ?>,</div>
                            <div><?php echo e($address->locality); ?>,</div>
                            <div><?php echo e($address->country); ?>,</div>
                            <div><?php echo e($address->zip_code); ?></div>
                        </div>
                    <?php else: ?>
                        <div class="form-group col-md-4 col-12">
                            <?php echo e(Form::label('bill_to', __('messages.invoice.ship_to').':')); ?>

                            <div><?php echo e(html_entity_decode($address->mapaddress)); ?>,</div>

                            <div><?php echo e($address->locality); ?>,</div>
                            <div><?php echo e($address->country); ?>,</div>
                            <div><?php echo e($address->zip_code); ?></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-bordered">
            <thead>
            <tr>
                <th><?php echo e(__('messages.estimate.item')); ?></th>
                <th><?php echo e(__('messages.common.description')); ?></th>
                <?php if($estimate->unit == 1): ?>
                    <th class="text-right"><?php echo e(__('messages.invoice.qty')); ?></th>
                <?php elseif($estimate->unit == 2): ?>
                    <th class="text-right"><?php echo e(__('messages.invoice.hours')); ?></th>
                <?php else: ?>
                    <th class="text-right"><?php echo e(__('messages.invoice.qty/hours')); ?></th>
                <?php endif; ?>
                <th class="text-right itemRate"><?php echo e(__('messages.products.rate')); ?>(<i
                            class="<?php echo e(getCurrencyClassFromIndex($estimate->currency)); ?>"></i>)
                </th>
                <th class="text-right itemTax"><?php echo e(__('messages.estimate.taxes')); ?>(<i class="fas fa-percentage"></i>)
                </th>
                <th class="text-right itemTotal"><?php echo e(__('messages.estimate.total')); ?>(<i
                            class="<?php echo e(getCurrencyClassFromIndex($estimate->currency)); ?>"></i>)
                </th>
            </tr>
            </thead>
            <?php $__currentLoopData = $estimate->salesItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(html_entity_decode($item->item)); ?></td>
                    <td class="table-data"><?php echo !empty($item->description) ? $item->description : __('messages.common.n/a'); ?></td>
                    <td class="text-right"><?php echo e($item->quantity); ?></td>
                    <td class="text-right"><i
                                class="<?php echo e(getCurrencyClassFromIndex($estimate->currency)); ?>"></i> <?php echo e(formatNumber($item->rate)); ?>

                    </td>
                    <td class="text-right show-taxes-list">
                        <?php $__empty_1 = true; $__currentLoopData = $item->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <span class="badge badge-light"><?php echo e($tax->tax_rate); ?>%</span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php echo e(__('messages.common.n/a')); ?>

                        <?php endif; ?>
                    </td>
                    <td class="text-right"><i
                                class="<?php echo e(getCurrencyClassFromIndex($estimate->currency)); ?>"></i> <?php echo e(number_format($item->total, 2)); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <div class="items-container-footer d-flex w-100 justify-content-end">
            <table class="table float-right col-4 text-right">
                <tr>
                    <td class="font-weight-bold"><?php echo e(__('messages.estimate.sub_total').':'); ?></td>
                    <td class="amountData"><i
                                class="<?php echo e(getCurrencyClassFromIndex($estimate->currency)); ?>"></i> <?php echo e(number_format($estimate->sub_total, 2)); ?>

                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__('messages.estimate.discount').':'); ?></td>
                    <td><?php echo e(formatNumber($estimate->discount)); ?><?php echo e(isset($estimate->discount_symbol) && $estimate->discount_symbol == 1 ? '%' : ''); ?></td>
                </tr>
                <?php $__currentLoopData = $estimate->salesTaxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commonTax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="font-weight-bold"><?php echo e(__('messages.products.tax')); ?> <?php echo e($commonTax->tax); ?><i
                                    class="fas fa-percentage"></i></td>
                        <td class="itemRate"><i
                                    class="<?php echo e(getCurrencyClassFromIndex($estimate->currency)); ?>"></i> <?php echo e(number_format($commonTax->amount, 2)); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__('messages.estimate.adjustment').':'); ?></td>
                    <td class="itemRate"><i
                                class="<?php echo e(getCurrencyClassFromIndex($estimate->currency)); ?>"></i> <?php echo e(number_format($estimate->adjustment, 2)); ?>

                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__('messages.estimate.total').':'); ?></td>
                    <td class="amountData"><i
                                class="<?php echo e(getCurrencyClassFromIndex($estimate->currency)); ?>"></i>
                                <?php  $invoice  =  $estimate; ?>
                                <?php echo $__env->make('invoices.total_calculation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </td>
                </tr>

            </table>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <?php echo e(Form::label('client_note', __('messages.common.client_note').':')); ?>

                    <br><?php echo !empty($estimate->client_note) ? html_entity_decode($estimate->client_note) :  __('messages.common.n/a'); ?>

                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <?php echo e(Form::label('terms_conditions', __('messages.estimate.terms_conditions').':')); ?>

                    <br><?php echo !empty($estimate->term_conditions) ? html_entity_decode($estimate->term_conditions) :  __('messages.common.n/a'); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('estimates.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/estimates/views/estimate_details.blade.php ENDPATH**/ ?>