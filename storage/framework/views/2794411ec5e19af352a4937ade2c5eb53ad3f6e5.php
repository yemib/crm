<?php $__env->startSection('section'); ?>
    <hr>
    <div class="row">
        <form method="POST" id="myForm" action="/admin/invoices/<?php echo e($invoice->id); ?>/edit">

            <?php echo e(csrf_field()); ?>

            <input name="aftersale" type="hidden" value="aftersale" />
            <div align="right">
                <div id="alertContainer" style="color:white  !important"></div>
                <button class="btn btn-primary">After Sales Job</button>
                <br />
            </div>


            <table
                class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-bordered">
                <thead>
                    <tr>
                        <th><?php echo e(__('messages.invoice.item')); ?></th>
                        <th><?php echo e(__('messages.common.description')); ?></th>
                        <?php if($invoice->unit == 1): ?>
                            <th class="text-right"><?php echo e(__('messages.invoice.qty')); ?></th>
                        <?php elseif($invoice->unit == 2): ?>
                            <th class="text-right"><?php echo e(__('messages.invoice.hours')); ?></th>
                        <?php else: ?>
                            <th class="text-right"><?php echo e(__('messages.invoice.qty/hours')); ?></th>
                        <?php endif; ?>
                        <th class="text-right itemRate"><?php echo e(__('messages.products.rate')); ?>(<i
                                class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i>)
                        </th>
                        <th class="text-right itemTax"><?php echo e(__('messages.invoice.taxes')); ?>(<i class="fas fa-percentage"></i>)
                        </th>
                        <th class="text-right itemTotal"><?php echo e(__('messages.invoice.total')); ?>(<i
                                class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i>)
                        </th>
                    </tr>
                </thead>


                <?php $__currentLoopData = $invoice->salesItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    
                    $check = false;
                    

                    if($item->warranty  !=  NULL){ 
                    //chenck if any of the sales item warranty is void or not
                    // Get today's date as a Unix timestamp
                    $todayTimestamp = strtotime(date('Y-m-d'));
                    
                    // Get the timestamp of the other date you want to compare
                    $otherDateTimestamp = strtotime($item->warranty);
                    
                    // Compare the timestamps
                    if ($todayTimestamp > $otherDateTimestamp) {
                        //echo "Today's date is greater than the other date.";
                    
                        $check = true;
                    } elseif ($todayTimestamp < $otherDateTimestamp) {
                        // echo "Today's date is less than the other date.";
                    } else {
                        //echo "Today's date is equal to the other date.";
                    }
                }
                    ?>


                    <?php if($check == true): ?>
                        <tr>
                            <td> <input id="check<?php echo e($item->id); ?>" type="checkbox" name="product_check[]"
                                    value="<?php echo e($item->id); ?>" style="width: 30px  ;" /> <label style="cursor: pointer"
                                    for="check<?php echo e($item->id); ?>"> <?php echo e(html_entity_decode($item->item)); ?></label></td>
                            <td class="table-data"><?php echo !empty($item->description) ? $item->description : __('messages.common.n/a'); ?></td>
                            <td class="text-right"><?php echo e($item->quantity); ?></td>
                            <td class="text-right"><i class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i>
                                <?php echo e(formatNumber($item->rate)); ?></td>
                            <td class="text-right show-taxes-list">
                                <?php $__empty_1 = true; $__currentLoopData = $item->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <span class="badge badge-light"><?php echo e($tax->tax_rate); ?>%</span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php echo e(__('messages.common.n/a')); ?>

                                <?php endif; ?>
                            </td>
                            <td class="text-right"><i class="<?php echo e(getCurrencyClassFromIndex($invoice->currency)); ?>"></i>
                                <?php echo e(number_format($item->total, 2)); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>

        </form>



    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("myForm");

            form.addEventListener("submit", function(event) {
                // Get all checkboxes with name "checkbox"
                var checkboxes = document.querySelectorAll(
                'input[type="checkbox"][name="product_check[]"]');
                var isChecked = false;

                // Iterate through each checkbox
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isChecked = true;
                    }
                });

                // If none of the checkboxes are checked, prevent form submission
                if (!isChecked) {
                    event.preventDefault();
                    //alert("Please select at least one product before submitting the form.");
                    showAlert("Please select at least one product before submitting the form.",
                        "alert-danger");
                }
            });



            function showAlert(message, className) {
                var alertDiv = document.createElement("div");
                alertDiv.classList.add("alert", className);
                alertDiv.textContent = message;

                var container = document.getElementById("alertContainer");
                container.appendChild(alertDiv);

                setTimeout(function() {
                    alertDiv.remove();
                }, 4000);
            }

        });
    </script>

    <style>
        /* Alert box styles */
        .alert {
            padding: 15px;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
            color: #3c763d;
            background-color: #dff0d8;
            margin-bottom: 10px;
        }

        .alert-danger {
            color: black !important;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('invoices.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/invoices/views/aftersalerepair.blade.php ENDPATH**/ ?>