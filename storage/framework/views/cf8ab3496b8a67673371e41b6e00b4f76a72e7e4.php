<script>

function select_product(){

var customerid  =    $('#departmentId').val();

    // Define the URL you want to send the GET request to
    var url = "/get_customer_invoice/?customerid="+customerid;
let targetElement = $('#warranty_products');

targetElement.html("<tr><td>Loading....<td></tr>");

// Get the value of the selected radio button
  var selectedValue = $('input[name="warranty_related"]:checked').val();

  // Check the selectedValue and perform actions based on it
  if (selectedValue =="Yes") {

      $("#warranty_item_display").show();

  } else if (selectedValue == "No") {
    $("#warranty_item_display").hide();
    targetElement.html("");

    return false ;
  } else {
    $("#warranty_item_display").hide();
    targetElement.html("");
    return false ;
  }



// Send the GET request using jQuery AJAX
$.ajax({
  url: url,
  method: "GET",
  dataType: "json", // Specify that the response should be parsed as JSON
  success: function(response) {
    // Handle successful response here
    console.log("Response:", response);

    // Check if the response is an array

    var count  =  0  ;

    targetElement.html("");

    if (Array.isArray(response.output)) {

      //  alert("is array");
      // Loop through each element in the array using forEach
      response.output.forEach(function(element) {
        // Do something with each element

          var serial_no  = (element.serial_no !=  null) ?  `<td>` + element.serial_no +` </td>`   :  `<td></td>`;

          var  image  =  (element.image !=  null) ?   `<td> <a  target="_blank" href="`+ element.image +`">
              <img  height="100"  width="100"     src= "`+ element.image +`" />   </a> </td>`   : `<td></td>` ;
          var installation_date  = `<td>` + response.date[count] +`</td>`;
          var  checkbox  =  `<td> <input class="form-control"  name="products[]"  value="`+element.id+`" type ="checkbox" /> </td>`;

          // Create a new element to append, for example, a paragraph
        let newParagraph =  ` <tr>` + serial_no + image +  installation_date +  checkbox + `</tr>` ;    // `<p>New paragraph content</p>`;

// Append the new paragraph to the target element
            targetElement.append(newParagraph);

            count++;


      });

            if(count  ==  0){

                targetElement.html("<tr><td>No Active Warranty Available <td></tr>");


            }

    } else {

        alert(response);
      console.log("Response is not an array.");
    }
  },
  error: function(xhr, status, error) {
    // Handle error here
    console.error("Error:", error);
  }
});



}


$('input[name="warranty_related"]').on('change', select_product);
</script>
<?php /**PATH G:\websites\crm\crm\resources\views/tickets/warranty_script.blade.php ENDPATH**/ ?>