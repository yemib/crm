<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.invoice.invoice')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bs4-summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
    <link href="<?php echo e(asset('css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/@fortawesome/fontawesome-free/css/all.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/invoices/invoices.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        #out_map,
        #in_map {
            height: 200px;
            width: 100%;


        }
    </style>

    <section class="section">
        <div class="section-header">
            <h1>Bill Details</h1>
            <div class="section-header-breadcrumb">
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary form-btn float-right-mobile">
                    <?php echo e(__('messages.common.back')); ?>

                </a>
            </div>
        </div>


        <div class="section-body">


            <div class="card">





            </div>





            <!----ends here --->
            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">


                <div class="row"  style="padding: 30px">

                    <div class="form-group col-md-4 col-12">
                        <?php echo e(Form::label('title', 'Invoice  :')); ?>

                        <p><?php echo e(html_entity_decode($invoice->title)); ?></p>
                    </div>


                    <div class="form-group col-md-4 col-12">
                        <?php echo e(Form::label('title', ' Customer :')); ?>

                        <p><?php echo e(html_entity_decode( $invoice->customer->company_name )); ?></p>
                    </div>


                </div>


                <?php echo e(Form::open(['route' => 'installation.store', 'validated' => false, 'id' => 'invoiceForm'])); ?>

                <input type="hidden" name="invoice_id" value="<?php echo e($invoice->id); ?>" />
                <div class="">
                    <div>
                        <div class="alert alert-danger d-none" id="validationErrorsBox"></div>


                        <div class="row">
                            <div class="form-group col-sm-6 " style="margin-left: 20px">

                                <?php echo e(Form::label('installation_date', 'Date Of Installation')); ?>



                                <input value="<?php echo e($invoice->installation_date); ?>" required id="date_of_installation"
                                    class="form-control" name="installation_date" placeholder="Date Of Installation"
                                    type="date" />

                            </div>




                        </div>




                    </div>




                    <!----list of  products  ----->

                            <div style="padding: 20px">

                    <h6> Products
                    </h6>
                    <br />

                    <table
                        class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-bordered"
                        style="">
                        <thead>
                            <tr>
                                <th>Product Code  :</th>
                                
                                <th> Quantity : </th>

                            </tr>

                        </thead>
                        <tbody>

                            <?php foreach ($invoice->salesItems as $sales) {
                        # code...
                        ?>



                            <tr>
                                <td>
                                    <?php echo e($sales->item); ?>


                                </td>
                              

                                <td> <?php echo e($sales->quantity); ?> </td>




                            </tr>

                            <?php  } ?>
                        </tbody>

                    </table>

                    </div>





                    <div class="row">
                        <div   style="display: none" class="form-group col-sm-12">
                            <div class="col-sm-12 col-form-label">
                                <strong class="field-title">Location</strong>
                            </div>

                            <div  style="display: none" class="col-sm-12 col-content" style="width:100%">

                                <input  readonly id="address" class="form-control" type=""
                                    value="<?php echo e($invoice->address); ?>" name="address" />
                             

                                <div style="display: none">
                                    <input id="user_lat_in" class="form-control" type="" value="<?php echo e($invoice->map); ?>"
                                        name="lat" />
                                    <input id="user_log_in" class="form-control" type="" value="0"
                                        name="long" />
                                </div>
                               
                            </div>
                        </div>




                    </div>

                    <div class="col-sm-12 col-form-label">
                        <strong class="field-title">  <?php if(count($invoice->customer->installationaddresses) > 1): ?> Locations   <?php else: ?>  Location <?php endif; ?> </strong>
                    </div>

                    <div class="col-sm-12 col-content" style="width:100%">

                        <?php $__currentLoopData = $invoice->customer->installationaddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($address->latlog !=  NULL): ?>
                        <h6> Address : <?php echo e($address->mapaddress); ?>


                            <br/>
                         House No :    <?php echo e($address->street); ?>

                        <br/>

                        Postcode :  <?php echo e($address->zip); ?>


                      <br/>

                      Locality : <?php echo e($address->locality); ?>


                      <br/>
                      Region :   <?php echo e($address->country   == 2 ?  "Gozo" :   "Malta"); ?>



                        </h6>
                        <div  style=" height: 300px;width: 100%;" id="in_map<?php echo e($address->id); ?>"> </div>
                        <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                        <br />





                    </div>







                    
                    <div class="row">
                        <div class="form-group col-sm-6 " style="margin-left: 20px">
                            <label> Assign Employee </label>

                            <select required name="worker" class="form-control">
                                <option>Select</option>

                                <?php
        $members  =  App\Models\User::get();

     foreach (  $members as  $member) {

        $memberPermissions = $member->permissions()->pluck('id')->toArray();

       // $permission  = App\Models\permission::where('model_id'   ,  $member->id)->first();
        if(  in_array( 41 ,  $memberPermissions)){  ?>
                                <option <?php if($member->id == $invoice->employees): ?> selected <?php endif; ?> value="<?php echo e($member->id); ?>">
                                    <?php echo e($member->first_name); ?>

                                    <?php echo e($member->last_name); ?> ( <?php echo e($member->email); ?>)</option>



                                <?php  }



     }


                        ?>

                            </select>

                            <br />
                            <input type="submit" value="Save" class="btn btn-success" />

                        </div>
                    </div>


                    <div class="" style="margin-top: 30px">
                    </div>





                </div>





                <?php echo e(Form::close()); ?>

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
    <?php
    $lat_in = 35.892423;
    $long_in = 14.440963;

    /*
if($data->user_lat_in != ""){
   $lat_in = $data->user_lat_in ;
$long_in = $data->user_log_in ;


}
*/

    //$google_key   =  App\Models\Setting::first();

    ?>



