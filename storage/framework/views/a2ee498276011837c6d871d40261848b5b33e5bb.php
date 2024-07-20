<div class="card-body">
    <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
    <div class="row">


        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('title', __('messages.estimate.title') . ':')); ?><span class="required">*</span>
            

            <select onchange="handleSelectChange()" id="mySelect" name="title" class="form-control" required autofocus>
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
                <?php echo e(Form::text('estimate_number', generateUniqueEstimateNumber(), ['class' => 'form-control', 'required', 'id' => 'estimateNumber', 'readonly', 'placeholder' => __('messages.estimate.estimate_number')])); ?>

            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('customer', __('messages.invoice.customer') . ':')); ?>

            <span class="required">*</span>

            <select placeholder="<?php echo e(__('messages.placeholder.select_customer')); ?>" name="customer_id"
                id="customerSelectBox" class="form-control" required>

                <?php $__currentLoopData = $data['customers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($customer->id); ?> "> <?php echo e($customer->company_name); ?> - <?php echo e($customer->client_name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <?php echo e(Form::label('estimate_date', __('messages.estimate.estimate_date') . ':')); ?> <span
                class="required">*</span>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>

                <input onchange="add30DaysToDateString()" onkeydown="add30DaysToDateString()"
                    onclick="add30DaysToDateString()" id="estimate_date" name="estimate_date"
                    value="<?php echo e(date('Y-m-d H:i:s')); ?>" class="form-control datepicker" required
                    placeholder="<?php echo e(__('messages.estimate.estimate_date')); ?>" />
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <?php echo e(Form::label('expiry_date', __('messages.estimate.expiry_date') . ':')); ?>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>

                <input id="estimate_expiry_date" name="estimate_expiry_date" class="form-control due-datepicker"
                    placeholder="<?php echo e(__('messages.estimate.expiry_date')); ?>" />
            </div>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('tag', __('messages.tags') . ':')); ?>

            <div class="input-group">
                <?php echo e(Form::select('tags[]', $data['tags'], null, ['class' => 'form-control', 'id' => 'tagId', 'autocomplete' => 'off', 'multiple' => 'multiple'])); ?>

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
                <option value="0" disabled="true" selected="true"><?php echo e(__('messages.placeholder.select_currency')); ?>

                </option>
                <?php $__currentLoopData = $data['currencies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"
                        <?php echo e($key == getCurrentCurrencyIndex(getCurrentCurrency()) ? 'selected' : ''); ?>>
                        &#<?php echo e(getCurrencyIcon($key)); ?>&nbsp;&nbsp;&nbsp; <?php echo e($currency); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('reference', __('messages.credit_note.reference') . ':')); ?>

            <?php echo e(Form::text('reference', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => __('messages.credit_note.reference')])); ?>

        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('sale_agent', __('messages.invoice.sale_agent') . ':')); ?>

            <select name="sales_agent_id" class = 'form-control sale-agent-select-box' id="saleAgentId">
                <?php
                $usert = auth()->user();
                ?>
                <?php $__currentLoopData = $data['saleAgents']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($usert->id == $key): ?> selected ="selected" <?php endif; ?> value="<?php echo e($key); ?>">
                        <?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-12">
            <?php echo e(Form::label('discount_type', __('messages.invoice.discount_type') . ':')); ?><span class="required">*</span>
            <?php echo e(Form::select('discount_type', $data['discountType'], 2, ['class' => 'form-control', 'id' => 'discountTypeSelect', 'required', 'placeholder' => __('messages.placeholder.select_discount_type')])); ?>

        </div>
        <div style="display: none" class="form-group col-lg-4 col-md-6 col-sm-12">
            <?php echo e(Form::label('hsn_tax', __('messages.invoice.hsn_tax') . ':')); ?>

            <?php echo e(Form::text('hsn_tax', isset($estimate->hsn_tax) ? $estimate->hsn_tax : null, ['class' => 'form-control', 'placeholder' => __('messages.invoice.hsn_tax')])); ?>

        </div>

        <div class="col-sm-12">
            <style>
                label {
                    cursor: pointer
                }

                .left-align-table {
                    text-align: left;
                }

                .break-word {
                    word-wrap: break-word;
                    width: 50% !important
                }
            </style>

            

            <label> Select Address </label>


            <div class="row" id="bill_to">
                _ _ _ _ _ _
            </div>


        </div>
        <div class="form-group col-lg-2 col-md-4 col-sm-12">
            <?php echo e(Form::label('ship_to', __('messages.invoice.ship_to') . ':')); ?>

            <div id="ship_to">

            </div>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <?php echo e(Form::label('admin_note', __('messages.invoice.admin_note') . ':')); ?>

            <?php echo e(Form::textarea('admin_note', isset($settings) ? $settings['admin_note'] : null, ['class' => 'form-control summernote-simple'])); ?>

        </div>
    </div>

    <hr />
    <br />

    <div class="row">
        <div class="form-group col-lg-6 col-md-12 col-sm-12">
            <div class="input-group">

                
            </div>
        </div>
        <div
            class="form-group col-lg-6 col-md-12 col-sm-12 showQuantityAs d-flex align-items-center justify-content-end">
            <span class="font-weight-bold mr-2"><?php echo e(__('messages.invoice.show_quantity_as') . ':'); ?></span>
            <div class="float-right showQuantityAs">
                <div class="custom-control custom-radio mr-3 d-inline-block">
                    <input type="radio" id="qty" name="unit" required value="1"
                        class="custom-control-input" data-quantity-for="qty" checked>
                    <label class="custom-control-label" for="qty"><?php echo e(__('messages.invoice.qty')); ?></label>
                </div>

                

            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12 overflow-section">
            <table class="table table-responsive-sm table-responsive-md table-striped table-bordered">
                <thead>
                    <tr>
                        <th><?php echo e(__('messages.estimate.item')); ?> <span class="required">*</span></th>
                        <th><?php echo e(__('messages.estimate.title')); ?></th>
                        <th class="small-column"><span
                                class="qtyHeader"><?php echo e(__('messages.estimate.qty')); ?></span><span
                                class="required">*</span></th>
                        <th class="small-column"><?php echo e(__('messages.estimate.rate')); ?>(<i
                                data-set-currency-class="true"></i>)<span class="required">*</span></th>
                        <th class="medium-column"><?php echo e(__('messages.estimate.taxes')); ?>(<i
                                class="fas fa-percentage"></i>)
                        </th>
                        <th class="small-column"><?php echo e(__('messages.estimate.amount')); ?><span class="required">*</span>
                        </th>
                        <th class="button-column"><a href="#" id="itemAddBtn"><i class="fas fa-plus"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody class="items-container">
                    <tr>
                        <td>
                            <select onchange="extractdata($(this))" class="form-control" id="singleproduct" required>
                                <option value="">Select Product</option>
                                <?php $__currentLoopData = $data['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"> <?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <input type="hidden" name="item[]" class="form-control item-name" required
                                placeholder="<?php echo e(__('messages.estimate.item')); ?>">

                        </td>
                        <td><input name="description[]" class="form-control item-description" placeholder="title" />
                        </td>
                        <td><input type="text" name="quantity[]" class="form-control qty" required min="0"
                                placeholder="<?php echo e(__('messages.estimate.qty')); ?>"></td>
                        <td><input type="text" name="rate[]" class="form-control rate" required
                                placeholder="<?php echo e(__('messages.estimate.rate')); ?>"></td>
                        <td class="">
                            <select name="tax[]" class="form-control tax-rates" multiple>
                            </select>
                        </td>
                        <td class="item-amount-width"><i data-set-currency-class="true"></i> <span
                                class="item-amount">0</span></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-2 col-md-6 col-sm-12">
            <?php echo e(Form::label('sub_total', __('messages.estimate.sub_total') . '  (EXCL VAT):')); ?>

            <p><i data-set-currency-class="true"></i> <span id="subTotal">0</span></p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="fDiscount form-group">
                <?php echo e(Form::label('discount', __('messages.estimate.discount') . ':')); ?>

                 <span style="display:none" class="footer-discount-numbers">0</span>
                <div class="input-group">
                    
                    <input name="final_discount" value="0" class="form-control footer-discount-input"
                        placeholder="<?php echo e(__('messages.estimate.discount')); ?>" />
                    <div class="input-group-append">
                        <select class="input-group-text dropdown" id="footerDiscount" name="discount_symbol">
                            <div class="dropdown-menu">
                                <option value="1" class="dropdown-item">%</option>
                                
                            </div>
                        </select>
                    </div>
                </div>
            </div>
            <div style="color: red" class="discount_message"></div>
            <table id="taxesListTable" class="w-100">
            </table>
        </div>
        <div style="display:none" class="form-group col-lg-3 col-md-6 col-sm-12">
            <?php echo e(Form::label('adjustment', __('messages.estimate.adjustment') . ':')); ?>

            (<i data-set-currency-class="true"></i> <span class="adjustment-numbers">0</span>)
            <?php echo e(Form::number('adjustment', 0, ['class' => 'form-control', 'id' => 'adjustment', 'placeholder' => __('messages.estimate.adjustment')])); ?>

        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12">
            <?php echo e(Form::label('total', __('messages.estimate.total') . ' (INCL VAT):')); ?>

            <p><i data-set-currency-class="true"></i> <span class="total-numbers">0</span></p>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <?php echo e(Form::label('client_note', __('messages.common.client_note') . ':')); ?>

            <?php echo e(Form::textarea('client_note', isset($settings) ? $settings['client_note'] : null, ['class' => 'form-control summernote-simple'])); ?>

        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <?php echo e(Form::label('terms_conditions', __('messages.estimate.terms_conditions') . ':')); ?>

            <?php echo e(Form::textarea('term_conditions', isset($settings) ? $settings['term_and_conditions'] : null, ['id' => 'term_conditions', 'class' => 'form-control summernote-simple'])); ?>

        </div>
        <div class="form-group col-sm-12">
            <div class="btn-group dropup open">
                
                <a href="#" class="btn btn-primary" id="saveAsDraft"
                    data-status="0"><?php echo e(__('messages.common.save')); ?></a>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-left width200">
                    <li>
                        <a href="#" class="dropdown-item" id="saveAsDraft"
                            data-status="0"><?php echo e(__('messages.estimate.save_as_draft')); ?></a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item" id="saveAndSend"
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
    function add30DaysToDateString() {

        // Parse the input date string
        estimatedate = document.getElementById('estimate_date').value;


        const currentDate = new Date(estimatedate);

        // Add 30 days to the date
        currentDate.setDate(currentDate.getDate() + 30);

        // Format the result in the same format
        const resultDateString = currentDate.toISOString().slice(0, 19).replace("T", " ");
        document.getElementById('estimate_expiry_date').value = resultDateString;
        // return resultDateString;
    }

    add30DaysToDateString();

    // Example usage:
    /* const inputDate = "2024-01-09 13:41:14";
    const newDate = add30DaysToDateString(inputDate); */



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
        document.getElementById('term_conditions').value = termValue;


        // Find the second element with the class name 'note-editable'
        var noteEditableElements = document.getElementsByClassName("note-editable");

        // Check if the second element exists
        if (noteEditableElements.length >= 2) {



            // Change the HTML content of the second element
            noteEditableElements[2].innerHTML = termValue;



        }


    }

    handleSelectChange();
</script>
<?php /**PATH G:\websites\crm\crm\resources\views/estimates/fields.blade.php ENDPATH**/ ?>