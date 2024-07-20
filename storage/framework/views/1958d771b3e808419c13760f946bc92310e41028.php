<input type="hidden" id="estimateId" value="<?php echo e($estimate->id); ?>">
<div class="card-body">
    <div class="alert alert-danger d-none" id="validationErrorsBox"></div>

    <div class="row">
        <div align="right" class="col-sm-12">

            <?php if($estimate->is_admin == 0): ?>

                <?php if($estimate->discount > 10 && auth()->user()->is_admin == 1): ?>


                    <?php if($estimate->discount_approved == null): ?>

                        <a href="<?php echo e(route('estimate.discount.approve', $estimate->id)); ?>"
                            onclick="return confirm('Are you sure you want to approve the discount?')" href=""
                            class="btn btn-success"> Approve Discount </a>



                        &nbsp; &nbsp;

                        <a href="<?php echo e(route('estimate.discount.reject', $estimate->id)); ?>"
                            onclick="return confirm('Are you sure you want to reject the discount?')" href=""
                            class="btn btn-danger"> Reject Discount </a>


                    <?php endif; ?>



                <?php endif; ?>


                <br />
                <br />
            <?php endif; ?>
        </div>


        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('title', __('messages.estimate.title') . ':')); ?><span class="required">*</span>

            <select onchange="handleSelectChange()" id="mySelect" name="title" class="form-control" required
                autofocus>
                <?php $__currentLoopData = $data['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->name); ?>" description="<?php echo e($category->description); ?>"
                        term = "<?php echo e($category->term); ?>"
                        <?php if(isset($estimate->title)): ?> <?php if($estimate->title == $category->name): ?> selected <?php endif; ?>
                        <?php endif; ?>><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('estimate_number', __('messages.estimate.estimate_number') . ':')); ?><span
                class="required">*</span>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <?php echo e(__('messages.estimate.estimate_prefix')); ?>

                    </div>
                </div>
                <?php echo e(Form::text('estimate_number', isset($estimate->estimate_number) ? $estimate->estimate_number : generateUniqueEstimateNumber(), ['class' => 'form-control', 'required', 'id' => 'estimateNumber', 'placeholder' => __('messages.estimate.estimate_number')])); ?>

            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('customer', __('messages.invoice.customer') . ':')); ?><span class="required">*</span>

            <select placeholder="<?php echo e(__('messages.placeholder.select_customer')); ?>" name="customer_id"
                id="customerSelectBox" class="form-control" required>

                <?php $__currentLoopData = $data['customers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(isset($estimate->customer_id)): ?> <?php if($estimate->customer_id == $customer->id): ?>   selected <?php endif; ?>
                        <?php endif; ?> value="<?php echo e($customer->id); ?> "> <?php echo e($customer->company_name); ?> - <?php echo e($customer->client_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('estimate_date', __('messages.estimate.estimate_date') . ':')); ?> <span
                class="required">*</span>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                <?php echo e(Form::text('estimate_date', isset($estimate->estimate_date) ? date('Y-m-d H:i:s', strtotime($estimate->estimate_date)) : null, ['class' => 'form-control datepicker', 'required', 'autocomplete' => 'off', 'placeholder' => __('messages.estimate.estimate_date')])); ?>

            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('expiry_date', __('messages.estimate.expiry_date') . ':')); ?>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                <?php echo e(Form::text('estimate_expiry_date', isset($estimate->estimate_expiry_date) ? date('Y-m-d H:i:s', strtotime($estimate->estimate_expiry_date)) : null, ['class' => 'form-control due-datepicker', 'autocomplete' => 'off', 'placeholder' => __('messages.estimate.expiry_date')])); ?>

            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('tag', __('messages.tags') . ':')); ?>

            <div class="input-group">
                <?php echo e(Form::select('tags[]', $data['tags'], isset($estimate->tags) ? $estimate->tags : null, ['class' => 'form-control', 'id' => 'tagId', 'autocomplete' => 'off', 'multiple' => 'multiple'])); ?>

                <div class="input-group-append plus-icon-height">
                    <div class="input-group-text">
                        <a href="#" data-toggle="modal" data-target="#addCommonTagModal"><i
                                class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('currency', __('messages.customer.currency') . ':')); ?><span class="required">*</span>
            <select id="estimateCurrencyId" data-show-content="true" class="form-control currency-select-box"
                name="currency" required>
                <option value="0" disabled="true" <?php echo e(isset($estimate->currency) ? '' : 'selected'); ?>>
                    <?php echo e(__('messages.placeholder.select_currency')); ?>

                </option>
                <?php $__currentLoopData = $data['currencies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"
                        <?php echo e((isset($estimate->currency) ? $estimate->currency : null) == $key ? 'selected' : ''); ?>>
                        &#<?php echo e(getCurrencyIcon($key)); ?>&nbsp;&nbsp;&nbsp; <?php echo e($currency); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('reference', __('messages.credit_note.reference') . ':')); ?>

            <?php echo e(Form::text('reference', isset($estimate->reference) ? $estimate->reference : null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => __('messages.credit_note.reference')])); ?>

        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('sale_agent', __('messages.invoice.sale_agent') . ':')); ?>

            <?php echo e(Form::select('sales_agent_id', $data['saleAgents'], isset($estimate->sales_agent_id) ? $estimate->sales_agent_id : null, ['class' => 'form-control sale-agent-select-box', 'id' => 'saleAgentId', 'placeholder' => __('messages.placeholder.select_sale_agent')])); ?>

        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('discount_type', __('messages.invoice.discount_type') . ':')); ?><span
                class="required">*</span>
            <?php echo e(Form::select('discount_type', $data['discountType'], isset($estimate->discount_type) ? $estimate->discount_type : null, ['class' => 'form-control', 'id' => 'discountTypeSelect', 'required', 'placeholder' => __('messages.placeholder.select_discount_type')])); ?>

        </div>


        


        <div class="col-sm-12">

            <label> Addresses </label>
            <div id="bill_to" class="row">

                <?php  $output   =  " ";
                 foreach($estimate->estimateAddresses as $address){

                    if( $address->billing_id   == NULL) {
                    $country  =  $address->country;

                    $bill_address  =  App\Models\EstimateAddress::where('billing_id' , $address->id)->first();

                    $bill_street  =   isset($bill_address->mapaddress) ?  $bill_address->mapaddress   :  ' ';
                    $bill_locality  =  isset($bill_address->locality) ?  $bill_address->locality  : ' ';
                    $bill_country  =  isset($bill_address->country) ? $bill_address->country :  ' ';
                    $bill_postal  =  isset( $bill_address->zip_code)  ?   $bill_address->zip_code  :  ' ';

                    ?>


                <div class='col-sm-6'>

                    <table class='table left-align-table'>
                        <tr>
                            <th>
                                <a href="<?php echo e(route('estimate.address.delete', $address->id)); ?>"
                                    onclick="return confirm('Are You Sure?')"> <i style='color: red'
                                        class='fa fa-trash'></i> </a>

                                <a href='/admin/edit_estimateaddress/<?php echo e($estimate->id); ?>/<?php echo e($address->id); ?>'
                                    class='mr-3 addressModalIcon'><i class='fa fa-edit'></i></a> <label
                                    for='selectaddress$address'> Sales Order to </label> :
                            </th>
                            <th>
                                <label for='selectaddress$address'> Delivery to: </label>
                            </th>

                        <tr>
                            <td class='break-word'>
                                <p>
                                    <label for='selectaddress$address'>
                                        Street : <?php echo e($address->mapaddress); ?> <br />
                                        Locality : <?php echo e($address->locality); ?>

                                        <br />
                                        Region : <?php echo e($country); ?>

                                        <br />
                                        Postal Code : <?php echo e($address->zip_code); ?>

                                </p>
                                </label>
                            </td>
                            <td align='left' class='break-word'>
                                <label for='selectaddress$address'>
                                    <p>
                                        Street : <?php echo e($bill_street); ?><br />
                                        Locality : <?php echo e($bill_locality); ?>

                                        <br />
                                        Region : <?php echo e($bill_country); ?>

                                        <br />
                                        Postal Code : <?php echo e($bill_postal); ?>

                                    </p>
                                </label>

                            </td>
                            </td>


                        </tr>

                    </table>

                </div>

                <?php
                    }

         }


        ?>
                <?php if(count($estimate->estimateAddresses) == 0): ?>
                    _ _ _ _ _ _
                <?php endif; ?>

            </div>
        </div>





        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <?php echo e(Form::label('admin_note', __('messages.invoice.admin_note') . ':')); ?>

            <?php echo e(Form::textarea('admin_note', isset($estimate->admin_note) ? nl2br(e($estimate->admin_note)) : null, ['class' => 'form-control summernote-simple', 'id' => 'editAdminNote'])); ?>

        </div>
    </div>

    <hr />
    <br />

    <div class="row">
        <div class="form-group col-lg-6 col-md-12 col-sm-12">
            
        </div>
        <div
            class="form-group col-lg-6 col-md-12 col-sm-12 showQuantityAs d-flex align-items-center justify-content-end">
            <span class="font-weight-bold mr-2"><?php echo e(__('messages.invoice.show_quantity_as') . ':'); ?></span>
            <div class="float-right showQuantityAs">
                <div class="custom-control custom-radio mr-3 d-inline-block">
                    <input type="radio" id="qty" name="unit" required value="1"
                        class="custom-control-input" data-quantity-for="qty"
                        <?php echo e($estimate->unit == 1 ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="qty"><?php echo e(__('messages.invoice.qty')); ?></label>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12 overflow-section">
            <?php

               $invoice  =  $estimate ;
            ?>
            <?php echo $__env->make('invoices.item_edit_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-2 col-md-6 col-sm-12">
            <?php echo e(Form::label('sub_total', __('messages.invoice.sub_total') . ' (EXCL VAT):')); ?>

            <p><i data-set-currency-class="true"></i> <span id="subTotal"><?php echo e($estimate->sub_total); ?></span></p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="fDiscount form-group">
                <?php echo e(Form::label('discount', __('messages.invoice.discount') . ':')); ?>

                <div style="display: none"> (<i data-set-currency-class="true"></i> <span
                        class="footer-discount-numbers"><?php echo e(formatNumber($estimate->discount)); ?></span>) </div>
                <div class="input-group">
                    <?php echo e(Form::text('final_discount', $estimate->discount, ['class' => 'form-control footer-discount-input', 'placeholder' => __('messages.invoice.discount')])); ?>

                    <div class="input-group-append">
                        <?php if(isset($estimate->discount_type) && $estimate->discount_type === 0): ?>
                            <input type="hidden" name="discount_symbol" value="0">
                        <?php endif; ?>
                        <select class="input-group-text dropdown" id="footerDiscount" name="discount_symbol">
                            <div class="dropdown-menu">
                                <option value="1" class="dropdown-item"
                                    <?php echo e(isset($estimate->discount_symbol) && $estimate->discount_symbol == 1 ? 'selected' : ''); ?>>
                                    %
                                </option>
                                
                            </div>
                        </select>
                    </div>
                </div>
            </div>
            <div style="color: red" class="discount_message"></div>
            <table id="taxesListTable" class="w-100">
                <?php $__currentLoopData = $estimate->salesTaxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td colspan="2" class="font-weight-bold tax-value"><?php echo e($tax->tax); ?>%</td>
                        <td style="display: none" class="footer-numbers footer-tax-numbers">
                            <?php echo e(number_format($tax->amount, 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <div style="display:none" class="form-group col-lg-3 col-md-6 col-sm-12">
            <?php echo e(Form::label('adjustment', __('messages.estimate.adjustment') . ':')); ?>

            (<i data-set-currency-class="true"></i> <span
                class="adjustment-numbers"><?php echo e(number_format($estimate->adjustment)); ?></span>)
            <?php echo e(Form::number('adjustment', $estimate->adjustment, ['class' => 'form-control', 'id' => 'adjustment', 'placeholder' => __('messages.estimate.adjustment')])); ?>

        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12">
            <?php echo e(Form::label('total', __('messages.invoice.total') . ' (INCL VAT):')); ?>

            <p><i data-set-currency-class="true"></i> <span
                    class="total-numbers"><?php echo e(number_format($estimate->total_amount)); ?></span></p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <?php echo e(Form::label('client_note', __('messages.invoice.client_note') . ':')); ?>

            <?php echo e(Form::textarea('client_note', isset($estimate->client_note) ? nl2br(e($estimate->client_note)) : null, ['class' => 'form-control summernote-simple', 'id' => 'editClientNote'])); ?>

        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <?php echo e(Form::label('terms_conditions', __('messages.invoice.terms_conditions') . ':')); ?>

            <?php echo e(Form::textarea('term_conditions', isset($estimate->term_conditions) ? nl2br(e($estimate->term_conditions)) : null, ['class' => 'form-control summernote-simple', 'id' => 'editTermAndConditions'])); ?>

        </div>
        <div class="form-group col-sm-12">
            <div class="btn-group dropup open">
                <?php echo e(Form::button('Save', ['class' => 'btn btn-primary'])); ?>

                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-left width200">
                    <li>
                        <a href="#" class="dropdown-item" id="editSaveSend"
                            data-status="1"><?php echo e(__('messages.estimate.save_and_send')); ?></a>
                    </li>
                </ul>
            </div>
            <a href="<?php echo e(url()->previous()); ?>"
                class="btn btn-secondary text-dark ml-3"><?php echo e(__('messages.common.cancel')); ?></a>
        </div>
    </div>
</div>

<script>
    function handleSelectChange() {

        // Get the select element
        var selectElement = document.getElementById("mySelect");
        // Get the selected option
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        // Get the value of the description attribute
        var descriptionValue = selectedOption.getAttribute("description");
        var termValue = selectedOption.getAttribute("term");
        // Get the value of the selected option
        var selectedValue = selectedOption.value;
        // Log the description value to the console
        //  alert("Description:"+selectedValue);
        //$('.note-editable').html(selectedValue);
        var $all = selectedValue + `<br/>` + descriptionValue;


        document.getElementById('editTermAndConditions').value = termValue;


        // Find the second element with the class name 'note-editable'
        var noteEditableElements = document.getElementsByClassName("note-editable");

        // Check if the second element exists
        if (noteEditableElements.length >= 2) {



            // Change the HTML content of the second element
            noteEditableElements[2].innerHTML = termValue;



        }


    }

    // handleSelectChange()  ;
</script>
<?php /**PATH C:\websites\crm\crm\resources\views/estimates/edit_fields.blade.php ENDPATH**/ ?>