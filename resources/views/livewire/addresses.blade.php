
    <div class="container">
        <div class="row">
            @foreach ( $addresses as   $address)
            <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Billing Address</h5>
                    <p class="card-text">

                        <strong>House no /Name: </strong> {{ $address->street }}
                        <br/>
                        <strong>Postal Code: </strong> {{ $address->zip}}
                        <br/>
                          <strong>Region: </strong>   @if( $address->country  ==  2)  Gozo @else Malta @endif
                        <br/>
                       <strong>Locality: </strong> {{ $address->locality}}
                        <br/>
                        <strong>Street Name: </strong> {{ $address->mapaddress}}
                        <br/>


                    </p>
                    <?php

                    //set the needful  here.
                    $installation  =  App\Models\Address::where('billing_id'  , $address->id)->first();

                    ?>
                    @if(isset( $installation->id))
                        <hr/>
                        <h5 class="card-title">Installation Address</h5>
                        <p class="card-text">

                            <strong>House no /Name: </strong> {{ $installation->street }}
                            <br/>
                            <strong>Postal Code: </strong> {{ $installation->zip}}
                            <br/>
                            <strong>Region: </strong>  @if( $installation->country  ==  2)  Gozo @else Malta @endif
                            <br/>
                        <strong>Locality: </strong> {{ $installation->locality}}
                            <br/>

                            <strong>Street Name: </strong> {{ $installation->mapaddress}}
                            <br/>
    


                        </p>
                     @endif
                  <a href="{{ route('edit.address' , [$customer->id , $address->id])}}">  <button class="btn btn-primary" type="button"><i class="fa fa-edit"></i></button> </a>
                    <button onclick="showConfirmationPopup('{{route('delete.address'  , $address->id )}}')"  style="cursor: pointer" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>

                  </div>
                </div>
              </div>




        @endforeach

@if (count($addresses)  ==  0)
<p>No Address </p>


@endif


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

