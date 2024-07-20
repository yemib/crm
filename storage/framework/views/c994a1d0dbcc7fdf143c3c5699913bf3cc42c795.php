<script>
(() => {
    "use strict";
    $("#expenseCategoriesTable").DataTable({
      oLanguage: {
        sEmptyTable: Lang.get("messages.common.no_data_available_in_table"),
        sInfo: Lang.get("messages.common.data_base_entries"),
        sLengthMenu: Lang.get("messages.common.menu_entry"),
        sInfoEmpty: Lang.get("messages.common.no_entry"),
        sInfoFiltered: Lang.get("messages.common.filter_by"),
        sZeroRecords: Lang.get("messages.common.no_matching"),
      },
      processing: !0,
      serverSide: !0,
      order: [[0, "asc"]],
      ajax: { url: route("warranty-types.index") },
      columnDefs: [
        {
          targets: [0],
          render: function (e) {
            return e.length > 80 ? e.substr(0, 80) + "..." : e;
          },
        },
        { targets: [1], className: "text-right",  searchable: 1 },
        { targets: "_all", defaultContent: "N/A" },
      ],
      columns: [
        {
          data: function (e) {
           var $all  =  e.number +"  " +  e.type  ;
            return  $all;
          },
          name: "number",
        },

        {
          data: function (e) {
            var t = [{ id: e.id }];
            //alert(t);
            return prepareTemplateRender("#categoryActionTemplate", t);
          },
          name: "id",
        },
      ],
    }),
      $(document).on("click", ".addExpenseCategoryModal", function () {
        $("#addModal").appendTo("body").modal("show");
      }),
      $(document).on("submit", "#addNewForm", function (e) {
        e.preventDefault(), processingBtn("#addNewForm", "#btnSave", "loading");


        $.ajax({
          url: route("warranty-types.store"),
          type: "POST",
          data: $(this).serialize(),
          success: function (e) {
            e.success &&
              (displaySuccessMessage(e.message),
              $("#addModal").modal("hide"),
              $("#expenseCategoriesTable").DataTable().ajax.reload(null, !1));
          },
          error: function (e) {

            alert("problem");
            displayErrorMessage(e.responseJSON.message);

          },
          complete: function () {
            processingBtn("#addNewForm", "#btnSave");
          },
        });
      }),
      $(document).on("click", ".edit-btn", function (e) {

        var t = $(e.currentTarget).data("id");

        renderData(t);

      }),
      (window.renderData = function (e) {

        $.ajax({
          url: route("warranty-types.edit", e),
          type: "GET",
          success: function (e) {

           // if (e.success) {
              $("#warrantyId").val(e.id);

                $("#edit_period").val(e.number),
                $('#edit_select_type').val(e.type),


                $("#editModal").appendTo("body").modal("show");
           // }
          },
          error: function (e) {

            displayErrorMessage(e.responseJSON.message);
          },
        });
      }),
      $(document).on("submit", "#editForm", function (e) {
        e.preventDefault(), processingBtn("#editForm", "#btnEditSave", "loading");
        var t = $("#warrantyId").val();

        $.ajax({
          url: route("warranty-types.update", t),
          type: "put",
          data: $(this).serialize(),
          success: function (e) {
            e.success &&
              (displaySuccessMessage(e.message),
              $("#editModal").modal("hide"),
              $("#expenseCategoriesTable").DataTable().ajax.reload(null, !1));
          },
          error: function (e) {
            displayErrorMessage(e.responseJSON.message);
          },
          complete: function () {
            processingBtn("#editForm", "#btnEditSave");
          },
        });
      }),
      $(document).on("click", ".delete-btn", function (e) {
        var t = $(e.currentTarget).data("id");
        deleteItem(
          route("warranty-types.destroy", t),
          "#expenseCategoriesTable",
        "Warranty Period"
        );
      }),
      $("#addModal").on("show.bs.modal", function () {
        $(".note-toolbar-wrapper").removeAttr("style"),
          $(".note-toolbar").removeAttr("style");
      }),
      $("#editModal").on("show.bs.modal", function () {
        $(".note-toolbar-wrapper").removeAttr("style"),
          $(".note-toolbar").removeAttr("style");
      }),
      $("#addModal").on("hidden.bs.modal", function () {
        resetModalForm("#addNewForm", "#validationErrorsBox"),
          $("#createDescription").summernote("code", "");
      }),
      $("#editModal").on("hidden.bs.modal", function () {
        resetModalForm("#editForm", "#editValidationErrorsBox");
      }),
      $(".summernote-simple").summernote({
        dialogsInBody: !0,
        minHeight: 150,
        placeholder: " ",
        toolbar: [
          ["style", ["bold", "italic", "underline", "clear"]],
          ["font", ["strikethrough"]],
          ["para", ["paragraph"]],
        ],
      });
  })();
  </script>
<?php /**PATH G:\websites\crm\crm\resources\views/warranty_type/script.blade.php ENDPATH**/ ?>