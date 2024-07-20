<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.service.edit_service') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['id' => 'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('serviceId', null, ['id' => 'serviceId']) }}


                <div>
                    <div class="alert alert-danger d-none" id="validationErrorsBox"></div>




                    <div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                {{ Form::label('product', 'Select Product' . ':') }}
                                <select class="form-control" name="product">
                                    <option id="editproduct"></option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                {{ Form::label('editquantity', 'Quantity') }}
                                <input id="editquantity" class="form-control" name="quantity" placeholder="Quantity" />
                            </div>
                        </div>





                        <div class="row">
                            <div class="form-group  col-sm-12">
                                {{ Form::label('description', 'Description') }}

                                <textarea id="editdesc" name="description" class="form-control"></textarea>

                            </div>


                        </div>
                        <div class="row">
                            <div class="form-group  col-sm-12">
                                {{ Form::label('duration', 'Duration') }}

                                <input id="editduration" placeholder="Duration" name="duration" class="form-control" />

                            </div>
                            <input type="hidden" name="warranty_id" value="{{ $_GET['id'] }}" />

                        </div>




                    </div>






                </div>








                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnEditSave', 'data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                        data-dismiss="modal">{{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
