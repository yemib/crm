<div id="addModal" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id' => 'addNewForm']) }}
                    <div class="modal-body">

                        @include('productwarranty.field')

              <div class="text-right">
                            {{ Form::button(__('messages.common.save'), ['type' => 'submit',
                            'class' => 'btn btn-primary',
                             'id' => 'btnSave', 'data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                            <button type="button" id="btnCancel" class="btn btn-light ml-1"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                        </div>


                    </div>

            {{ Form::close() }}
        </div>
    </div>

</div>
