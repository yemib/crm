<?php $__env->startSection('title'); ?>
   Edit Address
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link href="<?php echo e(asset('assets/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/int-tel/css/intlTelInput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1> <?php if(isset($_GET['new'])): ?>  Add <?php else: ?> Edit  <?php endif; ?>  <?php echo e($customer->client_name); ?> Address</h1>
            <div class="section-header-breadcrumb">
                <a href="<?php echo e(url()->previous()); ?>"
                   class="btn btn-primary form-btn float-right-mobile"><?php echo e(__('messages.common.back')); ?></a>
            </div>
        </div>
        <div class="section-body">
            <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-body">

                       <!--  place  the list of addresses  here fast kay  -->

                       <div >

                        <?php
                            //get the address

                            if(isset($_GET['new'])){

                                $address_upadte  =  route('customers.update.address' , [ $customer->id ,$data['billingAddress']['id'] ,  'new'=>'customer' ] ) ;


                            }else{
                                $address_upadte  =  route('customers.update.address' , [ $customer->id ,$data['billingAddress']['id'] ] ) ;

                            }

                            ?>

                        <form  method="POST"  action="<?php echo e($address_upadte); ?>"  >
                            <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-black-50 font-weight-bold"><?php echo e(__('messages.customer.billing_address')); ?></h4>
                                    </div>
                                </div>

                           <div class="row">
                                    <div class="form-group col-sm-12">
                                        <?php echo e(Form::label('street', 'House no /Name')); ?>

                                        <?php echo e(Form::text('street[1]', (isset($data['billingAddress']) &&
                                        $data['billingAddress']['street']!=null)?$data['billingAddress']['street']:null,
                                        ['class' => 'form-control', 'id' => 'billingStreet', 'autocomplete' => 'off',
                                        'placeholder'=>__('messages.customer.street')])); ?>

                                    </div>
                                </div>
                                            
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <?php echo e(Form::label('zip', 'Postal Code'.':')); ?>

                                        <?php echo e(Form::text('zip[1]',
                                        (isset($data['billingAddress']) &&
                                        $data['billingAddress']['zip']!=null)?
                                        $data['billingAddress']['zip']:null,
                                        ['class' => 'form-control',
                                        'id' => 'billingZip',

                                         'autocomplete' => 'off',
                                         'placeholder'=>'Postal Code'])); ?>

                                    </div>
                                </div>
                                     


                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <?php echo e(Form::label('country', 'Region'.':')); ?>

                                        <?php echo e(Form::select('country[1]', $data['countries'],(isset($data['billingAddress']) &&
                                        $data['billingAddress']['country']!=null)?$data['billingAddress']['country']:null,
                                        ['id'=>'billingCountryId','class' => 'form-control','placeholder' => __('messages.placeholder.select_country')])); ?>

                                    </div>
                                </div>





                                <div  class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="locality">Locality:</label>

                                

                                    <select name="locality[1]"  id="locality" class="form-control">


                                        <?php $__currentLoopData = $data['billing_localities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $billing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             
                                     

                                        <option 
                                        <?php if(isset($data['billingAddress']) &&
                                        $data['billingAddress']['locality']!=null): ?>
                                        <?php if($data['billingAddress']['locality']  ==   $billing): ?>
                                        
                                        selected  
                                        <?php endif; ?> 
                                        

                                        <?php endif; ?> >    <?php echo e($billing); ?>  </option>

                              
                                       
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </select>


                                </div>
                                </div>


                                <div class="row">

                                    <div  class="form-group col-sm-12">
                                        <label for="street"> Street Name</label>
                                        <input  value="<?php echo e($data['billingAddress']['mapaddress']); ?>" readonly  name="mapaddress[1]"   id="billingaddress"  class="form-control" />
                                        <input  value="<?php echo e($data['billingAddress']['latlog']); ?>" name="latlog[1]" type="hidden" name=""  id="billing_lat_in"   class="form-control" />
                    
                                        <div  id="in_map"  style="height: 150px  ; width:100%"></div>
                    
                    
                    
                                    </div>
                    
                    
                                  </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header text-nowrap">
                                        <h4 class="text-black-50 font-weight-bold">

                                            <i class="fa fa-question-circle" data-toggle="tooltip"
                                               data-title="<?php echo e(__('messages.customer.do_not_fill_shipping_address_customer_invoices')); ?>"
                                               data-original-title="" title=""></i>
                                            <?php echo e(__('messages.customer.shipping_address')); ?></h4>
                                        <div class="card-header-action">
                                            <label class="remove-underline" for="shippingAddressCheck">
                                                <a id="copyBillingAddress" class="text-black-50 ">
                                                    <input type="checkbox" id="shippingAddressCheck"
                                                           class="mr-1" <?php echo e(isset($data['shippingAddress'])
                                                           && $data['shippingAddress']['street'] ? 'checked' : 'disabled'); ?>>
                                                    <?php echo e(__('messages.customer.copy_billing_address')); ?>

                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <?php echo e(Form::label('street', 'House no/name'.':')); ?>

                                        <?php echo e(Form::text('street[2]', (isset($data['shippingAddress']) &&
                                        $data['shippingAddress']['street']!=null)?$data['shippingAddress']['street']:null,
                                        ['class' => 'form-control', 'id' => 'shippingStreet', 'autocomplete' => 'off',
                                        'placeholder'=>'House no/name'])); ?>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <?php echo e(Form::label('zip', 'Postal Code'.':')); ?>

                                        <?php echo e(Form::text('zip[2]', (isset($data['shippingAddress'])
                                        && $data['shippingAddress']['zip']!=null)?$data['shippingAddress']['zip']:null,
                                        ['class' => 'form-control', 'id' => 'shippingZip',

                                        'autocomplete' => 'off','placeholder'=> 'Postal Code'])); ?>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <?php echo e(Form::label('country', 'Region'.':')); ?>

                                        <?php echo e(Form::select('country[2]', $data['countries'],(isset($data['shippingAddress']) &&
                                        $data['shippingAddress']['country']!=null)?$data['shippingAddress']['country']:null,
                                        ['id'=>'shippingCountryId','class' => 'form-control','placeholder' => __('messages.placeholder.select_country')])); ?>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <?php echo e(Form::label('city', "Locality".':')); ?>


                                        
                                            <!-- Locality options will be populated dynamically -->

                                            
                                                <select name="locality[2]"  id="shippinglocality" class="form-control">
                                                    <?php $__currentLoopData = $data['shipping_localities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option 
                                                    <?php if(isset($data['shippingAddress']) &&
                                                    $data['shippingAddress']['locality']!=null): ?>
                                                    <?php if($data['shippingAddress']['locality']  ==  $shipping): ?>
                                                    
                                                    selected  
                                                    <?php endif; ?> 
                                                    
                                                    <?php endif; ?> >    <?php echo e($shipping); ?>  </option>
            
                                          
                                                   
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>



                                         

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label> Street Name </label>
                
                                       <input   value="<?php echo e($data['shippingAddress']['mapaddress']); ?>"  class="form-control"  readonly  name="mapaddress[2]"  id="shippingaddress"   />
                
                                       <input  value="<?php echo e($data['shippingAddress']['latlog']); ?>" type="hidden"  id="shipping_lat_in"  name="latlog[2]"   class="form-control" />
                
                                        <div  id="in_map_shipping"  style="height: 150px  ; width:100%"></div>
                                    </div>
                                </div>

                                             

                            </div>
                        </div>


                    <div class="row">
                        <div class="form-group col-sm-12">
                            <input   type="submit"  value="Submit"  class="btn btn-primary"/>

                        </div>
                    </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('customers.customer_group_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/int-tel/js/intlTelInput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/int-tel/js/utils.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        let utilsScript = "<?php echo e(asset('assets/js/int-tel/js/utils.min.js')); ?>"
        let phoneNo = "<?php echo e(old('prefix_code').old('phone')); ?>"
        let isEdit = true
        let localizeMessage = "<?php echo e(__('messages.placeholder.select_groups')); ?>"
    </script>
    <script src="<?php echo e(mix('assets/js/custom/phone-number-country-code.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/customers/create-edit.js')); ?>"></script>


<script>
    $(document).ready(function() {
      // AJAX request to fetch localities based on the selected country
      $('#billingCountryId').change(function() {
        //var country = $(this).val();
        var country = $(this).find('option:selected').text();
        //alert(country);

        $.ajax({
          url: '/get_localities',
          type: 'GET',
          data: { country: country },
          dataType: 'json',
          success: function(response) {
            // Clear the locality dropdown
            $('#locality').empty();

            // Populate the locality dropdown with options
            $.each(response, function(index, locality) {
              $('#locality').append('<option value="' + locality + '">' + locality + '</option>');
            });
          }
        });
      });

      $('#shippingCountryId').change(function() {
        //var country = $(this).val();
        var country = $(this).find('option:selected').text();
        //alert(country);

        $.ajax({
          url: '/get_localities',
          type: 'GET',
          data: { country: country },
          dataType: 'json',
          success: function(response) {
            // Clear the locality dropdown
            $('#shippinglocality').empty();

            // Populate the locality dropdown with options
            $.each(response, function(index, locality) {
              $('#shippinglocality').append('<option value="' + locality + '">' + locality + '</option>');
            });
          }
        });
      });



    });
  </script>

<?php  
$lat_in = 35.892423;
$long_in = 14.440963;

$shippinglat = $lat_in;
    $shippinglong = $long_in ;

    $billinglat = $lat_in;
    $billinglong = $long_in ;


if ($data['shippingAddress']['latlog'] != NULL) {


    $output = str_replace("(", "",  $data['shippingAddress']['latlog']);
    $output = str_replace(")", "",  $output);
    $output = str_replace("LatLng", "",  $output);
    //now explode

    $output =    explode(",", $output);
    $shippinglat = $output[0];
    $shippinglong = $output[1];

}


if ($data['billingAddress']['latlog'] != NULL) {


    $output = str_replace("(", "",  $data['billingAddress']['latlog']);
    $output = str_replace(")", "",  $output);
    $output = str_replace("LatLng", "",  $output);
    //now explode

    $output =    explode(",", $output);
    $billinglat = $output[0];
    $billinglong = $output[1];

}

?>



<script>
    // Initialize the map
    const apiKey =
        "AAPK9c8be54fb23c4afa9dfdbedca8408781cJdyM_NqIK7SUniTe7bkkIscLlatFcfSfpfSovieUfPj8_83oblovHrfM73E9J4e";
    var map = L.map('in_map').setView([<?php echo e($billinglat); ?>, <?php echo e($billinglong); ?>], 13);
    /*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
    // Add the OpenStreetMap tiles
    L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
        attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
        maxZoom: 20,
        minZoom: 5,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    L.marker([<?php echo e($billinglat); ?>, <?php echo e($billinglong); ?>], {
        title: "<?php echo e($data['billingAddress']['mapaddress']); ?> "
    }).addTo(map).openPopup();
    // leaflet draw
    //search options


    const searchControl = L.esri.Geocoding.geosearch({
        position: "topright",
        placeholder: "Enter Street Name",
        useMapBounds: false,
        expanded: true,
        providers: [
            L.esri.Geocoding.arcgisOnlineProvider({
                apikey: apiKey,
                nearby: {
                    lat: <?php echo e($billinglat); ?>,
                    lng: <?php echo e($billinglong); ?>

                }
            })
        ]
    }).addTo(map);

    const results = L.layerGroup().addTo(map);

    searchControl.on("results", function(data) {
        // $('#pac-input').val($(".geocoder-control-input").val());
        results.clearLayers();
        for (let i = data.results.length - 1; i >= 0; i--) {
            //$('#pac-input').val(data.results[i].text);
            $('#billingaddress').val(data.results[i].text);
            $('#billing_lat_in').val(data.results[i].latlng);
            //alert(data.results[i].text);
            results.addLayer(L.marker(data.results[i].latlng));
        }
    });
</script>

<script>
// Initialize the map

var map2 = L.map('in_map_shipping').setView([<?php echo e($shippinglat); ?>, <?php echo e($shippinglong); ?>], 13);
/*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
// Add the OpenStreetMap tiles
L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
    attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
    maxZoom: 20,
    minZoom: 5,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
}).addTo(map2);

L.marker([<?php echo e($shippinglat); ?>, <?php echo e($shippinglong); ?>], {
    title: "<?php echo e($data['shippingAddress']['mapaddress']); ?>"
}).addTo(map2).openPopup();
// leaflet draw
//search options


const searchControl2 = L.esri.Geocoding.geosearch({
    position: "topright",
    placeholder: "Enter Street Name",
    useMapBounds: false,
    expanded: true,
    providers: [
        L.esri.Geocoding.arcgisOnlineProvider({
            apikey: apiKey,
            nearby: {
                lat: <?php echo e($shippinglat); ?>,
                lng: <?php echo e($shippinglong); ?>

            }
        })
    ]
}).addTo(map2);

const results2 = L.layerGroup().addTo(map2);

searchControl2.on("results", function(data) {
    // $('#pac-input').val($(".geocoder-control-input").val());
    results2.clearLayers();
    for (let i = data.results.length - 1; i >= 0; i--) {
        //$('#pac-input').val(data.results[i].text);
        $('#shippingaddress').val(data.results[i].text);
        $('#shipping_lat_in').val(data.results[i].latlng);
        //alert(data.results[i].text);
        results.addLayer(L.marker(data.results[i].latlng));
    }
});
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/customers/edit_address.blade.php ENDPATH**/ ?>