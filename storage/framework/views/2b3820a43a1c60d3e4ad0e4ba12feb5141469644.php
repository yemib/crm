<table class="table table-responsive-sm table-responsive-md table-striped table-bordered">
    <thead>
        <tr>
            <th  style="width: 20%"  > Product Code &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <span class="required">*</span></th>
            <th    style="width: 15% ;"><?php echo e(__('messages.common.description')); ?> </th>
            <th class="small-column"><span class="qtyHeader"><?php echo e(__('messages.invoice.qty')); ?></span><span
                    class="required">*</span></th>
            <th   style="white-space: nowrap;"   class="small-column"><?php echo e(__('messages.products.rate')); ?>(<i
                    data-set-currency-class="true"></i>)
                <span class="required">*</span>
            </th>
            <th   class="medium-column"><?php echo e(__('messages.products.tax')); ?>(<i class="fas fa-percentage"></i>)
            </th>

            <th   style="white-space: nowrap;" class="medium-column">Warranty Period
            </th>


            <th class="small-column"><?php echo e(__('messages.invoice.amount')); ?><span class="required">*</span>
            </th>
            <th class="button-column"><a href="#" id="itemAddBtn"><i class="fas fa-plus"></i></a>
            </th>
        </tr>
    </thead>
    <tbody class="items-container">
        <tr>
            <td  > 

                <select onchange="extractdata($(this))" class="form-control" id="singleproduct" required>
                    <option>Select Product</option>
                    <?php $__currentLoopData = $data['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"> <?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <input type="hidden" name="item[]" class="form-control item-name" required
                    placeholder="<?php echo e(__('messages.estimate.item')); ?>">

            </td>
            <td  >
                <input name="description[]" class="form-control item-description"
                    placeholder="<?php echo e(__('messages.common.description')); ?>" />
            </td>
            <td><input type="text" name="quantity[]" id="quantity" class="form-control qty" required
                    min="0" placeholder="<?php echo e(__('messages.invoice.qty')); ?>">
            </td>
            <td><input type="text" name="rate[]" id="rate" class="form-control rate" required
                    placeholder="<?php echo e(__('messages.products.rate')); ?>"></td>



            <td class="">
                <select name="" class="form-control tax-rates" multiple>
                </select>
            </td>

            <td   class="warranty_period">


             <select  name="warranty_period[]"  class="form-control">
                <option value="">Select Warranty Period</option>
                <?php  $warranties =   App\Models\WarrantyType::get(); ?>
                <?php $__currentLoopData = $warranties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warranty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option   value="<?php echo e($warranty->id); ?>"> <?php echo e($warranty->number); ?>   <?php echo e($warranty->type); ?></option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>



            </td>

            <td class="item-amount-width"><i data-set-currency-class="true"></i> <span
                    class="item-amount">0</span></td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php /**PATH C:\websites\crm\crm\resources\views/invoices/items_table.blade.php ENDPATH**/ ?>