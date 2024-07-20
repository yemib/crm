<?php $__env->startSection('section'); ?>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('Incident Subject ', __('messages.ticket.subject').':')); ?>

                <p><?php echo e(html_entity_decode($ticket->subject_incident)); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('contact_id', 'Ticket No:')); ?>

                <p>
                    <p><?php echo e(html_entity_decode($ticket->ticket_no)); ?></p>
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('name',' Date :')); ?>

                <p><?php echo e(!empty($ticket->date) ? html_entity_decode($ticket->date) : __('messages.common.n/a')); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('customer', 'Customer :')); ?>

                <p><?php echo e((isset( $ticket->customer->company_name)) ?  $ticket->customer->company_name ."-". $ticket->customer->client_name : __('messages.common.n/a')); ?></p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('cc', __('messages.ticket.cc').':')); ?>

                <p><?php echo e((!empty($ticket->cc)) ? $ticket->cc : __('messages.common.n/a')); ?></p>
            </div>
        </div>
  
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('priority_id', __('messages.ticket.priority').':')); ?>

                <p><?php echo e((isset($ticket->priority_id)) ? html_entity_decode($ticket->ticketPriority->name) : __('messages.common.n/a')); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('warranty_id', 'Warranty Related:')); ?>

                <p><?php echo e((isset($ticket->warranty_related)) ? html_entity_decode($ticket->warranty_related) : __('messages.common.n/a')); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('tag_id', __('messages.ticket.tags').':')); ?><br>
                <?php $__empty_1 = true; $__currentLoopData = $ticket->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <span class="badge border border-secondary mb-1"><?php echo e(html_entity_decode($ticketTag->name)); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p><?php echo e(__('messages.common.n/a')); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('predefined_reply_id', __('messages.ticket.predefined_reply').':')); ?>

                <p><?php echo e((isset($ticket->predefinedReply)) ? html_entity_decode($ticket->predefinedReply->reply_name)   :  __('messages.common.n/a')); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('status', __('messages.common.status').':')); ?>

                <p><?php echo e((isset($ticket->ticket_status_id)) ? html_entity_decode($ticket->ticketStatus->name) : __('messages.common.n/a')); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('created_at', __('messages.common.created_on').':')); ?><br>
                <span data-toggle="tooltip" data-placement="right"
                      title="<?php echo e(Carbon\Carbon::parse($ticket->created_at)->translatedFormat('jS M, Y')); ?>"><?php echo e($ticket->created_at->diffForHumans()); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('created_at', __('messages.common.last_updated').':')); ?><br>
                <span data-toggle="tooltip" data-placement="right"
                      title="<?php echo e(Carbon\Carbon::parse($ticket->updated_at)->translatedFormat('jS M, Y')); ?>"><?php echo e($ticket->updated_at->diffForHumans()); ?></span>
            </div>
        </div>



    <div class="col-sm-12 col-md-12 col-xl-12">


        <div  id="warranty_item_display"   style="<?php if($ticket->products == NULL): ?> display: none <?php endif; ?>" >
          Choose Items:

              <table  class="table table-responsive-sm table-responsive-md
               table-responsive-lg table-responsive-xl table-bordered">
                  <thead>
                      <tr>
                          <td>Serial No</td>
                          <td>Image</td>
                          <td>Installation Date</td>


                      </tr>
                  </thead>

                  <tbody   id="warranty_products">

                    <?php //display all here.
                    if($ticket->products  !=  NULL){

                        $all_products =  json_decode($ticket->products );


                        foreach( $all_products as  $product_id){


                            $product  =  App\Models\SalesItem::find($product_id);


                        ?>

                      <tr>
                        <td><?php echo e($product->serial_no); ?></td>
                        <td>
                            <?php if($product->image  !=  NULL): ?>
                            <a  target="_blank" href="<?php echo e($product->image); ?>">
                                <img  height="100"  width="100"     src= "<?php echo e($product->image); ?>" />   </a>

                                <?php endif; ?>

                        </td>
                        <td><?php echo e(isset($product->invoice->installation_date ) ?  $product->invoice->installation_date  : " "); ?></td>

                      </tr>






             <?php
                        }
                    }


                    ?>


                  </tbody>


              </table>

        </div>


  </div>



        <div class="col-md-12 ">
            <div class="form-group">
                <?php echo e(Form::label('attachments', __('messages.ticket.attachments').':')); ?><br>
                <?php if(count($ticket->media) != 0): ?>
                    <div class="overflow-auto">
                        <div class="gallery gallery-md attachment__section file-grp">
                            <?php $__currentLoopData = $ticket->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="gallery-item ticket-attachment"
                                     data-image="<?php echo e(mediaUrlEndsWith($media->getFullUrl())); ?>"
                                     data-title="<?php echo e($media->name); ?>"
                                     href="<?php echo e(mediaUrlEndsWith($media->getFullUrl())); ?>"
                                     title="<?php echo e($media->name); ?>">
                                    <div class="ticket-attachment__icon d-none">
                                        <a href="<?php echo e($media->getFullUrl()); ?>" target="_blank"
                                           class="text-decoration-none"
                                           title="<?php echo e(__('messages.common.view')); ?>"><i
                                                class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(url('admin/download-media',$media)); ?>"
                                       download="<?php echo e($media->name); ?>"
                                       class="text-decoration-none"
                                       data-id="<?php echo e($media->id); ?>"
                                       title="<?php echo e(__('messages.common.download')); ?>"><i
                                                class="fas fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <p><?php echo e(__('messages.common.n/a')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('body', __('messages.common.description').':')); ?>

                <br>
                <?php echo !empty($ticket->body) ? html_entity_decode($ticket->body) : __('messages.common.n/a'); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tickets.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/tickets/views/ticket_details.blade.php ENDPATH**/ ?>