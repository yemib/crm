<?php $__env->startSection('section'); ?>
    <hr>
    <div class="my-3 d-flex justify-content-between flex-sm-row flex-column">
        <div>

            <a href="#"
               class="btn text-white mt-sm-0 mt-2 mb-sm-0 mb-2 status-<?php echo e(\Illuminate\Support\Str::slug(\App\Models\Invoice::PAYMENT_STATUS[($invoice->payment_status)])); ?>">
                <?php echo e(\App\Models\Invoice::PAYMENT_STATUS[$invoice->payment_status]); ?>

            </a>
        </div>
        <div class="d-flex justify-content-end align-items-center">
            <div class="dropdown d-inline">
                <button class="btn btn-warning dropdown-toggle mr-1" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                    <?php echo e(__('messages.invoice.more')); ?>

                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?php echo e(route('invoice.pdf', ['invoice' => $invoice->id])); ?>"
                       class="dropdown-item"><?php echo e(__('messages.common.download_as_pdf')); ?>

                    </a>
                    <a href="<?php echo e(route('invoice.view-as-customer',$invoice->id)); ?>"
                       class="dropdown-item text-content-wrap"
                       data-toggle="tooltip"
                       data-placement="bottom" title="<?php echo e(__('messages.invoice.view_invoice_as_customer')); ?>"
                       data-delay='{"show":"500", "hide":"50"}'>
                        <?php echo e(__('messages.invoice.view_invoice_as_customer')); ?></a>
                    <?php if($invoice->payment_status != \App\Models\Invoice::STATUS_DRAFT && $invoice->payment_status != \App\Models\Invoice::STATUS_UNPAID && $invoice->payment_status != \App\Models\Invoice::STATUS_PAID): ?>
                        <a id="markAsSent" class="dropdown-item text-content-wrap" href="#"
                           data-status="1" data-toggle="tooltip"
                           data-placement="bottom" title="<?php echo e(__('messages.invoice.mark_as_sent')); ?>"
                           data-delay='{"show":"500", "hide":"50"}'><?php echo e(__('messages.invoice.mark_as_sent')); ?></a>
                    <?php elseif($invoice->payment_status == \App\Models\Invoice::STATUS_DRAFT): ?>
                        <a id="markAsCancelled" class="dropdown-item text-content-wrap" href="#"
                           data-status="4" data-toggle="tooltip"
                           data-placement="bottom" title="<?php echo e(__('messages.invoice.mark_as_cancelled')); ?>"
                           data-delay='{"show":"500", "hide":"50"}'><?php echo e(__('messages.invoice.mark_as_cancelled')); ?></a>
                    <?php endif; ?>
                    <?php if($invoice->payment_status == \App\Models\Invoice::STATUS_UNPAID): ?>
                        <a class="dropdown-item text-content-wrap" href="#" id="markAsCancelled"
                           data-status="4" data-toggle="tooltip"
                           data-placement="bottom" title="<?php echo e(__('messages.invoice.mark_as_cancelled')); ?>"
                           data-delay='{"show":"500", "hide":"50"}'><?php echo e(__('messages.invoice.mark_as_cancelled')); ?></a>
                    <?php elseif($invoice->payment_status == \App\Models\Invoice::STATUS_CANCELLED ): ?>
                        <a class="dropdown-item text-content-wrap" href="#" id="unmarkAsCancelled"
                           data-status="1" data-toggle="tooltip"
                           data-placement="bottom" title="<?php echo e(__('messages.invoice.unmark_as_cancelled')); ?>"
                           data-delay='{"show":"500", "hide":"50"}'><?php echo e(__('messages.invoice.unmark_as_cancelled')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($invoice->payment_status != \App\Models\Invoice::STATUS_CANCELLED): ?>
                <div class="dropdown d-inline">
                    <a href="#" class="btn btn-primary ml-1  <?php echo e($invoice->payment_status != 2 ? '' : 'disabled'); ?>"
                       data-toggle="modal" id="addPayment"
                       data-target="#addPaymentModa" data-id= <?php echo e($invoice->id); ?>><i
                                class="fas fa-plus"></i> <?php echo e(__('messages.invoice.payments')); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('title', __('messages.invoice.title').':')); ?>

            <p><?php echo e(html_entity_decode($invoice->title)); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('invoice_number', __('messages.invoice.invoice_number').':')); ?>

            <p><?php echo e($invoice->invoice_number); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('customer', __('messages.invoice.customer').':')); ?>

            <p><a href="<?php echo e(url('admin/customers/'.$invoice->customer->id)); ?>"
                  class="anchor-underline"><?php echo e(html_entity_decode($invoice->customer->company_name)); ?> - <?php echo e(html_entity_decode($invoice->customer->client_name)); ?>  </a></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('invoice_date', __('messages.invoice.invoice_date').':')); ?>

            <p><?php echo e(Carbon\Carbon::parse($invoice->invoice_date)->translatedFormat('jS M, Y')); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('due_date', __('messages.invoice.due_date').':')); ?>

            <p><?php echo e(isset($invoice->due_date) ? (Carbon\Carbon::parse($invoice->due_date)->translatedFormat('jS M, Y')) : __('messages.common.n/a')); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('sales_agent_id', __('messages.invoice.sale_agent').':')); ?>

            <p>
                <?php if(!empty($invoice->sales_agent_id)): ?>
                    <a href="<?php echo e(url('admin/members/'.$invoice->sales_agent_id)); ?>" class="anchor-underline">
                        <?php echo e(html_entity_decode($invoice->user->full_name)); ?>

                    </a>
                <?php else: ?>
                    <?php echo e(__('messages.common.n/a')); ?>

                <?php endif; ?>
            </p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('currency', __('messages.invoice.currency').':')); ?>

            <p><?php echo e($invoice->getCurrencyText($invoice->currency)); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('discount_type', __('messages.invoice.discount_type').':')); ?>

            <p><?php echo e($invoice->getDiscountTypeText($invoice->discount_type)); ?></p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('tags', __('messages.tags').':')); ?>

            <p>
                <?php $__empty_1 = true; $__currentLoopData = $invoice->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <span class="badge border border-secondary mb-1"><?php echo e(html_entity_decode($tag->name)); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php echo e(__('messages.common.n/a')); ?>

                <?php endif; ?>
            </p>
        </div>
      
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('payment_modes', __('messages.payment_modes').':')); ?>

            <p>
                <?php $__empty_1 = true; $__currentLoopData = $invoice->paymentModes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <span class="badge badge-light mb-1"><?php echo e(html_entity_decode($paymentMode->name)); ?> </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php echo e(__('messages.common.n/a')); ?>

                <?php endif; ?>
            </p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('created_at', __('messages.common.created_on').':')); ?>

            <p><span data-toggle="tooltip" data-placement="right"
                     title="<?php echo e(Carbon\Carbon::parse($invoice->created_at)->translatedFormat('jS M, Y')); ?>"><?php echo e($invoice->created_at->diffForHumans()); ?></span>
            </p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('updated_at', __('messages.common.last_updated').':')); ?>

            <p><span data-toggle="tooltip" data-placement="right"
                     title="<?php echo e(Carbon\Carbon::parse($invoice->updated_at)->translatedFormat('jS M, Y')); ?>"><?php echo e($invoice->updated_at->diffForHumans()); ?></span>
            </p>
        </div>
        <div class="form-group col-md-4 col-12">
            <?php echo e(Form::label('admin_text', __('messages.invoice.admin_note').':')); ?><br>
            <?php echo !empty($invoice->admin_text) ? html_entity_decode($invoice->admin_text) :  __('messages.common.n/a'); ?>

        </div>
        <div class="col-12">
            <div class="row">
              <!-- this the order address emmanuel--->
                <?php $__currentLoopData = $invoice->invoiceAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <th><?php echo e(__('messages.invoice.item')); ?></th>
             <th><?php echo e(__('messages.common.description')); ?></th>
                <?php if($invoice->unit == 1): ?>
                    <th class="text-right"><?php echo e(__('messages.invoice.qty')); ?></th>
                <?php elseif($invoice->unit == 2): ?>
                    <th class="text-right"><?php echo e(__('messages.invoice.hours')); ?></th>
                <?php else: ?>
                    <th class="text-right"><?php echo e(__('messages.invoice.qty/hours')); ?></th>
                <?php endif; ?>
                <th class="text-right itemRate"><?php echo e(__('messages.products.rate')); ?>(<i
                            class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i>)
                </th>
                <th class="text-right itemTax"><?php echo e(__('messages.invoice.taxes')); ?>(<i class="fas fa-percentage"></i>)
                </th>
                <th>Warranty Period</th>
                <th class="text-right itemTotal"><?php echo e(__('messages.invoice.total')); ?>(<i
                            class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i>)
                </th>
            </tr>
            </thead>
            <?php $__currentLoopData = $invoice->salesItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(html_entity_decode($item->item)); ?></td>
                    <td class="table-data"><?php echo !empty($item->description) ? $item->description : __('messages.common.n/a'); ?></td>
                    <td class="text-right"><?php echo e($item->quantity); ?></td>
                    <td class="text-right"><i class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i>
                        <?php echo e(formatNumber($item->rate)); ?></td>
                    <td class="text-right show-taxes-list">
                        <?php $__empty_1 = true; $__currentLoopData = $item->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <span class="badge badge-light"><?php echo e($tax->tax_rate); ?>%</span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php echo e(__('messages.common.n/a')); ?>

                        <?php endif; ?>
                    </td>

                    <td> <?php if(isset( $item->warrantyperiod->id)): ?>  <?php echo e($item->warrantyperiod->number); ?>

                        <?php echo e($item->warrantyperiod->type); ?>  <?php endif; ?> </td>
                    <td class="text-right"><i
                                class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i> <?php echo e(number_format($item->total, 2)); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <div class="invoice-footer d-flex w-100 justify-content-end">
            <table class="table float-right col-sm-6 text-right">
                <tr>
                    <td class="font-weight-bold"><?php echo e(__('messages.invoice.sub_total').':'); ?></td>
                    <td class="amountData"><i
                                class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i>

                                <?php echo e(number_format($invoice->sub_total, 2)); ?>



                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__('messages.invoice.discount').':'); ?></td>
                    <td><?php echo e(formatNumber($invoice->discount)); ?><?php echo e(isset($invoice->discount_symbol) && $invoice->discount_symbol == 1 ? '%' : ''); ?>

                    </td>
                </tr>
                <?php $__currentLoopData = $invoice->salesTaxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commonTax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="font-weight-bold"><?php echo e(__('messages.products.tax')); ?> <?php echo e($commonTax->tax); ?><i
                                    class="fas fa-percentage"></i></td>
                        <td>
                            <i class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i> <?php echo e(number_format($commonTax->amount, 2)); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__('messages.invoice.adjustment').':'); ?></td>
                    <td>
                        <i class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i> <?php echo e(number_format($invoice->adjustment, 2)); ?>

                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__('messages.invoice.total').':'); ?></td>
                    <td class="amountData"><i
                                class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i>
                                <?php echo $__env->make('invoices.total_calculation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    </td>
                </tr>

            </table>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <?php echo e(Form::label('client_note', __('messages.invoice.client_note').':')); ?>

                    <br><?php echo !empty($invoice->client_note) ? html_entity_decode($invoice->client_note) :  __('messages.common.n/a'); ?>

                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <?php echo e(Form::label('terms_conditions', __('messages.invoice.terms_conditions').':')); ?>

                    <br><?php echo !empty($invoice->term_conditions) ? html_entity_decode($invoice->term_conditions) :  __('messages.common.n/a'); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('invoices.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/invoices/views/invoice_details.blade.php ENDPATH**/ ?>