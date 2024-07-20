<script id="invoiceItemTemplate" type="text/x-jsrender">
<tr>
        <td>
            <?php  if(isset($data['items']))  { ?>
            <select  onchange="extractdata($(this))"          class="form-control productselect"  required>
                <option>Select Product</option>
                            <?php foreach ($data['items']  as $key => $value )  {  ?>
                                <option  value="<?php   echo $key ;  ?>" >  <?php echo  $value ;   ?></option>
                           <?php  }?>
                        </select>
                        <input  type="hidden"  name="item[]"    value=""   class="item-name"  require   />
                        <?php  } ?>

        </td>
        <td><input value="" name="description[]" class="form-control item-description" /></td>
        <td><input type="text" name="quantity[]" class="form-control qty" min="0" required></td>
        <td><input type="text" name="rate[]" class="form-control rate" required></td>
        <td class="">
        <select name="tax[]" class="form-control tax-rates" multiple placeholder="Select Taxes">
                        </select>
                        </td>
                        <td  class="warranty_period">
                    <select  name="warranty_period[]"  class="form-control">
                    <option value="">Select Warranty Period</option>
                    <?php  $warranties =   App\Models\WarrantyType::get(); ?>
                    <?php   foreach ( $warranties as $warranty ) { ?>
                    <option   value="<?php  echo  $warranty->id   ; ?>"> <?php  echo   $warranty->number   .  "  "  .   $warranty->type  ; ?>
                       </option>

                    <?php   } ?>

                    </select>


                    </td>
        <td><i data-set-currency-class="true"></i> <span class="item-amount">0</span></td>
        <td><a href="#" class="remove-invoice-item text-danger"><i class="far fa-trash-alt"></i></a></td>
    </tr>




</script>

<script id="taxOptionsTemplate" type="text/x-jsrender">
    <option value="{{:value}}">{{:label}}</option>


</script>

<script id="taxesList" type="text/x-jsrender">
    <tr>
        <td  style="display:none" colspan="2" class="font-weight-bold tax-value">{{:tax_name}}%</td>
        <td  style="display:none" class="footer-numbers footer-tax-numbers">{{:tax_rate}}</td>
    </tr>


</script>

<script id="createAddressTemplate" type="text/x-jsrender">
    <span>{{:street}},<br>
    <span>{{:city}}, {{:state}},<br>
    <span>{{:country}} -</span>
    <span>{{:zip_code}}</span>




</script>

<script id="addressTemplate" type="text/x-jsrender">
    <span>{{:street}},<br>
    <span>{{:city}}, {{:state}},<br>
    <span>{{:country}} -</span>
    <span>{{:zip_code}}</span>


</script>
