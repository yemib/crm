<script>
'use strict';

$(document).ready(function () {

    var discount_approve  = false  ;

    setTimeout(function () {
          $("#singleproduct").select2(),
          $("#mySelect").select2(),

        $('#invoiceCurrencyId, #creditNoteCurrencyId, #proposalCurrencyId, #estimateCurrencyId').
            trigger('change')
    }, 500)

    $('#tagId').select2({
        width: 'calc(100% - 44px)',
        placeholder: Lang.get('messages.placeholder.select_tags'),
        multiple: true,
    })

    $('.tax-rates').select2({
        width: '100%',
        placeholder: Lang.get('messages.placeholder.select_tax'),
    })

    $('#paymentMode').select2({
        width: 'calc(100% - 44px)',
        placeholder: Lang.get('messages.placeholder.select_payment_mode'),
        multiple: true,
    })

    $('.status').select2({
        width: '100%',
        placeholder: Lang.get('messages.placeholder.select_status'),
    });

    $('.currency-select-box, .sale-agent-select-box, #customerSelectBox').
        select2({
            width: '100%',
            placeholder: Lang.get('messages.placeholder.select_customer'),
        });

    $('#addItemSelectBox').select2({
        width: '87%',
    });

    $('#billTaskSelectBox').select2({
        width: '87%',
        placeholder: Lang.get('messages.placeholder.bill_tasks'),
    });

    $('#recurringInvoiceSelect, #discountTypeSelect').select2();

    window.renderOptions = function () {
        let lastItemTaxbox = $('.items-container>tr:last-child').
            find('.tax-rates');
        taxData.forEach(function (data) {
            let newOption = new Option(
                data.tax_rate,
                data.id,
                false,
                false,
            );

            lastItemTaxbox.select2({
                width: '100%',
                placeholder: Lang.get('messages.placeholder.select_tax'),
            });
            lastItemTaxbox.append(newOption).trigger('change');
        });
    };

    if ((typeof (isCreate) !== 'undefined')) {
        renderOptions();
    }

    $(document).on('click', '#itemAddBtn', function (e) {
        e.preventDefault();
        const invoiceItemHtml = prepareTemplateRender(
            '#invoiceItemTemplate');

        $('.items-container').append(invoiceItemHtml);
        $('#invoiceCurrencyId, #creditNoteCurrencyId, #proposalCurrencyId, #estimateCurrencyId').trigger('change');
        renderOptions();
        $(".item-name").attr("placeholder", Lang.get('messages.invoice.item'));
        $(".item-description").attr("placeholder", "Title");
        $(".qty").attr("placeholder", Lang.get('messages.invoice.qty'));
        $(".rate").attr("placeholder", Lang.get('messages.products.rate'));
     
     
        $(".productselect").each(function () {
                    //run a
                    var uniqueId = "item-name-" + Date.now();
                    $(this).attr("id", uniqueId);
                    $("#" + uniqueId).select2();
                });

    });

    $(document).on('change', '#shippingAddressEnable', function () {
        if ($(this).prop('checked') == true) {
            $('#shippingAddressForm').slideToggle();
        } else {
            $('#shippingAddressForm').slideToggle();
        }
    });

    $(document).on('click', '.remove-invoice-item', function (e) {
        e.preventDefault();
        if ($('table#itemTable tbody tr').length === 1) {
            $('.tax-rates').val([]).trigger('change');
        }
        $(this).parent().parent().remove();
        if ($('table#itemTable tbody tr').length === 0) {
            $('.total-numbers').text('0');
        }

        calculateSubTotal();
    });

//    invoice item calculation

    $(document).on('keyup', '.qty', function () {
        $(this).
            val($(this).
                val().
                replace(/[^0-9.]/g, '').
                replace(/(\..*)\./g, '$1'));
        let qty = $(this).val();
        let rate = removeCommas($(this).parent().next().find('.rate').val());
        calculateItemAmount(qty, rate, $(this));
        calculateSubTotal();
        $('.tax-rates').trigger('change');
    });

    $(document).on('keyup', '.rate', function () {
        let rate = removeCommas($(this).val());
        let qty = 0;
        if ($(this).val() != '') {
            $(this).val(getFormattedPrice(rate));
            qty = $(this).parent().prev().find('.qty').val();
        }

        calculateItemAmount(qty, rate, $(this));
        calculateSubTotal();
        $('.tax-rates').trigger('change');
    });

    window.calculateItemAmount = (qty, rate, ele) => {
        let itemAmount = qty * rate;
        if (!isNaN(itemAmount)) {
            ele.parent().
                siblings().
                children('.item-amount').
                text(getFormattedPrice(itemAmount));
        }
    };

    let subTotal = 0;
    window.calculateSubTotal = () => {
        subTotal = 0;
        $('.items-container>tr').each(function () {
            let itemAmount = $(this).find('.item-amount').text();
            subTotal += parseFloat(removeCommas(itemAmount));
            subTotal = parseFloat(subTotal);
        });
        if (subTotal == 0) {
            $('#subTotal').text(subTotal);
        } else {
            //getFormattedPrice()
            $('#subTotal').text( subTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })  );
        }
        calculateFinalTotal();
        if (checkDiscountType()) {
            $('#footerDiscount').trigger('change');
        }
    };

    $(document).on('change', '#discountTypeSelect', function () {
        $('#footerDiscount').trigger('change');
        if ($(this).val() == 0) {
            $('#footerDiscount').val(0);
        } else {
            $('#footerDiscount').val(1);
        }
    });

    let footerDiscountType = 1;
    $(document).on('change', '#footerDiscount', function () {
        if (checkDiscountType()) {
            footerDiscountType = $(this).val();
            $('.footer-discount-input').trigger('keyup');
            return false;
        }

       // $('.footer-discount-input').val(0);
        $('.footer-discount-input').trigger('keyup');
    });

    let discount = 0;
    $(document).on('keyup', '.footer-discount-input', function () {
        if ($(this).val() != '') {

            if($(this).val()  >  10){

                <?php if(auth()->user()->is_admin  !=  1): ?>
                $('.discount_message').html(`If the discount exceeds 10%, an email will
                be sent to the administrator for approval or disapproval.`);
                discount_approve  = true;
                <?php endif; ?>
                <?php
               if(isset($estimate->id)){
                $discount_state  =  $estimate    ;

               }
               if(isset($invoice->id)){
                $discount_state  =  $invoice    ;
               }

                ?>


                <?php if(isset($discount_state->id)): ?>

                <?php if($discount_state->discount_approved   ==  NULL  ): ?>


                <?php if(auth()->user()->is_admin  ==   1 ): ?>

                <?php if($discount_state->is_admin  !=  1): ?>

                $('.discount_message').html(`You need to Approve or Reject the  <?php echo e($discount_state->discount); ?> %   Discount `);
                discount_approve  = true;

                <?php else: ?>

                discount_approve  =false;

                <?php endif; ?>


                <?php else: ?>
                discount_approve  = true;
                if($(this).val()   ==  <?php echo e($discount_state->discount); ?>  ){ 


                $('.discount_message').html(`Discount not yet approved`);
              

                }

                <?php endif; ?>

                <?php endif; ?>





                <?php if($discount_state->discount_approved   !=  NULL  ): ?>



                <?php if($discount_state->discount_approved  ==  1): ?>

                if($(this).val()   ==  <?php echo e($discount_state->discount); ?>  ){ 
                discount_approve  = false;

                $('.discount_message').html(`<span  style="color:green !important">Discount Approved </span>`);

                }else{

                    discount_approve  = true;
                }

                <?php else: ?>
                  if($(this).val()   ==  <?php echo e($discount_state->discount); ?>  ){ 

                discount_approve  = true;

                $('.discount_message').html(`<span  style="color:red !important"> Discount Rejected  </span>`);

                  }else{

                    discount_approve  = true;
                  }

                <?php endif; ?>

                <?php endif; ?>

                <?php endif; ?>



                //alert("the discount is greater than  10  an emaill will be sent to administrator to aprrove or disapprove");
                //return false ;

            }else{

                discount_approve  = false ;
                $('.discount_message').html("");

            }


            let currentVal = $(this).
                val();



              /*   replace(/[^0-9.]/g, '').
                replace(/(\..*)\./g, '$1');
            $(this).val(parseFloat(currentVal)); */
        } else {
          //  $(this).val(0);
        }

        if (checkDiscountType() === '' && $(this).val() > 0) {
            alert('please select discount type first');
        } else {
            prepareSelectedTaxes();
            discount = 0;
            let discountType = checkDiscountType();
            if (discountType == 1) {
                $('.footer-discount-numbers').text('0');
                $('.footer-discount-numbers').
                    text(getFormattedPrice(-($(this).val())));
                if (footerDiscountType == 1) {
                    let discountPercentage = $(this).val();
                    discountPercentage = (discountPercentage > 100)
                        ? 100
                        : discountPercentage;

                        let total1 = (parseFloat(subTotal) *
                        parseFloat(discountPercentage)) /
                        100;

                    $(this).val(discountPercentage);




                  $('.footer-discount-numbers').
                        text(getFormattedPrice(-(total1)));
                }else {
                    let discountPercentage = $('.footer-discount-input').val();
                    $('.footer-discount-numbers').val(discountPercentage);
                }
            } else if (discountType == 2) {
                $('.footer-discount-numbers').text('0');
                $('.footer-discount-numbers').
                    text(getFormattedPrice(-($(this).val())));
                if (footerDiscountType == 1) {
                    let discountPercentage = $(this).val();
                    discountPercentage = (discountPercentage > 100)
                        ? 100
                        : discountPercentage;
                    $(this).val(discountPercentage);
                    $('.footer-discount-numbers').
                        text(getFormattedPrice(
                            -(subTotal + totalOfAllTaxes) * discountPercentage /
                            100));
                    let total2 = parseFloat(totalOfAllTaxes) +
                        parseFloat(subTotal);
                    total2 = total2 * parseFloat(discountPercentage) / 100;
                    $('.footer-discount-numbers').
                        text(getFormattedPrice(-(total2)));
                }
            } else {
                $('.footer-discount-numbers').
                    text(getFormattedPrice(-($(this).val())));
                $(this).val(0);
                let subTotalIncludingTaxes = getSubTotalIncludingTaxes();
                $('.footer-discount-numbers').
                    text(getFormattedPrice((subTotalIncludingTaxes *
                        parseFloat(-($(this).val()))) / 100));
            }

            discount = parseFloat(removeCommas($('.footer-discount-numbers').text()));
            prepareSelectedTaxes();
            calculateFinalTotal();
        }
    });

    window.getSubTotalWithDiscount = () => {
        return subTotal + discount;
    };

    $(document).on('mousewheel', '#adjustment', function () {
        $(this).blur();
    });

    let adjustment = 0;
    $(document).on('keyup', '#adjustment', function () {
        adjustment = ($(this).val() == '') ? 0 : $(this).val();
        $('.adjustment-numbers').text((adjustment === 0) ? 0 : getFormattedPrice(adjustment));
        calculateFinalTotal();
    });

    window.checkDiscountType = () => {
        let discountType = $('#discountTypeSelect').val();
        if (discountType != '' && discountType == 0) {
           // $('.footer-discount-input').val('');
            $('#footerDiscount').val(0);
            $('.fDiscount').hide();
        }
        if (discountType == 1 || discountType == 2) {
            $('.fDiscount').show();
            return discountType;
        }
    };

    let taxes = [];
    $(document).on('change', '.tax-rates', function () {
        prepareSelectedTaxes();
        if (checkDiscountType()) {
            $('#footerDiscount').trigger('change');
        }
        calculateFinalTotal();
    });

    let taxPerItems = { 'items': [] };

    window.prepareSelectedTaxes = () => {
        taxes = [];
        taxPerItems.items = [];
        $('.items-container>tr').each(function () {
            let itemTax = [];
            $.each($(this).find('.tax-rates option:selected'), function () {
                itemTax.push($(this).text());
            });

            taxes = [...taxes, ...itemTax];
            let itemRate = removeCommas($(this).find('.item-amount').text());
            taxPerItems.items.push({ [itemTax]: itemRate });

        });
        taxes = Array.from(new Set(taxes));
        renderTaxList();
    };

    let totalOfAllTaxes = 0;
    let discountInNumber = 0;
    window.renderTaxList = function () {
        discountInNumber = $('.footer-discount-input').val();
        totalOfAllTaxes = 0;
        $('#taxesListTable').html('');
        let subTotalForTax = (checkDiscountType() == 1)
            ? getSubTotalWithDiscount()
            : subTotal;
        taxes.forEach(ele => {

            let itemAmount = 0;
            taxPerItems.items.forEach(itemsArr => {
                $.each(itemsArr, function (i, v) {
                    let multipleTaxes = (i.split(',')); // taxt1, tax2 = return array
                    multipleTaxes.forEach(tax => { // ele should be tax value
                        if (tax != ele) {
                            return;
                        }

                        itemAmount = (parseFloat(itemAmount) + parseFloat(v));
                    });
                });
            });

            let calculatedTax = 0;

            if ($('#discountTypeSelect').val() == 0) {
                calculatedTax = getFormattedPrice(
                    parseFloat(itemAmount) * parseFloat(ele) /
                    100);
            } else if ($('#discountTypeSelect').val() == 1) {
                if (footerDiscountType == 1) {
                    let amt1 = getFormattedPrice((parseFloat(itemAmount) * parseFloat(discountInNumber)) / 100);
                    calculatedTax = getFormattedPrice((parseFloat(itemAmount) - parseFloat(amt1 ? removeCommas(amt1) : 0)) * ele / 100);
                }else {
                    let amt3 = 0;
                    if (discountInNumber != 0) {
                        amt3 = getFormattedPrice(parseFloat(itemAmount) - parseFloat(discountInNumber));
                        calculatedTax = getFormattedPrice(parseFloat(amt3 ? removeCommas(amt3) : 0) * ele / 100);
                    }else {
                        calculatedTax = getFormattedPrice((parseFloat(itemAmount) - parseFloat(amt3 ? removeCommas(amt3) : 0)) * ele / 100);
                    }
                }
            } else if ($('#discountTypeSelect').val() == 2) {
                calculatedTax = getFormattedPrice(
                    (parseFloat(itemAmount) * parseFloat(ele)) /
                    100);
            }

            totalOfAllTaxes += parseFloat(
                calculatedTax ? removeCommas(calculatedTax) : 0);

            let data = [
                {
                    'tax_name': ele,
                    'tax_rate': calculatedTax,
                }];
            const taxOptionHtml = prepareTemplateRender('#taxesList', data);
            $('#taxesListTable').append(taxOptionHtml);
        });
    };

    window.getSubTotalIncludingTaxes = () => {
        return subTotal - totalOfAllTaxes;
    };

    window.calculateFinalTotal = () => {
        let discountType = $('#discountTypeSelect').val();
        if (discountType == 0) {

            let ttl = parseFloat(subTotal) + parseFloat(totalOfAllTaxes) +
                parseFloat(adjustment);


                //alert(totalOfAllTaxes+ "when discount is zero the totaltaxes");
            $('.total-numbers').text((ttl === 0) ? 0 :  ttl.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }    )  );
        } else if (discountType == 1) {

            if(discount_approve  ==  true){

                //return false ;

             //alert("approve discount");



             let ttl = parseFloat(subTotal) + parseFloat(totalOfAllTaxes) +
                parseFloat(adjustment);

              //  alert(ttl);
            $('.total-numbers').text((ttl === 0) ? 0 :  ttl.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }    )  );


            }else{

                let ttl1 = parseFloat(subTotal) + parseFloat(totalOfAllTaxes) +
                parseFloat(adjustment) + parseFloat(discount);



            $('.total-numbers').text((ttl1 === 0) ? 0 : ttl1.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) );



            }


        } else if (discountType == 2) {


            if(discount_approve  ==  true){

//return false ;

//alert("approve discount");
                    let ttl = parseFloat(subTotal) + parseFloat(totalOfAllTaxes) +
                    parseFloat(adjustment);

                    //  alert(ttl);
                    $('.total-numbers').text((ttl === 0) ? 0 :  ttl.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }    )  );


                    }else{
                                let newTotal = (parseFloat(totalOfAllTaxes) + parseFloat(subTotal));
                                newTotal = (newTotal + parseFloat(discount));
                                let newTotalFinal = newTotal + parseFloat(adjustment);
                                $('.total-numbers').text(newTotalFinal === 0 ? 0 :    newTotalFinal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) );

                    }

        }
    };

    window.getCurrencyFormatted = function (number) {
        return getFormattedPrice(number);
    };

    window.getAddressDetail = (ele) => {
        if(typeof editData !== "undefined" && editData) {
            let data = [
                {
                    street: ele.find('.street').val(),
                    city: ele.find('.city').val(),
                    state: ele.find('.state').val(),
                    country: ele.find('.country').val(),
                    zip_code: ele.find('.zip-code').val(),
                },
            ];
            return prepareTemplateRender('#addressTemplate', data);
        }
    };

    window.createAddressDetail = (ele) => {
        if (typeof createData !== 'undefined' && createData) {
            let data = [
                {
                    street: ele.find('.street').val(),
                    city: ele.find('.city').val(),
                    state: ele.find('.state').val(),
                    country: ele.find('.country').val(),
                    zip_code: ele.find('.zip-code').val(),
                },
            ];
            return prepareTemplateRender('#createAddressTemplate', data);
        }
    };

    setTimeout(function () {
        $('.address-modal').trigger('hidden.bs.modal');
    }, 100);

    setTimeout(function () {
        $('#addModal').trigger('hidden.bs.modal');
    }, 100);

    // change the table header when the radio button is changed from the Show As Quantity section.
    let quantityAs = {'qty' : 'qty', 'hours' : 'hours', 'qtyHours' : 'qtyHours'};
    $('#qty, #hours, #qtyHours').on('change', function () {
        const qtyAs = quantityAs[$(this).data('quantity-for')];
        if($(this).data('quantity-for') === qtyAs && $(this).prop('checked'))
            $('.qtyHeader').text($(this).next().text());
        $(".qty").attr("placeholder", $(this).next().text());
    });

    // on edit mode, change the table header based on the selected option.
    if(typeof editData !== "undefined" && editData)
        $('#qty, #hours, #qtyHours').trigger('change');

    // change currency icon based on their selected value
    let currenciesIconClass = {
        0 : 'fas fa-rupee-sign',
        1 : 'fas fa-dollar-sign',
        2: 'fas fa-dollar-sign',
        3: 'fas fa-euro-sign',
        4: 'fas fa-yen-sign',
        5: 'fas fa-pound-sign',
        6: 'fas fa-dollar-sign',
    };
    $('#invoiceCurrencyId, #creditNoteCurrencyId, #proposalCurrencyId, #estimateCurrencyId').
        on('change input', function () {
            const currencyIndex = $(this).val();
            $(document).
                find('[data-set-currency-class=\'true\']').
                attr('class', currenciesIconClass[currencyIndex]);
        });

    $(document).on('blur', '#adjustment', function () {
        let adjustment = $(this).val();
        if (isEmpty(adjustment)) {
            $('#adjustment').val('0');
        }
    });

});
</script>
<?php /**PATH G:\websites\crm\crm\resources\views/sales/sales.blade.php ENDPATH**/ ?>