<table class="table table-responsive-sm table-responsive-md table-striped table-bordered" id="itemTable">
    <thead>

        <?php if(!isset($who)): ?>
            <tr>
                <th style="width: 20%"><?php echo e(__('messages.invoice.item')); ?><span class="required">*</span>
                </th>
                <th style="width: 15%  ; "><?php echo e(__('messages.common.description')); ?></th>
                <th class="small-column"><span
                        class="qtyHeader"><?php echo e(__('messages.invoice.qty')); ?></span><span
                        class="required">*</span></th>
                <th style="white-space: nowrap;" class="small-column">
                    <?php echo e(__('messages.products.rate')); ?>(<i data-set-currency-class="true"></i>)<span
                        class="required">*</span>
                </th>
                <th style="white-space: nowrap;" class="medium-column">
                    <?php echo e(__('messages.products.tax')); ?>(<i class="fas fa-percentage"></i>)</th>
                <th style="white-space: nowrap;"> Warranty Period </th>


                <?php if(isset($who)): ?>
                    <th class="button-column"> Warranty Expires</th>

                <?php endif; ?>


                <th class="small-column"><?php echo e(__('messages.invoice.amount')); ?><span
                        class="required">*</span></th>

                <?php if(!isset($who)): ?>
                    <th class="button-column"><a href="#" id="itemAddBtn"><i
                                class="fas fa-plus"></i></a></th>
                <?php endif; ?>


            </tr>
        <?php else: ?>
            <tr>
                <th> Serial No</th>

                <th> Image </th>

                <th><?php echo e(__('messages.invoice.item')); ?></span></th>
               <th><?php echo e(__('messages.common.description')); ?></th>

                <th class="small-column"><span class="qtyHeader"><?php echo e(__('messages.invoice.qty')); ?></span>
                </th>

                <th style="white-space: nowrap;"> Warranty Period </th>



                <th class="button-column"> Warranty Expires </th>



                <th class="small-column"><?php echo e(__('messages.invoice.amount')); ?></th>




            </tr>



        <?php endif; ?>
    </thead>
    <tbody class="items-container">

        <?php if (isset($_POST['product_check'])) {
            $products = $_POST['product_check'];
        } ?>
        <?php $__currentLoopData = $invoice->salesItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            if (isset($_POST['product_check'])) {
                if (!in_array($item->id, $products)) {
                    continue;
                }
            } ?>
            <?php if(!isset($who)): ?>

                <tr>
                    <td>
                        

                        <select onchange="extractdata($(this))" id="singleproduct" class="form-control"
                            required>
                            <?php $__currentLoopData = $data['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"
                                    <?php if($item->item == $value): ?> selected <?php endif; ?>> <?php echo e($value); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <input type="hidden" name="item[]" value="<?php echo e($item->item); ?>"
                            class="item-name" required />

                    </td>
                    <td><input name="description[]" class="form-control item-description"
                            placeholder="<?php echo e(__('messages.common.description')); ?>"
                            value="<?php echo e($item->description); ?>" /></td>

                    <td><input type="text" name="quantity[]" class="form-control qty" required
                            min="0" value="<?php echo e($item->quantity); ?>"></td>
                    <td><input type="text" name="rate[]" class="form-control rate" required
                            value="<?php echo e($item->rate); ?>"
                            placeholder="<?php echo e(__('messages.products.rate')); ?>">
                    </td>
                    <td class="">
                        <?php echo e(Form::select('tax[]', $data['taxesArr'], $item->taxes->pluck('id'), ['class' => 'form-control tax-rates', 'multiple'])); ?>

                    </td>
                    <td class="warranty_period">
                        <?php if(!isset($who)): ?>


                            <select name="warranty_period[]" class="form-control">
                                <option value="">Select Warranty Period</option>
                                <?php $warranties = App\Models\WarrantyType::get(); ?>
                                <?php $__currentLoopData = $warranties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warranty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        <?php if(isset($item->warrantyperiod->id)): ?> <?php if($item->warrantyperiod->id == $warranty->id): ?>
                    selected <?php endif; ?>
                                        <?php endif; ?> value="<?php echo e($warranty->id); ?>">
                                        <?php echo e($warranty->number); ?> <?php echo e($warranty->type); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        <?php else: ?>
                            <?php if(isset($item->warrantyperiod->id)): ?>

                                <?php echo e($item->warrantyperiod->number); ?> <?php echo e($item->warrantyperiod->type); ?>


                            <?php endif; ?>


                        <?php endif; ?>



                    </td>

                    <?php if(isset($who)): ?>
                        <td>

                            <?php echo e($item->warranty); ?>

                        </td>


                    <?php endif; ?>

                    <td class="item-amount-width"><i data-set-currency-class="true"></i> <span
                            class="item-amount"><?php echo e(number_format($item->total)); ?></span></td>
                    <?php if(!isset($who)): ?>
                        <td><a href="#" class="remove-invoice-item text-danger"><i
                                    class="far fa-trash-alt"></i></a>
                        </td>
                    <?php endif; ?>


                </tr>
            <?php else: ?>
                <tr>

                    <td style="white-space: nowrap;"><?php echo e($item->serial_no); ?></td>
                    <td>
                        <?php if($item->image != null): ?> <a
                                target="_blank" href="<?php echo e($item->image); ?>">
                                <img src="<?php echo e($item->image); ?>" height="100px" width="100px" /> </a>
                        <?php endif; ?>
                    </td>

                    <td style="white-space: nowrap;">
                        <?php echo e($item->item); ?>


                    </td>

                     <td style="white-space: nowrap;"><?php echo e($item->description); ?></td>

                    <td><?php echo e($item->quantity); ?></td>


                    <td style="white-space: nowrap;" class="warranty_period">
                        <?php if(isset($item->warrantyperiod->id)): ?>

                            <?php echo e($item->warrantyperiod->number); ?> <?php echo e($item->warrantyperiod->type); ?>


                        <?php endif; ?>
                    </td>


                    <td style="white-space: nowrap;">

                        <?php

                        $date_format = '';
                        if ($item->warranty != null) {
                            $date_format = date_format(date_create($item->warranty), 'd - M  Y');
                        }

                        ?>

                        <?php echo e($date_format); ?>

                    </td>


                    <td class="item-amount-width"><i data-set-currency-class="true"></i> <span
                            class="item-amount"><?php echo e(number_format($item->total)); ?></span></td>



                </tr>




            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\websites\crm\crm\resources\views/invoices/item_edit_table.blade.php ENDPATH**/ ?>