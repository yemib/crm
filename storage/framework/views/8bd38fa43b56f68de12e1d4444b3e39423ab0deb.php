<script>
(() => {
    "use strict";
    $(document).ready(function () {
        var e;
        $("#invoiceCurrencyId").select2({
            width: "100%",
            placeholder: Lang.get("messages.placeholder.select_currency"),
        }),
            $("#discountTypeSelect").select2({
                width: "100%",
                placeholder: Lang.get(
                    "messages.placeholder.select_discount_type"
                ),
            }),
            $("#salesAgentId").select2({
                width: "100%",
                placeholder: Lang.get("messages.placeholder.select_sale_agent"),
            }),
            $(".invoiceDate").datetimepicker({
                format: "YYYY-MM-DD",
                useCurrent: !1,
                sideBySide: !0,
                widgetPositioning: { horizontal: "right", vertical: "bottom" },
                maxDate: new Date(),
                icons: {
                    next: "fa fa-chevron-right",
                    previous: "fa fa-chevron-left",
                },
            }),
            $(".invoiceDueDate").datetimepicker({
                format: "YYYY-MM-DD",
                useCurrent: !1,
                sideBySide: !0,
                widgetPositioning: { horizontal: "right", vertical: "bottom" },
                icons: {
                    next: "fa fa-chevron-right",
                    previous: "fa fa-chevron-left",
                },
            }),
            $(".invoiceDate, .invoiceDueDate").on("dp.show", function () {
                matchWindowScreenPixels(
                    {
                        invoiceDate: ".invoiceDate",
                        invoiceDueDate: ".invoiceDueDate",
                    },
                    "exp"
                );
            }),
            setTimeout(function () {
                1 == editData && "" !== $(".invoiceDueDate").val()
                    ? $(".invoiceDueDate")
                          .data("DateTimePicker")
                          .minDate($(".invoiceDueDate").val())
                    : $(".invoiceDueDate")
                          .data("DateTimePicker")
                          .minDate(new Date());
            }, 1e3),
            $("#addItemSelectBox").on("select2:select", function () {
                var e = $(this).val();
                if (isEmpty(e)) return !1;
                $.ajax({
                    url: route("products.edit", e),
                    type: "GET",
                    success: function (e) {
                        "" !==
                            $(".items-container>tr:last-child")
                                .find(".item-name")
                                .val() && $("#itemAddBtn").trigger("click");
                        var t = $(".items-container>tr:last-child"),
                            i = document.createElement("textarea");
                        (i.innerHTML = e.data.title),
                            t.find(".item-name").val(i.value),
                            t
                                .find(".item-description")
                                .val($(e.data.description).text()),
                            t.find(".qty").val("1").trigger("keyup"),
                            t.find(".rate").val(e.data.rate).trigger("keyup");
                        var a = [];
                        e.data.first_tax && a.push(e.data.first_tax.id),
                            e.data.second_tax && a.push(e.data.second_tax.id),
                            t.find(".tax-rates").val(a).trigger("change");
                    },
                });
            }),
            $(document).on("click", "#saveAsDraft, #saveAndSend", function (t) {
                if ((t.preventDefault(), e)) return !1;
                e = !0;
                var i = $(this).data("status"),
                    a = document.getElementById("invoiceForm"),
                    s = new FormData(a);
                s.append("payment_status", i);
                var n,
                    r,
                    d,
                    o,
                    l,
                    p,
                    c,
                    h,
                    y,
                    u = 0,
                    m = [];
                (p = $(".total-numbers").text()),
                    $(".items-container>tr").each(function () {
                        (m = []),
                            (n = $(this).find(".item-name").val()),
                            (r = $(this).find(".item-description").val()),
                            (d = $(this).find(".qty").val()),
                            (o = $(this).find(".rate").val()),
                            (l = $(this).find(".item-amount").text()),
                            (y = $(this).find(".warranty_period select").val() ),
                            $.each(
                                $($(this).find(".tax-rates option:selected")),
                                function () {
                                    m.push($(this).val());
                                }
                            ),
                            s.append("itemsArr[" + u + "][item]", n),
                            s.append("itemsArr[" + u + "][description]", r),
                            s.append("itemsArr[" + u + "][quantity]", d),
                            s.append("itemsArr[" + u + "][rate]", o),
                            s.append("itemsArr[" + u + "][total]", l),
                            s.append("itemsArr[" + u + "][tax]", m),
                            u++;
                    }),
                    $("#taxesListTable>tr").each(function () {
                        (c = (c = $(this).find(".tax-value").text()).replace(
                            "%",
                            ""
                        )),
                            (h = $(this).find(".footer-tax-numbers").text()),
                            s.append("taxes[" + c + "]", h);
                    }),
                    s.append("total_amount", p),
                    s.append("sub_total", $("#subTotal").text()),
                    $.ajax({
                        url: route("invoices.store"),
                        type: "POST",
                        data: s,
                        processData: !1,
                        contentType: !1,
                        beforeSend: function () {
                            startLoader();
                        },
                        success: function (e) {
                            if (e.success) {
                                var t = e.data.id;
                                var queryString = window.location.search;

                            // Use a utility function to parse the query string and get the value of the 'job' variable
                            function getQueryParam(variable) {
                                var query = queryString.substring(1);
                                var vars = query.split('&');
                                for (var i = 0; i < vars.length; i++) {
                                    var pair = vars[i].split('=');
                                    if (decodeURIComponent(pair[0]) === variable) {
                                        return decodeURIComponent(pair[1]);
                                    }
                                }
                                return null;
                            }

                        // Get the value of the 'job' variable
                            var jobValue = getQueryParam('job');
                            if(jobValue !=  null  ){
                                window.location =  "/admin/view_job/" + jobValue;
                            }else{
                                window.location = invoiceUrl + "/" + t;
                            }


                            }
                        },
                        error: function (t) {
                            displayErrorMessage(t.responseJSON.message),
                                (e = !1);
                        },
                        complete: function () {
                            stopLoader();
                        },
                    });
            }),
            $(document).on("click", "#editSaveSend", function (e) {


                e.preventDefault();

                var t = $(this).data("status");
                $("#editAdminNote").summernote("isEmpty") &&
                    $("#editAdminNote").val(""),
                    $("#editClientNote").summernote("isEmpty") &&
                        $("#editClientNote").val(""),
                    $("#editTermAndConditions").summernote("isEmpty") &&
                        $("#editTermAndConditions").val("");
                var i = document.getElementById("editInvoiceForm"),
                    a = new FormData(i);
                a.append("payment_status", t);
                var s,
                    n,
                    r,
                    d,
                    o,
                    l,
                    p,
                    c,
                    w ,
                    h = 0,
                    u = [];
                (l = $(".total-numbers").text()),
                    $(".items-container>tr").each(function () {
                        (u = []),
                            (s = $(this).find(".item-name").val()),
                            (n = $(this).find(".item-description").val()),
                            (r = $(this).find(".qty").val()),
                            (d = $(this).find(".rate").val()),
                            (o = $(this).find(".item-amount").text()),
                            (w = $(this).find(".warranty_period select").val() ),
                            $.each(
                                $($(this).find(".tax-rates option:selected")),
                                function () {
                                    u.push($(this).val());
                                }
                            ),
                            a.append("itemsArr[" + h + "][item]", s),
                            a.append("itemsArr[" + h + "][description]", n),
                            a.append("itemsArr[" + h + "][quantity]", r),
                            a.append("itemsArr[" + h + "][rate]", d),
                            a.append("itemsArr[" + h + "][total]", o),
                            a.append("itemsArr[" + h + "][tax]", u),
                            a.append("itemsArr[" + h + "][warranty_period]", w),

                            h++;
                    }),
                    $("#taxesListTable>tr").each(function () {
                        (p = (p = $(this).find(".tax-value").text()).replace(
                            "%",
                            ""
                        )),
                            (c = $(this).find(".footer-tax-numbers").text()),
                            a.append("taxes[" + p + "]", c);
                    }),
                    a.append("total_amount", l),
                    a.append("sub_total", $("#subTotal").text());
                var m = $("#hdnInvoiceId").val();
                $.ajax({
                    url:   <?php if(isset($_POST['aftersale'])): ?>  invoicestore    <?php else: ?>  invoiceEditURL + "/" + m  <?php endif; ?>,
                    type: "POST",
                    data: a,
                    processData: !1,
                    contentType: !1,
                    beforeSend: function () {
                        startLoader();
                    },
                    success: function (e) {
                        if (e.success) {
                            var t = e.data.id;
                            window.location.href = invoiceEditURL + "/" + t;
                        }
                    },
                    error: function (e) {
                        displayErrorMessage(e.responseJSON.message);
                    },
                    complete: function () {
                        stopLoader();
                    },
                });
            }),
            "undefined" != typeof invoiceEdit &&
                invoiceEdit &&
                ($(".tax-rates").trigger("change"),
                $(".qty").trigger("keyup"),
                $("#adjustment").trigger("keyup"),
                window.calculateSubTotal(),
                $("#invoiceNumber").attr("readonly", !0)),
            $(".address-modal").on("show.bs.modal", function () {
                setTimeout(function () {
                    $("#billStreet").focus();
                }, 500);
            }),
            (window.checkBillAddressFields = function () {
                return $(
                    "#billStreet,#billCity,#billState,#billZipCode,#billCountry"
                ).filter(function () {
                    return "" != this.value;
                });
            }),
            (window.showBillingShippingAddressError = function (e) {
                displayErrorMessage($(e).data("err-msg"));
            });
        $(document).on("change", "#shippingAddressEnable", function () {
            $(this).prop("checked") ||
                ("undefined" == typeof createData &&
                    "undefined" == typeof editData) ||
                ($("#shipStreet").val(""),
                $("#copyBillingAddress").prop("checked", !1),
                $(
                    "#shipStreet,#shipCity,#shipState,#shipZipCode,#shipCountry"
                ).val(""));
        }),
            (window.checkStreetField = function () {
                return "" === $.trim($("#billStreet").val())
                    ? (showBillingShippingAddressError("#billStreet"), !1)
                    : !$("#shippingAddressEnable").prop("checked") ||
                          "" !== $.trim($("#shipStreet").val()) ||
                          (showBillingShippingAddressError("#shipStreet"), !1);
            });
        var t = $("#addressForm"),
            i = $("#shippingAddressForm");

            $(document).on("click", "#btnSaveAddress", function () {
                if (!checkStreetField()) return !1;
                "undefined" != typeof createInvoiceAddress &&
                    createInvoiceAddress &&
                    (0 == checkBillAddressFields().length
                        ? $("#bill_to").html("_ _ _ _ _ _")
                        : $("#bill_to").html(createAddressDetail(t)),
                    1 == $("#shippingAddressEnable").prop("checked") &&
                    "" != $("#shipStreet").val()
                        ? $("#ship_to").html(createAddressDetail(i))
                        : $("#ship_to").html("_ _ _ _ _ _")),
                    "undefined" != typeof editInvoiceAddress &&
                        editInvoiceAddress &&
                        (0 == checkBillAddressFields().length
                            ? $("#bill_to").html("_ _ _ _ _ _")
                            : $("#bill_to").html(getAddressDetail(t)),
                        1 == $("#shippingAddressEnable").prop("checked") &&
                        "" != $("#shipStreet").val()
                            ? $("#ship_to").html(getAddressDetail(i))
                            : $("#ship_to").html("_ _ _ _ _ _")),
                    $(".address-modal").modal("hide");
            });

            $(document).on("change", "#customerSelectBox", function () {
                var e = $(this).val();

                    $.ajax({
                        url: customerURL,
                        type: "GET",
                        data: { customer_id: e },
                        success: function (e) {

                            $("#bill_to").empty();

                          /*   var t = e.data[0],
                                i = e.data[1]; */
                                $("#bill_to").html(e.data) ;
                                //alert("done okay");

                        },
                        error: function (e) {
                            displayErrorMessage(e.responseJSON.message);
                        },
                    });
            }),
            $(document).on("click", "#copyBillingAddress", function () {
                $(this).prop("checked")
                    ? ($("#shipStreet").val($("#billStreet").val()),
                      $("#shipCity").val($("#billCity").val()),
                      $("#shipState").val($("#billState").val()),
                      $("#shipZipCode").val($("#billZipCode").val()),
                      $("#shipCountry").val($("#billCountry").val()))
                    : $(
                          "#shipStreet,#shipCity,#shipState,#shipZipCode,#shipCountry"
                      ).val("");
            });
    });
})();

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
             t.find(".qty").val("1").trigger("keyup"),
             t.find(".rate").val(e.data.rate.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) ).trigger("keyup");
         var a = [];
         //alert('thanks');
         e.data.first_tax && a.push(e.data.first_tax.id),
             e.data.second_tax && a.push(e.data.second_tax.id),
             t.find(".tax-rates").val(a).trigger("change");
     },
 });




}


 </script>
<?php /**PATH G:\websites\crm\crm\resources\views/invoices/editscript.blade.php ENDPATH**/ ?>