<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?> </title>
    <link rel="shortcut icon" href="<?php echo e(getAppFavicon()); ?>" type="image/x-icon" sizes="16x16">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
    <!-- General CSS Files -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/sweetalert.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/@fortawesome/fontawesome-free/css/all.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/iziToast.min.css')); ?>">
    <link href="<?php echo e(asset('assets/css/sweetalert.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!-- CSS Libraries -->

    <link rel="stylesheet" href="<?php echo e(getAppFavicon() ?? asset('favicon.ico')); ?>">
<?php echo $__env->yieldContent('page_css'); ?>
<!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/components.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>
    <link href="<?php echo e(mix('assets/css/infy-loader.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">

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
    <?php echo $__env->yieldContent('top_script'); ?>
</head>
<body>
<div id="app">
    <div class="infy-loader" id="overlay-screen-lock">
        <?php echo $__env->make('loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </nav>
        <div class="main-sidebar">
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Main Content -->
        <div class="main-content">
          <h1   id="notification_area"  style="color: red ; background: white">   <?php echo e(session('error')); ?>  </h1>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <footer class="main-footer">
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>
    </div>
</div>
<?php echo $__env->make('user_profile.change_password_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('user_profile.change_language_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/moment/min/moment-with-locales.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/iziToast.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/autonumeric/autoNumeric.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/web/js/stisla.js')); ?>"></script>
<script src="<?php echo e(asset('assets/web/js/scripts.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/custom/custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/handlebars/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('messages.js')); ?>"></script>
<script>
    let showNoDataMsg = "<?php echo e(__('messages.common.no_data_available_in_table')); ?>"
    let noSearchResults = "<?php echo e(__('messages.common.search_results')); ?>"
    let noMatchingRecordsFound = "<?php echo e(__('messages.no_matching_records_found')); ?>"
    let searchCustomerUrl = "<?php echo e(route('customers.search.customer')); ?>"
    let baseUrl = "<?php echo e(url('/')); ?>/"
    let currentUrlName = "<?php echo e(Request::url()); ?>"
    let yesMessages = "<?php echo e(__('messages.common.yes')); ?>"
    let noMessages = "<?php echo e(__('messages.common.no')); ?>"
    let deleteHeading = "<?php echo e(__('messages.common.delete')); ?>"
    let deleteConfirm = "<?php echo e(__('messages.common.delete_confirm')); ?>"
    let toTypeDelete = "<?php echo e(__('messages.common.to_delete_this')); ?>"
    let deleteWord = "<?php echo e(__('messages.common.delete')); ?>"
    let searchPlaceholder = "<?php echo e(__('messages.common.search')); ?>"
    let defaultCountryCodeValue = "<?php echo e(getDefaultCountryCode()); ?>"
    let changePasswordUrl = "<?php echo e(route('change.password')); ?>"
</script>
<?php echo $__env->yieldContent('page_scripts'); ?>
<script>
    let currentLocale = "<?php echo e(\Illuminate\Support\Facades\Config::get('app.locale')); ?>"
    if (currentLocale == '') {
        currentLocale = 'en'
    }
    Lang.setLocale(currentLocale)
    let currentCurrencyClass = "<?php echo e(getCurrencyClass()); ?>";
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
<?php echo $__env->yieldContent('scripts'); ?>
<script>
    let loggedInUserId = "<?php echo e(getLoggedInUserId()); ?>";
    let ajaxCallIsRunning = false;
    let pdfDocumentImageUrl = "<?php echo e(asset('img/attachments_img/pdf.png')); ?>";
    let docxDocumentImageUrl = "<?php echo e(asset('img/attachments_img/doc.png')); ?>";
    let blockedAttachmentUrl = "<?php echo e(asset('img/attachments_img/blocked.png')); ?>";
    let customersUrl = '<?php echo e(route('customers.index')); ?>';
    let changeLanguageUrl = "<?php echo e(route('change.language')); ?>";
</script>
<script src="<?php echo e(mix('assets/js/user-profile/user-profile.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/notifications/notification.js')); ?>"></script>
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

<?php if(session('error')): ?>
<script>
window.setTimeout(() => {
    document.getElementById('notification_area').style.display="none";
}, 5000);

</script>

<?php endif; ?>
</body>
</html>
<?php /**PATH C:\websites\crm\crm\resources\views/layouts/app.blade.php ENDPATH**/ ?>