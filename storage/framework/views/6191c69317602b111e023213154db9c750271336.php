<?php $__env->startSection('section'); ?>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('name', __('messages.common.name').':')); ?>

                <p><?php echo e(html_entity_decode($member->full_name)); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('phone', __('messages.member.phone').':')); ?>

                <p><?php echo e(isset($member->phone) ? $member->phone : __('messages.common.n/a')); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('email', __('messages.member.email').':')); ?>

                <p><?php echo e($member->email); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('is_enable', __('messages.common.status').':')); ?>

                <p><?php echo e(isset($member->is_enable) && $member->is_enable ? __('messages.contact.active') : __('messages.contact.deactive')); ?></p>
            </div>
        </div>
    </div>
    <div class="row">



        <div class="col-md-3">
            <div class="form-group">
              
                <label>  Member ID : </label>
       
       <p> <?php echo e($member->member_id); ?></p>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
              
                <label>  Roles  : </label>
       
       <p>  <?php $__currentLoopData = $member->memberGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php echo e($role->name); ?> ,
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('send_welcome_email', __('messages.member.send_welcome_email').':')); ?>

                <p><?php echo e(($member->send_welcome_email) ? __('messages.common.yes') : __('messages.common.no')); ?></p>
            </div>
        </div>
        
    </div>
    <div class="row">
    
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('default_language', __('messages.member.default_language').':')); ?>

                <p><?php echo e(isset($member->default_language) ? $member->default_language : __('messages.common.n/a')); ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('created_at', __('messages.common.created_on').':')); ?><br>
                <span data-toggle="tooltip" data-placement="right"
                      title="<?php echo e(\Carbon\Carbon::parse($member->created_at)->translatedFormat('jS M, Y')); ?>"><?php echo e($member->created_at->diffForHumans()); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo e(Form::label('updated_at', __('messages.common.last_updated').':')); ?>

                <br>
                <span data-toggle="tooltip" data-placement="right"
                      title="<?php echo e(\Carbon\Carbon::parse($member->created_at)->translatedFormat('jS M, Y')); ?>"><?php echo e($member->updated_at->diffForHumans()); ?></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php echo e(Form::label('permissions',__('messages.member.permissions').':',['class' => 'section-title'])); ?>

        </div>
        <?php $__currentLoopData = $memberPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4 col-xl-3 col-sm-4 permission-text">
                <div class="card-body">
                    <div class="section-title mt-0"><?php echo e($type); ?></div>
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label>
                                <?php echo e($permission['display_name']); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('members.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\websites\crm\crm\resources\views/members/views/member_details.blade.php ENDPATH**/ ?>