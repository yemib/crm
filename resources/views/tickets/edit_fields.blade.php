<div class="row">
    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        {{ Form::label('subject','Ticket No :') }}<span class="required">*</span>
        {{ Form::text('ticket_no', null, ['class' => 'form-control', 'readonly', 'required','autocomplete' => 'off','placeholder'=>"Ticket No"]) }}
    </div>



    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6" id="contactCol">
        {{ Form::label('contact_id', 'Incident Subject :') }}

        <select   class="form-control"   name="subject_incident"  id="contactId">
            <option @if($ticket->subject_incident ==  "Repair")  selected @endif  >Repair</option>
            <option  @if($ticket->subject_incident ==  "Preventive Maintenance")  selected @endif  >Preventive Maintenance</option>
            <option  @if($ticket->subject_incident ==  "Service")  selected @endif>Service</option>


        </select>


    </div>


    <div class="form-group col-sm-6 d-none col-xl-3 col-lg-4 col-md-6" id="nameCol">
        {{ Form::label('name', __('messages.ticket.name').':') }}
        {{ Form::text('name', null, ['class' => 'form-control','autocomplete' => 'off','placeholder'=>__('messages.ticket.name')]) }}
    </div>


    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        {{ Form::label('email', 'Date :') }}
       <input  class="form-control"  name="date"   type="date"    value="<?php echo $ticket->date; ?>"/>
    </div>


{{--     <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        {{ Form::label('email', __('messages.ticket.email').':') }}
        {{ Form::email('email', null, ['class' => 'form-control','autocomplete' => 'off','placeholder'=>__('messages.ticket.email')]) }}
    </div> --}}

    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        {{ Form::label('department_id', __('messages.ticket.customers').':') }}
        <div class="input-group">
        <select  onchange="select_product()" class="form-control"  name="customer_id"  id="departmentId"  >
            <option>Select Customer</option>
            @foreach ( $data['customers'] as      $customer)

            <option @if($ticket->customer_id  ==  $customer->id ) selected  @endif  value="{{  $customer->id  }}">{{ $customer->company_name   }} - {{  $customer->client_name }}</option>

            @endforeach


        </select>
            <div  style="display: none" class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addDepartmentModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>




    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        {{ Form::label('priority_id', __('messages.ticket.priority').':') }}
        <div class="input-group">
            {{ Form::select('priority_id', $data['priority'],null, ['id'=>'priorityId','class' => 'form-control','placeholder' => __('messages.placeholder.select_priority')]) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addTicketPriorityModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none" class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        {{ Form::label('service_id', __('messages.ticket.service').':') }}
        <div class="input-group">
            {{ Form::select('service_id', $data['services'],null, ['id'=>'serviceId','class' => 'form-control','placeholder' => __('messages.placeholder.select_service')]) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        {{ Form::label('tags', __('messages.ticket.tags').':') }}
        <div class="input-group">
            {{ Form::select('tags[]', $data['tags'],null, ['id'=>'tagId','class' => 'form-control', 'multiple' => 'multiple']) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addCommonTagModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        {{ Form::label('ticket_status_id', __('messages.common.status').':') }}<span class="required">*</span>
        <div class="input-group">
            {{ Form::select('ticket_status_id', $data['ticketStatus'],null, ['id'=>'ticketStatusId','class' => 'form-control','required','placeholder' => __('messages.placeholder.select_status')]) }}
            <div class="input-group-append">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addTicketStatusModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        {{ Form::label('predefined_reply_id', __('messages.ticket.predefined_reply').':') }}
        <div class="input-group">
            {{ Form::select('predefined_reply_id', $data['predefinedReplies'],null, ['id'=>'predefinedReplyId','class' => 'form-control','placeholder' => __('messages.placeholder.select_predefined_reply')]) }}
            <div class="input-group-append plus-icon-height">
                <div class="input-group-text">
                    <a href="#" data-toggle="modal" data-target="#addTicketPredefinedModal"><i
                                class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group col-sm-6 col-xl-3 col-lg-4 col-md-6">
        {{ Form::label('warranty', 'Warranty Related :') }}
        <div class="input-group">
            <label  for="warrant_no"  class="btn btn-sm btn-primary" >

          <input   @if($ticket->warranty_related  ==  "Yes") checked  @endif  id="warrant_no"   name="warranty_related"  value="Yes"   type="radio"  />
          Yes
            </label>


            &nbsp;        &nbsp;

            <label  for="warrant_yes"  class="btn btn-sm btn-primary" >


          <input  @if($ticket->warranty_related  ==  "No") checked  @endif  id="warrant_yes"  name="warranty_related"  value="No"   type="radio"   />
          No&nbsp;
            </label>
        </div>
    </div>





    <div class="col-sm-12 col-md-12 col-xl-12">


        <div  id="warranty_item_display"   style="@if($ticket->products == NULL) display: none @endif" >
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
                        <td>{{ $product->serial_no }}</td>
                        <td>
                            @if($product->image  !=  NULL)
                            <a  target="_blank" href="{{  $product->image  }}">
                                <img  height="100"  width="100"     src= "{{  $product->image  }}" />   </a>

                                @endif

                        </td>
                        <td>{{isset($product->invoice->installation_date ) ?  $product->invoice->installation_date  : " "}}</td>

                        <td><input  checked class="form-control"  name="products[]"  value="{{  $product->id }}" type ="checkbox" /></td>
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
        {{ Form::label('body', 'Remarks :') }}
        {{ Form::textarea('body', null, ['class' => 'form-control ticketBody', 'id' => 'ticketBody']) }}
    </div>
    <div class="form-group col-sm-12 col-md-12 col-xl-12">
        {{ Form::label('attachments', __('messages.ticket.attachments').':',['class' => 'profile-label-color']) }} <span
                data-toggle="tooltip" data-title="{{ __('messages.ticket.you_can_add_multiples_images_and_files') }}"><i
                    class="fas fa-question-circle"></i></span>
        <div class="d-flex mb-3 overflow-hidden flex-md-nowrap flex-wrap">
            <label class="image__file-upload text-white mb-4 h-100"> {{ __('messages.setting.choose') }}
                {{ Form::file('attachments[]',['id'=>'attachment','class' => 'd-none', 'multiple']) }}
            </label>
            <div id="attachmentFileSection" class="attachment__create overflow-auto"></div>
            @if(count($ticket->media) > 0)
                <div class="pl-md-4 pl-0 mt-md-0 mt-5">
                    <div class="gallery gallery-md file-grp">
                        @foreach($ticket->media as $media)
                            <div class="gallery-item ticket-attachment"
                                 data-image="{{ mediaUrlEndsWith($media->getFullUrl()) }}"
                                 data-title="{{ $media->name }}"
                                 href="{{ mediaUrlEndsWith($media->getFullUrl()) }}" title="{{ $media->name }}">
                                <div class="ticket-attachment__icon d-none">
                                    <a href="{{ $media->getFullUrl() }}" target="_blank"
                                       class="text-decoration-none text-primary"
                                       title="{{ __('messages.common.view') }}"><i class="fas fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="text-danger text-decoration-none attachment-delete"
                                       data-id="{{ $media->id }}"
                                       title="{{ __('messages.common.delete') }}"><i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="col-sm-12">
        {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary', 'id' => 'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
        <a href="{{ url()->previous() }}"
           class="btn btn-secondary text-dark">{{ __('messages.common.cancel') }}</a>
    </div>
</div>

@include('tickets.warranty_script')
