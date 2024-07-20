@extends('layouts.app')
@section('title')
 Member Groups
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bs4-summernote/summernote-bs4.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1> Member Groups</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn float-right-mobile" data-toggle="modal"
                   data-target="#addModal">{{ __('messages.common.add') }} <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('member-groups.table')
                </div>
            </div>
        </div>
    </section>
    @include('member-groups.add-modal')
    @include('member-groups.edit-modal')
    @include('member-groups.templates.templates')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{ mix('assets/js/bs4-summernote/summernote-bs4.js') }}"></script>
@endsection
@section('scripts')
    <script src="{{ mix('assets/js/customer-groups/customer-groups.js') }}"></script>
    

    <script>

(() => {
    "use strict";
    var e = "{{ route("member-groups.store") }}",
        t = "{{  route("member-groups.index") }}" + "/";
    $(document).on("submit", "#addNewForm", function (t) {
        t.preventDefault(), processingBtn("#addNewForm", "#btnSave", "loading");
        var o =
            "" ===
            $("<div />")
                .html($("#createDescription").summernote("code"))
                .text()
                .trim()
                .replace(/ \r\n\t/g, "");
        if ($("#createDescription").summernote("isEmpty"))
            $("#createDescription").val("");
        else if (o)
            return (
                displayErrorMessage(
                    "Description field is not contain only white space"
                ),
                processingBtn("#addNewForm", "#btnSave", "reset"),
                !1
            );
        $.ajax({
            url: e,
            type: "POST",
            data: $(this).serialize(),
            success: function (e) {
                e.success &&
                    (displaySuccessMessage(e.message),
                    $("#addModal").modal("hide"),
                    $("#memberGroupTable").DataTable().ajax.reload(null, !1));
            },
            error: function (e) {
                displayErrorMessage(e.responseJSON.message);
            },
            complete: function () {
                processingBtn("#addNewForm", "#btnSave");
            },
        });
    }),
        $(document).on("submit", "#editForm", function (e) {
            e.preventDefault(),
                processingBtn("#editForm", "#btnEditSave", "loading");
            var o =
                "" ===
                $("<div />")
                    .html($("#editDescription").summernote("code"))
                    .text()
                    .trim()
                    .replace(/ \r\n\t/g, "");
            if ($("#editDescription").summernote("isEmpty"))
                $("#editDescription").val("");
            else if (o)
                return (
                    displayErrorMessage(
                        "Description field is not contain only white space"
                    ),
                    processingBtn("#editForm", "#btnEditSave", "reset"),
                    !1
                );
            var r = $("#memberGroupId").val();
            $.ajax({
                url: t + r,
                type: "put",
                data: $(this).serialize(),
                success: function (e) {
                    e.success &&
                        (displaySuccessMessage(e.message),
                        $(".modal").modal("hide"),
                        $("#memberGroupTable")
                            .DataTable()
                            .ajax.reload(null, !1));
                },
                error: function (e) {
                    displayErrorMessage(e.responseJSON.message);
                },
                complete: function () {
                    processingBtn("#editForm", "#btnEditSave");
                },
            });
        }),
        (window.renderData = function (e) {
            $.ajax({
                url: route("member-groups.edit", e),
                type: "GET",
                success: function (e) {
                    if (e.success) {

                        var t = e.data;
                        $("#memberGroupId").val(t.id);
                        var o = document.createElement("textarea");
                        (o.innerHTML = e.data.name),
                            $("#editName").val(o.value),
                            $("#editDescription").summernote(
                                "code",
                                t.description
                            ),
                            $("#editModal").modal("show");
                    }
                },
                error: function (e) {
                    displayErrorMessage(e.responseJSON.message);
                },
            });
        }),
        $(document).on("click", ".edit-btn", function (e) {
            var t = $(e.currentTarget).data("id");
            renderData(t);
        }),
        $(document).on("click", ".delete-btn", function (e) {
            var o = $(e.currentTarget).data("id");
            deleteItem(
                t + o,
                "#memberGroupTable",
               "Group Member"
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
            placeholder: Lang.get("messages.common.description"),
            toolbar: [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["font", ["strikethrough"]],
                ["para", ["paragraph"]],
            ],
        });
})();



</script>


@endsection

