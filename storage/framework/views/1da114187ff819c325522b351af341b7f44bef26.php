<?php $__env->startSection('title'); ?>
  Job Installation For  <?php echo e($job->customer_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/services/services.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<style>
    #map {
height: 400px;
/* The height is 400 pixels */
width: 100%;
/* The width is the width of the web page */
}
    </style>


    <section class="section">
        <div class="section-header">
            <h1  style="text-transform: capitalize">Job Details</h1>
            <div class="section-header-breadcrumb">



            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                <!---  place calendar here  .--->
                    <div  id="">
                        <?php
                        $installationDateObj = new DateTime($job->installation_date);
// Now, $installationDateObj holds a DateTime object representing the installation date

// Option 2: Format the date
$formattedInstallationDate = date('d/M/Y', strtotime($job->installation_date));
// Now, $formattedInstallationDate holds a formatted date string



                            ?>
                            <div align="right"> <a    href="<?php echo e(route('job.index')); ?>" class="btn btn-primary"> Jobs </a>     </div>

                                <?php if(session('success')): ?>
                                <h6   class="alert-success" align="right">

                                <?php echo e(session('success')); ?>

                                </h6>

                                <?php endif; ?>

                    <h6>  Date Of Installation :  <?php echo e($formattedInstallationDate); ?></h6>
                    <h6>  Customer :  <?php echo e($job->customer_name); ?></h6>
                    <h6>  Product :   <?php echo e($job->product_name); ?></h6>
                    <h6>   Address:   &nbsp;&nbsp;   <?php echo e($job->address); ?>  </h6>




                        <div>


                            <div  style="height: 500px" id="map"></div>

                        </div>

                        <div>
                <h3> Invoices </h3>
                      <?php
                       if($job->invoice_id  !=  null){
                                $arrays  =  json_decode($job->invoice_id ,  true);


                       }else{
                        $arrays=[];
                       }

                      ?>

                        <table  class="table table-bordered">
                            <tr>
                                <th style="text-transform: uppercase">title</th>
                                <th></th>
                            </tr>
                            <?php $__currentLoopData = $arrays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php
                                $invoice  =  \App\Models\Invoice::find($value[0]);
                                ?>
                                <?php if(isset($invoice->id)): ?>



                                <tr>
                                    <td><?php echo e($invoice->title); ?></td>
                                    <td><a  target="_blank" class="btn btn-info" href="<?php echo e(route('invoices.show'  ,  $invoice->id )); ?>"> view </a>


                                        <a  target="_blank" class="btn btn-info"  href="/admin/job_invoices/<?php echo e($job->id); ?>"> Edit</a>

                                       



                                        </td>
                                </tr>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    </section>

<?php
$lat  =   $job->lat ;
$log  =   $job->long;
$address =  $job->address;

?>

    <script>



var map = L.map('map').setView([<?php echo e($lat); ?>, <?php echo e($log); ?>], 13);

  L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
     attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
       maxZoom: 20,
       minZoom :18,
      subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

/* L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map); */

var greenIcon = new L.Icon({

iconSize: [50, 60],

});

//L.marker([51.5, -0.09], {icon: greenIcon}).addTo(map);


L.marker([<?php echo e($lat); ?>, <?php echo e($log); ?>]  ,{Icon:greenIcon  , title:"<?php echo e($address); ?>"} ).addTo(map).openPopup();

var circle = L.circle([<?php echo e($lat); ?>, <?php echo e($log); ?>], {
  color: 'green',
  /* fillColor: '#f03', */
  fillOpacity: 0,
  radius: 30
}).addTo(map);

        </script>




<?php $__env->stopSection(); ?>


<?php $__env->startSection('top_script'); ?>

<script src="/fullcalendar/dist/index.global.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/job/view.blade.php ENDPATH**/ ?>