<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.login.login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card card-primary">
        <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card-header"><h4><?php echo e(__('messages.login.login')); ?></h4></div>

        <div class="card-body">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="email"><?php echo e(__('messages.login.email')); ?>:</label><span class="text-danger">*</span>
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                           class="form-control<?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" name="email"
                           placeholder="Enter Email" tabindex="1"
                           value="<?php echo e((Cookie::get('email') !== null) ? Cookie::get('email') : old('email')); ?>" autofocus
                           required>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label"><?php echo e(__('messages.login.password')); ?>:</label><span
                                class="text-danger">*</span>
                        <div class="float-right">
                            <a href="<?php echo e(route('password.request')); ?>" class="text-small">
                                <?php echo e(__('messages.login.forgot_password')); ?>

                            </a>
                        </div>
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                           placeholder="Enter Password"
                           class="form-control<?php echo e($errors->has('password') ? 'is-invalid': ''); ?>" name="password"
                           value="<?php echo e((Cookie::get('password') !== null) ? Cookie::get('password') : null); ?>"
                           tabindex="2" required>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                               id="remember" <?php echo e((Cookie::get('remember') !== null) ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="remember"><?php echo e(__('messages.login.remember_me')); ?></label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        <?php echo e(__('messages.login.login')); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/auth/login.blade.php ENDPATH**/ ?>