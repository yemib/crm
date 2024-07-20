<div class="row">


    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('subject','Ticket No :')); ?><span class="required">*</span>
        <?php echo e(Form::text('ticket_no', generateUniqueTicketNumber(), ['class' => 'form-control', 'readonly', 'required','autocomplete' => 'off','placeholder'=>"Ticket No"])); ?>

    </div>

    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6" id="contactCol">
        <?php echo e(Form::label('contact_id', 'Incident Subject :')); ?>

        <select   class="form-control"   name="subject_incident"  id="contactId">
            <option>Repair</option>
            <option>Preventive Maintenance</option>
            <option>Service</option>

        </select>

    </div>
    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6 d-none" id="nameCol">
        <?php echo e(Form::label('name', __('messages.ticket.name').':')); ?>

        <?php echo e(Form::text('name', null, ['class' => 'form-control','autocomplete' => 'off','placeholder'=>__('messages.ticket.name')])); ?>

    </div>
    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('email', 'Date :')); ?>

       <input  class="form-control"  name="date"   type="date"    value="<?php echo date('Y-m-d'); ?>"/>
    </div>
    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('department_id', __('messages.ticket.customers').':')); ?>

        <div class="input-group">
        <select  onchange="select_product()" class="form-control"  name="customer_id"  id="departmentId"  >
            <option>Select Customer</option>
            <?php $__currentLoopData = $data['customers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <option  value="<?php echo e($customer->id); ?>"><?php echo e($customer->company_name); ?> - <?php echo e($customer->client_name); ?></option>

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
            <?php echo e(Form::select('priority_id', $data['priority'],null, ['id'=>'priorityId','class' => 'form-control','placeholder'=>__('messages.placeholder.select_priority')])); ?>

            <div class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addTicketPriorityModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div  style="display: none" class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
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

          <input  id="warrant_no"   name="warranty_related"  value="Yes"   type="radio"  />
          Yes
            </label>


            &nbsp;        &nbsp;

            <label  for="warrant_yes"  class="btn btn-sm btn-primary" >


          <input   id="warrant_yes"  name="warranty_related"  value="No"   type="radio"   />
          No&nbsp;
            </label>
        </div>
    </div>

    <div  style="" class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        <?php echo e(Form::label('assign_to', 'Assign To: ')); ?>

        <div class="input-group">
            <?php echo e(Form::select('assign_to', $data['assignTo'],null, ['id'=>'memberId','class' => 'form-control','placeholder' => "Assign To"])); ?>

            <div  style="display: none"  class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>



    <div class="col-sm-12 col-md-12 col-xl-12">


          <div  id="warranty_item_display"   style="display: none" >
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


                    </tbody>


                </table>

          </div>


    </div>



    <div class="col-sm-12 col-md-12 col-xl-12">
        <?php echo e(Form::label('attachments', __('messages.ticket.attachments').':',['class' => 'profile-label-color'])); ?> <span
                data-toggle="tooltip" data-title="<?php echo e(__('messages.ticket.you_can_add_multiples_images_and_files')); ?>"><i
                    class="fas fa-question-circle"></i></span>
        <div class="d-flex mb-3 flex-md-nowrap flex-wrap">
            <label class="image__file-upload h-100"> <?php echo e(__('messages.setting.choose')); ?>

                <?php echo e(Form::file('attachments[]',['id'=>'attachment','class' => 'd-none', 'multiple'])); ?>

            </label>
            <div id="attachmentFileSection" class="attachment__create overflow-auto pl-md-4 pl-0"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12 mb-0">
        <?php echo e(Form::label('body', 'Remarks :')); ?>

        <?php echo e(Form::textarea('body', null, ['class' => 'form-control ticketBody', 'id' => 'ticketBody'])); ?>

    </div>
    <div class="col-sm-12">
        <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary', 'id' => 'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

        <a href="<?php echo e(url()->previous()); ?>"
           class="btn btn-secondary text-dark"><?php echo e(__('messages.common.cancel')); ?></a>
    </div>
</div>


<?php echo $__env->make('tickets.warranty_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH G:\websites\crm\crm\resources\views/tickets/fields.blade.php ENDPATH**/ ?>