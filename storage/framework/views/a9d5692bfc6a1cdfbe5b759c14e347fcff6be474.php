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
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/invoices/invoices.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>   <?php if(!isset($who)): ?>   <?php if(isset($_POST['aftersale'])): ?>  After-Sale  Repair Invoice  <?php else: ?>  <?php echo e(__('messages.invoice.edit_invoice')); ?>     <?php endif; ?>  <?php else: ?> Product Warranty  <?php endif; ?></h1>
            <div class="section-header-breadcrumb">
                <?php if(isset($who)): ?>
                <?php if( $invoice->warranty  ==  1): ?>
                <a href="<?php echo e(route('employee.active.warranties')); ?>" class="btn btn-primary form-btn float-right-mobile">
                    Active Warranties
                </a>


                <?php endif; ?>


                <?php if( $invoice->warranty  ==  -1): ?>
                <a href="<?php echo e(route('employee.void.warranties')); ?>" class="btn btn-primary form-btn float-right-mobile">
                    Void Warranties
                </a>


                <?php endif; ?>


                <?php if( $invoice->warranty  ==  -2): ?>
                <a href="<?php echo e(route('employee.expired.warranties')); ?>" class="btn btn-primary form-btn float-right-mobile">
                    Expired Warranties
                </a>


                <?php endif; ?>


                <?php else: ?>
                <a href="<?php echo e(route('invoices.index')); ?>" class="btn btn-primary form-btn float-right-mobile">
                    Invoices
                </a>


                <?php endif; ?>
            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <?php if(!isset($who)): ?>

                <?php if(isset($_POST['aftersale'])): ?>
                <?php echo e(Form::open(['route' => ['invoices.store'], 'validated' => false,
                'method' => 'POST', 'id' => 'editInvoiceForm'])); ?>


                <?php else: ?>
                <?php echo e(Form::open(['route' => ['invoices.update', $invoice->id], 'validated' => false, 'method' => 'POST', 'id' => 'editInvoiceForm'])); ?>

                  <?php endif; ?>


                  <?php if(isset($_POST['aftersale'])): ?>

                  <input    name="aftersale"   value="<?php echo e($invoice->id); ?>"  type="hidden"/>

                  <?php endif; ?>

                <?php endif; ?>
                <?php echo $__env->make('invoices.address_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('invoices.edit_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(!isset($who)): ?>
                <?php echo e(Form::close()); ?>

                <?php endif; ?>
            </div>
        </div>
    </section>
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
        let editData = true;
        let invoiceEdit = true;
        let taxData = JSON.parse('<?php echo json_encode($data['taxes'], 15, 512) ?>');

         <?php if(isset($_POST['aftersale'])): ?>
         let  invoicestore  =  "<?php echo e(route('invoices.store')); ?>"  ;

         let invoiceEditURL =  "<?php echo e(route('invoices.index')); ?>"

         <?php else: ?>
        let invoiceEditURL = "<?php echo e(route('invoices.index')); ?>";

        <?php endif; ?>


        let editInvoiceAddress = true;
        let customerURL = "<?php echo e(route('get.customer.address')); ?>";
    </script>
      <?php echo $__env->make('sales.sales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(mix('assets/js/custom/input-price-format.js')); ?>"></script>



    <?php echo $__env->make('invoices.editscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script>

function sendFormData(id   ,  url) {
    // Get a reference to the form element
    var form = document.getElementById("warranty"+id);
    var button = document.getElementById("button"+id);
    button.innerHTML  =  "Loading";
    button.disabled   =  true  ;



    // Create a new FormData object to collect form data
    var formData = new FormData(form);

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the URL and method for the request
    var url = url;
    var method = 'POST';

    // Set up the request
    xhr.open(method, url, true);

    // Define a callback function to handle the response
    xhr.onload = function () {
        if (xhr.status === 200) {
            button.disabled   =  false  ;

            button.innerHTML  =  "Apply";
            alert("successful");
            // Request was successful, handle the response here
            //var response = JSON.parse(xhr.responseText);
            //console.log(response);
        } else {
            button.disabled   =  false  ;

            button.innerHTML  =  "Apply";
            alert("failed");
            // Request failed, handle the error here
           // console.error('Request failed with status:', xhr.status);
        }
    };

    // Send the form data as the request body
    xhr.send(formData);
}




<?php if(isset($who)): ?>     <?php if( $invoice->warranty  !=  NULL): ?>

 // Make Select2 readonly by disabling it
 $('#salesAgentId').prop('disabled', true);

<?php endif; ?>  <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/invoices/edit.blade.php ENDPATH**/ ?>