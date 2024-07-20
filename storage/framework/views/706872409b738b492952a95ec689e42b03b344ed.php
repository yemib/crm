<select  name="warranty_period"  class="form-control">
<option value="">Select Warranty Period</option>
<?php  $warranties =   App\Models\WarrantyType::get(); ?>
<?php $__currentLoopData = $warranties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warranty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option   value="<?php echo e($warranty->id); ?>"> <?php echo e($warranty->number); ?>   <?php echo e($warranty->type); ?></option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>


<?php /**PATH C:\websites\crm\crm\resources\views/invoices/warranty_period.blade.php ENDPATH**/ ?>