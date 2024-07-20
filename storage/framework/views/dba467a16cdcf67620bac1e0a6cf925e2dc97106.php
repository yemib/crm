 <form  method="post"  action="<?php echo e(route('job.invoice')); ?>" >


<?php if($job  != 0): ?>

    <input name="job"  value="<?php echo e($job); ?>"   type="hidden" />
    <?php echo e(csrf_field()); ?>


 <?php endif; ?>
<div>
    <div class="row">


        <div class="mt-0 mb-3 col-12 d-flex justify-content-end search-display-block">
            <?php if(!empty($customer)): ?>
                <div class="mt-2">
                    <?php echo e(Form::select('payment_status',$invoiceStatus,$statusFilter,['id' => 'invoicePaymentStatus','class' => 'form-control','placeholder' => __('messages.placeholder.select_status')])); ?>

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
        <?php if(!isset($_GET['job'])): ?>
            <div class="col-md-12">
                <div class="row justify-content-md-center text-center mb-4">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="ticket-statistics mx-auto bg-danger">
                                <p><?php echo e($statusCount->cancelled); ?></p>
                            </div>
                            <h5 class="my-0 mt-1"><?php echo e(__('messages.invoice.cancelled')); ?></h5>
                        </div>
                        <div class="item">
                            <div class="ticket-statistics mx-auto bg-warning">
                                <p><?php echo e($statusCount->drafted); ?></p>
                            </div>
                            <h5 class="my-0 mt-1"><?php echo e(__('messages.invoice.drafted')); ?></h5>
                        </div>
                        <div class="item">
                            <div class="ticket-statistics mx-auto bg-primary">
                                <p><?php echo e($statusCount->unpaid); ?></p>
                            </div>
                            <h5 class="my-0 mt-1"><?php echo e(__('messages.invoice.unpaid')); ?></h5>
                        </div>
                        <div class="item">
                            <div class="ticket-statistics mx-auto bg-info">
                                <p><?php echo e($statusCount->partially_paid); ?></p>
                            </div>
                            <h5 class="my-0 mt-1"><?php echo e(__('messages.invoice.partially_paid')); ?></h5>
                        </div>
                        <div class="item">
                            <div class="ticket-statistics mx-auto bg-success">
                                <p><?php echo e($statusCount->paid); ?></p>
                            </div>
                            <h5 class="my-0 mt-1"><?php echo e(__('messages.invoice.paid')); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['job'])): ?>
           <div  class="col-sm-12">
         <h5>Check  Invoice  </h5>

           </div>

        <?php endif; ?>


        <?php endif; ?>

        <?php $__empty_1 = true; $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="col-12 col-md-6 col-xl-3 col-xlg-4">


                <div class="livewire-card card card-<?php echo e(\App\Models\Invoice::STATUS_COLOR[$invoice->payment_status]); ?> shadow mb-5 rounded hover-card card-height height-210">
                    <div class="card-header d-flex justify-content-between align-items-center itemCon p-3 invoice-card-height">
                        <div class="d-flex">
                            <?php if($job  != 0 ): ?>
                            <?php
                            $check = App\Models\Job::find($job);
                            $array = [];
                            if(isset( $check->id )){
                                $array = json_decode( $check->invoice_id, true);
                            }
                            //get the invoice bos
                            ?>
                            <input  <?php if(is_array($array)): ?> <?php if(in_array(  $invoice->id  , $array  ) ): ?>  checked   <?php endif; ?> <?php endif; ?>  name="invoices[]"  type="checkbox"   class="form-check"   value="<?php echo e($invoice->id); ?>"/>
                            <?php endif; ?>

                            <a href="<?php echo e(url('admin/invoices', $invoice->id)); ?>"
                               class="d-flex flex-wrap text-decoration-none">
                                <h4 class="text-primary invoice-clients invoice_title pl-2">
                                    <?php echo e(Str::limit(html_entity_decode($invoice->title), 20, '...')); ?>

                                </h4>
                                (<small class="text-primary"><?php echo e($invoice->invoice_number); ?></small>)
                            </a>
                        </div>
                        <div class="invoice-action-btn d-none">
                          
                                <a title="<?php echo e(__('messages.common.edit')); ?>"
                                   href="<?php echo e(route('invoices.edit',$invoice->id)); ?>"><i
                                            class="fa fa-edit text-warning mr-1"></i></a>
                          
                         
                                <a title="<?php echo e(__('messages.common.delete')); ?>"
                                   class="text-danger action-btn delete-btn tickets-delete"
                                   data-id="<?php echo e($invoice->id); ?>" href="#">
                                    <i class="fa fa-trash"></i>
                                </a>
                           
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between pt-1 px-3">
                        <div class="d-table w-100">
                            <a href="<?php echo e(url('admin/invoices', $invoice->id)); ?>">
                            <div>
                                <i class="fas fa-street-view"></i>
                                <span
                                        class="text-decoration-none">
                                        <?php echo e(html_entity_decode(Str::limit($invoice->customer->company_name,15))); ?>

                                    </span>
                            </div>
                        </a>
                        <a href="<?php echo e(url('admin/invoices', $invoice->id)); ?>">
                            <span class="d-table-row w-100">
                            <big class="d-table-cell w-100 d-mobile-block">
                                <i class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i>

                                <?php echo $__env->make('invoices.total_calculation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                            </big>
                            <span class="badge mt-mobile-2 text-uppercase status-<?php echo e(\Illuminate\Support\Str::slug(\App\Models\Invoice::PAYMENT_STATUS[($invoice->payment_status)])); ?>">
                                <?php echo e(App\Models\Invoice::PAYMENT_STATUS[$invoice->payment_status]); ?>

                            </span>
                            </span>
                        </a>

                            <?php if(!empty($invoice->due_date)): ?>
                            <a href="<?php echo e(url('admin/invoices', $invoice->id)); ?>">
                                <span class="d-table-row text-nowrap w-100 <?php echo e(now() > Carbon\Carbon::parse($invoice->due_date)  ? 'text-danger' : ''); ?>">
                                <?php echo e(Carbon\Carbon::parse($invoice->due_date)->translatedFormat('jS M, Y')); ?>

                            </span>
                        </a>


                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="mt-0 mb-5 col-12 d-flex justify-content-center  mb-5 rounded">
                <div class="p-2">
                    <?php if(empty($search)): ?>
                        <p class="text-dark"><?php echo e(__('messages.invoice.no_invoice_available')); ?></p>
                    <?php else: ?>
                        <p class="text-dark"><?php echo e(__('messages.invoice.no_invoice_found')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if($job  != 0 ): ?>
                <div  class="col-sm-12">
                    <input  type="hidden"  name="job_id"   value="<?php echo e($job); ?>" />

                <input   type="submit"  value="Submit"   class="btn btn-success"/>

                </div>
        <?php endif; ?>

        <?php if($invoices->count() > 0): ?>
            <div class="mt-0 mb-5 col-12">
                <div class="row paginatorRow">
                    <div class="col-lg-2 col-md-6 col-sm-12 pt-2">
                <span class="d-inline-flex">
                    <?php echo e(__('messages.common.showing')); ?>

                    <span class="font-weight-bold ml-1 mr-1"><?php echo e($invoices->firstItem()); ?></span> -
                    <span class="font-weight-bold ml-1 mr-1"><?php echo e($invoices->lastItem()); ?></span> <?php echo e(__('messages.common.of')); ?>

                    <span class="font-weight-bold ml-1"><?php echo e($invoices->total()); ?></span>
                </span>
                    </div>
                    <div class="col-lg-10 col-md-6 col-sm-12 d-flex justify-content-end">
                        <?php echo e($invoices->links()); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>


    </div>
</div>


</form>
<?php /**PATH G:\websites\crm\crm\resources\views/livewire/invoices.blade.php ENDPATH**/ ?>