<script>

    <?php $__currentLoopData = $invoice->customer->installationaddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($address->latlog   !=  NULL): ?>
 <?php

    //split the address
            $output = str_replace("(", "", $address->latlog);
            $output = str_replace(")", "",  $output);
            $output = str_replace("LatLng", "",  $output);
            //now explode
            $output =    explode(",", $output);
            $lat_in = $output[0];
            $long_in = $output[1];


?>

     apiKey =
        "AAPK9c8be54fb23c4afa9dfdbedca8408781cJdyM_NqIK7SUniTe7bkkIscLlatFcfSfpfSovieUfPj8_83oblovHrfM73E9J4e";
    var map<?php echo e($address->id); ?> = L.map('in_map<?php echo e($address->id); ?>').setView([<?php echo e($lat_in); ?>, <?php echo e($long_in); ?>], 13);
    /*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
    // Add the OpenStreetMap tiles
    L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
        attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
        maxZoom: 20,
        minZoom: 5,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map<?php echo e($address->id); ?>);

    L.marker([<?php echo e($lat_in); ?>, <?php echo e($long_in); ?>], {
        title: "<?php echo e($address->mapaddress); ?>"
    }).addTo(map<?php echo e($address->id); ?>).openPopup();
    // leaflet draw
    //search options


     searchControl<?php echo e($address->id); ?> = L.esri.Geocoding.geosearch({
        position: "topright",
        placeholder: "Enter Location Address",
        useMapBounds: false,
        expanded: true,
        providers: [
            L.esri.Geocoding.arcgisOnlineProvider({
                apikey: apiKey,
                nearby: {
                    lat: <?php echo e($lat_in); ?>,
                    lng: <?php echo e($long_in); ?>

                }
            })
        ]
    }).addTo(map<?php echo e($address->id); ?>);

   results<?php echo e($address->id); ?> = L.layerGroup().addTo(map<?php echo e($address->id); ?>);

    searchControl<?php echo e($address->id); ?>.on("results", function(data) {
        // $('#pac-input').val($(".geocoder-control-input").val());
        results.clearLayers();
        for (let i = data.results.length - 1; i >= 0; i--) {


            results.addLayer(L.marker(data.results[i].latlng));
        }
    });
<?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/installation/create.blade.php ENDPATH**/ ?>