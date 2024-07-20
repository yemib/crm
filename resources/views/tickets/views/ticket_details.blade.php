@extends('tickets.show')
@section('section')
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('Incident Subject ', __('messages.ticket.subject').':') }}
                <p>{{ html_entity_decode($ticket->subject_incident) }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('contact_id', 'Ticket No:') }}
                <p>
                    <p>{{ html_entity_decode($ticket->ticket_no) }}</p>
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('name',' Date :') }}
                <p>{{ !empty($ticket->date) ? html_entity_decode($ticket->date) : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('customer', 'Customer :') }}
                <p>{{ (isset( $ticket->customer->company_name)) ?  $ticket->customer->company_name ."-". $ticket->customer->client_name : __('messages.common.n/a') }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('cc', __('messages.ticket.cc').':') }}
                <p>{{ (!empty($ticket->cc)) ? $ticket->cc : __('messages.common.n/a') }}</p>
            </div>
        </div>
  {{--       <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('assign_to', __('messages.ticket.assign_to').':') }}
                <p>
                    @if(isset($ticket->assign_to))
                        <a href="{{ url('admin/members',$ticket->assign_to) }}"
                           class="anchor-underline">{{ html_entity_decode($ticket->user->full_name) }}</a>
                    @else
                        {{ __('messages.common.n/a') }}
                    @endif
                </p>
            </div>
        </div> --}}
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('priority_id', __('messages.ticket.priority').':') }}
                <p>{{ (isset($ticket->priority_id)) ? html_entity_decode($ticket->ticketPriority->name) : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('warranty_id', 'Warranty Related:') }}
                <p>{{ (isset($ticket->warranty_related)) ? html_entity_decode($ticket->warranty_related) : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('tag_id', __('messages.ticket.tags').':') }}<br>
                @forelse($ticket->tags as $ticketTag)
                    <span class="badge border border-secondary mb-1">{{ html_entity_decode($ticketTag->name) }}</span>
                @empty
                    <p>{{ __('messages.common.n/a') }}</p>
                @endforelse
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('predefined_reply_id', __('messages.ticket.predefined_reply').':') }}
                <p>{{ (isset($ticket->predefinedReply)) ? html_entity_decode($ticket->predefinedReply->reply_name)   :  __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('status', __('messages.common.status').':') }}
                <p>{{ (isset($ticket->ticket_status_id)) ? html_entity_decode($ticket->ticketStatus->name) : __('messages.common.n/a') }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('created_at', __('messages.common.created_on').':') }}<br>
                <span data-toggle="tooltip" data-placement="right"
                      title="{{ Carbon\Carbon::parse($ticket->created_at)->translatedFormat('jS M, Y') }}">{{ $ticket->created_at->diffForHumans() }}</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('created_at', __('messages.common.last_updated').':') }}<br>
                <span data-toggle="tooltip" data-placement="right"
                      title="{{ Carbon\Carbon::parse($ticket->updated_at)->translatedFormat('jS M, Y') }}">{{ $ticket->updated_at->diffForHumans() }}</span>
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
                        <td>{{ isset($product->invoice->installation_date ) ?  $product->invoice->installation_date  : " " }}</td>

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
                {{ Form::label('attachments', __('messages.ticket.attachments').':') }}<br>
                @if(count($ticket->media) != 0)
                    <div class="overflow-auto">
                        <div class="gallery gallery-md attachment__section file-grp">
                            @foreach($ticket->media as $media)
                                <div class="gallery-item ticket-attachment"
                                     data-image="{{ mediaUrlEndsWith($media->getFullUrl()) }}"
                                     data-title="{{ $media->name }}"
                                     href="{{ mediaUrlEndsWith($media->getFullUrl()) }}"
                                     title="{{ $media->name }}">
                                    <div class="ticket-attachment__icon d-none">
                                        <a href="{{ $media->getFullUrl() }}" target="_blank"
                                           class="text-decoration-none"
                                           title="{{ __('messages.common.view') }}"><i
                                                class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url('admin/download-media',$media) }}"
                                       download="{{ $media->name }}"
                                       class="text-decoration-none"
                                       data-id="{{ $media->id }}"
                                       title="{{ __('messages.common.download') }}"><i
                                                class="fas fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                @else
                    <p>{{ __('messages.common.n/a') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('body', __('messages.common.description').':') }}
                <br>
                {!! !empty($ticket->body) ? html_entity_decode($ticket->body) : __('messages.common.n/a') !!}
            </div>
        </div>
    </div>
@endsection
