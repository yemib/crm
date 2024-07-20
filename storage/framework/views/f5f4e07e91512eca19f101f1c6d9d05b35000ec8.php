<ul class="nav nav-pills mb-3" id="customer" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="customerForm" data-toggle="tab" href="#cForm" role="tab" aria-controls="home"
           aria-selected="true"><?php echo e(__('messages.customer.customer_details')); ?></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="#addressess" data-toggle="tab" href="#addresses" role="tab" aria-controls="profile"
           aria-selected="false">Addresses</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="#addressForm" data-toggle="tab" href="#aForm" role="tab" aria-controls="profile"
           aria-selected="false"> Add Address </a>
    </li>


</ul>
<div class="tab-content" id="myTabContent2">
    <div class="tab-pane fade show active" id="cForm" role="tabpanel" aria-labelledby="customerForm">

        <?php echo e(Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'put','id'=>'editCustomer','novalidate'])); ?>


        <div class="row">

            <div class="form-group col-md-6 col-sm-12">
             <label> Client Name</label> <span
                        class="required">*</span>

                        <input  value="<?php echo e($customer->client_name); ?>"  name="client_name"   class="form-control"   id="client_name"  required/>
            </div>


            <div class="form-group col-md-6 col-sm-12">
                <?php echo e(Form::label('company_name', __('messages.customer.company_name').':')); ?> <span
                        class="required"></span>
                <?php echo e(Form::text('company_name', null, ['class' => 'form-control','autocomplete' => 'off','autofocus' => true,'placeholder'=>__('messages.customer.company_name')])); ?>

            </div>


            <div class="form-group col-md-6 col-sm-12">
                <?php echo e(Form::label('vat_number', __('messages.customer.vat_number').':')); ?>

                <?php echo e(Form::text('vat_number', null, ['class' => 'form-control' ,'minLength' => '4','maxLength' => '15', 'autocomplete' => 'off','placeholder'=>__('messages.customer.vat_number')])); ?>

            </div>
            <div class="form-group col-md-6 col-sm-12">
                <?php echo e(Form::label('website', __('messages.customer.website').':')); ?>

                <?php echo e(Form::url('website', null, ['class' => 'form-control', 'id' => 'website', 'autocomplete' => 'off','placeholder'=>__('messages.customer.website')])); ?>

            </div>
            <div class="form-group col-md-6 col-sm-12">
                <?php echo e(Form::label('phone', __('messages.customer.phone').(':'))); ?><br>
                <?php echo e(Form::tel('phone', null, ['class' => 'form-control','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'placeholder'=>__('messages.customer.phone')])); ?>

                <?php echo e(Form::hidden('prefix_code',old('prefix_code'),['id'=>'prefix_code'])); ?>

                <span id="valid-msg" class="hide"><?php echo e(__('messages.placeholder.valid_number')); ?></span>
                <span id="error-msg" class="hide"></span>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <?php echo e(Form::label('currency', __('messages.customer.currency').':')); ?>

                <select id="currencyId" data-show-content="true" class="form-control" name="currency">
                    <option value="0"
                            disabled="true" <?php echo e(isset($customer->currency) ? '' : 'selected'); ?>><?php echo e(__('messages.placeholder.select_currency')); ?>

                    </option>
                    <?php $__currentLoopData = $data['currencies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e((isset($customer->currency) ? $customer->currency : getCurrencyIcon($key)) == $key ? 'selected' : ''); ?>>
                            &#<?php echo e(getCurrencyIcon($key)); ?>&nbsp;&nbsp;&nbsp; <?php echo e($currency); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <?php echo e(Form::label('country', __('messages.customer.country').':')); ?>

                <?php echo e(Form::select('country[0]', $data['countries'],(isset($customer) && $customer->country!=null)?$customer->country:null, ['id'=>'countryId','class' => 'form-control','placeholder' => __('messages.placeholder.select_country')])); ?>

            </div>
            <div class="form-group col-md-6 col-sm-12">
                <?php echo e(Form::label('default_language', __('messages.customer.default_language').':')); ?>

                <?php echo e(Form::select('default_language', $data['languages'],null, ['id'=>'languageId','class' => 'form-control','placeholder' => __('messages.placeholder.select_language')])); ?>

            </div>
            <div class="form-group col-md-6 col-sm-12">
                <?php echo e(Form::label('groups', __('messages.customer.groups').':')); ?>

                <div class="input-group">
                    <?php echo e(Form::select('groups[]', $data['customerGroups'],isset($customer->customerGroups)?$customer->customerGroups:null, ['id'=>'groupId','class' => 'form-control', 'multiple' => 'multiple'])); ?>

                    <div class="input-group-append">
                        <div class="input-group-text plus-icon-height">
                            <a href="#" data-toggle="modal" data-target="#customerGroupModal"><i
                                        class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="form-group col-sm-12">
            <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary', 'id' => 'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

            <a href="<?php echo e(route('customers.index')); ?>"
               class="btn btn-secondary text-dark"><?php echo e(__('messages.common.cancel')); ?></a>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

    </div>



    <div class="tab-pane fade" id="aForm" role="tabpanel" aria-labelledby="addressForm">
        <form  method="POST"  action="<?php echo e(route('customers.add.address' , $customer->id )); ?>"  >
            <?php echo csrf_field(); ?>

        <div class="row">
            <div class="col-md-6 col-sm-12">

                <div class="card">
                    <div class="card-header  text-nowrap">
                        <h4 class="text-black-50 font-weight-bold"><?php echo e(__('messages.customer.billing_address')); ?></h4>

                        <div class="card-header-action">
                            <label class="remove-underline" >
                                <a  class="text-black-50 ">



                                    &nbsp;
                                </a>
                            </label>
                        </div>
                    </div>

                </div>

           <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('street', 'House no /Name')); ?>

                        <?php echo e(Form::text('street[1]', "",
                        ['class' => 'form-control', 'id' => 'billingStreet', 'autocomplete' => 'off',
                        'placeholder'=> "House no /Name"])); ?>


                    </div>
                </div>
                            
                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('zip', 'Postal Code'.':')); ?>

                        <?php echo e(Form::text('zip[1]',
                      "",
                        ['class' => 'form-control',
                        'id' => 'billingZip',

                         'autocomplete' => 'off',
                         'placeholder'=>'Postal Code'])); ?>

                    </div>
                </div>
                     


                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('country', 'Region'.':')); ?>

                        <?php echo e(Form::select('country[1]', $data['countries'],null,
                        [ 'required',  'id'=>'billingCountryId','class' => 'form-control','placeholder' => "Select Region"])); ?>

                    </div>
                </div>





                <div  class="row">
                    <div class="form-group col-sm-12">
                    <label for="locality">Locality:</label>


                    <select  required name="locality[1]"  id="locality" class="form-control">

                     

                        </select>


                </div>
                </div>

              <div class="row">

                <div  class="form-group col-sm-12">
                    <label for="street"> Street Name</label>
                    <input readonly  name="mapaddress[1]"   id="billingaddress"  class="form-control" />
                    <input name="latlog[1]" type="hidden" name=""  id="billing_lat_in"   class="form-control" />

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

                        <?php echo e(Form::text('street[2]', null,
                        ['class' => 'form-control', 'id' => 'shippingStreet', 'autocomplete' => 'off',
                        'placeholder'=>'House no/name'])); ?>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('zip', 'Postal Code'.':')); ?>

                        <?php echo e(Form::text('zip[2]',null,
                        ['class' => 'form-control', 'id' => 'shippingZip',

                        'autocomplete' => 'off','placeholder'=> 'Postal Code'])); ?>

                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('country', 'Region'.':')); ?>

                        <?php echo e(Form::select('country[2]', $data['countries'],null,
                        ['id'=>'shippingCountryId','class' => 'form-control','placeholder' => "Select Region"])); ?>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <?php echo e(Form::label('city', "Locality".':')); ?>


                        
                            <!-- Locality options will be populated dynamically -->


                                <select name="locality[2]"  id="shippinglocality" class="form-control">

                                </select>



                         

                    </div>
                </div>




                <div class="row">
                    <div class="form-group col-sm-12">
                       <label> Street Name </label>

                       <input    class="form-control"  readonly  name="mapaddress[2]"  id="shippingaddress"   />

                       <input  type="hidden"  id="shipping_lat_in"  name="latlog[2]"   class="form-control" />

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


    <div class="tab-pane fade" id="addresses" role="tabpanel" aria-labelledby="addresses">
        <div class="row">

            <?php echo $__env->make('livewire.addresses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>






</div>

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

       /*
   if($data->user_lat_in != ""){
      $lat_in = $data->user_lat_in ;
   $long_in = $data->user_log_in ;


   }
   */

       //$google_key   =  App\Models\Setting::first();

       ?>
    <script>
        // Initialize the map
        const apiKey =
            "AAPK9c8be54fb23c4afa9dfdbedca8408781cJdyM_NqIK7SUniTe7bkkIscLlatFcfSfpfSovieUfPj8_83oblovHrfM73E9J4e";
        var map = L.map('in_map').setView([<?php echo e($lat_in); ?>, <?php echo e($long_in); ?>], 13);
        /*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
        // Add the OpenStreetMap tiles
        L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
            attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
            maxZoom: 20,
            minZoom: 5,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        L.marker([<?php echo e($lat_in); ?>, <?php echo e($long_in); ?>], {
            title: " "
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
                        lat: <?php echo e($lat_in); ?>,
                        lng: <?php echo e($long_in); ?>

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

    var map2 = L.map('in_map_shipping').setView([<?php echo e($lat_in); ?>, <?php echo e($long_in); ?>], 13);
    /*   var map = L.map('map').setView([51.509  , -0.08 ], 13); */
    // Add the OpenStreetMap tiles
    L.tileLayer("http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
        attribution: '&copy; <a target="_blank" href="https://www.google.com/maps">Google Map</a>',
        maxZoom: 20,
        minZoom: 5,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map2);

    L.marker([<?php echo e($lat_in); ?>, <?php echo e($long_in); ?>], {
        title: "hello"
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
                    lat: <?php echo e($lat_in); ?>,
                    lng: <?php echo e($long_in); ?>

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

<?php /**PATH G:\websites\crm\crm\resources\views/customers/fields.blade.php ENDPATH**/ ?>