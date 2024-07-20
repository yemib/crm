<?php $__env->startSection('section'); ?>
    <section class="section">
        <div class="section-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                    <div class="row">
                        <input type="hidden" name="module_id" value="<?php echo e($data['moduleId']); ?>" id="moduleId">
                        <input type="hidden" name="owner_id" value="<?php echo e($data['ownerId']); ?>" id="ownerId">
                        <div class="form-group col-lg-6">
                            <strong><?php echo e(Form::label('add_note', __('messages.note.add_note'))); ?></strong>
                            <div id="noteContainer" class="quill-editor-container"></div>
                            <div class="text-left mt-3">
                                <?php echo e(Form::button(__('messages.common.save'), ['type'=>'button','class' => 'btn btn-primary','id'=>'btnNote','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."])); ?>

                                <button type="reset" id="btnCancel" class="btn btn-light ml-1">
                                    <?php echo e(__('messages.common.cancel')); ?>

                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 note-scroll">
                            <div class="notes">
                                <div>
                                    <div class="mb-3 d-flex">
                                        <span class="flex-1 ml-5 no_notes text-center <?php if(!($notes->isEmpty())): ?> d-none <?php endif; ?>"><?php echo e(__('messages.note.no_notes_added_yet')); ?></span>
                                    </div>
                                </div>
                                <div class="activities">
                                    <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="activity clearfix notes__information"
                                             id="<?php echo e('note__'.$note->id); ?>">
                                            <div class="activity-icon">
                                                <img class="user__img profile" width="50"
                                                     height="50"
                                                     src=" <?php echo e($note->user->image_url); ?>"
                                                     alt="User Image">
                                                <span class="user__username">
                                                            </span>
                                            </div>
                                            <div class="activity-detail col-xl-11 col-lg-10 pt-1 mb-3">
                                                <div
                                                        class="mb-0 d-flex justify-content-between flex-wrap">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <?php
                                                            $deletedUser = (isset($note->user->deleted_at)) ? "<span class='user__deleted-user'>(deactivated user)</span>" : ''
                                                        ?>
                                                        <span
                                                                class="font-weight-bold lead"><?php echo e(isset($note->user->full_name) ? $note->user->full_name . ' ' . $deletedUser : ''); ?></span>
                                                        <span
                                                                class="text-job text-dark user__description ml-2"><?php echo e(timeElapsedString($note->created_at)); ?></span>
                                                    </div>
                                                    <div>
                                                        <?php if($note->added_by == getLoggedInUserId()): ?>
                                                            <a class="user__icons del-note d-none task-comment-delete"
                                                               title="<?php echo e(__('messages.common.delete')); ?>"
                                                               data-id="<?php echo e($note->id); ?>"><i
                                                                        class="fas fa-trash ml-0 card-delete-icon"></i></a>
                                                            <a class="user__icons edit-note d-none task-comment-edit"
                                                               title="<?php echo e(__('messages.common.edit')); ?>"
                                                               data-id="<?php echo e($note->id); ?>"><i
                                                                        class="fas fa-edit mr-2 card-edit-icon"></i>&nbsp;</a>
                                                            <a class="user__icons save-note <?php echo e('comment-save-icon-'.$note->id); ?> d-none task-comment-check"
                                                               data-id="<?php echo e($note->id); ?>"><i
                                                                        class="far fa-check-circle text-success font-weight-bold hand-cursor card-save-icon"></i>&nbsp;&nbsp;</a>
                                                            <a class="user__icons cancel-note <?php echo e('comment-cancel-icon-'.$note->id); ?> d-none task-comment-cancel"
                                                               data-id="<?php echo e($note->id); ?>"><i
                                                                        class="fas fa-times hand-cursor card-cancel-icon"></i>&nbsp;&nbsp;</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div
                                                        class="user__comment mt-2 <?php if($note->added_by == getLoggedInUserId()): ?> note-display <?php endif; ?> <?php echo e('comment-display-'.$note->id); ?>"
                                                        data-id="<?php echo e($note->id); ?>">
                                                    <?php echo html_entity_decode($note->note); ?>

                                                </div>
                                                <?php if($note->added_by == getLoggedInUserId()): ?>
                                                    <div
                                                            class="user__comment d-none note-edit <?php echo e('comment-edit-'.$note->id); ?>">
                                                        <div id="noteEditContainer<?php echo e($note->id); ?>"
                                                             class="quill-editor-container"></div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <div id="noteContainer" class="quill-editor-container"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('tickets.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\websites\crm\crm\resources\views/tickets/views/notes.blade.php ENDPATH**/ ?>