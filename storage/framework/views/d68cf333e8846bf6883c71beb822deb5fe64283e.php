
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Billing Address</h5>
                    <p class="card-text">

                        <strong>House no /Name: </strong> <?php echo e($address->street); ?>

                        <br/>
                        <strong>Postal Code: </strong> <?php echo e($address->zip); ?>

                        <br/>
                          <strong>Region: </strong>   <?php if( $address->country  ==  2): ?>  Gozo <?php else: ?> Malta <?php endif; ?>
                        <br/>
                       <strong>Locality: </strong> <?php echo e($address->locality); ?>

                        <br/>
                        <strong>Street Name: </strong> <?php echo e($address->mapaddress); ?>

                        <br/>


                    </p>
                    <?php

                    //set the needful  here.
                    $installation  =  App\Models\Address::where('billing_id'  , $address->id)->first();

                    ?>
                    <?php if(isset( $installation->id)): ?>
                        <hr/>
                        <h5 class="card-title">Installation Address</h5>
                        <p class="card-text">

                            <strong>House no /Name: </strong> <?php echo e($installation->street); ?>

                            <br/>
                            <strong>Postal Code: </strong> <?php echo e($installation->zip); ?>

                            <br/>
                            <strong>Region: </strong>  <?php if( $installation->country  ==  2): ?>  Gozo <?php else: ?> Malta <?php endif; ?>
                            <br/>
                        <strong>Locality: </strong> <?php echo e($installation->locality); ?>

                            <br/>

                            <strong>Street Name: </strong> <?php echo e($installation->mapaddress); ?>

                            <br/>
    


                        </p>
                     <?php endif; ?>
                  <a href="<?php echo e(route('edit.address' , [$customer->id , $address->id])); ?>">  <button class="btn btn-primary" type="button"><i class="fa fa-edit"></i></button> </a>
                    <button onclick="showConfirmationPopup('<?php echo e(route('delete.address'  , $address->id )); ?>')"  style="cursor: pointer" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>

                  </div>
                </div>
              </div>




        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(count($addresses)  ==  0): ?>
<p>No Address </p>


<?php endif; ?>


<div class="confirmation-popup">
    <h5 style="color: red">Are you sure you want to delete the Address?</h5>
    <button id="confirmButton">Yes</button>
    <button class="cancel">No</button>
</div>

        </div>
    </div>
    <style>
        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
      </style>

<style>

    .confirmation-popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }
    .confirmation-popup h3 {
        margin-top: 0;
    }
    .confirmation-popup button {
        padding: 10px 20px;
        background-color: red;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    .confirmation-popup button.cancel {
        background-color: #337ab7;
        color: white;
        margin-left: 10px;
    }
</style>

<script>
    function showConfirmationPopup(url) {
        $(".confirmation-popup").fadeIn();

        $("#confirmButton").click(function() {
            $(".confirmation-popup").fadeOut();
            window.location.href = url;
        });

        $(".confirmation-popup button.cancel").click(function() {
            $(".confirmation-popup").fadeOut();
        });
    }
</script>

<?php /**PATH G:\websites\crm\crm\resources\views/livewire/addresses.blade.php ENDPATH**/ ?>