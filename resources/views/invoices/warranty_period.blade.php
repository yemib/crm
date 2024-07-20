<select  name="warranty_period"  class="form-control">
<option value="">Select Warranty Period</option>
<?php  $warranties =   App\Models\WarrantyType::get(); ?>
@foreach ( $warranties as $warranty )
<option   value="{{   $warranty->id  }}"> {{   $warranty->number }}   {{   $warranty->type }}</option>

@endforeach

</select>


