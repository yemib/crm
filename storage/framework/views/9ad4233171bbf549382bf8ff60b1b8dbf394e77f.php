
function  extractdata(e){


    // Access the parent <tr> element
    var trElement = e.closest('tr');

 /*    // Access other <td> elements within the same <tr>
    var descriptionTd = trElement.find('.item-description');

    var qtyTd = trElement.find('.qty');
    var rateTd = trElement.find('.rate');
    var taxTd = trElement.find('.tax-rates');
    var amountTd = trElement.find('.item-amount');

    descriptionTd.val(e.val()); */
   // alert(e.val());


 $.ajax({
     url: route("products.edit", e.val()),
     type: "GET",
     success: function (e) {
         "" !==
         trElement
                 .find(".item-name")
                 .val()   ;

         var t =trElement,
             i = document.createElement("textarea");
         (i.innerHTML = e.data.product_code),
             t.find(".item-name").val( e.data.product_code),
             t
                 .find(".item-description")
                 .val(e.data.title),

                t.find(".warranty_period select").val(e.data.warranty_period) ,
             t.find(".qty").val("1").trigger("keyup"),
             t.find(".rate").val(e.data.rate.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) ).trigger("keyup");
         var a = [];
         e.data.first_tax && a.push(e.data.first_tax.id),
             e.data.second_tax && a.push(e.data.second_tax.id),
             t.find(".tax-rates").val(a).trigger("change");
     },
 });
}
<?php /**PATH C:\websites\crm\crm\resources\views/invoices/extractdata_function.blade.php ENDPATH**/ ?>