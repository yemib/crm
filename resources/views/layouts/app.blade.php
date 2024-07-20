<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | {{config('app.name')}} </title>
    <link rel="shortcut icon" href="{{ getAppFavicon() }}" type="image/x-icon" sizes="16x16">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @routes
    <!-- General CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!-- CSS Libraries -->

    <link rel="stylesheet" href="{{ getAppFavicon() ?? asset('favicon.ico') }}">
@yield('page_css')
<!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/components.css')}}">
    @yield('css')
    <link href="{{ mix('assets/css/infy-loader.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" />


<script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>
<!-- leaflet draw plugin  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>

  <script src="https://unpkg.com/esri-leaflet@^3.0.9/dist/esri-leaflet.js"></script>
    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.3/dist/esri-leaflet-geocoder.css" crossorigin="" />
    <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.3/dist/esri-leaflet-geocoder.js" crossorigin=""></script>

    <link href="/assets/toast/toastr.css" rel="stylesheet">
    @yield('top_script')
</head>
<body>
<div id="app">
    <div class="infy-loader" id="overlay-screen-lock">
        @include('loader')
    </div>
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('layouts.header')
        </nav>
        <div class="main-sidebar">
            @include('layouts.sidebar')
        </div>
        <!-- Main Content -->
        <div class="main-content">
          <h1   id="notification_area"  style="color: red ; background: white">   {{  session('error')  }}  </h1>
            @yield('content')
        </div>
        <footer class="main-footer">
            @include('layouts.footer')
        </footer>
    </div>
</div>
@include('user_profile.change_password_modal')
@include('user_profile.change_language_modal')
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/moment/min/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/js/autonumeric/autoNumeric.min.js') }}"></script>
<script src="{{ asset('assets/web/js/stisla.js') }}"></script>
<script src="{{ asset('assets/web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/handlebars/handlebars.js') }}"></script>
<script src="{{ asset('messages.js') }}"></script>
<script>
    let showNoDataMsg = "{{ __('messages.common.no_data_available_in_table') }}"
    let noSearchResults = "{{ __('messages.common.search_results') }}"
    let noMatchingRecordsFound = "{{ __('messages.no_matching_records_found') }}"
    let searchCustomerUrl = "{{ route('customers.search.customer') }}"
    let baseUrl = "{{url('/')}}/"
    let currentUrlName = "{{ Request::url() }}"
    let yesMessages = "{{ __('messages.common.yes') }}"
    let noMessages = "{{ __('messages.common.no') }}"
    let deleteHeading = "{{ __('messages.common.delete') }}"
    let deleteConfirm = "{{ __('messages.common.delete_confirm') }}"
    let toTypeDelete = "{{ __('messages.common.to_delete_this') }}"
    let deleteWord = "{{ __('messages.common.delete') }}"
    let searchPlaceholder = "{{ __('messages.common.search') }}"
    let defaultCountryCodeValue = "{{ getDefaultCountryCode() }}"
    let changePasswordUrl = "{{ route('change.password') }}"
</script>
@yield('page_scripts')
<script>
    let currentLocale = "{{ \Illuminate\Support\Facades\Config::get('app.locale') }}"
    if (currentLocale == '') {
        currentLocale = 'en'
    }
    Lang.setLocale(currentLocale)
    let currentCurrencyClass = "{{ getCurrencyClass() }}";
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true)
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false)
            }
        }
    }(jQuery));
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
    });
</script>
@yield('scripts')
<script>
    let loggedInUserId = "{{ getLoggedInUserId() }}";
    let ajaxCallIsRunning = false;
    let pdfDocumentImageUrl = "{{ asset('img/attachments_img/pdf.png') }}";
    let docxDocumentImageUrl = "{{ asset('img/attachments_img/doc.png') }}";
    let blockedAttachmentUrl = "{{ asset('img/attachments_img/blocked.png') }}";
    let customersUrl = '{{ route('customers.index') }}';
    let changeLanguageUrl = "{{ route('change.language') }}";
</script>
<script src="{{ mix('assets/js/user-profile/user-profile.js') }}"></script>
<script src="{{ mix('assets/js/notifications/notification.js') }}"></script>
<script src="/assets/toast/toastr.min.js"></script>

<script>
function showToastr(type, message) {

  
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown",
        "hideMethod": "slideUp"
    };

    toastr[type](message);
}



</script>

@if(session('error'))
<script>
window.setTimeout(() => {
    document.getElementById('notification_area').style.display="none";
}, 5000);

</script>

@endif
</body>
</html>
