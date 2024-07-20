<style>

td:has(input[name="description[]"]){
       /*  display: none; */
    }

</style>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.invoice.invoice')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
    <link href="<?php echo e(asset('css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/@fortawesome/fontawesome-free/css/all.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/invoices/invoices.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('messages.invoice.new_invoice')); ?></h1>
            <div class="section-header-breadcrumb">
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary form-btn float-right-mobile">
                    <?php echo e(__('messages.common.back')); ?>

                </a>
            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <?php echo e(Form::open(['route' => 'invoices.store', 'validated' => false, 'id' => 'invoiceForm'])); ?>


                            <?php if(isset($_GET['job'])): ?>

                <input  type="hidden"  name="job"   value="<?php echo e($_GET['job']); ?>" />
                <?php endif; ?>
                <?php echo $__env->make('invoices.address_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('invoices.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </section>

  <?php
     $warranty_template   = @include('invoices.warranty_period') ;

  ?>
    <?php echo $__env->make('invoices.templates.templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('tags.common_tag_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('payment_modes.common_payment_mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom/custom-datatable.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/bs4-summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/select2.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <script>
        let taxData = JSON.parse('<?php echo json_encode($data['taxes'], 15, 512) ?>');
        let invoiceUrl = "<?php echo e(route('invoices.index')); ?>";
        let isCreate = true;
        let createData = true;
        let createInvoiceAddress = true;
        let customerURL = "<?php echo e(route('get.customer.address')); ?>";
        let editData = false;
     </script>


    <script src="<?php echo e(mix('assets/js/custom/input-price-format.js')); ?>"></script>



    <?php echo $__env->make('sales.sales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('invoices.invoice_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/invoices/create.blade.php ENDPATH**/ ?>