<div class="row">
    <div class="form-group col-sm-6">
        <?php echo e(Form::label('first_name', __('messages.member.first_name').':')); ?><span class="required">*</span>
        <?php echo e(Form::text('first_name', null, ['class' => 'form-control','required','autocomplete' => 'off','placeholder'=> __('messages.member.first_name')])); ?>

    </div>
    <div class="form-group col-sm-6">
        <?php echo e(Form::label('last_name', __('messages.member.last_name').':')); ?>

        <?php echo e(Form::text('last_name', null, ['class' => 'form-control','autocomplete' => 'off','placeholder'=>__('messages.member.last_name')])); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <?php echo e(Form::label('email', __('messages.common.email').':')); ?><span class="required">*</span>
        <?php echo e(Form::email('email', null, ['class' => 'form-control','required','autocomplete' => 'off','placeholder'=>__('messages.common.email')])); ?>

    </div>
    <div class="form-group col-sm-6">
        <?php echo e(Form::label('phone', __('messages.member.phone').(':'))); ?><span class="required">*</span><br>
        <?php echo e(Form::tel('phone', null, ['class' => 'form-control','required','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'])); ?>

        <?php echo e(Form::hidden('prefix_code',old('prefix_code'),['id'=>'prefix_code'])); ?>

        <span id="valid-msg" class="hide"><?php echo e(__('messages.placeholder.valid_number')); ?></span>
        <span id="error-msg" class="hide"></span>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6" style="display: none">
        <?php echo e(Form::label('facebook', __('messages.member.facebook').':')); ?>

        <?php echo e(Form::text('facebook', null, ['class' => 'form-control','id' => 'facebookUrl','autocomplete' => 'off','placeholder'=>__('messages.member.facebook')])); ?>

    </div>
    <div class="form-group col-sm-6" style="display: none">
        <?php echo e(Form::label('linkedin', __('messages.member.linkedin').':')); ?>

        <?php echo e(Form::text('linkedin', null, ['class' => 'form-control','id' => 'linkedInUrl','autocomplete' => 'off','placeholder'=>__('messages.member.linkedin')])); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6" style="display: none">
        <?php echo e(Form::label('skype', __('messages.member.skype').':')); ?>

        <?php echo e(Form::text('skype', null, ['class' => 'form-control','id' => 'skypeUrl','autocomplete' => 'off','placeholder'=>__('messages.member.skype')])); ?>

    </div>
    <div class="form-group col-sm-6">
        <?php echo e(Form::label('default_language', __('messages.member.default_language').':')); ?>

        <?php echo e(Form::select('default_language', getLanguages(),null, ['id'=>'languageId','class' => 'form-control','placeholder' => __('messages.placeholder.select_language')])); ?>

    </div>


    <div class="form-group col-md-6 col-sm-12">
        <?php echo e(Form::label('groups',  'Roles'.':')); ?>

        <div class="input-group">
            <?php echo e(Form::select('groups[]', $data['memberGroups'],isset($member->memberGroups)?$member->memberGroups:null, ['id'=>'groupId','class' => 'form-control', 'multiple' => 'multiple'])); ?>

            <div class="input-group-append">
                
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <?php echo e(Form::label('member_security', __('messages.member.member_security').':')); ?>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input"
                   id="isEditStaffMember"
                   name="staff_member" value="1"
                    <?php echo e($member->staff_member == 1? 'checked' : ''); ?>>
            <label class="custom-control-label"
                   for="isEditStaffMember"><?php echo e(__('messages.member.staff_member')); ?></label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input"
                   id="isEditSendWelcomeEmail"
                   name="send_welcome_email" value="1"
                    <?php echo e($member->send_welcome_email == 1? 'checked' : ''); ?>>
            <label class="custom-control-label"
                   for="isEditSendWelcomeEmail"> <?php echo e(__('messages.member.send_welcome_email')); ?></label>
        </div>
    </div>
    <div class="form-group col-lg-3 col-md-6 col-sm-12">
        <span id="validationErrorsBox" class="text-danger"></span>
        <div class="row">
            <div class="col-6">
                <?php echo e(Form::label('logo', __('messages.member.profile').':',['class' => 'profile-label-color'])); ?>

                <label class="image__file-upload text-white"> <?php echo e(__('messages.setting.choose')); ?>

                    <?php echo e(Form::file('image',['id'=>'logo','class' => 'd-none','accept' => 'image/*'])); ?>

                </label>
            </div>
            <div class="col-2 pl-0 mt-1">
                <img id='logoPreview' class="img-thumbnail thumbnail-preview"
                     src="<?php if($member->image != null): ?><?php echo e($member->image); ?> <?php else: ?>  <?php echo e(asset('assets/img/infyom-logo.png')); ?> <?php endif; ?>">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <?php echo e(Form::label('permissions',__('messages.member.permissions').':',['class' => 'section-title'])); ?>

    </div>
</div>
<div class="row">
    <?php $__currentLoopData = $permissionsArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-lg-4 col-xl-3 col-sm-4 permission-text">
            <div class="card-body">
                <div class="section-title mt-0"><?php echo e($type); ?></div>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input  permissionclass"
                               id="customCheck<?php echo e($permission['id']); ?>"
                               name="permissions[]" value="<?php echo e($permission['id']); ?>"
                                <?php echo e(in_array($permission['id'], $memberPermissions) ? 'checked' : ''); ?>>
                        <label class="custom-control-label"
                               for="customCheck<?php echo e($permission['id']); ?>">
                            <?php echo e($permission['display_name']); ?>

                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <?php echo e(Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary', 'id' => 'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

        <a href="<?php echo e(route('members.index')); ?>"
           class="btn btn-secondary text-dark <?php echo e(app()->getLocale() === 'tr' ? 'mobile-btn-mt' : ''); ?>"><?php echo e(__('messages.common.cancel')); ?></a>
    </div>
</div>

<?php /**PATH C:\websites\crm\crm\resources\views/members/edit_fields.blade.php ENDPATH**/ ?>