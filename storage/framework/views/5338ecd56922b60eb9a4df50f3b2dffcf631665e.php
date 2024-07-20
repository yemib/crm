<script>
  (() => {
    "use strict";
    $(document).ready(function () {
        $(".datepicker").datetimepicker({
            format: "YYYY-MM-DD HH:mm:ss",
            useCurrent: !1,
            sideBySide: !0,
            maxDate: new Date(),
            icons: {
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                next: "fa fa-chevron-right",
                previous: "fa fa-chevron-left",
            },
        }),
            $(".due-datepicker").datetimepicker({
                format: "YYYY-MM-DD HH:mm:ss",
                useCurrent: !1,
                sideBySide: !0,
                icons: {
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    next: "fa fa-chevron-right",
                    previous: "fa fa-chevron-left",
                },
            }),
            $(".datepicker, .due-datepicker").on("dp.show", function () {
                matchWindowScreenPixels(
                    { date: ".datepicker", dueDate: ".due-datepicker" },
                    "exp"
                );
            }),
            setTimeout(function () {
                1 == editData && "" !== $(".due-datepicker").val()
                    ? $(".due-datepicker")
                          .data("DateTimePicker")
                          .minDate($(".due-datepicker").val())
                    : $(".due-datepicker")
                          .data("DateTimePicker")
                          .minDate(
                              moment()
                                  .millisecond(0)
                                  .second(0)
                                  .minute(0)
                                  .hour(0)
                          );
            }, 1e3),
            $("#estimateCurrencyId").select2({
                width: "100%",
                placeholder: Lang.get("messages.placeholder.select_currency"),
            }),
            $("#discountTypeSelect").select2({
                width: "100%",
                placeholder: Lang.get(
                    "messages.placeholder.select_discount_type"
                ),
            }),
            $("#saleAgentId").select2({ width: "100%" }),


            $("#addItemSelectBox").on("select2:select", function () {
                var e = $(this).val();

                $.ajax({
                    url: route("products.edit", e),
                    type: "GET",
                    success: function (e) {
                        "" !==
                            $(".items-container>tr:last-child")
                                .find(".item-name")
                                .val()  && $("#itemAddBtn").trigger("click") ;

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
            $(document).on("click", "#saveAsDraft, #saveAndSend", function (e) {


                var t = $(this).data("status");
                e.preventDefault();
                var i = document.getElementById("estimateForm"),
                    a = new FormData(i);
                a.append("status", t);
                var s,
                    d,
                    n,
                    r,
                    p,
                    l,
                    o,
                    c,
                    y,
                    h = 0,
                    m = [];
                (l = $(".total-numbers").text()),
                    $(".items-container>tr").each(function () {

                        (m = []),
                            (s = $(this).find(".item-name").val()),
                            (d = $(this).find(".item-description").val()),
                            (n = $(this).find(".qty").val()),
                            (r = $(this).find(".rate").val()),
                            (p = $(this).find(".item-amount").text()),
                            (y = $(this).find(".warranty_period select").val() ),
                            $.each(
                                $($(this).find(".tax-rates option:selected")),
                                function () {
                                    m.push($(this).val());
                                }
                            ),
                            a.append("itemsArr[" + h + "][item]", s),
                            a.append("itemsArr[" + h + "][description]", d),
                            a.append("itemsArr[" + h + "][quantity]", n),
                            a.append("itemsArr[" + h + "][rate]", r),
                            a.append("itemsArr[" + h + "][total]", p),
                            a.append("itemsArr[" + h + "][tax]", m),
                            a.append("itemsArr[" + h + "][warranty_period]", y),
                            h++;
                    }),
                    $("#taxesListTable>tr").each(function () {
                        (o = (o = $(this).find(".tax-value").text()).replace(
                            "%",
                            ""
                        )),
                            (c = $(this).find(".footer-tax-numbers").text()),
                            a.append("taxes[" + o + "]", c);
                    }),
                    a.append("total_amount", l),
                    a.append("sub_total", $("#subTotal").text()),
                    $.ajax({
                        url: route("estimates.store"),
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
                                window.location = estimateUrl + "/" + t;
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
            $(document).on("click", "#editSaveSend", function (e) {
                var t = $(this).data("status");
                $("#editAdminNote").summernote("isEmpty") &&
                    $("#editAdminNote").val(""),
                    $("#editClientNote").summernote("isEmpty") &&
                        $("#editClientNote").val(""),
                    $("#editTermAndConditions").summernote("isEmpty") &&
                        $("#editTermAndConditions").val(""),
                    e.preventDefault();
                var i = document.getElementById("editEstimateForm"),
                    a = new FormData(i);
                a.append("status", t);
                var s,
                    d,
                    n,
                    r,
                    p,
                    l,
                    o,
                    c,
                    w,
                    h = 0,
                    m = [];
                (l = $(".total-numbers").text()),
                    $(".items-container>tr").each(function () {
                        (m = []),
                            (s = $(this).find(".item-name").val()),
                            (d = $(this).find(".item-description").val()),
                            (n = $(this).find(".qty").val()),
                            (r = $(this).find(".rate").val()),
                            (p = $(this).find(".item-amount").text()),
                            (w = $(this).find(".warranty_period select").val() ),
                            $.each(
                                $($(this).find(".tax-rates option:selected")),
                                function () {
                                    m.push($(this).val());
                                }
                            ),
                            a.append("itemsArr[" + h + "][item]", s),
                            a.append("itemsArr[" + h + "][description]", d),
                            a.append("itemsArr[" + h + "][quantity]", n),
                            a.append("itemsArr[" + h + "][rate]", r),
                            a.append("itemsArr[" + h + "][total]", p),
                            a.append("itemsArr[" + h + "][tax]", m),
                            a.append("itemsArr[" + h + "][warranty_period]", w),
                            h++;
                    }),
                    $("#taxesListTable>tr").each(function () {
                        (o = (o = $(this).find(".tax-value").text()).replace(
                            "%",
                            ""
                        )),
                            (c = $(this).find(".footer-tax-numbers").text()),
                            a.append("taxes[" + o + "]", c);
                    }),
                    a.append("total_amount", l),
                    a.append("sub_total", $("#subTotal").text());
                var u = $("#estimateId").val();
                $.ajax({
                    url: estimateEditURL + "/" + u,
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
                            window.location = estimateEditURL + "/" + t;
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
            "undefined" != typeof estimateEdit &&
                estimateEdit &&
                ($(".tax-rates").trigger("change"),
                $(".qty").trigger("keyup"),
                $("#adjustment").trigger("keyup"),
                window.calculateSubTotal(),
                $("#estimateNumber").attr("readonly", !0),
                $(".address-modal").trigger("hidden.bs.modal")),
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
        var e = $("#addressForm"),
            t = $("#shippingAddressForm");


            $(document).on("click", "#btnAddressSave", function () {
                if (!checkStreetField()) return !1;
                "undefined" != typeof createEstimateAddress &&
                    createEstimateAddress &&
                    (0 == checkBillAddressFields().length
                        ? $("#bill_to").html("_ _ _ _ _ _")
                        : $("#bill_to").html(createAddressDetail(e)),
                    1 == $("#shippingAddressEnable").prop("checked") &&
                    "" != $("#shipStreet").val()
                        ? $("#ship_to").html(createAddressDetail(t))
                        : $("#ship_to").html("_ _ _ _ _ _")),
                    "undefined" != typeof editEstimateAddress &&
                        editEstimateAddress &&
                        (0 == checkBillAddressFields().length
                            ? $("#bill_to").html("_ _ _ _ _ _")
                            : $("#bill_to").html(getAddressDetail(e)),
                        1 == $("#shippingAddressEnable").prop("checked") &&
                        "" != $("#shipStreet").val()
                            ? $("#ship_to").html(getAddressDetail(t))
                            : $("#ship_to").html("_ _ _ _ _ _")),
                    $(".address-modal").modal("hide");
            }),

            $(document).on("change", "#customerSelectBox", function () {
                var e = $(this).val();
                    $.ajax({
                        url: customerURL,
                        type: "GET",
                        data: { customer_id: e },
                        success: function (e) {
                            $("#bill_to").empty();
                            //$("#bill_old").empty();
                          /*   var t = e.data[0],
                                i = e.data[1]; */
                                $("#bill_to").html(e.data) ;



                        },
                        error: function (e) {



                           //alert(e.responseJSON.message);
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
<?php echo $__env->make('invoices.extractdata_function', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
//extractdata(1);

 </script>
<?php /**PATH C:\websites\crm\crm\resources\views/estimates/editscript.blade.php ENDPATH**/ ?>