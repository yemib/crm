<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?></title>

    <!-- General CSS Files -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/@fortawesome/fontawesome-free/css/all.css')); ?>" rel="stylesheet" type="text/css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/components.css')); ?>">
    <?php echo $__env->yieldContent('page_css'); ?>
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-brand">
                        <img src="<?php echo e(asset('assets/img/infyom-logo.png')); ?>" alt="logo" width="100"
                             class="shadow-light">
                    </div>
                    <?php echo $__env->yieldContent('content'); ?>
                    <div class="simple-footer">
                        All rights reserved &copy; <?php echo e(date('Y')); ?> <?php echo e(getAppName()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?php echo e(asset('assets/web/js/stisla.js')); ?>"></script>
<script src="<?php echo e(asset('assets/web/js/scripts.js')); ?>"></script>

<!-- Page Specific JS File -->
</body>
<?php echo $__env->yieldContent('page_scripts'); ?>
</html>
<?php /**PATH C:\websites\crm\crm\resources\views/layouts/auth.blade.php ENDPATH**/ ?>