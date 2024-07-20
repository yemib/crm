<div id="addModal" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modal_title" class="modal-title">{{ __('messages.service.new_service') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            <form id="addNewForm" action="{{ route('job.store') }}" method="POST">
                {{ Form::hidden('serviceId',null,['id'=>'serviceId']) }}
                @csrf


                    <div class="modal-body"  id="add_fieldcontainer">


                        @include('job.field')


                        <div class="text-right">
                            {{ Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnSave', 'data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                            <button type="button" id="btnCancel" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                        </div>


                    </div>

                </form>
        </div>
    </div>

</div>
