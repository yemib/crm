<div class="row">
    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('subject','Ticket No :')); ?><span class="required">*</span>
        <?php echo e(Form::text('ticket_no', null, ['class' => 'form-control', 'readonly', 'required','autocomplete' => 'off','placeholder'=>"Ticket No"])); ?>

    </div>



    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6" id="contactCol">
        <?php echo e(Form::label('contact_id', 'Incident Subject :')); ?>


        <select   class="form-control"   name="subject_incident"  id="contactId">
            <option <?php if($ticket->subject_incident ==  "Repair"): ?>  selected <?php endif; ?>  >Repair</option>
            <option  <?php if($ticket->subject_incident ==  "Preventive Maintenance"): ?>  selected <?php endif; ?>  >Preventive Maintenance</option>
            <option  <?php if($ticket->subject_incident ==  "Service"): ?>  selected <?php endif; ?>>Service</option>


        </select>


    </div>


    <div class="form-group col-sm-6 d-none col-xl-3 col-lg-4 col-md-6" id="nameCol">
        <?php echo e(Form::label('name', __('messages.ticket.name').':')); ?>

        <?php echo e(Form::text('name', null, ['class' => 'form-control','autocomplete' => 'off','placeholder'=>__('messages.ticket.name')])); ?>

    </div>


    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('email', 'Date :')); ?>

       <input  class="form-control"  name="date"   type="date"    value="<?php echo $ticket->date; ?>"/>
    </div>




    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('department_id', __('messages.ticket.customers').':')); ?>

        <div class="input-group">
        <select  onchange="select_product()" class="form-control"  name="customer_id"  id="departmentId"  >
            <option>Select Customer</option>
            <?php $__currentLoopData = $data['customers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <option <?php if($ticket->customer_id  ==  $customer->id ): ?> selected  <?php endif; ?>  value="<?php echo e($customer->id); ?>"><?php echo e($customer->company_name); ?> - <?php echo e($customer->client_name); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </select>
            <div  style="display: none" class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addDepartmentModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>




    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('priority_id', __('messages.ticket.priority').':')); ?>

        <div class="input-group">
            <?php echo e(Form::select('priority_id', $data['priority'],null, ['id'=>'priorityId','class' => 'form-control','placeholder' => __('messages.placeholder.select_priority')])); ?>

            <div class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addTicketPriorityModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none" class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('service_id', __('messages.ticket.service').':')); ?>

        <div class="input-group">
            <?php echo e(Form::select('service_id', $data['services'],null, ['id'=>'serviceId','class' => 'form-control','placeholder' => __('messages.placeholder.select_service')])); ?>

            <div class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('tags', __('messages.ticket.tags').':')); ?>

        <div class="input-group">
            <?php echo e(Form::select('tags[]', $data['tags'],null, ['id'=>'tagId','class' => 'form-control', 'multiple' => 'multiple'])); ?>

            <div class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addCommonTagModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('ticket_status_id', __('messages.common.status').':')); ?><span class="required">*</span>
        <div class="input-group">
            <?php echo e(Form::select('ticket_status_id', $data['ticketStatus'],null, ['id'=>'ticketStatusId','class' => 'form-control','required','placeholder' => __('messages.placeholder.select_status')])); ?>

            <div class="input-group-append">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addTicketStatusModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('predefined_reply_id', __('messages.ticket.predefined_reply').':')); ?>

        <div class="input-group">
            <?php echo e(Form::select('predefined_reply_id', $data['predefinedReplies'],null, ['id'=>'predefinedReplyId','class' => 'form-control','placeholder' => __('messages.placeholder.select_predefined_reply')])); ?>

            <div class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addTicketPredefinedModal"><i
                                class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('warranty', 'Warranty Related :')); ?>

        <div class="input-group">
            <label  for="warrant_no"  class="btn btn-sm btn-primary" >

          <input   <?php if($ticket->warranty_related  ==  "Yes"): ?> checked  <?php endif; ?>  id="warrant_no"   name="warranty_related"  value="Yes"   type="radio"  />
          Yes
            </label>


            &nbsp;        &nbsp;

            <label  for="warrant_yes"  class="btn btn-sm btn-primary" >


          <input  <?php if($ticket->warranty_related  ==  "No"): ?> checked  <?php endif; ?>  id="warrant_yes"  name="warranty_related"  value="No"   type="radio"   />
          No&nbsp;
            </label>
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
                          <td></td>

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

                        <td><input  checked class="form-control"  name="products[]"  value="<?php echo e($product->id); ?>" type ="checkbox" /></td>
                      </tr>






             <?php
                        }
                    }


                    ?>


                  </tbody>


              </table>

        </div>


  </div>




</div>
<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('body', 'Remarks :')); ?>

        <?php echo e(Form::textarea('body', null, ['class' => 'form-control ticketBody', 'id' => 'ticketBody'])); ?>

    </div>
    <div class="form-group col-sm-12 col-md-12 col-xl-12">
        <?php echo e(Form::label('attachments', __('messages.ticket.attachments').':',['class' => 'profile-label-color'])); ?> <span
                data-toggle="tooltip" data-title="<?php echo e(__('messages.ticket.you_can_add_multiples_images_and_files')); ?>"><i
                    class="fas fa-question-circle"></i></span>
        <div class="d-flex mb-3 overflow-hidden flex-md-nowrap flex-wrap">
            <label class="image__file-upload text-white mb-4 h-100"> <?php echo e(__('messages.setting.choose')); ?>

                <?php echo e(Form::file('attachments[]',['id'=>'attachment','class' => 'd-none', 'multiple'])); ?>

            </label>
            <div id="attachmentFileSection" class="attachment__create overflow-auto"></div>
            <?php if(count($ticket->media) > 0): ?>
                <div class="pl-md-4 pl-0 mt-md-0 mt-5">
                    <div class="gallery gallery-md file-grp">
                        <?php $__currentLoopData = $ticket->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="gallery-item ticket-attachment"
                                 data-image="<?php echo e(mediaUrlEndsWith($media->getFullUrl())); ?>"
                                 data-title="<?php echo e($media->name); ?>"
                                 href="<?php echo e(mediaUrlEndsWith($media->getFullUrl())); ?>" title="<?php echo e($media->name); ?>">
                                <div class="ticket-attachment__icon d-none">
                                    <a href="<?php echo e($media->getFullUrl()); ?>" target="_blank"
                                       class="text-decoration-none text-primary"
                                       title="<?php echo e(__('messages.common.view')); ?>"><i class="fas fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="text-danger text-decoration-none attachment-delete"
                                       data-id="<?php echo e($media->id); ?>"
                                       title="<?php echo e(__('messages.common.delete')); ?>"><i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-12">
        <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary', 'id' => 'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

        <a href="<?php echo e(url()->previous()); ?>"
           class="btn btn-secondary text-dark"><?php echo e(__('messages.common.cancel')); ?></a>
    </div>
</div>

<?php echo $__env->make('tickets.warranty_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\websites\crm\crm\resources\views/tickets/edit_fields.blade.php ENDPATH**/ ?>